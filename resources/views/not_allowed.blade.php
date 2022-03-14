<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Not Allwed | {{ env('APP_NAME') }}</title>
    <style>
        body {
            margin: 0;
            direction: rtl;
            /* background: rgb(1, 121, 190); */
            color: #fff;
            font-size: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            margin: 0
        }
    </style>
</head>
<body>

    <div class="error">
        <img width="400" src="{{ asset('images/error.jpg') }}" alt="">
        {{-- <h1> الدخول غير مصرح </h1> --}}
    </div>

</body>
</html>
