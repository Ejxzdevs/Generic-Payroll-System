<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS (CDN) -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light" style="background-image: url('bg6.jpg');">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 10px;">
            <div class="text-center mb-4">
                <!-- Logo Image -->
                <img src="iconp.jpg" alt="Logo" class="img-fluid mb-3" style="max-width: 80px;">
                <h4 class="text-primary">Login</h4>
            </div>

            <!-- Login Form -->
            <form action="login_account.php" method="post">
                <!-- Username Input -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><img src="user.png" alt="User Icon" style="width: 20px; height: 20px;"></span>
                        <input type="text" class="form-control" id="username" name="user" placeholder="Enter username" required>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><img src="lock.png" alt="Lock Icon" style="width: 20px; height: 20px;"></span>
                        <input type="password" class="form-control" id="password" name="pass" placeholder="Enter password" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" id="btn-submit" name="submit">Login</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <small>Forgot your password? <a href="#">Click here</a></small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0yYp2B2vnD7pnsDz1t7b7YWGhQhpaExFdVjwAx5JqlXy+O7g" crossorigin="anonymous"></script>
</body>

</html>
