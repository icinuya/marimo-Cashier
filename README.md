# marimoCashier-ci4
Aplikasi marimoCashier adalah aplikasi kasir yang berguna untuk membantu mengelola transaksi di toko Anda dengan mudah dan efisien. 

Aplikasi ini dibuat sebagai bagian dari Uji Kompetensi Keahlian Rekayasa Perangkat Lunak. 

## Installation
<code>git clone https://github.com/icinuya/marimo-Cashier.git</code>

Ganti file <code>env</code> menjadi <code>.env</code>
Lalu configurasi baseURL dan database settings :

<code>CI_ENVIRONMENT</code> = development atau production

<code>app.baseURL</code> = 'http://localhost:8080/'

<code>database.default.hostname = localhost
database.default.database = aplikasi_kasir
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi</code>

Untuk menggunakan aplikasi -> impor database aplikasi_kasir.sql ke web server database Anda, buka terminal lalu jalankan perintah 'php spark serve'. 

## Informasi Login

Username: admin

Password: 123
