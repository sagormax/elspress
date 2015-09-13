<div class="loader"><img src="<?php echo base_url('assets/backend/img/loading.gif'); ?>" alt="loading..."></div>
<!--breadcrumbs-->
<div id="content-header">
	<div id="breadcrumb"> <a href="<?php echo base_url(); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Category</a> </div>
	<h1>Category</h1>
</div>
<!--End-breadcrumbs-->
<div class="container-fluid">
	<hr>

	<?php if( $this->session->flashdata('successMsg') ): ?>
	    <div class="control-group successMsg">
	        <div class="controls">
	            <div class="alert alert-success alert-block">
	                  <?php
	                  echo $this->session->flashdata('successMsg'); ?>
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
	    <div class="span12">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
				  <h5>Category Details</h5>
				</div>
				<div class="widget-content nopadding">

		            <div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div>
		            <div class="widget-content nopadding">
		              <table class="table table-bordered data-table table-striped with-check userList">
		                <thead>
		                  <tr>
		                    <th><i class="icon-resize-vertical"></i></th>
		                    <th>ID</th>
		                    <th>Name</th>
		                    <th>Slug</th>
		                    <th>Post</th>
		                    <th>Action</th>
		                  </tr>
		                </thead>
		                <tbody>

		                  <?php if( isset($postCat) ) :
		                      foreach( $postCat as $cat ): ?>
		                        <tr class="gradeX" id="<?php echo $cat->ID; ?>">
		                            <td><input type="checkbox" /></td>
		                            <td><a href="<?php echo base_url(); ?>"><?php echo $cat->ID; ?></a></td>
		                            <td class="center"><?php echo $cat->cat_name; ?></td>
		                            <td class="center"><?php echo $cat->cat_permalink; ?></td>
		                            <td class="center">-</td>
		                            <td class="center action">

		                              <a href="<?php echo base_url('category/'.$cat->cat_permalink); ?>" target="_blank"><button class="btn btn-warning btn-mini">View</button></a>

		                              <a href="<?php echo base_url(); ?>"><button class="btn btn-success btn-mini">Edit</button></a>

		                              <a class="deleteAjax" itemName="category" id="<?php echo $cat->ID; ?>" href="<?php echo base_url('posts/deleteCat/'.$cat->ID); ?>"><button class="btn btn-danger btn-mini">Delete</button></a>

		                            </td>
		                        </tr>
		                  <?php endforeach; endif; ?>
		                </tbody>
		              </table>
		            </div>

				</div>
			</div>
	    </div>

		<form action="<?php echo base_url('Posts/submitCat/'); ?>" method="POST" name="submitPost" class="form-horizontal">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					  <h5>Add Category</h5>
					</div>
					<div class="widget-content nopadding">
					
						<div class="control-group">
					      <label class="control-label">Name :</label>
					      <div class="controls">
					        <input type="text" id="name" class="span11" placeholder="Name" name="catName" />
					      	<input type="hidden" class="span11" name="catPermalink" />
					      </div>
					    </div>


						<div class="form-actions">
					      <button type="submit" class="btn btn-success">Add Category</button>
					    </div>

					</div>
				</div>
		    </div>
	    </form>

	</div>
</div>