<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_bookings = Booking::count();
        $new_customers = Booking::select(DB::raw('COUNT(DISTINCT user_email) as count'))->get();
        $new_customers = $new_customers[0]->count;

        $repeat_customers = $total_bookings - $new_customers;

        $card_payments = Booking::where('payment_type', 'Credit Card')->sum('price');
        $cash_payments = Booking::where('payment_type', 'Cash Payment')->sum('price');

        return Inertia::render('Dashboard', [
            'total_bookings' => $total_bookings,
            'new_customers' => $new_customers,
            'repeat_customers' => $repeat_customers,
            'card_payments' => $card_payments,
            'cash_payments' => $cash_payments,
        ]);
    }
}
