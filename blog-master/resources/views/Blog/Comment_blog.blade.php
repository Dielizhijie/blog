<html>
<body>

<h1>-------------------------------------blog----------------------------------------</h1>

@forelse($blog as $value)
    <h1>文章</h1>
<h2>title:
    <a {{'/'. $value -> id}}>{{$value -> title}}</a>
</h2>
<h2>content:</h2>
<h3>
    <a {{'/'.$value -> id}}>{{$value -> content}}</a>
</h3>
@empty
    <h1>没有文章</h1>
@endforelse

@if($value->uid == $user->id)
<div class="links">
    <a href={{ url('/comment/add') }}{{'/'.$value->id}}>评论</a>
    <a href={{url('article/update')}}{{'/'.$value->id}}>修改</a>
    <a href={{url('delete')}}{{'/'.$value->id}}>删除</a>
</div>
@elseif($value->uid != $user->id)
<div class="links">
    <a href={{ url('/comment/add') }}{{'/'.$value->id}}>评论</a>
</div>
@endif
<h2>评论</h2>

@forelse($comment as $values)
    <p>
        {{ $values->comment }}
        <br>
        {{ $values->uname }}
        @if($user->id == $values->uid)
            <a href={{ url('/comment/update') }}{{ '/' . $values->bid . '/' . $values->uid . '/' . $values->id }}>更新</a>
            <a href={{ url('/comment/delete') }}{{ '/' . $values->bid . '/' . $values->uid . '/' . $values->id }}>删除</a>
            <br>
        @endif
    </p>

@empty
    <p>no comment</p>
@endforelse

<br><br>
<a href={{ url('/browse')}}>所有博客</a>
<a href={{ url('/') }}>首页</a>
</body>
</html>