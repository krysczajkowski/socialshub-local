
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';

?>

<body>
    <?php
    include 'includes/nav.php';

    ?>



    <div class="container mt-5 ">
        <h3 class='font-weight-bold'>The most popular this month</h3>

        <div class="row">
            <div class="col-md-10 offset-1">
                <div class='mt-3 mx-auto' id='accordion1'>
                  <div class='card'>
                    <a href='#text-collapse-1' data-parent='#accordion1' data-toggle='collapse' class='text-dark' style='text-decoration: none!important;'>
                        <div class='card-header'>
                            <h5>
                              <strong class='mr-3'>#1</strong>
                              <img src="https://source.unsplash.com/random/25x25" class='mb-1 rounded-circle'>
                              <strong style='font-size: 1.3rem;'> selenagomez</strong>
                              <span class="badge badge-secondary __web-inspector-hide-shortcut__ ml-2" style='font-size: 0.8rem;'>38 mln visits</span>

                            </h5>
                        </div>
                    </a>

                    <div class='collapse show' id='text-collapse-1'>
                      <div class='card-body' style='font-size: 1.1rem;'>
                        Elo mordo wbijaj na moje social media <br>
                        Inst: krys.czajkowski <br>
                        <a href="#">See more</a>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class='mt-3 mx-auto' id='accordion2'>
                  <div class='card'>
                    <a href='#text-collapse-2' data-parent='#accordion2' data-toggle='collapse' class='text-dark' style='text-decoration: none!important;'>
                        <div class='card-header'>
                            <h5>
                              <strong class='mr-3'>#2</strong>
                              <img src="https://source.unsplash.com/random/25x25" class='mb-1 rounded-circle'>
                              <strong style='font-size: 1.3rem;'> justinbieber</strong>
                              <span class="badge badge-secondary __web-inspector-hide-shortcut__ ml-2" style='font-size: 0.8rem;'>38 mln visits in the last 7 days</span>

                            </h5>
                        </div>
                    </a>

                    <div class='collapse' id='text-collapse-2'>
                      <div class='card-body' style='font-size: 1.1rem;'>
                        Elo mordo wbijaj na moje social media <br>
                        Inst: krys.czajkowski <br>
                        <a href="#">See more</a>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>

         <div class="row">
            <div class="col-md-10 offset-1">
                <div class='mt-3 mx-auto' id='accordion3'>
                  <div class='card'>
                    <a href='#text-collapse-3' data-parent='#accordion3' data-toggle='collapse' class='text-dark' style='text-decoration: none!important;'>
                        <div class='card-header'>
                            <h5>
                              <strong class='mr-3'>#3</strong>
                              <img src="https://source.unsplash.com/random/25x25" class='mb-1 rounded-circle'>
                              <strong style='font-size: 1.3rem;'> cr7</strong>
                              <span class="badge badge-secondary __web-inspector-hide-shortcut__ ml-2" style='font-size: 0.8rem;'>38 mln visits</span>

                            </h5>
                        </div>
                    </a>

                    <div class='collapse' id='text-collapse-3'>
                      <div class='card-body' style='font-size: 1.1rem;'>
                        Elo mordo wbijaj na moje social media <br>
                        Inst: krys.czajkowski <br>
                        <a href="#">See more</a>
                      </div>
                    </div>
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
                <span style='font-size: 1.1rem;' class='pt-1'>SocialsHub.com uses cookies to give you the best possible experience.<a href="privacy-policy.php"> Read More</a></span>

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
