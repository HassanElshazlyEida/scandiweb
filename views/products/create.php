
<div class="container mt-5">
        <div class="d-flex flex-row">
            <h1>Product List</h1>
        </div>
        <form class="ml-2" action="/product/store" method="POST" id="product_form">
            <div class="d-flex flex-row-reverse">
            
                <input type="hidden" name="token" value="<?php echo bin2hex(random_bytes(32)); ?>">
                <a href="/products" class="btn btn-primary ml-2">Cancel</a>
                <button class="btn btn-primary" > Save</button>
  
            </div>
        <hr>
        <?php include "views/products/form.php" ?>
        </form>
  
</div>

<script>
   $("#product_form").on("submit", function(event){
        event.preventDefault();
        // send ajax request
        $.ajax({
            type: "POST",
            url: "/products/store",
            headers: {
                'Authorization': 'Bearer ' + $("input[name='token']").val,
            },
            data: {
                sku:   $("#sku").val(),
                price:  $("#price").val(),
                name: $("#name").val(),
            },
            success: function(response) {
                if(response == true ){
                    location.href ="/products";
                }else {
                    $("#text-alert").text(response);
                    showAlert();
                }
            }
        });
       
});
</script>