<?php

    function mres($value)
    {
        $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
        $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

        return str_replace($search, $replace, $value);
    }

//    $response = array();
//
//    $users = array("user1"=>"password1", "user2"=>"password2", "user3"=>"password3");
//
//    $users["user4"] =  "password4";
//
//    $response[0] = $users;
//
//    $fp = fopen('users.json', 'w');
//    fwrite($fp, json_encode($response));
//    fclose($fp);


//
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if ( isset($_POST['name']) && isset($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['email']) && isset($_POST['password']) ){
            
            $user_name = ($_POST['name']);
            $user_email = ($_POST['email']);
            $user_password = md5($_POST['password']);


            $userjson = file_get_contents("users.json");
            if ($userjson === false) {
                // deal with error...

            }

            $u_database = json_decode($userjson, true);
            if ($u_database === null) {
                // deal with error...
                echo "json doesn't exist";
            }

            $users = $u_database[0];
            if(array_key_exists($user_email, $users)){
                header ("Location: register.php?invalidusername");
                
            }else{

                $users[$user_email] = array( "name"=>$user_name, "email"=>$user_email, "password" => $user_password );
                $u_database[0] = $users;
                file_put_contents("users.json", json_encode($u_database));
                session_start();
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $user_email;
                
                header ("Location: dashboard.php");
                
            }

        }else{
            echo "fill all fields";
        }
    }

    ?>
