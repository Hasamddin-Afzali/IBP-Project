@extends('backend.back.master')
            @section('content')
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                
                <section class="content-header">
                    <h1>
                        Publish new Blog
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">New Blog</a></li>
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
                                        {{ session('cMessage')}}
                                    </div>
                                @endif
                                <!-- form start -->
                                <form role="form" method="POST" action="{{route('storePost')}}">
                                {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Blog Title</label>
                                            <input type="text" class="form-control"name="title" id="exampleInputEmail1" placeholder="Enter Blog Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Blog Author</label>
                                            <input type="text" class="form-control"name="author" id="exampleInputEmail1" placeholder="Enter Blog Author">
                                        </div>
                                        <div class="form-group">
                                        <select class="form-control" name="category" aria-label="Default select example">
                                        @foreach($category as $row)
                                            <option value="{{ $row->category }}">{{$row->category}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class='box'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Blog Post<small>Content</small></h3>
                                    <!-- tools box -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                        <textarea name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                      
                                    </div>
                            </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Blog</h3>
                                </div><!-- /.box-header -->

                                <!-- form start -->
                                <form role="form" method="POST" action="{{route('addCategory')}}">
                                {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category Name</label>
                                            <input type="text" class="form-control"name="category" id="exampleInputEmail1" placeholder="Enter Category Name">
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Add Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">All Blogs</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                    <div class="box-body">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">iD</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $row)
                                        <tr>
                                        <td>{{$row['id']}}</td>
                                        <td>{{$row['title']}}</td>
                                        <td>{{$row['author']}}</td>
                                        <td>{{$row['category']}}</td>
                                        <td>{{$row['content']}}</td>
                                        <td><a href="{{url('editPost',$row->id)}}"><button class="btn btn-success">Edit</button</a></td>
                                        <td>
                                            <a href="{{url('deletePost/'.$row->id)}}"><button class="btn btn-danger" name="delete" value="delete">Delete</button</a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    </div><!-- /.box-body -->
                            </div>
                        </div>
                </section>
            </aside>
            @endsection