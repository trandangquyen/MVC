<div id="content">
    <style type="text/css">
          #tb-account { width:100%; border-collapse:collapse}
          #account-left { width:220px; vertical-align:top; padding-right:30px;}
          h2,h3{margin-top:0;}
          #account-left dt {
            font-weight: bold;
            line-height: 26px;
            background:#D11A1A;
            color: white;
            padding: 0 8px;
            }
          #account-left dd, dt, dl{ margin:0; padding:0}
          #account-left dl { margin-bottom:10px}
          #account-left a {
            color: #383838;
            text-decoration: none;
            line-height: 30px;
            }
      </style><table id="tb-account">
        <tbody><tr>
          <td id="account-left">
            <dl>
              <dt>Đơn hàng đặt mua</dt>
              <dd><a href="user/listorder">Danh sách đơn hàng</a></dd>
            </dl>
            
            <dl>
              <dt>Thông tin tài khoản</dt>
              <dd><a href="user/info">Thông tin cá nhân</a></dd>
              
            </dl>
            
            <div><a href="logout">Logout</a></div>
            
          </td>
          
          <td valign="top">
            
            <h3>Cập nhật thông tin cá nhân</h3>

<form method="post" enctype="multipart/form-data" name="account_form">

<table cellpadding="5" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse; width:100%">
    <tbody><tr>
        <td>Họ tên</td>
        <td><input type="text" name="fullname" id="fullname" size="40" value="<?=$user['name']?>"></td>
    </tr>
    <tr>
        <td>Giới tính</td>
        <td>
                    <input type="radio" name="sex" value="m">Nam &nbsp;<input type="radio" name="sex" value="f" checked="">Nữ 
            </td>
    </tr>
    <tr>
        <td>Địa chỉ email</td>
        <td><input type="text" name="email" id="email" size="40" value="<?=$user['email']?>"></td>
    </tr>       
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="address" id="address" value="<?=$user['address']?>" size="50"></td>
    </tr>        
    <tr>
        <td>Điện thoại di động</td>
        <td><input type="text" name="mobile" id="mobile" size="40" value="<?=$user['phone']?>"></td>
    </tr>   
</tbody></table>
<input type="hidden" name="update" value="yes">
<div style="padding-top:5px; padding-bottom:10px;"><input type="submit" value="Thay đổi"></div>
 </form>

            
          </td>
        </tr>
      </tbody></table>
      </div>