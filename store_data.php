<?php
// Check if form data is received
if (
    isset($_POST["ID"]) && isset($_POST["Fname"]) && isset($_POST["Mname"]) &&
    isset($_POST["Lname"]) && isset($_POST["email"]) && isset($_POST["mobNo"]) &&
    isset($_POST["address"]) && isset($_POST["height"]) && isset($_POST["weight"]) &&
    isset($_POST["heredity"])
) {

    // Retrieve form data
    $ID = $_POST["ID"];
    $Fname = $_POST["Fname"];
    $Mname = $_POST["Mname"];
    $Lname = $_POST["Lname"];
    $email = $_POST["email"];
    $mobNo = $_POST["mobNo"];
    $address = $_POST["address"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $heredity = $_POST["heredity"];

    // Database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "patient_records";

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO user_info (ID, Fname, Mname, Lname, email, mobNo, address, height, weight, heredity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "isssssssss", $ID, $Fname, $Mname, $Lname, $email, $mobNo, $address, $height, $weight, $heredity);
        if (mysqli_stmt_execute($stmt)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error executing SQL statement: " . mysqli_error($conn);
        }
    } else {
        echo "Error preparing SQL statement: " . mysqli_error($conn);
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Error: Form data not received.";
}
?>
