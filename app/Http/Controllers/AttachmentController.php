<?php

namespace App\Http\Controllers;

use App\Helpers\AttachmentHelper;
use Exception;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AttachmentController extends Controller
{
    private $attachmentFolder = 'public/attachments/';

    public function store(Request $request) {
         return $request->all();
        $attachments = $request->except('folder');
        if(empty($attachments)){
            return response()->json([
                'status' => 'error',
                'message' => 'No file found!'
            ]);
        }
        return response()->json([
            'status'=>'error',
            'data'=>$attachments
        ]);
        $attachmentsArray=['attachment_file' =>[]];
        foreach ($attachments as $key => $attachment){
            array_push($attachmentsArray['attachment_file'],  $attachment);
        }



        $validator = Validator::make(
            $attachmentsArray, [
            'attachment_file.*' => 'required|mimes:jpg,jpeg,png,bmp,pdf,gif,txt,doc,docx,csv,xlsx,xls|max:10000'
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

                    $ext = $attachment->guessExtension();
                    $type = $attachment->getMimeType();

                    $original_name = $attachment->getClientOriginalName();
                    $file_size = AttachmentHelper::byteToHuman( $attachment->getClientSize() );

                    $name =  md5(rand(1111, 9999). time()) .'.'.$ext;

                    $name_full = $this->attachmentFolder . $folder . '/' . $name;
                    Storage::disk('local')->put( $name_full, File::get($attachment) );


                    $attachmentSave = Attachment::create([
                        'attachment_no'    => $max_number,
                        'reference'          => $model,
                        'file_name'          => $name,
                        'folder'        => $folder,
                        'file_type'          => $type,
                        'original_name' => $original_name,
                        'file_size'     => $file_size
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

    public function download(Attachment $attachment) {
        $user = Auth::user();
        $path_to_file = 'app/' . $this->attachmentFolder . $attachment->folder .'/'. $attachment->file_name;
        return response()->download(storage_path($path_to_file));

    }

    public function delete(Attachment $attachment) {
        $user = Auth::user();
        try {
            DB::beginTransaction();
            if(empty($attachment->attachment_no) &&  $user->company_id != $attachment->company_id){
                throw new Exception('Invalid Attachment!', 400);
            }
            $attachment->delete();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Attachment Successfully Delete.',
                'url' => 0,
                'id' => $attachment->attachment_id,
                'modalForm' => true,
            ]);
        }catch (Exception $ex) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage()
            ]);
        }

    }
}
