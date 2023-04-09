@extends('mails.layout')

<style>
    .table table,
    .table th,
    .table td {
        border: 1px solid rgb(194, 189, 189);
        padding: 5px;
        font-size: 14px;
    }
</style>
@section('content')

<div style="margin-top:20px; margin-bottom:20px">
    @include('pdf.partials.booking')
</div>

<div style="margin-top:20px; margin-bottom:20px">
    <a
        href="https://hamptonchauffer.com/payment/checkout.php?pickup={{$booking->pickup}}&&destination={{$booking->destination}}&&amount={{$booking->price}}">Paynow</a>
</div>

@endsection