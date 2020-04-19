<?php
error_reporting(E_ALL & ~E_WARNING);

include '../functions/init.php';

if(isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $functions->checkInput($_POST['search']);
    $result = $functions->search($search);

    if(!empty($result)) {

    $i=0;   
    foreach($result as $user){
    $userSM = $functions->showNotEmptySocialMedia($user->id); 
    $i++;
    ?>

        <div class='p-3 row col-md-8 offset-md-0 mt-3 border-bottom border-secondary search-result'>
            <div class='col-2 pt-3'>
                <h3 class='font-weight-bold ranking-number'>#<?php echo $i ?></h3>
            </div>

            <div class='col-2'>
                <img src="<?php echo $user->profileImage; ?>" class='ranking-picture border rounded-circle shadow-sm' style='width: 5rem; height: 5rem;' >
            </div>

            <div class='col-8'>
                <div class='row'>
                    <div class='col-12'>
                        <p class='font-weight-bold w-100 h3 ranking-name'>
                            <a href='<?php echo $user->screenName ?>' class='link text-dark' style='word-break: break-all;'><?php echo $user->screenName ?></a>
                        </p>
                    </div>
                    <div class='col-12 mb-2 mt-1'>
                        <p class='ranking-bio'>
                            <?php echo substr($user->bio, 0, 45) . ' ... ' ?>
                        </p>
                    </div>

                    <div class="col-12 row">
                        <?php 
                             for($k=0; $k<3; $k++) {
                                 if(isset($userSM[$k]->smedia_link)) {
                                     $smedia_link = $userSM[$k]->smedia_link;
                                
                            
                         ?>
                            <a href="<?php echo $userSM[$k]->smedia_link ?>" class='link d-flex social-link-click' data-sociallink='<?php echo $userSM[$k]->id ?>' target='_blank'>
                                <img src='socialmedia-icons/$socialMediaRow->smedia.svg' class='smedia-icon-index'>
                            </span>
                        </a> 
                        <?php } } ?>  
                    </div>

                </div>
            </div>
        </div>

    <?php
         }



} else {

    echo "<div class='p-3 row col-md-8 offset-md-2 mt-3 lg-font'>No matches.</div>";
}

} else {
    ?>
    <div class='col-md-8 offset-md-0'>

    <?php
    
        // Dodaj tego javascripta ale przed praca na obrazkach sprawdź czy uploadProfile itp w ogole istnieje, jeżeli tak to zacznij prace, jak ją skończysz to obowiązkowo po próbuj hackować strone 
        $ranking = $functions->rankingGenerator();
        
        for($i=0; $i < count($ranking); $i++) {
            $rankingUserId   = $ranking[$i]->account_id;
            $rankingUserData = $functions->user_data($rankingUserId);    
            $rankingUserSM   = $functions->showNotEmptySocialMedia($rankingUserId);   
            $rankingPosition = $i + 1;     
    ?>

        <div class="p-3 row mt-3 border-bottom search-result">
            <div class="col-2 pt-3">
                <h3 class='font-weight-bold ranking-number font-montserrat'><?php echo '#'.$rankingPosition; ?></h3>
            </div>

            <div class="col-2">
                <img src="<?php echo $rankingUserData->profileImage ?> " class='ranking-picture border rounded-circle shadow-sm' style='width: 5rem; height: 5rem;' >
            </div>

            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                        <p class='font-weight-bold w-100 h3 ranking-name'>
                            <a href="<?php echo $rankingUserData->screenName; ?>" class='link text-dark font-montserrat' style='word-break: break-all;'><?php echo $rankingUserData->screenName; ?></a>
                        </p>
                    </div>
                    <div class="col-12 mb-2 mt-1">
                        <p class='ranking-bio'>
                            <?php echo substr($rankingUserData->bio, 0, 45) . ' ... ' ?>
                        </p>
                    </div>
                    
                    <div class="col-12 row">
                        <?php 
                             for($k=0; $k<3; $k++) {
                                 if(isset($rankingUserSM[$k]->smedia_link)) {
                                     $smedia_link = $rankingUserSM[$k]->smedia_link;
                                
                            
                         ?>
                            <a href="<?php echo $rankingUserSM[$k]->smedia_link ?>" class='link d-flex social-link-click' data-sociallink='<?php echo $rankingUserSM[$k]->id ?>' target='_blank'>
                                <img src='socialmedia-icons/$socialMediaRow->smedia.svg' class='smedia-icon-index'>
                            </span>
                        </a> 
                        <?php } } ?>  
                    </div>

                </div>
            </div>
        </div>

    <?php } // END OF THE LOOP ?>

    </div>

    <div class='d-none d-md-block col-md-3 offset-md-1'>
        <div class="card p-0" style='border: 2px solid #cd6769; margin-top: -50px;'>
            <div class="card-body text-center">
                <img src="images/image1069.jpg" alt="" class=' rounded-circle img-fluid' style='width: 50px;'>
                <br>
                <p class='mt-3 mb-3'>
                    <p>Hey @username!</p>
                    <p>My name is Krystian Czajkowski, I’m 16 and I am the creator of SocialsHub.net. </p>

                    <p>I know people hate ads, so if you've found the site helpful or useful then please consider throwing a coffee my way to help support my work 😊</p>
                </p>
                <script type='text/javascript' src='https://ko-fi.com/widgets/widget_2.js'></script><script type='text/javascript'>kofiwidget2.init('Support Me on Ko-fi', '#cd6769', 'W7W11MI6Y');kofiwidget2.draw();</script> 

            </div>
            <div class="card-footer text-center bg-white py-1">
                Close
            </div>
        </div>
    </div>
<?php } ?>

