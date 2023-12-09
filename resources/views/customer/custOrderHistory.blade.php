<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{$title}}</title>
<link rel="stylesheet" href="{{asset('css/index.css')}}" />
<link rel="stylesheet" href="{{asset('css/pages.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @extends('customer.custSidebar')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        table, th, td{
   
            /* border: 1px solid black; */
            text-align: center;
        }   
        table{
            width: 100%;
        }
        input[type="submit"] {
            float: right;
        right: 0px;
  }
    </style>
</head>
<body>
    @section('content')

    <button class="btn-back" onclick="window.history.back()">Kembali</button>  
        <div class="box-container" style="display:block">
            <h2 style="margin: 0px 0px 20px 30px;">Order History</h2>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Nama Merchant</th>
                        <th>Service</th>
                        <th>Total Biaya</th>
                        <th>Pembayaran</th>
                        <th>Status Pembayaran</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        
                        <td>{{$order->id}}</td>
                        <td>{{$order->merchant_username}}</td>
                        <td>Kunci {{$order->service_order}}</td>
                        <td>Rp. {{$order->total_order}}</td>
                        <td>{{$order->payment_by}}</td>
    
                        @if($order->payment_status=='not_paid')
                        <td>Belum Lunas</td>
                        @else
                        <td>Lunas</td>
                        @endif
                        
                    </tr>
                    @endforeach

                
                    
                    
                </tbody>
            </table>
        </div>

<script>
    $(document).ready(function () {
    $('#example').DataTable({
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
    });
});
</script>


    </div>
    @endsection

</body>
</html>