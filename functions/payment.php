<?php
session_start();
date_default_timezone_set('Asia/Manila');
require "database.php";
if (isset($_POST['payment'])) {
    $paymentmethod = $_POST['paymentmethod'];
    $descript = $_POST['description'];
    $amount = $_POST['amount'];
    $deadline = $_POST['deadline'];
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
        // $sql = "INSERT INTO transactions VALUES(0, '$date', '$referencenum', '$paymentmethod', $bill_id, $idstudent)";
        $sql = "INSERT INTO transactions (`transaction_id`, `transaction_description`, `transaction_amount`, `transaction_deadline`, `transaction_datepaid`, `transaction_referenceno`, `transaction_paymentmethod`, `student_id`) VALUES(0,'$descript',$amount,'$deadline','$date','$referencenum','$paymentmethod',$idstudent)";
        mysqli_query($connection, $sql);
        $updatesql = "UPDATE `bills` SET `status`= 1 WHERE `student_id`=$idstudent AND `bill_id`=$bill_id";
        mysqli_query($connection, $updatesql);
        ?>
        <script>alert("Paid Successfully!")</script>
        <script> window.location.href = '/project/project-system/bills.php'</script>
    <?php } else { ?>
        <script>alert("The reference number that you've entered was already used.")</script>
        <script> window.location.href = '/bills.php'</script>
    <?php }
}
$rowid = $_POST['rowid'];
function getDataOfBills($rowid)
{
    $connection = connect();
    if (!empty($rowid)) {
        $id = mysqli_escape_string($connection, $rowid);
        $sql = "SELECT * FROM bills WHERE bill_id=$id";
        return $connection->query($sql);
    }
}
$paymet_data = getDataOfBills($rowid);
function listOfPayment($payment_data)
{
    return $payment_data->fetch_assoc();
}
?>