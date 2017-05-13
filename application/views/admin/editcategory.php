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
                            <label for="product-name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="product-name" name="category[name]" placeholder="Tên thể loại" value="<?=$category->name ?>">
                        </div>
                        <div class="pr-category">
                            <label for="chkveg">Chọn danh mục cha</label>
                            <select id="chkveg" name="category[perent]">
                                <option class="parent" value="0">-- root --</option>
                                <?php 
                                foreach ($categorys as $mainCategory) {
                                    echo '<option class="parent" value="'.$mainCategory['id'].'"'.($category->parent == $mainCategory['id'] ? ' selected' : '').'>--'.$mainCategory['name'].'--</option>';
                                }
                                ?>


                            </select><br /><br />
                        </div>
                        <div class="form-group">
                            <label for="product-descript">Mô tả</label>
                            <textarea name="category[description]" rows="10" cols="80"><?=$category->description ?></textarea>
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
