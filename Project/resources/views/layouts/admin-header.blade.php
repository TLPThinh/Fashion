<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin | {{ $title }}</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- jQuery -->
  <script src="{{ asset('asset/admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('asset/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/codemirror/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/admin/plugins/codemirror/theme/monokai.css') }}">
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
  </script>
  <style>
    :root {
        --sidebar-bg: #ffffff;
        --sidebar-active-bg: #009ef7;
        --sidebar-hover-bg: #f5f8fa;
        --sidebar-text: #5e6278;
        --sidebar-text-active: #ffffff;
        --sidebar-border: #eff2f5;
        --card-radius: 16px;
        --accent-success: #50cd89;
        --accent-info: #7239ea;
        --accent-warning: #ffc700;
        --accent-danger: #f1416c;
        --accent-primary: #009ef7;
    }

    .main-sidebar {
        background-color: var(--sidebar-bg) !important;
        box-shadow: 0 0 30px rgba(0,0,0,0.05) !important;
        border-right: 1px solid var(--sidebar-border) !important;
    }

    .brand-link {
        border-bottom: 1px solid var(--sidebar-border) !important;
        padding: 20px 15px !important;
        background-color: transparent !important;
    }

    .brand-text {
        font-weight: 700 !important;
        letter-spacing: 0.5px;
        color: #1e1e2d !important;
    }

    .sidebar {
        padding-left: 12px !important;
        padding-right: 12px !important;
    }

    .user-panel {
        border-bottom: 1px solid var(--sidebar-border) !important;
        margin-bottom: 15px !important;
        padding-bottom: 15px !important;
    }

    .user-panel .info a {
        color: #1e1e2d !important;
        font-weight: 600;
    }

    /* Un-set AdminLTE defaults */
    .nav-sidebar .nav-item > .nav-link {
        margin-bottom: 5px;
        border-radius: 12px !important;
        padding: 12px 15px !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        color: var(--sidebar-text) !important;
        display: flex;
        align-items: center;
    }

    .nav-sidebar .nav-icon {
        margin-right: 12px !important;
        font-size: 1.1rem !important;
        transition: transform 0.3s ease;
        width: 25px;
        text-align: center;
        color: #7e8299 !important;
    }

    .nav-sidebar .nav-link p {
        margin-bottom: 0;
        font-weight: 500;
    }

    /* Hover State */
    .nav-sidebar .nav-item:hover > .nav-link:not(.active) {
        background-color: var(--sidebar-hover-bg) !important;
        color: var(--sidebar-active-bg) !important;
        transform: translateX(4px);
    }

    .nav-sidebar .nav-item:hover .nav-icon {
        color: var(--sidebar-active-bg) !important;
        transform: scale(1.1);
    }

    /* Active State */
    .nav-sidebar .nav-link.active {
        background: linear-gradient(90deg, #009ef7 0%, #00b2ff 100%) !important;
        color: var(--sidebar-text-active) !important;
        box-shadow: 0 4px 15px rgba(0, 158, 247, 0.2) !important;
    }

    .nav-sidebar .nav-link.active .nav-icon {
        color: #fff !important;
    }

    /* Nav Header (Categories) */
    .nav-header {
        background-color: transparent !important;
        color: #b5b5c3 !important;
        text-transform: uppercase !important;
        font-size: 0.75rem !important;
        font-weight: 700 !important;
        letter-spacing: 1.2px !important;
        padding: 25px 15px 10px 15px !important;
    }

    /* --- Dashboard Modernization Appends --- */

    .card {
        border: none !important;
        border-radius: var(--card-radius) !important;
        box-shadow: 0 0 20px rgba(0,0,0,0.03) !important;
        margin-bottom: 1.5rem;
    }

    .card-header {
        background-color: transparent !important;
        border-bottom: 1px solid #f1f1f4 !important;
        padding: 1.25rem 1.5rem !important;
    }

    .card-title {
        font-weight: 700 !important;
        font-size: 1.1rem !important;
        color: #181c32 !important;
    }

    /* Modern Metric Cards (Box) */
    .metric-card {
        padding: 1.5rem !important;
        position: relative;
        overflow: hidden;
        background: #fff !important;
        border-radius: var(--card-radius) !important;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #f1f1f4 !important;
        transition: transform 0.3s ease;
    }

    .metric-card:hover {
        transform: translateY(-5px);
    }

    .metric-card .content {
        z-index: 2;
    }

    .metric-card .label {
        font-size: 0.9rem;
        font-weight: 600;
        color: #b5b5c3;
        margin-bottom: 0.5rem;
    }

    .metric-card .value {
        font-size: 1.75rem;
        font-weight: 800;
        color: #181c32;
        letter-spacing: -0.5px;
    }

    .metric-card .icon-wrapper {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    /* Color variations for metrics */
    .metric-success .icon-wrapper { background: rgba(80, 205, 137, 0.1); color: #50cd89; }
    .metric-info .icon-wrapper { background: rgba(114, 57, 234, 0.1); color: #7239ea; }
    .metric-warning .icon-wrapper { background: rgba(255, 199, 0, 0.1); color: #ffc700; }
    .metric-danger .icon-wrapper { background: rgba(241, 65, 108, 0.1); color: #f1416c; }
    .metric-primary .icon-wrapper { background: rgba(0, 158, 247, 0.1); color: #009ef7; }

    /* Table Modernization */
    .table-responsive {
        border-radius: var(--card-radius);
    }

    .table thead th {
        background-color: #f5f8fa;
        border-top: none !important;
        border-bottom: 1px solid #eff2f5 !important;
        color: #b5b5c3 !important;
        font-weight: 600 !important;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        padding: 1rem 1.5rem !important;
    }

    .table td {
        padding: 1.25rem 1.5rem !important;
        vertical-align: middle !important;
        border-bottom: 1px solid #eff2f5 !important;
        color: #3f4254;
        font-weight: 500;
    }

    /* Badge Modernization */
    .badge {
        font-weight: 600 !important;
        padding: 0.4rem 0.8rem !important;
        border-radius: 6px !important;
    }

    .badge-success { background-color: #e8fff3 !important; color: #50cd89 !important; }
    .badge-warning { background-color: #fff8dd !important; color: #ffbc00 !important; }
    .badge-danger { background-color: #fff5f8 !important; color: #f1416c !important; }
    .badge-primary { background-color: #f1faff !important; color: #009ef7 !important; }
    .badge-info { background-color: #f8f5ff !important; color: #7239ea !important; }

    /* Page Header Modernization */
    .content-header {
        padding: 2rem 1.5rem 1rem !important;
    }

    .content-header h1 {
        font-size: 1.75rem !important;
        font-weight: 800 !important;
        color: #181c32 !important;
        letter-spacing: -0.5px;
    }

    /* Modern Form Inputs */
    .form-control-modern {
        border-radius: 10px !important;
        border: 1px solid #eff2f5 !important;
        background-color: #f5f8fa !important;
        color: #5e6278 !important;
        transition: all 0.2s ease !important;
        padding: 0.6rem 1rem !important;
    }

    .form-control-modern:focus {
        background-color: #ffffff !important;
        border-color: #009ef7 !important;
        box-shadow: 0 0 10px rgba(0, 158, 247, 0.1) !important;
    }

    /* Search Input with Icon */
    .search-wrapper {
        position: relative;
    }

    .search-wrapper i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #a1a5b7;
        pointer-events: none;
    }

    .search-wrapper input {
        padding-left: 40px !important;
        border-radius: 50px !important;
    }

    /* Button Group Customization */
    .btn-group .btn {
        border-radius: 8px !important;
        margin: 0 2px;
    }

    /* Table Hover Enhancement */
    .table-hover tbody tr:hover {
        background-color: rgba(0, 158, 247, 0.02) !important;
        cursor: pointer;
    }

    /* Pagination Modernization */
    .pagination .page-link {
        border: none !important;
        border-radius: 8px !important;
        margin: 0 3px;
        color: #5e6278;
        font-weight: 600;
        min-width: 35px;
        text-align: center;
    }

    .pagination .page-item.active .page-link {
        background-color: #009ef7 !important;
        color: #ffffff !important;
        box-shadow: 0 4px 10px rgba(0, 158, 247, 0.2) !important;
    }

    /* Custom Scrollbar */
    .sidebar::-webkit-scrollbar {
        width: 4px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.05);
        border-radius: 10px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(0, 0, 0, 0.1);
    }
  </style>
</head>