<?php
include('conn/_dbconnect.php');


$showAlert = false;
$exist = false;
$passwordErr = false;
$inputFiledErr = false;


if (isset($_POST['button'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $select_sql = "SELECT email FROM adminUser WHERE email = '$email'";
        $result = mysqli_query($conn, $select_sql);
        $num = mysqli_num_rows($result);

        if ($num == 0) {


            $sql = "INSERT INTO `adminuser`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location: welcome.php");
            } else {
                $exist = true;
            }
        } else {
            $exist = true;
        }

    } else {
        $passwordErr = true;
    }




}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<?php include('includeFile/header.php')?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="index.php" method="POST" class="mt-5 p-5 border bg-light">
                    <h4>Register</h4>
                    <br>
                    <?php

                    if ($showAlert) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong>Now you register in my webiste
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }

                    if ($exist) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Waring ....</strong>This user is already exist...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    if ($passwordErr) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Waring ....</strong> Password dose not match.. Try again
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    if ($inputFiledErr) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Fill this input box
                      </div>';
                    }



                    ?>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required id="exampleInputPassword1">
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" required id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="button" class="btn btn-primary">Submit</button>
                    <?php ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>