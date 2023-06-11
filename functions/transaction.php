<?php
require "./database.php";
if (!empty($_POST['rowid'])) {
  $connection = connect();
  $id = $_POST['rowid']; //escape string
  $id = mysqli_real_escape_string($connection, $_POST['rowid']);
  // Run the Query
  // Fetch Records
  // Echo the data you want to show in modal
  $sql = "SELECT transactions.transaction_id, bills.bill_description, bills.bill_amount, bills.bill_publish, bills.bill_deadline, transaction_datepaid, transaction_referenceno, transaction_paymentmethod FROM `transactions`
  JOIN bills ON transactions.bill_id = bills.bill_id WHERE transaction_id=$id";
  $query = mysqli_query($connection, $sql);
  $details = mysqli_fetch_assoc($query);
  $format = date_create($details["transaction_datepaid"]);
  $datepaid = date_format($format, "F d, Y h:i:s a");
}
?>
<style>
  #reference-button {
    background-color: transparent;
    border: 0;
  }
</style>
<div class="row">
  <div class="col mb-3">
    <p class="small text-muted mb-1">Date Paid</p>
    <p>
      <?php echo $datepaid ?>
    </p>
  </div>
  <div class="col mb-3">
    <p class="small text-muted mb-1">Reference No.<button type="button" id="reference-button"><i
          class='bx bxs-copy'></i></button>
    </p>
    <p>
      <input type="hidden" id="myInput" value="<?php echo $details["transaction_referenceno"] ?>">
      <?php echo $details["transaction_referenceno"] ?>
    </p>
  </div>
</div>
<div class="mx-n5 px-5 py-4">
  <div class="row">
    <div class="col-md-8 col-lg-9">
      <p class="small text-muted mb-1">Description</p>
      <p>
        <?php echo $details["bill_description"] ?>
      </p>
    </div>
    <!-- <div class="col-md-4 col-lg-6">
      <p>₱
        <?php //echo $details["transaction_amount"] ?>
      </p>
    </div> -->
  </div>
</div>

<div class="row my-4">
  <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
    <p class="small text-muted mb-1">Paid</p>
    <p class="lead fw-bold mb-0" style="color: #f37a27;">₱
      <?php echo $details["bill_amount"] ?>
    </p>
  </div>
</div>
<script>
  document.getElementById('reference-button').addEventListener('click', () => {
    var copyText = document.getElementById('myInput');
    console.log('click');
    // copyText.setSelectionRange(0, 99999); // For mobile devices
    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Alert the copied text
    alert("Copied the text: " + copyText.value);
  });
</script>