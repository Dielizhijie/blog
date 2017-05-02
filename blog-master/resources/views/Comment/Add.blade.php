<html >
<head>
    <meta charset="utf8">
</head>
<body>
<form action="{{ url('/comment/add') }}{{ '/' . $bid }}" method="POST">
    {{ csrf_field() }}
    comment<br>
    <textarea type="text" name="comment"
              style="width: 600px; height: 200px">
    </textarea>
    <br><br>
    <button type="submit">确认评论</button>
</form>
<input type="button" name="Submit" value="取消" onclick="javascript:history.back()" />
</body>
</html>