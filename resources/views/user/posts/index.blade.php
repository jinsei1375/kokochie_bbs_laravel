@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="col-10 col-md-8 offset-1 offset-md-2">
             <a href="/user/posts/create">新規投稿</a>
              <table class="table">
                  <tbody>
                      
                      @foreach ($posts as $post)
                      <tr class="border">
                        <ul>
                            <li>{{ $post->user->your_name }}</li>
                            <li>{{ $post->created_at }}</li>
                            <li>{{ $post->content }}</li>
                            <li>
                              @if($post->user_id == Auth::id())
                              <div class="d-flex">
                                  <a href="{{ route('user.posts.edit', $post->id) }}" class="btn btn-success">編集</a>
                                  <form action="{{ route('user.posts.destroy', $post->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      @method('DELETE')
                                      <input type="submit" value="削除" class="btn btn-danger post_del_btn" onclick="return Check()">
                                  </form>
                                @endif
                              </div>
                            </li>
                        </ul>
                      </tr>
                      @endforeach
                  </tbody>
              </table> 
          </div>
        </div>
    </div>
</div>
@endsection
