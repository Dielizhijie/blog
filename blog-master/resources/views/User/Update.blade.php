<html >
<head>

    <meta charset="utf8">
</head>
<body>
<form action="{{url('/update_user')}}{{'/' . $id}}" method="get">
    {{csrf_field()}}
    {{method_field('put')}}
    <h3>昵称：</h3>
    <input name="name"
              style="width:600px;height:30px"
              maxlength="20" size="50000">
    <br>
    <h3>邮箱：</h3>
    <input name="email"
           style="width:600px;height:30px"
           maxlength="20" size="50000">
    <br>
    <h3>密码：</h3>
    <input type="password" name="password"
           style="width:600px;height:30px"
           maxlength="20" size="50000">
    <br>
    <button type="submit">确认修改</button>
</form>
<input type="button" name="Submit" value="取消" onclick="javascript:history.back()" />
</body>
</html>