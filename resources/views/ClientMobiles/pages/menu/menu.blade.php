@extends('AdminMobiles.layouts.layout')
@section('mobiles')
<div id="appCapsule">



    <!-- Transactions -->
    <div class="section mt-4">
        <div class="section-heading">
            <h2 class="title">MENU</h2>
            <a href="app-transactions.html" class="link"></a>
        </div>
        <div class="transactions">
            <!-- item -->
            <a href="app-transaction-detail.html" class="item">
                <div class="detail">
                    <img src="{{asset('AdminMobiles/assets/img/sample/brand/1.jpg')}}" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>QUẢN LÝ THU</strong>
                        <p>Nguồn thu nhập của bạn</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger"> 150</div>
                </div>
            </a>
            <!-- * item -->
            <!-- item -->
            <a href="app-transaction-detail.html" class="item">
                <div class="detail">
                    <img src="{{asset('AdminMobiles/assets/img/sample/brand/2.jpg')}}" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>QUẢN LÝ CHI</strong>
                        <p>Chi tiêu hàng ngày hàng tháng</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger">- $ 29</div>
                </div>
            </a>
            <!-- * item -->
            <!-- item -->
            <a href="app-transaction-detail.html" class="item">
                <div class="detail">
                    <img src="{{asset('AdminMobiles/assets/img/sample/avatar/avatar3.jpg')}}" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>QUẢN LÝ ĐẦU TƯ</strong>
                        <p>Đầu tư của bạn </p>
                    </div>
                </div>
                <div class="right">
                    <div class="price">+ $ 1,000</div>
                </div>
            </a>
            <!-- * item -->
            <!-- item -->
            <a href="app-transaction-detail.html" class="item">
                <div class="detail">
                    <img src="{{asset('AdminMobiles/assets/img/sample/avatar/avatar4.jpg')}}" alt="img" class="image-block imaged w48">
                    <div>
                        <strong>Beatriz Brito</strong>
                        <p>Transfer</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger">- $ 186</div>
                </div>
            </a>
            <!-- * item -->
        </div>
    </div>

   
</div>
@endsection