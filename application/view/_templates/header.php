<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GatorRent</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->


    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/frontpage.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/apt_detail.css" rel="stylesheet">
</head>
<body>
<!--     
    <div class="logo">
        GatorRent
    </div>

    
    <div class="navigation">
<<<<<<< HEAD
        <a href="<?php echo URL; ?>apartments">Home</a>
        <a href="<?php echo URL; ?>">Post a room</a>
        <a href="<?php echo URL; ?>apartments/listings">Listing</a>
       
        <a href="<?php echo URL; ?>songs">Edit Profile</a>
        <a href="<?php echo URL; ?>">Login / Register</a>
        
    </div> -->

    <!-- ----------------------------------------SECTION FOR NAV BAR ------------------------------ -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo URL; ?>">GatorRent</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'upload') === false && strpos($_SERVER['REQUEST_URI'], 'listing') === false) echo "class=\"active\"";  ?>><a href="<?php echo URL; ?>">Home</a></li>
        <!-- <li <?php if (strpos($_SERVER['REQUEST_URI'], 'upload') !== false) echo "class=\"active\"";  ?>><a href="<?php echo URL; ?>apartment_upload">Post an Apartment</a></li> -->
                <li <?php if (strpos($_SERVER['REQUEST_URI'], 'upload') !== false) echo "class=\"active\""; ?>>
            <a
                <?php
                    if (isset($_SESSION['username'])) {
                        echo "href='" . URL . "apartment_upload'";
                    } else {
                        echo "href='#' data-toggle='modal' data-target='#myModal'";
                    }
                ?>
              onclick="javascript:$('#from').val('posting');">
                Post an Apartment
            </a>
        </li>


        <?php if (!isset($_SESSION['username'])) echo "<!-- "; ?><li <?php if (strpos($_SERVER['REQUEST_URI'], 'listing') !== false) echo "class=\"active\"";  ?>><a href="<?php echo URL; ?>apartments/listings">My Listing</a></li><?php if (!isset($_SESSION['username'])) echo " -->"; ?>
        <!-- <li><a href="#">Reservation</a></li> -->
        <!-- <li><a href="<?php echo URL; ?>editprofile/index">Edit Profile</a></li> -->
      </ul>
      <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search" action="<?php echo URL; ?>apartments/search" method="POST">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Zip Code or City" name="keywords"  value="<?php if (isset($keywords)) echo htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'); ?>" class="form-control input-lg" placeholder="Please enter a Zip Code or City">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php      
                if (isset($_SESSION['username'])) {echo $_SESSION['username']."<li><a href=\"".URL."users/logout\" >Logout</a></li>";} else {echo "<li style='margin-left:-20px;padding-left:-20px'><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\" onclick=\"javascript:$('#from').val('login');\">Login / Register</a></li>";}
             ?></a></li>
        
<!-- ." (user_id:".$_SESSION['user_id']." is_student:".$_SESSION['is_student'].")" -->
<!-- ------------------------------SECTION FOR LOGIN AND REGISTER ----------------------------------------------- -->
          
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg loginregister">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login/Registration</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" style="padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form data-toggle="validator" role="form" class="form-horizontal"     action="<?php echo URL; ?>users/login" method="POST">
                                    <input type="hidden" name="from" id="from" value="login">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" required />
                                    </div>
                                    <div class=" shiftright help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                         <input name="password" type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" data-error="Must be 6 characters" required>
                                        <div class="help-block with-errors"></div>
                                  </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Sign in</button>
                                        <!-- <a href="javascript:;">Forgot your password?</a> -->
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form data-toggle="validator" role="form" class="form-horizontal"  action="<?php echo URL; ?>users/register" method="POST">
<!--                                 <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                           
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="First" required />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Last" required />
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="firstname" class="form-control" placeholder="First" pattern="[A-Za-z]{1,25}" data-error="Must be more than 1 character and less than 25 and no numbers" required />
                                            </div>
                                    <div class="shiftright help-block with-errors"></div>
                                </div> -->

                                 <div class="form-group has-feedback">
                                    <label for="email" class="col-sm-2 control-label">
                                        First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="firstname" class="form-control" placeholder="First" pattern="[A-Za-z]{1,25}" data-error="Must be more than 1 character and less than 25 and no numbers or symbols" required />
                                         <span class="glyphicon form-control-feedback"></span>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lastname" class="form-control" placeholder="Last" pattern="[A-Za-z]{1,25}" data-error="Must be more than 1 character and less than 25 and no numbers" required />
                                            </div>
                                    <div class="shiftright help-block with-errors"></div>
                                </div> -->

                                <div class="form-group has-feedback">
                                    <label for="email" class="col-sm-2 control-label">
                                        Last Name</label>
                                    <div class="col-sm-10">
                                         <input type="text" name="lastname" class="form-control" placeholder="Last" pattern="[A-Za-z]{1,25}" data-error="Must be more than 1 character and less than 25 and no numbers or symbols" required />
                                         <span class="glyphicon form-control-feedback"></span>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>

                               <!--  <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email" placeholder=".edu for students" required />
                                    </div>
                                    <div class=" shiftright help-block with-errors"></div>
                                </div> -->

                                <div class="form-group has-feedback">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                         <input type="email" name="email" class="form-control" id="email" placeholder="Email" required />
                                         <span class="glyphicon form-control-feedback"></span>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mobile" placeholder="Mobile" pattern="[0-9]{10,10}" data-error="Must contain only 10 numbers" required />
                                       <div class="help-block with-errors"></div>
                                    </div>
                                </div> -->

                              <!--   <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                         <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" data-error="Must be 6 characters" required>
                                        <div class="help-block with-errors"></div>
                                </div>
                                </div> -->

                                <div class="form-group has-feedback">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="password" type="password"
                                           name="password" data-minLength="6" placeholder="Password" 
                                           data-error="Password must be 6 characters long"
                                           required/>
                                    <span class="glyphicon form-control-feedback"></span>
                                    <span class="help-block with-errors"></span>
                                </div>
                                </div>

                                 <div class=" form-group has-feedback">
                                    <label for="userPw2" class=" col-sm-2 control-label">
                                        Confirm </label>
                                    <div class="col-sm-10">
                                      <input class="form-control {$borderColor}" id="userPw2" type="password"
                                           name="userPw2" data-match="#password" data-minLength="6" placeholder="Confirm Password" 
                                           data-match-error="Passwords do not match" 
                                           required/>
                                    <span class="glyphicon form-control-feedback"></span>
                                    <span class="help-block with-errors"></span>
                                </div>
                                </div>

                                 
                               <div class="col-sm-2"></div>
                                    <div class="col-sm-10">

                                    <!-- <div class="form-group marginfix">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" id="terms">
                                       I am a student
                                      </label>     
                                    </div>
                                  </div> -->
                                    <div class="form-group">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox" id="terms" data-error="You must agree to Terms of Service" required>
                                        By checking this box I agree to the terms of service and privacy agreement
                                      </label>
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>   
                                </div>
                                
                                <div class=" form-group">
                                    <label for="password_confirm" class=" col-sm-2 control-label">
                                       </label>
                                    <div class="col-sm-10">
                                </div>

                                <div class="row">
                                    <div class=" shiftright col-sm-2">
                                    </div>
                                    <div class=" shiftright col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Greate account</button>
                                        <!-- <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button> -->
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
      </ul>

    </div>
  </div>
</nav>
<?php if (!isset($_SESSION['success_alert'])) echo "<!--" ?>
<div class="alert alert-success alert-dismissable fade in" style="margin-top:-50px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <center><strong><?php echo $_SESSION['success_alert']; ?></strong></center>
  </div>
  <?php if (!isset($_SESSION['success_alert'])) echo "-->"; else $_SESSION['success_alert']=null; ?>
  <?php if (!isset($_SESSION['wrong_alert'])) echo "<!--" ?>
  <div class="alert alert-danger alert-dismissable fade in" style="margin-top:-50px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <center><strong><?php echo $_SESSION['wrong_alert']; ?></strong></center>
  </div>
  <?php if (!isset($_SESSION['wrong_alert'])) echo "-->"; else $_SESSION['wrong_alert']=null; ?>