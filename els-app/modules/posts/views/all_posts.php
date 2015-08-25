<div class="loader"><img src="<?php echo base_url('assets/backend/images/loading.gif'); ?>" alt="loading..."></div>
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url(); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Posts</a> </div>
    <h1>Posts</h1>
  </div>
<!--End-breadcrumbs-->

  <div class="container-fluid">
    <hr>

    <?php if( $this->session->flashdata('successMsg') ): ?>
        <div class="control-group successMsg">
            <div class="controls">
                <div class="alert alert-success alert-block">
                      <?php
                      echo $this->session->flashdata('successMsg')." <br /> ";
                      echo "<span>".$this->session->flashdata('mailSendingError')."</span>"; ?>
                </div>
            </div>
        </div>
    <?php endif; $this->session->set_flashdata('successMsg', ''); ?>

    <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">

            <div class="widget-title">
              <span class="icon">
                <input type="checkbox" id="title-checkbox" name="title-checkbox" />
              </span>
              <h5>Post Lists</h5>
            </div>

            <div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div>

            <div class="widget-content nopadding">
              <table class="table table-bordered data-table table-striped with-check userList">
                <thead>
                  <tr>
                    <th><i class="icon-resize-vertical"></i></th>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Tag</th>
                    <th>Comments</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php if( isset($postLists) ) :
                      foreach( $postLists as $post ): ?>
                        <tr class="gradeX" id="<?php echo $post->ID; ?>">
                            <td><input type="checkbox" /></td>
                            <td><a href="<?php echo base_url(); ?>"><?php echo $post->post_title; ?></a></td>
                            <td class="center"><?php echo $post->post_categories; ?></td>
                            <td class="center"><?php echo $post->post_tag; ?></td>
                            <td class="center"><?php echo $post->comment_count; ?></td>
                            <td class="center"><?php echo $post->post_author; ?></td>
                            <td class="center"><?php echo $post->post_modified; ?></td>
                            <td class="center action">

                              <a href="<?php echo base_url('content/'.$post->post_permalink); ?>"><button class="btn btn-warning btn-mini">View</button></a>

                              <a href="<?php echo base_url(); ?>"><button class="btn btn-success btn-mini">Edit</button></a>

                              <a class="deleteAjax" id="" href=""><button class="btn btn-danger btn-mini">Delete</button></a>

                            </td>
                        </tr>
                  <?php endforeach; endif; ?>
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </div>
</div>