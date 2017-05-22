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
                            <label for="namecompany">Tên công ty</label>
                            <input type="text" class="form-control" id="namecompany" name="support[namecompany]" placeholder="Tên công ty" value="<?=$support->namecompany?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoai</label>
                            <input type="int" class="form-control" id="phone" name="support[phone]" placeholder="Số điện thoai" value="<?=$support->phone?>">
                        </div>
                        <div class="form-group">
                            <label for="hotline">Hotline</label>
                            <input type="int" class="form-control" id="hotline" name="support[hotline]" placeholder="Hotline" value="<?=$support->hotline?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="support[email]" placeholder="Email" value="<?=$support->email?>">
                        </div>
                        <div class="form-group">
                            <label for="skype">Skype</label>
                            <input type="text" class="form-control" id="skype" name="support[skype]" placeholder="Skype" value="<?=$support->skype?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="support[address]" placeholder="Address" value="<?=$support->address?>">
                        </div>
                        <div class="form-group">
                            <label for="support-gioithieu">Giới thiệu công ty</label>
                            <textarea name="support[gioithieu]" id="gioithieu" rows="130" cols="80">
                                <?=$support->gioithieu?>
                            </textarea>
                        </div>
                        <button type="submit" id="updatesupport" class="btn btn-default">Cập nhập</button>
                    </form>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace( 'gioithieu' );
                </script>
                <script>
                    $(function() {

                        $('#chkveg').multiselect({

                            includeSelectAllOption: true

                        });

                        $('#btnget').click(function() {

                            alert($('#chkveg').val());

                        })

                    });
                </script>
