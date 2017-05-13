
            <div class="top-bar"> <a href="admin/category/add" class="button">Thêm mới</a>
                <h1>Quản trị thể loại</h1>
                <div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Thể loại</a></div>
            </div>
            <br />
            <!-- <div class="select-bar">
                <label>
                    <input type="text" name="textfield" />
                </label>
                <label>
                    <input type="submit" name="Submit" value="Tìm kiếm" />
                </label>
            </div> -->
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
            <div class="table"> <img src="public/admin/img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="public/admin/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
            <form method="POST">
                <div class="cont-products">
                
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="first" width="177">Danh sách thể loại</th> 
                            <th>Danh mục cha</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                            <th>Chọn tất cả<input id="select-all" type="checkbox" name="select-all" value="select-all"></th>
                        </tr>
                        <?php 
                    foreach ($categorys as $category) { 
                        echo '<tr>
                            <td class="first style3">'.$category['name'].'</td>
                            <td>HTC</td>
                            <td><a href="admin/category/delete/'.$category['id'].'"><img src="public/admin/img/hr.gif" width="16" height="16" alt="Delete" /></a></td>
                            <td><a href="admin/category/edit/'.$category['id'].'"><img src="public/admin/img/edit-icon.gif" width="16" height="16" alt="Edit" /></a></td>
                            <td class="last"><input type="checkbox" name="delete[]" value="'.$category['id'].'"</td>
                        </tr>';
                        if(!empty($category['data'])) foreach ($category['data'] as $subCategory) {
                            echo '<tr>
                                <td class="first style3">'.$subCategory['name'].'</td>
                                <td>HTC</td>
                                <td><a href="admin/category/delete/'.$subCategory['id'].'"><img src="public/admin/img/hr.gif" width="16" height="16" alt="Delete" /></a></td>
                                <td><a href="admin/category/edit/'.$subCategory['id'].'"><img src="public/admin/img/edit-icon.gif" width="16" height="16" alt="Edit" /></a></td>
                                <td class="last"><input type="checkbox" name="delete[]" value="'.$subCategory['id'].'"</td>
                            </tr>';
                        }
                    }
                    ?>
                    
                    </table>
                    
                </div>

                <div class="pagination" style="display: table;margin: 0 auto;"><div class="pagination-page"><?=$this->pagination->create_links();?></div></div>

                <div class="task-bottom"><span><input type="submit" class="" value="Xóa"></span></div>
                </form>
                <div class="select sl-page"> <strong>Other Pages: </strong>
                    <select>
                        <option>1</option>
                    </select>
                </div>
            </div>