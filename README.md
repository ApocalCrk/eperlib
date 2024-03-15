## E Perlib
E Perlib merupakan aplikasi peminjaman ruangan dan buku perpustakaan secara online yang dibuat untuk memenuhi tugas besar mata kuliah Pemrograman Web. Aplikasi ini terintegrasi dengan api UAJY sebagai registrasi dan login.

[Try Here] (https://eperlib.noturminesv.my.id)

**Silahkan melakukan migrate dan seeding terlebih dahulu dengan menjalankan perintah**
- `php artisan migrate` 
- `php artisan db:seed --class=User` 
- `php artisan db:seed --class=Buku` 
- `php artisan db:seed --class=Ruangan`
- `php artisan storage:link`

## Cara melakukan registrasi:

- Masuk ke halaman login
- Masukkan username dan password akun bimbingan UAJY
- Jika berhasil, maka akan muncul halaman create password
- Masukkan password baru dan konfirmasi password baru
- Jika berhasil, maka akan muncul halaman konfirmasi email

**Note: Email yang digunakan merupakan email yang terdaftar di akun bimbingan bukan email @students.uajy.ac.id**

## Username & Password Login:

### Login User:

- Username: 210711480
- Password: test

### Login admin:

- Username: admin
- Password: admin
