<?php
include("../helpers/conn.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // username and password received from loginform
    $first=mysqli_real_escape_string($conn,$_POST['first']);
    $last=mysqli_real_escape_string($conn,$_POST['last']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $sID = "";
    $zipCode=mysqli_real_escape_string($conn,$_POST['zipCode']);



    $sql_query="INSERT INTO users(id,first, last, username,email,login,address,zipCode) VALUES('sID','$first','$last','$username','$email','$password','$address','$zipCode')";
    $result=mysqli_query($conn,$sql_query)or die(mysqli_error($conn));
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//$count=mysqli_num_rows($result);


// If result matched $username and $password, table row must be 1 row
    if($result){
      $_SESSION['login_user']=$username;
      wait(1);
      header("Location: ../login/index.php");
    }
    else{
      $error="Registration Failed!";
      wait(1);
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
            <div id="form">
                <form action="#"> <!--BACKEND: Edit this action to wherever the form will submit to -->
                  <input type="text" placeholder="First Name"  name="first" class="form-size"><br>
              	  <input type="text" placeholder="Last Name"  name="last" class="form-size"><br>
                  <input type="text"  placeholder="Username"  name="username" class="form-size"><br>
                  <input type="password" placeholder="Password"  name="password" class="form-size"><br>
                  <input type="text" placeholder="Email"  name="email" class="form-size"><br>
                  <input type="text" placeholder="Address"  name="address" class="form-size"><br>
                  <input type="text" placeholder="Zip Code" name="zipCode" class="form-size"><br>
                  <input type="submit" id="submit" class="form-size" value="Sign Up">
              </form>
            </div>
        </div>
    </div>
    <div id="footer">
            <div class="grid-inner">
                &copy; Copyright WWYDH <?php echo date("Y") ?>
            </div>
    </div>
</body>
</html>
