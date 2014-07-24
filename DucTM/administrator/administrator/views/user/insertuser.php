<head>
    <style type="text/css">
        label{
            float: left;
            width: 130px;
        }
        input.input_text{
            /*float: left;*/
            width: 250px;
        }
        .error{
            color: red;
        }
    </style>
</head>

<h3>Insert User</h3>
<?php
    $this->load->helper('form');
    
    echo form_fieldset("User Infomation");


    $form_formattr = array('id' => 'insertuserform',
                        );
    // echo form_open('user/insertUser', $form_formattr);
    // echo validation_errors();
    echo "<form action = '' method = 'post'>";

    echo form_label("User Name");
    $user = array(
                    'class' => 'input_text',
                    'name' => 'usr_name',
                    );
    $user['value'] = set_value('usr_name');

    echo form_input($user);
    echo form_error('usr_name') . "<br/>";

    echo form_label("Password");
    $pass = array(
        'class' => 'input_text',
        'name' => 'usr_password'
        );
    echo form_password($pass);
    echo form_error('usr_password') . "<br/>";

    echo form_label("Re-type Password");
    $repass = array(
        'class' => 'input_text',
        'name' => 'usr_retype_password'
        );
    echo form_password($repass);
    echo form_error('usr_retype_password') . "<br/>";


    echo form_label("Email");
    $email = array(
        'class' => 'input_text',
        'name' => 'usr_email'
        );
    $email['value'] = set_value('usr_email');
    echo form_input($email);
    echo form_error('usr_email') . "<br/>";

    echo form_label("Address");
    $address = array(
        'class' => 'input_text',
        'name' => 'usr_address'
        );
    $address['value'] = set_value('usr_address');
    echo form_input($address);
    echo form_error('usr_address') . "<br/>";

    echo form_label("Phone");
    $phone = array(
        'class' => 'input_text',
        'name' => 'usr_phone'
        );
    $phone['value'] = set_value('usr_phone');
    echo form_input($phone);
    echo form_error('usr_phone') . "<br/>";

    echo form_label("Gender");
    $male = array(
        'name'  => 'usr_gender',
        'value' => '1' // is Male
        );
    $male ['checked'] = set_radio('usr_gender', '1', TRUE);
    
    echo "<span>Nam</span>";
    echo form_radio($male);
    $female = array(
        'name'  => 'usr_gender',
        'value' => '2' // is female
        );
    $female ['checked'] = set_radio('usr_gender', '2', TRUE);
    echo "<span>Nữ</span>";
    echo form_radio($female);
    echo form_error('usr_gender') . "<br/>";
    

    echo form_label("Level");
    $level = array(
        '1' => 'Administrator',
        '2' => 'User'
        );

    echo form_dropdown('usr_level',$level, '2') . "<br/>";
    // echo $usr_level;
    ?>

    <!-- <select name="dl_level">
    <option value="1" <?php echo isset($usr_level) && $usr_level == 1  ? "checked" :  ""; ?> >Administrator</option>
    <option value="2" <?php  echo isset($usr_level) && $usr_level == 2  ? "checked" :  "";  ?> >User<option>
    </select>
    </br> -->

    <?php
    $submit = array(
        'type' => 'submit',
        'name' => 'btnok',
        'value' => 'submit',
        'content' => 'Thêm user'
        );
    echo form_button($submit);

    echo form_close();

    echo form_fieldset_close();


