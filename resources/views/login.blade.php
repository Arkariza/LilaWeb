<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LilaWeb | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .main {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .alert-dismissible {
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 400px;
            display: none;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="login-box">
            @if (session('status'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('message') }}
                </div>
            @endif
            <h2 class="text-center mb-4">Login</h2>
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="register">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.querySelector('.alert-dismissible');
            if (alert) {
                alert.style.display = 'block';
                setTimeout(() => {
                    alert.classList.add('show');
                }, 100);

                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                }, 2000);

                setTimeout(() => {
                    alert.style.display = 'none';
                }, 2500);
            }
        });
    </script>
</body>
</html>
