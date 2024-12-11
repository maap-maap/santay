<?php

namespace Database\Seeders;

use App\Models\FotoProduct;
use App\Models\Komen;
use App\Models\Layanan;
use App\Models\Merchant;
use App\Models\Pembeli;
use App\Models\Penjual;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Lucas renanda",
            "email" => "lucas@ganteng.com",
            "password" => Hash::make("1234"),
            "role" => "penjual",
            "desc" => "penjual yang baik dan ramah",
            "elixir" => 0

        ]);
        User::create([
            "name" => "Berlian bima",
            "email" => "bima@ganteng.com",
            "password" => Hash::make("1234"),
            "role" => "pembeli",
            "desc" => "pembeli yang baik dan ramah",
            "elixir" => 9000

        ]);

        
        
        Merchant::create(
            [
                "name" => "Toko pak Masahiko",

                "desc" => "Toko pak Masahiko menyajikan aneka makanan dan minuman tradisional dengan resep turun-temurun. Rasakan kelezatan autentik yang menggugah selera!",
                "foto" => "merchant_pak_masahiko.jpg",
                "elixir" => 500,
                "user_id" => 1
            ]
        );
        
        Komen::create([

            "user_id" =>  1,
            "merchant_id" =>  1,
            "komentar" => "Makanan yang dijual disini memiliki rasa yang pas untuk lidah saya"

        ]);
        Layanan::create(
            [
                "name" => "Antar Makannan",
                "desc" => "Makanan favoritmu, langsung diantar ke rumah.",
                "merchant_id" => 1
            ]
        );
        Layanan::create(
            [
                "name" => "Paket Hemat",
                "desc" => "Nikmati berbagai macam makanan tradisional dengan harga spesial.",
                "merchant_id" => 1
            ]
        );
        DB::table("foto_products")->insert([
            [
                "foto" => "foto_produk1.jpeg",
                "merchant_id" => 1
            ],
            [
                "foto" => "foto_produk2.jpeg",
                "merchant_id" => 1
            ],
            [
                "foto" => "foto_produk3.jpeg",
                "merchant_id" => 1
            ],
            [
                "foto" => "foto_produk4.jpeg",
                "merchant_id" => 1
            ],
        ]);
    }
}
