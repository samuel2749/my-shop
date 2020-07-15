<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/connMysql.php");
  require_once("resize_photo.php");
  //確認帳號是否已註冊
  $error_msg = "";
  echo isset($_FILES["pic"]);
  if(isset($_FILES["pic"])){
    $upload = $_FILES["pic"];
    $file_ext=strtolower(strrchr($upload['name'], '.'));
    $expensions= array(".jpeg",".jpg",".png",".gif");
    if(in_array($file_ext,$expensions)=== false){
      $error_msg = "圖片格式錯誤，請選擇jpg, png或gif檔";
    }else{
      $file_tmp = $upload['tmp_name'];
      $desc_file_name = uniqid().$file_ext;
      resize_photo($file_tmp, $file_ext, "../thumbnail/$desc_file_name", 200);
      if(move_uploaded_file($file_tmp, "../uploads/$desc_file_name")){
        createProduct($_POST["name"], $_POST["description"], $_POST["price"], $_POST["quantity"], $desc_file_name);
      }else{
        $error_msg = "檔案上傳失敗。";
      };
      echo($desc_file_name);
    }
    
  }else{
    $error_msg = "請上傳圖片";
  }
  
?>
<script language="javascript">
  var msg = "<?php echo $error_msg ?>";
  if(msg != ""){
    alert(msg);
    window.history.back()
  }else{
    alert("商品新增成功。");
    window.location.href = "index.php";
  }
</script>
