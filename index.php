<?php
include('conn.php');

if (isset($_POST['ADD'])) {
    $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $query = "INSERT INTO student (rollno, name, dept, address) VALUES ('$rollno', '$name', '$dept', '$address')";

    if (mysqli_query($conn, $query)) {
        header('Location: all.php');
        exit;
    } else {
        echo "<script>alert('Error: Unable to add the student. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="bg-dark py-3 d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <img src="logo.png" alt="College Logo" style="height: 80px; width: auto; margin-right: 150px;">
        <h2 class="text-white mb-0">Student Management System</h2>
    </div>
</header>


<div class="container d-flex vh-100 justify-content-center align-items-center">
    <form method="POST" action="" class="p-4 border rounded shadow-sm bg-white" style="width: 600px;">
        <h3 class="text-center mb-4">Add Student</h3>

        <div class="mb-3" class = "textbox">
            <label class="form-label">Roll No:</label>
            <input type="text" name="rollno" class="form-control" placeholder="Roll No" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Department:</label>
            <input type="text" name="dept" class="form-control" placeholder="Department" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address:</label>
            <input type="text" name="address" class="form-control" placeholder="Address" required>
        </div>


        <div class="container d-flex  justify-content-center align-items-center">
        <button type="submit" name="ADD" class="btn btn-dark w-50">Add Student</button> </div>
    </form>
</div>
</body>
</html>
