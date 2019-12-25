<?php 
if($functions->loggedIn()) {
    
    if(isset($_SESSION['user_id'])) {
        $user = $functions->user_data($_SESSION['user_id']); 
    } else {
        $user = $functions->user_data($_COOKIE['user_id']);
    }
}

?>
    <nav class="navbar navbar-expand-md navbar-dark py-1 shadow bg-dark sticky-top" style='opacity: 0.95; background-color: #262626!important;'>
        <div class="container">
                <a href="index.php" class="navbar-brand">
                    
                    <span style="border-left: 1px solid white" class='font-logo font-open-sans pl-4 medium-font'>
                        <span style='letter-spacing: -2.6px;'>
                            <span style='color: #ff0000;'>S</span>
                            <span style='color: #f77737;'>o</span>
                            <span style='color: #fffc00;'>c</span>
                            <span style='color: #1da1f2;'>i</span>
                            <span style='color: #7289da;'>a</span>
                            <span style='color: #3b5998;'>l</span>
                            <span style='color: #6441a5;'>s</span>
                        </span>
                        Hub
                        <span style='font-size: 1rem; color: #fff; letter-spacing: 0.5px;'>.net</span>
                    </span>

                    
                </a>
                <button class="navbar-toggler" data-toggle='collapse' data-target='#nav'>
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id='nav'>
                   
                    <!-- SEARCH USER FORM -->
                    <form class="form-group form-inline my-2 mx-3 ml-auto dropdown" method="get">
                        <input type="text" class="form-control form-control-sm search dropdown-toggle" placeholder='Search by name' name='search' autocomplete="off" data-toggle='dropdown'>
         
                        <div class="search-result">
                        </div>
                    </form>
                    
                    <!-- We check if user is logged in and if so we can display his profile, settings and logout -->
                    <?php if($functions->loggedIn()) { ?>
                        <div class="dropdown">
                            <div class="profileImage-sm border rounded-circle dropdown-toggle"  id="dropdown" data-toggle="dropdown"></div>
                            <div class="dropdown-menu">
                                <a href="<?php echo $user->screenName ?>" class="dropdown-item"><i class="fas fa-user-circle"></i> <?php echo $user->screenName; ?> </a>                                                           
                                <a href="settings.php" class="dropdown-item"><i class="fas fa-cog"></i>  Settings</a>
                                <a href="logout.php" class="dropdown-item"><i class="fas fa-user-times"></i>  Logout</a>
                                <!-- DARK MODE SWITCH-->
    <div class="custom-control custom-switch mt-3 ml-3">
        <input type="checkbox" class="custom-control-input" id="darkSwitch">
        <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
    </div>
    <script src="js/dark-mode-switch.min.js"></script> 
                            </div>
                        </div>
                    
                    
                  <?php  } else { ?>
                  
                  <a href='signIn.php' class='mx-1 px-3 link font-weight-bold' style='color: rgba(250, 250, 250, 0.94);'>Log In</a>
                  <a href='signUp.php' class='mx-1 px-3 link font-weight-bold' style='color: rgba(250, 250, 250, 1);'>Sign Up!</a>
                  <!--  data-toggle="modal" data-target="#exampleModal" -->
                  <?php } ?>

                </div>
        </div>
    </nav>

    <!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body mt-3">
        <?php //include 'includes/login.php'; ?>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class='row d-flex w-100'>
            <div class="col-12">
                <a href="<?php// echo $loginURL; ?>" class="fb connect mt-2 d-flex justify-content-center" style='width: 100%;' id='fb-index-button'>Continue with Facebook</a>
            </div>
            <div class="col-12">
                <a href='index.php' class="btn btn-block btn-outline-secondary mt-2 font-weight-bold" style='border-radius: 2px!important;'>Sign Up</a>
            </div>
        </div>
        
        
         <span class='text-muted'>Highly recommended!</span>    
      </div>
    </div>
  </div>
</div> -->
