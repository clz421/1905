<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>姓名</td>
            <td>班级</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->c_id}}</td>
            <td>{{$v->c_name}}</td>
            <td>{{$v->c_bj}}</td>
        </tr>
        @endforeach
    </table>
    {{ $data->links() }}

</body>
</html>