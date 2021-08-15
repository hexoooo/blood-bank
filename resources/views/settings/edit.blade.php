{{-- @inject('info', 'App\Models\ContactInfo') --}}
@extends('layout')
@section('title')
   ceate new governorate
@endsection
@section('PageName')
    create
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> create new governorates here</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/main">Home</a></li>
              <li class="breadcrumb-item active"> create new governorates</li>
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
          <h3 class="card-title">edit governorate</h3>
        </div>
        <div class="card-body">
            <form action={{route('settings.update',$id)}} method="post">
              <input type="hidden" name="_method" value="put" />
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">phone </label>
                    <input type="text" class="form-control" name="phone" placeholder="{{$info->where('id',$id)->first()->phone}}">
                    <label for="exampleInputEmail1">facebook link</label>
                    <input type="text" class="form-control" name="facebook_link" placeholder="{{$info->where('id',$id)->first()->facebook_link}}">
                    <label for="exampleInputEmail1">instagram link</label>
                    <input type="text" class="form-control" name="insta_link" placeholder="{{$info->where('id',$id)->first()->insta_link}}">
                    <label for="exampleInputEmail1">twitter link</label>
                    <input type="text" class="form-control" name="twitter_link" placeholder="{{$info->where('id',$id)->first()->twitter_link}}">
                    <label for="exampleInputEmail1">youtube link</label>
                    <input type="text" class="form-control" name="youtube_link" placeholder="{{$info->where('id',$id)->first()->youtube_link}}">
                    <button type='submit'>submit</button>
                    
                </div>
               
              </form>
      
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <a href={{url(route('governorates.index'))}} class="btn btn-primary">go back to governorates</a> 
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
