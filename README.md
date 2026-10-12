# BÁO CÁO ĐỒ ÁN TỐT NGHIỆP: XÂY DỰNG WEBSITE BÁN HÀNG THỜI TRANG

---

## 🛠 Yêu Cầu Cài Đặt (Prerequisites)
Để chạy được dự án trên máy tính cục bộ (Localhost), máy tính của Thầy/Cô cần cài đặt sẵn:
- **XAMPP / Laragon** (hoặc môi trường chạy PHP >= 8.0 và MySQL).
- **Composer** (Quản lý thư viện PHP).
- **Node.js** và **npm** (Quản lý và biên dịch giao diện Frontend).
- **Git** (Tuỳ chọn).

---

##  Hướng Dẫn Cài Đặt và Vận Hành

### Bước 1: Nhập Cơ Sở Dữ Liệu (Import Database)
Dự án có kèm theo file cơ sở dữ liệu đã có sẵn cấu trúc bảng và dữ liệu mẫu đầy đủ để chạy thử nghiệm.
1. Mở hệ quản trị cơ sở dữ liệu (Ví dụ: **phpMyAdmin** tại `http://localhost/phpmyadmin`).
2. Tạo một cơ sở dữ liệu mới tên là: `graduation_project`).
3. Chọn cơ sở dữ liệu vừa tạo, vào tab **Import** (Nhập).
4. Tải lên file **`graduation_project.sql`** (nằm ở thư mục ngoài cùng `Fashion\graduation_project.sql`) và nhấn **Go** (Thực hiện).

### Bước 2: Cài đặt mã nguồn
1. Mở Terminal / Command Prompt tại thư mục chứa source code (`Project`):
   Ví dụ:
   ```bash
   cd "c:\Users\Dell 5593\Downloads\Fashion\Fashion\Project"
   ```
2. Chạy lệnh tải các thư viện của Laravel:
   ```bash
   composer install
   ```
3. Chạy lệnh tải các thư viện giao diện:
   ```bash
   npm install
   ```


### Bước 3: Biên dịch giao diện
Chạy lệnh sau để biên dịch CSS/JS (Cần thiết để giao diện hiển thị đầy đủ):
```bash
npm run build
```

### Bước 4: Khởi động hệ thống
Mở Terminal và chạy lệnh sau để bật Server Laravel:
```bash
php artisan serve
```
Hệ thống sẽ chạy tại địa chỉ: **[http://localhost:8000](http://localhost:8000)**

---

## 🔑 Tài Khoản Truy Cập 

- **Tài khoản:** `test@gmail.com`
- **Mật khẩu:** `Test@123` 

- **Đường dẫn trang quản trị (Admin Panel):** `http://localhost:8000/admin` 
- **Tài khoản Admin:** `admin@gmail.com`
- **Mật khẩu:** `admin123` 

---
**Trân trọng cảm ơn Thầy/Cô đã xem xét và đánh giá Đồ án!**
