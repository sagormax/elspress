<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/matrix-login.css" />
        <link href="<?php echo base_url(); ?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <?php 
            $attr = array(
                'id' => 'loginform',
                'class' => 'form-vertical',
            );
            echo form_open('login-validate/?=user', $attr); ?>
				<div class="control-group normal_text"> <h3><img src="<?php echo base_url(); ?>/assets/backend/img/logo2.png" alt="Logo" /></h3></div>
                <!-- Authentication Error Msg  -->
                <?php if( $this->session->flashdata('authError') ): ?>
                    <div class="control-group errorMsg">
                        <div class="controls">
                            <div class="main_input_box alert alert-error" style="width:77%;">
                                  <?php echo $this->session->flashdata('authError'); ?>
                            </div>
                        </div>
                    </div>        
                <?php endif; $this->session->set_flashdata('authError', '') ?>
                <!-- End -->
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" placeholder="Username" name="userName" required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="userPass" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" />
                    </span>
                </div>
            <?php echo form_close(); ?>
            <?php 
            $attr = array(
                'id' => 'recoverform',
                'class' => 'form-vertical',
            );
            echo form_open('recover-validate/?=user', $attr); ?>
            
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="email" placeholder="E-mail address" name="userEmail" required />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-info" value="Reecover" /></span>
                </div>
            <?php echo form_close(); ?>
        </div>
        
        <script src="<?php echo base_url(); ?>assets/backend/js/jquery.min.js"></script>  
        <script src="<?php echo base_url(); ?>assets/backend/js/matrix.login.js"></script> 
        <script>
        $(document).ready(function(){

            // Hide Error Msg 
            setTimeout(function(){ $(".errorMsg").fadeOut(2000); }, 5000);
            
        });
        </script>
    </body>
</html>
