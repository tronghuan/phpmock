<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEB BÁN HÀNG</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/phpmock/css/style.css" />
<script type="text/javascript">
            function CheckDelete(){

                    r = confirm("Bạn chắc chắn xoá không?");
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
                    <li><a href="<?php echo base_url('administrator/user/listuser');?>">Quản lý thành viên</a></li>
                    <li><a href="<?php echo base_url('administrator/cate/listcate');?>">Quản lý chuyên mục</a></li>
                    <li><a href="<?php echo base_url('administrator/product/listproduct');?>">Quản lý sản phẩm</a></li>
                    <li><a href="<?php echo base_url('administrator/bran/listbran');?>">Quản lý thương hiệu</a></li>
                </ul>
            </div>
            <div class="category" style="margin-top:10px; border-top:1px solid #CCC; background:#FFF;">
                <?php
                    
                    // $ob = new user();
                    // $usrname = $ob->session->userdata['user'];
                    // print_r($usrname);
                ?>
                 <p>Chào bạn: Admin<?php //echo $usrname['usr_name']; ?></p>
                <p><a href="#">Đăng xuất tài khoản</a></p>
            </div>
        </div>

    