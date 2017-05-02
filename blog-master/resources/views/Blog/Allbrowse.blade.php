<html>
<body>

<h1>-------------------------------------blog----------------------------------------</h1>

@forelse($blog as $value)
    <h2>article:
        <a href = {{url('/all_article')}}{{'/'. $value -> id}}>{{$value -> title}}</a>
    </h2>
    <h7>
        user-name:
        <a {{'/'.$value -> id}}>{{$value -> uname}}</a>
    </h7>
@empty
    <h1>没有文章</h1>
@endforelse
<br><br>
<a href={{ url('/') }}>首页</a>
</body>
</html>