<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Background container -->
    <div class="bg-image" style="background-image: url('bg6.jpg'); height: 100vh;">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <!-- Form container -->
                <form class="border p-4 rounded shadow-lg bg-white" method="post" action="register_account.php">
                    <h3 class="text-center mb-4"><b>SIGN UP</b></h3>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>

                    <!-- Username Field -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <!-- Retype Password Field -->
                    <div class="mb-3">
                        <label for="repassword" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" name="repassword" id="repassword" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, but needed for responsive features like modals or dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
