<?php
    require_once("../common/connMysql.php");
    $data = array('result' => false);

    if(!isset($_SESSION["account"]) || ($_SESSION["account"]=="")) {
        //header("Location: index.php");
        $data["msg"] = "系統錯誤(1)，請通知管理員。";
    } else if(checkParams("order_id")){
        $result = deleteOrder($_REQUEST["order_id"]);
        $data["msg"] = "成功";
        $data["result"] = true;
    }else{
        $data["msg"] = "系統錯誤(3)，請通知管理員。";
    }
    echo json_encode($data);
?>