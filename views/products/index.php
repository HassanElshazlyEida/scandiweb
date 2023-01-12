
<?php include 'views/layouts/header.php'  ?>
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
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
        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data['data'] as $row) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['sku']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <span>Total Items :<?php echo $data['totalItems'] ?> </span>
    </div>
    
<?php include 'views/layouts/footer.php'  ?>