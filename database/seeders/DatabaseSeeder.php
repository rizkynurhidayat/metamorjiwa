<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hero;
use App\Models\Testimoni;
use App\Models\Sample;
use App\Models\Cta;
use App\Models\SocialMedia;
use App\Models\Preview;
use App\Models\Contact;
use App\Models\Tentang;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        // Hero
        Hero::create([
            'heading' => 'Selamat Datang di Metamorjiwa',
            'deskripsi' => 'Kami hadir untuk membantu Anda menemukan ketenangan batin dan kesehatan mental yang lebih baik. Bersama kami, mulailah perjalanan transformasi jiwa Anda.',
            'button_text' => 'Mulai Sekarang',
            'image' => 'hero-default.jpg',
        ]);

      

        // Testimoni
        $testimonis = [
            [
                'title' => 'Testimoni Klien',
                'heading' => 'Apa Kata Mereka',
                'sub_heading' => 'Pengalaman nyata dari klien kami',
                'name' => 'Andi Pratama',
                'profile' => 'Mahasiswa',
                'rating' => 5,
                'image' => 'testimoni-1.jpg',
            ],
            [
                'title' => 'Testimoni Klien',
                'heading' => 'Sangat Membantu',
                'sub_heading' => 'Konseling yang profesional dan nyaman',
                'name' => 'Siti Nurhaliza',
                'profile' => 'Karyawan Swasta',
                'rating' => 5,
                'image' => 'testimoni-2.jpg',
            ],
            [
                'title' => 'Testimoni Klien',
                'heading' => 'Pengalaman Terbaik',
                'sub_heading' => 'Saya merasa jauh lebih baik setelah sesi konseling',
                'name' => 'Budi Santoso',
                'profile' => 'Wiraswasta',
                'rating' => 4,
                'image' => 'testimoni-3.jpg',
            ],
        ];
        foreach ($testimonis as $testimoni) {
            Testimoni::create($testimoni);
        }

        // Sample
        $samples = [
            ['name' => 'Konsultasi Gratis', 'email' => 'konsultasi@metamorjiwa.com', 'button_text' => 'Daftar Sekarang'],
            ['name' => 'Sesi Terapi', 'email' => 'terapi@metamorjiwa.com', 'button_text' => 'Jadwalkan'],
            ['name' => 'Workshop Mental Health', 'email' => 'workshop@metamorjiwa.com', 'button_text' => 'Ikuti Workshop'],
        ];
        foreach ($samples as $sample) {
            Sample::create($sample);
        }

        // CTA
        Cta::create([
            'heading' => 'Siap Memulai Perjalanan Anda?',
            'sub_heading' => 'Hubungi kami sekarang untuk konsultasi pertama Anda secara gratis.',
            'button_text' => 'Hubungi Kami',
            'whatsapp' => '6281234567890',
        ]);

        // Social Media
        SocialMedia::create([
            'instagram' => 'https://instagram.com/metamor.jiwa',
            'twitter' => 'https://twitter.com/metamorjiwa',
            'facebook' => 'https://facebook.com/metamorjiwa',
        ]);

        // Preview
        $previews = [
            ['tagline' => 'Monthly Habit Tracker', 'image' => 'monthly habit tracker.png'],
            ['tagline' => 'Refleksi Diri', 'image' => 'refleksi diri.png'],
            ['tagline' => 'Weekly Planner', 'image' => 'weekly palnner.png'],
        ];
        foreach ($previews as $preview) {
            Preview::create($preview);
        }

        // Contact
        Contact::create([
            'title' => 'Hubungi Kami',
            'tagline' => 'Kami siap membantu Anda kapan saja',
            'tagline1' => 'Jangan ragu untuk menghubungi kami melalui formulir di bawah ini',
            'contact' => 'info@metamorjiwa.com',
        ]);

        // Tentang
        Tentang::create([
            'heading' => 'Tentang Metamorjiwa',
            'sub_heading' => 'Mengenal Lebih Dekat Tentang Kami',
            'deskripsi' => 'Metamorjiwa adalah platform konseling dan kesehatan mental yang berdedikasi untuk membantu setiap individu menemukan keseimbangan hidup. kami memberikan layanan terbaik untuk mendukung perjalanan transformasi jiwa Anda.',
        ]);

        // Message
        $messages = [
            ['name' => 'Dewi Anggraini', 'email' => 'dewi@example.com', 'read' => false],
            ['name' => 'Raka Mahendra', 'email' => 'raka@example.com', 'read' => true],
            ['name' => 'Putri Wulandari', 'email' => 'putri@example.com', 'read' => false],
            ['name' => 'Ahmad Fadillah', 'email' => 'ahmad@example.com', 'read' => false],
            ['name' => 'Maya Sari', 'email' => 'maya@example.com', 'read' => true],
        ];
        foreach ($messages as $message) {
            Message::create($message);
        }
    }
}
