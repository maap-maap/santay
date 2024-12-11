<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Merchant;
use App\Models\FotoProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserAuth extends Controller
{
    public function hal_signup_pembeli()
    {
        return view("signupcustomer");
    }
    // handle sign up seller
    public function store_seller(Request $r)
    {
        // username
        // email
        // password
        // bio_penjual
        // name_merchant
        // desc_merchant
        // layanan[0-9999999]
        // bg_merchant
        // fotos_produk
        // step 1 get all layanan


        $r->validate([
            "username" => "required|min:5",
            "email" => "required|unique:users",
            "password" => "required",
            "bio_penjual" => "required",
            "name_merchant" => "required|unique:merchants,name",
            "desc_merchant" => "required",
            "bg_merchant" => "required|file|mimes:jpg,jpeg,png,svg",
            "fotos_produk" => "required",
        ], [
            "username.required" => "username tidak boleh kosong",
            "email.required" => "e-Mail tidak boleh kosong",
            "email.unique" => "e-Mail sudah terdaftar",
            "password.required" => "password tidak boleh kosong",
            "bio_penjual.required" => "mohon tulis deskripsi tentang anda",
            "name_merchant.required" => "nama merchant tidak boleh kosong",
            "desc_merchant.required" => "deskripsi merchant tidak boleh kosong",
            "bg_merchant.required" => "upload foto merchant anda",
        ]);
        $layanans = [];
        foreach ($r->all() as $key => $item) {
            if (str_starts_with($key, "layanan-")) {
                if ($item != null) {
                    $layanans[] = $item;
                }
            }
        }
        $penjual_id = DB::table("users")->insertGetId([
            "name" => $r->username,
            "email" => $r->email,
            "role" => "penjual",
            "desc"  => $r->bio_penjual,
            "password"  => Hash::make($r->password),
            "elixir"  => 0
        ]);
        // tambahkan merchant dulu
        $path = $r->file("bg_merchant")->store('images/merchant/', 'public');
        $merch = new Merchant();
        $merch->name = $r->name_merchant;
        $merch->desc = $r->desc_merchant;
        $merch->user_id = $penjual_id;
        $merch->foto = File::name($path) . '.' . File::extension($path);
        $merch->elixir = random_int(500, 1000);
        $merch->save();



        foreach ($layanans as $item) {
            $lyan = new Layanan();
            $lyan->name = $item;
            $lyan->desc = null;
            $lyan->merchant_id = $merch->id;
            $lyan->save();
        }
        foreach($r->file("fotos_produk") as $fproduk){
            $p = $fproduk->store("images/product/", "public");
            $foto_product = new FotoProduct();
            $foto_product->foto = File::name($p) . '.'. File::extension($p);
            $foto_product->merchant_id = $merch->id;
            $foto_product->save();
        }


        $seller = User::findOrFail($penjual_id)->first();
        Auth::login($seller);
        return redirect()->route("merchant.index");
    }

    public function signin_seller(Request $r){
        $r->validate([
            "email" => "required",
            "password" => "required"
        ],[
            "email.required" => "e-Mail harus diisi",
            "password.required" => "Password harus disi"

        ]);

        $user = User::where("email", $r->email)->first();
        if(!$user){
            return back()->withErrors(["not_valid" => "e-mail atau password tidak valid!"]);
        }
        if(!Auth::check() && Hash::check($r->password, $user->password)){
            Auth::login($user);
            return redirect()->route("merchant.index");
        }
        return back()->withErrors(["not_valid" => "e-mail atau password tidak valid!"]);
    }
    public function store_customer(Request $r){
        $r->validate([
            "username" => "required|min:8",
            "email" => "required|unique:users",
            "password" => "required|min:6",
            "bio_pembeli" => "required"
        ],[
            "username.required" => "username tidak boleh kosong",
            "email.required" => "e-Mail tidak boleh kosong",
            "email.unique" => "e-Mail sudah terdaftar",
            "username.min" => "username minimal 8 karakter",
            "password.required" => "password tidak boleh kosong",
            "bio_penjual.required" => "password tidak boleh kosong",
        ]);
        $user = new User();
        $user->name = $r->username;
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->role = "pembeli";
        $user->desc = $r->bio_pembeli;
        $user->elixir = 0;
        $user->save();

        Auth::login($user);
        return redirect()->route('merchant.index');
    }
}
