<?php
require_once 'config/session.php';
requireLogin();

$user = getUserInfo();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Event Planner</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .dashboard-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .logo-icon i {
            color: white;
            font-size: 1.5rem;
        }

        .logo-text h1 {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .logo-text p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            text-align: right;
            color: white;
        }

        .user-info h3 {
            font-size: 1rem;
            font-weight: 600;
        }

        .user-info p {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-logout:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .dashboard-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .welcome-card h2 {
            color: #2d3748;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .welcome-card p {
            color: #718096;
            font-size: 1.1rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: white;
        }

        .card-icon.pink {
            background: linear-gradient(135deg, #f093fb, #f5576c);
        }

        .card-icon.blue {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .card-icon.green {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
        }

        .dashboard-card h3 {
            color: #2d3748;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .dashboard-card p {
            color: #718096;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .activity-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .activity-card h3 {
            color: #2d3748;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
        }

        .activity-content h4 {
            color: #2d3748;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .activity-content p {
            color: #718096;
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .dashboard-main {
                padding: 1rem;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .welcome-card h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="dashboard-header">
        <div class="header-content">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="logo-text">
                    <h1>Event Planner</h1>
                    <p>User Dashboard</p>
                </div>
            </div>
            <div class="user-section">
                <div class="user-info">
                    <h3><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h3>
                    <p><?php echo $user['email']; ?></p>
                </div>
                <a href="logout.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Sign Out
                </a>
            </div>
        </div>
    </header>

    <main class="dashboard-main">
        <div class="welcome-card">
            <h2>Welcome back, <?php echo $user['first_name']; ?>! 🎉</h2>
            <p>Ready to plan your next amazing celebration? Let's make it unforgettable!</p>
        </div>

        <div class="dashboard-grid">
            <a href="book-event.php" class="dashboard-card">
                <div class="card-icon pink">
                    <i class="fas fa-calendar-plus"></i>
                </div>
                <h3>Book New Event</h3>
                <p>Plan your next celebration with our expert team</p>
            </a>

            <a href="my-events.php" class="dashboard-card">
                <div class="card-icon blue">
                    <i class="fas fa-list"></i>
                </div>
                <h3>My Events</h3>
                <p>View and manage your upcoming events</p>
            </a>

            <a href="profile.php" class="dashboard-card">
                <div class="card-icon green">
                    <i class="fas fa-user-edit"></i>
                </div>
                <h3>Profile Settings</h3>
                <p>Update your personal information</p>
            </a>
        </div>

        <div class="activity-card">
            <h3>Recent Activity</h3>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div class="activity-content">
                    <h4>Account Created</h4>
                    <p>Welcome to Event Planner! Your account was created successfully.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
