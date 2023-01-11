
<?php include 'views/layouts/header.php'  ?>
<div class="card">
  <div class="card-body">
    <div class="container text-center mt-5">
        <h1 class="text-danger">Server Error</h1>
        <p class="text-text">There was an error processing your request. Please try again later.</p>
        <?php echo $data ?>
    </div>
  </div>
</div>
<?php include 'views/layouts/footer.php'  ?>