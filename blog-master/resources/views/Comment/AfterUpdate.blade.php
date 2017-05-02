<html>
<body>

@if($is_success)
    <h3>更新成功</h3>
@else
    <h3>更新失败</h3>
@endif

<a href={{ url('/all_article') }}{{ '/' . $bid }}>返回本文章</a>
<br><br>
<a href={{ url('/') }}>首页</a>

</body>
</html>