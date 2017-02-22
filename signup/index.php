<?php 
include("../helpers/conn.php");
session_start();
if(isset($_POST["register"]))
 {
// username and password received from loginform 
$first= $_POST['first'];
$last= $_POST['last'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$email=$_POST['email'];
$address=$_POST['address'];
$sID = "";
$zipCode=$_POST['zipCode'];



$q="INSERT INTO users(id,first, last, username,email,login,address,zipCode) VALUES('sID','$first','$last','$username','$email','$password','$address','$zipCode')";
$result=mysqli_query($conn,$q)or die(mysqli_error($conn));
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//$count=mysqli_num_rows($result);


// If result matched $username and $password, table row must be 1 row
if($result){
      $_SESSION['login_user']=$username;
      header("Location: ../login/index.php");
    }
    else{
      $error="Registration Failed!";
      header("Location: ../signup/index.php");
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>WWYDH Registration</title>
    <link href="../helpers/header_footer.css" type="text/css" rel="stylesheet" />
    <link href="../helpers/splash.css" type="text/css" rel="stylesheet" />
    <link href="styles.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/42543b711d.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../helpers/globals.js" type="text/javascript"></script>
    <script src="scripts.js" type="text/javascript"></script>
	<script type="text/JavaScript" src="check.js"></script>
  </head>
  <body>
    <div class="width">
      <div id="nav">
              <div class="nav-inner width clearfix <?php if (isset($_SESSION['user'])) echo 'loggedin' ?>">
                  <a href="../home">
                      <div id="logo"></div>
                      <div id="logo_name">What Would You Do Here?</div>
                      <div class="spacer"></div>
                  </a>
                  <div id="user_nav" class="nav">
                      <?php if (!isset($_SESSION["user"])) { ?>
                          <ul>
                              <a href="../login"><li>Log in</li></a>
                              <a href="../signup" class="active"><li>Sign up</li></a>
                              <a href="../contact"><li>Contact</li></a>
                          </ul>
                      <?php } else { ?>
                          <div class="loggedin">
                              <span class="click-space">
                                  <span class="chevron"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                  <div class="image" style="background-image: url(../helpers/user_images/<?php echo $_SESSION["user"]["image"] ?>);"></div>
                                  <span class="greet">Hi <?php echo $_SESSION["user"]["first"] ?>!</span>
                              </span>

                              <div id="nav_submenu">
                                  <ul>
                                      <a href="../dashboard"><li>Dashboard</li></a>
                                      <a href="../profile"><li>My Profile</li></a>
                                      <a href="../helpers/logout.php?go=home"><li>Log out</li></a>
                                  </ul>
                              </div>
                          </div>
                      <?php } ?>
                  </div>
                  <div id="main_nav" class="nav">
                      <ul>
                          <a href="../locations"><li>Locations</li></a>
                          <a href="../ideas"><li>Ideas</li></a>
                          <a href="../plans"><li>Plans</li></a>
                          <a href="../projects"><li>Projects</li></a>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div id="registration">
        <div class="width">
          <div id="reg">REGISTRATION</div>
		  <div id="small">Required*</div>
    <form method="post" action="#" name="loginform" onsubmit="return checkFilled();">
    <input type="text" placeholder="First Name*"  name="first" id="firstname" class="form-size"><br>
              	  <input type="text" placeholder="Last Name*"  name="last" id="lastname" class="form-size"><br>
                  <input type="text"  placeholder="Username*"  name="username" id="vname" class="form-size"><br>
                  <input type="password" placeholder="Password*"  name="password" id="password" class="form-size"><br>
                  <input type="text" placeholder="Email*"  name="email" id="email" class="form-size"><br>
                  <input type="text" placeholder="Address"  name="address" class="form-size"><br>
                  <input type="text" placeholder="Zip Code" name="zipCode" class="form-size"><br>
   <input type="submit" name="register" id="enter" class="form-size" value="Sign Up">
    </form>
    </div>
</div>
 <div id="footer">
            <div class="grid-inner">
                &copy; Copyright WWYDH <?php echo date("Y") ?>
            </div>
    </div>
</div>
</body>

</html>
