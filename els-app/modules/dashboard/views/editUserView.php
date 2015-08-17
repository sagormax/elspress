  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url(); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?php echo base_url('users'); ?>">Users</a> <a href="" class="current">Edit User</a> </div>
    <h1>Edit User</h1>
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
            <h5>User Edit</h5>
          </div>
          <div class="widget-content nopadding">
          <?php
            $attr = array(
                'id' => 'password_validate',
                'class' => 'form-horizontal',
                'novalidate' => 'novalidate',
            );
            echo form_open('userEdit-validate/?=edit', $attr); ?>

              <div class="control-group">
                <label class="control-label">FullName</label>
                <div class="controls">
                  <input type="text" class="required" name="fullname" value="<?php echo $userData[0]->display_name; ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input type="text" class="" name="username" placeholder="<?php echo $userData[0]->user_name; ?>" readonly />
                  <input type="hidden" class="" name="userid" value="<?php echo $userData[0]->ID; ?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Nickname</label>
                <div class="controls">
                  <input type="text" class="" name="nickname" value="<?php echo $userData[0]->user_nicename; ?>" placeholder="Nick Name">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="email" name="email" id="email" required value="<?php echo $userData[0]->user_email; ?>">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-success">
              </div>

            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
