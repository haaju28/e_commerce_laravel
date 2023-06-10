<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase Order</title>
    <style>
        h1{
            text-align: center;
        }
        h2{
            text-align: center;
        }
        .table-product{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        span{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <h1>Purchase Order</h1>
    <h2>Hello : {{ $order->user->name }}!</h2>
    <div>
        <span>Thank you for your recent order with us. We are delighted to confirm that your order has been successfully received and is being processed</span>
    </div>

    <div class="table-product">
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            @php $total = 0; @endphp
            @foreach ($order->order_items as $key => $item)
                <tr>
                    <th>{{ $key+1 }}</th>
                    <th>{{ $item->name }}</th>
                    <th>{{ $item->price }}</th>
                    <th>{{ $item->qty }}</th>
                    <th>{{ number_format($item->qty * $item->price, 2) }}</th>
                    @php
                        $total += $item->qty * $item->price;
                    @endphp
                </tr>
            @endforeach
            <tr>
                <td colspan="4">TOTAL </td>
                <td>{{ number_format($total,2) }}</td>
            </tr>   
        </table>
    </div>

    <div>
        <span>Once again, thank you for your trust and support.</span>
        <span>We look forward to serving you and providing you with a great customer experience.</span>
    </div>
</body>

</html>