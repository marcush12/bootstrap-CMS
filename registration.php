<!doctype html>
<?php include 'includes/db.php';
    $match ='';
    if(isset($_POST['submit_user'])){
        if($_POST['password'] == $_POST['con_password']) {
            $date = date('Y-m-d h:i:s') ;
            $ins_sql = "INSERT INTO users (role,user_f_name,user_l_name,user_email,user_password,user_gender,user_marital_status,user_phone_no,user_designation,user_website,user_address,user_about_me,user_date)
                            VALUES ('subscriber','$_POST[first_name]','$_POST[last_name]','$_POST[email]', '$_POST[password]','$_POST[gender]','$_POST[marital_status]','$_POST[phone_no]','$_POST[designation]','$_POST[website]','$_POST[address]','$_POST[about_me]','$date')";
            $run_sql = mysqli_query($conn, $ins_sql);
        }else{
            $match = "<div class='alert alert-danger'>Password does not match</div>";
        }
}


?>
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
              <div class="page-header">
                  <h2>Registration Form</h2><?php echo date('d-m-Y h:i:s') ;  ?>
              </div>
              <?php echo $match;  ?>
              <form action="registration.php" method="post" class="form-horizontal" role="form">
                  <div class="form-group">
                      <label for="first_name" class="col-sm-3 control-label" >First Name *</label>

                      <div class="col-sm-8">
                          <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="Insert your First Name" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="last_name" class="col-sm-3 control-label" >Last Name *</label>

                      <div class="col-sm-8">
                          <input type="text" class="form-control"  name="last_name" id="last_name" placeholder="Insert your Last Name" required  >
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="email" class="col-sm-3 control-label"  >Email *</label>

                      <div class="col-sm-8">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Insert your Email" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="password" class="col-sm-3 control-label"  >Password *</label>

                      <div class="col-sm-8">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="con_password" class="col-sm-3 control-label"  >Confirm Password *</label>

                      <div class="col-sm-8">
                          <input type="password" class="form-control" name="con_password" id="con_password" placeholder="Confirm Password" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="gender" name="gender" id="gender" class="col-sm-3 control-label"  >Gender </label>

                      <div class="col-sm-3">
                          <select name="gender" id="" class="form-control"  >
                              <option value="">Select Gender</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                          </select>
                      </div>
                      <label for="marital_status" class="col-sm-2 control-label"  >Marital Status</label>
                      <div class="col-sm-3">
                          <select name="marital_status" id="marital_status" class="form-control" >
                              <option value="">Select Status</option>
                              <option value="single">Single</option>
                              <option value="married">Married</option>
                              <option value="divorced">Divorced</option>
                              <option value="other">Other</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="phone_no" class="col-sm-3 control-label"  >Phone No</label>

                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone Number" >
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="designation" class="col-sm-3 control-label"  >Designation</label>

                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" >
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="website" class="col-sm-3 control-label"  >Website</label>

                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="website" id="website" placeholder="Website" >
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="address" class="col-sm-3 control-label"  >Address</label>

                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="address" id="address" placeholder="Address" >
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="about_me" class="col-sm-3 control-label"  >About me:</label>

                      <div class="col-sm-8">
                          <textarea class="form-control" name='about_me' id='about_me' rows="6" ></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-3 control-label"></label>

                      <div class="col-sm-8">
                          <input type="submit" value="Register Yourself" class="btn btn-block btn-danger" name="submit_user">
                      </div>
                  </div>
              </form>
          </section>
         <?php include 'includes/sidebar.php' ;?>
      </article>
  </div>
<div style = 'width: 50px; height: 50px;'></div>
<?php include 'includes/footer.php' ; ?>
</body>
</html>