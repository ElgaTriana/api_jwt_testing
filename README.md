# API JWT Testing

Backend API menggunakan **Laravel 12** dengan autentikasi **JWT**.

## 📦 Repository
[https://github.com/ElgaTriana/api_jwt_testing](https://github.com/ElgaTriana/api_jwt_testing)

## 📜 License
MIT License

---

## 📋 Requirements
- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Laravel 12.x
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth)

---

## ⚙️ Installation

1. **Clone repository**
   ```bash
   git clone https://github.com/ElgaTriana/api_jwt_testing.git

2. **Install Composer**
   ```bash
   composer install / composer Update

3. **Copy ENV**
   ```bash
   cp .env.example .env

4. **Generate Key**
   ```bash
   php artisan key:generate

5. **Setting ENV**
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=

6. **Migrasi Database**
   ```bash
   php artisan migrate / php artisan migrate:fresh --seed

7. **Generate JWT Secret**
   ```bash
   php artisan jwt:secret

8. **Jalankan Server**
   ```bash
   php artisan serve


## 🔑 Endpoint Authentication
1. **Register**
   **POST /api/register**
   ```bash
   {
      "name": "John Doe",
      "email": "johndoe@example.com",
      "password": "password",
      "password_confirmation": "password"
    }

2. **Login**
   **POST /api/login**
   ```bash
   {
       "email": "johndoe@example.com",
      "password": "password"
   }

3. **Get User Login**
   **GET /api/user**
   ```bash
   Authorization: Bearer <token>

4. **Logout**
   **POST /api/logout**
   ```bash
   Authorization: Bearer <token>

5. **Get Diagnosa**
   **GET /api/diagnosas**
   ```bash
   Authorization: Bearer <token>

<img style="text-align: center" width="640" height="281" alt="image" src="https://github.com/user-attachments/assets/16cf8563-e736-4af3-a326-ec0bc0a773e5" />


