@extends('layouts.client')
@section('content-client')
<style>
  .a-hover:hover{
    color:black !important;
  }
</style>
<div class="container_fullwidth">
    <div class="container order-detail-page">
      <div class="row">
        <div class="col-md-12">
          
          <div class="page-header-actions">
            <a href="{{ route('order_history.index') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Quay Lại Lịch Sử</a>
            <h3 class="title history-page-title">
              Chi Tiết Đơn Hàng #{{ $order->id }}
            </h3>
          </div>
          <div class="clearfix"></div>

          <div class="detail-layout">
            <div class="detail-items-wrapper">
              <h4 class="section-title">Danh sách sản phẩm ({{ count($order_details) }})</h4>
              
              <?php $totalProductMoney = 0;?>
              <div class="detail-items-list">
              @foreach ($order_details as $order_detail)
                <?php $totalProductMoney +=  $order_detail->unit_price *  $order_detail->quantity;?>
                <div class="modern-detail-item">
                    <div class="item-visual">
                        <img src="{{ asset("asset/client/images/products/small/$order_detail->product_img") }}" alt="{{ $order_detail->product_name }}">
                    </div>
                    
                    <div class="item-info">
                        <h4 class="item-name"><a href="{{ route('user.products_detail', $order_detail->product_id) }}">{{ $order_detail->product_name }}</a></h4>
                        <div class="item-variants">
                            <span class="variant">Mã SP: <strong>{{ $order_detail->product_id }}</strong></span>
                            <span class="variant-separator">•</span>
                            <span class="variant">Màu: <strong>{{ $order_detail->color_name }}</strong></span>
                            <span class="variant-separator">•</span>
                            <span class="variant">Size: <strong>{{ $order_detail->size_name }}</strong></span>
                        </div>
                    </div>
                    
                    <div class="item-price desktop-only">
                        <span>{{ format_number_to_money($order_detail->unit_price) }}</span>
                    </div>
                    
                    <div class="item-quantity-read">
                        <span class="qty-badge">x{{ $order_detail->quantity }}</span>
                    </div>
                    
                    <div class="item-total">
                        <span class="total-price">{{ format_number_to_money($order_detail->unit_price *  $order_detail->quantity) }} VNĐ</span>
                    </div>
                </div>
              @endforeach
              </div>
            </div>

            <div class="detail-summary-wrapper">
                <div class="detail-summary-card">
                    <h4>Thông Tin Thanh toán</h4>
                    <div class="summary-row">
                        <span>Tổng Tiền Sản Phẩm</span>
                        <strong>{{ format_number_to_money($totalProductMoney) }} VNĐ</strong>
                    </div>
                    <div class="summary-row">
                        <span>Phí Vận Chuyển</span>
                        <strong>{{ format_number_to_money($infomationUser->orders_transport_fee) }} VNĐ</strong>
                    </div>
                    <div class="summary-row">
                        <span>Phương Thức Thanh Toán</span>
                        <span class="payment-method-badge">{{ $infomationUser->payment_name }}</span>
                    </div>
                    <div class="summary-row total-row">
                        <span>Tổng Tiền Đơn Hàng</span>
                        <strong class="grand-total-amount">{{ format_number_to_money($order->total_money) }} VNĐ</strong>
                    </div>
                </div>
            </div>
          </div>
          
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
</div>
@vite(['resources/client/css/history.css'])
@endsection