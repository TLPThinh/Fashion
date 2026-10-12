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
<div class="container_fullwidth" style="min-height: calc(100vh - 389px);">
    <div class="container">
        <div class="hot-products">
            <h3 class="title">
                @if (count($products) > 0)
                    Kết quả tìm kiếm cho từ khoá '<span style="color:#f7544a;">{{ $contentSearch }}</span>'
                @else
                    Chúng tôi không tìm thấy sản phẩm '<span style="color:#f7544a;">{{ $contentSearch }}</span>' nào       
                @endif
            </h3>
            <form class="row" method="GET">
                <input type="text" value="{{ $contentSearch }}" hidden name="keyword">
                <div class="col-sm-3">
                    <div class="form-group">
                        <select class="form-control form-select" name="category">
                            <option disabled selected>Chọn danh mục</option>
                            <option value="" >Tất cả</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select class="form-control form-select" name="brand">
                            <option disabled selected>Chọn thương hiệu</option>
                            @foreach ($brands as $item)
                                <option value="{{ $item->id }}" {{ ($item->id == $brand) ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group" style="display: flex; align-items: center;">
                        <input type="text" class="form-control price-filter" value="{{ $minPrice }}" placeholder="Giá từ" name="min_price">
                        <span style="border-top: 1px; width: 50px;"></span>
                        <input type="text" class="form-control price-filter" value="{{ $maxPrice }}" placeholder="Giá đến" name="max_price">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="price-filter">Lọc tìm kiếm</button>
                    </div>
                </div>
            </form>
            <ul>
                <li>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-3 col-sm-6">
                            <div class="products">
                                <div class="thumbnail">
                                    <a href="{{ route('user.products_detail', $product->id) }}"><img src="{{ asset("asset/client/images/products/small/$product->img") }}" alt="Product Name"></a>
                                </div>
                                <div class="productname" style="height: 42px;">{{ $product->name }}</div>
                                <h4 class="price">{{ format_number_to_money($product->price_sell) }} VNĐ</h4>
                                <div class="productname" style="padding-bottom: 10px; padding-top: unset;">
                                    <x-avg-stars :number="$product->avg_rating" />
                                    <span style="font-size: 14px;">Đã bán: {{ $product->sum }}</span>
                                </div>
                                <div class="button_group">
                                    <a href="{{ route('user.products_detail', $product->id) }}" class="button add-cart" type="button">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </li>
            </ul>
        </div>
        <div class="text-center">
            <ul class="pagination">
                {{ $products->links('vendor.pagination.default') }}
            </ul>
        </div>
    </div>
</div>
@vite(['resources/client/css/search.css'])
@endsection