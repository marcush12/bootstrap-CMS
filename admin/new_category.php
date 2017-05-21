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
$result = '';
if(isset($_POST['submit_category'])){
    $category = strip_tags($_POST['category']);
    $sql = "INSERT INTO category (category_name) VALUES ('$category') ";
    if(mysqli_query($conn,$sql)){
        $result = '<div class="alert alert-success">You have created a new category named &apos;'.$category.'&apos;</div>';
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
<?php include 'includes/sidebar.php'  ?>
<div style="width:50px;height: 50px"></div>
<div class="col-lg-10">
<?php echo $result;?>
<div class="page-header">
        <h1>New Category</h1>
    </div>

    <div class="container-fluid">
        <form action="" class="form-horizontal col-lg-5" method='post' action="new_category.php" >
            <div class="form-group">
                <label for="category">Title</label>
                <input type="text" id='category' name='category' class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" id='title' name="submit_category" class="btn btn-danger btn-block">
            </div>
        </form>
    </div>
</div>
<footer></footer>
</body>
</html>