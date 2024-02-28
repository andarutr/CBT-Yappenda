# Endpoint

## Auth
[GET][Component] '/' => '/login'
[GET][Component] '/login' = Melakukan login => login()
[GET][Component] '/lupa-password' = Menampilkan halaman lupa password => forgotPassword()
[GET][Controller] '/reset-password/{tokens}' = Menampilkan halaman reset password setelah klik tautan di email => index($tokens)
[POST][Controller] '/reset-password/{tokens}' = Logic dari reset password => update($tokens)

## Admin
[GET][Component] '/admin/dashboard' = Menampilkan halaman dashboard Admin
[GET][Component] '/admin/profile' = Menampilkan halaman profile => update_profile(), upload_picture()
[GET][Component] '/admin/ganti-password' = Menampilkan halaman ganti password => update_password()
[GET][Component] '/admin/account' = Menampilkan halaman table manajemen akun => destroy()
[GET][Component] '/admin/account/create' = Menampilkan halaman tambah akun => store()
[GET][Component] '/admin/account/edit/{uuid}' = Menampilkan halaman update akun => update()
[GET][Component] '/admin/account/reset-password' = Menampilkan halaman reset password akun
[GET][Component] '/admin/account/reset-password/{uuid}' = Menampilkan halaman reset akun => update() 
[GET][Component] '/admin/account/role' = Menampilkan halaman role akun
[GET][Component] '/admin/account/role/{uuid}' = Menampilkan halaman update role akun => update() 
[GET][Component] '/admin/account/suspend' = Menampilkan halaman suspend akun => suspend($uuid), un_suspend($uuid) 
[GET][Component] '/admin/mata-pelajaran' = Menampilkan halaman table mata pelajaran 
[GET][Component] '/admin/mata-pelajaran/create' = Menampilkan halaman menambah mata pelajaran => store() 
[GET][Component] '/admin/mata-pelajaran/edit/{uuid}' = Menampilkan halaman update mata pelajaran => update()
[GET][Component] '/admin/mata-pelajaran/edit/{uuid}' = Menampilkan halaman update mata pelajaran => update()
[GET][Component] '/admin/assessment/ash' = Dalam pembuatan => abort(503)
[GET][Component] '/admin/assessment/asts' = Dalam pembuatan => abort(503)
[GET][Component] '/admin/assessment/asas' = Dalam pembuatan => abort(503)
[GET][Component] '/admin/assessment/pas' = Dalam pembuatan => abort(503)

## Guru
[GET][Component] '/guru/dashboard' = Menampilkan halaman dashboard Guru
[GET][Component] '/guru/profile' = Menampilkan halaman profile => update_profile(), upload_picture()
[GET][Component] '/guru/ganti-password' = Menampilkan halaman ganti password => update_password()
[GET][Component] '/guru/mata-pelajaran' = Menampilkan halaman daftar mata pelajaran yg tersedia
[GET][Component] '/guru/assessment/ash' = Menampilkan halaman daftar ujian yg tersedia
[GET][Component] '/guru/assessment/ash/create' = Menampilkan halaman tambah ujian => store()
[GET][Component] '/guru/assessment/ash/input-soal/pg/{uuid}' = Menampilkan halaman tambah soal pilihan ganda => store_pg()
[GET][Component] '/guru/assessment/ash/input-soal/essay/{uuid}' = Menampilkan halaman tambah soal essay => store_essay()
[GET][Component] '/guru/assessment/ash/input-soal/preview/{uuid}' = Menampilkan halaman preview soal ujian
[GET][Component] '/guru/assessment/ash/edit-soal/pg/{uuid}' = Menampilkan halaman tambah soal pilihan ganda
[GET][Component] '/guru/assessment/ash/edit-soal/essay/{uuid}' = Menampilkan halaman tambah soal pilihan ganda => store_essay()
[GET][Component] '/guru/assessment/asts' = Dalam pembuatan => abort(503)
[GET][Component] '/guru/assessment/asas' = Dalam pembuatan => abort(503)
[GET][Component] '/guru/assessment/pas' = Dalam pembuatan => abort(503)

## User
[GET][Component] '/user/dashboard' = Menampilkan halaman dashboard User
[GET][Component] '/user/profile' = Menampilkan halaman profile => update_profile(), upload_picture()
[GET][Component] '/user/ganti-password' = Menampilkan halaman ganti password => update_password()
[GET][Component] '/user/ujian/ash' = Menampilkan halaman ujian yg sedang dimulai atau sudah selesai
[GET][Component] '/user/ujian/pg/{id}/{uuid}' = Menampilkan halaman mengerjakan soal pilihan ganda => Masih Kosong
[GET][Component] '/user/ujian/essay/{id}/{uuid}' = Menampilkan halaman mengerjakan soal essay => store() 
[GET][Component] '/user/ujian/preview/{uuid}' = Menampilkan halaman preview soal dan jawaban yg sudah dikerjakan => Masih Kosong
[GET][Component] '/user/ujian/asts' = Menampilkan halaman ujian yg sedang dimulai atau sudah selesai
[GET][Component] '/user/ujian/asas' = Menampilkan halaman ujian yg sedang dimulai atau sudah selesai
[GET][Component] '/user/ujian/pas' = Menampilkan halaman ujian yg sedang dimulai atau sudah selesai
[GET][Component] '/user/hasil-ujian/{uuid}' = Dalam pembuatan => abort(503)
