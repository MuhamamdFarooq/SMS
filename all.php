<?php
include('conn.php');

// Check if a search query is provided
$search_query = "";
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $search_query = " WHERE rollno LIKE '%$search%' OR name LIKE '%$search%'";
}

$query = "SELECT * FROM student" . $search_query;
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header class="bg-dark py-3">
    <h1 class="text-center text-white">All Students</h1>
</header>

<div class="container my-5">
    <!-- Back to Index Button -->
    <a href="index.php" class="btn btn-link mb-3">Home</a>

    <!-- Search Form -->
    <form method="POST" class="mb-4">
        <div class="input-group w-50">
            <input type="text" name="search" class="form-control" placeholder="Search by Name or Roll No" value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Roll No</th>
            <th>Name</th>
            <th>Department</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['rollno']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['dept']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
