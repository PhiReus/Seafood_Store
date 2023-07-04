<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>
        Xin chào "{{ $name = $data['name'] }}",

        Có phải bạn yêu cầu mật khẩu mới cho tài khoản {{ $name = $data['name'] }} được liên kết với
        {{ $email = $data['email'] }}.<br>

        Chưa có thay đổi nào được thực hiện đối với tài khoản của bạn.<br>

        Mật khẩu mới của bạn hiện tại là: {{ $password = $data['pass'] }}
    </p>

</body>

</html>
