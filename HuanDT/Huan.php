<?php
// update user controllers
public function update(){
		$usr_id = $this->uri->segment(3);
		$data['userInfo'] = $this->users_model->detail($usr_id);
		if($this->input->post("ok")){
			 $this->form_validation->set_rules("usr_name", "Ten thanh vien", "trim|required");
            $this->form_validation->set_rules("usr_password", "Ten thanh vien", "trim|required");
            $this->form_validation->set_rules("usr_email", "Email", "trim|required|valid_email");
            $this->form_validation->set_rules("usr_address", "Dia chi khach hang", "trim|required");
            $this->form_validation->set_rules("usr_phone", "So dien thoai", "trim|required");
            $this->form_validation->set_rules("usr_gender", "Gioi tinh", "trim|required");
            $this->form_validation->set_rules("usr_level", "Level", "trim|required");

			$this->form_validation->set_message("required", "%s khong duoc bo trong");
			$this->form_validation->set_message("min_length", "%s khong duoc nho hon %d ky tu");
			$this->form_validation->set_message("matches", "%s khong dung");
			$this->form_validation->set_message("valid_email", "%s khong dung dinh dang");
			$this->form_validation->set_message("numeric", "%s phai la so");

			$this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
			if($this->form_validation->run()){
                 $dataUser = array(
                                "usr_name"=>$this->input->post("usr_name"),
                                "usr_password"=>$this->input->post("usr_password"),
                                "usr_email"=>$this->input->post("usr_email"),
                                "usr_address"=>$this->input->post("usr_address"),
                                "usr_phone"=>$this->input->post("usr_phone"),
                                "usr_gender"=>$this->input->post("usr_gender"),
                                "usr_level"=>$this->input->post("usr_level")
                            );
                $this->users_model->update($dataUser,$usr_id);
                redirect(base_url("/test/users/listusers"));
            }
		}
		$this->load->view("user/update", $data);
}
// update user model
public function update($data, $usr_id){
        $this->db->where("usr_id = $usr_id");
        $this->db->update($this->_table, $data);
}
?>

// update.php view
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEB BÁN HÀNG</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/test/public/users/css/style.css" />
</head>
<body>
    <div id="banner">&nbsp;</div>
    <div id="menu"><h1>Trang quản lý</h1></div>
    <div id="main">
        <div id="left">
            <div class="category">
                <h1>MENU CHỨC NĂNG</h1>
                <ul>
                    <li><a href="http://localhost/test/users/listusers">Quản lý thành viên</a></li>
                    <li><a href="#">Quản lý chuyên mục</a></li>
                    <li><a href="#">Quản lý sản phẩm</a></li>
                </ul>
            </div>
            <div class="category" style="margin-top:10px; border-top:1px solid #CCC; background:#FFF;">
                <p>Chào bạn: admin</p>
                <p><a href="#">Đăng xuất tài khoản</a></p>
            </div>
        </div>
        <div id="center">
                <h1>Update thành viên</h1>
                <form action="" method="post">
                    <label>Username</label>
                    <input type="text" name="usr_name" value="<?php echo $userInfo['usr_name']; ?>" size="30" />
                    <?php echo form_error("usr_name") ?>
                    <br />
                    <label>Password</label>
                    <input type="text" name="usr_password" value="<?php echo $userInfo['usr_password']; ?>" size="30" />
                    <?php echo form_error("user_password") ?>
                    <br />
                    <label>Email</label>
                    <input type="text" name="usr_email" value="<?php echo $userInfo['usr_email']; ?>" size="30" />
                    <?php echo form_error("usr_email") ?>
                    <br />
                    <label>Address</label>
                    <input type="text" name="usr_address" value="<?php echo $userInfo['usr_address']; ?>" size="30" />
                    <?php echo form_error("usr_address") ?>
                    <br />
                    <label>Phone</label>
                    <input type="text" name="usr_phone" value="<?php echo $userInfo['usr_phone']; ?>" size="30" />
                    <?php echo form_error("usr_phone") ?>
                    <br />
                    <label>Level</label>
                    <input type="text" name="usr_level" value="<?php echo $userInfo['usr_level']; ?>" size="30" />
                    <?php echo form_error("user_level") ?>
                    <br />
                    <label>Gender</label>
                    <input type="text" name="usr_gender" value="<?php echo $userInfo['usr_gender']; ?>" size="30" />
                    <?php echo form_error("usr_gender") ?>
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
<!--  -->
<?php
// delete bran controller
public function delete()
    {
        $bran_id = $this->uri->segment(3);
        $this->brans_model->delete($bran_id);
        redirect(base_url("/test/brans/listbrans"));
    }

// delete model
public function delete($bran_id)
    {
        $this->db->where("bran_id = $bran_id");
        $this->db->delete($this->_table);
    } 

