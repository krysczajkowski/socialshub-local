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



    //LOGIN CODE

    $eLogin = '';
    $sLogin = '';

    if(isset($_POST['loginEmail']) && !empty($_POST['loginEmail']) &&isset($_POST['loginPassword'])) {
        $email     = $_POST['loginEmail'];
        $password  = $_POST['loginPassword'];
        $remember  = isset($_POST['remember']);
        
        if(!empty($email) || !empty($password)) {
            $email     = $functions->checkInput($email);
            $password  = $functions->checkInput($password);
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $eLogin = 'Invalid format of email.';
            } else {
                
                if($functions->login_user($email, $password, $remember) == false) {
                    $eLogin = "Your credentials are not correct.";
                }
            }
            
        } else {
            $eLogin = "Your credentials are not correct.";
        }

    }

    ?>
    <body ondragstart="return false" ondrag="return false">  
    <?php include 'includes/nav.php'; ?>

        <!-- MESSAGE IF USER DELETED ACCOUNT -->
        <?php if(isset($_COOKIE['account_deleted'])) { ?>
            <div class='alert bg-danger text-white alert-dismissable mt-0 mb-4 p-2'>
                <div class="container">
                    <button type="button" class='close' data-dismiss='alert'>
                        <span>x</span>
                    </button>
                   <span class='text-white' style='color: #c0c0c0;'>Your account has been deleted. <b>We hope you come back soon.</b></span>
                </div>
            </div>
        <?php }  ?>
            
        <div class="container mt-3">
            <div class="row">

                    <div class="col-12 col-md-10 col-lg-6 offset-md-1 offset-lg-3 mt-5">
                        <div class="card card-body shadow-sm"> 
                            <form method='post'>
                                <input type="text" value='<?php if(isset($email)) {echo $email ;} ?>' class="form-control" placeholder='Email' name='loginEmail'>
                                <input type="Password" class="form-control mt-2" placeholder='Password' name='loginPassword'>
                                <div class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" class="custom-control-input" id="remember" name='remember' checked>
                                    <label class="custom-control-label" for="remember">Remember me</label>
                                </div>
                                <button class="btn btn-primary mt-2" name='login' id='login'>Login</button>
                                
                                <a href="recover.php" class='d-block text-muted mt-1 p-0 d-block'>Forgot Password?</a>

                            </form>
                            <?php
                            $functions->display_error_message($eLogin);
                            $functions->display_success_message($sLogin);
                            if(isset($_SESSION['sLogin'])) {
                                $functions->display_success_message($_SESSION['sLogin']);
                                $_SESSION['sLogin'] = '';
                            }
                            ?>  
                        </div> 
                        <a href="<?php echo $loginURL; ?>" class="text-center fb connect mt-2 w-100" id='fb-index-button'>Continue with Facebook</a>                        
                        
                    </div>

            </div>
        </div>

    <?php include 'includes/cookie-info.php'; ?>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src='js/search.js'></script>
        <script src='js/accept-cookies.js'></script>
        <script>
        $("#fb-index-button").on("click", function() {
            $("#fb-index-button").addClass("btn disabled");
        });
        </script>
    </body>
</html>
