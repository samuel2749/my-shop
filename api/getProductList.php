<?php
    $data = array('result' => false);
    if(isset($_REQUEST["page"])){
        require_once("../common/connMysql.php");
        $nowPage = intval($_REQUEST["page"]);
        $total = getTotalRow($product_table_name);
        $totalPages = ceil($total/10);
        if($nowPage < 0) $nowPage = 1;
        if($nowPage > $totalPages) $nowPage = $totalPages;
        $lists = getProductList($nowPage);
        $data["lists"] = $lists;
        $data["total_pages"] = $totalPages;
        $data["result"] = true;
    }
    echo json_encode($data);
?>