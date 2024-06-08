<div class="container" >
    <section>
<h1 class="ltext-109 cl2 p-b-28">
Dokumentasi Program Audio Java</h1>
<h5 class="ltext-80 cl2 p-b-28">
Pendahuluan
</h5>
<p class="stext-117 cl6 p-b-26">
Aplikasi ini adalah aplikasi pemutar musik sederhana yang dibangun menggunakan Java Swing. Tujuan dari aplikasi ini adalah untuk memungkinkan pengguna memainkan dan menghentikan pemutaran file audio dengan mudah. Aplikasi ini memiliki antarmuka pengguna yang minimalis dan intuitif, yang memungkinkan pengguna untuk memulai atau menghentikan pemutaran musik dengan mengeklik tombol "Play".

</p>

<h5 class="ltext-80 cl2 p-b-28">
Pendahuluan
</h5>
<p class="stext-117 cl6 p-b-26">
1. Dependencies: Aplikasi ini memanfaatkan pustaka Java Swing untuk membangun antarmuka pengguna grafis (GUI) dan pustaka Java Sound untuk memainkan file audio.
</p>
<p class="stext-117 cl6 p-b-26">
2. Struktur Proyek: Proyek ini terdiri dari satu kelas utama yang disebut music.java. File audio yang akan diputar harus diletakkan di lokasi yang sesuai dan diakses melalui kode.
</p>
<h5>Penjelasan Singkat Kode</h5>
<p class="stext-117 cl6 p-b-26">
    <li class="stext-117 cl6 p-b-26">Kode ini mendefinisikan sebuah kelas Java yang merupakan aplikasi GUI menggunakan Java Swing.
</li>
<li class="stext-117 cl6 p-b-26">
Saat tombol "Play" diklik, aplikasi memulai atau menghentikan pemutaran audio, dan mengubah teks tombol sesuai dengan status pemutaran.

</li>
<li class="stext-117 cl6 p-b-26">
Metode playAudio() digunakan untuk memulai pemutaran audio dari file yang ditentukan.

</li>
<li class="stext-117 cl6 p-b-26">
 Metode stopAudio() digunakan untuk menghentikan pemutaran audio jika sedang berlangsung.

</li>
<li class="stext-117 cl6 p-b-26">
Metode main() digunakan untuk memulai aplikasi, yang membuat objek music dan menampilkannya.

</li >
</p>
<h5 class="ltext-109 cl2 p-b-28">
Code :
</h5>
<pre><code class="java">// Import paket-paket yang diperlukan
package av;
import java.awt.Color;
import java.io.*;
import javax.sound.sampled.AudioInputStream;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Clip;

// Deklarasi kelas utama
public class music extends javax.swing.JFrame {

    // Variabel untuk pemutaran audio
    private Clip clip;
    private boolean isPlaying = false;

    // Konstruktor kelas
    public music() {
        initComponents(); // Menginisialisasi komponen GUI
    }

    // Metode untuk menginisialisasi komponen GUI
    @SuppressWarnings("unchecked")
    private void initComponents() {
        // Inisialisasi komponen GUI seperti label, gambar, dan tombol
        // (kode dihasilkan otomatis oleh NetBeans IDE)
    }

    // Metode yang dipanggil saat tombol "Play" diklik
    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {
        if (!isPlaying) {
            playAudio(); // Memulai pemutaran audio
            jButton1.setText("Stop"); // Mengubah teks tombol menjadi "Stop"
        } else {
            stopAudio(); // Menghentikan pemutaran audio
            jButton1.setText("Play"); // Mengubah teks tombol menjadi "Play"
        }
        isPlaying = !isPlaying; // Memperbarui status pemutaran audio
    }

    // Metode untuk memulai pemutaran audio
    private void playAudio() {
        try {
            // Memuat file audio dari lokasi yang ditentukan
            AudioInputStream audioInputStream = AudioSystem.getAudioInputStream(new File("D:\\jeketi.WAV"));
            clip = AudioSystem.getClip(); // Mendapatkan objek Clip
            clip.open(audioInputStream); // Membuka file audio
            clip.start(); // Memulai pemutaran audio
        } catch (Exception e) {
            e.printStackTrace(); // Menangani pengecualian jika ada kesalahan
        }
        this.getContentPane().setBackground(Color.PINK); // Mengubah warna latar belakang GUI
    }

    // Metode untuk menghentikan pemutaran audio
    private void stopAudio() {
        if (clip != null && clip.isRunning()) {
            clip.stop(); // Menghentikan pemutaran audio jika sedang berjalan
            this.getContentPane().setBackground(Color.WHITE); // Mengembalikan warna latar belakang GUI ke putih
        }
    }

    // Metode utama, memulai aplikasi
    public static void main(String args[]) {
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new music().setVisible(true); // Membuat objek aplikasi dan menampilkannya
            }
        });
    }

    // Variabel deklarasi komponen GUI (dihasilkan otomatis oleh NetBeans IDE)
    private javax.swing.JButton jButton1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
}
</code></pre>
<h5 class="ltext-109 cl2 p-b-28">
Gambar :
</h5>
<h5 class="ltext-80 cl2 p-b-28">
Design
</h5>
							<img src="<?=base_url('assets/design.png')?>" alt="IMG-BLOG" class="img-fluid"style="width: 1920;
  height: 1080;
  object-fit: scale-down;">

		
                        <h5 class="ltext-80 cl2 p-b-28" style="margin-top:5%;"> 
Hasil
</h5>
							<img src="<?=base_url('assets/hasil1.png')?>" class="img-fluid" alt="IMG-BLOG">
							<img src="<?=base_url('assets/hasil2.png')?>" class="img-fluid" alt="IMG-BLOG">

		
</section>
</div>
