<?php
include 'connect.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['userID'];

    $date = $_POST['date'];
    $paint_color = $_POST['paint_color'];
    $supplier_name = $_POST['supplier_name'];
    $batchNumber = $_POST['batchNumber'];
    $newSupplier_name = $_POST['newSupplier_name'];
    $NewpaintL = $_POST['NewpaintL'];
    $NewacetateL = $_POST['NewacetateL'];
    $sprayViscosity = $_POST['sprayViscosity'];
    $customer_name = $_POST['customer_name'];
    $quantity = $_POST['quantity'];
    $paintYield = $_POST['paintYield'];
    $acetateYield = $_POST['acetateYield'];
    $remarks = $_POST['remarks'];

    // Update customer table
    $sql = "UPDATE `tbl_customer` SET customer_name='$customer_name' WHERE customerID=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Update supplier table
        $sql = "UPDATE `tbl_supplier` SET supplier_name='$supplier_name', newSupplier_name='$newSupplier_name' WHERE supplierID=$id";
        $result = mysqli_query($con, $sql);
    }

    if ($result) {
        // Update paint table
        $sql = "UPDATE `tbl_paint` SET paint_color='$paint_color' WHERE paintID=$id";
        $result = mysqli_query($con, $sql);
    }

    if ($result) {
        // Update entry table
        $sql = "UPDATE `tbl_entry` SET date='$date', batchNumber='$batchNumber', NewacetateL='$NewacetateL', 
            NewpaintL='$NewpaintL', sprayViscosity='$sprayViscosity', quantity='$quantity', 
            paintYield='$paintYield', acetateYield='$acetateYield', remarks='$remarks' 
            WHERE EntryID=$id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Redirect to monitoring.php after successful update
            header('location: monitoring.php');
        } else {
            die(mysqli_error($con));
        }
    } else {
        die(mysqli_error($con));
    }
}
?>
