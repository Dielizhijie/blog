<html >
<head>
    <meta charset="utf8">
</head>
<body>
<form action="{{url('/artposticle')}}" method="get">
    {{--{{csrf_field()}}--}}
    title:<br>
    <input type="text" name="title"
           style="width:1250px;height:30px"
           maxlength="20" size="4000000">
    <br>
    content:<br>
    <textarea type="text" name="content"
              style="width:1250px;height:450px"
              maxlength="1000" size="50000">
        </textarea>
    {{--<textarea name="content">--}}
    {{--</textarea>--}}
    <br>
    <button type="submit">发表</button>

</form>
<input type="button" name="Submit" value="取消" onclick="javascript:history.back()" />
</body>
</html>
