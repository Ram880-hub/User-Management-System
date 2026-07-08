<?php

session_start();

include("../config/database.php");

if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $stmt=$conn->prepare(
        "SELECT * FROM users WHERE email=?"
    );

    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result=$stmt->get_result();

    if($result->num_rows>0){

        $user=$result->fetch_assoc();

        if(password_verify(
            $password,
            $user['password']
        )){

            $_SESSION['user_id']=$user['id'];
            $_SESSION['role']=$user['role'];

            if($user['role']=="admin"){
                header("Location: ../admin/dashboard.php");
            }else{
                header("Location: ../user/profile.php");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="main-container">

<div class="card p-4" style="width:400px">

<h2 class="page-title">Login</h2>

<form method="POST">

<input type="email"
class="form-control"
name="email"
placeholder="Email">

<input type="password"
class="form-control"
name="password"
placeholder="Password">

<button
class="btn-custom"
name="login">
Login
</button>

</form>

</div>

</div>

</body>
</html>