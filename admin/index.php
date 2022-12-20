<?php 
session_start();
?>
<html>
    <head>
        <title>Admin Login 1337</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="login-panel">
            <form method="POST">
                <p>[Please Login]</p>
                
                <input type="text" name="adminname" class="login-input" placeholder="[username]">
                <input type="text" name="adminpassword" class="login-input" placeholder="[password]">
                <input class="login-input" type="submit" name="login" type="button" value="Login">
            </form>
            <?php 
            if(isset($_POST["login"])){ 
                $name = $_POST["adminname"];
                $password = $_POST["adminpassword"];

                if($name == "root" && $password == "root"){ 
                    $_SESSION["admin"] = "root";
                    header("Location: home.php");
                }else{ 
                    echo '<p style="color:red;">Wrong Information</p>';
                }
            }
            ?>
        </div>
    </body>
</html>