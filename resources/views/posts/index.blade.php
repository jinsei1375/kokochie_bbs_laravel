@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="col-10 offset-1 offset-md-2">
            <a href="{{ route('user.posts.create') }}" class="btn btn-primary">新規投稿</a>
              <table class="table post_list">
                  <tbody>
                      @foreach ($posts as $post)
                      <tr class="border">
                        <ul class="post_list">
                            <li><div class="row"><div class="colmd-3"><span>{{ $post->created_at }}</span>　{{ $post->user->your_name }}</div></div></li>
                            <li><div class="row"><div class="colmd-3">{{ $post->content }}</div></div></li>
                            <li>
                              @if($post->user_id == Auth::id())
                                <div class="d-flex">
                                  <a href="{{ route('user.posts.edit', $post->id) }}" class="btn btn-success">編集</a>
                                  <form action="{{ route('user.posts.destroy', $post->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      @method('DELETE')
                                      <input type="submit" value="削除" class="btn btn-danger post_del_btn" onclick="Check()">
                                  </form>
                                </div>
                              @endif
                            </li>
                            <li>
                              @Auth
                              <div class="">
                                  <form action="{{ route('comments.store') }}" method="POST">
                                  {{ csrf_field() }}
                                  @method('POST')
                                      <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="2"></textarea>
                                      <input type="hidden" name="post_id" value="{{ $post->id }}"  class="fas btn btn-primary">
                                      <input type="submit" value="コメントする"  class="fas btn btn-primary">
                                  </form>
                              </div>
                              @endAuth
                            </li>
                            <li class="commets-list">
                              <ul>
                              @foreach ($post->comments as $comment)
                                <li>
                                    <p><span>{{ $comment->created_at }}</span>　{{ $comment->user->your_name}}さんからのコメント</p>
                                    <p>{{ $comment->content }}</p>
                                </li>
                              @endforeach
                              </ul>
                            </li>
                            <li>
                              <div class="row">
                                  @Auth
                                  @if($post->favoriteusers()->where('user_id', Auth::id())->exists())
                                    <div class="">
                                        <form action="{{ route('unfavorites', $post) }}" method="POST">
                                        {{ csrf_field() }}
                                            <input type="submit" value="いいね取り消す" class="fas btn btn-danger">
                                        </form>
                                    </div>
                                  @else
                                    <div class="">
                                        <form action="{{ route('favorites', $post) }}" method="POST">
                                        {{ csrf_field() }}
                                            <input type="submit" value="いいね" class="fas btn btn-success">
                                        </form>
                                    </div>
                                  @endif
                                  @endAuth
                                  <div class="">
                                      <p>いいね数：{{ $post->favoriteusers()->count() }}</p>
                                  </div>
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
