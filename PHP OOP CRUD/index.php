<?php

require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="logo.jpg">
    <title>HOME</title>
</head>

<body>
    <div class="container-fluid bg-dark p-3 text-center">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><button class="btn-secondary-emphasis
btn-lg fw-bold">HOME</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="create.php"><button class="btn-dark btn-lg  fw-bold">ADD DATA</button></a>
            </li>
            <li class="nav-item" style="margin-left: 66%;">
                <a class="nav-link active" aria-current="page" href="del_all.php"><button class="btn-danger btn-lg fw-bold" onclick="return Del_all()">Delete All Data</button></a>
            </li>
        </ul>
    </div>
    <table class="table">

        <form method="post" action="search.php">

            <tr>
                <td> <input type="search" name="search" class="form-control  p-3" placeholder="Search ID or Name">
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="search_btn" class="btn-lg btn-secondary">Search</button></td>
            </tr>
    </table>
    </form>

    <?php
    $ans = $obj->Show_Record();

    if (mysqli_num_rows($ans) > 0) {
    ?>
        <table class="table text-center table-bordered table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>USER NAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>PROFILE</th>
                <th colspan="2">OPERATIONS</th>
            </tr>
            <?php


            while ($data = mysqli_fetch_assoc($ans)) {
            ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['f_name'] ?></td>
                    <td><?php echo $data['u_name'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['pass'] ?></td>
                    <td><img src="images/<?php echo $data['img'] ?>" alt="No Image" style="width:100%;height:50px;object-fit:contain"></td>
                    <td><a href="edit.php?id=<?php echo $data['id'] ?>"><button class="btn-lg  btn-dark">Edit</button></a></td>
                    <td><a href="delete.php?id=<?php echo $data['id'] ?>"><button onclick="return Del()" class="btn-lg p-2 btn-danger">Delete</button></a></td>
                </tr>

        <?php
            }
        } else {
            echo "<h3 class='text-center fw-bold'>NO DATA </h3>";
        }

        ?>
        </table>
        <script>
            function Del() {
                return confirm("Do you Want to Delete this Record ?");
            }

            function Del_all() {
                return confirm('Do you Want to Delete All Data ?');
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>