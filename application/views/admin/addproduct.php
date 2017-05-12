
                <div class="product-info">
                    <form>
                        <div class="form-group">
                            <label for="product-name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="product-price">Giá sản phẩm</label>
                            <input type="number" class="form-control" id="product-price" name="product-price" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="product-descript">Mô tả</label>
                            <textarea class="form-control" rows="7" id="product-descript" name="product-descript"></textarea>
                        </div>
                        <div class="form-group product-picture">
                            <label for="InputFile">Ảnh sản phẩm:</label>
                            <input type="file" id="picture1">
                            <input type="file" id="picture2">
                            <input type="file" id="picture3">
                            <input type="file" id="picture4">
                            <input type="file" id="picture5">
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
