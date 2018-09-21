@extends('layouts.backend.main')

@section('title','Myblog | Blog index')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add New Post</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
        <li class="active">Add Blog</li

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-body ">
                      {!! Form::model($post, ['method'=>'POST','route'=>'backend.blog.store']) !!}
                           <div class="form-group">
                               {!! Form::label('title') !!}
                               {!! Form::text('title',null, ['class'=>'form-control']) !!}
                           </div>
                           <div class="form-group">
                                {!! Form::label('slug') !!}
                                {!! Form::text('slug',null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('excerpt') !!}
                                    {!! Form::textarea('excerpt',null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('body') !!}
                                    {!! Form::textarea('body',null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('published_at') !!}
                                    {!! Form::text('published_at',null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('category') !!}
                                    {!! Form::select('category_id', App\Category::pluck('title','id'),null,['class'=>'form-control']) !!}
                           </div>
                           <hr>


                           {!! Form::submit('Save', ['class'=>'btn btn-danger']) !!}

                     {!! Form::close() !!}

                </div>
             </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
