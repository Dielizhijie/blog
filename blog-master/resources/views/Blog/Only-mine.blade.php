<html>
<body>

<h1>-------------------------------------myblog----------------------------------------</h1>

@forelse($blog as $value)
    <h2>article:
        <a href = {{url('/my_article')}}{{'/'. $value -> id}}>{{$value -> title}}</a>
    </h2>
@empty
    <h1>没有发表文章</h1>
@endforelse
<a href={{ url('/') }}>首页</a>
</body>
</html>