<?php
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <!-- start name of project in nav -->
          <a style="margin-right: 50px; padding-left:20px;" class="navbar-brand" href="."><?php echo SITENAME;?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <!-- start name of project in nav -->
          <!-- start the navbar -->
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <!-- start the menu navabar with search -->
            <div class="navbar-nav">
                <a class="nav-item nav-link active my-2 my-sm-0" href="../index.php">
                home<span class="sr-only">(current)</span>
                </a>
                <!-- <a class="nav-item nav-link active" href="importCSV.php">Import CSV file</a> -->
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Import CSV 
                  </a>
  
                  <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                  <a class="dropdown-item " href="Import/Event/index.php">Event</a>
                  <a class="dropdown-item " href="#">Stage</a>
                  <a class="dropdown-item " href="#">Job</a>
                  <a class="dropdown-item " href="#">Shop</a>
                  <a class="dropdown-item " href="#">Twonhall</a>
                  <a class="dropdown-item " href="#">Associations</a>
                  <a class="dropdown-item " href="#">Tourst_Office</a>
                  <a class="dropdown-item " href="#">Schools</a>
                  <a class="dropdown-item " href="#">Library</a>
                  <a class="dropdown-item " href="#">Companies</a>

                </li>
                
                <form class="form-inline my-2 my-lg-0" action="search.php" method="GET" class="search_form">
              <input style="margin-left:30px;" class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
              </form>
          <!-- end the menu navabar with search -->
          <!-- start the all button for log
              <div style="margin-left: 30;">
                  <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                    <?php if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == true): ?>
                        <li class="glyphicon glyphicon-log-out " style="margin-top:10px; color:greenyellow;"><span>Welcome <?php echo  $_SESSION['user']['lname']; ?> </span>
                         $_SESSION['user']['fname'].' '. -->
                        </li>
                        <li>
                        <a style="margin: 10px; color:slateblue; color:cornsilk;" href="../index.php?logout=true" class="btn btn-outline-success my-2 my-sm-0"> Sing out </a>
                        </li>
                      <?php else: ?>
                        <!-- <li><a style="margin: 10px; color:slateblue;" href="login.php" type="button" class="btn btn-outline-success my-2 my-sm-0">Login</a></li>
                        <li><a style="margin: 10px; color:slateblue;" href="register.php" type="button" class="btn btn-outline-success my-2 my-sm-0">Register</a></li> -->
                      <?php endif; ?>
                    </ul>
                  </form>
                </div>
          <!-- end the all button for log -->
            </div>
          </div>
          <!-- end the navbar -->


</nav>