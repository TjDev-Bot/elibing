<?php
session_start();
include '../dbConn/conn.php';

if(isset($_SESSION['id'])){
    $userID = $_SESSION['id'];
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    try {
        $currentDate= date('Y-m-d'); 
        $currentTime = date('h:i:s A');
        $stmt1 = "INSERT INTO TBL_Audit_Trail (User_ID, Date, Timex, Action) VALUES (?, ?, ?, 'Edit E-Libing')";
        $insertAudit = $conn->prepare($stmt1);
        $insertAudit->bindParam(1, $userID, PDO::PARAM_STR);
        $insertAudit->bindParam(2, $currentDate, PDO::PARAM_STR); // Bind the date and time
        $insertAudit->bindParam(3, $currentTime, PDO::PARAM_STR); // Bind the date and time

        // Debugging: Print the SQL query
        echo "SQL Query: $stmt1<br>";

        if ($insertAudit->execute()) {
            $successMessage = "Audit record inserted successfully.";
        } else {
            $errorMessage = "Error inserting audit record: " . implode(", ", $insertAudit->errorInfo());
            // Debugging: Print the error message
            echo "Error Message: $errorMessage<br>";
        }
    } catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        // Debugging: Print the exception message
        echo "Exception Message: $errorMessage<br>";
    }
}

?>

<form action="" method="POST">
    <input type="text" name="userid" value="<?php echo $userID ?>">
    <input type="submit" name="submit" value="Insert Audit Record">
</form>

<?php
// Display success or error messages, if set
if (isset($successMessage)) {
    echo "<p class='success'>$successMessage</p>";
}

if (isset($errorMessage)) {
    echo "<p class='error'>$errorMessage</p>";
}
?>