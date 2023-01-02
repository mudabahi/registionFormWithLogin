<?php
include("conn/_dbconnect.php");
$data = "";
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
        header("location: login.php");

}

if (isset($_POST['logout'])) {
        session_destroy();
        $_SESSION = array();
        header("location: login.php");
}


?>

<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register Form in php by <?php echo $_SESSION['name'] ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
                crossorigin="anonymous">
</head>

<body>
        <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                        <a class="navbar-brand" href="#">LOGO</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                                <a class="nav-link active" aria-current="page"
                                                        href="welcome.php">Home</a>
                                        </li>


                                </ul>
                                <form class="d-flex" role="search" action="welcome.php" method="POST">
                                        <button class="btn btn-outline-success" type="submit">
                                                <?php echo $_SESSION['name'] ?>
                                        </button>
                                        <button class="btn btn-outline-success ms-2" type="submit"
                                                name="logout">Logout</button>
                                </form>
                        </div>
                </div>
        </nav>
        <div class="container">
                <div class="row">
                        <div class="col-8">
                                <table class="table table-bordered border">
                                        <thead>
                                                <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">name</th>
                                                        <th scope="col">email</th>
                                                        <th scope="col">password</th>
                                                </tr>
                                        </thead>
                                        <?php



                                        $sql = "SELECT * FROM adminUser";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) { ?>

                                                        <tbody>
                                                                <tr>
                                                                        <th scope="row">
                                                                                <?php echo $row['id']; ?>
                                                                        </th>
                                                                        <td><?php echo $row['name']; ?></td>
                                                                        <td>
                                                                                <?php echo $row['email']; ?>
                                                                        </td>
                                                                        <td><?php echo $row['password']; ?></td>
                                                                </tr>
                                                        </tbody>


                                                        <?php }
                                        } else {
                                                echo "0 results";
                                        }



                                        ?>

                                </table>
                        </div>
                </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
                crossorigin="anonymous"></script>
</body>

</html>