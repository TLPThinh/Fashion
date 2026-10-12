@extends('layouts.client')
@section('content-client')
<style>
    /* Modern Product Card */
    .products {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 30px;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: 1px solid #f0f0f0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        padding-bottom: 20px;
        position: relative;
    }

    .products:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-color: #eaeaea;
    }

    .products .offer {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #f7544a;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 20px;
        z-index: 10;
        box-shadow: 0 4px 10px rgba(247, 84, 74, 0.3);
    }

    .products .thumbnail {
        height: 280px;
        padding: 0;
        border: none;
        border-radius: 0;
        overflow: hidden;
    }

    .products .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .products:hover .thumbnail img {
        transform: scale(1.08);
    }

    .products .productname {
        font-size: 15px;
        font-weight: 600;
        color: #333;
        margin: 15px 20px 5px !important;
        text-align: center;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 42px !important;
    }

    .products .price {
        color: #f7544a;
        font-size: 19px;
        font-weight: 700;
        text-align: center;
        margin: 8px 0 10px;
    }

    .products .productname span {
        color: #999;
        font-weight: 500;
    }

    .button_group {
        text-align: center;
        margin-top: 15px;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }

    .products:hover .button_group {
        opacity: 1;
        transform: translateY(0);
    }

    .button.add-cart {
        background: transparent;
        color: #f7544a;
        border: 2px solid #f7544a;
        border-radius: 20px;
        padding: 8px 25px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s;
        display: inline-block;
        text-decoration: none;
    }

    .button.add-cart:hover {
        background: #f7544a;
        color: white;
    }
</style>
<div class="clearfix"></div>
<div class="hom-slider">
    <div class="container">
        <div id="sequence">
            <ul class="sequence-canvas">
                <li class="animate-in">
                    <div class="flat-caption caption2 formLeft delay400 text-center">
                        <h1>FASHION SHOP</h1>
                    </div>
                    <div class="flat-caption caption3 formLeft delay500 text-center">
                        <p>Chào mừng bạn đến với Fashion Shop — điểm đến thời trang được tuyển chọn kỹ lưỡng, nơi mỗi sản phẩm là sự kết hợp hoàn hảo giữa chất liệu cao cấp và thiết kế tinh tế.</p>
                        <p>Phong cách của bạn là ngôn ngữ không lời — hãy để chúng tôi giúp bạn nói lên điều đó.</p>
                    </div>
                    <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="{{ asset('asset/client/images/slider-image-04.png') }}" alt=""></div>
                </li>
            </ul>
        </div>
    </div>
    {{-- <div class="promotion-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="promo-box"><img src="{{ asset('asset/client/images/promotion-01.png') }}" alt=""></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="promo-box"><img src="{{ asset('asset/client/images/promotion-02.png') }}" alt=""></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="promo-box"><img src="{{ asset('asset/client/images/promotion-03.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<div class="clearfix"></div>
<div class="container_fullwidth">
    <div class="container">
        <div class="hot-products">
            <h3 class="title">Sản Phẩm Bán Chạy</h3>
            <div class="control"></div>
            <ul>
                <li>
                <div class="row">
                    @foreach ($bellingProducts as $bellingProduct)
                    <div class="col-md-3 col-sm-6">
                        <div class="products">
                            <div class="offer">Bán Chạy</div>
                            <div class="thumbnail">
                                <a href="{{ route('user.products_detail', $bellingProduct->id) }}"><img src="{{ asset("asset/client/images/products/small/$bellingProduct->img") }}" alt="Product Name"></a>
                            </div>
                            <div class="productname" style="height: 42px;">{{ $bellingProduct->name }}</div>
                            <h4 class="price">{{ format_number_to_money($bellingProduct->price_sell) }} VNĐ</h4>
                            <div class="productname" style="padding-bottom: 10px; padding-top: unset;">
                                <x-avg-stars :number="$bellingProduct->avg_rating" />
                                <span style="font-size: 14px;">Đã bán: {{ $bellingProduct->sum }}</span>
                            </div>
                            <div class="button_group"><a href="{{ route('user.products_detail', $bellingProduct->id) }}" class="button add-cart" type="button">Xem Chi Tiết</a></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="featured-products">
            <h3 class="title">Sản Phẩm Mới Nhất</h3>
            <div class="control"></div>
            <ul>
                <li>
                <div class="row">
                    @foreach ($newProducts as $newProduct)
                        <div class="col-md-3 col-sm-6">
                            <div class="products">
                                <div class="offer">Mới Nhất</div>
                                <div class="thumbnail"><a href="{{ route('user.products_detail', $newProduct->id) }}"><img src="{{ asset("asset/client/images/products/small/$newProduct->img") }}" alt="Product Name"></a></div>
                                <div class="productname" style="height: 42px;">{{ $newProduct->name }}</div>
                                <h4 class="price">{{ format_number_to_money($newProduct->price_sell) }} VNĐ</h4>
                                <div class="productname" style="padding-bottom: 10px; padding-top: unset;">
                                    <x-avg-stars :number="$newProduct->avg_rating" />
                                    <span style="font-size: 14px;">Đã bán: {{ $newProduct->sum }}</span>
                                </div>
                                <div class="button_group"><a href="{{ route('user.products_detail', $newProduct->id) }}" class="button add-cart" type="button">Xem Chi Tiết</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

@endsection