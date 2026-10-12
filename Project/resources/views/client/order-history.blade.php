@extends('layouts.client')
@section('content-client')
<style>
  .modern-pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 20px;
    padding: 0;
    list-style: none;
  }
  .modern-pagination li {
    display: inline-block;
  }
  .modern-pagination li a, .modern-pagination li span {
    padding: 8px 16px;
    border-radius: 8px;
    background: #fff;
    border: 1px solid #ddd;
    color: #333;
    text-decoration: none;
    transition: all 0.2s;
  }
  .modern-pagination li.active span {
    background: #f7544a;
    color: #fff;
    border-color: #f7544a;
  }
  .modern-pagination li a:hover {
    background: #f0f0f0;
  }
</style>
<div class="container_fullwidth">
    <div class="container order-history-page">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title history-page-title">
            Lịch Sử Mua Hàng
          </h3>
          <div class="clearfix"></div>
          
          <div class="modern-history-layout">
              @if (count($orderHistorys) > 0)
                <div class="history-cards-wrapper">
                    @foreach ($orderHistorys as $orderHistory)
                    <div class="modern-order-card">
                        <div class="order-card-header">
                            <div class="order-id">
                                <i class="fas fa-box"></i> Mã ĐH: <strong>#{{ $orderHistory->id }}</strong>
                            </div>
                            <div class="order-status">
                                @if ($orderHistory->order_status == 0)
                                    <span class="status-badge status-pending"><i class="fas fa-clock"></i> Chờ xử lý</span>
                                @elseif($orderHistory->order_status == 1)
                                    <span class="status-badge status-shipping"><i class="fas fa-truck"></i> Đang giao hàng</span>
                                @elseif($orderHistory->order_status == 2)
                                    <span class="status-badge status-cancelled"><i class="fas fa-times-circle"></i> Đã hủy</span>
                                @elseif($orderHistory->order_status == 3)
                                    <span class="status-badge status-completed"><i class="fas fa-check-circle"></i> Đã nhận hàng</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="order-card-body">
                            <div class="order-detail-grid">
                                <div class="detail-item">
                                    <span class="detail-label">Ngày Đặt Hàng</span>
                                    <span class="detail-value">{{ $orderHistory->created_at }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Phương Thức TT</span>
                                    <span class="detail-value payment-method">{{ $orderHistory->payment_name }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Tổng Tiền</span>
                                    <span class="detail-value order-total">{{ format_number_to_money($orderHistory->total_money) }} VNĐ</span>
                                </div>
                                @if($orderHistory->note)
                                <div class="detail-item full-width">
                                    <span class="detail-label">Ghi chú</span>
                                    <span class="detail-value text-muted">{{ $orderHistory->note }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="order-card-footer">
                            <a href="{{ route('order_history.show', $orderHistory->id) }}" class="btn-action btn-detail"><i class="fas fa-info-circle"></i> Xem chi tiết</a>
                            <div class="primary-actions">
                                @if ($orderHistory->order_status == 0)
                                  <a href="{{ route('order_history.update', $orderHistory->id) }}" class="btn-action btn-danger"><i class="fas fa-ban"></i> Hủy Đơn</a>
                                @elseif($orderHistory->order_status == 1)
                                  <a href="{{ route('order_history.update', $orderHistory->id) }}" class="btn-action btn-success"><i class="fas fa-check"></i> Xác Nhận Đã Nhận</a>
                                @elseif($orderHistory->order_status == 2 || $orderHistory->order_status == 3)
                                  <a href="{{ route('order_history.update', $orderHistory->id) }}" class="btn-action btn-outline"><i class="fas fa-trash"></i> Xóa Lịch Sử</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
              @else
                <div class="empty-history-state text-center">
                    <i class="fas fa-receipt empty-icon"></i>
                    <h3>Bạn chưa có đơn hàng nào</h3>
                    <p>Hãy khám phá gian hàng và bắt đầu mua sắm ngay nhé!</p>
                    <a href="{{ route('user.home') }}" class="btn-primary-modern">Đến Trang Chủ</a>
                </div>
              @endif
          </div>
          
        </div>
        @if (count($orderHistorys) > 0)
        <div class="col-md-12 text-center" style="margin-top: 30px;">
            <ul class="pagination modern-pagination">
                {{ $orderHistorys->links('vendor.pagination.default') }}
            </ul>
        </div>
        @endif
      </div>
    </div>
</div>
@vite(['resources/client/css/history.css'])
@endsection