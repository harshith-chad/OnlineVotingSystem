<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <input type="text" name="emailid" id="emailid" placeholder="enter email-id">
    <button onclick="fun()" type="button">Send otp</button>
</body>
<script>
    function fun()
    {
        var emailid=jQuery('#emailid').val();
        jQuery.ajax({
            url:'receive.php',
            type:'post',
            data:'emailid='+emailid,
        });
    }
</script>
</html>