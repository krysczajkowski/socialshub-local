<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';

?>

<body>
    <?php

    include 'includes/nav.php';

    // Sign Up or Log In popup for new users
    if(!$functions->loggedIn()) {
        include 'includes/signUp-popup.php';
    }


    if(isset($_GET['username']) && !empty($_GET['username'])){
        $username    = $functions->checkInput($_GET['username']);
        $profileId   = $functions->userIdByUsername($username);
        $profileData = $functions->user_data($profileId);

        if(!$profileData) {
            header('Location: index.php');
            exit();
        } else {
            //$functions->addView($profileId);
            $functions->addVisitor($profileId);
        }

    } else {
        header('Location: index.php');
        die();
    }


?>


    <div class="container">
        <div class="row d-flex mt-4">
            <!-- PROFILE IMAGE -->
            <div class="col-md-4 col-sm-12">
                <div class='profileImage border rounded-circle shadow-sm'></div>
            </div>



               <!-- RIGHT COLUMN -->
                <div class="col-md-8 col-sm-12">
                    <div class="pl-5">
                        <h4 class='font-open-sans mt-3' style='letter-spacing: 0.5px; font-size: 1.7rem; text-transform: capitalize;'><?php echo $profileData->screenName; ?></h4>

                        <div class="my-3">

<pre>
<?php 
    //BIO DISPLAY
    if(!empty($profileData->bio)) {
       echo $functions->text2link($profileData->bio);
    }
?>
</pre>
                        </div>
                            <?php //FOOTER OF CARD - View counter ?>
                                    <div class='text-muted'>
                                        <strong class='grey-font'>
                                            <?php echo $functions->showVisitors($profileId); ?>
                                        </strong> Profile Visits 
                                        <span class='mx-2'>|</span> 
                                        <strong class='grey-font'>
                                            <?php echo $functions->weekVisitors($profileId); ?>
                                        </strong> Visits This Week
                                    </div>


<pre style='font-size: 1.2rem;' class='mt-3'>
<?php

    if ($user->id === $profileId) {
        echo "<a href='http://192.168.64.2/projekty/socialshub-local/settings.php' class='btn btn-light font-weight-bold py-1 px-3'>Edit Profile</a>";
    }
    if ($user->id === $profileId) {
        echo "<a href='http://192.168.64.2/projekty/socialshub-local/settings.php' class='ml-2 btn btn-light font-weight-bold py-1 px-3'>Copy your SocialsHub link</a>";
    }

?>
</pre>

            </div>
        </div>
    </div>

   <div class="container mt-2">
            <div class="row"> 
                <div class='col-12 UserSocialLinksBox'>
                    <div class="my-3">
                        <div class="">
                            <div class="row">
                                <div class="col-md-4 pl-2 pl-5 order-md-1 order-2 mt-5">              
                                    
                                    <?php 
                                        $sm = $functions->showSocialMedia($profileId);
                                        //Displaying social links :D

                                        foreach ($sm as $socialMediaRow) {
                                            if(!empty($socialMediaRow->smedia_name)) {
                                                echo "<div class='row my-2'>";
                                                echo "<a class='link d-flex border-0' "; 

                                                if(!empty($socialMediaRow->smedia_link)) {
                                                    echo "href='$socialMediaRow->smedia_link'";
                                                } else {
                                                    echo '';
                                                }

                                                echo " target='_blank' type='button' name='$socialMediaRow->smedia'>";
                                                echo "<span class='socicon-$socialMediaRow->smedia mr-4' style='font-size: 1.35rem;'></span>";
                                                echo "<p class='user-social-name' style='font-size: 1.15rem; color: #404040;' > $socialMediaRow->smedia_name </p>";
                                                echo "</a>";
                                                echo "</div>";
                                            }
                                        }
                                    
                                    ?> 
                                </div>

                                <div class="col-md-8 order-md-2 order-1 mt-4">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            <a href="https://socialshub.net" class='btn btn-light btn-block font-weight-bold px-2 py-3 small-font mt-2' style='border-bottom: 1px solid #303030;'>"Down Like That" Ft. Rick Ross, Lil Baby, S-X</a>
                                            <a href="https://socialshub.net" class='btn btn-light btn-block font-weight-bold px-2 py-3 small-font mt-2' style='border-bottom: 1px solid #303030;'>Team KSI Official Playlist</a>
                                            <a href="https://socialshub.net" class='btn btn-light btn-block font-weight-bold px-2 py-3 small-font mt-2' style='border-bottom: 1px solid #303030;'>My New Album</a>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     

            </div>
       

        <!-- CREATE A POST -->

        <div class="row">
            <!-- LEFT COLUMN -->
            <div class="col-xs-12 col-md-4"></div>

            <!-- RIGHT COLUMN -->
            <div class="col-xs-12 col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-2" style='background: #fff; border:none;'>
                        <h4 class='pl-2 mt-2 font-open-sans ' style=' font-size: 1.3rem; text-transform: capitalize;'>Create Post</h4>
                    </div>
                    <div class="card-body px-4 py-2">
                        <div class="row">
                            <div class="col-1">
                                <div class="profileImage-sm border rounded-circle ml-3" style="width: 50px; height: 50px;"></div>
                            </div>
                            <div class="col-11">
                                <input type="text" class='form-control' style='border: none; width: 90%; height: 50px; font-size: 1.8rem;' placeholder='Title'>
                                        <textarea class='form-control' style="overflow:hidden; height: 130px; width: 90%;font-size: 1.2rem; border: none;" name='textarea' placeholder="What's on your mind, <?php echo $user->screenName; ?> ?" ></textarea>
                            </div>
                            <div class="form-group "> 
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Czas wygasniecia</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>4</option>
                                  <option>4</option>
                                  <option>4</option>
                                  <option>4</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            <input type="submit" name="submit" value="Post" class="btn btn-primary w-25 mr-4 ml-auto font-weight-bold py-1" style='height: 38px;'>
                        </div>
        <!--                 <div class="d-flex justify-content-center">
                            <span class='text-danger'>Coś sie spierdolilo</span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>


        <!-- DISPLAYING POST -->
        <div class="row">
            <!-- LEFT COLUMN -->
            <div class="col-xs-12 col-md-4"></div>
            <!-- RIGHT COLUMN -->
            <div class="col-xs-12 col-md-8">
                <div class="card p-3">
                    <div class="card-header pb-0 d-flex" style='background: #fff; border:none;'>
                        
                        <h4 class='pl-2 mt-2 font-open-sans' style='font-size: 2.1rem; text-transform: capitalize;'>Title</h4>
                        <span class='text-muted ml-auto font-weight-bold mt-3' style='font-size: 0.8rem;'>Wygasnie za: 2 dni</span>
                    </div>
                    <div class="card-body px-4 pb-4" style='font-size: 1.3rem;'>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin blandit pharetra tortor ac malesuada. Cras non sagittis justo. In ultricies lacus eget sapien varius, at vehicula massa vehicula. Sed finibus interdum ex in placerat. Nunc at semper mauris. Ut bibendum dolor felis, eget volutpat metus viverra et. 
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include 'includes/footer.php'; ?>


    <?php
        //Setting cookie to not show cookie popup and we are refreshing page
        if(isset($_GET['accept-cookies'])){
            setcookie('accept-cookies', 'true', time() + 31556925);
            header('Location: '.BASE_URL.$profileData->screenName);
        }
    ?>


    <!-- This website is using cookies information here -->
    <?php include 'includes/cookie-info.php'; ?>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='js/search.js'></script>
    <?php include 'js/script.php' ?>
</body>
</html>