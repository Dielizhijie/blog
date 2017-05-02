<html>
<body>

@if($is_success)
    <h3>更新成功</h3>
@else
    <h3>更新失败</h3>
@endif

<br>
<a href={{ url('/mine') }}>我的博客</a>

</body>
</html>