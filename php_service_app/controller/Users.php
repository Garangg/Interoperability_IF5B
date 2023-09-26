<?php

$url = $_SERVER['REQUEST_URI'];

$urlArray = explode("index.php", $url); 
if (count($urlArray) == 2) {
    $url = $urlArray[1];
}

if(strpos($url, "/") !== 0){
    $url = "/".$url;
}

if($url == '/' && $_SERVER['REQUEST_METHOD'] == 'GET'){
    $users = array(
        array('id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
        array('id' => 2, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
        array('id' => 3, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
        array('id' => 4, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
        array('id' => 5, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
    );
    echo json_encode($users);
}

if(preg_match("/ures\/([0-9])+/",$url,$matches) && $_SERVER['REQUEST_METHOD'] == 'GET'){
    $user = array(
        '1' =>array('id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
        '2' =>array('id' => 2, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
        '3' =>array('id' => 3, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
        '4' =>array('id' => 4, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
        '5' =>array('id' => 5, 'name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'address' => '123 Main St', 'gender' => "Man"),
    );
    $user= $user[$matches[1]];

    echo json_encode($user);
}
?>