<?php
  //檢查是否已登入
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/connMysql.php");
  require_once("login_check.php");
  $rows = getOrderItems($_REQUEST["id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>訂單明細</title>
  <link rel="stylesheet" type="text/css" href="../css/order_view.css">
</head>
<body>
  <div class="header">
    <h1>訂單明細</h1>
    <a href="./member_center.php">回上頁</a>
  </div>
    <div class="order_list">
      <?php
        for($i=0; $i < count($rows); $i++){
          $row = $rows[$i];
      ?>
        <div class="order_item">
          <div class="imgBox" style="background-image:url(../thumbnail/<?php echo $row["product_pic"]?>)">
            <img src="http://fakeimg.pl/250x250/" alt="">
          </div>
          <div class="name">
            <span>產品名：</span>
            <span><?php echo $row["product_name"]?></span>
          </div>
          <div class="price">
            <span>價錢：</span>
            <span><?php echo $row["product_price"]?></span>
          </div>
          <div class="qty">
            <span>數量：</span>
            <span><?php echo $row["product_quantity"]?></span>
          </div>
          <div class="description">
            <span>內容：</span>
            <span><?php echo $row["product_description"]?></div>
        </div>

      <?php
        }
      ?>
    </div>
</body>
</html>