<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['sessVar'])){
        echo 'Access Denied!';
        exit;
    }
    $me = $_SESSION['sessVar'];
    $i = $me['id'];
    $pic = $_FILES['picture'];
    $tmp = $pic['tmp_name'];
    $name = $pic['name'];
    $info = pathinfo($name);
    $ext = $info['extension'];
    $array = glob('../photos/photos/*');
    $count = count($array)+1;
    // echo count($array);
    $newName = $count.'.'.$ext;
    $extensions = array('JPG','JPEG','PNG','png','jpeg','jpg');
    if(!in_array($ext,$extensions)){
        echo 'Image not supported!';
        exit;
    }
    if(move_uploaded_file($tmp,'../photos/photos/'.$newName)){
        //create a thumbnail
        createThumb('../photos/photos/'.$newName,'../photos/thumbs/',$ext);
        minithumb('../photos/photos/'.$newName,'../photos/mini-thumbs/',$ext);
        echo $newName;
    }


    function createThumb($existing_image='', $thumb_path='',$file_ext){
        $file_name = pathinfo($existing_image,PATHINFO_FILENAME);
        $thumbnail = $thumb_path.$file_name.'.'.$file_ext;
        list($width,$height) = getimagesize($existing_image);
        $i_w    = 550;
        $factor = $width / $i_w;
        $i_h    = $height / $factor;

        $thumb_create = imagecreatetruecolor($i_w,$i_h);
        switch($file_ext){
            case 'jpg':
                $source = imagecreatefromjpeg($existing_image);
                break;
            case 'jpeg':
                $source = imagecreatefromjpeg($existing_image);
                break;
            case 'JPG':
                $source = imagecreatefromjpeg($existing_image);
                break;
            case 'JPEG':
                $source = imagecreatefromjpeg($existing_image);
                break;
            case 'png':
                $source = imagecreatefrompng($existing_image);
                break;
            case 'gif':
                $source = imagecreatefromgif($existing_image);
                break;
            case 'PNG':
                $source = imagecreatefrompng($existing_image);
                break;
            case 'GIF':
                $source = imagecreatefromgif($existing_image);
                break;
            default:
                return false;
        }
        imagecopyresampled($thumb_create, $source, 0, 0, 0, 0, $i_w, $i_h, $width, $height);
        switch($file_ext){
            case 'png':
                imagepng($thumb_create,$thumbnail,9);
                break;
            case 'gif':
                imagegif($thumb_create,$thumbnail);
                break;
            default:
                imagejpeg($thumb_create,$thumbnail,100);
        }
        return $thumbnail;
    }
    function minithumb($existing_image='', $thumb_path='',$file_ext){
        $file_name = pathinfo($existing_image,PATHINFO_FILENAME);
        $thumbnail = $thumb_path.$file_name.'.'.$file_ext;
        list($width,$height) = getimagesize($existing_image);
        // $i_w = $width / 10;
        // $i_h = $height / 10;
        $i_w    = 300;
        $factor = $width / $i_w;
        $i_h    = $height / $factor;

        $thumb_create = imagecreatetruecolor($i_w,$i_h);
        switch($file_ext){
            case 'jpg':
                $source = imagecreatefromjpeg($existing_image);
                break;
            case 'jpeg':
                $source = imagecreatefromjpeg($existing_image);
                break;
            case 'JPG':
                $source = imagecreatefromjpeg($existing_image);
                break;
            case 'JPEG':
                $source = imagecreatefromjpeg($existing_image);
                break;
            case 'png':
                $source = imagecreatefrompng($existing_image);
                break;
            case 'gif':
                $source = imagecreatefromgif($existing_image);
                break;
            case 'PNG':
                $source = imagecreatefrompng($existing_image);
                break;
            case 'GIF':
                $source = imagecreatefromgif($existing_image);
                break;
            default:
                return false;
        }
        imagecopyresampled($thumb_create, $source, 0, 0, 0, 0, $i_w, $i_h, $width, $height);
        switch($file_ext){
            case 'png':
                imagepng($thumb_create,$thumbnail,9);
                break;
            case 'gif':
                imagegif($thumb_create,$thumbnail);
                break;
            default:
                imagejpeg($thumb_create,$thumbnail,100);
        }
        return $thumbnail;
    }
?>
