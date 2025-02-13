<?php 
// if($functions->loggedIn()) {
    
//     if(isset($_SESSION['user_id'])) {
//         $user = $functions->user_data($_SESSION['user_id']); 
//     } else {
//         $user = $functions->user_data($_COOKIE['user_id']);
//     }
// }

?>
<nav class="navbar navbar-expand-md navbar-light px-0 mx-0 py-1 shadow sticky-top row" style='opacity: 0.95; background-color: #fff!important;'>

    <!-- Log In or Logout part -->
    <?php if(!$functions->loggedIn()) { ?>
        <a class="col-4 d-flex link" href='signIn.php'>
            <span class='link font-weight-bold mx-auto text-dark'>Log In</span>
        </a>  
    <?php } else { ?>
        <a class="col-4 d-flex link" href='logout.php'>
            <span class='link font-weight-bold mx-auto text-dark'>Logout</span>
        </a>  
    <?php } ?>

    <a class="col-4 d-flex" href="index.php">
        <img src="logo.png" alt="" style='width: auto!important; height: 35px;' class='mx-auto'>
    </a>

    <?php if(!$functions->loggedIn()) { ?>
        <a class="col-4 d-flex link" href='signUp.php'>
            <span class='link font-weight-bold mx-auto text-dark'>Sign Up!</span>
        </a>
    <?php } else { ?>  
        <a class="col-4 d-flex link" href="<?php echo $user->screenName ?>">
            <span class='link font-weight-bold mx-auto text-dark'>Your Profile</span>
        </a>  
    <?php } ?>
</nav>

