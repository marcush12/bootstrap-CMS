<?php
session_start();
include '../includes/db.php';
if(isset($_SESSION['user']) && isset($_SESSION['password'])){
    $sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]' ";
    if($run_sql = mysqli_query($conn,$sel_sql)){
        while($rows = mysqli_fetch_assoc($run_sql)){
            $user_f_name = $rows['user_f_name'];
            $user_l_name = $rows['user_l_name'];
            $user_email = $rows['user_email'];
            $user_gender = $rows['user_gender'];
            $user_marital_status = $rows['user_marital_status'];
            $user_phone_no = $rows['user_phone_no'];
            $user_designation = $rows['user_designation '];
            $user_website = $rows['user_website'];
            $user_address = $rows['user_address'];
            $user_about_me = $rows['user_about_me'];
            if(mysqli_num_rows($run_sql) == 1 ){
                if($rows['role'] == 'admin'){
                } else {
                    header("Location:../index.php");
                }
            } else{
                header("Location:../index.php");
            }
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
       <!--- Profile Area --->
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-3">
                    <img src="../images/annette.jpg" width="100%" alt="" class="img-thumbnail">
                </div>
                <div class="col-md-7">
                    <h2><?php echo $user_f_name .''. $user_l_name;?></h2>
                    <p><i class="glyphicon glyphicon-heart"></i> <?php echo $user_designation;?></p>
                    <p><i class="glyphicon glyphicon-road"></i> <?php echo $user_address;?></p>
                    <p><i class="glyphicon glyphicon-envelope"></i> <?php echo $user_email;?></p>
                    <p><i class="glyphicon glyphicon-phone"></i> <?php echo $user_phone_no;?></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo ucfirst($user_gender);?></td>
                        </tr>
                        <tr>
                            <th>Marital Status</th>
                            <td><?php echo ucfirst($user_marital_status);?></td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td><?php echo ucfirst($user_website);?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-condensed">
                    <tbody>
                    <tr>
                        <td width="10%">1</td>
                        <td><a href="">The First Post</a></td>
                    </tr>
                    <tr>
                        <td width="5%">2</td>
                        <td><a href="">The Second Post</a></td>
                    </tr>
                    <tr>
                        <td width="5%">3</td>
                        <td><a href="">The Third Post</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>About Me</h4>

                <p><?php echo $user_about_me;?></p>
            </div>
        </div>
    </div>
</div>
<footer></footer>
</body>
</html>