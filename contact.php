<!doctype html>
<?php include 'includes/db.php';
    $date = date('d-m-Y h:i:s') ;
    if(isset($_POST['submit_contact'])){
        $ins_sql = "INSERT INTO comments (name,email,subject,comment,date)
                            VALUES('$_POST[name]','$_POST[email]', '$_POST[subject]','$_POST[comment]', '$date')";
        $run_sql = mysqli_query($conn,$ins_sql);
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
                  <h2>Contact Us Form</h2><?php echo date('d-m-Y h:i:s') ;  ?>
              </div>
              <form action="contact.php" method="post" class="form-horizontal" role="form">
                  <div class="form-group">
                      <label for="name" class="col-sm-2 control-label" >Name</label>

                      <div class="col-sm-8">
                          <input type="text" class="form-control"  name="name" id="name" placeholder="Insert your Name">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="email" class="col-sm-2 control-label"  >Email</label>

                      <div class="col-sm-8">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Insert your Email">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="subject" class="col-sm-2 control-label">Subject</label>

                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="comments" class="col-sm-2 control-label">Comments</label>

                      <div class="col-sm-8">
                          <textarea name="comment" id="comments" rows="10" class="form-control" style="resize:none;"></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-8">
                          <input type="submit" value="Submit your Form" class="btn btn-block btn-danger" name="submit_contact">
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