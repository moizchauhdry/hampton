<div style="text-align: center; margin-bottom:10px;">
    <div style="font-size:24px;margin-bottom:5px"><b>Booking Confirmation</b></div>
    <div style="font-size:20px">Confirmation ID #{{$booking->id}}</div>
</div>

<div style="text-align: center; margin-bottom:20px">
    <div>Your booking has been confirmed at</div>
    <div>{{$booking->booking_date}}</div>
</div>


<table class="table">
    <tr>
        <th colspan="2" style="text-align:center;background: rgb(203, 201, 201);font-size:16px">Customer Information
        </th>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{$booking->user_name}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{$booking->user_name}}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{$booking->user_phone}}</td>
    </tr>

    <tr>
        <th colspan="2" style="text-align:center;background: rgb(203, 201, 201);font-size:16px">
            Booking Information
        </th>
    </tr>
    <tr>
        <th>Pickup</th>
        <td>{{$booking->pickup}}</td>
    </tr>
    <tr>
        <th>Destination</th>
        <td>{{$booking->destination}}</td>
    </tr>
    <tr>
        <th>No. of Passengers</th>
        <td>{{$booking->passengers_no}}</td>
    </tr>
    <tr>
        <th>No. of Lugages</th>
        <td>{{$booking->lugages_no}}</td>
    </tr>
    <tr>
        <th>No. of Vehicles</th>
        <td>{{$booking->vehicles_no}}</td>
    </tr>
    <tr>
        <th>Flight No.</th>
        <td>{{$booking->flight_no}}</td>
    </tr>
    <tr>
        <th>Vehicle</th>
        <td>{{$booking->vehicle_name}}</td>
    </tr>
    <tr>
        <th>Plan</th>
        <td>{{$booking->booking_plan}}</td>
    </tr>
    <tr>
        <th>Payment Type</th>
        <td>{{$booking->payment_type}}</td>
    </tr>
    <tr>
        <th>Additional Message</th>
        <td>{{$booking->additional_msg}}</td>
    </tr>

    <tr>
        <th colspan="2" style="text-align:center;background: rgb(203, 201, 201);font-size:16px">
            Payment Information
        </th>
    </tr>
    <tr>
        <th>Price</th>
        <td>${{$booking->price}}</td>
    </tr>
    <tr>
        <th>Tip</th>
        <td>${{$booking->tip}}</td>
    </tr>
    <tr>
        <th>Toll</th>
        <td>${{$booking->toll}}</td>
    </tr>
    <tr>
        <th>Processing Fee</th>
        <td>${{$booking->process_fee}}</td>
    </tr>
    <tr>
        <th>Discount</th>
        <td>${{$booking->discount}}</td>
    </tr>
</table>