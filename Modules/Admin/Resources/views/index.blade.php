@extends('admin::layouts.master')

@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{$totalUser}}</p>
                            <p class="announcement-text">Thành viên</p>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.get.list.user')}}">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                Expand
                            </div>
                            <div class="col-xs-6 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-barcode fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{$products}}</p>
                            <p class="announcement-text"> Sản phẩm</p>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.get.list.product')}}">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                Expand
                            </div>
                            <div class="col-xs-6 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{$transactions}}</p>
                            <p class="announcement-text"> Đơn hàng</p>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.get.list.transaction')}}">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                Expand
                            </div>
                            <div class="col-xs-6 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6" style="color: #ff9705;">
                            <i class="fa fa-star fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{$totalRating}}</p>
                            <p class="announcement-text">Đánh giá</p>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.get.list.rating')}}">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                Expand
                            </div>
                            <div class="col-xs-6 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-sm-6">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>
        <div class="col-sm-6">
            <h2>Danh sách đơn hàng mới</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày gửi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactionsNew as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{isset($transaction->user->name) ? $transaction->user->name : 'N\A'}}</td>
                        <td>{{number_format($transaction->tr_total,0,',','.')}} VNĐ</td>
                        <td>

                            @if($transaction->tr_status == 1)
                                <a href="" class="label label-success">Đã xử lý</a>
                            @else
                                <a href="{{route('admin.get.active.transaction',$transaction->id)}}" class="label label-default">Chờ xử lý</a>
                            @endif
                        </td>
                        <td>
                            {{$transaction->created_at->format('d-m-Y')}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h2 class="sub-header">Danh sách liên hệ mới nhất</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Họ tên</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->c_title}}</td>
                            <td>{{$contact->c_name}}</td>
                            <td>{{$contact->c_content}}</td>
                            <td>
                                @if($contact->c_status ==1)
                                    <a href="" class="label-success label">Đã xử lý</a>
                                @else
                                    <a href="" class="label-default label">Chờ xử lý</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên thành viên</th>
                        <th>Sản phẩm</th>
                        <th>Rating</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($ratings))
                        @foreach($ratings as $rating)
                            <tr>
                                <td>{{$rating->id}}</td>
                                <td>{{isset($rating->user->name) ? $rating->user->name : ''}}</td>
                                <td><a href="">{{isset($rating->product->pro_name) ? $rating->product->pro_name : ''}}</a></td>
                                <td>{{$rating->ra_number}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu ngày - tháng'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Số tiền'
                }

            },
            legend: {
                enabled: true
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: false,
                        format: '{point.y:.0f} VNĐ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} VNĐ</b> <br/>'
            },

            series: [{
                name: "",
                colorByPoint: true,
                data: [
                    {
                    name: "Doanh thu ngày",
                    y:  {{$moneyDay}},
                    drilldown: "Doanh thu ngày"
                    },
                    {
                        name: "Doanh thu tuần",
                        y:  {{$moneyWeek}},
                        drilldown: "Doanh thu tuần"
                    },
                    {
                        name: "Doanh thu tháng",
                        y: {{$moneyMonth}},
                        drilldown: "Doanh thu tháng"
                    },
                    {
                        name: "Doanh thu năm",
                        y: {{$moneyYear}},
                        drilldown: "Doanh thu năm"
                    }
                ]
            }],
        });

    </script>
@stop
