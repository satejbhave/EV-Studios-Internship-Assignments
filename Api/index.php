<?php

/* ----------------- 
B. Build an API in PHP
Create an API in PHP that allows user login via username, password 
--------------------- */


header('Content-Type:application/json');

if( isset($_GET['username']) || isset($_GET['password'])){
    
    $username = $_GET['username'];
    $password = $_GET['password'];

    if( preg_match('/^[a-zA-Z0-9]+$/',$username) ){
        if(strlen($username) > 6 && strlen($username) < 12 ){
            if(strlen($password) >= 6){
                if( preg_match('/^[A-Za-z0-9_~\-!@#\$%\^&*\(\)]+$/',$password ) ){
                    //Correct Username And Password Format
                    echo json_encode(['error_code'=>'0' , 'message'=>'Correct Username And Password','result'=>'ok']);

                }else{
                    // Password Is Not In Format 
                    echo json_encode(['error_code'=>'5' , 'message'=>'Password Is Not In Format','result'=>'wrong_password']);

                }
            }else{
                // Password Less Than 6 Caracters
                echo json_encode(['error_code'=>'4' , 'message'=>'Password Less Than 6 Caracters','result'=>'wrong_password']);

            }
        }else{
            // Username Not Between 6 and 12 caracters   
            echo json_encode(['error_code'=>'3' , 'message'=>'Username Not Between 6 and 12 caracters','result'=>'wrong_username']);

        }
    }else{
        // Username Is Not Alphanumeric 
        echo json_encode(['error_code'=>'2' , 'message'=>'Username Is Not Alphanumeric' , 'result'=>'wrong_username']);

    }
}else{
    // No Username Or Password Found
    echo json_encode(['error_code'=>'1' , 'message'=>'No Username Or Password Found' , 'result'=>'no_username_and_password']);
}




?>
