<?php
    require_once("../common/connMysql.php");
    $data = array('result' => false);

    function addOrder(){
        global $product_table_name;
        $user = getUser($_SESSION["account"], $_SESSION["password"]);
        $user = $user[0];
        $selectSql = "SELECT * FROM _table_name_ WHERE id IN (_value_)";
        $selectSql = str_replace("_table_name_", $product_table_name, $selectSql);
        $selectSql = str_replace("_value_", $_REQUEST["productIds"], $selectSql);
        $products = sqlQuery($selectSql);
        $qts = explode(",", $_REQUEST["qts"]);
        $count = 0;
        $total = 0;
        for($i = 0; $i < count($qts); $i++){
            $num = intval($qts[$i]);
            $count = $count + $num;
            $total = $total + intval($products[$i]["price"]) * $num;
            $products[$i]["quantity"] = intval($products[$i]["quantity"]) - $num;
            updateQty($products[$i]);
        }
        $order_id = uniqid();
        createOrder($order_id, $user["id"], $count, $total);
        createOrderItem($order_id, $products, $qts);
        $data["result"] = true;
        echo json_encode($data);

    }
    // update the quantity
    function updateQty($product) {
        updateProduct($product["id"], $product["name"], $product["description"], $product["price"], $product["quantity"], $product["pic"]);
    }
    if(!isset($_SESSION["account"]) || ($_SESSION["account"]=="")) {
        //header("Location: index.php");
        $data["msg"] = "系統錯誤，請通知管理員。";
        echo json_encode($data);
    } else if(checkParams("productIds") && checkParams("qts")){
        addOrder();
    }
?>