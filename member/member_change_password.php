<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/connMysql.php");
  require_once("../common/setting.php");
  //檢查是否已登入
  require_once("login_check.php");
  //修改密碼
  updatePassword($_POST["id"], $_POST["password"]);
  //修改密碼後，登出回到首頁
  unset($_SESSION["account"]);
  header("Location: index.php");
?>
