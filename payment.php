<?php
session_start();
require "./functions/database.php";
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
    header("location: login.php");
}
$connection = connect();
if (!empty($_POST['rowid'])) {
    $id = mysqli_escape_string($connection, $_POST['rowid']);
    $sql = "SELECT * FROM bills WHERE bill_id=$id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<!--Container Main start-->
<div class="card" style="width: 29rem;">
    <div class="card-body">
        <h4 style="margin-bottom: 2rem">Payment Method</h4>
        <form action="./functions/payment.php" method="post">
            <input type="hidden" name="bill_id" value="<?php echo $row['bill_id'] ?>" />
            <div class="col-sm-20">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentmethod" id="click-hide" value="GCASH"
                        checked>
                    <label class="form-check-label" for="gridRadios2">
                        <img src="./img/gcash.png" alt="gcash" width="95px" height="33px"
                            style="position:relative; bottom: 4px;">
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="small text-muted mb-1">Description</p>
                    <input type="text" name="description" value="<?php echo $row['bill_description'] ?>"
                        class="form-control" id="">
                </div>
                <div class="col">
                    <p class="small text-muted mb-1">Amount</p>

                    <input type="text" name="amount" value="<?php echo '₱ ' . number_format($row['bill_amount'], 2) ?>"
                        class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col mt-3">
                    <?php
                    date_default_timezone_set('Asia/Manila');
                    $t = date('F d, Y h:i:s A');
                    ?>
                    <p class="small text-muted mb-1">Date Paid</p>
                    <input type="text" name="datepaid" value="<?php echo $t; ?>" class="form-control" id="" disabled>
                </div>
                <div class="col mt-3">
                    <p class="small text-muted mb-1">Reference No.</p>
                    <input type="text" name="referenceno" class="form-control" id="inputgcash" required>
                </div>
            </div>
            <div class="">
                <input style="display: block; justify-content:center; margin: auto; margin-top:20px;" type="submit"
                    name="payment" value="Pay Now" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
<!--Container Main end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="./js/bills.js"></script>
</body>

</html>