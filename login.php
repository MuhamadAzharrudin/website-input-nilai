<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Input Nilai</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="icon" href="./img/logo.png">

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- AOS Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <div class="content">
            <img class="logo" src="./img/logo.png" alt="logo">
        </div>

        <div class="logreg-box">
            <!-- Form login -->
            <div class="form-box login">
                <form action="./control/loginControl.php" method="POST">
                    <h2>Login</h2>
                    <div class="input-box">
                        <span class="icon"><i class="bi bi-person-fill"></i></span>
                        <input id="login-username" name="username" type="text" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="bi bi-lock-fill"></i></span>
                        <input id="login-password" name="password" type="password" required>
                        <label>Password</label>
                    </div>
                    <button type="submit" name="login" id="login-button" class="buttonn">Login</button>
                    <div class="login-register">
                        <p>Don't have an account? <a href="#" class="register-link">Register Now</a></p>
                    </div>
                </form>
            </div>
            <!-- Akhir form login -->

            <!-- Form Register -->
            <div class="form-box register">
                <form action="./control/loginControl.php" method="POST">
                    <h2>Register</h2>
                    <div class="input-box">
                        <span class="icon"><i class="bi bi-person-fill-check"></i></span>
                        <input id="register-nama" name="nama" type="text" required>
                        <label>Enter your name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="bi bi-person-fill"></i></span>
                        <input id="register-username" name="username" type="text" required>
                        <label>Create Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="bi bi-lock-fill"></i></span>
                        <input id="register-password" name="password" type="password" required>
                        <label>Create password</label>
                    </div>
                    <button type="submit" name="register" id="register-button" class="buttonn">Register</button>
                    <div class="login-register">
                        <p>Already have an account? <a href="#" class="login-link">Login Now</a></p>
                    </div>
                </form>
            </div>
            <!-- Akhit Form Register -->
        </div>
    </div>

    <script src="style/login.js"></script>

</body>

</html>