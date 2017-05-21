<!doctype html>
<?php include 'includes/db.php';  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS System</title>
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<?php include 'includes/header.php' ;?>
<div class="container">
    <article class="row">
        <section class="col-lg-8">
            <?php
            if(isset($_GET['post_id'])){
                $sel_sql = "SELECT * FROM posts WHERE id = '$_GET[post_id]'";
                $run_sql = mysqli_query($conn,$sel_sql);
                while($rows = mysqli_fetch_assoc($run_sql)){
                    echo '
                        <div class="panel panel-default">
                                <div class="panel-body">
                                      <div class="panel-header">
                                            <h3>'.$rows['title'].'</h3>
                                      </div>
                                      <img src="'.$rows['image'].'" width="100%" alt="">
                                      <p>'.$rows['description'].'</p>
                                </div>
                        </div>
                    ';
                }
            }else{
               echo "<div class='alert alert-danger'>No post selected to show.<a href = 'index.php'>Click Here </a> to select a Post</div>";
            }

            ?>

        </section>
        <?php include 'includes/sidebar.php' ;?>
    </article>
</div>
<div style="width: 50px;height: 50px;"></div>
<?php include 'includes/footer.php' ; ?>
</body>
</html>