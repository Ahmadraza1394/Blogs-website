<?php
// Include the database connection file
include 'connection/conn.php';

// Check if form is submitted
 
    $blog_id = $_POST['blog_id'];
    $title = $_POST["title"];
    $description = $_POST["description"];

    echo $blog_id;

    // Prepare an update statement
    $sql = "UPDATE blogs SET title = ?, `description` = ? WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssi", $title, $description, $blog_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                // Redirect to success page or refresh current page
                header("location: index.php"); // Change this to your desired page
                exit();
            } else {
                echo "No rows updated.";
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    }

?>