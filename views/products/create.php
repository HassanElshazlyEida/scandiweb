
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
            $('.product_type').removeClass("d-block-important");
            $('.'+type+'-input').addClass("d-block-important");      
        });

        $("#product_form").submit(function(event){
            event.preventDefault();
            var data = {};
            $('.'+type+'-input').find('input').each(function(){
                var inputName= $(this).attr('id');
                var inputVal = $(this).val();
                data[inputName] = inputVal;
            });
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