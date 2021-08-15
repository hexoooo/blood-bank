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
                    @php
                    echo $DonationRequest->name;
                    @endphp
                  </td>
                  <td>  
                    @php
                    echo $DonationRequest->bags_num;
                    @endphp
                  </td>
                  <td>  
                    @php
                    echo $DonationRequest->hospital_address;
                    @endphp
                  </td>
                  <td>  
                    @php
                     echo $DonationRequest->id;
                    @endphp
                    </td>
                    <td>
                    @php
                     echo $DonationRequest->phone;
                    @endphp
                    </td>
                    <td>
                    @php
                     echo $DonationRequest->age;
                    @endphp
                    </td>
                    <td>
                    @php
                     echo $city->where('id',$DonationRequest->city_id)->first()->name;
                    @endphp
                    </td>
                    <td>
                    @php
                     echo $BloodType->where('id',$DonationRequest->blood_type_id)->first()->name;
                    @endphp
                  </td>
                  {{-- we may change this to show --}}
                  <td>  
                    <a method="post" href="{{url('donations/delete',$DonationRequest->id)}}" class="btn btn-primary">delete</a>
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
