<?php 
//received user input
$username = $_POST["username"];
$password = $_POST["password"];

session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        //connect to database
        $host = "localhost";
        $database = "ecommb1";
        $dbusername = "root";
        $dbpassword = "";

        $dsn = "mysql: host=$host;dbname=$database;";
        try {
            $conn = new PDO($dsn, $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            $stmt = $conn->prepare('SELECT * FROM users WHERE username = :p_username');
            $stmt->bindParam(':p_username',$username);
            $stmt->execute();
            $users = $stmt->fetchAll();
            if($users){
                if(password_verify($password,$users[0]["password"])){
                //if($password == $users[0]["password"]){
                    header("location: /index.php");
                    $_SESSION["fullname"] = $users[0]["fullname"];
                } else {
                    header("location: /login.php");
                    $_SESSION["error"] = "password did not match";
                }
            } else {
                header("location: /login.php");              
                $_SESSION["error"] = "User does not exits";
            }

        } catch (Exception $e){
            echo "Connection Failed: " . $e->getMessage();
        }


    
}


?>