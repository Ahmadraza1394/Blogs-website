<?php
// Include the database connection file
include 'connection/conn.php';


// Check if form is submitted (Delete button clicked)
if (isset($_POST['delete_blog'])) {
    // Get the blog ID from the form
    $blog_id = $_POST['blog_id'];

    // Prepare a delete statement
    $sql = "DELETE FROM blogs WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameter
        $stmt->bind_param("i", $blog_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to a page after successful deletion
            header("location: index.php"); // Change this to your desired page
            exit();
        } else {
            // If execution fails, output the error
            echo "Error deleting record: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // If preparing the statement fails, output the error
        echo "Error preparing statement: " . $conn->error;
    }
}
?>