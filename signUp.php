<?php 
    error_reporting(0);

    ob_start();

    require_once "fb-files/config.php";

    if (isset($_SESSION['access_token'])) {
        header('Location: fb-files/fb-logIn.php');
        exit();
    }

    $redirectURL = "192.168.64.2/projekty/socialshub-local/fb-files/fb-callback.php";
    $permissions = ['email'];
    $loginURL = $helper->getLoginUrl($redirectURL, $permissions);


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <!-- reCaptcha invisible code  -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
       
<script>
    function onSubmit(token) {
        document.getElementById("i-recaptcha").submit();
    }
</script>

    <?php include 'includes/head.php'; 
    
    if($functions->loggedIn()) {
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else if (isset($_COOKIE['user_id'])) {
            $user_id = $_COOKIE['user_id'];
        }
        
        $user = $functions->user_data($user_id);

        header('Location: '.$user->screenName);
        exit(); 
    }

    //Register Code
    $eRegister = '';

    if(isset($_POST['submit'])) {
        //VALIDATE VARIABLES
        $reg_name     = $functions->checkInput($_POST['nameRegister']);
        $reg_email    = $functions->checkInput($_POST['emailRegister']);
        $reg_password = $functions->checkInput($_POST['passwordRegister']);
        $terms    = isset($_POST['accept-terms']);
        $privacy  = isset($_POST['accept-privacy']);


        if(!empty($username) || !empty($reg_email) || !empty($reg_password)) {

            if(!filter_var($reg_email, FILTER_VALIDATE_EMAIL)) {
                $eRegister = 'Invalid email.';
            } else if (strlen($reg_name) < 2 || strlen($reg_name) > 25) {
                $eRegister = 'Name must be between 2 and 25 characters.';
            } else if ($functions->name_exist($reg_name)) {
                $eRegister = 'Sorry, this name is already taken.';
            } else if(!preg_match('/^[a-zA-Z0-9]+$/', $reg_name)) {
                $eRegister = 'Only letters, numbers and white space allowed.';
            } else if ($functions->email_exist($reg_email)) {
                $eRegister = 'This email is already in use.';
            } else if (strlen($reg_password) < 5 || strlen($reg_password) > 25) {
                $eRegister = 'Password must be between 5 and 25 characters';
            }else if ($terms != 'on' || $privacy != 'on'){
                $eRegister = 'All checkbox are required';
            } else {

                // Call the function post_captcha
                $res = $functions->post_captcha($_POST['g-recaptcha-response']);

                if (!$res['success']) {
                    // What happens when the reCAPTCHA is not properly set up
                    $eRegiseter = "Sorry you can't be registered now.";
                } else {
                    //Adding user to database
                    $functions->register_user($reg_email, $reg_password, $reg_name, 0);
                    header('Location: welcome.php');

                }
            }

        } else {
            $eRegister = 'All fields are required.';
        } 
    }

    
    ?>
    <body>  
    <?php include 'includes/nav.php'; ?>
       
        <!-- MESSAGE IF USER DELETED ACCOUNT -->
        <?php if(isset($_COOKIE['account_deleted'])) { ?>
            <div class='alert bg-danger text-white alert-dismissable mt-0 mb-4 p-2'>
                <div class="container">
                    <button type="button" class='close' data-dismiss='alert'>
                        <span>&times;</span>
                    </button>
                   <span class='text-white' style='color: #c0c0c0;'>Your account has been deleted. <b>We hope you come back soon.</b></span>
                </div>
            </div>
        <?php }  ?>
            
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 medium-font mt-4 mb-4">
                    <div class="container mt-4 font-open-sans">
                            
                            <span style="font-size: 2rem;" class='font-weight-bold'>SocialsHub</span> 
                            <p  style="font-weight: 600; font-size: 1.2rem;">All social links. One URL.</p>
                            
   
                    </div>

                    <!-- LEFT LIST -->
                    <div class="row mt-5 ml-1">
                        <div class="col-2">
                            <i class="fas fa-share fa-2x mt-2 ml-2 share-color"></i>
                        </div>
                        <div class="col-10">
                            <div class="d-block">
                                <span class='index-list-header'>Make your URL do more.</span>
                            </div>
                            <div class="d-block" style='line-height: 28px;'>
                                <span class='index-list-text'>Share your all social links by only one URL.</span>
                            </div>
                        </div>
                    </div>
                    
                     <div class="row mt-2 pt-3 ml-1">
                        <div class="col-2">
                            <i class="fas fa-hashtag fa-2x mt-2 ml-2 vanishing-posts-color"></i>
                        </div>
                        <div class="col-10">
                            <div class="d-block">
                                <span class='index-list-header'>Help your followers.</span>
                            </div>
                            <div class="d-block" style='line-height: 28px;'>
                                <span class='index-list-text'>One link bio. Multiple destinations.</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4 pt-3 ml-1">
                        <div class="col-2">
                            <i class="far fa-address-book fa-2x mt-2 ml-2 bookmark-color"></i>
                        </div>
                        <div class="col-10">
                            <div class="d-block">
                                <span class='index-list-header'>Join us!</span>
                            </div>
                            <div class="d-block" style='line-height: 28px;'>
                                <span class='index-list-text'>Join the best thing since baseball & hotdogs.</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT PANEL -->

                    <div class="col-md-6 mt-5">

                        <div class="col-md-10 mt-3 mb-4">
                            <div class="pt-4 ">
                                <div class="font-open-sans">
                                    <p class='font-weight-bold' style='font-size: 1.1rem;'>Join future world largest social links hub.</p>
                                </div>
                                <form action="signUp.php" method="post" id='i-recaptcha'>
                                    <input type="text" value='<?php if(isset($reg_name)) {echo $reg_name;} ?>' class="form-control" placeholder='Name' name='nameRegister'>
                                    <input type="email" value='<?php if(isset($reg_email)) {echo $reg_email;} ?>' class="form-control mt-2" placeholder='Email' name='emailRegister'>
                                    <input type="Password" value='<?php if(isset($reg_password)) {echo $reg_password;} ?>' class="form-control mt-2" placeholder='Password' name='passwordRegister'>
                                    <!-- TERMS CHECKBOX -->
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="checkbox" class="custom-control-input" id="accept-terms" name='accept-terms'>
                                        <label class="custom-control-label mt-1" for="accept-terms" style='font-size: 0.95rem;'>I agree to <a href="terms.php" target="_blank" class='text-primary'>Terms of Use</a></label>
                                    </div>

                                    <!-- PRIVACY POLICY, COOKIES CHECKBOX -->
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="checkbox" class="custom-control-input" id="accept-privacy" name='accept-privacy'>
                                        <label class="custom-control-label" for="accept-privacy" style='font-size: 0.95rem;'>I agree to the <a href="privacy-policy.php" target="_blank" class='text-primary'>Privacy Policy</a>, including use of cookies</label>
                                    </div>
                                    <!-- We can't use any name or id on g-recaptcha button -->
                                    <input type="submit" class='g-recaptcha btn btn-dark py-2 btn-block mt-2 font-weight-bold' value = 'Create Account' name='submit' data-sitekey="6Lf5G6EUAAAAACxEz6LkYthE5F00o-8-heFqtrYq" data-callback="onSubmit"> 

                                    <?php $functions->display_error_message($eRegister); $eRegister = '';?>
                                </form>

                            </div>
                            <a href="<?php echo $loginURL; ?>" class="fb connect mt-2 text-center w-100" id='fb-index-button'>Continue with Facebook</a>      

                        </div>
                    </div>
            </div>
        </div>

    <?php
        //Setting cookie to not show cookie popup and we are refreshing page
        if(isset($_GET['accept-cookies'])){
            setcookie('accept-cookies', 'true', time() + 31556925);
            header('Location: '.BASE_URL.$profileData->screenName);
        }
    ?>


    <!-- This website is using cookies information here -->
    <?php if(!$functions->loggedIn() && !isset($_COOKIE['accept-cookies'])) {  ?>

    <div style='margin-top: 150px;'></div>
    <div class='alert alert-dark bg-light text-black alert-dismissable fixed-bottom m-0'>
        <div class="container">

            <div class="d-flex">
                <span style='font-size: 1.1rem;' class='pt-1'>SocialsHub.net uses cookies to give you the best possible experience.<a href="privacy-policy.php"> Read More</a></span>

                <!-- Accept cookie button -->
                <a href="?accept-cookies" class='btn btn-success font-weight-bold ml-auto' style='font-size: 1.1rem;'>OK</a>
            </div>

        </div>
    </div>
    <?php } ?>

        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src='js/search.js'></script>
        <script>
        $("#fb-index-button").on("click", function() {
            $("#fb-index-button").addClass("btn disabled");
        });
        </script>
    </body>
</html>
