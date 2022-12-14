@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <form action="/posts" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">新規投稿</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="text-center mt-3">
                        <input class="btn btn-primary" type="submit" value="投稿する">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
