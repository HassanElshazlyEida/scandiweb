
<?php include 'views/layouts/header.php'  ?>
    <div class="container mt-5">
        <div class="form-check mb-3">
            <input type="checkbox" class="select-all-checkbox" id="select-all" />
            <label class="form-check-label" for="select-all">Select All</label>
        </div>
        <div class="row">
            <?php foreach($data['data'] as $row) : ?>
                <div class="col-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ID: <?php echo $row['id']; ?></h5>
                            <p class="card-text">SKU: <?php echo $row['sku']; ?></p>
                            <p class="card-text">Name: <?php echo $row['name']; ?></p>
                            <p class="card-text">Price: <?php echo $row['price']; ?></p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input product-checkbox" id="<?php echo $row['id']; ?>"/>
                                <label class="form-check-label" for="<?php echo $row['id']; ?>">Select</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <span>Total Items :<?php echo $data['totalItems'] ?> </span>
        <div class="d-flex justify-content-center ">
            <nav aria-label="Page navigation example ">
                <ul class="pagination">
                    <li class="page-item <?php echo $data['currentPage'] == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?php echo $data['currentPage'] - 1 ?>">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $data['totalPages']; $i++) : ?>
                        <li class="page-item <?php echo $data['currentPage'] == $i ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo $data['currentPage'] == $data['totalPages'] ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?php echo $data['currentPage'] + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <hr>
        <div class="text-center mb-5">
            <span>Scandiweb Test assignment</span>
        </div>
       
    </div>

<?php include 'views/layouts/footer.php'  ?>
<script>
    $(".select-all-checkbox").on('change', function() {
        $(".product-checkbox").prop("checked", this.checked);
    });
    $(".product-checkbox").on('change', function() {
        if ($(".product-checkbox:checked").length == $(".product-checkbox").length) {
            $(".select-all-checkbox").prop("checked", true);
        } else {
            $(".select-all-checkbox").prop("checked", false);
        }
    });
</script>