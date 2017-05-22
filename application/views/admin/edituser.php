<div class="clearfix"></div>
            <?php 
            if(isset($error))
            echo '<div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              '.$error.'
            </div>';
        elseif(isset($success))
            echo '<div class="alert alert-info" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              '.$success.'
            </div>';
            ?>
                <div class="product-info">
                    <form method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="product-name">Tên người dùng</label>
                            <input type="text" class="form-control" id="product-name" name="user[name]" placeholder="Tên người dùng" value="<?=$user['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="product-name">Email</label>
                            <input type="text" class="form-control" id="product-name" name="user[email]" placeholder="Tên người dùng" value="<?=$user['email'] ?>">
                        </div>
                        <label class="radio-inline"><input type="radio" name="user[admin]" value="1"<?=($user['admin']==1 ? ' checked="checked"' :'')?>>Quản trị viên</label>
                        <label class="radio-inline"><input type="radio" name="user[admin]"<?=($user['admin']!=1 ? ' checked="checked"' :'')?>>Người dùng</label>

                        <br />
                        <button type="submit" id="add-product" class="btn btn-default">Cập nhập</button>
                    </form>
                </div>
