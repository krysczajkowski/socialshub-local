<?php

require_once "../functions/init.php";

if(!isset($_SESSION['access_token'])) {
    header('Location: ../index.php');
}

if($functions->userIdByEmail($_SESSION['fb-userData']['email'])) {
    //User exist, logIn him
    
    $userId = $functions->userIdByEmail($_SESSION['fb-userData']['email']);
    
    $_SESSION['user_id'] = $userId;
    
    $user = $functions->user_data($userId);
        
    header('Location: '. BASE_URL. $user->screenName);
    
} else {
    //User does not exist, make him an account
    
    $email = $_SESSION['fb-userData']['email'];
    
    //Filtering and deleting whitespace characters from first name and last name
    $firstName = $functions->checkInput(preg_replace('/\s+/', '', $_SESSION['fb-userData']['first_name']));
    $lastName  = $functions->checkInput(preg_replace('/\s+/', '', $_SESSION['fb-userData']['last_name']));
    $validationCode = md5(microtime() . $lastName);
    $randomNumber = rand(9,14);
    
    //Making as unique as possibble screenName for new user
    $screenName = substr($firstName, 0, 4) . substr($lastName, 0, 4) . substr($validationCode, 0, $randomNumber);
    $functions->register_user($email, '', $screenName, 1);
    
    $userId = $functions->userIdByEmail($email);
    $user = $functions->user_data($userId);
    
    header('Location: '. BASE_URL. $user->screenName);
    
}


?>





<a href="../logout.php">Logout</a>