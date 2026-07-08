<?php
session_start();

if(isset($_SESSION['user_id'])){

    if($_SESSION['role']=="admin"){
        header("Location: admin/dashboard.php");
    }else{
        header("Location: user/profile.php");
    }

    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>User Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="main-container">

<div class="card p-5 text-center">

<h1>User Management System</h1>

<p>PHP + MySQL CRUD Project</p>

<a href="auth/login.php" class="btn btn-primary m-2">
Login
</a>

<a href="auth/register.php" class="btn btn-success">
Register
</a>

</div>

</div>

</body>
</html>