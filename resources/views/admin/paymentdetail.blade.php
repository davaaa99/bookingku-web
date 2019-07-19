@extends('layouts.admin')
@section('content')
<div id="paymentdetail">

    <div class="container">
        <div class="table-box">
            <div class="spacer-50"></div>
            <div class="title d-flex justify-content-center">Payemen Detail</div>
            <div class="spacer-50"></div>
            <div class="table-header"></div>
            <div class="detail d-flex justify-content-center">
                <table >
                    <tr>
                        <th>ID Booking</th>
                        <td> : </td>
                        <td>CLN-001</td>
                    </tr>
                    <tr>
                        <th>Atas Nama</th>
                        <td> : </td>
                        <td>Tedi Abdul Majid</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td> : </td>
                        <td>JL. Telkom</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pembayaran</th>
                        <td> : </td>
                        <td>Lapang Semesta</td>
                    </tr>


                    <tr>
                        <th>Jam Booking</th>
                        <td> : </td>
                        <td>21.00</td>
                    </tr>
                    <tr>
                        <th>Jenis Pembayaran</th>
                        <td> : </td>
                        <td>DP</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td> : </td>
                        <td>can mayar</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td> </td>
                        <td>
                            <button class="btn btn-primary">Accept</button>
                            <button class="btn btn-danger">Decline</button>
                        </td>
                    </tr>

                </table>

            </div>
            <div class="spacer-50"></div>
        </div>
        <div class="spacer-50"></div>
    </div>
</div>

@endsection
