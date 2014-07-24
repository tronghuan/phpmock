<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEB BÁN HÀNG</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Day1/public/bran/css/style.css" />
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
        		<h1>Update nhãn hàng</h1>
                <form action="" method="post">
                	<label>Tên nhãn hàng</label>
                   	<input type="text" name="name" value="<?php echo $branInfo['bran_name']; ?>" size="30" />
                    <?php echo form_error("name"); ?>
                    <?php echo isset($errorName) ? $errorName : ""; ?>
                    
                    
                    <br />  
                    <label>&nbsp;</label> 
                    <input type="submit" name="ok" value="Update" />
                    <input type="reset" value="Reset" />                                  
                </form>
        </div>
    </div>
    <div id="footer">
    	Training PHP Project 
    </div>
</body>
</html>
