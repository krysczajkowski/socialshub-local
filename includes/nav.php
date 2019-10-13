<?php 
if($functions->loggedIn()) {
    
    if(isset($_SESSION['user_id'])) {
        $user = $functions->user_data($_SESSION['user_id']); 
    } else {
        $user = $functions->user_data($_COOKIE['user_id']);
    }
}

?>
    <nav class="navbar navbar-expand-md navbar-dark py-1 shadow bg-dark sticky-top" style='opacity: 0.93; background-color: #1a1a1a!important;'>
        <div class="container">
                <a href="home.php" class="navbar-brand">
                    <div style='background-color: #1f1f1f; ' class='pr-4'>
                        <div style=' padding: 0; margin: 0;'>

                            <span style="font-size: 1.7rem; letter-spacing: -2.8px!important;" class='font-logo font-open-sans'>
                            <span style='color: #fffc00'>S</span>
                            <span style='color: #3b5998'>o</span>
                            <span style='color: #00aeef'>c</span>
                            <span style='color: #7289da'>i</span>
                            <span style='color: #e1306c'>a</span>
                            <span style='color: #3b5998'>l</span>
                            <span style='color: #fffc00'>s</span>
                            </span>

                            <div style='border: 1px solid #fefefe; width: auto; border-radius: 5px; background-color: #fefefe;' class='px-1 d-inline'>
                                <span style='font-weight: 700; color: #1f1f1f; font-size: 1.4rem;'>Hub</span>
                            </div>
                        </div>
                    </div>
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
                                <a href="<?php echo BASE_URL.$user->screenName ?>" class="dropdown-item"><i class="fas fa-user-circle"></i> <?php echo $user->screenName; ?> </a>
                                <a href="settings.php" class="dropdown-item"><i class="fas fa-cog"></i>  Settings</a>
                                <a href="logout.php" class="dropdown-item"><i class="fas fa-user-times"></i>  Logout</a>
                            </div>
                        </div>
                    
                    
                  <?php  } else { ?>
                  
                  <button onclick="window.location='index.php';" style='letter-spacing: 1px;' class='btn btn-sm px-3 btn-primary font-weight-bold'>Log In or Sign Up</button>
                  
                  <?php } ?>

                </div>
        </div>
    </nav>
