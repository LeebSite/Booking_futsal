# 🏟️ Sistem Booking Lapangan Futsal

Sistem manajemen booking lapangan futsal berbasis web yang dibangun dengan Laravel 11. Sistem ini memungkinkan customer untuk memesan lapangan futsal secara online dan admin untuk mengelola booking serta lapangan.

## ✨ Fitur Utama

### 👥 Multi-Role System
- **Superadmin**: Mengelola seluruh sistem dan user
- **Admin**: Mengelola lapangan dan booking
- **Customer**: Melakukan booking lapangan

### 🎯 Fitur Customer
- ✅ Registrasi dan login
- ✅ Melihat ketersediaan lapangan
- ✅ Booking lapangan dengan pilihan jam
- ✅ Upload bukti pembayaran
- ✅ Melihat riwayat booking
- ✅ Membatalkan booking (dengan syarat)

### 🎯 Fitur Admin
- ✅ Dashboard dengan statistik
- ✅ Mengelola lapangan (CRUD)
- ✅ Menerima/menolak booking
- ✅ Melihat jadwal harian
- ✅ Filter booking berdasarkan status/tanggal

### 🎯 Fitur Superadmin
- ✅ Mengelola semua user
- ✅ Mengubah role user
- ✅ Menghapus user

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade Templates, Bootstrap/Tailwind CSS
- **Authentication**: Laravel Auth
- **File Storage**: Laravel Storage
- **Logging**: Laravel Log

## 📋 Persyaratan Sistem

- PHP >= 8.2
- Composer
- MySQL >= 5.7
- Node.js & NPM (untuk asset compilation)
- Web Server (Apache/Nginx)

## 🚀 Instalasi

### 1. Clone Repository
```bash
git clone <repository-url>
cd Booking_futsal
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Configuration
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=booking_futsal
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Database Migration & Seeding
```bash
php artisan migrate
php artisan db:seed --class=InitialDataSeeder
```

### 6. Storage Link
```bash
php artisan storage:link
```

### 7. Compile Assets
```bash
npm run dev
# atau untuk production
npm run build
```

### 8. Start Server
```bash
php artisan serve
```

## 👤 Default Login Credentials

Setelah menjalankan seeder, gunakan kredensial berikut:

### Superadmin
- **Username**: `superadmin`
- **Password**: `SuperAdmin123!`

### Admin
- **Username**: `admin`
- **Password**: `Admin123!`

### Customer
- **Username**: `johndoe`
- **Password**: `Customer123!`

## 📁 Struktur Project

```
app/
├── Http/
│   ├── Controllers/          # Controllers
│   ├── Middleware/           # Custom Middleware
│   └── Requests/            # Form Requests
├── Models/                  # Eloquent Models
├── Services/               # Business Logic Services
└── Helpers/               # Helper Classes

database/
├── migrations/            # Database Migrations
└── seeders/              # Database Seeders

resources/
├── views/                # Blade Templates
├── css/                 # CSS Files
└── js/                  # JavaScript Files
```

## 🔧 Konfigurasi Tambahan

### File Upload
Pastikan folder `storage/app/public` memiliki permission yang tepat:
```bash
chmod -R 755 storage/
```

### Logging
Log aktivitas tersimpan di `storage/logs/laravel.log`

### Timezone
Sistem menggunakan timezone Asia/Jakarta. Ubah di `.env`:
```env
APP_TIMEZONE=Asia/Jakarta
```

## 📝 API Endpoints

### Authentication
- `POST /login` - Login
- `POST /register` - Register
- `POST /logout` - Logout

### Customer Routes
- `GET /customer/bookinglap` - Daftar lapangan
- `POST /customer/bookinglap` - Buat booking
- `GET /customer/riwayat` - Riwayat booking

### Admin Routes
- `GET /admin/booking` - Daftar booking
- `POST /admin/booking/{id}/accept` - Terima booking
- `POST /admin/booking/{id}/reject` - Tolak booking

## 🐛 Troubleshooting

### Error: Class not found
```bash
composer dump-autoload
```

### Error: Storage link
```bash
php artisan storage:link
```

### Error: Permission denied
```bash
chmod -R 755 storage bootstrap/cache
```

## 🤝 Contributing

1. Fork repository
2. Buat branch feature (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 License

Project ini menggunakan [MIT License](LICENSE).

## 📞 Support

Jika ada pertanyaan atau masalah, silakan buat issue di repository ini.
