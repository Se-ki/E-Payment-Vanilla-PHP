<?php
session_start();
date_default_timezone_set('Asia/Manila');
require "./database.php";
if (isset($_POST['payment'])) {
    $paymentmethod = $_POST['paymentmethod'];
    $descript = $_POST['description'];
    $amount = $_POST['amount'];
    //e tarong ang date time kay dili klaro
    // echo $datepaid = date_format($_POST['datepaid'], "Y-m-d H:i:s");
    $date = date('Y-m-d H:i:s"');
    $referencenum = $_POST['referenceno'];
    $bill_id = $_POST['bill_id'];
    $idstudent = $_SESSION['student_id'];
    $connection = connect();
    $refsql = "SELECT * FROM transactions WHERE transaction_referenceno = $referencenum";
    $queryref = $connection->query($refsql);
    if (!$queryref->num_rows) {
        $sql = "INSERT INTO transactions VALUES(0, '$date', '$referencenum', '$paymentmethod', $bill_id, $idstudent)";
        mysqli_query($connection, $sql);
        $updatesql = "UPDATE `bills` SET `status`= 1 WHERE `student_id`=$idstudent AND `bill_id`=$bill_id";
        mysqli_query($connection, $updatesql);
        ?>
        <script>alert("Transacted Successfully!")</script>
        <script> window.location.href = '/project/project-system/bills.php'</script>
    <?php } else { ?>
        <script>alert("The reference number that you've entered was already used.")</script>
        <script> window.location.href = '/project/project-system/bills.php'</script>
    <?php }
}
?>