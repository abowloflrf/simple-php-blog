<?php
/**
 * Created by PhpStorm.
 * User: ruofeng
 * Date: 2017/7/10
 * Time: 18:33
 */

$return_success=0;
$return_message='';
$return_url='';

if($_FILES["editormd-image-file"]["size"] < 5120000) {


    if ($_FILES["editormd-image-file"]["error"] > 0) {
        $return_message = $_FILES["editormd-image-file"]['error'];
    } else {

            $temp=explode(".",$_FILES["editormd-image-file"]["name"]);//???
            $extension=end($temp);

            $return_success=1;
            $return_message = "文件上传成功!";
            $image_id=uuid_create();
            move_uploaded_file($_FILES["editormd-image-file"]["tmp_name"], "upload/" . $image_id.".".$extension);
            $return_url="upload/" . $image_id.".".$extension;

    }
}else{
    $return_message="上传图片过大,请小于5m";
}

$return_array=["success"=>$return_success,"message"=>$return_message,"url"=>$return_url];
echo json_encode($return_array);
