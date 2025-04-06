<?php
include('conn.php');

// Check if the 'id' is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the 'id' to ensure it's an integer

    // Create the DELETE query
    $query = "DELETE FROM student WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Redirect to all.php after deletion
        header('Location: all.php');
        exit;
    } else {
        echo "Error: Unable to delete the record. " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. No ID provided.";
}

// Close the database connection
mysqli_close($conn);
?>
