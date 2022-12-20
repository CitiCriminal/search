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
        <div class="posts">
            <p class="post-title">Posts: <br><br><span style="font-size:25px;">
            <?php 
            $sql = "SELECT * FROM searchlist";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){ 
                echo mysqli_num_rows($result);
            }else{ 
                echo "0";
            }
            ?>
            </span></p>
        </div>
        <p class="info">[Published Posts:]</p>
        <?php 
        $noposts = '<p style="color:red;" class="info">No posts have been posted!</p>';
        $sql = "SELECT * FROM searchlist;";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="posts-published">
                    <div class="posts-published-nexttoeachother">
                        <div class="posts-published-info">
                            <a><?php echo $row['id']; ?></a>
                        </div>
                        <div class="posts-published-info">
                            <a><?php echo $row['search_name']; ?></a>  
                        </div>
                        <div class="posts-published-info">
                            <a><?php echo $row['search_date']; ?></a> 
                        </div >
                        <div class="posts-published-info"> 
                            <a href="<?php echo $row['search_link']; ?>">Download</a>
                        </div>
                    </div>
                </div>
            <?php 
            }
        }else{ 
            echo $noposts;
        }
        
        ?>
<?php 
}else{
    header("Location: index.php");
}
?>
    </body>
</html>