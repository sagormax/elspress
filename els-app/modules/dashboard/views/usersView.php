<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Users</h1>
  </div>
<!--End-breadcrumbs-->

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">

            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>User Lists</h5>
            </div>

            <div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div>
            
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>

                  <tr>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php if( isset($getAllUser) ) : 
                      foreach( $getAllUser as $user ): ?>
                        <tr class="gradeX">
                          <td><?php echo $user->display_name; ?></td>
                          <td class="center"><?php echo $user->user_name; ?></td>
                          <td class="center"><?php echo $user->user_email; ?></td>
                          <th>
                            <?php echo ( $user->user_status == 1 ) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>'; ?>
                          </th>
                          <td class="center"></td>
                        </tr>
                  <?php endforeach; endif; ?>
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </div>
</div>