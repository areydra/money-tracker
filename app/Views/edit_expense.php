<?php
  $dateValue = isset($expense['date']) ? date('Y-m-d', strtotime($expense['date'])) : '';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Expense</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form method="post" id="edit_expense" name="edit_expense" 
    action="<?= site_url('/expense/edit/submit') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $expense['id']; ?>">

      <div class="form-group">
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="<?php echo $dateValue; ?>">
      </div>

      <div class="form-group">
        <label>Amount</label>
        <input type="number" name="amount" class="form-control" value="<?php echo $expense['amount']; ?>">
      </div>

      <div class="form-group">
        <label>Note</label>
        <input type="text" name="note" class="form-control" value="<?php echo $expense['note']; ?>">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Save Data</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#edit_expense").length > 0) {
      $("#edit_expense").validate({
        rules: {
          date: {
            required: true,
          },
          amount: {
            required: true,
            maxlength: 60,
          },
        },
        messages: {
          name: {
            required: "Date is required.",
          },
          amount: {
            required: "Amount is required.",
            maxlength: "The amount should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
</body>

</html>