<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>產品管理系統</title>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td width="600">
    	<form name="form1" method="post" enctype="multipart/form-data" action="product_add.php" onSubmit="return check_form();">
        <p><font size="6" color="#FF0000">新增商品</font></p>
        <div>
          <hr size="1" />
          <p><strong>商品名稱</strong>：
          	<input type="text" name="name">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>價錢</strong>：
            <input type="text" name="price">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>數量</strong>：
            <input type="text" name="quantity">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>描述</strong>：
						<textarea name="description" cols="60" rows="6"></textarea>
            <font color="#FF0000">*</font>
          </p>
          <p><strong>圖片</strong>：
            <input id="open_file" type='file' onchange="readURL(this);" name="pic" style="display: none;">
						<input type="button" value="選擇圖片..." onclick="document.getElementById('open_file').click();" />
            <font color="#FF0000">*</font>
          </p>
					<p><img id="previewImg" style="max-width: 300px;"></p>
          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="1" />
        <p align="center">
          <input type="submit" name="join" value="新增商品">
          <input type="reset" name="reset" value="重設資料">
        </p>
      </form>
    </td>
  </tr>
</table>
<script src="product.js"></script>
</body>
</html>