<?php

include("../config/database.php");

$msg="";

if(isset($_POST['register'])){

    $fullname=$_POST['fullname'];
    $email=$_POST['email'];

    $password=password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $stmt=$conn->prepare(
        "INSERT INTO users(fullname,email,password)
         VALUES(?,?,?)"
    );

    $stmt->bind_param(
        "sss",
        $fullname,
        $email,
        $password
    );

    if($stmt->execute()){
        $msg="Registration Successful";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="main-container">

<div class="card p-4" style="width:400px">

<h2 class="page-title">Register</h2>

<form method="POST">

<input type="text"
class="form-control"
name="fullname"
placeholder="Full Name"
required>

<input type="email"
class="form-control"
name="email"
placeholder="Email"
required>

<input type="password"
class="form-control"
name="password"
placeholder="Password"
required>

<button
class="btn-custom"
name="register">
Register
</button>

</form>

<p class="mt-3 text-success">
<?= $msg ?>
</p>

</div>

</div>

</body>
</html>