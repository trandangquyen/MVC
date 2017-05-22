<div class="row" style="margin-top:10px">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin khách hàng</div>
            <div class="panel-body">
                <input type="text" class="form-control" name="user_info[name]" placeholder="Họ tên Quý khách" aria-describedby="basic-addon1" required>
                <input type="email" class="form-control" name="user_info[email]" placeholder="Địa chỉ Email" aria-describedby="basic-addon1">
                <input type="text" class="form-control" name="user_info[phone]" placeholder="Số điện thoại" aria-describedby="basic-addon1" required>
                <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span>
                    <textarea class="form-control" rows="5" name="user_info[address]" id="buyer_address" style="width: 100%"></textarea>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin giao hàng</div>
            <div class="panel-body">
                <input type="checkbox" onchange="fill_ship_info()"/> Giao hàng tới cùng địa chỉ
                <input type="text" class="form-control" name="user_info[ship_to_name]" placeholder="Họ tên" aria-describedby="basic-addon1" required>
                <input type="text" class="form-control" name="user_info[ship_to_tel]" placeholder="Số điện thoại" aria-describedby="basic-addon1" required>

                <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span>
                    <textarea class="form-control" rows="5" name="user_info[address]" id="buyer_address" style="width: 100%"></textarea>
                </div>
                <div> Ghi chú
                    <textarea class="form-control" name="user_info[note]" id="ship_to_note"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">Hình thức thanh toán</div>
            <div class="panel-body">
                <div class="radio">
                  <label><input type="radio" name="optradio">COD</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Chuyển khoản</label>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Hình thức vận chuyển</div>
            <div class="panel-body">
                <div class="radio">
                  <label><input type="radio" name="optradio">Giao hàng nhanh trong 60 phút</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Giao hàng bình thường</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">Xác nhận đơn hàng</div>
            <div class="panel-body">
                <div class="tbl_cart3">
                    <table style="border-collapse: collapse;border: 1px solid #ccc;width: 100%;">
                      <tr>
                        <td>1</td>
                        <td>  <a href="http://anphatpc.com.vn/laptop-acer-aspire-r5-471t-7387-nxg7wsv001_id20340.html"><b>Laptop Acer Aspire R5-471T-7387 NX.G7WSV.001</b></a>  </td>
                        <td><strong class="red">19.990.000 <u>đ</u></strong></td>
                        <td><input type='hidden' name='quantity_pro_20340' value='1' />
                          1</td>
                      </tr>
                      
                      
                      <tr class="txt_16">
                        <td class="txt2 txt_right" colspan=4>
                          Tổng tiền
                          <strong class="red">19.990.000 <u>đ</u></strong><br/>
                          (Chưa bao gồm phí vận chuyển)
                        </td>
                      </tr>
                    </table>
            </div>
        </div>
        </div>
        <button type="button" class="btn btn-primary" style="width: 100%">Đặt hàng</button>
    </div>

</div>