<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; 
// if(!isset($_SESSION['smedia-tutorial_access'])) {
//     header('Location: index.php');
// } else {
//     session_unset($_SESSION['smedia-tutorial_access']);
// }

if(!$functions->loggedIn()) {
    header('Location: index.php');
}
    
?>
 
<body ondragstart="return false" ondrag="return false">
    <?php include 'includes/nav.php';

    //Downloading all data about user's social medias
    $sm = $functions->showSocialMedia($user->id);

    //Links
    $links = [
        'youtube' => 'https://youtube.com/user/',
        'facebook' => 'https://facebook.com/',
        'twitter' => 'https://twitter.com/', 
        'instagram' => 'https://instagram.com/',
        'tiktok' => 'https://tiktok.com/@',
        'snapchat' => 'https://snapchat.com/add/',
        'twitch' => 'https://twitch.tv/',
        'soundcloud' => 'https://soundcloud.com/',
        'linkedin' => 'https://linkedin.com/in/',
        'spotify' => 'https://open.spotify.com/artist/',
    ];

    if(isset($_POST['submit'])) {

        //If everything went good we can redirect to user.php
        $changes_success = 1;

        // FILTERING SOCIAL MEDIA
        foreach ($sm as $socialMediaRow) {

            $smedia = $socialMediaRow->smedia;                    
                
            
            $smedia_name = $functions->checkInput($_POST[$smedia . '-name']);
            
            //Session to hold in input wrong (over 40 chars) social name
            $_SESSION[$smedia . '-inputName'] = $smedia_name;
            

            if((empty($smedia_name))) { 

                $smedia_link = '';    

            } else if(!empty($smedia_name) && strlen($smedia_name) < 40) {

                $smedia_link = $links[$smedia] . $smedia_name;

            } else {
                $changes_success = 0;
                $_SESSION['eSettings'] = $smedia . ' name must be under 40 letters.';
            } 

            $functions->updateSocialLinks($user->id, $smedia , $smedia_name, $smedia_link);
            $functions->addNewSocialMedia($user->id);
                                    
        }

        if($changes_success) {
            $_SESSION['profilepicture-tutorial_access'] = true;
            echo("<script>location.replace('profilepicture-tutorial.php')</script>");
        }
    }          


    // Dodaj tego javascripta ale przed praca na obrazkach sprawdź czy uploadProfile itp w ogole istnieje, jeżeli tak to zacznij prace, jak ją skończysz to obowiązkowo po próbuj hackować strone 

        
    ?>
    

    <div class="container text-center pt-4 mb-3">
        <span class='font-weight-bold h4'>FILL YOUR LINKS</span>
        <br>
        <span class='text-muted'>Please fill facebook, spotify, youtube with URL (not username)</span>
    </div>
    <!-- FORM -->
    <form action="" method='POST' enctype="multipart/form-data">

        <!-- ADD SOCIAL LINKS -->
        <div class="row col-10 offset-1">
        <?php    
            foreach ($sm as $socialMediaRow) {
                
                $name = (isset($_SESSION[$socialMediaRow->smedia . '-inputName']) ? $_SESSION[$socialMediaRow->smedia . '-inputName'] : $socialMediaRow->smedia_name);
                
                $smedia = $socialMediaRow->smedia;

                echo "
        <div class='input-group no-gutters mb-1'>
        <div class='input-group-prepend col-12 col-lg-5 mx-0'>
        <span id='' class='input-group-text settings-social-name w-100'>
        <img src='socialmedia-icons/$socialMediaRow->smedia.svg' class='smedia-icon-settings mr-2'>
        $links[$smedia]
                
        </span>
        </div>

        <div class='col-12 col-lg-7 mx-0'>
        <input type='text' placeholder='Your ".$socialMediaRow->smedia." URL' class='form-control w-100' name='".$socialMediaRow->smedia."-name' id='".$socialMediaRow->smedia."-name' value='$name' >
        </div>
        </div>";

                
                unset($_SESSION[$socialMediaRow->smedia . '-inputName']);
            } ?>


            <!-- SUBMIT -->
            <input type="submit" name='submit' value='NEXT' class="mt-2 btn btn-primary btn-block font-weight-bold py-1" >  

            <?php
                if(!empty($_SESSION['eSettings'])) {
                    $functions->display_error_message($_SESSION['eSettings']);
                    $_SESSION['eSettings'] = ''; 
                }
            ?>  
        </div>



</form>
    <!-- Including footer -->
    <?php include 'includes/footer.php'; ?>
   
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php include 'js/script.php' ?>
    <script src='js/search.js'></script>
</body>
</html>
