<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Money Tracker - Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo base_url('/expense/form') ?>" class="btn btn-success mb-2 mr-2">Add Expense</a>
        <a href="<?php echo base_url('/logout/submit') ?>" class="btn btn-danger mb-2">Logout</a>
    </div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="dashboard">
       <thead>
          <tr>
             <th>Date</th>
             <th>Amount</th>
             <th>Note</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($expenses): ?>
          <?php foreach($expenses as $expense): ?>
          <tr>
            <td><?php echo date_format(date_create($expense['date']), "j M Y"); ?></td>
            <td><?php echo $expense['amount']; ?></td>
            <td><?php echo $expense['note']; ?></td>
            <td>
            <a href="<?php echo base_url('expense/edit/'.$expense['id']);?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="<?php echo base_url('expense/delete/'.$expense['id']);?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#dashboard').DataTable();
  } );
</script>
</body>
</html>