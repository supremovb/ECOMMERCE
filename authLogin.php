<?php

$username = $_POST["username"];
$password = $_POST["password"];

session_start();



if($_SERVER ["REQUEST_METHOD"] == "POST"){
  //RECEIVE USER INPUT
  //VERIFY PASSWORD AND CONFIRM PASSWORD TO BE MATCH

    $host = "localhost";
    $database = "ecommb1";
    $dbusername = "root";
    $dbpassword = "";

$dsn = "mysql: host=$host;dbname=$database;";
try {
    $conn = new PDO($dsn, $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC);
    
    $stmt = $conn->prepare('SELECT * FROM `users`WHERE username = :p_username;');
    $stmt->bindParam(':p_username', $username);
    $stmt->execute();
    $users = $stmt->fetchAll();
    if($users){
    
    
        if ($password == $users[0]["password"]){
            echo "login successful";
            $_SESSION["fullname"] = $users[0]["fullname"];
        }else{
            echo "password did not match";
        }
         
    }else {

             echo "user not exist";
    }


} catch (Exception $e){
    echo "Connection Failed: " . $e->getMessage();
}
  
   }
  
  //CONNECT DATABASE
  //INSERT RECORD


    


  


  /*}else{

    echo "password mismatch";
  }
}*/

?>