<?php 
include("../configuration/configuration.php");

session_start();

if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "root"){ 

?>
<html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="homestyle.css">
    </head>
    <body>
        <div class="navbar">
            <p class="logo">[1337 Admin]</p>
            <div class="header-buttons">
                <a class="header-button" href="home">Dashboard</a>
                <a class="header-button" href="post">Post</a>
            </div>
        </div>
        <form>
            <div class="upload-panel">
                <?php 
                if(isset($_GET['success'])){ 
                    echo '<p class="posted">[Posted]</p>';
                }
                if(isset($_GET["submit"])){
                    $title = mysqli_real_escape_string($_GET['title']);
                    $link = mysqli_real_escape_string($_GET['link']);
                    $date = mysqli_real_escape_string($_GET['date']);
                    if($title == ""){
                        echo '<p class="something-wrong">[Fill in the text!]</p>';
                    }else{
                        if($link == ""){
                            echo '<p class="something-wrong">[Fill in the text!]</p>';
                        }else{ 
                            if($date == ""){ 
                                echo '<p class="something-wrong">[Fill in the text!]</p>';
                            }else{ 
                                $sql = "INSERT INTO searchlist (search_name, search_date, search_link) VALUES ('".$title."', '".$date."', '".$link."')";

                                if(!mysqli_query($conn, $sql)){
                                    echo '<p class="something-wrong">[Something went wrong]</p>';
                                }else{
                                    header("Location: post.php?success");
                                } 
                            }
                        }
                    }
                }
                ?>
                <input type="text" class="upload-input" placeholder="[title]" name="title">
                <input type="text" class="upload-input" placeholder="[link here..]" name="link"></input>
                <input type="text" class="upload-input" placeholder="[date here.. (example 1-1-2000)]" name="date"></input>
                <input class="upload-input input-button" value="post" type="submit" name="submit">
            </div>
        </form>


<?php 
}else{
    header("Location: index.php");
}
?>
    </body>
</html>