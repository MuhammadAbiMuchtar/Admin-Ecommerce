# 🛒 Admin-Ecommerce

Sistem administrasi e-commerce yang dibangun dengan Laravel 10 untuk mengelola produk, kategori, dan user dengan fitur role-based access control.

## 📋 Deskripsi

Admin-Ecommerce adalah aplikasi web yang menyediakan panel administrasi lengkap untuk mengelola toko online. Aplikasi ini dirancang dengan arsitektur MVC menggunakan framework Laravel dan menyediakan antarmuka yang user-friendly untuk admin dan super admin.

## 🖼️ Tampilan Aplikasi

### Halaman Login
![Tampilan Awal](public/image/Tampilan%20Awal.png)
*Halaman login yang aman dan user-friendly*

### Dashboard Admin
![Admin Dashboard](public/image/Admin%20Dashboard.png)
*Panel dashboard admin dengan navigasi lengkap dan fitur manajemen*

## ✨ Fitur Utama

### 🔐 Sistem Autentikasi
- Login/logout admin
- Role-based access control (Super Admin & Admin)
- Reset password
- Middleware autentikasi

### 👥 Manajemen User
- CRUD user (hanya Super Admin)
- Profil user
- Laporan user dengan fitur cetak
- Manajemen role dan permission

### 📂 Manajemen Kategori
- CRUD kategori produk
- Kategorisasi produk yang terstruktur

### 🛍️ Manajemen Produk
- CRUD produk lengkap
- Upload dan manajemen foto produk
- Multiple foto per produk
- Laporan produk dengan fitur cetak
- Detail produk dengan galeri foto

### 📊 Laporan & Cetak
- Laporan user yang dapat dicetak
- Laporan produk yang dapat dicetak
- Form laporan yang fleksibel

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 10.x
- **Database**: MySQL/PostgreSQL
- **Frontend**: Blade Templates, Vite
- **Authentication**: Laravel Sanctum
- **PHP Version**: ^8.1

## 📁 Struktur Proyek

```
Admin-Ecommerce/
├── app/
│   ├── Http/Controllers/
│   │   ├── BerandaController.php
│   │   ├── KategoriController.php
│   │   ├── LoginController.php
│   │   ├── ProdukController.php
│   │   └── UserController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Produk.php
│   │   ├── Kategori.php
│   │   └── FotoProduk.php
│   └── Helpers/
├── resources/
├── routes/
│   ├── web.php
│   └── api.php
├── database/
└── public/
```

## 🚀 Instalasi

### Prasyarat
- PHP ^8.1
- Composer
- MySQL/PostgreSQL
- Node.js & NPM

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone [url-repository]
   cd Admin-Ecommerce
   ```

2. **Install dependencies PHP**
   ```bash
   composer install
   ```

3. **Install dependencies Node.js**
   ```bash
   npm install
   ```

4. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Konfigurasi database di file .env**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=username
   DB_PASSWORD=password
   ```

6. **Jalankan migrasi database**
   ```bash
   php artisan migrate
   ```

7. **Jalankan seeder (opsional)**
   ```bash
   php artisan db:seed
   ```

8. **Build assets**
   ```bash
   npm run build
   ```

9. **Jalankan aplikasi**
   ```bash
   php artisan serve
   ```

## 🔑 Role & Permission

### Super Admin (Role: 1)
- Akses penuh ke semua fitur
- Manajemen user
- Manajemen kategori dan produk
- Laporan lengkap

### Admin (Role: 0)
- Manajemen kategori dan produk
- Laporan produk
- Tidak dapat mengakses manajemen user

## 📱 Fitur Laporan

### Laporan User
- Filter berdasarkan tanggal
- Export ke PDF
- Data lengkap user

### Laporan Produk
- Filter berdasarkan kategori dan tanggal
- Export ke PDF
- Informasi produk lengkap

## 🖼️ Manajemen Foto Produk

- Upload multiple foto per produk
- Preview foto sebelum upload
- Hapus foto individual
- Galeri foto produk

## 🔒 Keamanan

- Middleware autentikasi
- Role-based access control
- CSRF protection
- Validasi input
- Sanitasi data

## 📝 API Endpoints

Aplikasi menyediakan API endpoints untuk integrasi dengan aplikasi lain:

- `POST /api/login` - Autentikasi
- `GET /api/produk` - Daftar produk
- `GET /api/kategori` - Daftar kategori
- `POST /api/logout` - Logout

## 🧪 Testing

```bash
# Jalankan test
php artisan test

# Jalankan test dengan coverage
php artisan test --coverage
```

## 📦 Deployment

### Production Build
```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment Production
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

## 🤝 Kontribusi

1. Fork proyek
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 Lisensi

Proyek ini dilisensikan di bawah MIT License - lihat file [LICENSE](LICENSE) untuk detail.

## 👨‍💻 Developer

Dikembangkan untuk mata kuliah **Web Programming II** di **Universitas Bina Sarana Informatika (UBSI)**.

## 🖥️ Development Environment

Proyek ini dikembangkan menggunakan **Laragon** sebagai development environment yang menyediakan:
- Apache/Nginx web server
- MySQL database
- PHP 8.1+
- Composer package manager
- Git integration

---

**Admin-Ecommerce** - Sistem administrasi e-commerce yang powerful dan mudah digunakan! 🚀
# Admin-Ecommerce
