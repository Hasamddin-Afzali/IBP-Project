@extends('front.layouts.master')
@section('title', 'Home')
    @section('content')
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($blogs as $row)
                    <div class="post-preview">
                        <a href="{{url('post',$row->id)}}">
                            <h2 class="post-title">{{$row['title']}}</h2>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{$row['author']}}</a>
                            {{$row['created_at']}}
                        </p>
                        <p>
                        {{Str::limit($row['content'], 130)}}
                        </p>
                    </div>
                    @endforeach
                    <!-- Divider-->
                    <hr class="my-4" />
                    {{ csrf_field() }}
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
                <div class="col-lg-4">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                            Categories
                        </a>
                        @foreach ($category as $row)
                        <a href="#" class="list-group-item list-group-item-action">{{$row['category']}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
