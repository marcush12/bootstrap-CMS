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
$result = "";
if(isset($_POST['update_category'])){
    $category = strip_tags($_POST['category']);
    $sql = "UPDATE category SET category_name = '$category' WHERE c_id = $_POST[cat_id] ";
    if(mysqli_query($conn,$sql)){
        header('Location: category_list.php');
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
    <?php
    if(isset($_GET['cat_id'])){

            $sql = "SELECT * FROM category WHERE c_id = '$_GET[cat_id]'";
            $run = mysqli_query($conn,$sql);
            while($rows = mysqli_fetch_assoc($run)){
        ?>
        <div class="page-header"><h1>Edit Category</h1></div>
            <div class="container-fluid">
            <form action="" class="form-horizontal col-lg-5" method='post' action="edit_category.php" >
                <div class="form-group">
                    <input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id'] ;  ?>">
                    <label for="category">Category Name</label>
                    <input type="text" id='category' value="<?php echo $rows['category_name'];?>" name='category' class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" id='title' name="update_category" class="btn btn-danger btn-block">
                </div>
            </form>
        </div>
    <?php }
    } else {
        echo $result = "<div class='alert alert-danger'>Please, select a category</div>";
    }

    ?>
</div>
<footer></footer>
</body>
</html>