<!--breadcrumbs-->
<div id="content-header">
  <div id="breadcrumb"> <a href="<?php echo base_url(); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Edit Posts</a> </div>
  <h1>Edit Post</h1>
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

  <?php if( $this->session->flashdata('errorMsg') ): ?>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box alert alert-error">
                      <?php echo $this->session->flashdata('errorMsg'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>  

  <div class="row-fluid">
    <form action="<?php echo base_url('Posts/updatePost/'); ?>" method="POST" name="submitPost" class="form-horizontal">

        <div class="span9">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Post</h5>
          </div>
          <div class="widget-content nopadding">
              <div class="control-group">
                <label class="control-label">Title :</label>
                <div class="controls">
                  <input type="hidden" name="updatePostID" value="<?php echo $post[0]->ID; ?>">
                  <input type="text" id="title" class="span11" placeholder="Title" name="postTitle" value="<?php echo $post[0]->post_title; ?>" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Permalink :</label>
                <div class="controls">
                  <p><?php echo base_url('content').'/'; ?></p> <input postID="<?php echo $post[0]->ID; ?>" url="<?php echo base_url('posts/permalinkCkh'); ?>" type="text" id="permalink" class="span11 permalink" name="postPermalink" value="<?php echo $post[0]->post_permalink; ?>" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description : </label>
                <div class="controls">
                  <textarea id="mytextarea" name="postDescription"><?php echo $post[0]->post_content; ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Short Description : </label>
                <div class="controls">
                  <textarea id="shortdes" class="span11" name="postExcerpt"><?php echo $post[0]->post_excerpt; ?></textarea>
                </div>
              </div>
          </div>
        </div>
        </div>

        <div class="span3">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Post-info</h5>
          </div>
          <div class="widget-content nopadding">
              <div class="control-group">
                <div class="addpost-sidebar">
                  <p class="control-label">Category :</p>
                      <select name="postCategory[]" multiple>
                        <option value='-1'>Uncategorized</option>
                        <?php
                        if( isset($postCat) ):
                          $categories = explode(',', $post[0]->post_categories);
                          foreach ($postCat as $cat) {
                            echo ( in_array($cat->cat_permalink, $categories) ) ? '<option value="'.$cat->ID.'" selected>'.$cat->cat_name.'</option>' : '<option value="'.$cat->ID.'">'.$cat->cat_name.'</option>';
                          }
                        endif;
                        ?>
                      </select>
                </div>
              </div>
              <div class="control-group">
                <div class="addpost-sidebar">
                  <p class="control-label">Tag :</p>
                      <select name="postTag[]" multiple>
                        <option value='-1'>Default</option>
                        <?php
                        if( isset($postTag) ):
                          $tags = explode(',', $post[0]->post_tag);
                          foreach ($postTag as $tag) {
                            echo ( in_array($tag->tag_permalink, $tags) ) ? '<option value="'.$tag->ID.'" selected>'.$tag->tag_name.'</option>' : '<option value="'.$tag->ID.'">'.$tag->tag_name.'</option>';
                          }
                        endif;
                        ?>
                      </select>
                </div>
              </div>
              <div class="control-group">
                <div class="addpost-sidebar">
                  <p class="control-label">Status :</p>
                      <select name="postStatus">

                        <?php
                        $status = $post[0]->post_status;
                        echo ( $status == 'publish' ) ? '<option value="1" selected>Publish</option><option value="0">Disable</option>' : '<option value="1">Publish</option><option value="0" selected>Disable</option>';
                        ?>

                      </select>
                </div>
              </div>
              <div class="control-group">
                <div class="addpost-sidebar">
                  <p class="control-label">Post Parent :</p>
                      <select name="postParent">
                        <option value='-1'>Default</option>
                        <?php
                        if( isset($postLists) ):
                          foreach ($postLists as $posts) {
                            if( $posts->ID == $post[0]->ID ) continue;
                            echo ( $posts->ID == $post[0]->post_parent ) ? '<option value="'.$posts->ID.'" selected>'.$posts->post_title.'</option>' : '<option value="'.$posts->ID.'">'.$posts->post_title.'</option>';
                          }
                        endif;
                        ?>
                      </select>
                </div>
              </div>
              <div class="control-group">
                <div class="addpost-sidebar">
                  <p class="control-label">Order :</p>
                      <input type="text" class="span11" placeholder='Order' name="postOrder" value="<?php echo $post[0]->menu_order; ?>" />
                </div>
              </div>
              <div class="control-group">
                <div class="addpost-sidebar">
                  <p class="control-label">Date :</p>
                      <input type="text" name="postDate" data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd" value="<?php echo $post[0]->post_modified; ?>" class="datepicker span11">
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
              </div>

          </div>
        </div>
        </div>

      </form>
  </div>
</div>