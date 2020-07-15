<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("../common/setting.php");
  require_once("../common/connMysql.php");
  $nowPage = 1;
  if(isset($_GET["page"])){
    $nowPage = intval($_GET["page"]);
  }
  $total = getTotalRow($product_table_name);
  $totalPages = ceil($total/10);
  if($nowPage > $totalPages) $nowPage = $totalPages;
  if($total > 0){
    $rows = getProductList($nowPage);
    //echo json_encode($rows);
  }
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>產品管理系統</title>
  <link rel="stylesheet" type="text/css" href="../css/product-list.css">
  <link rel="stylesheet" type="text/css" href="../css/pagination.css">
</head>
<body>
  <h1>商品首頁</h1>
  <div class="product_list">
    <a href="product_add_form.php" class="addBtn">新增商品</a>
    <a href="../index.php" class="backBtn">返回</a>
    <div class="content">
      <?php 
        if($total > 0){
          for($i=0; $i < count($rows); $i++){
            $row = $rows[$i];
        
        
      ?>
        <div class="product_item">
          <span class="product_name"><?php echo $row["name"]?></span>
          <div class="imgBox" style="background-image:url(../thumbnail/<?php echo $row["pic"]?>)">
            <img src="http://fakeimg.pl/250x250/" alt="">
          </div>
          <span class="product_price">NTD <?php echo $row["price"]?></span>
        </div>
      <?php 
          } 
        }
    ?>
    </div>
    <div align="center">
      <div id="pagination" class="pages"></div>
    </div>
  </div>
</body>
</html>
<script src="../js/pagination.js"></script>
<script>
  var total = parseInt("<?php echo $totalPages;?>"), page = parseInt("<?php echo $nowPage;?>");
  if(total > 0){
    var paginationEle = document.getElementById('pagination');
    paginationEle.style.display = "inline-block";
    Pagination.Init(paginationEle, {
      size: total, // pages size
      page: page,  // selected page
      step: 3,   // pages before and after current
      callback: function(num){
        location.href = "index.php?page=" + num;
      }
    });
  }
  
</script>