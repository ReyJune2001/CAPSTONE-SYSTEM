<?php
include 'connect.php';

if (isset($_POST['updatedata'])) {
    $id = $_POST['userID'];

    $date = $_POST['date'];
    $paint_color = $_POST['paint_color'];
    $supplier_name = $_POST['supplier_name'];
    $batchNumber = $_POST['batchNumber'];
    $diameter = $_POST['diameter'];
    $height = $_POST['height'];
    $paintRatio = $_POST['paintRatio'];
    $acetateRatio = $_POST['acetateRatio'];
    $Endingdiameter = $_POST['Endingdiameter'];
    $Endingheight = $_POST['Endingheight'];
    $EndingpaintRatio = $_POST['EndingpaintRatio'];
    $EndingacetateRatio = $_POST['EndingacetateRatio'];
   
        // Update supplier table
        $sql = "UPDATE `tbl_supplier` SET supplier_name='$supplier_name' WHERE supplierID=$id";
        $result = mysqli_query($con, $sql);
 

    if ($result) {
        // Update paint table
        $sql = "UPDATE `tbl_paint` SET paint_color='$paint_color' WHERE paintID=$id";
        $result = mysqli_query($con, $sql);
    }

    if ($result) {
        // Update entry table
        $sql = "UPDATE `tbl_entry` SET date='$date', batchNumber='$batchNumber', diameter='$diameter', 
            height='$height', paintRatio='$paintRatio', acetateRatio='$acetateRatio', 
            Endingdiameter='$Endingdiameter', Endingheight='$Endingheight', EndingpaintRatio='$EndingpaintRatio', EndingacetateRatio='$EndingacetateRatio'
            WHERE EntryID=$id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Redirect to monitoring.php after successful update
            header('location: volume.php');
        } else {
            die(mysqli_error($con));
        }
    } else {
        die(mysqli_error($con));
    }
}
?>
