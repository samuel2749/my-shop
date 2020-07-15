<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/connMysql.php");
  require_once("../common/setting.php");
  //檢查是否已登入
  require_once("login_check.php");
  //執行更新動作
  updateUser($_POST["id"], $_POST["name"], $_POST["email"], $_POST["phone"], $_POST["address"]);
  //修改完成後重導回會員中心
  header("Location: member_center.php");
?>