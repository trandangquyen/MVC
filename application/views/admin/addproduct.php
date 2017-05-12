
                <div class="product-info">
                    <form method="post" action="sanpham.php">

                        <div class="form-group">
                            <label for="product-name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="product-price">Giá sản phẩm</label>
                            <input type="number" class="form-control" id="product-price" name="product-price" placeholder="Giá sản phẩm">
                        </div>
                        <div class="pr-category">
                            <label for="chkveg">Chọn danh mục sản phẩm</label>
                            <select id="chkveg" multiple="multiple">

                                <option value="cheese">Cheese</option>

                                <option value="tomatoes">Tomatoes</option>

                                <option value="mozarella">Mozzarella</option>

                                <option value="mushrooms">Mushrooms</option>

                                <option value="pepperoni">Pepperoni</option>

                                <option value="onions">Onions</option>

                            </select><br /><br />

                            <input type="button" id="btnget" value="Get Selected Values" />

                        </div>
                        <div class="form-group">
                            <label for="product-descript">Mô tả</label>
                            <textarea name="editor1" id="editor1" rows="10" cols="80">
                             Nhập miêu tả về sản phẩm.
                            </textarea>
                        </div>
                        <div class="form-group product-picture">
                            <label for="InputFile">Ảnh sản phẩm:</label>
                            <input type="file" name=anh[] id="picture1" class="show">
                            <input type="file" name=anh[] id="picture2">
                            <input type="file" name=anh[] id="picture3">
                            <input type="file" name=anh[] id="picture4">
                            <input type="file" name=anh[] id="picture5">
                            <p class="help-block">Chú ý:Điền đầy đủ thông tin trước khi thêm mới sản phẩm!</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Cho sản phẩm hiển thị?
                            </label>
                        </div>
                        <button type="submit" id="add-product" class="btn btn-default">Thêm mới</button>
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
