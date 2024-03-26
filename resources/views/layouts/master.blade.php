<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" type="text/css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
</head>
<body>
    <script>
        @if (Session::has('success'))
            toastr.success("{{Session::get('success')}}");
        @endif
        @if (Session::has('error'))
            toastr.error("{{Session::get('error')}}");
        @endif
    </script>
</body>
</html>
