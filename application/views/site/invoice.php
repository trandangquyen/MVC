
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice #<?=$order['id']?></title>

    <link href="public/themes/css/flathost.all.min.css" rel="stylesheet">
    <link href="public/themes/css/flathost.invoice.css" rel="stylesheet">

</head>
<body>

    <div class="container-fluid invoice-container">

        
            <div class="row">
                <div class="col-sm-7">
                                        <h3>Invoice #<?=$order['id']?></h3>
                                        <strong>Ngày lập hóa đơn:</strong> <?=$order['date']?>

                </div>
                <div class="col-sm-5 text-center">

                    <div class="invoice-status">
                        <span class="unpaid">Chưa thanh toán</span>
                    </div>
                </div>
            </div>

            <hr>

            
            <div class="row">
                <div class="col-sm-6 pull-sm-right text-right-sm">
                    <strong>Thanh toán đến:</strong>
                    <address class="small-text">
                        FGC
                    </address>
                </div>
                <div class="col-sm-6">
                    <strong>Người thanh toán:</strong>
                    <address class="small-text">
                        <?=isset($user['name']) ? $user['name'] : 'No name' ?><br />
                        <?=isset($user['address']) ? $user['address'] : '' ?></address>
                </div>
            </div>

            <br />

            
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Đơn hàng</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Tên SP</strong></td>
                                    <td><strong>Số lượng</strong></td>
                                    <td width="20%" class="text-center"><strong>Thành tiền</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($order['products'] as $item) {
                                echo '<tr>
                                    <td>'.$item['name'].'</td>
                                    <td>'.$item['quantity'].'</td>
                                    <td class="text-center">'.($item['price']*$item['quantity']).'</td>
                                </tr>';
                                }
                                ?>

                                <tr><td></td><td></td><td></td></tr>
                                <tr>
                                    <td>Promotional Code: NULL *</td>
                                    <td></td>
                                    <td class="text-center">$0 USD</td>
                                </tr>
                                <tr>
                                    <td class="total-row text-right"><strong>Total</strong></td>
                                    <td class="total-row"></td>
                                    <td class="total-row text-center"><?=$order['price']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="pull-right btn-group btn-group-sm hidden-print">
                <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <!-- <a href="dl.php?type=i&amp;id=7050" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
            </div>

        
    </div>

    <p class="text-center hidden-print"><a href="./">&laquo; Back to Home</a></a></p>

</body>
</html>
