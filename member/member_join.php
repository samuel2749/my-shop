<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/connMysql.php");
  //確認帳號是否已註冊
  $user = checkAccount($_POST["account"]);
  // echo $users;
  if($user > 0) {
    header("Location: member_join_form.php?registered=true&account=".$_POST["account"]);
  } else {
    //若此帳號尚未註冊，則執行新增的動作
    createUser($_POST["name"], $_POST["account"], $_POST["password"], $_POST["email"], $_POST["phone"], $_POST["address"]);
  }
?>
<script language="javascript">
  alert("註冊成功\n請用申請的帳號密碼登入。");
  window.location.href = "index.php";
</script>
