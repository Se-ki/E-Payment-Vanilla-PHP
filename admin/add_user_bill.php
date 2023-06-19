<!-- Modal -->
<form action="./admin_function/add_user_bill.php" method="post">
    <!-- <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Bill Type</label>
                        </div> -->
    <input type="hidden" name="id" value="<?php echo $_POST['rowid'] ?>">
    <div class="form-floating mb-3">
        <input type="text" name="bill-description" class="form-control" id="floatingPassword" placeholder="" required>
        <label for="floatingPassword">Bill Description</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" name=bill-amount class="form-control" id="floatingPassword" placeholder="" required>
        <label for="floatingPassword">Bill Amount</label>
    </div>
    <div class="form-floating mb-3">
        <input type="hidden" name="bill-publish" value="<?php date_default_timezone_set('Asia/Manila');
        $t = date('Y-m-d H:i:s');
        echo $t ?>" class="form-control" id="floatingPassword" placeholder="">
        <label for="floatingPassword">Bill Date</label>
    </div>
    <div class="form-floating">
        <input type="date" name="bill-deadline" class="form-control" id="floatingPassword" placeholder="" required>
        <label for="floatingPassword">Bill Deadline</label>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="save" class="btn btn-primary" value="Save">
</form>