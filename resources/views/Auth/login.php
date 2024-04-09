<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        input[type="text"], input[type="password"], textarea, input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .crud-container {
            margin-left: auto;
            margin-right: auto;
            width: 90%;
        }

        .border {
            border: 1px solid gray;
        }

        .p-5 {
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .mt-3 {
            margin-top: 5px;
        }

        .mb-3 {
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
<?php
include __DIR__ . '/../../Layouts/header.php';
?>
<div class="crud-container">
    <form id="crud-form" action="<?php echo route('auth.login'); ?>" method="post">
        <h2>Login</h2>
        <label>
            <input type="text" name="email" placeholder="Email" class="mt-3 mb-3" required>
        </label>
        <label>
            <input type="password" name="password" placeholder="Password" class="mt-3" required>
            <span style="font-size: 12px; color: red"><?php echo $authMessage ?? '' ?></span>
        </label>
        <input type="submit" value="Login" class="mt-3">
        <span style="float: right; margin-top: 10px">You dont have account? <a
                    href="<?php echo route('auth.register.show'); ?>">Sign up</a></span>
    </form>
</div>
</body>
</html>
