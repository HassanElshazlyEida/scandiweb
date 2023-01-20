
<div class="container mt-5">
        <div class="d-flex flex-row">
            <h1>Product List</h1>
        </div>
        <form class="ml-2" action="/products/store" method="POST" id="product_form" novalidate>
            <div class="d-flex flex-row-reverse">
            
                <input type="hidden" name="token" value="<?php echo bin2hex(random_bytes(32)); ?>">
                <a href="/products" class="btn btn-primary ml-2">Cancel</a>
                <button class="btn btn-primary" > Save</button>
  
            </div>
        <hr>
        <?php include "views/products/form.php" ?>
        </form>
  
</div>

<style>
    .d-block-important {
        display: block !important;
    }
</style>