
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
    var data = {
        type: null
    };
    $(document).ready(function() {
        $('#product-Type').change(function() {
            var selectedOption = $(this).val();
            data.type = selectedOption;
            if (selectedOption === 'book') {

                $('.book-input').addClass("d-block-important");
                $('.furniture-input').removeClass("d-block-important");
                $('.dvd-input').removeClass("d-block-important");

            } else if (selectedOption === 'furniture') {

                $('.book-input').removeClass("d-block-important");
                $('.furniture-input').addClass("d-block-important");
                $('.dvd-input').removeClass("d-block-important");


            } else if (selectedOption === 'dvd') {

                $('.book-input').removeClass("d-block-important");
                $('.furniture-input').removeClass("d-block-important");
                $('.dvd-input').addClass("d-block-important");

            }
        });

        $("#product_form").on("submit", function(event){
            event.preventDefault();
           
            if (data.type === 'book') {
                data.size = $('#size-input').val();
            } else if (data.type === 'furniture') {
                data.height = $('#furniture-height').val();
                data.width = $('#furniture-width').val();
                data.length = $('#furniture-length').val();
            } else if (data.type === 'dvd') {
                data.weight = $('#weight-input').val();
            }
            
            // send ajax request
            $.ajax({
                type: "POST",
                url: "/products/store",
                headers: {
                    'Authorization': 'Bearer ' + $("input[name='token']").val,
                },
                data: {
                    sku:    $("#sku").val(),
                    price:  $("#price").val(),
                    name:   $("#name").val(),
                    type:   data
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
    });
  
</script>

<style>
    .d-block-important {
        display: block !important;
    }
</style>