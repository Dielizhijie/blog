<body>

<h1>-------------------------------------user----------------------------------------</h1>

@forelse($users as $value)
    <h2>name:
       {{$value -> name}}
    </h2>
    <h2>email:
        {{$value -> email}}
    </h2>
    @if($value ->id == $user->id)
        <a href={{url('/user/update')}}{{'/'.$value->id}}>修改</a>
    @endif
    @if($user->leader_id == 1)
        <a href={{url('/user/delete')}}{{'/'.$value->id}}>删除</a>
    @endif
@empty
@endforelse
<br><br>
<a href={{ url('/') }}>首页</a>
</body>
</html>