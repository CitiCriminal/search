<?php 
require 'configuration/configuration.php';

?>
<html>
    <head>
        <title>1337</title>
        
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="scrollbar.css" />

        <script src="https://kit.fontawesome.com/ba23ae2d89.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="nav">
            <img src="logov2.png" alt="logo" class="logo">
            <div class="links">
                <a class="links-button" href="https://1337.bond">[Search]</a>
            </div>
        </div>
        <div class="search-panel">
            <form action="" method="post">
                <p class="title">[Search what you need!]</p>
                <input type="text" class="search" name="search" id="search" required>
                <input class="search-button" type="submit" name="search-button" id="submit">
            </form>
        </div>

        <div class="results">
            <p class="result-title">[Total Uploads: <?php
            $sql = "SELECT * FROM searchlist;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){ 
                echo mysqli_num_rows($result);
            }else{ 
                echo "No Uploads";
            }
            ?>]</p>
        </div>
        <?php 
            if(isset($_POST["search-button"])){
                $notfound = '<p class="notfound">[Not Found!]</p>';
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM searchlist WHERE search_name LIKE '".$search."' ";

                $result = mysqli_query($conn, $sql);
                
                if(mysqli_num_rows($result) > 0){ 
                    while($row = mysqli_fetch_assoc($result)){ ?>

                <div class="result-panel">
                    <p class="result-info"><?php echo $row["search_name"]; ?></p>
                    <p class="result-info"> <?php echo $row["search_date"]; ?> </p>
                    <a style="color:blue;" class="result-info" href="<?php echo $row["search_link"];?>">Download</a>
                </div>
                        <?php
                    }
                }else{ 
                    echo $notfound;
                }
            }
        ?>

        
    </body>
</html>