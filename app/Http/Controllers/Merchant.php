<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Komen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Merchant as ModelsMerchant;

class Merchant extends Controller
{
    /**
     * Dislay all merchant
     */
    public function index()
    {
       return view("welcome", ["merchants" => ModelsMerchant::paginate(3)]);
    }



    public function show(int $id)
    {
        return view("about_umkm", ["merchant" => ModelsMerchant::findOrFail($id)]);
    }

    // public function give_elixir($)
    public function add_comment(Request $r){
        if(!Auth::check()){
            return back();
        }
        $r->validate([
            "komentar" => "required",
            "merchant" => "required"
        ],[
            "komentar.required" => "isi komentar",
            "merchant.required" => "ada yang aneh"
        ]
        );

        $komen = new Komen();
        $komen->user_id = Auth::user()->id;
        $komen->merchant_id = $r->merchant;
        $komen->komentar = $r->komentar;
        $komen->save();
        $post = User::find(Auth::user()->id);
        $post->elixir = ++$post->elixir;
        $post->save();

        return back()->with("alert", "Selamat anda mendapatkan 1 elixir");

    }
    public function discover()
    {

        return view("discover", ["merchants" => ModelsMerchant::whereOr("name", "like", "%".request("s")."%")->where("desc", "like", "%".request("s")."%")->paginate(3)->withQueryString()]);
    }

    public function rank()
    {
       $users = User::orderBy('elixir', 'desc') // 'desc' untuk urutkan dari terbesar
       ->get();
        return view('rangking',["users" => $users]);
    }
}
