<?php

try {
    include('../dbConn/conn.php');

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

$startDate = date('Y-m-d', strtotime($startDate));
$endDate = date('Y-m-d', strtotime($endDate));

$filteredMonthlyRevenueQuery = "SELECT MONTH(currentdate) as month, SUM(totalpayment) as total FROM tblPayment WHERE currentdate BETWEEN '$startDate' AND '$endDate' GROUP BY MONTH(currentdate)";
$filteredMonthlyRevenueResult = $conn->query($filteredMonthlyRevenueQuery);

$filteredMonthlyRevenueData = [];
while ($row = $filteredMonthlyRevenueResult->fetch_assoc()) {
    $filteredMonthlyRevenueData[$row['month']] = $row['total'];
}

for ($i = 1; $i <= 12; $i++) {
    if (!isset($filteredMonthlyRevenueData[$i])) {
        $filteredMonthlyRevenueData[$i] = 0;
    }
}

ksort($filteredMonthlyRevenueData);
    $responseData = [
        'monthlyRevenueValues' => array_values($filteredMonthlyRevenueData),
       
    ];

    header('Content-Type: application/json');
    echo json_encode($responseData);
} catch (Exception $e) {
    // Log the error
    error_log("Error in filter.php: " . $e->getMessage(), 0);

    // Return a simple error message
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred in the server.']);
}

?>