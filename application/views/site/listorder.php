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
      </style>
      
      <table id="tb-account">
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
            
                
<h3>Danh sách đơn hàng</h3>


 
    
    <table width="100%" border="1" bordercolor="#CCCCCC" style="border-collapse:collapse;" cellpadding="4" cellspacing="0">
            <tbody><tr bgcolor="#FFCC00" style="font-weight:bold;">
                <td>STT</td>
                <td>Số đơn hàng</td>
                <td>Giá trị</td>
                <td>Thời gian</td>
                <td>Thông tin</td>
            </tr>
            
        <?php 
        $i=1;
        if(!empty($orders)) foreach ($orders as $order) {
            echo '<tr>
                <td>'.$i.'</td>
                <td>#5533 <a href="order/'.$order['id'].'">Xem chi tiết</a></td>
                <td>'.$order['price'].'</td>
                <td>'.$order['date'].'</td>
                <td>Chưa xử lý</td>
            </tr>';
            $i++;
        }
        else echo 'Chưa có đơn hàng nào';
        ?>
            

        
        </tbody></table>
    <br>
        

            
          </td>
        </tr>
      </tbody></table>
  </div>