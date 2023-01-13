
<!DOCTYPE html>
<html>
<head>
    <title><?php $data['title'] ?? '' ?> </title>
</head>
<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        #alert {
            position: absolute;
            left: -100%;
            width: 50%;
            transition: all 0.5s ease-in-out;
            z-index: 1;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
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
    </script>
    <div id="alert" class="alert alert-danger d-none">
        <strong>Error!</strong> 
        <p id="text-alert">Please fill in all required fields.</p> 
    </div>