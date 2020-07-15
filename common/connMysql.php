<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
  //資料庫連線設定
  $db_host = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "my_shop";
  $member_table_name = "member";
  $product_table_name = "product";
  $order_table_name = "order";
  $order_item_table_name = "order_item";
  //設定資料連線
  function getConn(){
    global $db_host, $db_username, $db_password, $db_name;
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
    if($conn->connect_error){
      die("資料連結失敗！");
    }
    $conn->query("SET NAMES utf8"); 
    return $conn;
  }

  function sqlQuery($sql){
    $mysqli = getConn();
    $result = $mysqli->query($sql);
    $arr = array();
    if(is_bool($result)) return $result;
    while ($row = $result->fetch_assoc()) {
      array_push($arr, $row);
    }
    mysqli_close($mysqli);
    return $arr;
  }

  function getTotalRow($table_name){
    $sql = "SELECT COUNT(*) AS total FROM _table_name_";
    $sql = str_replace("_table_name_", $table_name, $sql);
    $result = sqlQuery($sql);
    return $result[0]["total"];
  }

  function checkParams($str){
    return isset($_REQUEST[$str]) && $_REQUEST[$str] != "";
  }

  //=============== member ====================
  function createUser($name, $account, $password, $email, $phone, $address){
    global $member_table_name;
    $mysqli = getConn();
    $sql = "INSERT INTO _table_name_ (name, account, password, email, phone, address) VALUES(?, ?, ?, ?, ?, ?)";
    $sql = str_replace("_table_name_", $member_table_name, $sql);
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssss", $name, $account, $password, $email, $phone, $address);
    $stmt->execute();
    $stmt->close();
    mysqli_close($mysqli);
  }

  function checkAccount($account){
    global $member_table_name;
    $sql = "SELECT COUNT(*) AS total FROM _table_name_ WHERE account = '_account_'";
    $sql = str_replace("_table_name_", $member_table_name, $sql);
    $sql = str_replace("_account_", $account, $sql);
    $result = sqlQuery($sql);
    return $result[0]["total"];
  }

  function getUser($account, $password){
    global $member_table_name;
    $sql = "SELECT * FROM _table_name_ WHERE account = '_account_' AND password = '_password_'";
    $sql = str_replace("_table_name_", $member_table_name, $sql);
    $sql = str_replace("_account_", $account, $sql);
    $sql = str_replace("_password_", $password, $sql);
    return sqlQuery($sql);
  }

  function updateUser($id, $name, $email, $phone, $address){
    global $member_table_name;
    $sql = "UPDATE _table_name_ SET name='_name_', email='_email_', phone='_phone_', address='_address_' WHERE id = '_id_';";
    $sql = str_replace("_table_name_", $member_table_name, $sql);
    $sql = str_replace("_name_", $name, $sql);
    $sql = str_replace("_email_", $email, $sql);
    $sql = str_replace("_phone_", $phone, $sql);
    $sql = str_replace("_address_", $address, $sql);
    $sql = str_replace("_id_", $id, $sql);
    sqlQuery($sql);
  }

  function updatePassword($id, $password){
    global $member_table_name;
    $sql = "UPDATE _table_name_ SET password='_password_' WHERE id = '_id_'";
    $sql = str_replace("_table_name_", $member_table_name, $sql);
    $sql = str_replace("_password_", $password, $sql);
    $sql = str_replace("_id_", $id, $sql);
    sqlQuery($sql);
  }

  function deleteUser($account){
    global $member_table_name;
    $sql = "DELETE FROM _table_name_ WHERE account = '_account_'";
    $sql = str_replace("_table_name_", $member_table_name, $sql);
    $sql = str_replace("_account_", $account, $sql);
    sqlQuery($sql);
  }
  //=============== member end ====================
  //=============== product ====================
  function createProduct($name, $description, $price, $quantity, $pic){
    global $product_table_name;
    $mysqli = getConn();
    $sql = "INSERT INTO _table_name_ (name, description, price, quantity, pic) VALUES(?, ?, ?, ?, ?)";
    $sql = str_replace("_table_name_", $product_table_name, $sql);
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $name, $description, $price, $quantity, $pic);
    $stmt->execute();
    $stmt->close();
    mysqli_close($mysqli);
  }

  function getProductList($page){
    global $product_table_name;
    $num = 10 * intval($page - 1);
    $sql = "SELECT * FROM _table_name_ ORDER BY create_date DESC LIMIT _num_, 10";
    $sql = str_replace("_table_name_", $product_table_name, $sql);
    $sql = str_replace("_num_", $num, $sql);
    $result = sqlQuery($sql);
    return $result;
  }

  function getProduct($id){
    global $product_table_name;
    $sql = "SELECT * FROM _table_name_ WHERE id = '_id_';";
    $sql = str_replace("_table_name_", $product_table_name, $sql);
    $sql = str_replace("_id_", $id, $sql);
    return sqlQuery($sql);
  }

  function updateProduct($id, $name, $description, $price, $quantity, $pic){
    global $product_table_name;
    $sql = "UPDATE _table_name_ SET name='_name_', description='_description_', price='_price_', quantity='_quantity_', pic='_pic_' WHERE id = '_id_'";
    $sql = str_replace("_table_name_", $product_table_name, $sql);
    $sql = str_replace("_name_", $name, $sql);
    $sql = str_replace("_description_", $description, $sql);
    $sql = str_replace("_price_", $price, $sql);
    $sql = str_replace("_quantity_", $quantity, $sql);
    $sql = str_replace("_pic_", $pic, $sql);
    $sql = str_replace("_id_", $id, $sql);
    sqlQuery($sql);
  }

  function deleteProduct($id){
    global $product_table_name;
    $sql = "DELETE FROM _table_name_ WHERE id = '_id_'";
    $sql = str_replace("_table_name_", $product_table_name, $sql);
    $sql = str_replace("_id_", $id, $sql);
    sqlQuery($sql);
  }
  //=============== product end ====================
  //=============== order item ====================
  function createOrderItem($order_id, $products, $qts){
    global $order_item_table_name;
    $mysqli = getConn();
    $sql = "INSERT INTO _table_name_ (order_id, product_id, product_name, product_description, product_price, product_pic, product_quantity) VALUES(?, ?, ?, ?, ?, ?, ?)";
    $sql = str_replace("_table_name_", $order_item_table_name, $sql);
    $stmt = $mysqli->prepare($sql);
    for($i = 0; $i < count($products); $i++){
      $item = $products[$i];
      $qty = intval($qts[$i]);
      $stmt->bind_param("sssssss", $order_id, $item["id"], $item["name"], $item["description"], $item["price"], $item["pic"], $qty);
      $stmt->execute();
    }
    $stmt->close();
    mysqli_close($mysqli);
  }

  function getOrderItems($order_id){
    global $order_item_table_name;
    $sql = "SELECT * FROM _table_name_ WHERE order_id = '_order_id_'";
    $sql = str_replace("_table_name_", $order_item_table_name, $sql);
    $sql = str_replace("_order_id_", $order_id, $sql);
    return sqlQuery($sql);
  }
  //=============== order item end ====================
  //=============== order item ====================
  function createOrder($order_id, $member_id, $quantity, $total){
    global $order_table_name;
    $status = 1;
    $mysqli = getConn();
    $sql = "INSERT INTO `_table_name_` (id, member_id, quantity, total, status) VALUES(?, ?, ?, ?, ?)";
    $sql = str_replace("_table_name_", $order_table_name, $sql);
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $order_id, $member_id, $quantity, $total, $status);
    $stmt->execute();
    $stmt->close();
    mysqli_close($mysqli);
  }

  function getOrder($member_id){
    global $order_table_name, $order_item_table_name;
    $sql = "SELECT * FROM `_table_name_` WHERE member_id = _member_id_ AND status = 1 ORDER BY create_date DESC";
    $sql = str_replace("_table_name_", $order_table_name, $sql);
    $sql = str_replace("_member_id_", $member_id, $sql);
    $result = sqlQuery($sql);
    return $result;
  }
  function deleteOrder($id){
    global $order_table_name;
    $sql = "UPDATE `_table_name_` SET status= 0 WHERE id = '_id_'";
    $sql = str_replace("_table_name_", $order_table_name, $sql);
    $sql = str_replace("_id_", $id, $sql);
    return sqlQuery($sql);
  }

  //=============== order item end ====================
?>
