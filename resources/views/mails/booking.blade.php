@extends('mails.layout')

@section('content')

<style>
    .table table,
    .table th,
    .table td {
        border: 1px solid rgb(194, 189, 189) !important;
        padding: 5px;
        font-size: 14px;
    }
</style>

<div style="margin-top:20px; margin-bottom:20px">
    @include('pdf.partials.booking')
</div>

<div style="margin-top:20px; margin-bottom:20px">
    <a class="paynow-button"
        href="https://hamptonchauffer.com/payment/checkout.php?pickup={{$booking->pickup}}&&destination={{$booking->destination}}&&amount={{$booking->price}}">Paynow</a>
</div>

@endsection