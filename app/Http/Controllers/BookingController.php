<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Mail\BookingMail;
use App\Models\Booking;
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
                'price' => $booking->price,
                'booking_date' => Carbon::parse($booking->booking_date)->format('d-m-Y, h:i:A'),
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

        try {
            // if (!$request->booking_id) {
            // Mail::to($booking->user_email)->send(new BookingMail($booking));
            $this->invoiceEmail($booking);
            // }
        } catch (\Throwable $th) {
            throw $th;
        }

        return Redirect::route('booking.index');
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
        // try {

        $booking_date = date('m/d/Y h:i A', strtotime($booking->booking_date));
        $payment_url = 'https://highstarlimo.com/payment/checkout.php?pickup=' . $booking->pickup . "&&destination=" . $booking->destination . ' Booking Date: ' . $booking_date . '&&amount=' . $booking->price;

        $data = [
            "personalizations" => [
                [
                    "to" => [
                        [
                            "email" => $booking->user_email
                        ]
                    ],
                    "dynamic_template_data" => [
                        "image_url" => 'https://admin.highstarlimo.com/public/images/logo.png',
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
                        "price_charged" => $booking->price,
                        "total_price" => $booking->price,
                        "addt_msg" => $booking->additional_msg,
                        // "price_reason" => $booking->price_reason,
                        "payment_url" => $payment_url,
                    ]
                ]
            ],
            "from" => [
                "email" => "hamzakhalil121@gmail.com",
                "name" => "Highstarlimo"
            ],
            "subject" => "Booking Confirmation",
            "content" => [
                ["type" => "text/html", "value" => "Booking Confirmation"]
            ],
            "template_id" =>  "d-5c2db11045904bb89823d89d13efa16c "
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
        // } catch (\Throwable $th) {
        //     dd($th);
        // }
    }
}
