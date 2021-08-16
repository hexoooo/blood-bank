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
            <h1>here you can see selected donation</h1>
  
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
                <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">name</th><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">bags num</th><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">hospital location</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">id</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">phone</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">age</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">city</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">blood type</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">delete</th>
                </thead>
                <tbody>
                    @foreach ($DonationRequest as $DonationRequest)
        
                <tr class="odd">
                  <td>  
                  
                    {{ $DonationRequest->name;}}
                 
                  </td>
                  <td>  
                  
                    {{ $DonationRequest->bags_num;}}
                 
                  </td>
                  <td>  
                  
                    {{ $DonationRequest->hospital_address;}}
                 
                  </td>
                  <td>  
                  
                     {{ $DonationRequest->id;}}
                 
                    </td>
                    <td>
                  
                     {{ $DonationRequest->phone;}}
                 
                    </td>
                    <td>
                  
                     {{ $DonationRequest->age;}}
                 
                    </td>
                    <td>
                  
                     {{ $city->where('id',$DonationRequest->city_id)->first()->name;}}
                 
                    </td>
                    <td>
                  
                     {{ $BloodType->where('id',$DonationRequest->blood_type_id)->first()->name;}}
                    
                  </td>
                  {{-- we may change this to show --}}
                  <td>  
                    <form method='post' action='{{url(route('donations.destroy',$DonationRequest->id))}}'>
                      @csrf
                      <input type="hidden" name='_method' value='delete' />
                    <button type='submit' class="btn btn-primary">delete num {{$DonationRequest->id}}</button>
                    </form> 
                  </td>
                 
                </tr>
                @endforeach
      

        </tbody>
        <tfoot>
            <div class="card-footer">
                <a href={{url(route('donations.index'))}} class="btn btn-primary">go back to donations</a> 
            </div>
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
