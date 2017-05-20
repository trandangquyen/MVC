
    <div id="guide_cart">
        <i class="bg icon_large_cart"></i>
        <h1>Chi tiết giỏ hàng</h1>
        <p>Để xóa sản phẩm khỏi giỏ hàng, bấm <img src="public/images/icon_del.png" alt="">, để mua thêm bấm <b>"Mua tiếp"</b>. Để sang bước đặt hàng tiếp theo, bấm <b>"Thanh toán"</b></p>
    </div>
    <!--guide_cart-->
    <!--Buoc 1 : gio hang-->
    <span style="display: none;"></span><span style="display: none;">
      </span>
      <?php 
      if(isset($items)) {
        ?>
    <table cellpadding="5" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; width:100%; " id="tbl_list_cart">
        <tbody>
            <tr style="background-color:#f5f5f5; font-weight:bold; text-transform:uppercase;">
                <td>STT</td>
                <td>Tên sản phẩm</td>
                <td>Số lượng</td>
                <td>Đơn giá</td>
                <td>Thành tiền</td>
                <td>Xóa</td>
            </tr>
            <?php 
            $i=0;
            foreach ($items as $item) {
                $i++;
                echo '<tr id="product-'.$item['id'].'" data-product-id="'.$item['id'].'">
                    <td style="text-align:center;">'.$i.'</td>
                    <td class="product_cart">
                        <img src="'.$item['thumb'].'" style="vertical-align: middle; margin-right: 10px; float:left; width:100px;">
                        <div style="margin-left:120px;">
                            <a href="sanpham/'.$item['id'].'" style="text-decoration:none; padding-top:10px; display:block;"><b>'.$item['name'].'</b></a>
                            <p class="red">Mã sản phẩm: '.$item['id'].'</p>
                            <p></p>
                            </p>
                        </div>
                    </td>
                    <td>
                        <input type="number" name="quantity-'.$item['id'].'" id="quantity-'.$item['id'].'" value="'.$item['quantity'].'" style="width:70px">
                    </td>
                    <td class="product_cart"><span class="format-curency" data-price="'.$item['price'].'" id="price-product-'.$item['id'].'">'.$item['price'].'</span></td>

                    <td class="product_cart"><b><span class="format-curency" data-price="'.$item['total-price'].'" id="price-product-total-'.$item['id'].'">'.$item['total-price'].'</span></b></td>
                    <td><a href="javascript:deleteItem('.$item['id'].')"><img src="public/images/icon_del.png"></a></td>
                </tr>';
            }
            ?>
            <tr>
                <td colspan="2">
                </td>
                <td colspan="4" style="text-align:center; line-height:22px; color:#555">
                    <b>Tổng tiền:</b>
                    <b style="color:red; font-size:18px;"><span class="format-curency" data-price="" id="total_value" value="" style="color: red; font-weight: bold;">0 đ</span></b><br>
                    <b>Chưa bao gồm phí vận chuyển</b>
                </td>
            </tr>
            
        </tbody>
    </table>
    <div class="clear space2"></div><br />
    <div align="left" style="width: 50%;float: left;">
        <input type="text" class="form-control" id="coupon-code" placeholder="Enter your coupon here" style="width: 190px;float: left;">
        <button type="button" class="btn btn-default btn-apply-coupon">Apply</button> 
        <span id="coupon-info" style="display: none;">Enter coupon code</span>

    </div>
    <div align="right">
        <button type="button" class="btn btn-info btn-update-cart" onclick="saveCart();" style="display: none;">Cập nhập</button> <button type="button" class="btn btn-primary btn-shopping" onclick="location.href = 'sanpham';">Mua tiếp</button> <button type="button" class="btn btn-success btn-payment" onclick="payment();">Thanh toán</button>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="seller@designerfotos.com">
  <input type="hidden" name="item_name" value="hat">
  <input type="hidden" name="item_number" value="123">
  <input type="hidden" name="amount" value="15.00">
  <input type="hidden" name="first_name" value="John">
  <input type="hidden" name="last_name" value="Doe">
  <input type="hidden" name="address1" value="9 Elm Street">
  <input type="hidden" name="address2" value="Apt 5">
  <input type="hidden" name="city" value="Berwyn">
  <input type="hidden" name="state" value="PA">
  <input type="hidden" name="zip" value="19312">
  <input type="hidden" name="night_phone_a" value="610">
  <input type="hidden" name="night_phone_b" value="555">
  <input type="hidden" name="night_phone_c" value="1234">
  <input type="hidden" name="email" value="jdoe@zyzzyu.com">
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
</form>

    </div>
    <?php 
            } else {
                echo '<h1>Giỏ hàng trống</h1>';
                echo '<center><a href="sanpham" class="btn btn-primary">Mua sắm</a></center>';
            }
            ?>
    <div class="clear space2"></div>

<script type="text/javascript">
    var products = {};
    $(window).load(function () {
        updateCart();
        price_format();
    });
    $('.btn-apply-coupon').click(function() {
        $('#coupon-info').toggle();
        var code = $('#coupon-code').val();
        if(code.length < 1) {
            $('#coupon-code').addClass("has-error");
            $('#coupon-info').show().text('Enter coupon code').addClass("text-danger");
        } else {
            $.post('cart', {type:'applyCoupon',code:code}, function(data) {
                if(data.status) {
                    $('#coupon-info').show().text('Coupon code apply success').addClass("text-success");
                } else {
                    $('#coupon-info').show().text(data.message).addClass("text-danger");
                }
            });
        }
    });
    $(":input[name^=quantity-]").bind('keyup mouseup', function () {
        $('.btn-update-cart').text('Cập nhập giỏ hàng').show();
        updateCart();
    });
    /*function updateQuantity(id,quantity) {
        $('.btn-update-cart').text('Cập nhập giỏ hàng').show();
        updateCart();
    }*/
    function deleteItem(id) {
        $('tr#product-'+id).remove();
        $('.btn-update-cart').text('Cập nhập giỏ hàng').show();
        updateCart();
    }
    function updateCart() {
        products = {};
        var total_orders_price = 0;
        $('tr[id^="product-"]').each(function(i, obj) {
            var product_id = $(obj).data('product-id');
            var price = $('#price-product-'+product_id).data('price');
            var quantity = $('#quantity-'+product_id).val();
            var price_total = price*quantity;
            var price_total_format = format_curency(price_total);
            $('#price-product-total-'+product_id).text(price_total_format).attr('data-price',price_total);
            total_orders_price += price_total;
            products[product_id] = quantity;
        });
        $('#total_value').text(format_curency(total_orders_price));
        //$('input[name=amount]').val(total_orders_price);
        $('#total_value').attr('value',total_orders_price).attr('data-price',total_orders_price);
        $('span#count_shopping_cart_store').text($('tr[id^="product-"]').length);
    }
    function price_format() {
        $('.format-curency').each(function(i, obj) {
            var price = $(obj).data('price');
            var new_price = format_curency(price);
            if(price>0) $(obj).text(new_price);
            console.log(price+ ' : '+new_price);
        });
    }
    function saveCart() {
        $.post('cart', {type:'updateCart',products:products}, function(data) {
            if(data.status) $('.btn-update-cart').text('Đã cập nhập giỏ hàng');
        });
    }

    function payment() {
        console.log(products);
        if(jQuery.isEmptyObject(products)) return alert('Giỏ hàng trống');
        else alert('Chức năng thanh toán đâng được phát triển');
        //$.post('cart', param, function(data) {});
    }
</script>