<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bukus')->insert([
            'image' => 'kocick.jpg',
            'title' => 'Cara Membesarkan Otak Agar Supabase Menjadi Linear Algebra',
            'slug' => 'cara_membesarkan_otak_agar_supabase_menjadi_linear_algebra',
            'deskripsi' => 'Bersiwak bagus untuk membersihkan gigi',
            'isbn' => '6969696969',
            'page_count' => 123,
            'language' => 'Indonesia',
            'average_rating' => 0.0,
            'ratings_count' => 69699,
            'published_date' => now(),
            'tipe' => 'E-Book',
            'status_ketersediaan' => 1,
            'reserve_date' => now(),
            'due_date' => now(),

            'penerbit_id' => 1,
        ]);
    }
}
