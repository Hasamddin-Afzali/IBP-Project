@extends('backend.back.master')
            @section('content')
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                
                <section class="content-header">
                    <h1>
                        asdfsadfdasfsa
                        Publish new Blog
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Blog</h3>
                                </div><!-- /.box-header -->
                                @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error}}
                                    </div>
                                    @endforeach
                                @endif
                                @if(session('sMessage'))
                                <div class="alert alert-success">
                                        {{ session('sMessage')}}
                                    </div>
                                @endif
                                <!-- form start -->
                                <form role="form" method="POST" action="{{route('storePost')}}">
                                {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Blog Title</label>
                                            <input type="text" class="form-control"name="title" value="{{$postdata->title}}" id="exampleInputEmail1" placeholder="Enter Blog Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Blog Author</label>
                                            <input type="text" class="form-control"name="author" value="{{$postdata->author}}" id="exampleInputEmail1" placeholder="Enter Blog Title">
                                        </div>
                                        <div class="form-group">
                                        <select class="form-control" name="category" aria-label="Default select example">
                                            <option value="{{$postdata->category}}">{{$postdata->category}}</option>
                                        </select>
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Blog Post<small>Content</small></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                        <textarea class="textarea" value="{{$postdata->content}}" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$postdata->title}}</textarea>                      
                                    </div>
                            </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>   
                    </div>
                </section>
            </aside>
            @endsection