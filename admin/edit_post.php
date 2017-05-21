<?php
session_start();
include '../includes/db.php';
if(isset($_SESSION['user']) && isset($_SESSION['password'])){
    $sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]' ";
    if($run_sql = mysqli_query($conn,$sel_sql)){
        if(mysqli_num_rows($run_sql) == 1 ){

        } else{
            header("Location:../index.php");
        }
    } else {
        header("Location:../index.php");
    }
}
$error = '';
if(isset($_POST['submit_post'])){
    $title = strip_tags($_POST['title']);//strip_tags to avoid html chars
    $date = date('Y-m-d h:i:s');
    if($_FILES['image']['name'] != ''){
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
        $image_path = '../images'.$image_name;
        $image_db_path = 'images/'.$image_name;

        if($image_size < 5000000){
            if($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif'){
                if(move_uploaded_file($image_tmp,$image_path)){
                    $ins_sql = "INSERT INTO posts (title, description, image, category, status, date, author)
                                            VALUES('$title','$_POST[description]','$image_db_path','$_POST[category]',
                                            '$_POST[status]','$date','$_SESSION[user]')";
                    if(mysqli_query($conn,$ins_sql)){
                        header('Location:post_list.php');
                    }else {
                        $error = "<div class='alert alert-danger'>The query was not working</div>";
                    }
                }else{
                    $error = "<div class='alert alert-danger'>Sorry, image file has not been uploaded.</div>";
                }
            } else {
                $error = "<div class='alert alert-danger'>Image extension not allowed!</div>";
            }
        } else {
            $error = "<div class='alert alert-danger'>Image file size not allowed!</div>";
        }
    } else {
        $ins_sql = "INSERT INTO posts (title, description, image, category, status, date, author)
                                            VALUES('$title','$_POST[description]','$image_db_path','$_POST[category]',
                                            '$_POST[status]','$date','$_SESSION[user]')";
            if(mysqli_query($conn,$ins_sql)){
                header('Location:post_list.php');
            }else {
                $error = "<div class='alert alert-danger'>The query was not working!</div>";
            }
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS System</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


</head>
<body>
<?php include 'includes/header.php'  ?>
<div style="width:50px;height: 50px"></div>
<?php echo $error; ?>
<?php include 'includes/sidebar.php'  ?>
<div class="col-lg-10">
    <?php
        if(isset($_GET['edit_id'])){

        $sql = "SELECT * FROM posts WHERE id = $_GET[edit_id]";
        $run = mysqli_query($conn,$sql);
        while($rows = mysqli_fetch_assoc($run)){?>
                    <div class="page-header">
                        <h1><?php echo $rows['title'];  ?></h1>
                    </div>

                    <div class="container-fluid">
                        <form  class="form-horizontal" method='post' action="new_post.php" enctype="multipart/form-data">
                            <img src="../<?php echo $rows['image'];  ?>" width="100px">
                            <div class="form-group">
                                <label for="image">Upload an Image</label>
                                <input type="file" id='image' name='image' class="btn btn-primary">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id='title' name='<?php echo $rows['title'];  ?>' value='New things' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control" required >
                                    <option value="">Select any Category</option>
                                    <?php
                                    $sel_sql = "SELECT * FROM category";
                                    $run_sql = mysqli_query($conn,$sel_sql);
                                    while($c_rows = mysqli_fetch_assoc($run_sql)){
                                        if($c_rows['category_name'] == 'home'){
                                            continue;
                                        }
                                        echo '<option value="'.$c_rows['category_name'].'">'.ucfirst($c_rows['category_name']).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" ><?php echo $rows['title'];  ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" id='title' name="submit_post" class="btn btn-danger btn-block">
                            </div>
                        </form>
                    </div>
        <?php }
        }else{
            echo "<div class='alert alert-danger'>Please, select a post to edit.</div>";
        }
    ?>

    </div>
<footer></footer>
</body>
</html>