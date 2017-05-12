
            <div class="top-bar"> <a href="#" class="button">Thêm mới</a>
                <h1>Quản trị sản phẩm</h1>
                <div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Sản phẩm</a></div>
            </div>
            <br />
            <div class="select-bar">
                <label>
                    <input type="text" name="textfield" />
                </label>
                <label>
                    <input type="submit" name="Submit" value="Tìm kiếm" />
                </label>
            </div>
            <div class="table"> <img src="public/admin/img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="public/admin/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
            <form method="POST">
                <div class="cont-products">
                
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="first" width="177">Danh sách sản phẩm</th> 
                            <th>Danh mục cha</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                            <th>Lượt xem</th>
                            <th>Chọn tất cả<input id="select-all" type="checkbox" name="select-all" value="select-all"></th>
                        </tr>
                        <?php 
                    foreach ($products as $product) {
                        echo '<tr>
                            <td class="first style3">'.$product['name'].'</td>
                            <td>HTC</td>
                            <td><a href="admin/product/delete/'.$product['id'].'"><img src="public/admin/img/hr.gif" width="16" height="16" alt="Delete" /></a></td>
                            <td><a href="admin/product/edit/'.$product['id'].'"><img src="public/admin/img/edit-icon.gif" width="16" height="16" alt="Edit" /></a></td>
                            <td>'.$product['views'].'</td>
                            <td class="last"><input type="checkbox" name="delete[]" value="'.$product['id'].'"</td>
                        </tr>';
                    }
                    ?>
                    
                    </table>
                    
                </div>

                <div class="pagination" style="display: table;margin: 0 auto;"><div class="pagination-page"><?=$this->pagination->create_links();?></div></div>

                <div class="task-bottom"><span><a class="add-product" href="themsp.php" >Thêm sản phẩm</a></span><span><input type="submit" class="" value="Xóaa"></span></div>
                </form>
                <div class="select sl-page"> <strong>Other Pages: </strong>
                    <select>
                        <option>1</option>
                    </select>
                </div>
            </div>