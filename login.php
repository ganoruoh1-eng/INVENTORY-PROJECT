<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Get the data submitted by the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // 2. TEMPORARILY SET LOGIN TO ALWAYS SUCCEED
    $login_successful = true; 

    // 3. Handle the Redirection 
    if ($login_successful) {
        if ($user_type === 'admin') {
            // Admin logs in, goes to index.html
            header('Location: index.html'); 
        } elseif ($user_type === 'customer') {
            // Customer logs in, goes to shop.html
            header('Location: shop.html'); 
        }
        exit;
    } 
    // If it fails (which is currently impossible since $login_successful is true)
    // The code below would run:
    else {
        header('Location: login.php?error=invalid_credentials'); 
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #11af0bff; 
        }
        .login-card {
            max-width: 450px;
            margin-top: 80px;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="">GAINMORE SUPERMARKET</a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 login-card">
                <h4 class="text-center mb-4 text-primary">Login</h4>
                
                <form action="login.php" method="POST"> 

                    <div class="mb-4">
                        <label class="form-label">Are you an Admin or a Customer?</label>
                        <div class="d-flex justify-content-around">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_type" id="radioAdmin" value="admin" required>
                                <label class="form-check-label" for="radioAdmin">Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_type" id="radioCustomer" value="customer" required>
                                <label class="form-check-label" for="radioCustomer">Customer</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="usernameInput" class="form-label">Email / Phone No</label>
                        <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Enter your ID" required>
                    </div>

                    <div class="mb-4">
                        <label for="passwordInput" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="********" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Log In</button>

                    <p class="text-center">
                        <small>
                            <a href="#">Forgot Password?</a>
                        </small>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>