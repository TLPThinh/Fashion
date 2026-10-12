@extends('layouts.client')
@section('content-client')
<style>
    /* Modern UI Design for Products Component */
    .separate {
        margin: 0 10px;
        font-size: 18px;
        font-weight: 600;
        color: #888;
        display: flex;
        align-items: center;
    }

    /* Checkbox Styles */
    .checkboxx {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: 2px solid #ddd;
        border-radius: 6px;
        min-width: 20px;
        width: 20px;
        height: 20px;
        outline: none;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-right: 12px !important;
        background-color: #fafafa;
        display: inline-block;
        vertical-align: middle;
        flex-shrink: 0;
    }

    .checkboxx:checked {
        border-color: #f7544a;
        background-color: #f7544a;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E");
        background-size: 75%;
        background-position: center;
        background-repeat: no-repeat;
    }

    .checkboxx:focus {
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(247, 84, 74, 0.2);
    }

    .name-filter {
        display: block !important;
        font-size: 15px;
        color: #444;
        cursor: pointer;
        transition: color 0.2s ease;
        margin-top: 0;
        line-height: 1.4;
        word-break: break-word;
    }
    
    .name-filter:hover {
        color: #f7544a;
    }

    /* Sidebar / Leftbar Styling */
    .leftbar {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #f0f0f0;
        overflow: hidden;
    }
    
    .leftbar .title {
        font-size: 17px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 20px;
        color: #222;
        border-bottom: 2px solid #f4f4f4;
        padding-bottom: 12px;
        position: relative;
        float: left;
        width: 100%;
    }
    
    .leftbar .title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 40px;
        height: 2px;
        background: #f7544a;
    }

    .leftbar ul {
        list-style: none;
        padding: 0;
        margin: 0;
        clear: both;
        width: 100%;
        float: left;
    }

    .leftbar ul li {
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .price-filter.leftbar .form-control {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        padding: 10px 15px;
        font-size: 14px;
        height: auto;
        box-shadow: none;
    }

    .price-filter.leftbar .form-control:focus {
        border-color: #f7544a;
    }

    #filter-price {
        background: linear-gradient(135deg, #f7544a 0%, #ff7676 100%);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 20px;
        font-weight: 600;
        font-size: 15px;
        width: 100%;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        margin-top: 5px;
    }

    #filter-price:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(247, 84, 74, 0.3);
    }

    /* Modern Product Card Grid */
    .products-grid {
        margin-top: -10px;
    }
    
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

    /* Pagination Styling */
    .pagination {
        margin-top: 20px;
    }
    
    .pagination > li > a, .pagination > li > span {
        border-radius: 8px !important;
        margin: 0 4px;
        border: 1px solid #e0e0e0;
        color: #555;
        font-weight: 500;
        transition: all 0.2s;
        padding: 8px 14px;
    }

    .pagination > .active > a, .pagination > .active > span {
        background-color: #f7544a !important;
        border-color: #f7544a !important;
        color: white !important;
    }

    .pagination > li > a:hover {
        background-color: #fff4f3;
        border-color: #f7544a;
        color: #f7544a;
    }
</style>
<div class="container_fullwidth">
    <div class="container">
        <div class="row">
            <form method="get">
                <div class="col-md-3">
                    <div class="category leftbar">
                    <h3 class="title">
                        Danh Mục Sản Phẩm
                    </h3>
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <input type="radio" class="checkboxx" value="{{ $category->slug }}" {{ ($categorySlug == $category->slug) ? 'checked' : '' }} name="category_slug">
                                <a class="name-filter">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    </div>
                    <div class="clearfix">
                    </div>
                    <div class="branch leftbar">
                        <h3 class="title">
                            Thương hiệu
                        </h3>
                        <ul>
                            <li>
                                <input type="radio" class="checkboxx" value="" name="brand_id" {{ ($request->brand_id == '') ? 'checked' : '' }}>
                                <a class="name-filter">
                                    Tất cả
                                </a>
                            </li>
                            @foreach ($brands as $brand)
                                <li>
                                    <input type="radio" class="checkboxx" value="{{ $brand->id }}" {{ ($request->brand_id == $brand->id) ? 'checked' : '' }} name="brand_id">
                                    <a class="name-filter">
                                        {{ $brand->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix">
                    </div>
                    <div class="price-filter leftbar" style="width:100%;">
                        <h3 class="title">
                            Khoảng Giá
                        </h3>
                        <div style="display: flex; width: 100%;">
                            <input id="min-price" type="text" value="{{ $request->min_price ?? '' }}" class="form-control price-filter" placeholder="Giá từ" name="min_price">
                            <span class="separate">-</span>
                            <input id="max-price" type="text" value="{{ $request->max_price ?? '' }}" class="form-control price-filter" placeholder="Giá đến" name="max_price">
                        </div>
                    </div>
                    <div style="display: flex; width: 100%; margin-top: 10px; justify-content: center;">
                        <button id="filter-price" url="{{ $request->fullUrl() }}">Lọc Sản Phẩm</button>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </form>
            <div class="col-md-9">
                <div class="products-grid">
                    <div class="row">
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="col-md-4 col-sm-6">
                                    <div class="products">
                                        <div class="thumbnail">
                                            <a href="{{ route('user.products_detail', $product->id) }}">
                                                <img src="{{ asset("asset/client/images/products/small/$product->img") }}" alt="Product Name">
                                            </a>
                                        </div>
                                        <div class="productname" style="height: 42px;">
                                            {{ $product->name }}
                                        </div>
                                        <h4 class="price">
                                            {{ format_number_to_money($product->price_sell) }}
                                        </h4>
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
                        @else
                        <h3 class="title" style="padding-top: 20px;">Không tìm thấy sản phẩm</h3>
                        @endif
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                @if (count($products) > 0)
                <div class="text-center">
                    <ul class="pagination">
                        {{ $products->links('vendor.pagination.default') }}
                    </ul>
                </div>
                @endif
            </div>
            <div class="clearfix">
            </div>
        </div>
    </div>
</div>
{{-- @vite(['resources/client/js/show-product.js']) --}}
@endsection