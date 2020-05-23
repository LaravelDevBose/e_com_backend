<?php

namespace App\Http\Controllers\Seller;

use App\Models\ProductImage;
use App\Traits\ResponserTrait;
use Exception;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Helpers\AttachmentHelper;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProductImageController extends Controller
{
    private $attachmentFolder = 'public/attachments/';
    private $appAttachmentFolder = 'public/mobile/attachments/';

    public function store(Request $request) {
        // return $request->all();
        $attachments = $request->except(['folder', 'pri_id']);
        if(empty($attachments)){
            return response()->json([
                'status' => 'error',
                'message' => 'No file found!'
            ]);
        }

        $attachmentsArray=['attachment_file' =>[]];
        foreach ($attachments as $key => $attachment){
            array_push($attachmentsArray['attachment_file'],  $attachment);
        }

        $validator = Validator::make(
            $attachmentsArray, [
            'attachment_file.*' => 'required'
        ],[
                'attachment_file.*.required' => 'Please upload an image',
                'attachment_file.*.mimes' => 'Only Images, Doc, Text, PDF are allowed',
                'attachment_file.*.max' => 'Sorry! Maximum allowed size for an image is 10MB'
            ]
        );

        if ($validator->passes()) {

            try {
                $max_number = Attachment::max('attachment_no')+1;

                if(empty($request->folder)){
                    throw new Exception('Folder is Require!', 400);
                }
                $folder = $request->folder;
                $attachmentModels = Attachment::attachmentModels;
                $model = $attachmentModels[$folder];
                $flipModels = array_flip($attachmentModels);
                $modalName = $flipModels[$model];

                if(empty($attachmentModels[$folder])){
                    throw new Exception('Invalid Model!', 400);
                }

                $attachmentData= [];
                foreach ($attachments as $key => $attachment){
                    $uFolder = $folder;

                    if($folder == 'product' || $folder == 'thumbnail' ){
                        $uFolder = $folder.'/'.$max_number;
                    }

                    $ext = $attachment->guessExtension();
                    $type = $attachment->getMimeType();

                    $original_name = $attachment->getClientOriginalName();
                    $file_size = AttachmentHelper::byteToHuman( $attachment->getClientSize() );

                    $name =  md5(rand(1111, 9999). time()) .'.'.$ext;

                    $name_full = $this->attachmentFolder . $uFolder . '/' . $name;
                    Storage::disk('local')->put( $name_full, File::get($attachment) );

                    $appAttachments = Attachment::appAttachments;
                    if(!empty($appAttachments[$folder])){
                        $appImage = $appAttachments[$folder];
                        $image = Image::make($attachment);
                        $image->resize($appImage['width'], $appImage['height']);

                        $name_full = $this->appAttachmentFolder . $uFolder . '/' . $name;
                        Storage::disk('local')->put( $name_full, $image->encode());
                    }

                    $attachmentSave = Attachment::create([
                        'attachment_no' => $max_number,
                        'reference'     => $model,
                        'file_name'     => $name,
                        'folder'        => $uFolder,
                        'file_type'     => $type,
                        'original_name' => $original_name,
                        'file_size'     => $file_size,
                        'modal'         => $modalName
                    ]);

                    array_push($attachmentData, [
                        'pri_id'=>$request->pri_id,
                        'img' => $attachmentSave->image_path,
                        'id' => $attachmentSave->attachment_id,
                        'no' => $attachmentSave->attachment_no,
                        'delete_url' => route('attachment.delete',  $attachmentSave->attachment_id),
                    ]);
                    $max_number++;
                }
                return response()->json([
                    'status' => 'success',
                    'message'=>'Image Uploaded.',
                    'images' => $attachmentData
                ]);

            }catch (Exception $ex) {
                DB::rollBack();
                return response()->json([
                    'status' => 'error',
                    'message' => $ex->getMessage()
                ]);
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            $message = null;
            foreach ($errors as $error){
                if(!empty($error)){
                    foreach ($error as $errorItem){
                        $message .=  $errorItem .' ';
                    }
                }
            }
            return response()->json([
                'status' => 'validation',
                'message' => ($message != null) ? $message :'Invalid File!'
            ]);
        }
    }

    public function download(Attachment $attachment) {
        $user = Auth::user();
        $path_to_file = 'app/' . $this->attachmentFolder . $attachment->folder .'/'. $attachment->file_name;
        return response()->download(storage_path($path_to_file));

    }

    public function delete($imageId) {

        try {
            DB::beginTransaction();
            $image = ProductImage::where('image_id', $imageId)->first();
            if(empty($image)){
                throw new Exception('Product image Not Found', Response::HTTP_NOT_FOUND);
            }
            $attcId = $image->attachment_id;
            if($image->delete()){
                $attachment = Attachment::where('attachment_id', $attcId)->first();
                if (!empty($attachment) && $attachment->delete()){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Image Deleted Successfully');
                }else{
                    throw new Exception('Image Not Deleted. Try Again.', Response::HTTP_BAD_REQUEST);
                }
            }else{
                throw new Exception('Image Not Deleted. Try Again.', Response::HTTP_BAD_REQUEST);
            }

        }catch (Exception $ex) {
            DB::rollBack();
            return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
        }

    }
}
