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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS System</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.js"></script>


</head>
<body>
<?php include 'includes/header.php'  ?>
<div style="width:50px;height: 50px"></div>
<?php include 'includes/sidebar.php'  ?>
<div class="col-lg-10">
    <div style="width:50px;height: 50px"></div>
        <!--- Latest Comments Area --->
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Latest Comments</h3></div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Posts</th>
                    <th>Comments</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>

                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>2015-10-21</td>
                    <td>Author</td>
                    <td>Email</td>
                    <td>Posts</td>
                    <td>Comments</td>
                    <td><a href="" class="btn btn-warning btn-xs">Approve</a></td>
                    <td><a href="" class="btn btn-danger btn-xs">Delete</a></td>
                </tr>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>2015-10-21</td>
                    <td>Author</td>
                    <td>Email</td>
                    <td>Posts</td>
                    <td>Comments</td>
                    <td><a href="" class="btn btn-warning btn-xs">Approve</a></td>
                    <td><a href="" class="btn btn-danger btn-xs" >Delete</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2015-10-21</td>
                    <td>Author</td>
                    <td>Email</td>
                    <td>Posts</td>
                    <td>Comments</td>
                    <td>Approved</td>
                    <td><a href="" class="btn btn-danger btn-xs">Delete</a></td>
                </tr>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>2015-10-21</td>
                    <td>Author</td>
                    <td>Email</td>
                    <td>Posts</td>
                    <td>Comments</td>
                    <td><a href="" class="btn btn-warning btn-xs">Approve</a></td>
                    <td><a href="" class="btn btn-danger btn-xs">Delete</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2015-10-21</td>
                    <td>Author</td>
                    <td>Email</td>
                    <td>Posts</td>
                    <td>Comments</td>
                    <td>Approved</td>
                    <td><a href="" class="btn btn-danger btn-xs">Delete</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer></footer>
</body>
</html>