## Cara Install dan Login

1. Clone repository ini.
2. Jalankan `composer install`.
3. Copy file `.env.example` menjadi `.env` dan atur database.
4. Jalankan perintah ini untuk migrasi dan isi data dummy:
   ```bash
   php artisan migrate:fresh --seed
   
Akun Login Admin:
Username: admin
Password: admin123
