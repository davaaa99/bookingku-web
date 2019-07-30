<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  String $client_email
     * @param Date $date
     * @return \Illuminate\Http\Response
     */
    public function store($client_email,$date)
    {
        try {
            //getData Booking berdasarkan client
            $booking=Booking::where('client_email', $client_email)->where('created_at','LIKE',"%$date%")->get();
            return $booking;
            // $user=DB::table('users')->where('client_email', $client_email)->first('name');
            //generate pdf
            // $pdf = PDF::loadview('invoice',['booking'=>$booking]);
            // $invoice = $pdf->download('Invoice '.$user.' '.date('Y-m-d_H-i-s').'.pdf');
            // //send invoice
            // $objInvoice = new \stdClass();
            // $objInvoice->sender = 'example@mail.com';   //ganti pake email admin
            // $objInvoice->reciever = $client_email;

            // Mail::to($client_email)->send(new InvoiceMail($objInvoice));
            // add to db payment
            // $payment = new Payment();
            // $payment->id_payment = (String) Str::uuid();
            // $payment->report_status = 0;
            // $payment->save();
            // // add to db payment_booking
            // foreach($booking as $booklist ){
            //     $payment_booking = new Payment_booking();
            //     $payment_booking->id_payment = $payment->id_payment;
            //     $payment_booking->id_booking = $booklist->id_booking;
            //     $payment_booking->save();
            // }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully report data.',
                'serve' => report($e)
            ], 408);
        }
        return response()->json([
            'message' => 'Unuccesfully update data.' . $e->getMessage()
            // 'serve' => $invoice
        ], 201);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_payment)
    {
        try {
            $payment = payments::where('id_payment',$id_payment)->update([
                'report_status' => 1
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully update data.' . $e->getMessage(),
                'serve' => report($e)
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully update data.',
            'serve' => $payment
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_payment)
    {
        try {
            payments ::where('id_payment',$id_payment)->delete();
        } catch (Exception $e){
            return response()->json([
                'message' => 'Unuccesfully update data.' . $e->getMessage(),
                'serve' => report($e)
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully detele data.',
            'serve' => []
        ], 200);
    }
}
