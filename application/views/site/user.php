<table id="tb-account">
        <tbody><tr>
          <td id="account-left">
            <dl>
              <dt>Đơn hàng đặt mua</dt>
              <dd><a href="?view=account-order">Danh sách đơn hàng</a></dd>
            </dl>
            
            <dl>
              <dt>Hoạt động cá nhân</dt>
              <dd><a href="?view=account-pro-save">Sản phẩm đang lưu</a></dd>
              
            </dl>
            
            <dl>
              <dt>Thông tin tài khoản</dt>
              <dd><a href="?view=account-info">Thông tin cá nhân</a></dd>
              <dd><a href="?view=account-change-pass">Thay đổi mật khẩu</a></dd>
              
            </dl>
            
            <div><a href="/logout.php">Log-out</a></div>
            
          </td>
          
          <td valign="top">
            
            <h3>Cập nhật thông tin cá nhân</h3>

<form method="post" enctype="multipart/form-data" name="account_form">

<table cellpadding="5" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; width:100%">
    <tbody><tr>
        <td>Họ tên</td>
        <td><input type="text" name="fullname" id="fullname" size="40" value="Võ Văn Khoa" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;"></td>
    </tr>
    <tr>
        <td>Giới tính</td>
        <td>
                    <input type="radio" name="sex" value="m">Nam &nbsp;<input type="radio" name="sex" value="f" checked="">Nữ 
            </td>
    </tr>
    <tr>
        <td>Địa chỉ email</td>
        <td><input type="text" name="email" id="email" size="40" value="khoazero123@gmail.com">
            <input type="hidden" name="old_email" id="old_email" value="khoazero123@gmail.com"></td>
    </tr>       
    <tr>
        <td>Địa chỉ nhà</td>
        <td><input type="text" name="address" id="address" value="Số 3, ngõ 18, phố Hàm Nghi, Từ Liêm, hà Nội" size="50"></td>
    </tr>       
    <tr>
        <td>Tỉnh / TP</td>
        <td>
        <select name="province">
                                                <option value="1" selected="selected">Hà nội</option>
                                                                <option value="2">TP HCM</option>
                                                                <option value="5">Hải Phòng</option>
                                                                <option value="4">Đà Nẵng</option>
                                                                <option value="6">An Giang</option>
                                                                <option value="7">Bà Rịa-Vũng Tàu</option>
                                                                <option value="13">Bình Dương</option>
                                                                <option value="15">Bình Phước</option>
                                                                <option value="16">Bình Thuận</option>
                                                                <option value="14">Bình Định</option>
                                                                <option value="8">Bạc Liêu</option>
                                                                <option value="10">Bắc Giang</option>
                                                                <option value="9">Bắc Kạn</option>
                                                                <option value="11">Bắc Ninh</option>
                                                                <option value="12">Bến Tre</option>
                                                                <option value="18">Cao Bằng</option>
                                                                <option value="17">Cà Mau</option>
                                                                <option value="3">Cần Thơ</option>
                                                                <option value="24">Gia Lai</option>
                                                                <option value="25">Hà Giang</option>
                                                                <option value="26">Hà Nam</option>
                                                                <option value="27">Hà Tĩnh</option>
                                                                <option value="30">Hòa Bình</option>
                                                                <option value="28">Hải Dương</option>
                                                                <option value="29">Hậu Giang</option>
                                                                <option value="31">Hưng Yên</option>
                                                                <option value="32">Khánh Hòa</option>
                                                                <option value="33">Kiên Giang</option>
                                                                <option value="34">Kon Tum</option>
                                                                <option value="35">Lai Châu</option>
                                                                <option value="38">Lào Cai</option>
                                                                <option value="36">Lâm Đồng</option>
                                                                <option value="37">Lạng Sơn</option>
                                                                <option value="39">Long An</option>
                                                                <option value="40">Nam Định</option>
                                                                <option value="41">Nghệ An</option>
                                                                <option value="42">Ninh Bình</option>
                                                                <option value="43">Ninh Thuận</option>
                                                                <option value="44">Phú Thọ</option>
                                                                <option value="45">Phú Yên</option>
                                                                <option value="46">Quảng Bình</option>
                                                                <option value="47">Quảng Nam</option>
                                                                <option value="48">Quảng Ngãi</option>
                                                                <option value="49">Quảng Ninh</option>
                                                                <option value="50">Quảng Trị</option>
                                                                <option value="51">Sóc Trăng</option>
                                                                <option value="52">Sơn La</option>
                                                                <option value="53">Tây Ninh</option>
                                                                <option value="56">Thanh Hóa</option>
                                                                <option value="54">Thái Bình</option>
                                                                <option value="55">Thái Nguyên</option>
                                                                <option value="57">Thừa Thiên-Huế</option>
                                                                <option value="58">Tiền Giang</option>
                                                                <option value="59">Trà Vinh</option>
                                                                <option value="60">Tuyên Quang</option>
                                                                <option value="61">Vĩnh Long</option>
                                                                <option value="62">Vĩnh Phúc</option>
                                                                <option value="63">Yên Bái</option>
                                                                <option value="19">Đắk Lắk</option>
                                                                <option value="22">Đồng Nai</option>
                                                                <option value="23">Đồng Tháp</option>
                                                                <option value="21">Điện Biên</option>
                                                                <option value="20">Đăk Nông</option>
                                    </select>
       </td>
    </tr>
    <tr>
        <td>Điện thoại cố định</td>
        <td><input type="text" name="telephone" id="telephone" size="40" value=""></td>
    </tr>   
    <tr>
        <td>Điện thoại di động</td>
        <td><input type="text" name="mobile" id="mobile" size="40" value="0963212280"></td>
    </tr>   
</tbody></table>
<input type="hidden" name="update" value="yes">
<div style="padding-top:5px; padding-bottom:10px;"><input type="submit" value="Thay đổi"></div>
 </form>

            
          </td>
        </tr>
      </tbody></table>
      