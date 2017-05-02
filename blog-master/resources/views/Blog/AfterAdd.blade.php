<html>
<body>

@if($is_success)
    <h3>发表成功</h3>
@else
    <h3>发表失败</h3>
@endif

<br>
<a href={{ url('/mine') }}>我的博客</a>

</body>
</html>