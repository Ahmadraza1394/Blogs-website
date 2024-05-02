<?php
// Include the database connection file
include 'connection/conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $title = $description = "";

    // Processing form data when form is submitted
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Prepare an insert statement
    $sql = "INSERT INTO blogs (title, `description`) VALUES (?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ss", $title, $description);


        if ($stmt->execute()) {

            header("location: index.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }


        $stmt->close();
    }

  
    $conn->close();
}
?>