@props(['headers', 'list', 'actions', 'routes'])
<div class="card shadow-sm border-0">
    <!-- /.card-header -->
    @if ($actions['create'] || $actions['createExcel'] || $actions['deleteAll'])
        <div class="card-header border-0 bg-white py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    @if ($actions['create'])
                        <a 
                            href="{{ (isset($routes['create'])) ? route($routes['create']) : '#'}}" 
                            class="btn btn-primary px-4 py-2 font-weight-bold shadow-sm next-link__js">
                            <i class="fas fa-plus mr-1"></i> Thêm Mới
                        </a>
                    @endif
                </div>
                <div class="d-flex align-items-center">
                    <div id="datatable-buttons-custom__js" class="mr-2"></div>
                    @if ($actions['deleteAll'])
                        <button class="btn btn-light text-danger font-weight-bold px-3">
                            <i class="fas fa-trash-alt mr-1"></i> Xóa Tất Cả
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="card-body p-0">
        <div class="table-responsive">
            <table id="table-crud" class="table table-hover mb-0">
                <thead>
                    <tr>
                        @foreach ($headers as $header)
                            <th class="border-0">{{ $header['text'] }}</th>
                        @endforeach
                        @if($actions['viewDetail'] || $actions['edit'] || $actions['delete'])
                            <th class="border-0 text-right">{{ $actions['text'] }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr id="{{ $item->id }}">
                            @foreach ($headers as $header)
                                <td>
                                    @if (! isset($header['status']) && ! isset($header['img']))
                                        @php
                                            $value = is_array($item_value = data_get($item, $header['key'])) ? nl2br(implode(PHP_EOL, $item_value)) : $item_value 
                                        @endphp
                                        @if (isset($header['format']))
                                            <span class="font-weight-bold">{{ format_number_to_money ($value) }}</span>
                                        @else
                                            {{$value}}
                                        @endif
                                    @elseif (isset($header['img']))
                                        @php
                                            $value = is_array($item_value = data_get($item, $header['key'])) ? nl2br(implode(PHP_EOL, $item_value)) : $item_value 
                                        @endphp
                                        <img class="rounded shadow-sm" style="{{ $header['img']['style'] }}" src="{{ asset($header['img']['url']) . '/' . $value }}" alt="">
                                    @else
                                        @foreach ($header['status'] as $status)
                                            @php
                                                $value = is_array($item_value = data_get($item, $header['key'])) ? nl2br(implode(PHP_EOL, $item_value)) : $item_value 
                                            @endphp
                                            @if ($value == $status['value'])
                                                <span class="badge {{ str_replace('bg-', 'badge-', $status['class']) }}">{{$status['text']}}</span>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            @endforeach
                            @if($actions['viewDetail'] || $actions['edit'] || $actions['delete'])
                                <td class="text-right">
                                    <div class="btn-group">
                                        @if ($actions['viewDetail'])
                                            <button id="btn-table-view-detail__js" class="btn btn-sm btn-light text-info mr-1" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        @endif
                                        @if ($actions['edit'])
                                            <a href="{{ isset($routes['edit']) ? route($routes['edit'], $item->id) : '#' }}" id="edit-customer" class="btn btn-sm btn-light text-primary mr-1 next-link__js" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if ($actions['delete'])
                                            <form style="display: inline;" action="{{route($routes['delete'])}}" method="POST" id="form-delete__js">
                                                @csrf
                                                <input type="text" name="id" value="{{$item->id}}" hidden>
                                            </form>
                                            <button id="delete__js" class="btn btn-sm btn-light text-danger" url="{{route($routes['delete'])}}" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@vite(['resources/admin/js/table-data.js', 'resources/admin/js/toast-message.js'])
