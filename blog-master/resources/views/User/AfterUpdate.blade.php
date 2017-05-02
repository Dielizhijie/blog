<html>
<body>

@if($is_success)
    <h3>更新成功</h3>
@else
    <h3>删除失败</h3>
@endif

<br>
<a href={{ url('/all_user') }}>我的博客</a>

</body>
</html>