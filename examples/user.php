<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>

<?php
require_once "config/config.php";



















if(isset($_POST['sub'])){

$sname=$_POST['song_name'];
$aname=$_POST['artist_name'];
$singername=$_POST['singer_name'];
$actorname=$_POST['actor_name'];
$mname=$_POST['movie_name'];
$genre=$_POST['genre'];
$date=$_POST['date'];
$music1=$_POST['music'];
$thumb1=$_POST['thumb'];


  	
	$target_path = $_SERVER["CONTEXT_DOCUMENT_ROOT"]."/examples/uploads/thumbimg/";
	$target_path1 = $_SERVER["CONTEXT_DOCUMENT_ROOT"]."/examples/uploads/music/";
	

$target_path1 = $target_path1.basename($_FILES['audio_track']['name']);

$target_path = $target_path.basename($_FILES['thumbnail']['name']);

$nmusic="";
	$nthumb="";

$targ1="examples/uploads/thumbimg/".basename($_FILES['thumbnail']['name']);
$targ2="examples/uploads/music/".basename($_FILES['audio_track']['name']);


 $audio=move_uploaded_file($_FILES['audio_track']['tmp_name'], $target_path1);
   $img=move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target_path);


	    echo '<script>document.getElementById("thumb").value="'.$img.'";</script>';
	 
  echo '<script>document.getElementById("music").value="'.$audio.'";</script>';

    if($_POST['id']=="0"){
	   
	   
$query ="INSERT INTO song_details(song_name, movie_name,singer,actor_name, artist_name,genre,date,thumb_img,audio) VALUES ( '". $sname."','".$mname."','".$singername."','".$actorname."','".$aname."','". $genre."','".$date."','".$targ1."','".$targ2."' )";
        mysqli_query($db, $query);

   }else{
	   

	$query =" UPDATE song_details
SET song_name = '". $sname."', movie_name= '". $mname."', singer= '". $singername."', actor_name= '". $actorname."',artist_name = '". $aname."',genre = '". $genre."', date= '". $date."', thumb_img= '". (($_FILES['thumbnail']['name']!="")?$targ1:$thumb1)."', audio= '".(($_FILES['audio_track']['name']!="")?$targ2:$music1)."'
WHERE id = '". $_POST['id']."'";
	      mysqli_query($db, $query);
		  
		  
		  
	   
   }
   
        header("location: dashboard.php");
   


}
if($_REQUEST['value']=="delete"){




$sql = "DELETE FROM song_details where id=".$_REQUEST['id'];
$result = $db->query($sql);





}
if($_REQUEST['id']!="0"){




$sql = "SELECT * FROM song_details where id=".$_REQUEST['id'];
$result = $db->query($sql);



$coursedata = $result->fetch_assoc();





}

$result = mysqli_query($db,"SELECT * FROM music_directors");




$selectartist = '<option value="">--Select--</option>';

//echo $coursedata->event_id; die;
while($row = mysqli_fetch_array($result)){
$selecteartist = ($coursedata['artist_name'] == $row['id']) ? 'selected="selected"' : '';	
	$selectartist .= '<option value="'. $row['id'].'" '.$selecteartist.'>'.$row['name'].'</option>';
}

$result1 = mysqli_query($db,"SELECT * FROM actor");




$selectactor = '<option value="">--Select--</option>';

//echo $coursedata->event_id; die;
while($row1= mysqli_fetch_array($result1)){
$selecteactor = ($coursedata['actor_name'] == $row1['id']) ? 'selected="selected"' : '';	
	$selectactor .= '<option value="'. $row1['id'].'" '.$selecteactor.'>'.$row1['name'].'</option>';
}

$result2 = mysqli_query($db,"SELECT * FROM singer");




$selectsinger = '<option value="">--Select--</option>';

//echo $coursedata->event_id; die;
while($row2 = mysqli_fetch_array($result2)){
$selectesinger = ($coursedata['singer'] == $row2['id']) ? 'selected="selected"' : '';	
	$selectsinger .= '<option value="'. $row2['id'].'" '.$selectesinger.'>'.$row2['name'].'</option>';
}

?>



<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="../css/registration.css" rel="stylesheet" media="all">

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a></div>
      <div class="sidebar-wrapper">
           <?php
require_once "sidemenu.php";
?>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title"> Song Details Upload Form</h2>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="#" method="POST"  >
                        <div class="form-row m-b-55">
                            <div class="name">Song Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="song_name" value="<?php echo (isset($coursedata['song_name'])) ? $coursedata['song_name'] : '';?>">
                                </div>
                            </div>
                        </div>
						
                 
						
					
                        <div class="form-row">
                            <div class="name">Movie Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="movie_name" value="<?php echo (isset($coursedata['movie_name'])) ? $coursedata['movie_name'] : '';?>">
                                </div>
                            </div>
                        </div>
							  <div class="form-row">
                              <div class="name">Artist Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                          <select name="artist_name" id="artist_name" >
	                              <?php  echo $selectartist;?>
	                                    </select>	
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
							  <div class="form-row">
                              <div class="name">Actor Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                          <select name="actor_name" id="actor_name" >
	                              <?php  echo $selectactor;?>
	                                    </select>	
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
							  <div class="form-row">
                              <div class="name">Singer Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                          <select class="input--style-5" name="singer_name" id="singer_name" >
	                              <?php  echo $selectsinger;?>
	                                    </select>	
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="name">Genre</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="genre" value="<?php echo (isset($coursedata['genre'])) ?$coursedata['genre']: '';?>">
                                </div>
                            </div>
                        </div>
						
	
                    

                        <div class="form-row m-b-55">
                            <div class="name">Thumbnail</div>
                            <div class="value">
                                <div class="input-group">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="file" name="thumbnail" accept="image/x-png,image/gif,image/jpeg" >
                                        </div>
                                   
                                </div>
                            </div>
                        </div>


							
							    <input class='input--style-5' type='hidden' id='thumb' name='thumb'   value='<?php echo (isset($coursedata['thumb_img'])) ? $coursedata['thumb_img'] : '';?>'>
                             
					
				
                        <div class="form-row m-b-55">
                            <div class="name">Audio Track</div>
                            <div class="value">
                                <div class="input-group">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" accept="audio/mp3,audio/*;capture=microphone" type="file" name="audio_track" >
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
					
						
							
							   <input class='input--style-5' type='hidden' id='music' name='music' value='<?php echo (isset($coursedata['audio'])) ? $coursedata['audio'] : '';?>'>
                             
					
                        <div class="form-row">
                            <div class="name">Date</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="date" value="<?php echo (isset($coursedata['date'])) ? $coursedata['date'] : '';?>">
                                </div>
                            </div>
                        </div>
               
                      
                        <div>
						     <input class="input--style-5" type="hidden" name="id" value="<?php echo (isset($_REQUEST['id'])) ?$_REQUEST['id'] : '';?>">
                            <button class="btn btn--radius-2 btn--red"  name="sub" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>