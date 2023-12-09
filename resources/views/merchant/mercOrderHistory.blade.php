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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    @extends('merchant.mercSidebar')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>
    @section('content')

    <button class="btn-back" onclick="window.history.back()">Kembali</button>  
    
    <div class="box-container">
        <div class="nav">
            <td style="text-align:left">
                <h2>Order History</h2> 
        </div>

    <div class="order-header">

                        <div class="box-order-profile">
                            <svg viewBox="0 0 32 32" enable-background="new 0 0 32 32" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Home"></g> <g id="Print"></g> <g id="Mail"></g> <g id="Camera"></g> <g id="Video"></g> <g id="Film"></g> <g id="Message"></g> <g id="Telephone"></g> <g id="User"> <path d="M21.6,17c2.1-1.6,3.4-4.2,3.4-7c0-5-4-9-9-9s-9,4-9,9c0,2.8,1.3,5.4,3.4,7C5.2,17.3,1,21.7,1,27v3 c0,0.5,0.5,1,1,1h14h14c0.5,0,1-0.5,1-1v-3C31,21.7,26.8,17.3,21.6,17z" fill="#f1e1b1"></path> <path d="M21.6,17c-1.5,1.2-3.5,2-5.6,2s-4.1-0.7-5.6-2C5.2,17.3,1,21.7,1,27v3c0,0.5,0.5,1,1,1h14h14 c0.5,0,1-0.5,1-1v-3C31,21.7,26.8,17.3,21.6,17z" fill="#2260ff"></path> </g> <g id="File"></g> <g id="Folder"></g> <g id="Map"></g> <g id="Download"></g> <g id="Upload"></g> <g id="Video_Recorder"></g> <g id="Schedule"></g> <g id="Cart"></g> <g id="Setting"></g> <g id="Search"></g> <g id="Pencils"></g> <g id="Group"></g> <g id="Record"></g> <g id="Headphone"></g> <g id="Music_Player"></g> <g id="Sound_On"></g> <g id="Sound_Off"></g> <g id="Lock"></g> <g id="Lock_open"></g> <g id="Love"></g> <g id="Favorite"></g> <g id="Film_1_"></g> <g id="Music"></g> <g id="Puzzle"></g> <g id="Turn_Off"></g> <g id="Book"></g> <g id="Save"></g> <g id="Reload"></g> <g id="Trash"></g> <g id="Tag"></g> <g id="Link"></g> <g id="Like"></g> <g id="Bad"></g> <g id="Gallery"></g> <g id="Add"></g> <g id="Close"></g> <g id="Forward"></g> <g id="Back"></g> <g id="Buy"></g> <g id="Mac"></g> <g id="Laptop"></g> </g></svg>
                            <div>
                            <p>{{$totalCusts}}</p>
                            <p>Total Customers</p>
                            </div>
                        
                        </div>
                    
                        <div class="box-order-profile">
                        <svg viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(6.72,6.72), scale(0.44)"><path transform="translate(-2.4, -2.4), scale(0.8999999999999999)" d="M16,26.022708056494594C19.17528448859945,25.773687754163863,22.7371696979452,27.22912486948806,25.149898689914323,25.149898689914323C27.638414089579836,23.005361783995994,27.33819669437995,19.272064776447856,27.630326004698873,16C27.968222411355754,12.215309825969666,29.185632653924767,8.124119618668756,26.943866125890366,5.0561338741096336C24.48634220119835,1.692871788793851,20.05366485570685,-0.875284597621766,16.000000000000004,0.08323349431157112C12.161683095366456,0.9908310206549986,11.522768052835824,6.024126677759348,9.241892369737226,9.241892369737226C7.6121671573677085,11.541041733542032,5.3391121522808875,13.251219010792337,4.717585694044828,15.999999999999998C3.8981327143892535,19.62413657886678,2.5149794932493825,24.23949440175096,5.292818444956973,26.70718155504302C8.07231927453468,29.17634503390389,12.293532759911386,26.313386134638364,16,26.022708056494594" fill="#7ed0ec" strokewidth="0"></path></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <polygon id="cart-a" points="0 0 1 3 11 3 12 0"></polygon> <path id="cart-c" d="M4.01867032,7 L15.8260605,7 C15.8624695,7 15.8984188,7.0019917 15.9338076,7.00587329 L18.2075854,0.659227726 C18.3493483,0.263534454 18.7208253,0 19.1368299,0 L22.0108287,0 C22.5567095,0 22.9992334,0.44771525 22.9992334,1 C22.9992334,1.55228475 22.5567095,2 22.0108287,2 L19.8298966,2 L15.7669004,13.3407723 C15.6251376,13.7364655 15.2536606,14 14.8376559,14 L4.95360962,14 C4.52817021,14 4.15046241,13.7245699 4.01592666,13.3162278 L1.05071278,4.31622777 C0.83737186,3.66869665 1.31375252,3 1.98839574,3 L10.8840374,3 C11.4299182,3 11.872442,3.44771525 11.872442,4 C11.872442,4.55228475 11.4299182,5 10.8840374,5 L3.35973391,5 L4.01867032,7 Z M4.67760674,9 L5.66601137,12 L14.1445893,12 L15.2193828,9 L4.67760674,9 Z M6.93041888,19 C5.83865727,19 4.95360962,18.1045695 4.95360962,17 C4.95360962,15.8954305 5.83865727,15 6.93041888,15 C8.02218048,15 8.90722813,15.8954305 8.90722813,17 C8.90722813,18.1045695 8.02218048,19 6.93041888,19 Z M13.8492513,19 C12.7574897,19 11.872442,18.1045695 11.872442,17 C11.872442,15.8954305 12.7574897,15 13.8492513,15 C14.9410129,15 15.8260605,15.8954305 15.8260605,17 C15.8260605,18.1045695 14.9410129,19 13.8492513,19 Z"></path> </defs> <g fill="none" fill-rule="evenodd" transform="translate(0 3)"> <g transform="translate(4 10)"> <mask id="cart-b" fill="#ffffff"> <use xlink:href="#cart-a"></use> </mask> <use fill="#D8D8D8" xlink:href="#cart-a"></use> <g fill="#9ecdff" mask="url(#cart-b)"> <rect width="24" height="24" transform="translate(-4 -13)"></rect> </g> </g> <mask id="cart-d" fill="#ffffff"> <use xlink:href="#cart-c"></use> </mask> <use fill="#000000" fill-rule="nonzero" xlink:href="#cart-c"></use> <g fill="#2260ff" mask="url(#cart-d)"> <rect width="24" height="24" transform="translate(0 -3)"></rect> </g> </g> </g></svg>
                            <div>
                            <p>Rp. {{$totalIncome}}</p>
                            <p>Total Pendapatan</p>
                            </div>
                        </div>
       
    </div>
    

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Nama Pelanggan</th>
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
                    <td>{{$order->customer_username}}</td>
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

    @endsection
</body>

</html>