<?php
session_start();
require_once "../../helpers/vars.php";
require_once "../../helpers/conn.php";

//Nick, your calls to the database were riduculously complicated to understand shame on you.
//Gonna run really sloppy with parallel arrays lmao.
$ideaIds = [];
$ideaTitles = [];
$query = "SELECT id, title FROM ideas";
$result = $conn->query($query);


$q = "SELECT id, building_address FROM locations";
$result2 = $conn->query($q);

//ARBITRARY LIMIT FOR MEMORY, can remove..
$limit=30;

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title> New Plan</title>
  <link href="../../helpers/header_footer.css" type="text/css" rel="stylesheet" />
  <link href="../../helpers/splash.css" type="text/css" rel="stylesheet" />
  <link href="styles.css" type="text/css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/42543b711d.js"></script>
  <script src="../../helpers/globals.js" type="text/javascript"></script>
  <script src="scripts.js" type="text/javascript"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>$( function() {$( "#accordion" ).accordion();} );</script>
</head>
<body>
  <div class="width">
    <div id="nav">
      <div class="nav-inner width clearfix <?php if (isset($_SESSION['user'])) echo 'loggedin' ?>">
        <a href="../../home">
          <div id="logo"></div>
          <div id="logo_name">What Would You Do Here?</div>
          <div class="spacer"></div>
        </a>
        <div id="user_nav" class="nav">
          <?php if (!isset($_SESSION["user"])) { ?>
            <ul>
              <a href="../../login"><li>Log in</li></a>
              <a href="#"><li>Sign up</li></a>
              <a href="../../contact"><li>Contact</li></a>
            </ul>
            <?php } else { ?>
              <div class="loggedin">
                <span class="click-space">
                  <span class="chevron"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                  <div class="image" style="background-image: url(../../helpers/user_images/<?php echo $_SESSION["user"]["image"] ?>);"></div>
                  <span class="greet">Hi <?php echo $_SESSION["user"]["first"] ?>!</span>
                </span>

                <div id="nav_submenu">
                  <ul>
                    <a href="../../dashboard"><li>Dashboard</li></a>
                    <a href="../../profile"><li>My Profile</li></a>
                    <a href="../../helpers/logout.php?go=home"><li>Log out</li></a>
                  </ul>
                </div>
              </div>
              <?php } ?>
            </div>
            <div id="main_nav" class="nav">
              <ul>
                <a href="../../locations"><li>Locations</li></a>
                <a href="../../ideas"><li>Ideas</li></a>
                <a href="../../plans"><li>Plans</li></a>
                <a href="../../projects"><li>Projects</li></a>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="outside" class="width">
        <div id="wrapper">
          <div class="pane active" data-index="1">
          <div class="pane-content">
            <!-- <div class="pane-content-intro">Would you like credit for this plan?</div>
            <div class="button active" data-leader="1">
            <div>Give me credit!</div>
          </div>
          <div class="button" data-leader="0">
          <div>No thanks!</div>
        </div>
        <div class="login-warning active">This will require an account!</div> -->
        <div class="pane-content-intro">Let's fill out all of the info for your new plan!</div>

        <button class="accordion active">Title</button>
        <input name="title" type="text" placeholder="What is your plan's title? Be specific!" />

      <button class="accordion active">Idea</button>
      <div>
        <select name="Ideas">
          <option disabled selected>Choose one...</option>
          <?php if($result->num_rows > 0){ while($ideas = $result->fetch_assoc()){ ?>
            <option value="<?php echo $ideas["id"] ?>"><?php echo $ideas["title"] ?></option>
    <?php }} ?>
          </select>
          <div class="plan-buttons options btn-group">
            <div class="btn op-3" style="margin-top: 0px;">
              <a href="../../ideas/new/">Create New Idea</a></div>
          </div>
        </div>

        <button class="accordion active">Location</button>
        <div>
          <select name="Location">
            <option disabled selected>Choose one...</option>
            <!-- This isnt right-->
            <?php if( $result2->num_rows > 0){ while(($row = $result2->fetch_assoc()) && $limit > 0){ ?>
              <option value="<?php echo $row["id"]?>"><?php echo $row["building_address"] ?></option>
    <?php $limit = $limit - 1; }} ?>
            </select>
            <div class="plan-buttons options btn-group">
              <div class="btn op-3" style="margin-top: 0px;">
                <a href="../../locations/new/">Submit New Location</a></div>
            </div>
          </div>

      <button class="accordion active">Date of Completion</button>
      <input name="date" type="text" placeholder="What date do you hope to be completed by? ex: (March 7, 2017)" />

        </div>

          <div class="advance" data-target="2">
            <div class="next">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></div>
          </div>

        </div>

        <div class="pane" data-index="2">
          <div class="pane-content">

            <button class="accordion active">Tasks</button>
            <div class=panel>
              <div class="checklist">
                <div class= "task-checklist">
                  <div class="add-checklist-item"><i class="fa fa-plus" aria-hidden="true"></i> Add item</div>
                  <div class="checklist-item">
                    <input type="text" placeholder="What tasks are needed for your plan? Please enter them below." />
                  </div>
                </div>
              </div>
            </div>

            <button class="accordion active">Permits</button>
            <div class="panel">
              <div class="checklist">
                <div class ="permit-checklist">
                  <div class="add-checklist-item"><i class="fa fa-plus" aria-hidden="true"></i> Add item</div>
                  <div class="checklist-item">
                    <input type="text" placeholder="Does your plan need permits? If yes, please enter below." />
                  </div>
                </div>
              </div>
            </div>


          </div>

          <div class="advance" data-target="6">
            <div class="next">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></div>
          </div>
          <div class="retreat" data-target="1">
            <div class="back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</div>
          </div>

        </div>

        <div class="pane" data-index="6">
          <div class="pane-content">
            <div class="pane-content-intro">Preview</div>
            <div class="preview"></div>
          </div>



          <!-- <div class="pane-content-intro">Would you like credit for your plan?</div>

          <div class="button active" data-leader="1">
          <div>Give me credit!</div>
        </div>
        <div class="button" data-leader="0">
        <div>No thanks!</div>
      </div>
      <div class="login-warning active">This will require an account!</div>
    </div> -->

    <div class="advance" data-target="-1">
      <div class="next">Publish <i class="fa fa-check-circle" aria-hidden="true"></i></div>
    </div>
    <div class="retreat" data-target="2">
      <div class="back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</div>
    </div>


  </div>

        <div class="pane" data-index="-1">
          <!-- Login Required -->
          <!-- <div class="pane-title">
            <div class="retreat" data-target="5"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>
            <div class="title">Login Required!</div>
          </div> -->
          <div class="pane-content">
            <div class="pane-content-intro error">
              You must be logged in to receive credit for this plan!
            </div>
            <div class="login-marker">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </div>
            <div class="login">
              <input name="user" type="text" placeholder="username" spellcheck="false", autocorrect="off" />
              <input name="pass" type="password" placeholder="password" />
              <input name="submit" type="submit" value="Submit" />
            </div>
          </div>
          <div class="retreat" data-target="6">
            <div class="back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</div>
          </div>
        </div>

        <div class="pane" data-index="-2">
          <!-- Successful Submission -->
          <!-- <div class="pane-title">
            <div class="title">Plan Submitted!</div>
          </div> -->
          <div class="pane-content">
            <div class="panel">
            <div class="pane-content-intro">
              Your plan was submitted successfully! Great!
            </div>
            <div class="success-marker">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
          </div>
            <!-- <div class="next-steps">
              <div class="sub-intro">
                What's next?
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
