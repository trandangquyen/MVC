<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>CMS Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <style media="all" type="text/css">
        @import "admin/css/all.css";
    </style>
</head>
<body>
<div id="main">
    <div id="header"> <a href="#" class="logo"><img src="admin/img/logo.png" width="200" height="50" alt="" /></a>
        <ul id="top-navigation">
            <li class="active"><span><span>Trang chủ</span></span></li>
            <li><span><span><a href="#">Sản phẩm</a></span></span></li>
            <li><span><span><a href="#">Tin tức</a></span></span></li>
            <li><span><span><a href="#">Giới thiệu</a></span></span></li>
            <li><span><span><a href="#">Liên hệ</a></span></span></li>
            <li><span><span><a href="#">Cài đặt</a></span></span></li>
            <li><span><span><a href="#">Người dùng</a></span></span></li>
        </ul>
    </div>
    <div id="middle">
        <div id="left-column">
            <h3>Danh mục</h3>
            <ul class="nav">
                <li class="active"><a href="#">Sản phẩm</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li class="last"><a href="#">Nội dung khác</a></li>
            </ul>
            <a href="#" class="link">Link here</a> <a href="#" class="link">Link here</a> </div>
        <div id="center-column">
            <div class="top-bar"> <a href="#" class="button">Thêm mới</a>
                <h1>Nội dung đang xem</h1>
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
            <div class="table"> <img src="admin/img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="admin/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
                <table class="listing" cellpadding="0" cellspacing="0">
                    <tr>
                        <th class="first" width="177">Danh sách sản phẩm</th>
                        <th>Danh mục cha</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                        <th>Trạng thái</th>
                        <th>Chọn tất cả<input id="select-all" type="checkbox" name="select-all" value="select-all"></th>
                    </tr>
                    <tr>
                        <td class="first style3">HTC U Ultra </td>
                        <td>HTC</td>
                        <td><a href="#"><img src="admin/img/hr.gif" width="16" height="16" alt="" /></a></td>
                        <td><a href="#"><img src="admin/img/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
                        <td><img src="admin/img/pr-disable-icon.gif" width="16" height="16" alt="login" /></td>
                        <td class="last"><input type="checkbox" name="sp1" value="id-sp1"</td>
                    </tr>
                    <tr>
                        <td class="first style3">HTC Desire 628</td>
                        <td>HTC</td>
                        <td><a href="#"><img src="admin/img/hr.gif" width="16" height="16" alt="" /></a></td>
                        <td><a href="#"><img src="admin/img/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
                        <td><img src="admin/img/pr-disable-icon.gif" width="16" height="16" alt="login" /></td>
                        <td class="last"><input type="checkbox" name="sp2" value="id-sp2"/td>
                    </tr>
                    <tr>
                        <td class="first style3">6 GS63VR 6RF-07</td>
                        <td>MSI</td>
                        <td><a href="#"><img src="admin/img/hr.gif" width="16" height="16" alt="" /></a></td>
                        <td><a href="#"><img src="admin/img/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
                        <td><img src="admin/img/pr-active-icon.gif" width="16" height="16" alt="login" /></td>
                        <td class="last"><input type="checkbox" name="sp3" value="id-sp3"</td>
                    </tr>
                    <tr>
                        <td class="first style3">5 GS63VR 6RF-076VN</td>
                        <td>MSI</td>
                        <td><a href="#"><img src="admin/img/hr.gif" width="16" height="16" alt="" /></a></td>
                        <td><a href="#"><img src="admin/img/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
                        <td><img src="admin/img/pr-active-icon.gif" width="16" height="16" alt="login" /></td>
                        <td class="last"><input type="checkbox" name="sp4" value="id-sp4"</td>
                    </tr>
                    <tr>
                        <td class="first style3">4 GS63VR 6RF-076VN</td>
                        <td>MSI</td>
                        <td><a href="#"><img src="admin/img/hr.gif" width="16" height="16" alt="" /></a></td>
                        <td><a href="#"><img src="admin/img/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
                        <td><img src="admin/img/pr-active-icon.gif" width="16" height="16" alt="login" /></td>
                        <td class="last"><input type="checkbox" name="sp5" value="id-sp5"</td>
                    </tr>
                </table>
                <div class="task-bottom"><span><a class="add-product" href="themsp.php" >Thêm sản phẩm</a></span><span><a href="#">Xóa</a></span></div>
                <div class="select sl-page"> <strong>Other Pages: </strong>
                    <select>
                        <option>1</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="right-column"> <strong class="h">Thông tin</strong>
            <div class="box">Chọn danh mục ở bên trái và thao tác với các tùy chọn. Thêm sửa xóa sản phẩm</div>
        </div>
    </div>
    <div id="footer"></div>
</div>
<script type="text/javascript" src="public/themes/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="public/themes/js/admin.js"></script>
</body>
</html>
