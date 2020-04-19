<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; 

if(!$functions->loggedIn()) {
    header('Location: index.php');
}

?>
 
<body ondragstart="return false" ondrag="return false">
    <?php include 'includes/nav.php';

        //If everything went good we can redirect to user.php
        $changes_success = 1;

        if(isset($_POST['button-1'])) {
            $newTheme = 'button-1';
        } else if(isset($_POST['button-2'])) {
            $newTheme = 'button-2';
        } else if(isset($_POST['button-3'])) {
            $newTheme = 'button-3';
        } else if(isset($_POST['button-4'])) {
            $newTheme = 'button-4';
        } else if(isset($_POST['button-5'])) {
            $newTheme = 'button-5';
        } else if(isset($_POST['button-6'])) {
            $newTheme = 'button-6';
        } else if(isset($_POST['gradient-button-1'])) {
            $newTheme = 'gbutton-1';
        } else if(isset($_POST['gradient-button-2'])) {
            $newTheme = 'gbutton-2';
        } else if(isset($_POST['gradient-button-3'])) {
            $newTheme = 'gbutton-3';
        }


        //Jezeli jest ustawiony $newTheme:
            //Wywołaj funkcję która sprawdzi czy dla user_id jest juz parametr w tablicy theme
                //Jesli tak to go update go 
                //Jesli nie stworz go 
            //Go na user.php
        echo $user->id;

        if(isset($newTheme)) {
            if($functions->newLinkTheme($user->id, $newTheme)) {
                echo("<script>location.replace('".$user->screenName."')</script>");
                die();
            } else {
                echo 'Sorry, there is a problem. Please try again later.';
            }
        }
        
    ?>



    <div class="bg-white my-5 border rounded container">
        <div class="row settings-card">
           
            <!-- LEFT SETTINGS PANEL -->
            <div class="d-none d-md-block col-md-4 col-lg-3">
                <div class="row">
                    <div class="col-12 my-3 pl-4 border-left border-dark">
                        <a href="settings.php" class='text-dark h5 none-decoration'>Edit Profile</a>
                    </div>
                    <div class="col-12 my-3 pl-4 ">
                        <a href="settings-links.php" class='text-dark h5 none-decoration'>My Links</a>
                    </div>
                    <?php if(!$functions->isUserFbUser($user->id)) {?>
                    <div class="col-12 my-3 pl-4">
                        <a href="edit-password.php" class='text-dark h5 none-decoration'>Change Password</a>
                    </div>
                    <?php } ?>
                    <div class="col-12 my-3 pl-4">
                        <a href="privacy_and_security.php" class='text-dark h5 none-decoration'>Privacy and Security</a>
                    </div>
                </div>
            </div>
            
            <!-- RIGHT SETTINGS PANEL -->
            <div class="col-md-8 col-lg-9 border-left">
                <form action="" method='post'>
                    <h3 class='px-4 pt-4 pb-2 font-weight-bold'>Click button to pick link theme</h3>
                    <input type="submit" name='button-1' class='gradient-button button-1' value='Black Theme'> 
                    <input type="submit" name='button-2' class='gradient-button button-2' value='Purple Gradient Theme'>
                    <input type="submit" name='button-3' class='gradient-button button-3' value='Black Border Gradient Theme'>
                    <input type="submit" name='button-4' class='gradient-button button-4' value='Black Border Gradient Theme'>
                    <input type="submit" name='button-2' class='gradient-button button-5' value='Purple Gradient Theme'>
                    <br><br>
                    <input type="submit" name='button-2' class='gradient-button button-7' value='Purple Gradient Theme'>
                    <input type="submit" name='button-2' class='gradient-button button-6' value='Purple Gradient Theme'>
                    <input type="submit" name='button-2' class='gradient-button button-8' value='Purple Gradient Theme'>  
                    <input type="submit" name='button-2' class='gradient-button button-9' value='Purple Gradient Theme'>
                    <input type="submit" name='button-2' class='gradient-button button-10' value='Purple Gradient Theme'>  
                    <input type="submit" name='button-2' class='gradient-button button-11' value='Purple Gradient Theme'>   
                    <input type="submit" name='button-2' class='gradient-button button-12' value='Purple Gradient Theme'>       
                    <br><br>
                    <input type="submit" name='gradient-button-1' class='gradient-button gradient-button-1' value='Black Border Gradient Theme'>
                    <input type="submit" name='gradient-button-2' class='gradient-button gradient-button-2' value='Black Border Gradient Theme'>
                    <input type="submit" name='gradient-button-3' class='gradient-button gradient-button-3' value='Black Border Gradient Theme'>
                </form>
            </div>


        </div>
    </div>


    <!-- Including footer -->
    <?php include 'includes/footer.php'; ?>
   
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php include 'js/script.php' ?>
    <script src='js/search.js'></script>
    <script>
        //Make it look active in nav
        $('#nav-settings').css({"border-bottom": "2px solid #fff"});
        $('#nav-settings').css({"font-weight": "700"});
    </script>
</body>
</html>
