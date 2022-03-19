<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body style="background: #eee">
    <div style="width:600px;margin: 100px auto;background:#fff;padding:50px 30px">
        <h1>Welcome {{ $name }}</h1>
        <p>There is an new account has been created for you in our website and you can change your password by clicking this button</p>

        <br>
        <br>
        <div style="text-align: center">
            <a style="display: inline-block; padding: 10px 30px;background: #4e73df; color: #fff; border-radius: 3px;text-decoration: none" href="{{ route('verify_doctor', $id) }}">Change Password</a>
        </div>
        <br>
        <br>

        <p>Best Regards.</p>

    </div>
</body>
</html>
