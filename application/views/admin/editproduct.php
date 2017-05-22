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
                            <input type="text" class="form-control" id="product-name" name="product[name]" placeholder="Tên sản phẩm" value="<?=$product->name?>">
                        </div>
                        <div class="form-group">
                            <label for="product-price">Giá sản phẩm</label>
                            <input type="number" class="form-control" id="product-price" name="product[price]" placeholder="Giá sản phẩm" value="<?=$product->price?>">
                        </div>
                        <div class="pr-category">
                            <label for="chkveg">Chọn danh mục sản phẩm</label>
                            <select id="chkveg" multiple="multiple" name="product[categorys][]">
                                <?php 
                                foreach ($categorys as $category) {
                                    echo '<option class="parent" value="'.$category['id'].'"'.(array_key_exists($category['id'],$product->category_name) ? ' selected' : '').'>--'.$category['name'].'--</option>';
                                    if(!empty($category['data'])) 
                                        foreach ($category['data'] as $subCategory)
                                            echo '<option value="'.$subCategory['id'].'"'.(array_key_exists($subCategory['id'],$product->category_name) ? ' selected' : '').'>'.$subCategory['name'].'</option>';
                                }
                                ?>
                            </select><br /><br />
                        </div>
                        <div class="form-group">
                            <label for="product-descript">Mô tả</label>
                            <textarea name="product[description]" id="editor1" rows="10" cols="80">
                                <?=$product->description?>
                            </textarea>
                        </div>
                        <!-- <div class="form-group product-picture">
                            <label for="InputFile">Ảnh sản phẩm:</label>
                            <input type="file" name="product[image][]" id="picture1" class="show">
                            <input type="file" name="product[image][]" id="picture2">
                            <input type="file" name="product[image][]" id="picture3">
                            <input type="file" name="product[image][]" id="picture4">
                            <input type="file" name="product[image][]" id="picture5">
                            <p class="help-block">Chú ý:Điền đầy đủ thông tin trước khi thêm mới sản phẩm!</p>
                        </div> -->
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="product[display]"<?=$product->display ? ' checked' :'' ?>> Cho sản phẩm hiển thị?
                            </label>
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
