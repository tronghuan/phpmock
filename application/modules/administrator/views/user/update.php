<?php $this->load->view('main/mainhead')?>
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
<?php $this->load->view('main/mainfoot')?>