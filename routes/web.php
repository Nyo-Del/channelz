<?php

use App\Models\Movie;
use App\Models\statu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use PHPUnit\Framework\Constraint\Count;
use App\Http\Controllers\ProfileController;



    Route::get('/', function () {
        return redirect('/UserHome');
    });


    Route::get('/UserHome/{id?}', function (Request $request, $id = null) {
        $query = $request->input('search');

        $movies = Movie::query();

        if ($id === null) {
            $movies->orderBy('created_at', 'desc');
        } elseif ($id == 0) {
            $movies->orderBy('view_count', 'desc');
        } else {
            $movies->where('Cid', $id)->orderBy('created_at', 'desc');
        }

        if ($query) {
            $movies->where(function ($q) use ($query) {
                $q->whereRaw('LOWER(Mname) LIKE ?', ['%' . strtolower($query) . '%'])
                  ->orWhereRaw('LOWER(year) LIKE ?', ['%' . strtolower($query) . '%'])
                  ->orWhereRaw('LOWER(Mos) LIKE ?', ['%' . strtolower($query) . '%']);
            });
        }

        return view('welcome', ['movies' => $movies->paginate(8)]);
    })->name('userhome');







    Route::get('/Admindashboard', function (Request $request) {

        $query = $request->input('search');
        $movies = Movie::when($query, function ($q) use ($query) {
             return $q->where('Mname', 'like', '%' . $query . '%')
                            ->orWhere('year', 'like', '%' . $query . '%')
                            ->orWhere('Mos', 'like', '%' . $query . '%');
        })->orderBy('created_at', 'desc')->paginate(8);
        return view('adminhome',compact('movies'));

    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

