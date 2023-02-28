@if($orders)
    <table class="table">
        <thead>
        <tr>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php $i =1 ?>
        @foreach($orders as $key => $order)
            <tr>
                <th>{{$i}}</th>
                <th style="width: 30%"><a href="{{route('get.detail.product',[$order->product->pro_slug,$order->product->id])}}" target="_blank">{{isset($order->product->pro_name) ? $order->product->pro_name : ''}}</a></th>
                <td><img style="width: 80px;height: 60px" src="{{isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) : ''}}" alt=""></td>
                <td>{{number_format($order->or_price,0,',','.')}}đ</td>
                <td>{{$order->or_qty}}</td>
                <td>{{number_format($order->or_qty * $order->or_price,0,',','.')}}đ</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
