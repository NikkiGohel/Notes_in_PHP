<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="website icon" href="pencil.png" type="ico">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="Style.css"> 
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="notes.php" style="font-size:30px;">My notes</a>
            <form class="d-flex" role="search">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="height:70px; padding: 10px 30px 10px 30px;  ">
                    <button class="btn btn-transparent me-md-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@fat">Login</button>
                    <button class="btn btn-transparent" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal-1" data-bs-whatever="@getbootstrap">Sign Up</button>
                </div>
            </form>
        </div>
    </nav>
    <?php 
     include("conflig.php");
     session_start();

     if (isset($_SESSION["message"])) {
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
     }
    ?>

    <!-- Centered horizontal rule -->
    <div class="d-flex justify-content-center">
        <hr class="hr-center">
    </div>

    <main class="d-flex justify-content-center align-items-center mt-5">
        <!-- Centered section -->
        <div class="d-grid gap-2" style="width: 80%; ">
            <button class="btn btn-success btn-custom" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal" name="use" style="">Login</button>
            <button class="btn btn-success btn-custom" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal-1" name="use" style="margin-top:30px;">Sign Up</button>
        </div>
    </main>

    <!-- Centered horizontal rule -->

    <div class="d-flex justify-content-center">
        <hr class="hr-center">
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="login-email" class="col-form-label">Email address:</label>
                            <input type="email" class="form-control" id="login-email" name="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="col-form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="login-password" name="pass">
                                <span class="input-group-text" id="togglePasswordLogin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- for sign up -->
    <div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sign up</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="signup.php" method="post">
                        <div class="mb-3">
                            <label for="signup-name" class="col-form-label">Full name</label>
                            <input type="text" class="form-control" id="signup-name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="signup-email" class="col-form-label">Email address:</label>
                            <input type="email" class="form-control" id="signup-email" name="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="signup-password" class="col-form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="signup-password" name="pass">
                                <span class="input-group-text" id="togglePasswordSignup">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password field toggle functionality for Login modal
        const togglePasswordLogin = document.querySelector('#togglePasswordLogin');
        const loginPasswordField = document.querySelector('#login-password');

        togglePasswordLogin.addEventListener('click', function () {
            // Toggle the password field type
            const type = loginPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            loginPasswordField.setAttribute('type', type);

            // Toggle the eye icon
            this.innerHTML = type === 'password' ? `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg>` : `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                    <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                                    </svg>`;
        });

        // Password field toggle functionality for Sign Up modal
        const togglePasswordSignup = document.querySelector('#togglePasswordSignup');
        const signupPasswordField = document.querySelector('#signup-password');

        togglePasswordSignup.addEventListener('click', function () {
            // Toggle the password field type
            const type = signupPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            signupPasswordField.setAttribute('type', type);

            // Toggle the eye icon
            this.innerHTML = type === 'password' ? `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg>` : `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                    <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                                    </svg>`;
        });
    </script>
</body>

</html>
