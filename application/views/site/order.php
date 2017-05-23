<div class="row" style="margin-top:10px">
<form method="POST" enctype="application/x-www-form-urlencoded">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin khách hàng</div>
            <div class="panel-body">
                <input type="text" class="form-control" name="user_info[name]" placeholder="Họ tên Quý khách" value="<?=isset($user['name']) ? $user['name'] : '' ?>" aria-describedby="basic-addon1" required>
                <input type="email" class="form-control" name="user_info[email]" placeholder="Địa chỉ Email" value="<?=isset($user['email']) ? $user['email'] : '' ?>" aria-describedby="basic-addon1">
                <input type="text" class="form-control" name="user_info[phone]" placeholder="Số điện thoại" value="<?=isset($user['phone']) ? $user['phone'] : '' ?>" aria-describedby="basic-addon1" required>
                <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span>
                    <textarea class="form-control" rows="5" name="user_info[address]" value="<?=isset($user['address']) ? $user['address'] : '' ?>" id="buyer_address" style="width: 100%"></textarea>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin giao hàng</div>
            <div class="panel-body">
                <input type="checkbox" onchange="fill_ship_info()"/> Giao hàng tới cùng địa chỉ
                <input type="text" class="form-control" name="user_info[ship_to_name]" placeholder="Họ tên" aria-describedby="basic-addon1" required>
                <input type="text" class="form-control" name="user_info[ship_to_phone]" placeholder="Số điện thoại" aria-describedby="basic-addon1" required>

                <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span>
                    <textarea class="form-control" rows="5" name="user_info[ship_to_address]" id="buyer_address" style="width: 100%" required></textarea>
                </div>
                <div> Ghi chú
                    <textarea class="form-control" name="user_info[ship_note]" id="ship_to_note"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">Hình thức thanh toán</div>
            <div class="panel-body">
                <div class="radio">
                  <label><input type="radio" name="payment" value="cash" checked="checked">Tiền mặt</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="payment" value="cod">COD</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="payment" value="transfer">Chuyển khoản</label>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Hình thức vận chuyển</div>
            <div class="panel-body">
                <div class="radio">
                  <label><input type="radio" name="transport" value="none" checked="checked">Không giao hàng (lấy trực tiếp từ cửa hàng)</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="transport" value="normal">Giao hàng bình thường</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="transport" value="fast">Giao hàng nhanh trong 60 phút</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">Xác nhận đơn hàng</div>
            <div class="panel-body">
            <?php if(isset($items)) { ?>
                <div class="tbl_cart3">
                    <table style="border-collapse: collapse;border: 1px solid #ccc;width: 100%;">
                    <?php 
                    $i=1;
                    foreach ($items as $item) {
                        echo '<tr>
                        <td>'.$i.'</td>
                        <td>  <a href="sanpham/'.$item['id'].'"><b>'.$item['name'].'</b></a>  </td>
                        <td><strong class="format-curency" data-price="'.$item['total-price'].'">'.$item['total-price'].'</strong></td>
                        <td>'.$item['quantity'].'</td>
                        </tr>';
                        $i++;
                    }
                  ?>
                      <tr class="txt_16">
                        <td class="txt2 txt_right" colspan=4>
                          Tổng tiền
                          <strong class="format-curency" data-price="<?=$order_total?>"><?=$order_total?></strong><br/>
                          (Chưa bao gồm phí vận chuyển)
                        </td>
                      </tr>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%">Đặt hàng</button>
    </div>
</form>
</div>
<script type="text/javascript">
    $(window).load(function () {
        $('.format-curency').each(function(i, obj) {
            var price = $(obj).data('price');
            var new_price = format_curency(price);
            if(price>0) $(obj).text(new_price);
            console.log(price+ ' : '+new_price);
        });
    });
    function fill_ship_info() {
            var name = $('input[name="user_info[name]"]').val();
            var email = $('input[name="user_info[email]"]').val();
            var phone = $('input[name="user_info[phone]"]').val();
            var address = $('textarea[name="user_info[address]"]').val();

            $('input[name="user_info[ship_to_name]"]').val(name);
            $('input[name="user_info[ship_to_phone]"]').val(phone);
            $('textarea[name="user_info[ship_to_address]"]').val(address);
        }
</script>