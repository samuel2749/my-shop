<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/connMysql.php");
  require_once("../common/setting.php");
  //檢查是否已登入
  require_once("login_check.php");
  $user = getUser($_SESSION["account"], $_SESSION["password"]);
  $user = $user[0];
  $orders = getOrder($user["id"]);
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>會員管理系統</title>
  <link rel="stylesheet" type="text/css" href="../css/member_center.css">
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td>
      <p><font size="6" color="#FF0000">會員中心</font></p>
      <hr size="1" />
    	<p>歡迎光臨會員管理系統</p>
      <ol>
        <li>免費加入會員。</li>
        <li>會員可修改本身資料。</li>
        <li>會員可修改本身密碼。</li>
        <li>會員可刪除本身帳號。</li>
      </ol>
    </td>
    <td width="200">
      <?php require_once("menu.php"); ?>
    </td>
  </tr>
</table>
<hr>
<div class="order_box">
  <button class="addBtn">新增訂單</button>
  <div class="clear"></div>
  <div class="content">
    <?php 
      for($itemNum = 0; $itemNum < count($orders); $itemNum++){
        $item = $orders[$itemNum];
    ?>
        <div class="order">
          <span class="order_sn">訂單：<?php echo $itemNum + 1 ?></span>
          <span class="order_qty">數量：<?php echo $item["quantity"] ?></span>
          <span class="order_total">總金額：<?php echo $item["total"] ?></span>
          <span class="order_time">訂單日期：<?php echo $item["create_date"] ?></span>
          <a href="order_view.php?id=<?php echo $item["id"]?>">瀏覽</a>
          <a href="#" onclick="deleteOrder('<?php echo $item["id"]?>')">刪除</a>
        </div>
    <?php
      }
    ?>
  </div>
  
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/member_center.js"></script>
</body>
</html>
