<?php $this->load->view('main/mainhead')?>
		<div id="center">
        		<h1>Update nhãn hàng</h1>
                <form action="" method="post">
                	<label>Tên nhãn hàng</label>
                   	<input type="text" name="name" value="<?php echo $branInfo['bran_name']; ?>" size="30" />
                    
                    <span class = 'error'>
                        <?php echo form_error("name"); ?>
                        <?php echo isset($errorName) ? $errorName : ""; ?>
                    </span>
                    
                    
                    
                    <br />  
                    <label>&nbsp;</label> 
                    <input type="submit" name="ok" value="Update" />
                    <input type="reset" value="Reset" />                                  
                </form>
        </div>
<?php $this->load->view('main/mainfoot')?>