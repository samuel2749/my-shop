<?php
  //檢查是否已登入
  require_once("../common/setting.php");
  require_once("login_check.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/product-list.css">
    <link rel="stylesheet" type="text/css" href="../css/order_form.css">
</head>
<body>
  <h1>訂單</h1>
  <div class="order_list">
    <div class="info">
      <p class="qty">總數： <span>0</span></p>
      <p class="total">總金額： <span>0</span></p>
      <a href="" class="create_order">新增訂單</a>
    </div>
    
    <div class="content">
      <!--
      <div class="order_item">
        <img src="../thumbnail/5c28cf5ecaa5e.jpg" alt="">
        <span class="name">品名： test</span>
        <span class="price">價錢： NTD 1253</span>
        <div class="quantity">
          數量：
          <select id="qty">
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </div>
        <a href="#" class="delete">刪除</a>
      </div>
      -->
    </div>
  </div>
  <hr>
  <div class="product_list">
    <div class="content">
      <!--
      <div class="product_item">
        <span class="product_name">123</span>
        <img src="../thumbnail/">
        <span class="product_price">NTD 111</span>
        <a href="#" class="add_btn">加入訂單</a>
      </div>
      -->
    </div>
    <div class="more_btn">MORE</div>
  </div>
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/order_form.js"></script>
</body>
</html>