@extends('layouts.app')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Giao hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- contact-details start -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us-area">
                        <h1 style="text-align: center; margin-bottom: 40px">Chính sách giao hàng của Công ty</h1>
                        <h5 style="text-align: center">*Áp dụng từ: 26/3/2021</h5>  <br>
                        <p style="font-size: 14px; color: #494747" >


                           <b>1. PHẠM VI ÁP DỤNG</b>  <br>

                             - Những khu vực tỉnh thành có hệ thống siêu thị tại Công ty <br>
                           <b>2. THỜI GIAN NHẬN HÀNG</b>  <br>

                             - Công ty nhận giao nhanh trong ngày với khoảng cách từ các siêu thị có hàng đến điểm giao là 20 km. Khoảng cách lớn hơn nhân viên của chúng tôi sẽ tư vấn cách thức giao hàng thuận tiện nhất cho khách hàng. Cụ thể:
                            <br>
                            Khoảng cách đến nhà khách từ siêu thị gần nhất có hàng		TP. HCM		Tỉnh khác
                            Dưới 5km		Giao trong 30 phút		Giao trong 30 phút
                            5-10km		Giao trong 1 tiếng		Giao trong 1 tiếng
                            10-20km		Giao trong 2 tiếng		Giao trong 2 tiếng
                            Lưu ý		Thời gian giao hàng 9:00 đến 21:00		Thời gian giao hàng 9:00 đến 20:00


                            Riêng đối với đơn hàng giá rẻ online, sản phẩm sẽ được giao sớm nhất là 1 ngày sau khi đặt.
                            <br>
                           <b>3. PHÍ GIAO HÀNG</b>  <br>
                             - LOẠI SẢN PHẨM		 MỨC GIÁ		PHÍ GIAO
                            Sản phẩm không lắp đặt		Giá trên 500.000đ

                            - Miễn phí 10km đầu tiên

                            - Mỗi km tiếp theo tính phí 5.000đ/km

                            VD: Sạc dự phòng giá 600.000đ, khoảng cách giao hàng là 13 km >>> Phí giao hàng là: 15.000đ
                            Giá 500.000đ trở xuống

                            - Phí giao hàng 20.000đ cho 10km đầu tiên

                            - Mỗi km tiếp theo tính phí 5.000đ/km

                            VD: Sạc dự phòng 500.000đ, khoảng cách giao hàng là 13 km >>> Phí giao hàng là: 20.000đ + 15.000đ = 35.000đ
                            Sản phẩm lắp đặt		Giá trên 5 triệu

                            - Miễn phí 10km đầu tiên

                            - Mỗi km tiếp theo tính phí 5.000đ/km

                            VD:  Loa kéo giá 6 triệu, khoảng cách giao hàng là 13 km >>> Phí giao hàng là: 15.000đ
                            Giá 5 triệu trở xuống

                            - Phí giao hàng 50.000đ cho 10km đầu tiên

                            - Mỗi km tiếp theo tính phí 5.000đ/km

                            VD: Loa kéo giá 5 triệu, khoảng cách giao hàng là 13 km >>> Phí giao hàng là: 50.000đ + 15.000đ = 65.000đ
                            <br>

                            Lưu ý: <br>

                            + Khoảng cách giao hàng là khoảng cách được tính từ nhà khách hàng đến siêu thị TGDD/ĐMX gần nhất
                            <br>

                            + Hàng online only có chuyển hàng qua đối tác thì tổng đài 1800 1060 sẽ tư vấn cách thức giao hàng & phí chuyển hàng phù hợp.
                            <br>
                           <b>4. ĐEM THÊM NHIỀU SẢN PHẨM, MẪU MÃ KHÁC ĐỂ KHÁCH HÀNG LỰA TẠI NHÀ</b>  <br>

                             - Nếu có sự băn khoăn trong việc lựa chọn sản phẩm, hãy để nhân viên giao hàng của chúng tôi sẽ đem hơn 2 sản phẩm (đem thêm mẫu máy khác, đem thêm màu khác) theo yêu cầu của bạn đến tận nơi tư vấn.
                            <br>
                            - Kỹ thuật viên của chúng tôi sẽ giúp Quý khách khám phá kỹ hơn những tính năng ưu việt của từng sản phầm để Quý khách có được lựa chọn tốt nhất.
                            <br>
                            - Quý khách chỉ thanh toán khi thật sự hài lòng với sản phẩm và chất lượng dịch vụ của chúng tôi. Chúng tôi sẽ không tính bất kỳ khoản phí nào cho đến khi Quý khách hoàn toàn đồng ý.
                            <br>
                            - Khi Quý khách hoàn toàn hài lòng với sự lựa chọn của mình, Quý khách có thể thanh toán ngay bằng các thẻ quốc tế, nội địa mà không cần phải ra ngân hàng rút tiền mặt trước.
                            <br>
                            - Hãy gọi cho chúng tôi bất cứ lúc nào Quý khách cần được phục vụ với chất lượng 5 sao hoàn hảo.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-details end -->
@stop
