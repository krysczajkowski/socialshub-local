<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>
 
<body ondragstart="return false" ondrag="return false" class='bg-light'>
    <?php include 'includes/nav.php'; 

    // Sign Up or Log In popup for new users
    if(!$functions->loggedIn()) {
        include 'includes/signUp-popup.php';
    }

    ?>

    <div class='w-100 text-center index-gradient p-5'>
        <h2 class='text-white text-shadow font-montserrat font-weigt-bold'>SOCIALSHUB'S TOP 10</h2>
        <p class='text-white font-montserrat'>Hey! Check out SocialsHub's most visited profiles in last week!</p>
    </div>

    <div class="p-3 row col-10 offset-1 col-md-8 offset-md-0 px-5 mt-3">
        <!-- <h3 class='ml-2 font-weight-bold'>The Most Interesting Profiles</h3> -->
        <input type="text" class='form-control form-control-lg search w-100' placeholder='Search users by name, email'>
    </div>
    
    
    <div class="container">
        <div class="row search-result">  

        <?php include 'ajax/search.php'; ?>

    </div>

    <!-- Including footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- This website is using cookies information here -->
    <?php include 'includes/cookie-info.php'; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php include 'js/script.php' ?>
    <script src='js/click.js'></script>
    <script src='js/search.js'></script>
    <script src='js/accept-cookies.js'></script>
</body>
</html>
