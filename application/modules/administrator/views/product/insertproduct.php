<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEB BÁN HÀNG</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/news/css/style.css" />
<script src="/Day1/js/jquery.js"></script>
    <script>
$(document).ready(function(){

     $(".delete").click(function(e){
        
       alert("Delete?");
         e.preventDefault(); 
         var href = $(this).attr("href");
     
         var parent = $(this).parent();

        $.ajax({
          type: "GET",
          url: href,
          async: true,
          success: function(response) {
          parent.fadeOut('slow', function() {$(this).remove();});
        

            
          

       }
    });

   })
  });
    
    
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
                <h1>Update product</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="pro_name" value="" />
                    <?php echo form_error("pro_name"); ?>
                    <?php echo isset($errorName) ? $errorName : ""; ?>
                    <br />
                    <label>Giá</label>
                    <input type="text" name="pro_price" value="" size="30" />
                    <?php echo form_error("pro_price"); ?>
                    
                    <br />
                    <label>Giá khuyến mại</label>
                    <input type="text" name="pro_price_sale" value="" size="30" />
                    <?php echo form_error("pro_price_sale"); ?>
                    <br />

         
                    <br />
                    <br />
                    <label>Ảnh đại diện</label>
                    <input type="file" name="pro_images" id="file" />
                   
                    <br />
                    <br />
                    <br />
                    <label>Mô tả sản phẩm</label>
                    <textarea name="pro_desc"></textarea>
                    
                    <?php echo form_error("pro_desc"); ?>
                    <br />   
                    <label>Thông tin sản phẩm</label>
                    <textarea name="pro_info"></textarea>
                
                    <?php echo form_error("pro_info"); ?>
                    <br />
                    <label>Số lượng</label>
                    <input type="text" name="pro_quantity" value="" size="30" />
                    <?php echo form_error("pro_quantity"); ?>
                    <br /> 
                    
                    <label>Trạng thái sản phẩm</label>
                    Active&nbsp;<input type="radio" name="pro_status" value="1" checked='checked'  />
                    Disable&nbsp;<input type="radio" name="pro_status" value="2"  /> 
                    <?php echo form_error("pro_status"); ?>
                    <br />
                    <br />
                    <br />
                    <label>Category</label>
                    <br /> <br />
                    <div class="category_list">
                     <?php 
                            $stt = 1;

                            foreach($listCategory as $key=>$val){
                         
                              $name = '<input  type="checkbox" name="category[]" value="'.$val['cate_id'].'" /> '.$val['cate_name'];
                                   
                              
                                echo $name;
                                 echo "<br>";
                            }
                    ?>     
                    </div> 
                    <?php echo isset($error['errorCategory']) ? $error['errorCategory'] : ""; ?>  

                    <?php echo isset($error['errorCategory']) ? $error['errorCategory'] : ""; ?> 
                    <br />
                    <br />
                    <label>Nhãn hàng</label>
                        <select style="width: 150px;" name="bran_id">
                                <option value="">Select bran</option>
                                <?php if(isset($bran) && $bran != null) {
                                    foreach($bran as $listBran) {
                                        if($productInfo['bran_id'] == $listBran['bran_id']) {
                                            $selected = "selected='selected'";
                                        }else{
                                            $selected = "";
                                        }
                                        echo "<option $selected value='".$listBran['bran_id']."'>".$listBran['bran_name']."</option>";    
                                    }} 
                                ?>
                    </select>  
                    <br />
                    
                    <label>Xuất xứ</label>
                        <select style="width: 150px;" name="country_id">
                                <option value="">Select country</option>
                                <?php if(isset($country) && $country != null) {
                                    foreach($country as $listCountry) {
                                        if($productInfo['country_id'] == $listCountry['coun_id']) {
                                            $selected = "selected='selected'";
                                        }else{
                                            $selected = "";
                                        }
                                        echo "<option $selected value='".$listCountry['coun_id']."'>".$listCountry['coun_name']."</option>";    
                                    }} 
                                ?>
                    </select>
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
