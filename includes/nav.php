<?php 
if($functions->loggedIn()) {
    
    if(isset($_SESSION['user_id'])) {
        $user = $functions->user_data($_SESSION['user_id']); 
    } else {
        $user = $functions->user_data($_COOKIE['user_id']);
    }
}

?>
    <nav class="navbar navbar-expand-md navbar-dark py-1 shadow bg-dark sticky-top" style='opacity: 0.93; background-color: #262626!important;'>
        <div class="container">
                <a href="home.php" class="navbar-brand">
                    <div class='pr-4'>
                        <div style=' padding: 0; margin: 0;'>

                            <span style="font-size: 1.55rem; border-left: 1px solid white" class='font-logo font-open-sans pl-4'>
                            SocialsHub</span><span style='font-size: 1rem;' class='font-open-sans font-logo'>.net</span>

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
