<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; 

if(!$functions->loggedIn()) {
    header('Location: index.php');
}
    
?>
 
<body>
   
    <?php include 'includes/nav.php';
        //We check is user active and if he is not we change his location to welcome.php
        $functions->isUserActive($user->active);
    
        //Downloading all data about user's social medias
        $sm = $functions->showSocialMedia($user->id);
        
    
        if(isset($_POST['submit'])) {    
            
            $changes_success = 1;    
                
                foreach ($sm as $socialMediaRow) {

                    $smedia = $socialMediaRow->smedia;                    
                                    
                    
                    $smedia_name = $functions->checkInput($_POST[$smedia . '-name']);
                    $smedia_link = $functions->checkInput($_POST[$smedia . '-link']);
                    
                  
                    
                    if((empty($smedia_name)) || (!empty($smedia_name) && strlen($smedia_name) < 30)) { 
                        
                        if(!empty($smedia_link) && !$functions->isTextLink($smedia_link)) {
                            $changes_success = 0;
                            $_SESSION['eSettings'] = $smedia_link . ' is not link';
                        } else {
                            $functions->updateSocialLinks($user->id, $smedia , $smedia_name, $smedia_link);
                            $functions->addNewSocialMedia($user->id);
                        }                      
                                  
                    } else {
                        $changes_success = 0;
                        $_SESSION['eSettings'] = $sm[0]->smedia . ' name must be under 30 letters.';
                    } 
                                            
                }
                
                if($changes_success === 1) {
                    echo("<script>location.href = '".BASE_URL."$user->screenName'</script>");
                    echo 'wszystko poszlo dobrze';
                }
                
        }
                
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


            <!-- MY CUSTOM LINKS -->
            <div class="m-4 pt-4 pb-5 card row col-md-10">
                <form action="" method='POST' enctype="multipart/form-data">                        

                    <!-- My Custom Links Title -->
                    <div class="row">
                        <div class="col-xs-12 col-md-10 offset-md-1 d-flex ">
                            <strong class='lg-font'>My Custom Links</strong>
                        </div>
                    </div>

                    <!-- ADD SOCIAL LINKS INPUTS -->
                    <div class="row mt-2">
                        
                        <div class="col-xs-12 col-md-10 offset-md-1 d-flex ">
                            <input type="text" class='form-control medium-font form-control-dark font-weight-bold' placeholder='Title'>
                        </div>

                        <div class="col-xs-12 col-md-10 offset-md-1 d-flex mt-1">
                            <input type="text" class='form-control form-control-dark font-weight-bold' placeholder='https://url'>
                        </div>

                        <!-- SUBMIT -->
                        <div class="col-xs-12 col-md-10 offset-md-1 d-flex mt-2">
                            <input type="submit" class='btn btn-block btn-success font-weight-bold' value='ADD NEW LINK' name='custom-links-submit'>
                        </div>
                    </div>
                </form>


                <!-- MY CUSTOM LINKS RESULTS -->  
                <div class="row align-items-center mt-4">

                    <div class="col-xs-12 col-md-8 offset-md-1 d-flex mt-1">     
                        <div class="w-100 border-left border-success pl-3" >
                            <h4 class='font-weight-bold mt-3'>My twitter post</h4>
                            <p>https://twitter.com/DawidLewickiCK/status/1201068518608900096</p>
                        </div>
                    </div>

                    <div class="col-3">     
                        <a href="" class='settings-links_remove'>Remove</a>
                    </div>

                </div>

            </div>
                

                <!-- MY SOCIAL LINKS -->                
                <div class="m-4 mt-5">
                    <form action="" method='POST' enctype="multipart/form-data">                        

                        <!-- Social Links Title -->
                        <div class="row pt-4">
                        <div class="col-xs-12 col-md-8 offset-md-1 d-flex ">
                                <strong class='lg-font'>My Social Links</strong>
                            </div> 
                        </div>

                        <!-- ADD SOCIAL LINKS -->
                        <div class="row pt-1">
                            <div class="col-xs-12 col-md-11 offset-md-1 d-flex align-items-center">
                                <div class='row'>
                                    <?php    
                                    foreach ($sm as $socialMediaRow) {
                                            
                                        echo "
                                            <div class='col-10'>
                                            <div class='input-group settings-social-input p-0'>
                                                <div class='input-group-prepend settings-social-name-div p-0'>
                                                    <span id='' class='input-group-text settings-social-name' style=''>
                                                        <span class='medium-font settings-social-text p-0 socicon-$socialMediaRow->smedia'></span>
                                                    </span>
                                                </div>
                                                <input type='text' placeholder='Your ".$socialMediaRow->smedia."' class='form-control ' name='".$socialMediaRow->smedia."-name' id='".$socialMediaRow->smedia."-name' value='$socialMediaRow->smedia_name' >
                                                <input type='url' placeholder='https://url' class='form-control' name='".$socialMediaRow->smedia."-link' id='".$socialMediaRow->smedia."-link' value=". $socialMediaRow->smedia_link .">
                                            </div>
                                            </div>";
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <!-- SUBMIT -->
                        <div class="row pt-3">
                            <div class="col-xs-12 col-md-3 py-2 d-flex justify-content-end">
                            </div>
                            <div class="col-xs-12 col-md-9 d-flex">
                                <input type="submit" name='submit' value='Save Settings' class="btn btn-primary font-weight-bold py-1" >  
                            </div>
                            
                            <?php   
    
                            if(!empty($_SESSION['eSettings'])) {
                                $functions->display_error_message($_SESSION['eSettings']);
                                $_SESSION['eSettings'] = ''; 
                            }
                            ?>                         
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
</body>
</html>
