@extends('layouts.admin')
@section('content')

<verify-component inline-template="inline-template">
    <div id="verify">
        <div class="container">
            <div class="table">
                <div class="title">Verify Booking</div>
               
                <booking-list></booking-list>

                <div class="spacer-50 "></div>

                <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
            </div>
            <div class="spacer"></div>
        </div>
    </div>
</verify-component>
@endsection
