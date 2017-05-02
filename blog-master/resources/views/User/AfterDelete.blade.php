<html>
<body>

@if($is_success)
    <h3>删除成功</h3>
@else
    <h3>删除失败</h3>
@endif

<br>
<a href={{ url('/all_user') }}>博主</a>

</body>
</html>