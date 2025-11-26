<?php 

// Check if the form was submitted with the button named "create"
if (isset($_POST['create'])) {

    // Include the database connection file
    include "../db_conn.php";

    // Function to clean (sanitize) input data
    function validate($data){
        $data = trim($data);              // Remove extra spaces from start and end
        $data = stripslashes($data);      // Remove backslashes
        $data = htmlspecialchars($data);  // Convert special HTML characters to safe entities
        return $data;
    }

    // Get and validate form inputs
    $id    = validate($_POST['id']);
    $name  = validate($_POST['name']);
    $email = validate($_POST['email']);

    // Build a query string with user data to send back to the form if there is an error
    // So the form can be pre-filled again with previous values
    $user_data = 'id=' . $id . '&name=' . $name . '&email=' . $email;

    // Basic validation: check required fields
    if (empty($id)) {
        // Redirect back to the form with an error message and previous input values
        header("Location: ../customer.php?error=ID is required&$user_data");
        exit(); // good practice after header redirect
    } else if (empty($name)) {
        header("Location: ../customer.php?error=Name is required&$user_data");
        exit();
    } else if (empty($email)) {
        header("Location: ../customer.php?error=Email is required&$user_data");
        exit();
    } else {

        // SQL query to insert a new user record into the database
        $sql = "INSERT INTO users(id, name, email) 
                VALUES('$id', '$name', '$email')";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if insert was successful
        if ($result) {
            // Redirect to read.php with success message in the URL
            header("Location: ../read.php?success=successfully added");
            exit();
        } else {
            // Redirect back to form with a generic error and previous input values
            header("Location: ../customer.php?error=unknown error occurred&$user_data");
            exit();
        }
    }
}

