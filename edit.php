<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM student WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error retrieving data: " . mysqli_error($conn));
    }

    $student = mysqli_fetch_assoc($result);
    if (!$student) {
        die("Student not found.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_GET['id']);
    $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $query = "UPDATE student SET rollno = '$rollno', name = '$name', dept = '$dept', address = '$address' WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header('Location: all.php');
        exit;
    } else {
        die("Error updating record: " . mysqli_error($conn));
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
    <title>Edit Student Info</title>
</head>
<body>
<header class="bg-dark py-3">
    <h1 class="text-center text-white">Edit Student Info</h1>
</header>
<div class="container my-5">
    <form method="POST" action="" class="p-4 border rounded shadow-sm bg-white">
        <h3 class="text-center mb-4">Edit Details</h3>

        <div class="mb-3">
            <label class="form-label">Roll No:</label>
            <input type="text" name="rollno" class="form-control" value="<?php echo htmlspecialchars($student['rollno']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($student['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Department:</label>
            <input type="text" name="dept" class="form-control" value="<?php echo htmlspecialchars($student['dept']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address:</label>
            <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($student['address']); ?>" required>
        </div>

        

        <div class="container d-flex  justify-content-center align-items-center">
        <button type="submit" class="btn btn-dark w-50">Update</button> </div>
    </form>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
