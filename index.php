<?php
require_once __DIR__ . '/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= '/vendor/twbs/bootstrap/dist/css/bootstrap.min.css' ?>">
    <title>Sign Up</title>
</head>

<body>
    <div class="contatiner">
        <section class="h-100 h-custom" style="background-color: #8fc4b7;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6">
                        <div class="card rounded-3">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                                class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                                alt="Sample photo">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Sign Up</h3>

                                <form method="POST" action="signup.php" class="px-md-2">

                                    <div class="row mb-4">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="First name"
                                                aria-label="First name" name="firstname">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Last name"
                                                aria-label="Last name" name="lastname">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Username"
                                                aria-label="Username" name="username">
                                        </div>
                                        <div class="col">
                                            <input type="email" class="form-control" placeholder="Email"
                                                aria-label="Email" name="email">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <input type="date" class="form-control" placeholder="Birth Date"
                                                aria-label="Birth date" name="birthdate">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <input type="password" class="form-control" placeholder="Password"
                                                 name="password">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <input type="password" class="form-control" placeholder="Confirm Password"
                                                 name="repassword">
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


</body>

</html>