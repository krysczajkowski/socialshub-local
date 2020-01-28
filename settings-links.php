<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';

    if(!$functions->loggedIn()) {
        header('Location: index.php');
    }
    //We check is user active and if he is not we change his location to welcome.php
    $functions->isUserActive($user->active);

    //Downloading all data about user's social medias
    $sm = $functions->showSocialMedia($user->id);

    //If everything went good we can redirect to user.php
    $changes_success = 1;


    //Links
    $links = [
        'youtube' => 'https://youtube.com/',
        'facebook' => 'https://facebook.com/',
        'twitter' => 'https://twitter.com/', 
        'instagram' => 'https://instagram.com/',
        'tiktok' => 'https://tiktok.com/@',
        'snapchat' => 'https://snapchat.com/add/',
        'twitch' => 'https://twitch.tv/',
        'soundcloud' => 'https://soundcloud.com/',
        'linkedin' => 'https://linkedin.com/in/',
        'spotify' => 'https://open.spotify.com/artist/',
        'github' => 'https://github.com/',
        'pinterest' => 'https://pinterest.com/'

    ];


    // SETTINGS CODE    

    if(isset($_POST['submit'])) {
                                

        // FILTERING SOCIAL MEDIA
        foreach ($sm as $socialMediaRow) {

            $smedia = $socialMediaRow->smedia;                    
                
            
            $smedia_name = $functions->checkInput($_POST[$smedia . '-name']);
            
            //Session to hold in input wrong (over 30 chars) social name
            $_SESSION[$smedia . '-inputName'] = $smedia_name;
            
            if((empty($smedia_name)) || (!empty($smedia_name) && strlen($smedia_name) < 30)) { 


                $smedia_link = $links[$smedia] . $smedia_name;

                $functions->updateSocialLinks($user->id, $smedia , $smedia_name, $smedia_link);
                $functions->addNewSocialMedia($user->id);
                                      
                          
            } else {
                $changes_success = 0;
                $_SESSION['eSettings'] = $smedia . ' name must be under 30 letters.';
            } 
                                    
        }

        if($changes_success) {
            echo("<script>location.replace('".$user->screenName."')</script>");
        }
    }
            
    

// Dodaj tego javascripta ale przed praca na obrazkach sprawdź czy uploadProfile itp w ogole istnieje, jeżeli tak to zacznij prace, jak ją skończysz to obowiązkowo po próbuj hackować strone 

    
?>
 
<body>
   
    <?php include 'includes/nav.php';
        //We check is user active and if he is not we change his location to welcome.php
        $functions->isUserActive($user->active);
    
                
    ?>
    
    
    <div class="bg-white my-5 border rounded container">
        <div class="row settings-card">
           
            <!-- LEFT SETTINGS PANEL -->
            <div class="d-none d-md-block col-md-4 col-lg-3">
                <div class="row">
                    <div class="col-12 my-3 pl-4">
                        <a href="settings.php" class='text-dark h5 none-decoration'>Edit Profile</a>
                    </div>
                    <div class="col-12 my-3 pl-4 border-left border-dark">
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

                <form action="" method="POST">
                    <!-- Social Links Title -->
                    <div class="row pt-4">
                        <div class="col-12 pr-0 mr-0 col-md-3 py-2 d-flex justify-content-end justify-text-md-start">
                            <strong class='medium-font '>Social Links</strong>
                        </div>
                        <div class="col-xs-12 col-md-9 d-flex align-items-center"></div>  
                    </div>

                    <!-- ADD SOCIAL LINKS -->
                    <div class="row pt-1">
                        <div class="col-xs-12 col-md-11 offset-md-1 d-flex align-items-center">
                            <div class='row'>
                                <?php    
                                foreach ($sm as $socialMediaRow) {
                                    
                                    $name = (isset($_SESSION[$socialMediaRow->smedia . '-inputName']) ? $_SESSION[$socialMediaRow->smedia . '-inputName'] : $socialMediaRow->smedia_name);
                                    
                                    $smedia = $socialMediaRow->smedia;

                                    echo "
<div class='col-12 col-md-10'>
<div class='row mb-2'>
<div class='col-12 col-lg-5'>
    <span id='' class='input-group-text settings-social-name'>
        <span class='medium-font settings-social-text p-0 socicon-$socialMediaRow->smedia'></span>
        $links[$smedia]
    </span>
</div>
<div class='col-12 col-lg-7 '>
    <input type='text' placeholder='Your ".$socialMediaRow->smedia." name' class='form-control' name='".$socialMediaRow->smedia."-name' id='".$socialMediaRow->smedia."-name' value='$name' >
</div>
</div>
</div>";
                                    
                                    unset($_SESSION[$socialMediaRow->smedia . '-inputName']);
                                } ?>
                            </div>
                        </div>
                    </div>


                    <!-- SUBMIT -->
                    <div class="row pt-3">
                        <div class="col-xs-12 col-md-11 offset-md-1 d-flex align-items-center">
                            <input type="submit" name='submit' value="Save and go back to my profile" class="link py-1" >  
                            
                            <?php   

                            if(!empty($_SESSION['eSettings'])) {
                                $functions->display_error_message($_SESSION['eSettings']);
                                $_SESSION['eSettings'] = ''; 
                            }
                            ?>    
                        </div>                     
                    </div>
                
                </form>
            </div>
                
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
        //Funkcja collapse('hide') chowa wszystkie elementy, a po tym pojawia się ten który klikneliśmy
        $('.port-item').click(function(){
            $('.collapse').collapse('hide')
        })

    </script>
</body>
</html>
