@inject('post', 'App\Models\post')
@extends('layout')
@section('title')
   ceate new post
@endsection
@section('PageName')
    create posts
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> create new posts here</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/main">Home</a></li>
              <li class="breadcrumb-item active"> create new posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">new post</h3>
        </div>
        <div class="card-body">
          <form action={{url(route('posts.update',$id))}} method="post"  enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">post title</label>
                    <input type="text" class="form-control" name="title" placeholder="{{$post->where('id',$id)->first()->title}}">
                    <label for="exampleInputEmail1">post body</label>
                    <input type="e=text" class="form-control" name="body" placeholder="{{$post->where('id',$id)->first()->body}}">
                    <div class="form-group">
                    {{-- <label for="exampleInputEmail1">post photo</label>
                    <input type="text" class="form-control" name="photo" placeholder="{{$post->where('id',$id)->first()->photo}}"> --}}
                    <div class="form-group">
                      <label for="exampleInputFile">upload post photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input name='photo' type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Select related category</label>
                      <select name='id' class="form-control">
                        @foreach ($category as $c)
                          <option> {{$c->name}} </option>
                        @endforeach
                      </select>
                      
                    </div>
                    <button type='submit'>submit</button>
                    
                </div>
               
              </form>
      
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <a href={{url(route('posts.index'))}} class="btn btn-primary">go back to posts</a> 
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
