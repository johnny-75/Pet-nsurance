
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/glyphicon.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/simple-sidebar.css">
    
        <title>PetInsurance | Secure Your Pets</title>
        <link rel="icon" href="../assets/img/main_logo.png">
    </head>
    
    <body class="bg" style="padding: 0%">
        
        
 <div id="wrapper" <?php if(!isset($_SESSION['admin'])) echo'hidden';?>>
     <!-- Sidebar -->
<div id="sidebar-wrapper" class="sticky-top">
        <ul class="sidebar-nav">
            <li class="sidebar-brand active">
                <a>
                    Pet Insurance
                </a>
            </li>
            <li>
                <a href="index.php">Dashboard</a>
            </li>
            <li>
                <a href="verify_policy.php">Verify Policy</a>
            </li>
            <li>
                <a href="verify_claim.php">Verify Claim</a>
            </li>
            <li>
                <a href="enquiries.php">Enquiries</a>
            </li>
            <li>
                <a href="proposers.php">Proposers</a>
            </li>
            <li>
                <a href="policies.php">Policies</a>
            </li>
            <li>
                <a href="change_password.php">Change Password</a>
            </li>
            <li>
                <a href="_login.php?admin_logout">Logout</a>
            </li>
        </ul>
    </div>
        <!-- bg-primary bg-succes bg-warning bg-info bg-danger -->
        <nav class="navbar navbar-expand-md navbar-dark sticky-top">
            
            <a href="#menu-toggle" class="btn" id="menu-toggle"><span class="navbar-toggler-icon navbar-dark"></span></a>
            <div class="navbar ml-3">
                <a class="navbar-brand">
                    <img src="../assets/img/main_logo_white.png" width="35px" height="35px">
                </a>
                <span class="navbar-text text-light">Pet Insurance</span>
    
                
                
            </div>
            <ul class="navbar-nav ml-auto mr-2">
                    <li class="nav-item">
                        <a class="nav-link" href="_login.php?admin_logout">Logout</a>
                    </li>
                </ul>
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
<?php if(!isset($_SESSION['admin'])) echo'</div>';?>