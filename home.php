<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>
 
<body> 
    <?php include 'includes/nav.php'; ?>


    <div class="container mt-5">
        <h3 class='mb-3'><b>The Most Interesting Profiles This Week</b></h3>
        <div class="row">  

    <a href="<?php echo BASE_URL . $rankingUserData->screenName ?>" target='_blank' class='link'>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        </div>

    </a>



            </div>



<?php 
echo '<pre>';
$ranking = $functions->rankingGenerator();
echo '</pre>';

foreach($i as $ranking) {
    echo 'dupa';
}

?>







    <div class="p-3 row col-8 offset-2 mt-3 border-bottom border-secondary">
        <div class="col-1 pt-3">
            <h3 class='font-weight-bold '>#1</h3>
        </div>

        <div class="col-2">
            <img src="https://socialshub.net/images/image95B2BC0D06-54C4-4AD7-9632-9842D38DA577.jpeg" class='border rounded-circle shadow-sm' style='width: 5rem; height: 5rem;'>
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <h3 class='font-weight-bold w-50'>Julia</h3>
                </div>
                <div class="col-12 mb-2 mt-1">
                    <?php echo substr('Hi! My name is Julia. I am 13 yo entrepreneur.', 0, 35) . " ...  <a href='krysczajkowski' class='link'>visit profile</a>"; ?>
                    
                </div>
                <div class="col-12">
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-instagram mx-3' style='font-size: 1.9rem;'>
                    </span></a>   
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-twitch mx-3' style='font-size: 1.9rem;'>
                    </span></a>  
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-tiktok mx-3' style='font-size: 1.9rem;'>
                    </span></a>  
                </div>
            </div>
        </div>

    </div>

    <div class="p-3 row col-8 offset-2 mt-3 border-bottom border-secondary">
        <div class="col-1 pt-3">
            <h3 class='font-weight-bold '>#2</h3>
        </div>

        <div class="col-2">
            <img src="https://socialshub.net/images/image38me2019.jpg" class='border rounded-circle shadow-sm' style='width: 5rem; height: 5rem;'>
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <h3 class='font-weight-bold w-50'>Krystian</h3>
                </div>
                <div class="col-12 mb-2 mt-1">
                    <?php echo substr('COOL GUY', 0, 35) . " ...  <a href='krysczajkowski' class='link'>visit profile</a>"; ?>
                    
                </div>
                <div class="col-12">
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-instagram mx-3' style='font-size: 1.9rem;'>
                    </span></a>   
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-facebook mx-3' style='font-size: 1.9rem;'>
                    </span></a>  
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-twitter mx-3' style='font-size: 1.9rem;'>
                    </span></a>  
                </div>
            </div>
        </div>

    </div>

    <div class="p-3 row col-8 offset-2 mt-3 border-bottom border-secondary">
        <div class="col-1 pt-3">
            <h3 class='font-weight-bold '>#3</h3>
        </div>

        <div class="col-2">
            <img src="https://socialshub.net/images/image784644dbf666cb703a3b5c2ffc8fd60411b0923408_full.jpg" class='border rounded-circle shadow-sm' style='width: 5rem; height: 5rem;'>
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <h3 class='font-weight-bold w-50'>Pat</h3>
                </div>
                <div class="col-12 mb-2 mt-1">
                    <?php echo substr('Future world largest content creator.', 0, 35) . " ...  <a href='krysczajkowski' class='link'>visit profile</a>"; ?>
                    
                </div>
                <div class="col-12">
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-snapchat mx-3' style='font-size: 1.9rem;'>
                    </span></a>   
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-twitch mx-3' style='font-size: 1.9rem;'>
                    </span></a>  
                    <a href='http://localhost/projekty/socialhub/home.php'><span class='socicon-youtube mx-3' style='font-size: 1.9rem;'>
                    </span></a>  
                </div>
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
