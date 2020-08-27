@extends('pdf.pdf-template')
@section('data')

<!-- //this view is fetching data using the $user variable passing from 
loadView function -->

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">PostTitle</th>
      <th scope="col">PostContent</th>
    </tr>
  </thead>
  <tbody>
  @foreach($user as $d)
    <tr>
      <th scope="row">{{ $d -> user_id }}</th>
      <td>{{ $d -> UserName }}</td>
      <td>{{ $d -> Email }}</td>
      <td>{{ $d -> Phone }}</td>
      <td>{{ $d -> PostTitle }}</td>
      <td>{{ $d -> PostContent }}</td>
    </tr> 
    @endforeach

  </tbody>
</table>



@endsection