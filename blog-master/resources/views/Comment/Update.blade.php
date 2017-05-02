<html >
<head>
    <meta charset="utf8">
</head>
<body>
<form action="{{ url('/comment/update') }}{{ '/' . $bid . '/' . $uid .'/' . $cid }}" method="POST">
    {{ csrf_field() }}
    comment
    <br>
    <textarea type="text" name="comment"
              style="width: 600px; height: 200px">
    </textarea>
    <br><br>
    <button type="submit">submit</button>
</form>
<input type="button" name="Submit" value="cancel" onclick="javascript:history.back()" />
</body>
</html>