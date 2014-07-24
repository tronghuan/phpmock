<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEB BÁN HÀNG</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Day1/public/user/css/style.css" />
<script type="text/javascript">
            function CheckDelete(){

                    r = confirm("Ban co muon xoa khong?");
                    if(r == false) return false;
                    else return true;
                                               
            }
</script>
</head>
<body>
	<div id="banner">&nbsp;</div>
    <div id="menu"><h1>Trang quản lý</h1></div>
    <div id="main">
    	<div id="left">
        	<div class="category">
            	<h1>MENU CHỨC NĂNG</h1>
                <ul>
    	        	<li><a href="http://localhost/Day1/administrator/user/listuser">Quản lý thành viên</a></li>
                    <li><a href="http://localhost/Day1/administrator/category/listcategory">Quản lý category</a></li>
					<li><a href="http://localhost/Day1/administrator/bran/listbran">Quản lý Bran</a></li>
                    <li><a href="#">Quản lý sản phẩm</a></li>
	            </ul>
            </div>
            <div class="category" style="margin-top:10px; border-top:1px solid #CCC; background:#FFF;">
            	<p>Chào bạn: admin</p>
                <p><a href="#">Đăng xuất tài khoản</a></p>
            </div>
        </div>
		<div id="center">
        <h3>Danh sách các user</h3>
<?php

 
        echo "<table border='1' cellpadding='0' cellspacing='0'>";
        echo "<tr>";
        echo "<td>Tên</td>";
        echo "<td>Giới tính</td>";
        echo "<td>Email</td>";
        echo "<td>Địa chỉ</td>";
        echo "<td>Số điện thoại</td>";
        echo "<td>Cấp độ</td>";
        echo "<td>Update</td>";
        echo "<td>Delete</td>";
        echo "</tr>";
        
    foreach($listuser as $list)
    {
        echo "<tr>";
        echo "<td>".$list['usr_name']."</td>";
        echo "<td>";
        echo $list['usr_gender'] == 1 ? "Nam" : "Nu";
        echo "</td>";
        echo "<td>".$list['usr_email']."</td>";
        echo "<td>".$list['usr_address']."</td>";
        echo "<td>".$list['usr_phone']."</td>";
        echo "<td>".$list['usr_level']."</td>";
        echo "<td><a href='/Day1/administrator/user/update/".$list['usr_id']."'>Update</a></td>";
        echo "<td><a href='/Day1/administrator/user/delete/".$list['usr_id']."' onclick='if(CheckDelete() == false) return false'>Delete</a></td>";
        echo "</tr>";
    }
    echo "<table>";
    echo "<a href='/Day1/administrator/user/insert'>Insert</a>";
    echo $this->pagination->create_links(); 
    
     ?>
    
        </div>
    </div>
    <div id="footer">
    	Training PHP Project 
    </div>
</body>
</html>



