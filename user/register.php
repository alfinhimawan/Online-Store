<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/stylesheet_login.css">
</head>
<body>
<section class="Form my-5 mx-5">
    <div class="container">
        <div class="row content g-0">
            <div class="col-lg-5">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./images/login_01.jpg" class="d-block w-100" width="700px" height="700px" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/login_02.jpg" class="d-block w-100" width="700px" height="700px" alt="...">
                    </div>
                    <div class="carousel-item">
                         <img src="./images/login_03.jpg" class="d-block w-100" width="700px" height="700px" alt="...">
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-7 px-5 pt-5">
                <div class="mb-3">
                    <img src="./images/logo-01.png" alt="" width="70%">
                </div>
                <h3>Register</h3>
                <form method="POST" action="proses_register.php">
                    <div class="form-row">
                        <div class="col-lg-7">
                            <!-- name -->
                            <input type="text" class="form-control my-2 p-2" name="nama" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <!-- alamat -->
                            <textarea name="alamat" class="form-control my-2 p-2" rows="3" placeholder="Address" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <!-- No.telp -->
                            <input type="number" class="form-control my-2 p-2" name="telp" placeholder="Telp" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <!-- Username -->
                            <input type="text" class="form-control my-2 p-2" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <!-- Password -->
                            <input type="password" class="form-control my-2 p-2" name="password" placeholder="********" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <!-- button -->
                            <button type="submit" class="btn1 mb-4">Register</button>
                        </div>
                    </div>
                    <p>Back to <a href="login.php" style="text-decoration: none">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>