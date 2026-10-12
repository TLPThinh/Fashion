@extends('layouts.client')
@section('content-client')
<div class="container_fullwidth">
    <div class="container shopping-cart">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title cart-page-title">
            Giỏ Hàng Của Bạn
          </h3>
          <div class="clearfix"></div>
          @if (count(\Cart::getContent()) <= 0)
            <div class="empty-cart-state text-center">
                <i class="fas fa-shopping-cart empty-cart-icon"></i>
                <h3>Giỏ hàng của bạn đang trống</h3>
                <p>Hãy thêm vài sản phẩm và quay lại đây nhé!</p>
                <div style="padding-top: 30px">
                    <a href="{{ route('user.home') }}" class="btn-a shop-now-btn">Mua Sắm Ngay</a>
                </div>
            </div>
          @else
            <div class="cart-layout">
                <div class="cart-items-wrapper">
                    @foreach ($carts as $cart)
                    <form action="{{ route('cart.update') }}" method="post" class="cart-item-form">
                        @csrf
                        <div class="modern-cart-item">
                            <div class="item-visual">
                                <img src="{{ asset("asset/client/images/products/small/" . $cart->attributes->image . "") }}" alt="{{ $cart->name }}">
                            </div>
                            
                            <div class="item-info">
                                <h4 class="item-name">{{ $cart->name }}</h4>
                                <div class="item-variants">
                                    <span class="variant">Màu: <strong>{{ $cart->attributes->color }}</strong></span>
                                    <span class="variant-separator">•</span>
                                    <span class="variant">Size: <strong>{{ $cart->attributes->size }}</strong></span>
                                </div>
                                <div class="mobile-price">{{ format_number_to_money($cart->price) }} VNĐ</div>
                            </div>
                            
                            <div class="item-price desktop-only">
                                <span>{{ format_number_to_money($cart->price) }} VNĐ</span>
                            </div>
                            
                            <div class="item-quantity">
                                <input type="hidden" value="{{ $cart->id }}" name="id">
                                <div class="quantity-control">
                                    <input name="quantity" type="number" min="1" value="{{ $cart->quantity }}" class="qty-input">
                                </div>
                            </div>
                            
                            <div class="item-total desktop-only">
                                <span class="total-price">{{ format_number_to_money($cart->price * $cart->quantity) }} VNĐ</span>
                            </div>
                            
                            <div class="item-actions">
                                <button type="submit" class="btn-update" title="Cập nhật"><i class="fas fa-sync-alt"></i> Cập Nhật</button>
                                <a href="{{ route('cart.delete', $cart->id) }}" class="btn-remove" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>

                <div class="cart-summary-wrapper">
                    <div class="cart-summary-card">
                        <h4>Tóm Tắt Đơn Hàng</h4>
                        <div class="summary-row">
                            <span>Tổng số lượng</span>
                            <strong>{{ Cart::getTotalQuantity() }} sản phẩm</strong>
                        </div>
                        <div class="summary-row total-row">
                            <span>Tổng cộng</span>
                            <strong class="grand-total-amount">{{ format_number_to_money(Cart::getTotal()) }} VNĐ</strong>
                        </div>
                        <div class="summary-actions">
                            <a class="btn-checkout" href="{{ route('checkout.index') }}">
                                Tiến Hành Thanh Toán <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          @endif
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
</div>
@vite(['resources/client/css/cart.css'])
@endsection