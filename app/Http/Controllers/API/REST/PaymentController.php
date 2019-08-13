<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use App\Booking;
use App\Payment;
use App\Payment_booking;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

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
     * Create and store new payment and payment_booking.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            /**
             * Get list booking based on client email
             */
            $booking=Booking::where('client_email', $request->client_email)->where('created_at','LIKE',"%$$request->date%")->get();
            
            // $user=DB::table('user')->where('client_email', $client_email)->first('name');
            
            /**
             * Generate PDF
             */
            // $pdf = PDF::loadview('invoice',['booking'=>$booking]);
            // $invoice = $pdf->download('Invoice '.$user.' '.date('Y-m-d_H-i-s').'.pdf');
            
            /**
             * Send invoice to client email
             */
            // $objInvoice = new \stdClass();
            // $objInvoice->sender = 'example@mail.com';   //ganti pake email admin
            // $objInvoice->reciever = $client_email;

            // Mail::to($client_email)->send(new InvoiceMail($objInvoice));
            
            /**
             * Insert new Payment
             */
            $admin = Auth::user();

            $payment = new Payment();
            $payment->id_payment = Uuid::uuid1()->getHex();
            $payment->report_status = 0;
            $payment->created_by = $admin->email;
            $payment->updated_by = $admin->email;
            $payment->save();
            
            /**
             * Insert new Payment_booking
             */
            foreach($booking as $booklist ){
                $payment_booking = new Payment_booking();
                $payment_booking->id_payment = $payment->id_payment;
                $payment_booking->id_booking = $booklist->id_booking;
                $payment_booking->created_by = $admin->email;
                $payment_booking->updated_by = $admin->email;
                $payment_booking->save();
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed create data.',
                'serve' => report($e)
            ], 500);
        }
        return response()->json([
            'message' => 'Successfull created data.',
            'serve' => []
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
     * Update the specified payment status in storage.
     *
     * @param  String $id_payment
     * @return \Illuminate\Http\Response
     */
    public function update($id_payment)
    {
        try {
            $admin = Auth::user();

            $payment = Payment::where('id_payment',$id_payment)->get();
            $payment->report_status = 1;
            $payment->created_by = $admin->email;
            $payment->updated_by = $admin->email;
            $payment->save();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed update data.' . $e->getMessage(),
                'serve' => report($e)
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully updated data.',
            'serve' => []
        ], 201);
    }

    /**
     * Remove the specified payment from storage.
     *
     * @param  String $id_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_payment)
    {
        try {
            $admin = Auth::user();

            $payment = Payment::find($id_payment);
            $payment->updated_by = $admin->email;
            $payment->save();
            Payment::where('id_payment',$id_payment)->delete();
        } catch (Exception $e){
            return response()->json([
                'message' => 'Failed update data.' . $e->getMessage(),
                'serve' => report($e)
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully deteled data.',
            'serve' => []
        ], 200);
    }
}
