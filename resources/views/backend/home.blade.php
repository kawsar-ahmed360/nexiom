@extends('backend.master')

@section('title','Dashboard')

@push('css')
<style>
    .text-muted a{
       color : #4a4007
    }
</style>
@endpush

@section('content')
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dashboard</h2>


                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <canvas id="myChart" width="400" height="170"></canvas>
                </div>
            </div>


            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Menu</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{route('MenuIndex')}}">All Menu</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Page</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{route('PageIndex')}}">All Page</a></p>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-sliders"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">All Slider</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{route('SliderIndex')}}">All Slider</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-envelope"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text"> Message</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{route('MailIndex')}}">All Message</a></p>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-qrcode"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Product</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{route('ProductCatWiseIndex')}}">Products</a></p>
                        </div>
                    </div>
                </div>



                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-file-text-o"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Service</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{route('ServiceIndex')}}">Service</a></p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-qrcode"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Partners</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{route('ParnersIndex')}}">Partners</a></p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-qrcode"></i>
                </span>
                        <div class="text-box" >
                            <p class="main-text">Clients</p>
                            <p class="text-muted"><a style="text-decoration:none;" href="{{route('ClientIndex')}}">Clients</a></p>
                        </div>
                    </div>
                </div>

              

                {{--<div class="col-md-3 col-sm-6 col-xs-6">--}}
                    {{--<div class="panel panel-back noti-box">--}}
                {{--<span class="icon-box bg-color-red set-icon">--}}
                    {{--<i class="fa fa-video-camera"></i>--}}
                {{--</span>--}}
                        {{--<div class="text-box" >--}}
                            {{--<p class="main-text">Gallery</p>--}}
                            {{--<p class="text-muted"><a style="text-decoration:none;" href="{{ route('video.index') }}">Video</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

             


            </div>
            <!-- /. ROW  -->
            <hr />



            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>


    @section('footer')
        <script>
            var cllsho = <?php echo $All;?>;



            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['5 Day Ago', '4 Day Ago', '3 Day Ago', '2 Day Ago', '1 Day Ago', 'Today'],
                    datasets: [{
                        label: 'Last 7 day Visitor Count',
                        data: cllsho,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    @endsection


@endsection

