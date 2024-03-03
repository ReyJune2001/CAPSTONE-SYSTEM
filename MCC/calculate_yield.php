<?php
// Database connection parameters
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'dbpayms';

// Establish database connection
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

// Check if the connection was successful
if (!$con) {
    // Handle database connection error
    echo json_encode(['error' => 'Failed to connect to the database']);
    exit;
}

// Retrieve the values sent via POST
$newPaintL = isset($_POST['NewpaintL']) ? $_POST['NewpaintL'] : 0;
$newAcetateL = isset($_POST['NewacetateL']) ? $_POST['NewacetateL'] : 0;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;

// Fetch the initial and ending acetate and paint liter values from the database
$sql = "SELECT initialALiter, endingALiter, initialPLiter, endingPLiter FROM tbl_entry";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if (!$result) {
    // Handle database query error
    echo json_encode(['error' => 'Failed to fetch data from the database']);
    exit;
}

// Fetch the row containing the initial and ending values
$row = mysqli_fetch_assoc($result);

// Extract values from the fetched row
$initialALiter = $row['initialALiter'];
$endingALiter = $row['endingALiter'];
$initialPLiter = $row['initialPLiter'];
$endingPLiter = $row['endingPLiter'];

// Calculate total Acetate Liter
$totalALiter = $initialALiter + $newAcetateL - $endingALiter;
// Round off the total Acetate Liter to the nearest hundredth
$roundedTotalALiter = round($totalALiter, 2);

// Calculate total Paint Liter
$totalPLiter = $initialPLiter + $newPaintL - $endingPLiter;
// Round off the total Paint Liter to the nearest hundredth
$roundedTotalPLiter = round($totalPLiter, 2);

// Calculate the Acetate Yield
if ($quantity != 0 && $roundedTotalALiter != 0) {
    $acetateYield = $quantity / $roundedTotalALiter;
    // Round off the Acetate Yield to the nearest hundredth
    $roundedAcetateYield = round($acetateYield, 2);
} else {
    $roundedAcetateYield = 0; // Handle division by zero scenario
}

// Calculate the Paint Yield
if ($quantity != 0 && $roundedTotalPLiter != 0) {
    $paintYield = $quantity / $roundedTotalPLiter;
    // Round off the Paint Yield to the nearest hundredth
    $roundedPaintYield = round($paintYield, 2);
} else {
    $roundedPaintYield = 0; // Handle division by zero scenario
}

// Return the calculated Acetate and Paint Yields as JSON
echo json_encode(['acetateYield' => $roundedAcetateYield, 'paintYield' => $roundedPaintYield]);

// Close database connection
mysqli_close($con);
?>
