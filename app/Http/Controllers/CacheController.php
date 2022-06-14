<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function index()
    {
        $page = request()->get('page', 1);
        $users = Cache::remember('users-' . $page, 100, function () {
            return User::where('name', 'ilike', '%' . 'j' . '%')->paginate(20);
        });

        return view('cache', compact('users'));
    }
}