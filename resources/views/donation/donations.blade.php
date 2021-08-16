@inject('city', 'App\Models\city')
@inject('BloodType', 'App\Models\BloodType')
@extends('layout')
@section('title')
    donations
@endsection
@section('PageName')
    donations
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>search donations here</h1>
            <form action="{{route('donations.index',)}}">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">search by name</label>
                  <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="name">
                </div>
 

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/main">Home</a></li>
              <li class="breadcrumb-item active"> donations</li>
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
          <h3 class="card-title">donations</h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">name</th><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">bags num</th><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">hospital location</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">id</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">phone</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">age</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">city</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">blood type</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">delete</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">show</th>
                </thead>
                <tbody>
            @foreach ($donations as $d)
        
                <tr class="odd">
                  <td>  
                  
                  {{ $d->name;}}
                   
                  </td>
                  <td>  
                  
                  {{ $d->bags_num;}}
                   
                  </td>
                  <td>  
                  
                  {{ $d->hospital_address;}}
                   
                  </td>
                  <td>  
                  
                   {{ $d->id;}}
                   
                    </td>
                    <td>
                  
                   {{ $d->phone;}}
                   
                    </td>
                    <td>
                  
                   {{ $d->age;}}
                   
                    </td>
                    <td>
                  
                   {{ $city->where('id',$d->city_id)->first()->name;}}
                   
                    </td>
                    <td>
                  
                   {{ $BloodType->where('id',$d->blood_type_id)->first()->name;}}
                   
                  </td>
                  {{-- we may change this to show --}}
         
                     <td>  
                      <form method='post' action='{{url(route('donations.destroy',$d->id))}}'>
                        @csrf
                        <input type="hidden" name='_method' value='delete' />
                      <button type='submit' class="btn btn-primary">delete num {{$d->id}}</button>
                      </form>  
                    </td>  
                  
                  

                  <td>
                  <a method="post" href="{{route('donations.show',$d->id)}}" class="btn btn-danger">show</a>
             </td>
               
                </tr>
      
          @endforeach
        </tbody>
        <tfoot>
        </tfoot>
      </table>
      
        </div>

        <!-- /.card-body -->
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
