@extends('layouts.backend.main')

@section('title','Myblog | Blog index')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Display blog posts</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
        <li class="active">Blog</li

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                   <div class="pull-rigth">
                     <a href="{{route('backend.blog.create')}}" class="btn btn-success">Tambah</a>
                   </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                @if (session('message'))
                  <div class="alert alert-info">
                  {{ session('message') }}
                  </div>
                 @endif
                @if (!$posts->count())
                 <div class="alert alert-danger">
                    <strong>DATA KOSONG</strong>
                  </div>
                  @else
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                            <td width="80">Action</td>
                            <td>Slug</td>
                            <td>Author</td>
                            <td>Category</td>
                            <td>Date</td>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($posts as $post)
                         <tr>
                                <td>
                                    <a href="{{ route('backend.blog.edit',$post->id) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                   </a>
                                   <a href="{{ route('backend.blog.destroy',$post->id) }}" class="btn btn-xs btn-danger">
                                           <i class="fa fa-times"></i>
                                   </a>
                               </td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->published_at }}</td>
                            </tr>
                         @endforeach
                @endif
                     </tbody>
                 </table>
              </div>
              <!-- /.box-body -->
       <div class="box-footer clearfix">

        <div class="pull-left">
          {{$posts->links()}}
        </div>

        <div class="pull-right">
            <small>{{ $postcount }}</small>
        </div>

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
