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
                            <label for="product-name">Tiêu đề</label>
                            <input type="text" class="form-control" id="product-name" name="news[title]" placeholder="TIêu đề" value="<?=$news->title?>">
                        </div>
                        <div class="form-group">
                            <label for="product-descript">Nội dung</label>
                            <textarea name="news[content]" id="editor1" rows="10" cols="80"><?=$news->content?></textarea>
                        </div>
                        <button type="submit" id="add-product" class="btn btn-default">Cập nhập</button>
                    </form>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace( 'editor1' );
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
