<html >
<head>

    <meta charset="utf8">
</head>
<body>
<form action="{{url('/article/')}}{{'/' . $id}}" method="POST">
    {{csrf_field()}}
    {{method_field('put')}}
    <textarea name="content"
    style="width:1250px;height:450px"
    maxlength="1000" size="50000">
    </textarea><br>
    <button type="submit">确认修改</button>
</form>
<input type="button" name="Submit" value="取消" onclick="javascript:history.back()" />
</body>
</html>