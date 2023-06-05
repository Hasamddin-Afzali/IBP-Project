@extends('backend.back.master')
@section('content')
<aside class="right-side">
    <section class="content-header">
        <h1>
            All Messages
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Messages</a></li>
        </ol>
    </section>
    <div class="row">
                        <!-- Left col -->
                        <section class="col-md-6 connectedSortable"> 
                            <!-- quick email widget -->

                        </section><!-- /.Left col -->
                    </div><!-- /.row (main row) -->
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">All Blogs</h3>
            </div>
                <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($message as $row)
                        <tr>
                        <td>{{$row['id']}}</td>
                        <td>{{$row['title']}}</td>
                        <td>{{$row['email']}}</td>
                        <td>{{$row['message']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</aside>
@endsection