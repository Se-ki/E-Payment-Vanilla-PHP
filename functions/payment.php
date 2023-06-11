<?php
session_start();
require "./database.php";
if (isset($_POST['payment'])) {
    $paymentmethod = $_POST['paymentmethod'];
    $descript = $_POST['description'];
    $amount = $_POST['amount'];
    $date = date_create($_POST['datepaid']);
    $datepaid = date_format($date, "Y-d-m H:i:s");
    $referencenum = $_POST['referenceno'];
    $bill_id = $_POST['bill_id'];
    $idstudent = $_SESSION['student_id'];
    $connection = connect();
    $refsql = "SELECT * FROM transactions WHERE transaction_referenceno = $referencenum";
    $queryref = $connection->query($refsql);
    if (!$queryref->num_rows) {
        $sql = "INSERT INTO transactions VALUES(0, '$datepaid', '$referencenum', '$paymentmethod', $bill_id, $idstudent)";
        mysqli_query($connection, $sql);
        $updatesql = "UPDATE `bills` SET `status`= 1 WHERE `student_id`=$idstudent AND `bill_id`=$bill_id";
        mysqli_query($connection, $updatesql);
        header('location: /project/project-system/bills.php');
    } else {
        header('location: /project/project-system/bills.php?ref=exist!');
    }
}
?>