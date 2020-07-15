(function ($) {
  var _pageObj = { num: 1, total: 1 }, 
      _product_ids = [],
      _product_qts = [],
      productContentEle = $('.product_list .content'),
      orderContentEle = $('.order_list .content');
  (function () {
    getProduct();
    setButton();
  })();

  function setButton() {
    $('.more_btn').on('click', function (e) {
      e.preventDefault();
      if(_pageObj.num < _pageObj.total){
        _pageObj.num++;
        getProduct();
      }
    });

    $('.create_order').on('click', function (e) {
      e.preventDefault();
      if(_product_ids.length == 0){
        alert("請選擇商品！");
        return;
      }
      if(window.confirm("確定新增訂單？")) addOrder();
    });
  }

  function orderChanges(){
    var qts = 0, total = 0;
    _product_qts = [];
    $('.order_item').each(function(index){
      var ele = $(this), 
        data = ele.data('data'), 
        qty = parseInt(ele.find('.quantity select').val());
      qts += qty;
      total += data.price * qty;
      _product_qts.push(qty);
    });
    $('.info').find('.qty span').html(qts).end().end().find('.total span').html(total);
  }

  function addOrder(){
    var sendObj = {productIds: _product_ids.toString(), qts: _product_qts.toString()};
    $.post("../api/addOrder.php", sendObj, function (data) {
      if(data.result){
        alert("訂單建立成功!");
        location.href = "member_center.php";
      }else{
        alert(data.msg);
      }
    }, "json");

  }

  function getProduct() {
    $.post("../api/getProductList.php", { page: _pageObj.num }, function (data) {
      _pageObj.total = data.total_pages;
      if(_pageObj.num == _pageObj.total) $('.more_btn').hide();
      setProductList(data.lists);
    }, "json");
  }

  function setProductList(data) {
    data.forEach(item => {
      productContentEle.append(renderProduct(item));
    });
  }
  function renderProduct(item){
    var ele = ''
      + '<div class="product_item">'
      + '  <span class="product_name">_name_</span>'
      + '  <div class="imgBox" style="background-image:url(../thumbnail/_pic_)">'
      + '   <img src="http://fakeimg.pl/250x250/" alt="">'
      + '  </div>'
      + '  <span class="product_price">NTD _price_</span>'
      + '  <a href="#" class="add_btn">加入訂單</a>'
      + '</div>';
    ele = ele.replace("_name_", item.name);
    ele = ele.replace("_pic_", item.pic);
    ele = ele.replace("_price_", item.price);
    ele = $(ele);
    ele.data("data", item);
    ele.find('.add_btn').on("click", function(e){
      e.preventDefault();
      if(_product_ids.indexOf(item.id) > -1) {
        alert("已加入清單！");
        return;
      }
      _product_ids.push(item.id);
      addToOrder(item);
    });
    return ele;
  }

  function addToOrder(item){
    orderContentEle.prepend(rederOrderItem(item));
    orderChanges();
  }

  function rederOrderItem(item){
    var ele = ''
      + '<div class="order_item">'
      + '  <img src="../thumbnail/_pic_" alt="">'
      + '  <p class="name">品名： _name_</p>'
      + '  <p class="price">價錢： NTD <span>_price_</span></p>'
      + '  <div class="quantity">'
      + '    數量：<select id="qty"></select>'
      + '  </div>'
      + '  <a href="#" class="delete">刪除</a>'
      + '</div>';
    ele = ele.replace("_name_", item.name);
    ele = ele.replace("_pic_", item.pic);
    ele = ele.replace("_price_", item.price);
    ele = $(ele);
    ele.data("data", item);
    for(var qtyNum = 0; qtyNum < item.quantity; qtyNum++){
      var optionEle = '<option value="_val_">_val_</option>';
      optionEle = optionEle.replace(/_val_/g, qtyNum + 1)
      ele.find("#qty").append(optionEle);
    }
    ele.find(".delete").on('click', function(e){
      e.preventDefault();
      if(!window.confirm("確定刪除商品?")) return;
      var index = _product_ids.indexOf(item.id);
      _product_ids.splice(index, 1);
      ele.remove();
      orderChanges();
    });
    ele.find('#qty').on("change", function(e){
      var parentEle = $(this).parent().parent();
      parentEle.find('.price span').html(item.price * this.value);
      orderChanges();
    });
    return(ele);
  }

})(jQuery)