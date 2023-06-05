@extends('backend.back.master') 
@section('content')
<aside class="right-side">
    <section class="content-header">
        <h1>
            Register New Admin
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">New Admin</li>
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
                        <h3 class="box-title">Create Admin</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
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
                    <form role="form" method="post" action="registration">
                    {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="la">Name</label>
                                <input type="number" class="form-control" id="la" name="la" placeholder="Login Authority">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create Admin</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- right column -->
            <div class="col-md-6">
            <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">All Admins</h3>
            </div>
                <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Authority</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $row)
                        <tr>
                        <td>{{$row['id']}}</td>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['email']}}</td>
                        <td>{{$row['log_authority']}}</td>
                        <td><a href="{{url('deleteUser/'.$row->id)}}"><button class="btn btn-danger" name="delete" value="delete">Delete</button</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            </div>
        </div>
    </section>
</aside>
@endsection