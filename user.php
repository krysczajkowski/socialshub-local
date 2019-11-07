<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';

?>

<body>
    <?php

    include 'includes/nav.php';


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
        <!-- COVER IMAGE -->
        <div class='coverImage shadow'></div>
        <div class="row d-flex">
            <!-- PROFILE IMAGE -->
            <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                <div class='profileImage border rounded-circle shadow-sm'></div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <span style='visibility: hidden;'>a</span>
            <div class="row">
                <!-- LEFT COLUMN -->
                <div class="col-xs-12 col-md-4">
                    <div class="card my-3 shadow-sm">

                        <div class="card-header bg-white border-0 mt-1"><span class='pl-1 font-open-sans lg-font'>Social Links</span>
                        </div>

                        <div class="card-body">
                            <?php 
                                $sm = $functions->showSocialMedia($profileId);
                                //Displaying social links :D

                                foreach ($sm as $socialMediaRow) {
                                    if(!empty($socialMediaRow->smedia_name)) {
                                        echo "<p class='p-0 ml-2 border-0'>";
                                        echo "<a class='link d-flex smlink border-0' "; 

                                        if(!empty($socialMediaRow->smedia_link)) {
                                            echo "href='$socialMediaRow->smedia_link'";
                                        } else {
                                            echo '';
                                        }

                                        echo " target='_blank' type='button' name='$socialMediaRow->smedia'>";
                                        echo "<span class='socicon-$socialMediaRow->smedia' style='font-size: 1.9rem;'></span>";
                                        echo "<span class='mb-2 ml-3 w-75 user-social-name' style='font-size: 1.3rem; color: #404040;' > $socialMediaRow->smedia_name </span>";
                                        echo "</a>";
                                        echo "</p>";
                                    }
                                }
                   


                                //If this is logged in user's socials, add Edit button
                                if($user->id === $profileId) {
                                   echo "<div class='container text-center text-muted' style='font-size: 1.1rem;'><br><a href='http://localhost/projekty/socialhub/settings.php' class='link'><i class='far fa-comment'></i> Edit Social Links</a></div>";
                                }

                            
                            ?> 
                        </div>
                    </div>

                </div>


                <!-- RIGHT COLUMN -->
                <div class="col-xs-12 col-md-8">
                    <div class="card my-3 shadow-sm">
                        <div class="card-header bg-light"><h4 class='pl-3 font-open-sans' style='letter-spacing: 0.5px; font-size: 1.7rem; text-transform: capitalize;'><?php echo $profileData->screenName; ?></h4>

                            <?php //FOOTER OF CARD - View counter
                                if(isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                                    if($profileId === $_SESSION['user_id'] || $profileId === $_COOKIE['user_id']) { ?>
                                    <div class='text-muted ml-3'>
                                        <strong style='color: #555;'>
                                            <?php echo $functions->showVisitors($profileId); ?>
                                        </strong> Profile Visits 
                                        <span class='mx-2'>|</span> 
                                        <strong style='color: #555;'>
                                            <?php echo $functions->weekVisitors($profileId); ?>
                                        </strong> Visits This Week
                                    </div>

                                    <!-- <span class='ml-2 pl-2 text-muted border-left'><strong style='color: #555;'> -->
                            <?php //echo $functions->showViews($profileId) ; ?>
                                    <!-- </strong> Profile Views</span> -->
                        <?php } } ?>
                        </div>
                        <div class="card-body pb-1 mb-0">
                            <div class="container">
<pre style='font-size: 1.2rem;'>
<?php

    if(!empty($profileData->bio)) {
       echo $functions->text2link($profileData->bio);
    } else if (empty($profileData->bio) && $user->id === $profileData->id) {
       echo "<a href='http://localhost/projekty/socialhub/settings.php' class='link'>Set your bio, name and pictures here</a></div>";
    }

    if ($user->id === $profileId) {
        echo "<div class='container text-center text-muted' style='font-size: 1.1rem;'><br><a href='http://localhost/projekty/socialhub/settings.php' class='link'><i class='far fa-edit'></i> Edit Your Bio</a></div>";
    }


?>
</pre>
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
    <?php }
    ?>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='js/search.js'></script>
    <?php include 'js/script.php' ?>
</body>
</html>