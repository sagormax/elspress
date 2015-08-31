<!--breadcrumbs-->
<div id="content-header">
	<div id="breadcrumb"> <a href="<?php echo base_url(); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Add Posts</a> </div>
	<h1>Add Post</h1>
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
		<form action="#" method="get" class="form-horizontal">
		    <div class="span9">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					  <h5>Post-info</h5>
					</div>
					<div class="widget-content nopadding">
					    <div class="control-group">
					      <label class="control-label">Title :</label>
					      <div class="controls">
					        <input type="text" id="title" class="span11" placeholder="Title" name="postTitle" />
					      </div>
					    </div>
					    <div class="control-group">
					      <label class="control-label">Permalink :</label>
					      <div class="controls">
					        <p><?php echo base_url('content').'/'; ?></p> <input url="<?php echo base_url('posts/permalinkCkh'); ?>" type="text" id="permalink" class="span11 permalink" name="postPermalink" />
					      </div>
					    </div>
					    <div class="control-group">
					      <label class="control-label">Description : </label>
					      <div class="controls">
					        <textarea id="mytextarea" name="postDescription"></textarea>
					      </div>
					    </div>
					    <div class="control-group">
					      <label class="control-label">Short Description : </label>
					      <div class="controls">
					        <textarea id="shortdes" class="span11" name="postExcerpt"></textarea>
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
			                <select multiple>
			                  <option selected>Default</option>
			                  <option>Second option</option>
			                  <option>Third option</option>
			                  <option>Fourth option</option>
			                  <option>Fifth option</option>
			                  <option>Sixth option</option>
			                  <option>Seventh option</option>
			                  <option>Eighth option</option>
			                </select>
					      </div>
					    </div>
					    <div class="control-group">
					      <div class="addpost-sidebar">
					      	<p class="control-label">Tag :</p>
			                <select multiple>
			                  <option selected>Default</option>
			                  <option>Second option</option>
			                  <option>Third option</option>
			                  <option>Fourth option</option>
			                  <option>Fifth option</option>
			                  <option>Sixth option</option>
			                  <option>Seventh option</option>
			                  <option>Eighth option</option>
			                </select>
					      </div>
					    </div>
					    <div class="control-group">
					      <div class="addpost-sidebar">
					      	<p class="control-label">Status :</p>
			                <select>
			                  <option selected>Publish</option>
			                  <option>Disable</option>
			                </select>
					      </div>
					    </div>
					    <div class="control-group">
					      <div class="addpost-sidebar">
					      	<p class="control-label">Post Parent :</p>
			                <select>
			                  <option selected>Default</option>
			                  <option>Second option</option>
			                  <option>Third option</option>
			                  <option>Fourth option</option>
			                  <option>Fifth option</option>
			                  <option>Sixth option</option>
			                  <option>Seventh option</option>
			                  <option>Eighth option</option>
			                </select>
					      </div>
					    </div>
					    <div class="control-group">
					      <div class="addpost-sidebar">
					      	<p class="control-label">Order :</p>
			                <input type="text" class="span11" placeholder='Order'>
					      </div>
					    </div>
					    <div class="control-group">
					      <div class="addpost-sidebar">
					      	<p class="control-label">Date :</p>
			                <input type="text" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="01-02-2013" class="datepicker span11">
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