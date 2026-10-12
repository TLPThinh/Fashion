@props(['data', 'title', 'route', 'boxtype'])

@php
    $icon = 'fa-chart-line';
    if (str_contains(strtolower($title), 'doanh thu')) $icon = 'fa-wallet';
    if (str_contains(strtolower($title), 'đơn hàng')) $icon = 'fa-shopping-bag';
    if (str_contains(strtolower($title), 'nhân sự')) $icon = 'fa-user-tie';
    if (str_contains(strtolower($title), 'lợi nhuận')) $icon = 'fa-coins';
    if (str_contains(strtolower($title), 'sản phẩm')) $icon = 'fa-box-open';
    if (str_contains(strtolower($title), 'khách hàng')) $icon = 'fa-users';
@endphp

<div class="metric-card metric-{{ $boxtype }}">
    <div class="content">
      <div class="label">{{ $title }}</div>
      <div class="value">
        {{ number_format ($data , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}
      </div>
    </div>
    <div class="icon-wrapper">
      <i class="fas {{ $icon }}"></i>
    </div>
</div>