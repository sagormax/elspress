  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url(); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?php echo base_url('users'); ?>">Users</a> <a href="" class="current">Add User</a> </div>
    <h1>Add User</h1>
  </div>
  <div class="container-fluid"><hr>

    <!-- Authentication Error Msg  -->
    <?php if( validation_errors() ): ?>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box alert alert-error">
                      <?php echo validation_errors(); ?>
                </div>
            </div>
        </div>        
    <?php endif; ?>

    <?php if( $this->session->flashdata('errorMsg') ): ?>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box alert alert-error">
                      <?php echo $this->session->flashdata('errorMsg'); ?>
                </div>
            </div>
        </div>        
    <?php endif; $this->session->set_flashdata('errorMsg', ''); ?>    

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>User Registration</h5>
          </div>
          <div class="widget-content nopadding">
          <?php 
            $attr = array(
                'id' => 'password_validate',
                'class' => 'form-horizontal',
                'novalidate' => 'novalidate',
            );
            echo form_open('register-validate/?=regster', $attr); ?>
                         
              <div class="control-group">
                <label class="control-label">FullName</label>
                <div class="controls">
                  <input type="text" class="required" name="fullname" value="<?php echo $this->input->post('fullname', true); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input type="text" class="required" name="username" value="<?php echo $this->input->post('username', true); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="email" name="email" id="email" required value="<?php echo $this->input->post('email', true); ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="pwd" id="pwd"  value="<?php echo $this->input->post('pwd', true); ?>" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Confirm password</label>
                <div class="controls">
                  <input type="password" name="pwd2" id="pwd2" value="<?php echo $this->input->post('pwd2', true); ?>" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Send password via mail</label>
                <div class="controls">
                  <label>
                    <input type="checkbox" name="sendPasswd" checked />
                    Send me email
                  </label>
                </div>
              </div>              

              <div class="form-actions">
                <input type="submit" value="Register" class="btn btn-success">
              </div>

            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
