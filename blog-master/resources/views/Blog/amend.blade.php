{{--<html >--}}
{{--<head>--}}

    {{--<meta charset="utf8">--}}
{{--</head>--}}
{{--<body>--}}
{{--<form action="{{url('/article/')}}{{'/' . $id}}" method="POST">--}}
    {{--{{csrf_field()}}--}}
    {{--{{method_field('delete')}}--}}
    {{--<button type="submit">确定删除？</button>--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}
<html>

<body>

<h1>-------------------------------------myblog----------------------------------------</h1>

@forelse($blog as $value)
    <h1>title:
        <a {{'/'. $value -> id}}>{{$value -> title}}</a>
    </h1>
        <h2>content:</h2>
    <h3>
        <a {{'/'.$value -> id}}>{{$value -> content}}</a>
    </h3>
    <br><br>
@empty
@endforelse
<div class="links">
    <a href={{url('/comment/add')}}{{'/'.$value->id}}>评论</a>
    <a href={{url('article/update')}}{{'/'.$value->id}}>修改</a>
    <a href={{url('delete')}}{{'/'.$value->id}}>删除</a>
</div>
<h2>评论</h2>

@forelse($comment as $values)
    <p>
        {{ $values->comment }}
        <br>
        {{ $values->uname }}
        @if($user->id == $values->uid)
            {{$values -> uid}}
            <a href={{ url('/comment/update') }}{{ '/' . $values->bid . '/' . $values->uid . '/' . $values->id }}>更新</a>
            <a href={{ url('/comment/delete') }}{{ '/' . $values->bid . '/' . $values->uid . '/' . $values->id }}>删除</a>
            <br>
        @elseif($user->id != $values->uid)
            {{$values -> uid}}
            <a href={{ url('/master_comment/delete') }}{{ '/' . $values->bid . '/' . $values->uid . '/' . $values->id }}>删除</a>
        @endif
    </p>

@empty
    <p>no comment</p>
@endforelse

<a href={{ url('/') }}>首页</a>
</body>
</html>