
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/glyphicon.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    
        <title>PetInsurance | Secure Your Pets</title>
        <link rel="icon" href="./assets/img/main_logo.png">
        <style type="text/css" media="print">
            @page { size: landscape; }
            @media print and (width: 21cm) and (height: 29.7cm) {
                @page {
                    margin: 3cm;
                }
            }
        </style>
    </head>
    
    <body>
    <div class="container-fluid">
        <div class="row social social-top justify-content-end bg-dark px-2 py-1">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-whatsapp"></i>
            <i class="fa fa-youtube"></i>
            <i class="fa fa-linkedin"></i>
        </div>
    </div>
        <div class="container-fluid pt-3 pb-2 bg-white headder" style=" margin-bottom: 0px">
            <div class="row">
                <div class="col-md-6 col-sm-12 titles">
                        <img src="./assets/img/main_logo.png" class="title-img" alt="logo" width="75px">
                    <a href="index.php" style="text-decoration: none"><h1 class="pro-title">Pet Insurance</h1>
                    <p class="pro-subtitle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lets secure your pets</p></a>
                </div>
                <div class="col-md-6 col-sm-12">
                        <div class="moblile">+1800-376378</div>
                </div>
            </div>
                
            
        </div>
        <!-- bg-primary bg-succes bg-warning bg-info bg-danger -->
        <nav class="navbar navbar-expand-md navbar-dark  sticky-top ">
            <button class="navbar-toggler ml-2" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon navbar-dark"></span>
            </button>
            <span class="menu-text mr-2 mr-sm-4 float-sm-left text-white">Menu</span>
            <div class="collapse navbar-collapse ml-3" id="collapse_target">
                <a class="navbar-brand">
                    <img src="./assets/img/main_logo_white.png" width="35px" height="35px">
                </a>
                <span class="navbar-text text-light">Pet Insurance</span>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="sub_menu3" href="#">
                            Buy Policy
                            <span class="caret"></span>
                        </a>
                            <div class="dropdown-menu mr-3" aria-labelledby="sub_menu3">
                                <a class="dropdown-item" href="buy_policy.php?pet_type=cat">Cat Insurance</a>
                                <a class="dropdown-item" href="buy_policy.php?pet_type=dog">Dog Insurance</a>
                            </div>
                    </li>
                    <?php
                if(isset($_SESSION['userid']))
                echo'
                    <li class="nav-item">
                        <a class="nav-link" href="user_panel.php">
                            Dashboard
                        </a>
                    </li>';?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="sub_menu1" href="#">
                            About
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu mr-3" aria-labelledby="sub_menu1">
                            <a class="dropdown-item">Terms and Conditions</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">About Us</a>
                            <a class="dropdown-item" href="contact_us.php">Contact Us</a>
                        </div>
                    </li>
                </ul>
    
                <form action="" class="form-inline mr-2 my-auto">
                        <div class="form-group"><label for="search-field" class="search-icon"><i class="fa fa-search "></i></label>
                    <input type="text" placeholder="Search here" name="Search" class="form-control text-white" id="search-field" aria-label="Search"></div>
                </form>
                <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <?php
                        if(!isset($_SESSION['userid']))
                            echo '<button type="button" class="btn btn-link pl-0"  data-toggle="modal" data-target="#exampleModal">Login</button>';
                        else
                            echo '<a class="nav-link" href="_login.php?user_logout=1">Logout</a>';
                        ?>
                    </li>
                    <li class="nav-item my-auto">
                        <?php
                    if(!isset($_SESSION['userid']))
                    echo'<a class="nav-link" href="registration.php">Register</a>';
                    else
                    {
                        $userid=$_SESSION['userid'];
                        if(file_exists("assets/img/profile_pic/$userid.jpg"))
                            echo'<a  href="user_panel.php"><img class="img-fluid rounded-circle" width="35px" src="assets/img/profile_pic/'.$userid.'.jpg" data-toggle="tooltip" data-placement="top" title="User Panel"></a>';
                        else
                            echo'<a href="user_panel.php"><i class="fa fa-user-circle" style="font-size: 35px"></i></a>';
                    }
                    ?>
                    </li>
                </ul>
            </div>
        </nav>

        
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="_login.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control custom-input" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="required" data-error="Enter valid email" oninvalid="this.setCustomValidity('Enter valid email')"
              oninput="this.setCustomValidity('')" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-0">
              <label for="exampleInputPassword1">Password</label>
              <input type="password"  name="password" class="form-control  custom-input" id="exampleInputPassword1" placeholder="Password" required="required" data-error="password is required." oninvalid="this.setCustomValidity('Enter your password')"
              oninput="this.setCustomValidity('')" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
            </div>
            <div class="form-check mb-4">
              <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1" <?php if(isset($_COOKIE["member_login"])) echo 'checked'; ?>>
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <label class="form-check-label float-right">Forgot <a href="change_password.php">Password?</a></label>
          </form>
      </div>
    </div>
  </div>
</div>