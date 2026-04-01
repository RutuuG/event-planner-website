<?php
require_once 'config/database.php';
require_once 'config/session.php';
require_once 'classes/User.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($user->login($email, $password)) {
        if ($user->role === 'admin') {
            // Set session variables
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_first_name'] = $user->first_name;
            $_SESSION['user_last_name'] = $user->last_name;
            $_SESSION['user_role'] = $user->role;
            
            header("Location: admin-dashboard.php");
            exit();
        } else {
            $error = "Access denied. Admin privileges required.";
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Event Planner</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .admin-login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            position: relative;
            overflow: hidden;
        }

        .admin-login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #f093fb, #f5576c);
        }

        .admin-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .admin-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(240, 147, 251, 0.3);
        }

        .admin-icon i {
            font-size: 2rem;
            color: white;
        }

        .admin-title {
            font-size: 2rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 10px;
        }

        .admin-subtitle {
            color: #718096;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #718096;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f7fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: #f093fb;
            background: white;
            box-shadow: 0 0 0 3px rgba(240, 147, 251, 0.1);
        }

        .btn-admin-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-admin-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(240, 147, 251, 0.3);
        }

        .btn-admin-login:active {
            transform: translateY(0);
        }

        .error-message {
            background: #fed7d7;
            color: #c53030;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            border-left: 4px solid #c53030;
        }

        .admin-warning {
            background: #fef5e7;
            color: #d69e2e;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            border-left: 4px solid #d69e2e;
            text-align: center;
        }

        .login-links {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .user-link {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .user-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        @media (max-width: 480px) {
            .admin-login-container {
                padding: 30px 20px;
            }
            
            .admin-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="admin-login-container">
        <div class="admin-header">
            <div class="admin-icon">
                <i class="fas fa-crown"></i>
            </div>
            <h1 class="admin-title">Admin Portal</h1>
            <p class="admin-subtitle">Manage your event planning business</p>
        </div>

        <div class="admin-warning">
            <i class="fas fa-shield-alt"></i> Admin access requires special permissions
        </div>

        <?php if ($error): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-triangle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" class="form-control" placeholder="Admin Email" required>
            </div>

            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="form-control" placeholder="Admin Password" required>
            </div>

            <button type="submit" class="btn-admin-login">
                <i class="fas fa-sign-in-alt"></i> Admin Sign In
            </button>
        </form>

        <div class="login-links">
            <a href="login.php" class="user-link">
                <i class="fas fa-user"></i> User Login
            </a>
        </div>
    </div>
</body>
</html>
