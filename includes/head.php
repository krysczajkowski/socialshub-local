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
<<<<<<< HEAD
    <!-- <link rel="stylesheet" href="css/dark-mode.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;subset=latin-ext" rel="stylesheet">
=======
    <link rel="stylesheet" href="css/dark-mode.css">
>>>>>>> 48d47904d423d8c1dadddd8380d9b4c4068f81f6
</head>

