
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

<script>
    var type = null;
    $(document).ready(function() {
        $('#productType').change(function() {
            var selectedOption = $(this).val();
            type = selectedOption;
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

        $("#product_form").submit(function(event){
            event.preventDefault();
            data= {};
            if (type === 'book') {
                data= {};
                data.weight = $('#weight').val();
            } else if (type === 'furniture') {
                data= {};
                data.height = $('#height').val();
                data.width = $('#width').val();
                data.length = $('#length').val();
            } else if (type === 'dvd') {
                data= {};
                data.size = $('#size').val();
            }
            $("#types").val(JSON.stringify(data));
          
            // send ajax request
            $.ajax({
                type: "POST",
                url: "/products/validate",
                headers: {
                    'Authorization': 'Bearer ' + $("input[name='token']").val,
                },
                data: {
                    sku:    $("#sku").val(),
                    price:  $("#price").val(),
                    name:   $("#name").val(),
                    type:   ($.isEmptyObject(type))?"":type,
                    product_type: ($.isEmptyObject(data))?"":  data
                },
                success: function(response) {
                    if(response == 1 ){
                        event.currentTarget.submit()
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