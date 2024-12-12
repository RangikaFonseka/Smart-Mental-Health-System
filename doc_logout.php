<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Panel - Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        .logout-container {
            text-align: center;
            margin-top: 50px;
        }
        .logout-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .logout-btn:hover {
            background-color: #ff1a1a;
        }
    </style>
</head>
<body>

<div class="logout-container">
    <h2>Welcome, Doctor!</h2>
    <p>Click the button below to log out.</p>
    <form action="doc_logout_other.php" method="POST">
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>

</body>
</html>
