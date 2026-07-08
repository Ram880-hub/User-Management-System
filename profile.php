<?php

session_start();

include("../config/database.php");

$id = $_SESSION['user_id'];

if(isset($_POST['upload'])){

$file = $_FILES['profile'];

$filename =
time()."_".$file['name'];

move_uploaded_file(
$file['tmp_name'],
"../assets/uploads/".$filename
);

$stmt = $conn->prepare(
"UPDATE users SET profile_pic=? WHERE id=?"
);

$stmt->bind_param(
"si",
$filename,
$id
);

$stmt->execute();
}
?>
<link rel="stylesheet" href="../assets/css/style.css">
<form
method="POST"
enctype="multipart/form-data">

<input type="file"
name="profile">

<button name="upload">
Upload
</button>

</form>