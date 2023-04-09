@extends('mails.layout')

@section('styles')
<style>
    .table table,
    .table th,
    .table td {
        border: 1px solid rgb(194, 189, 189) !important;
        padding: 5px;
        font-size: 14px;
    }

    .paynow-button {
        background-color: #0070C0;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        padding: 10px 20px;
        cursor: pointer;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .paynow-button:hover {
        background-color: #005EA6;
    }

    a {
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<div style="margin-top:20px; margin-bottom:20px">
    @include('pdf.partials.booking')
</div>

<div style="margin-top:20px; margin-bottom:20px">
    <a class="paynow-button"
        href="https://hamptonchauffer.com/payment/checkout.php?pickup={{$booking->pickup}}&&destination={{$booking->destination}}&&amount={{$booking->price}}">Paynow</a>
</div>

@endsection