<?php

namespace App\Http\Controllers;

use App\Traits\ResponserTrait;
use Exception;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Helpers\AttachmentHelper;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AttachmentController extends Controller
{
    private $attachmentFolder = 'public/attachments/';

    public function store(Request $request) {
//         return $request->all();
        $attachments = $request->except('folder');
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


                if(empty($attachmentModels[$folder])){
                    throw new Exception('Invalid Model!', 400);
                }

                $attachmentData = [];
                foreach ($attachments as $key => $attachment){


                    $model = $attachmentModels[$folder];
                    $flipModels = array_flip($attachmentModels);
                    $modalName = $flipModels[$model];

                    if($model === $attachmentModels['product'] || $model === $attachmentModels['thumbnail'] ){
                        $folder = $folder.'/'.$max_number;
                    }

                    $ext = $attachment->guessExtension();
                    $type = $attachment->getMimeType();

                    $original_name = $attachment->getClientOriginalName();
                    $file_size = AttachmentHelper::byteToHuman( $attachment->getClientSize() );

                    $name =  md5(rand(1111, 9999). time()) .'.'.$ext;

                    $name_full = $this->attachmentFolder . $folder . '/' . $name;
                    Storage::disk('local')->put( $name_full, File::get($attachment) );


                    $attachmentSave = Attachment::create([
                        'attachment_no' => $max_number,
                        'reference'     => $model,
                        'file_name'     => $name,
                        'folder'        => $folder,
                        'file_type'     => $type,
                        'original_name' => $original_name,
                        'file_size'     => $file_size,
                        'modal'         => $modalName
                    ]);

                    array_push($attachmentData, [
                        'img' => $attachmentSave->image_path,
                        'id' => $attachmentSave->attachment_id,
                        'no' => $attachmentSave->attachment_no,
                        'delete_url' => route('attachment.delete',  $attachmentSave->attachment_id),
                    ]);
                    $max_number++;
                }
                return response()->json([
                    'status' => 'success',
                    'attachments' => $attachmentData
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

    public function crop_image_store(Request $request) {

        if(empty($request->input('image'))){
            return response()->json([
                'status' => 'error',
                'message' => 'No file found!'
            ]);
        }
        $image_array_1 = explode(";", $request->input('image'));
        $image_array_2 = explode(",", $image_array_1[1]);
        $ImageData = base64_decode($image_array_2[1]);

        try {

            $max_number = Attachment::max('attachment_no')+1;

            if(empty($request->folder)){
                throw new Exception('Folder is Require!', 400);
            }
            $folder = $request->folder;

            $attachmentModels = Attachment::attachmentModels;


            if(empty($attachmentModels[$folder])){
                throw new Exception('Invalid Model!', 400);
            }

            $attachmentData = [];
            $model = $attachmentModels[$folder];
            $flipModels = array_flip($attachmentModels);
            $modalName = $flipModels[$model];

            if($model === $attachmentModels['product'] || $model === $attachmentModels['thumbnail'] ){
                $folder = $folder.'/'.$max_number;
            }

            $imageInfo = getimagesizefromstring($ImageData);
            $type = $imageInfo['mime'];
            $ext = image_type_to_extension($imageInfo[2]);
            $name =  md5(rand(1111, 9999). time()).$ext;
            $name_full = $this->attachmentFolder . $folder . '/' . $name;
            Storage::disk('local')->put( $name_full,$ImageData);


            $attachmentSave = Attachment::create([
                'attachment_no' => $max_number,
                'reference'     => $model,
                'file_name'     => $name,
                'folder'        => $folder,
                'file_type'     => $type,
                'original_name' => null,
                'file_size'     => null,
                'modal'         => $modalName,
            ]);

            array_push($attachmentData, [
                'img' => $attachmentSave->image_path,
                'id' => $attachmentSave->attachment_id,
                'no' => $attachmentSave->attachment_no,
                'delete_url' => route('attachment.delete',  $attachmentSave->attachment_id),
                'serial'      => $request->serial,
            ]);

            return response()->json([
                'status' => 'success',
                'code'=>200,
                'attachments' => $attachmentData,
                'name'=>$name,
            ],200);

        }catch (Exception $ex) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage()
            ], 400);
        }

    }

    public function download(Attachment $attachment) {
        $user = Auth::user();
        $path_to_file = 'app/' . $this->attachmentFolder . $attachment->folder .'/'. $attachment->file_name;
        return response()->download(storage_path($path_to_file));

    }

    public function delete($attachmentId) {

        try {
            DB::beginTransaction();
            $attachment = Attachment::where('attachment_id',$attachmentId)->first();
            if(empty($attachment)){
                throw new Exception('Attachment Not Found', Response::HTTP_NOT_FOUND);
            }
            if($attachment->delete()){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Attachment Deleted Successfully');
            }else{
                throw new Exception('Image Not Deleted. Try Again.', Response::HTTP_BAD_REQUEST);
            }
        }catch (Exception $ex) {
            DB::rollBack();
            return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
        }

    }

    public function attachment_image($id){

        $attachment = Attachment::findOrFail($id);
        return $attachment->api_image_path;
    }
}
