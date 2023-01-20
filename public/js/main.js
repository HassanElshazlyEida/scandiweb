
function showAlert() {
    $("#alert").removeClass("d-none");
    $("#alert").animate({
        left: "0%"
    }, 300);
    setTimeout(hideAlert, 3000);
}

function hideAlert() {  
    $("#alert").animate({
        left: "-100%"
    }, 300, function(){
        $("#alert").addClass("d-none");
    });
}
$(document).ready(function() {
    var type = null; // Global var
    $('#productType').change(function() {
        var selectedOption = $(this).val();
        type = selectedOption;
        $('.product_type').removeClass("d-block-important"); //display none
        $('.'+type+'-input').addClass("d-block-important");  //display block   
    });

    $("#product_form").submit(function(event){
        event.preventDefault();
        var data = {};
        $('.'+type+'-input').find('input').each(function(){
            // get all inputs value depending on type
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
                    // if all inputs valid 
                    event.currentTarget.submit()
                }else {
                    $("#text-alert").text(response);
                    showAlert();
                }
            }
        });
    });
    $(".select-all-checkbox").on('change', function() {
        // check all checkbox
        $(".delete-checkbox").prop("checked", this.checked);
    });

    $("#delete-product-btn").on('click',function(e){

        e.preventDefault();

        var checkedIds = $('.delete-checkbox:checked').map(function() {
            // store all ids of checkbox 
            return $(this).attr('id');
        }).get();
        if(checkedIds.length == 0){
            $("#text-alert").text("Please select at least one product");
            showAlert();
            return ;
        }
       
        $.ajax({
            type: 'POST',
            url: '/products/delete',
            headers: {
                'Authorization': 'Bearer ' + $("input[name='token']").val,
            },
            data: {
                ids: checkedIds
            },
            success: function(response){
                // Handle the server's response
                location.reload();
            }
        });

    });
});
