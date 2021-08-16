@inject('city', 'App\Models\city')
@extends('layout')
@section('title')
   edit city
@endsection
@section('PageName')
    edit cities
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> edit cities here</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/main">Home</a></li>
              <li class="breadcrumb-item active"> edit cities</li>
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
          <h3 class="card-title">edit city</h3>
        </div>
        <div class="card-body">
            <form action={{url(route('cities.update',$id))}} method="post">
              <input type="hidden" name="_method" value="put">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">city name</label>
                    <input type="text" class="form-control" name="newName" placeholder="{{$city->where('id',$id)->first()->name}}">
                    <div class="form-group">
                      <label>Select related governorate</label>
                      <select name='newId' class="form-control">
                        @foreach ($governorate as $g)
                          <option> {{$g->name}} </option>
                        @endforeach
                      </select>
                    </div>
                    <button type='submit'>submit</button>
                    
                </div>
               
              </form>
      
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <a href={{url(route('cities.index'))}} class="btn btn-primary">go back to cities</a> 
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
