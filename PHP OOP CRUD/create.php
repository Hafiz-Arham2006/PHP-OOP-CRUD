<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="icon" href="logo.jpg">
<title>ADD</title>
</head>
<body>
<div class="container-fluid bg-dark p-3 text-center">
<ul class="nav">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php"><button class="btn-dark btn-lg fw-bold">HOME</button></a>
    </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="create.php"><button class="btn-secondary-emphasis btn-lg  fw-bold">ADD DATA</button></a>
  </li>
  <li class="nav-item" style="margin-left: 66%;">
    <a class="nav-link active" aria-current="page" href="del_all.php"><button class="btn-danger btn-lg fw-bold"  onclick="return Del_all()">Delete All Data</button></a>
  </li>
</ul>
</div>

<div class="container mt-2">
<table class="table table-bordered">
    <form method="post" enctype="multipart/form-data">
    <tr>
        <td><h5>Name : </h5><input type="text" name="fname" placeholder="Name"  class="form-control"></td>
    </tr>
    <tr>
        <td><h5>User Name : </h5><input type="text" name="uname" placeholder="User Name"  class="form-control"></td>
    </tr>
    <tr>
        <td><h5>Email : </h5><input type="email" name="email" placeholder="Email"  class="form-control"></td>
    </tr>
    <tr>
        <td><h5>Password : </h5><input type="password" name="pass" placeholder="Password"  class="form-control"></td>
    </tr>
    <tr>
        <td><h3>Choose Profile : </h3><input type="file" name="img" id="img" class="form-control"></td>
    </tr>
    <tr>
        <td><button type="submit" name="add_btn" class="btn-success btn-lg">ADD</button></td>
    </tr>
</form>
</table>
</div>
<?php

    if(isset($_POST['add_btn'])){
        $fname=$_POST['fname'];
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $img=$_FILES['img']['name'];
        $img_tmp=$_FILES['img']['tmp_name'];
        move_uploaded_file($img_tmp , 'images/'. $img);
        if($fname !="" && $uname !="" && $email !="" && $pass !="" ){

            $obj->Insert($fname,$uname,$email,$pass,$img);
            header('location:index.php');

        }
        else {
            echo "<script>alert('Please Fill all Input Fields.')</script>";
        }
    }

?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>