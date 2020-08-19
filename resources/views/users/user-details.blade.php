@extends('layout.master')
@section('content')




<div class='container-fluid' style="margin:0 auto; width:70%; ">
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">User Id</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col"> Address</th>
      <th scope="col">Hobbies</th>
      <th scope="col">PostTitle</th>
      <th scope="col">PostContent</th>
    </tr>
  </thead>
  <tbody>

  @foreach($users as $user)
    <tr>
      <td> {{  $user->user_id  }} </td>                      <!-- //hasOne Contents from user Table --> 
      <td> {{  $user->UserName  }} </td>
      <td> {{  $user->Email }} </td>
      <td> {{  $user->Phone  }} </td>
      <td> {{  $user->profileData ? $user->profileData->Address : ""  }} </td>              <!-- //hasOne Contents from profile Table --> 
      <td> {{  $user->profileData ? $user->profileData->Hobbies : ""  }} </td>
 @foreach($user->postData as $data )

       <td> {{  $data ? $data->PostTitle : ''  }} </td>                                  <!-- //hasMany Contents  from post Table-->              
      <td> {{  $data ? $data->PostContent : ''  }} </td>          


@endforeach

      

    </tr>
    
 @endforeach

  </tbody>
</table>
<div>




@endsection

@section('script')


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src=" {{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src=" {{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src=" {{ asset ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src=" {{ asset ('dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src=" {{ asset ('dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src=" {{ asset ('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src=" {{ asset ('plugins/raphael/raphael.min.js') }}"></script>
<script src=" {{ asset ('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src=" {{ asset ('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src=" {{ asset ('plugins/chart.js/Chart.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src=" {{ asset ('dist/js/pages/dashboard2.js') }}"></script>


@endsection