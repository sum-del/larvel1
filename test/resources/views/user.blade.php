<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>see</title>
</head>
<body>
    <h1>用户列表</h1>
    <a href="/user/add">新增用户</a>
    <table>
        <tr>
            <th>用户名</th>
            <th>年龄</th>
            <th>性别</th>
            <th>操作</th>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{ $v->name}}</td>
                <td>{{ $v->age}}</td>
                <td>{{ $v->sex=='1'?'男':'女'}}</td>
                <td>
                    <a href="/user/edit/{{$v->id}}">编辑</a>
                    <a href="/user/del/{{$v->id}}">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
