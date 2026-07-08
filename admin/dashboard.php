<?php

session_start();

include("../config/database.php");

$result=
$conn->query(
"SELECT * FROM users"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>User Dashboard</h2>

<a href="../auth/logout.php"
class="btn btn-danger mb-3">
Logout
</a>

<a href="add_user.php"
class="btn btn-success mb-3">
Add User
</a>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Action</th>

</tr>

<?php while($row=$result->fetch_assoc()){ ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['fullname'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['role'] ?></td>

<td>

<a href="edit_user.php?id=<?= $row['id'] ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete_user.php?id=<?= $row['id'] ?>"
class="btn btn-danger btn-sm">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>