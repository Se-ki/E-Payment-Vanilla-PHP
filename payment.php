<?php
require "./functions/payment.php";
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
    header("location: /login.php");
}
$row = listOfPayment($paymet_data);
?>
<!--Container Main start-->
<div class="card">
    <div class="card-body">
        <h4 style="margin-bottom: 2rem">Payment Method</h4>
        <form action="./functions/payment.php" method="post">
            <input type="hidden" name="deadline" value="<?php echo $row['bill_deadline'] ?>">
            <input type="hidden" name="bill_id" value="<?php echo $row['bill_id'] ?>" />
            <div class="col-sm-20">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentmethod" value="GCASH" checked>
                    <label class="form-check-label" for="gridRadios2">
                        <img src="./img/gcash.png" alt="gcash" width="95px" height="33px"
                            style="position:relative; bottom: 4px;">
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="small text-muted mb-1">Description</p>
                    <input type="text" value="<?php echo $row['bill_description'] ?>" class="form-control" id=""
                        disabled>
                    <!-- to send data -->
                    <input type="hidden" name="description" value="<?php echo $row['bill_description'] ?>"
                        class="form-control" id="">
                </div>
                <div class="col">
                    <p class="small text-muted mb-1">Amount</p>
                    <input type="text" value="<?php echo "₱ " . number_format($row['bill_amount'], 2) ?>"
                        class="form-control" id="" disabled>
                    <input type="hidden" name="amount" value="<?php echo $row['bill_amount'] ?>" class="form-control"
                        id="">
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
                    <p class="small mb-1" id="refLabel">Reference No.</p>
                    <input type="text" name="referenceno" class="form-control" id="inputgcash" maxlength="13" required>
                </div>
            </div>
            <div class="">
                <input style="display: block; justify-content:center; margin: auto; margin-top:20px;" type="submit"
                    id="submit" name="payment" value="Pay Now" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<!--Container Main end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script>
    var ref = document.getElementById("inputgcash");
    var reflabel = document.getElementById("refLabel");
    var submit = document.getElementById("submit");

    submit.addEventListener('click', (event) => {
        console.log(ref.value.length);
        if (ref.value.length < 13) {
            event.preventDefault();
            alert("Reference number must be 13 numbers!");
            ref.style.borderColor = "#dc3545";
            reflabel.style.color = "#dc3545";
        }

    });
    const regex = new RegExp("[-0-9]");
    ref.addEventListener("beforeinput", (event) => {
        console.log(ref.value);
        if (event.data != null && !regex.test(event.data)) {
            event.preventDefault();
            alert("Invalid Input!");
        } else if (ref.value.length > 12) {
            alert("Reference number must be 13 numbers!");
        } else {
            ref.style.borderColor = "";
            reflabel.style.color = "";
        }
    });
</script>
<script src="./js/bills.js"></script>
</body>

</html>