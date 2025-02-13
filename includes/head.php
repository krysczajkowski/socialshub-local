<?php include "functions/init.php";
if($functions->loggedIn()) {

    if(isset($_SESSION["user_id"])) {
        $user = $functions->user_data($_SESSION["user_id"]);
    } else {
        $user = $functions->user_data($_COOKIE["user_id"]);
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="SocialsHub - website with social medias of your friends, celebrities and other people.">
    <meta name="keywords" content="social media, social link, social links, friends, link, links, socialshub">
    <link rel="icon" href="logo-little.png">
    <title>SocialsHub - one link to all your content</title>
    <link rel="stylesheet" href="css/style.css">
    <!--  Font awsome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/dark-mode.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <!--  BOOTSTRAP include  (TO DELETE) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

