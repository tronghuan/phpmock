<?php
    $obj = new user;
    $user = $obj->session->userdata['user'];
    //echo "<pre>";
    //print_r($user);
    echo "Hello".$user['usr_name']."!";
    echo "<br />";
    
?>
<a href="<?php echo base_url('administrator/user/logout')?>">Log out </a>