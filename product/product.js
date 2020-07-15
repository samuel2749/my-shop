
function check_form() {
  var name = document.form1.name.value;
  if(name=="") {		
    alert("請輸入商品名稱!");
    return false;
  } parseInt
  var price = parseInt(document.form1.price.value);
  if(isNaN(price) || !price) {		
    alert("請輸入商品價錢!");
    return false;
  } 
  var quantity = parseInt(document.form1.quantity.value);
  if(isNaN(quantity) || !quantity) {		
    alert("請輸入商品數量!");
    return false;
  }
  var description = document.form1.description.value;
  if(description=="") {		
    alert("請輸入商品描述!");
    return false;
  } 
  var pic = document.form1.pic.value;
  if(pic=="") {		
    alert("請選擇商品圖片!");
    return false;
  }
  return confirm("確定送出？");
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("previewImg").setAttribute("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
