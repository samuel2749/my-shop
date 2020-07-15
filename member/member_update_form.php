<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/connMysql.php");
  require_once("../common/setting.php");
  //檢查是否已登入
  require_once("login_check.php");
  //查詢登入會員資料
  $user = getUser($_SESSION["account"], $_SESSION["password"]);
  $user = $user[0];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員管理系統</title>
<script language="javascript">
function check_form() {
  if(document.form1.name.value=="") {
    alert("姓名不可為空!");
    return false;
  }
  if(document.form1.email.value=="") {
    alert("email不可為空!");
    return false;
  }
  return confirm('確定送出嗎？');
}
</script>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td width="600">
      <form action="member_update.php" method="POST" name="form1" onSubmit="return check_form();">
        <p><font size="6" color="#FF0000">修改會員資料</font></p>
        <div>
          <hr size="1" />
          <p><strong>使用帳號</strong>：
            <?php echo $user["account"];?>
          </p>
          <p><strong>姓名</strong>：
            <input name="name" type="text" value="<?php echo $user["name"];?>">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>email</strong>：
            <input name="email" type="text" value="<?php echo $user["email"];?>" size="10">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>電話</strong>：
            <input name="phone" type="text" value="<?php echo $user["phone"];?>" size="10">
          </p>
          <p><strong>地址</strong>：
            <input name="address" type="text" value="<?php echo $user["address"];?>" size="40">
          </p>
          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="1" />
        <p align="center">
          <input name="id" type="hidden" value="<?php echo $user["id"];?>">
          <input type="submit" name="update" value="修改資料">
          <input type="reset" name="reset" value="重設資料">
        </p>
      </form>
    </td>
    <td width="200">
      <?php require_once("menu.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>
