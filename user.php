<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';

?>

<body>
    <?php

    // Different navs for logged in or not logged in users
    if(!$functions->loggedIn()) {
        include 'includes/user-nav.php';
    } else {
        include 'includes/nav.php';
    }


    if(isset($_GET['username']) && !empty($_GET['username'])){
        $username    = $functions->checkInput($_GET['username']);
        $profileId   = $functions->userIdByUsername($username);
        $profileData = $functions->user_data($profileId);

        if(!$profileData) {
           // header('Location: index.php');
            //exit();
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
            <div class="col-12 col-md-5">
                <div class='profileImage border rounded-circle shadow-sm'></div>
            </div>



               <!-- RIGHT COLUMN -->
                <div class="col-12 col-md-7">
                    <div class="text-center text-md-left w-100">
                        <h4 class='font-open-sans mt-3 mb-0 pb-0 user-screenName'>@<?php echo $profileData->screenName; ?></h4>

                        <div class="mb-3">
<p style="white-space: pre-line; font-size: 1rem;">
<?php 
    //BIO DISPLAY
    if(!empty($profileData->bio)) {
       echo $functions->text2link($profileData->bio);
    }
?>
</p>
                        </div>
<?php 
// View counter
if ($user->id === $profileId) {
?>

    <div class='text-muted'>
        <strong class='grey-font'>
            <?php echo $functions->showVisitors($profileId); ?>
        </strong> Profile Visits 
        <span class='mx-2'>|</span> 
        <strong class='grey-font'>
            <?php echo $functions->weekVisitors($profileId); ?>
        </strong> Visits This Week
    </div>

<?php } ?>
<br>
<div style='font-size: 1.2rem;'>
<?php

    if ($user->id === $profileId) {
        echo "<a href='http://192.168.64.2/projekty/socialshub-local/settings.php' class='btn btn-light font-weight-bold py-1 px-3'>Edit Profile</a>";
    }

?>
</div>

                </div>
            </div>
        </div>


   <div class="container mt-2">
            <div class="row"> 
                <div class='col-12'>
                    <div class="my-3">
                        <div class="">
                            <div class="row">
                                <div class="col-10 offset-1 mt-2">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            <a href="https://socialshub.net" class='btn btn-dark btn-block px-2 py-2 font-weight-bold small-font mt-2 custom-link'>"Down Like That" Ft. Rick Ross, Lil Baby, S-X</a>
                                            <a href="https://socialshub.net" class='btn btn-dark btn-block px-2 py-2 font-weight-bold small-font mt-2 custom-link'>Team KSI Official Playlist</a>
                                            <a href="https://socialshub.net" class='btn btn-dark btn-block px-2 py-2 font-weight-bold small-font mt-2 custom-link'>My New Album!</a>

                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="col-10 offset-1 mt-4">              
                                    <div class="row my-2 d-flex justify-content-center">
                                        <?php 
                                            $sm = $functions->showSocialMedia($profileId);
                                            //Displaying social links :D

                                            foreach ($sm as $socialMediaRow) {
                                                if(!empty($socialMediaRow->smedia_name)) {
                                                    echo "<a class='link d-flex mt-1 mb-2 col-3 col-md-1' "; 

                                                    if(!empty($socialMediaRow->smedia_link)) {
                                                        echo "href='$socialMediaRow->smedia_link'";
                                                    } else {
                                                        echo '';
                                                    }

                                                    echo " target='_blank' type='button' name='$socialMediaRow->smedia'>";
                                                    echo "<span class='socicon-$socialMediaRow->smedia mx-auto smedia-icon'></span>";
                                                    echo "</a>";
                                                }
                                            }
                                        
                                        ?> 
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>     

            </div>
       

        <!-- CREATE A POST -->

<!--         <div class="row">  -->
            <!-- LEFT COLUMN -->
 <!--            <div class="col-xs-12 col-md-4"></div> -->

            <!-- RIGHT COLUMN -->
<!--             <div class="col-xs-12 col-md-8">
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
                                        <textarea class='form-control' style="overflow:hidden; height: 130px; width: 90%;font-size: 1.2rem; border: none;" name='textarea' placeholder="What's on your mind, <?php //echo $user->screenName; ?> ?" ></textarea>
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
                        </div> -->
<!--                         <div class="d-flex justify-content-center">
                            <span class='text-danger'>Coś sie spierdolilo</span>
                        </div> -->
<!--                     </div>
                </div>
            </div>
        </div> -->


        <!-- DISPLAYING POST -->
<!--         <div class="row"> -->
            <!-- LEFT COLUMN -->
<!--             <div class="col-xs-12 col-md-4"></div> -->
            <!-- RIGHT COLUMN -->
<!--             <div class="col-xs-12 col-md-8">
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
        </div> -->

    </div>

    <!-- Including footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- This website is using cookies information here -->
    <?php include 'includes/cookie-info.php'; ?>

    <div id="a" class='bg-danger' onclick="copyDivToClipboard()"> Click to copy </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='js/search.js'></script>
    <?php include 'js/script.php' ?>
    <script src='js/accept-cookies.js'></script>
    <script>
        function copyDivToClipboard() {
            var range = document.createRange();
            range.selectNode(document.getElementById("a"));
            window.getSelection().removeAllRanges(); // clear current selection
            window.getSelection().addRange(range); // to select text
            document.execCommand("copy");
            window.getSelection().removeAllRanges();// to deselect
        }
    </script>
</body>
</html>