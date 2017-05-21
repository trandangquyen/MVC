<div class="container">
  <div id="content">
    <div id="location">
        <a href="/"><i class="bg icon_home"></i></a>
        <span>»</span><a href="/gio-hang">Giỏ hàng của bạn</a>
    </div>
    <form method="post" enctype="multipart/form-data" action="/gui-don-hang" onsubmit="return check_field()">
   
      <div class="hori_line"></div>
      <!--Buoc 2 gio hang-->
      <script>

        function open_tax_form(check_box_id, tax_form_id){
        var chk = document.getElementById(check_box_id).checked;
          if(chk){
              document.getElementById(tax_form_id).style.display = "block";
          }else{
           document.getElementById(tax_form_id).style.display = "none";
          }
        }
        
        function fill_ship_info(){
          document.getElementById('ship_to_name').value = document.getElementById('buyer_name').value;
          document.getElementById('ship_to_tel').value = document.getElementById('buyer_tel').value;
          document.getElementById('ship_to_address').value = document.getElementById('buyer_address').value;
        }
        
      </script>
              <input type="hidden" id="current_open_info" value="">
              
              <!--Buoc 2 gio hang-->
              <div class="c3_col_1">
                <div class="c3_box">
                  <div class="title_box_cart"> Thông tin khách hàng</div>
                  <div> Họ tên Quý khách <span class="txt2">*</span>
                    <input type="text" name="user_info[name]" id="buyer_name" value="Võ Văn Khoa" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <div> Địa chỉ Email <span class="txt2">*</span>
                    <input type="text" name="user_info[email]" id="buyer_email" value="khoazero123@gmail.com">
                  </div>
                  <div> Số điện thoại <span class="txt2">*</span>
                    <input type="text" name="user_info[tel]" id="buyer_tel" value="0963212280">
                  </div>
                  <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span>
                    <textarea name="user_info[address]" id="buyer_address">Số 3, ngõ 18, phố Hàm Nghi, Từ Liêm, hà Nội</textarea>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="c3_box">
                  <div class="c3_box">
                    <div class="title_box_cart">Thông tin giao hàng</div>
                    <div class="txt0"><img src="/template/default/images/i_trans.png" style="vertical-align: middle;">
                      <input type="checkbox" onchange="fill_ship_info()">
                      Giao hàng tới cùng địa chỉ</div>
                    <div> Họ tên <span class="txt2">*</span> <br>
                      <input type="text" size="40" name="user_info[ship_to_name]" id="ship_to_name">
                    </div>
                    <div class="clear"></div>
                    <div> Số điện thoại <span class="txt2">*</span> <br>
                      <input type="text" value="" id="ship_to_tel" name="user_info[ship_to_tel]" size="40">
                    </div>
                    <div> Địa chỉ <span class="txt2">(số nhà, đường, tỉnh) *</span> <br>
                      <textarea style="width: 293px; height: 50px;" id="ship_to_address" name="user_info[ship_to_address]"></textarea>
                    </div>
                    <div> Ghi chú
                    <textarea name="user_info[note]" id="buyer_note"></textarea>
                  </div>
                  </div>
                </div>
              </div>
              <div class="c3_col_1" style="margin: 0;width:36%">
                <div class="c3_box">
                  <div class="title_box_cart">Hình thức thanh toán</div>
                  <table class="tbl_pay">
                  
                    <tbody><tr>
                      <td valign="top"><input type="radio" name="pay_method" value="1" class="pay_option"></td>
                      <td valign="top">
                        <div class="txt0">Thanh toán trực tiếp</div>
                        
                        <div class="pay_content" style="display:none;">
                          Quý khách hàng có thể thanh toán trực tiếp tại 2 cơ sở chính của Hà Nội Computer có địa chỉ 129 + 131 Lê Thanh Nghị hoặc chi nhánh 43 Thái Hà
                        </div>
                        
                      </td>
                    </tr>
                  
                    <tr>
                      <td valign="top"><input type="radio" name="pay_method" value="2" class="pay_option"></td>
                      <td valign="top">
                        <div class="txt0">Thanh toán tại nơi giao hàng</div>
                        
                        <div class="pay_content" style="display:none;">
                          Quý khách hàng có thể thanh toán tại nơi giao hàng bằng tiền mặt sau khi nhận được đầy đủ hàng hóa và đáp ứng chất lượng
                        </div>
                        
                      </td>
                    </tr>
                  
                    <tr>
                      <td valign="top"><input type="radio" name="pay_method" value="3" class="pay_option"></td>
                      <td valign="top">
                        <div class="txt0">Thanh toán bằng chuyển khoản</div>
                        
                        <div class="pay_content" style="display:none;">
                          Quý khách hàng có thể khoản thanh toán trước bằng hình thức chuyển khoản vào một trong các tài khoản sau :
<br>
<br>Chủ tài khoản : Công ty Cổ Phần Máy tính Hà Nội
<br>Địa chi : 129 + 131 Lê Thanh Nghị , Hai Bà Trưng, Hà Nội
<br>
<br>1/Ngân hàng Standard Chartered Việt Nam (tại Hà Nội)
<br>
<br>Số TK VND: 88140711268
<br>Số TK USD: 88140711286
<br>
<br>2. Ngân hàng TMCP Ngoại Thương Việt Nam- Chi nhánh Tây Hồ (Vietcombank)
<br>
<br>- Số tài khoản VND: 0991.000.000.930
                        </div>
                        
                      </td>
                    </tr>
                  
                    <tr>
                      <td valign="top"><input type="radio" name="pay_method" value="4" class="pay_option"></td>
                      <td valign="top">
                        <div class="txt0">Chuyển khoản InternetBanking</div>
                        
                        <div class="pay_content" style="display:none;">
                          <ul class="b_l">
                                <li><img class="img-bank" id="30" src="https://www.baokim.vn/application/uploads/banks/vietcombank.png" title="Vietcombank - Ngân hàng TMCP Ngoại thương"></li><li><img class="img-bank" id="36" src="https://www.baokim.vn/application/uploads/banks/techcombank.png" title="Techcombank - Ngân hàng Kỹ thương Việt Nam"></li><li><img class="img-bank" id="132" src="https://www.baokim.vn/application/uploads/banks/vietinbank.png" title="Vietinbank - Ngân hàng Công thương Việt Nam"></li><li><img class="img-bank" id="133" src="https://www.baokim.vn/application/uploads/banks/bidvbank.png" title="BIDV - Ngân hàng Đầu tư và Phát triển Việt Nam"></li><li><img class="img-bank" id="84" src="https://www.baokim.vn/application/uploads/banks/maritimebank.png" title="MSB - Ngân hàng Hàng Hải Việt Nam"></li><li><img class="img-bank" id="136" src="https://www.baokim.vn/application/uploads/banks/vpbank.png" title="VPBank - Ngân hàng Việt Nam Thịnh Vượng"></li><li><img class="img-bank" id="32" src="https://www.baokim.vn/application/uploads/banks/dongabank.png" title="DongA Bank - Ngân hàng Đông Á"></li><li><img class="img-bank" id="54" src="https://www.baokim.vn/application/uploads/banks/acbbank.png" title="ACB - Ngân hàng Á Châu"></li><li><img class="img-bank" id="147" src="https://www.baokim.vn/application/uploads/banks/agribank.png" title="Agribank - Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam"></li><li><img class="img-bank" id="80" src="https://www.baokim.vn/application/uploads/banks/sacombank.png" title="Sacombank - Ngân hàng Sài Gòn Thương Tín"></li><li><img class="img-bank" id="65" src="https://www.baokim.vn/application/uploads/banks/mbbank.png" title="Ngân hàng Quân Đội (MB)"></li><li><img class="img-bank" id="140" src="https://www.baokim.vn/application/uploads/banks/eximbank.png" title="Eximbank - Ngân hàng Xuất nhập khẩu"></li><li><img class="img-bank" id="82" src="https://www.baokim.vn/application/uploads/banks/baovietbank.png" title="BAOVIET Bank - Ngân hàng Bảo Việt"></li><li><img class="img-bank" id="81" src="https://www.baokim.vn/application/uploads/banks/pgbank.png" title="PG Bank - Ngân Hàng TMCP Xăng Dầu"></li><li><img class="img-bank" id="45" src="https://www.baokim.vn/application/uploads/banks/shbbank.png" title="SHB - Ngân hàng Sài Gòn- Hà Nội"></li><li><img class="img-bank" id="47" src="https://www.baokim.vn/application/uploads/banks/vibbank.png" title="VIB - Ngân hàng Quốc Tế"></li><li><img class="img-bank" id="56" src="https://www.baokim.vn/application/uploads/banks/tienphongbank.png" title="TienPhongBank - Ngân hàng Tiên  Phong"></li><li><img class="img-bank" id="49" src="https://www.baokim.vn/application/uploads/banks/seabank.png" title="SeABank - Ngân hàng Đông Nam Á"></li>                            </ul>
                        </div>
                        
                      </td>
                    </tr>
                  
                    <tr>
                      <td valign="top"><input type="radio" name="pay_method" value="5" class="pay_option"></td>
                      <td valign="top">
                        <div class="txt0">Thanh toán bằng tài khoản Bảo Kim</div>
                        
                                  <div class="pay_content" style="display:none;">
                                    <ul class="b_l">
                                      <li><img src="/baokim/images/bk_logo.png" border="0" class="img-bank" id="0"></li>
                                    </ul>
                                    </div>
                                    
                      </td>
                    </tr>
                  
                    <tr>
                      <td valign="top"><input type="radio" name="pay_method" value="6" class="pay_option"></td>
                      <td valign="top">
                        <div class="txt0">Thanh toán trực tuyến bằng thẻ ATM nội địa</div>
                        
                                    <div class="pay_content" style="display:none;">
                                      <ul class="b_l">
                                <li><img class="img-bank" id="15" src="https://www.baokim.vn/application/uploads/banks/vietcombank.png" title="Vietcombank - Ngân hàng TMCP Ngoại thương"></li><li><img class="img-bank" id="60" src="https://www.baokim.vn/application/uploads/banks/techcombank.png" title="Techcombank - Ngân hàng Kỹ thương Việt Nam"></li><li><img class="img-bank" id="91" src="https://www.baokim.vn/application/uploads/banks/vietinbank.png" title="Vietinbank - Ngân hàng Công thương Việt Nam"></li><li><img class="img-bank" id="131" src="https://www.baokim.vn/application/uploads/banks/bidvbank.png" title="BIDV - Ngân hàng Đầu tư và Phát triển Việt Nam"></li><li><img class="img-bank" id="105" src="https://www.baokim.vn/application/uploads/banks/maritimebank.png" title="MSB - Ngân hàng Hàng Hải Việt Nam"></li><li><img class="img-bank" id="124" src="https://www.baokim.vn/application/uploads/banks/Oceanbank.png" title="Ocean Bank - Ngân hàng Đại Dương"></li><li><img class="img-bank" id="113" src="https://www.baokim.vn/application/uploads/banks/vpbank.png" title="VPBank - Ngân hàng Việt Nam Thịnh Vượng"></li><li><img class="img-bank" id="101" src="https://www.baokim.vn/application/uploads/banks/dongabank.png" title="DongA Bank - Ngân hàng Đông Á"></li><li><img class="img-bank" id="64" src="https://www.baokim.vn/application/uploads/banks/acbbank.png" title="ACB - Ngân hàng Á Châu"></li><li><img class="img-bank" id="98" src="https://www.baokim.vn/application/uploads/banks/sacombank.png" title="Sacombank - Ngân hàng Sài Gòn Thương Tín"></li><li><img class="img-bank" id="61" src="https://www.baokim.vn/application/uploads/banks/mbbank.png" title="Ngânhàng Quân Đội (MB)"></li><li><img class="img-bank" id="112" src="https://www.baokim.vn/application/uploads/banks/agribank.png" title="Agribank - Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam"></li><li><img class="img-bank" id="62" src="https://www.baokim.vn/application/uploads/banks/vibbank.png" title="VIB - Ngân hàng Quốc Tế"></li><li><img class="img-bank" id="130" src="https://www.baokim.vn/application/uploads/banks/tienphongbank.png" title="TienPhongBank - Ngân hàng Tiên  Phong"></li><li><img class="img-bank" id="63" src="https://www.baokim.vn/application/uploads/banks/eximbank.png" title="Eximbank - Ngân hàng Xuất nhập khẩu"></li><li><img class="img-bank" id="148" src="https://www.baokim.vn/application/uploads/banks/shbbank.png" title="SHB - Ngân hàng Sài Gòn- Hà Nội"></li><li><img class="img-bank" id="150" src="https://www.baokim.vn/application/uploads/banks/baovietbank.png" title="BAOVIET Bank - Ngân hàng Bảo Việt"></li><li><img class="img-bank" id="151" src="https://www.baokim.vn/application/uploads/banks/50x34-ocb.png" title="OCB - Ngân hàng Phương Đông"></li><li><img class="img-bank" id="153" src="https://www.baokim.vn/application/uploads/banks/seabank.png" title="SeABank - Ngân hàng Đông Nam Á"></li><li><img class="img-bank" id="152" src="https://www.baokim.vn/application/uploads/banks/50x34-lienvietbank.png" title="LienVietBank - Ngân hàng Liên Việt"></li><li><img class="img-bank" id="154" src="https://www.baokim.vn/application/uploads/banks/abbank.png" title="ABBank - Ngân hàng An Bình"></li><li><img class="img-bank" id="94" src="https://www.baokim.vn/application/uploads/banks/hdbank.png" title="HDBank - Ngân hàng Phát triển nhà TPHCM"></li><li><img class="img-bank" id="96" src="https://www.baokim.vn/application/uploads/banks/namabank.png" title="Nam A Bank - Ngân hàng Nam Á"></li><li><img class="img-bank" id="114" src="https://www.baokim.vn/application/uploads/banks/vietabank.png" title="VietABank - Ngân hàng Việt Á"></li><li><img class="img-bank" id="115" src="https://www.baokim.vn/application/uploads/banks/gpbank.png" title="GP Bank - Ngân hàng dầu khí Toàn Cầu"></li><li><img class="img-bank" id="102" src="https://www.baokim.vn/application/uploads/banks/pgbank.png" title="PG Bank - Ngân Hàng TMCP Xăng Dầu"></li><li><img class="img-bank" id="129" src="https://www.baokim.vn/application/uploads/banks/bac_a.jpg" title="BACABank - Ngân hàng Bắc Á"></li><li><img class="img-bank" id="97" src="https://www.baokim.vn/application/uploads/banks/saigonbank.png" title="Saigonbank - Ngân hàng Sài Gòn Công Thương"></li><li><img class="img-bank" id="106" src="https://www.baokim.vn/application/uploads/banks/navibank.png" title="NaviBank - Ngân hàng Nam Việt"></li>                          </ul>
                                    </div>
                                  
                      </td>
                    </tr>
                  
                    <tr>
                      <td valign="top"><input type="radio" name="pay_method" value="7" class="pay_option"></td>
                      <td valign="top">
                        <div class="txt0">Thanh toán trực tuyến bằng thẻ quốc tế Visa</div>
                        
                                  <div class="pay_content" style="display:none;">
                                  <ul class="b_l">
                                <li><img class="img-bank" id="128" src="https://www.baokim.vn/application/uploads/banks/visa-master-50x34.png" title="Thẻ tín dụng quốc tế (Visa/Mastercard)"></li>                         
                                    </ul>
                                    </div>
                        
                      </td>
                    </tr>
                  
                  </tbody></table>
                </div><!--c3_box-->
                <div class="c3_box">
                  <div class="title_box_cart">Hình thức vận chuyển</div>
                  <div>
                    <table class="tbl_ship">
                      
                      <tbody><tr>
                        <td valign="top"><input type="radio" name="ship_method" value="1" class="ship_option"></td>
                        <td valign="top"><div class="txt0">Vận chuyển tính phí theo thỏa thuận</div>
                        <div class="ship_content" style="display:none;">Hình thức Vận chuyển tính phí theo thỏa thuận khi đơn hàng có bán kính &gt; 20Km. Quý khách vui lòng thỏa thuận giá vận chuyển với nhân viên tư vấn bán hàng</div></td>
                      </tr>
                      
                      <tr>
                        <td valign="top"><input type="radio" name="ship_method" value="2" class="ship_option"></td>
                        <td valign="top"><div class="txt0">Miễn phí trong nội thành Hà Nội</div>
                        <div class="ship_content" style="display:none;">Hình thức vận chuyển miễn phí trong nội thành Hà Nội</div></td>
                      </tr>
                      
                      <tr>
                        <td valign="top"><input type="radio" name="ship_method" value="3" class="ship_option"></td>
                        <td valign="top"><div class="txt0">Miễn phí trong 35 KM</div>
                        <div class="ship_content" style="display:none;">Hình thức vận chuyển miễn phí trong bán kính 35 km tính từ Công ty.</div></td>
                      </tr>
                      
                    </tbody></table>
                  </div>
                  <div class="clear"></div>
                </div><!--c3_box-->
              </div>
              <div class="c3_col_1 c3_col_2">
                <div class="title_box_cart"> Xác nhận đơn hàng</div>
                <div class="c3_box">
                  <div class="tbl_cart3">
                    <table style="border-collapse: collapse;border: 1px solid #ccc;width: 100%;">
                      
                      
                      
                      
                      <tbody><tr>
                        <td>1</td>
                        <td>  <a href="https://www.hanoicomputer.vn/may-choi-game-sony-playstation-ps4-slim-500gb-chinh-hang-kem-dia/p34993.html"><b>Máy chơi game SONY Playstation PS4 SLIM 500GB (CHÍNH HÃNG) </b></a>  </td>
                        <td><strong class="red">7.199.000 <u>đ</u></strong></td>
                        <td><input type="hidden" name="quantity_pro_34993" value="1">
                          1</td>
                      </tr>
                      
                      
                      <tr class="txt_16">
                        <td class="txt2 txt_right" colspan="4">
                          Tổng tiền
                          <strong class="red">7.199.000 <u>đ</u></strong><br>
                          (Chưa bao gồm phí vận chuyển)
                        </td>
                      </tr>
                    </tbody></table>
                    <div class="clear space2"></div>
                    <div style="">
                      <input type="submit" class="btn_red" value="Đặt hàng" style="width:100%;">
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              
              <input type="hidden" name="send_order" value="yes">
              <input type="hidden" name="item_update_quantity" id="item_update_quantity" value=",pro-34993,">
              <input type="hidden" name="update_quantity" value="yes">
              <input type="hidden" name="total_cart_value" id="total_cart_value" value="7199000">
            </form>

<script type="text/javascript">
    function check_field(){
        var error = "";
        var check_name = document.getElementById('buyer_name').value;
        if(check_name.length < 4) error += "- Bạn chưa nhập tên\n";

        var check_add = document.getElementById('buyer_address').value;
        if(check_add.length < 10) error += "- Bạn chưa nhập địa chỉ\n";
        var check_tel = document.getElementById('buyer_tel').value;
        if(check_tel.length < 4) error += "- Bạn chưa nhập SĐT\n";
        if(error != "") {
            alert(error); return false;
        }
        return true;
    }
  
  $('.img-bank').click(function () {
            $('.img-bank').removeClass('img-active');
            $(this).addClass('img-active');
            var id = $(this).attr('id');
            $('#bank_payment_method_id').val(id);
  
            $.session.set('pay',id);
        });

  $(".pay_option").change(function(){
    $(".pay_content").hide();
    $(this).parents("tr").find(".pay_content").show();
    $(this).parents("tr").find(".pay_content").find("li:eq(0) img").click();
  });
  
  $(".ship_option").change(function(){
    $(".ship_content").hide();
    $(this).parents("tr").find(".ship_content").show();
  });
</script> 
  </div><!--content-->
  <div class="clear"></div>
</div>