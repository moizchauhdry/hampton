<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use PDF;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('id', 'desc')->paginate(10)
            ->withQueryString()
            ->through(fn ($booking) => [
                'id' => $booking->id,
                'user_name' => $booking->user_name,
                'user_email' => $booking->user_email,
                'user_phone' => $booking->user_phone,
                'pickup' => $booking->pickup,
                'destination' => $booking->destination,
                'price' => $booking->total_price,
                'booking_date' => Carbon::parse($booking->booking_date)->format('d-m-Y, h:i A'),
            ]);

        return Inertia::render('Booking/Index', [
            'bookings' => $bookings,
        ]);
    }

    public function create()
    {
        return Inertia::render('Booking/Edit', [
            'booking' => null,
            'edit_mode' => false,
        ]);
    }

    public function edit($id)
    {
        $booking = Booking::find($id);

        return Inertia::render('Booking/Edit', [
            'booking' => $booking,
            'edit_mode' => true,
        ]);
    }

    public function update(BookingRequest $request)
    {
        $booking = Booking::updateOrCreate(['id' => $request->booking_id], $request->validated());
        $booking->update([
            'total_price' => ($request->price +  $request->tip +  $request->toll +  $request->process_fee) - $request->discount
        ]);

        try {
            if (!$request->booking_id) {
                // Mail::to($booking->user_email)->send(new BookingMail($booking));
                $this->invoiceEmail($booking);
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        return Redirect::route('booking.index');
    }

    public function destroy(Request $request)
    {
        $booking = Booking::find($request->booking_id);
        $booking->delete();

        return redirect()->route('booking.index');
    }
    
    public function pdf($id)
    {
        $booking = Booking::find($id);

        view()->share([
            'booking' => $booking,
        ]);

        $pdf = PDF::loadView('pdf.booking');
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('booking.pdf');
    }

    private function invoiceEmail($booking)
    {
        try {

            $booking_date = date('m/d/Y h:i A', strtotime($booking->booking_date));
            $payment_url = 'https://app.hamptonschauffeur.com/payment/checkout.php?pickup=' . $booking->pickup . "&&destination=" . $booking->destination . ' Booking Date: ' . $booking_date . '&&amount=' . $booking->total_price;

            $data = [
                "personalizations" => [
                    [
                        "to" => [
                            [
                                "email" => $booking->user_email
                            ]
                        ],
                        "dynamic_template_data" => [
                            "image_url" => 'https://app.hamptonschauffeur.com/build/assets/logo-b01630e2.png',
                            "confirmation_no" => $booking->id,
                            "booking_date" => $booking_date,
                            "pickup_location" => $booking->pickup,
                            "dropoff_location" => $booking->destination,
                            "flight_no" => $booking->flight_no,
                            "vehicle" => $booking->vehicle_name,
                            "payment_type" => $booking->payment_type,
                            "base_fare" => $booking->price,
                            "toll" => $booking->toll,
                            "tip" => $booking->tip,
                            "processing_fee" => $booking->process_fee,
                            "discount" => $booking->discount,
                            "total_price" => $booking->total_price,
                            "addt_msg" => $booking->additional_msg,
                            "payment_url" => $payment_url,
                        ]
                    ]
                ],
                "from" => [
                    "email" => "info@hamptonchauffer.com",
                    "name" => "Hampton"
                ],
                "subject" => "Booking Confirmation",
                "content" => [
                    ["type" => "text/html", "value" => "Booking Confirmation"]
                ],
                "template_id" =>  "d-5c2db11045904bb89823d89d13efa16c"
            ];

            $url = 'https://api.sendgrid.com/v3/mail/send';
            $_data = json_encode($data);
            $headers = array(
                'Content-Type: application/json',
                'Authorization:Bearer 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',
            );

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $_data);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($curl);
        } catch (\Throwable $th) {
            // dd($th);
        }
    }
    
    public function sms($id)
    {
        try {
            $booking = Booking::find($id);
            $booking_date = date('m/d/Y h:i A', strtotime($booking->booking_date));
            $payment_url = 'https://app.hamptonschauffeur.com/payment/checkout.php?pickup=' . $booking->pickup . "&&destination=" . $booking->destination . '&&Booking Date: ' . $booking_date . '&&amount=' . $booking->total_price;

            $username = 'ACd250ef8c6843ce407b2ec06c761b609a';
            $password = 'efe656ccabaf7e240bdb8fbfa940f83c';

            $url = 'https://api.twilio.com/2010-04-01/Accounts/ACd250ef8c6843ce407b2ec06c761b609a/Messages.json';

            $data = array(
                'To' => $booking->user_phone,
                'From' => '+18335140194',
                'Body' => $payment_url
            );

            $body = http_build_query($data);

            $headers = array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic ' . base64_encode($username . ':' . $password)
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
            curl_close($ch);
        } catch (\Throwable $th) {
            throw $th;
        }
       
        return redirect()->back()->with('message', 'The sms have been sent successfully.');
    }
}
