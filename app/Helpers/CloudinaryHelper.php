<?php

use JD\Cloudder\Facades\Cloudder;

function image_path(){

    }

    function cloudder_upload($attachment, $folderPath, $publicId=null){
        $options = [
            "folder" => $folderPath,
            "resource_type" => "image"
        ];

        Cloudder::upload(realpath($attachment), $publicId, $options);

        $showOption = [
            "width"=>60,
            "height"=>'auto',
            "gravity"=>"face",
            "crop"=>"fill",
            "fetch_format"=>"auto",
            "type"=>"fetch"
        ];
        $img = Cloudder::show($publicId, $showOption);
    }
