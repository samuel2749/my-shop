<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/connMysql.php");
  require_once("../common/setting.php");
  //檢查是否已登入，若已登入則導向會員中心
  if(isset($_SESSION["account"]) && ($_SESSION["account"]!=""))
    header("Location: member_center.php");
  //執行會員登入
  if(isset($_POST["account"]) && isset($_POST["password"])) {		
    //查詢登入會員資料
    $user = getUser($_POST["account"], $_POST["password"]);
    $user = $user[0];
    $account = $user["account"];
    $password = $user["password"];
    //比對密碼，若登入成功則呈現登入狀態
    if($_POST["password"]==$password) {
      //將使用者帳號存入Session
      $_SESSION["account"] = $account;
      $_SESSION["password"] = $password;
      //將使用者帳號、密碼存入Cookie
      if(isset($_POST["rememberme"]) && ($_POST["rememberme"]=="true")) {
        setcookie("account", $_POST["account"], time()+365*24*60*60);
        setcookie("password", $_POST["password"], time()+365*24*60*60);
      } else {
        if(isset($_COOKIE["account"])) {
          setcookie("account", $_POST["account"], time()-100);
          setcookie("password", $_POST["password"], time()-100);
        }
      }
      header("Location: member_center.php");
    } else {
      header("Location: index.php?loginFail=true");
    }
  }
?>