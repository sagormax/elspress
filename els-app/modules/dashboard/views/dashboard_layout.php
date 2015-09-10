<!DOCTYPE html>
<html lang="en">
<head>
<title>elsPress Admin</title>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/matrix-media.css" />
<link href="<?php echo base_url(); ?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="<?php echo base_url('dashboard'); ?>">elsPress Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text"><?php echo $this->session->userdata('user_name'); ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url('logout'); ?>"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="<?php echo base_url('logout'); ?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>Posts</span><span class="label label-important">4</span></a>
      <ul>
        <li><a href="<?php echo base_url('posts/addPost'); ?>">Add Post</a></li>
        <li><a href="<?php echo base_url('posts'); ?>">All Posts</a></li>
        <li><a href="<?php echo base_url('posts/categories'); ?>">Categories</a></li>
        <li><a href="<?php echo base_url('posts/tag'); ?>">Tags</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>Users</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="<?php echo base_url('users'); ?>">All User</a></li>
        <li><a href="<?php echo base_url('addUser'); ?>">Add User</a></li>
      </ul>
    </li>
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <?php echo ( isset($content) ? $content : "404 page not found" ); ?>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2015 &copy; elsPress  Admin. Brought to you by <a href="http://easyloopsoft.com/" target="_blank">EasyLoopSoft</a> </div>
</div>

<!--end-Footer-part-->

<script src="<?php echo base_url(); ?>assets/backend/js/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/matrix.form_validation.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.wizard.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.uniform.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.gritter.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/matrix.popover.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/matrix.tables.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/matrix.js"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}

$(document).ready(function(){

  $('.loader').hide();

  // Enable TyniMCE
  tinymce.init({
      selector: "#mytextarea"
  });

  // Datepicker
  $('.datepicker').datepicker()
  // Hide Error Msg
  setTimeout(function(){ $(".successMsg").fadeOut(2000); }, 5000);

  // User deleteAjax calling
  $("a.deleteAjax").click(function(e){
    e.preventDefault();
    var itemName = $("a.deleteAjax").attr('itemName');

    var re = confirm("Are You Sure to Delete.");
    if (re == true) {

        var url = $(this).attr('href');
        var id = $(this).attr('id');
        $('.loader').show();
        $.ajax({
          mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
          url: url,
          type: 'GET',
          success: function(data) {
            if( data != -1 )
            {
              setTimeout(function(){
                $("table.userList tr#"+id).fadeOut();
                $('.loader').hide();
                $.gritter.add({
                  title:  'Success',
                  text: 'This '+itemName+' has been deleted successfully.',
                  sticky: false
                });

              }, 3000);

            }
            else
            {
              alert('Delete Error....');
              $('.loader').hide();
            }

          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
          },
          dataType: "html",
          async: false
        });

        return;




    } else {
        return false;
    }
  });

});
</script>

</body>
</html>
