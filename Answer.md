
## 1. Sebutkan berbagai macam cara penggunaan JSON untuk melakukan komunikasi data pada Laravel dan VueJS!
####	1.	JSON (JavaScript Object Notation) adalah format data / file yang biasa digunakan untuk komunikasi data antara server (Laravel) dengan client (VueJS) dalam develop sebuah aplikasi web. Cara penggunaan nya juga berbeda antara server dan client, penggunaan format data JSON di server biasa di gunakan pada Request dan Response, data request dengan format JSON yang di kirimkan dari client untuk server dapat diakses dengan cara:
#### di file controller Laravel
```php
use Illuminate\Http\Request;
class MyController extends Controller
{
  public function receiveData(Request $request) 
  {
      // Mengambil seluruh data JSON dari request body
      $data = $request->json()->all();

      // Mengambil nilai spesifik dari data JSON
      $data1 = $request->json('key');

      // $data dan $data1 dapat di proses selanjutnya
  }
}
```
#### dan untuk mengirimkan response berbentuk JSON file kepada client dari server Laravel dapat menggunakan json()
```php
...
public function getData() {

    $data = // data yang mau dikirim ke client

    return response()->json(['data' => $data, 'message' => 'Success'], 200);
}
...
```

#### pada Client (VueJS), untuk menerima dan mengakses data yang diberikan dari API server dapat dilakukan dengan request menggunakan Axios atau Fetch dengan cara:
```js
<template>
  ...
</template>
<script>
export default {
  data() {
    return {
      data: [],
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    async postData() {
      try {
        const response = await fetch('api', {
          method: 'POST',
          headers: {
            // untuk mengirim data dalam format JSON. 
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ data: /* data yang mau di kirim */ }),
        });

        if (!response.ok) {
          console.error('something wicked happend');
        }
      } catch (error) {
        console.error('Error posting data:', error);
      }
    }
  },
};
</script>
```

## 2. Apa saja yang harus dilakukan untuk mengatasi conflict code di github?

 untuk  mengatasi dam mencegah terjadinya conflict pada repository github pada sebuah tim dalam men develop sebuah aplikasi dapat dilakukan dengan:

1. **Buat Branch Baru:**
   - Setiap anggota tim sebaiknya membuat branch baru untuk setiap tugas atau fitur yang mereka kerjakan.
   - Gunakan perintah:
     ```bash
     git checkout -b namabranch
     ```

2. **Commit Secara Teratur:**
   - Lakukan commit secara teratur setiap kali menyelesaikan bagian tugas atau menambahkan fitur.
   - Gunakan pesan commit yang jelas dan deskriptif.
     ```bash
     git commit -m "Menambahkan fitur X"
     ```

3. **Update Repositori Lokal:**
   - Selalu perbarui repositori lokal sebelum memulai pekerjaan baru atau sebelum membuat pull request.
     ```bash
     git pull origin namabranch
     ```
4. **Pemisahan Tugas:**
   - Pastikan setiap anggota tim bekerja pada bagian atau file yang berbeda untuk mengurangi kemungkinan konflik.
   - Komunikasikan tugas yang sedang dikerjakan oleh masing-masing anggota tim.

5. **Pantau Perubahan di Repositori Pusat:**
   - Seringkali periksa perubahan yang terjadi di repositori pusat dan pantau aktivitas tim.
   - Gunakan GitHub atau tools kolaborasi lainnya.

6. **Pecahkan Konflik Secara Manual:**
   - Jika terjadi konflik saat melakukan pull atau merge, pecahkan konflik tersebut secara manual di editor kode.
   - jangan panik, Baca dahulu pesan eror yang diberikan karena bisa jadi terdapat suggestion yang dapat menyelesaikan conflict tersebut.
   - Hapus tanda konflik dan sesuaikan kode.

7. **Tandai Konflik Selesai:**
   - Setelah konflik dipecahkan, tandai file-file yang diubah.
     ```bash
     git add filename ...
     ```
8. **Commit Perubahan Setelah Konflik:**
   - Lakukan commit setelah menyelesaikan konflik.
     ```bash
     git commit -m "Menyelesaikan konflik"
     ```

9. **Push ke Repositori Pusat:**
   - Push branch yang diperbarui ke repositori pusat.
     ```bash
     git push origin namabranch
     ```

10. **Buat Pull Request:**
    - Buka repositori di GitHub dan buat Pull Request dari branch yang baru saja di-push.
    - Mintalah rekan tim untuk melakukan review.

11. **Review dan Merge:**
    - Tim melakukan review terhadap perubahan.
    - Jika semuanya sesuai, lakukan merge Pull Request ke branch utama.

## 3. Jika terjadi masalah down server pada monolithic architecture apps, hal apa saja yang dapat dilakukan?

monolithic apps adalah aplikasi dimana dibuat atau dibangun dalam satu codebase yang sama, dalam menganani masalah down atau update pada server yang telah di deploy
1. **Akses Server:**
   - Pertama-tama, akses server yang telah di-deploy. Ini dapat dilakukan melalui terminal atau konsol yang disediakan oleh penyedia layanan cloud atau platform deployment yang Anda gunakan.

2. **Monitoring dan Logging:**
    - Gunakan alat pemantauan dan logging untuk mengetahui error / masalah dengan cepat. Pemantauan real-time dapat membantu mengidentifikasi penyebab masalah dan mempercepat waktu tanggapan.
    - contoh alat pemantauan yang pernah saya gunakan adalah pm2, anda bisa melihat logs dan monitoring dengan command.
    ```bash
    # Melihat pemantauan
    pm2 monit

    # Melihat logs server
    pm2 logs
    ```
3. **Analisis Log:**
   - Analisis log untuk menemukan indikasi masalah. Lihar error message yang di berikan atau log kejadian yang terjadi sebelum server mengalami kegagalan. Ini dapat memberikan petunjuk tentang sumber error.

4. **Update Aplikasi atau Server:**

    - Jika masalah disebabkan oleh bug atau masalah yang dikenal, pertimbangkan untuk memperbarui aplikasi atau server dengan versi yang lebih baru yang memperbaiki masalah tersebut.
    - jika menggunakan repository github, pull code yang sudah di update dan login akun github dan key yang di dapat dari github untuk mengakses repo.
    - Pastikan bahwa perangkat lunak server dan dependensinya diperbarui secara berkala. 

5. **Restrat server:**
    - Lakukan restart pada server yang telah diupdate.
    - Lakukan pengujian (test) untuk memastikan bahwa perubahan telah diimplementasikan dengan benar.



## 4. Jelaskan cara melakukan deployment Laravel dan VueJS pada VPS?

saya belum pernah melakukan deployment pada aplikasi monolith seperti laravel.

## 5. Pernahkah anda menggunakan docker? Jika pernah, sebutkan manfaat development menggunakan docker!

Docker adalah platform open-source yang memungkinkan developer untuk membungkus aplikasi beserta modul nya ke dalam kontainer. Penggunaan Docker dalam pengembangan perangkat lunak memiliki beberapa manfaat, di antaranya:

1. Portabilitas Lintas Platform:

-  Docker memungkinkan developer untuk membungkus aplikasi dan dependensinya ke dalam kontainer yang bersifat independen. Kontainer dapat dijalankan dengan konsisten di berbagai sistem operasi, termasuk Windows, macOS, dan berbagai distribusi Linux.

2. Memiliki konfigurasi yang sederhana:
- Docker memiliki konfigurasi yang cukup sederhana dan dapat kamu sesuaikan dengan kebutuhan aplikasi yang sedang kamu kembangkan. Hanya dengan menentukan beberapa kode, ia akan membuat environment sendiri yang berbeda dengan environment dari server utama.




## 6. Apa itu penetration testing? Jelaskan cara melakukannya! serta sebutkan kekurangan dan kelebihan tools yang dipakai dalam melakukan penetration testing!

## 7. Bagaimana cara menjaga kestabilan code dari fitur yang sudah berjalan sebelumnya dan sudah lulus QA terhadap perubahan code / development dari fitur lainnya?

Untuk menjaga kestabilan code dari fitur yang sudah berjalan dan sudah lulus QA terhadap perubahan code atau development dari fitur lainnya, dapat menerapkan beberapa praktik dan strategi pengembangan perangkat lunak. Berikut adalah beberapa cara yang dapat membantu:

1. Uji Otomatis (Automated Testing):

 - Jalankan uji otomatis secara reguler setiap kali ada perubahan dalam kode atau fitur lainnya. Hal ini akan membantu mendeteksi dampak perubahan pada fitur yang sudah ada.

2. continuous integration:

- Terapkan integrasi continuous (CI) untuk memastikan bahwa setiap perubahan kode diintegrasikan ke dalam repositori utama secara otomatis.
- gunakan tools seperti Github atau GitLab CI untuk menjalankan rangkaian uji otomatis setiap kali ada perubahan kode.

3. Branching :
- Gunakan branching,untuk memastikan bahwa setiap fitur atau perubahan dikembangkan dalam branch terpisah sebelum diintegrasikan ke dalam branch utama.

4. Code Review:
- Lakukan code review secara teratur. Melibatkan anggota tim dalam proses code review dapat membantu mendeteksi masalah potensial sebelum kode diintegrasikan ke dalam branch utama.

5. Error Handling:
-Pastikan bahwa fitur yang sudah ada memiliki error handling yang baik. Kode harus dapat mengatasi semua kondisi dan memberikan respon yang jelas jika terjadi kesalahan.

6. Documentation: 
- Update dokumentasi setiap kali ada perubahan pada fitur yang sudah ada. Dokumentasi yang baik membantu tim untuk berinteraksi dengan kode yang sudah ada.


## 8. Sebutkan fitur dan design pattern yang pernah digunakan pada framework Laravel!

1. MVC Pattern
  - MVC kepanjangannya adalah model-view controller yang merupakan pola desain arsitektur website dan terbagi menjadi tiga sesuai namanya, yakni model, view, dan controller.

  - **Model**,  Bagian yang bertugas untuk menyiapkan, mengatur, memanipulasi, dan mengorganisasikan data yang ada di database.

  - **View**, Bagian yang bertugas untuk menampilkan informasi dalam bentuk Graphical User Interface (GUI).

  - **Controller**, Bagian yang bertugas untuk menghubungkan serta mengatur model dan view agar dapat saling terhubung.

2. Eloquent ORM

 - Eloquent adalah sistem ORM (Object-Relational Mapping) yang terintegrasi dengan Laravel. Fitur ini memungkinkan programer untuk berinteraksi dengan basis data menggunakan objek dan model.

3. Routing   
- semua request dari user/client dipetakan dengan bantuan rute. Dasar dari routing adalah merutekan request dari pengguna ke kontroler terkait. Routing ini dapat meningkatkan performanya dan mempermudah proses develop website. 

4. Modularity
-  laravel memiliki kumpulan modul terpisah yang bisa Anda gunakan untuk mengoptimalkan proses pengembangan perangkat lunak. 
- modularity juga berguna jika Anda ingin mengembangkan website dengan skala besar. Proses pengembangannya akan menjadi lebih mudah.

## 9. Bagaimana cara optimalisasi PostgreSQL agar query dapat lebih cepat tereksekusi?
1. **gunakan index**
  - index adalah sebuah struktur data yang berisi kumpulan keys beserta referensinya ke actual data di table. Tujuannya untuk mempercepat proses penentuan lokasi data tanpa melakukan pencarian secara penuh ke seluruh data (full scan).
  - Penggunaan indeks memperbaiki kinerja dengan membuat pencarian data lebih optimal, lebih cepat, dan mengurangi beban sumber daya CPU yang digunakan.

2. **clustered indexes**
  - Clustered indexes menyusun data berdasarkan urutan nilai aktual dalam kolom, sehingga mengurangi waktu pencarian karena data telah diurutkan. Namun, gunakan dengan bijak karena cocok untuk kolom dengan nilai berurutan dan tanpa nilai yang berulang.

3. **non-clustered indexes**
  - Non-clustered indexes lebih fleksibel karena menciptakan dua kolom terpisah, satu untuk indeks dan yang lain untuk menunjuk pada value. Ini berguna untuk tabel pemetaan atau glossary.

4. **full-text indexes**
  - Full-text indexes digunakan pada kolom dengan teks panjang, seperti artikel atau isi email. Index ini menyimpan posisi dari istilah-istilah yang ditemukan dalam kolom yang diindeks, memudahkan pencarian.

5. **gunakan EXPLAIN untuk memahami rencana eksekusi query**
- Secara teratur gunakan perintah EXPLAIN untuk menganalisis rencana eksekusi query. Ini membantu Anda memahami cara database merencanakan untuk mengeksekusi query, memungkinkan identifikasi masalah dan peluang optimalisasi.

6. **monitor performa secara berkala**
- Gunakan alat pemantauan performa seperti percona (pmm)untuk melacak kinerja database secara berkala.












