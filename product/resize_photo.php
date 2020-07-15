<?php
  function resize_photo($src_file, $src_ext, $dest_name, $max_size) {
    switch ($src_ext)	{
      case ".jpg":
        $src = imagecreatefromjpeg($src_file);
        break;
      case ".png":
        $src = imagecreatefrompng($src_file);
        break;
      case ".gif":
        $src = imagecreatefromgif($src_file);
        break;
    }
    $src_w = imagesx($src);
    $src_h = imagesy($src);
    if($src_w > $src_h) {
      $thumb_w = $max_size;
      $thumb_h = intval($src_h / $src_w * $thumb_w);
    } else {
      $thumb_h = $max_size;
      $thumb_w = intval($src_w / $src_h * $thumb_h);
    }
    $thumb = imagecreatetruecolor($thumb_w, $thumb_h);
    imagecopyresized($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
    imagejpeg($thumb, $dest_name, 100);
    imagedestroy($src);
    imagedestroy($thumb); 
  }

?>