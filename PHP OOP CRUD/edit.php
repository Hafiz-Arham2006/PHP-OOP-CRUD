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
<title>EDIT</title>
</head>
<body>
<div class="container-fluid bg-dark p-3 text-center">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><button class="btn-dark btn-lg fw-bold">HOME</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="create.php"><button class="btn-dark btn-lg  fw-bold">ADD DATA</button></a>
            </li>
            <li class="nav-item" style="margin-left: 66%;">
                <a class="nav-link active" aria-current="page" href="del_all.php"><button class="btn-danger btn-lg fw-bold" onclick="return Del_all()">Delete All Data</button></a>
            </li>
        </ul>
    </div>
    <?php
 $id=$_GET['id'];
 require_once('db.php');
$ans=$obj->Select_Record($id);
$data=mysqli_fetch_assoc($ans);
    ?>
    
 <div class="container mt-2">
 <table class="table table-bordered">
        <form method="post" enctype="multipart/form-data">
        <tr>
            <td><h5>Name :</h5><input type="text" name="fname" placeholder="Name" value="<?php echo $data['f_name'] ?>" class="form-control"></td>
            <td rowspan="6"><img src="images/<?php echo $data['img'] ?>" alt="No Image" style="width:100%;object-fit:contain"></td>
        </tr>
        <tr>
            <td><h5>User Name :</h5><input type="text" name="uname" placeholder="User Name"  value="<?php echo $data['u_name'] ?>" class="form-control"></td>
        </tr>
        <tr>
            <td><h5>Email :</h5><input type="email" name="email" placeholder="Email" value="<?php echo $data['email'] ?>" class="form-control"></td>
        </tr>
        <tr>
            <td><h5>Passoword :</h5><input type="password" name="pass" placeholder="Password" value="<?php echo $data['pass'] ?>" class="form-control"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="old_img" value="<?php echo  $data['img'] ?>"></td>
        </tr>
        <tr>
            <td><h3>Choose Profile : </h3><input type="file" name="img" class="form-control"></td>
        </tr>
        <tr>
            <td><button type="submit" name="edit_btn" class="btn-lg btn-success">EDIT</button></td>
        </tr>
    </form>
    </table>
 </div>
<?php
    if(isset($_POST['edit_btn'])){
        $id=$_GET['id'];
        $fname=$_POST['fname'];
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        if($_FILES['img']['size']>0){
            $img=$_FILES['img']['name'];
            $tmp_name=$FILES['img']['tmp_name'];
            move_uploaded_file($tmp_name, 'images/' . $img);
        }
        else{
                $img=$_POST['old_img'];

        }
        $obj->Update($id,$fname,$uname,$email,$pass,$img);
        header('location:index.php');
    }

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>