@extends('layouts.admin')
@section('content')

<div id="verifyBookingDetail">
    <div class="container">
        <div class="table-box ">
            <div class="spacer-50"></div>
            <div class="title d-flex justify-content-center">Verify Booking Detail</div>
            <div class="spacer-50"></div>
            <div class="table-header">Detail Informasi Booking</div>
            <div class="detail">
                <table>
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
                        <th>Bukti Pembayaran</th>
                        <td> : </td>
                        <td>
                            <img class="buktipembayaran" src="{{ asset('images/avatar.jpg') }}" alt="">
                        </td>
                    </tr>


                </table>
                <div class="tombol d-flex justify-content-end">
                    <button class="btn accept">Accept</button>
                    <button class="btn decline">Decline</button>
                </div>
            </div>
            <div class="spacer-50"></div>
        </div>
        <div class="spacer-50"></div>
    </div>
</div>
@endsection
