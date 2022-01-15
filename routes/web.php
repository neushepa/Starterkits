<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Start of the Public Routes

Route::get('/', [FrontendController::class, 'index']);
Route::get('/', [FrontendController::class, 'showslider']);
Route::get('/about', [FrontendController::class, 'showAbout']);
Route::get('/gallery', FrontendController::class . '@showgallery')->name('gallery.show');

Route::get('/blog', BlogController::class . '@index')->name('blog.index');
Route::get('/blog/{slug}', BlogController::class . '@show');
Route::get('/blog/{id}', BlogController::class . '@showcat');
Route::get('/cat/{id}', [PostController::class, 'showcat']);
Route::get('/user/{id}', [PostController::class, 'showpost']);

Route::get('/profile/show/{id}', [UserController::class, 'show'])->name('profile.show');

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\SocialiteController@handleProvideCallback');

Route::get('/home', function () {
    if (Auth::user()->role == 'admin') {
        return redirect('/admin/dashboard');
    } elseif (Auth::user()->role == 'member') {
        return redirect('/member/dashboard');
    } else {
        return redirect('/');
    }
})->name('home');

// Start of the Admin Routes
// Start of the Admin and Member Routes

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('todo')->group(function () {
            Route::get('/', [TodoController::class, 'index'])->name('todo.index');
            Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
            Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
            Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
            Route::get('/show/{id}', [TodoController::class, 'show'])->name('todo.show');
            Route::put('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
            Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
            Route::get('/status/{id}', [TodoController::class, 'status'])->name('todo.status');
        });
    });
});

// End of the Admin and Member Routes

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/changePassword', [App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword', [App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
    Route::prefix('admin')->group(function () {
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('post.index');
            Route::get('/create', [PostController::class, 'create'])->name('post.create');
            Route::post('/store', [PostController::class, 'store'])->name('post.store');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
            Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
            Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
            Route::get('/status/{id}', [PostController::class, 'status'])->name('post.status');
        });
        Route::prefix('comment')->group(function () {
            Route::get('/', [CommentsController::class, 'index'])->name('comments.index');
            Route::get('/edit/{id}', [CommentsController::class, 'edit'])->name('comments.edit');
            Route::put('/update/{id}', [CommentsController::class, 'update'])->name('comments.update');
            Route::delete('/delete/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');
            Route::get('/status/{id}', [CommentsController::class, 'status'])->name('comment.status');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        });
        Route::prefix('gallery')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
            Route::get('/create', [GalleryController::class, 'create'])->name('gallery.create');
            Route::post('/store', [GalleryController::class, 'store'])->name('gallery.store');
            Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
            Route::put('/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
            Route::delete('/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        });
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('profile.update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
            Route::get('/resetpass/{id}', [UserController::class, 'resetpass'])->name('user.resetpass');
            Route::get('/changerole/{id}', [UserController::class, 'changerole'])->name('user.changerole');
            Route::put('/updaterole/{id}', [UserController::class, 'updaterole'])->name('user.updaterole');
        });
        // Route::prefix('todo')->group(function () {
        //     Route::get('/', [TodoController::class, 'index'])->name('todo.index');
        //     Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
        //     Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
        //     Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
        //     Route::get('/show/{id}', [TodoController::class, 'show'])->name('todo.show');
        //     Route::put('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
        //     Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
        //     Route::get('/status/{id}', [TodoController::class, 'status'])->name('todo.status');
        // });

        Route::prefix('album')->group(function () {
            Route::get('/', [AlbumController::class, 'index'])->name('album.index');
            Route::get('/create', [AlbumController::class, 'create'])->name('album.create');
            Route::post('/store', [AlbumController::class, 'store'])->name('album.store');
            Route::get('/edit/{id}', [AlbumController::class, 'edit'])->name('album.edit');
            Route::put('/update/{id}', [AlbumController::class, 'update'])->name('album.update');
            Route::delete('/delete/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');
        });

        Route::prefix('about')->group(function () {
            Route::get('/credit', [AboutController::class, 'showCredit'])->name('about.credit');
            Route::get('/support', [AboutController::class, 'showSupport'])->name('about.support');
        });

        Route::prefix('settings')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('setting.index');
        });
    });
});

// End of the Admin Routes

// ---------------------------------------------------------------------------------------------------

// Start of the Member Routes
Route::group(['middleware' => 'member'], function () {
    Route::get('member/dashboard', [HomeController::class, 'index'])->name('member.dashboard');
    Route::prefix('member')->group(function () {
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('post.index');
            Route::get('/create', [PostController::class, 'create'])->name('post.create');
            Route::post('/store', [PostController::class, 'store'])->name('post.store');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
            Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
        });

        // Route::prefix('todo')->group(function () {
        //     Route::get('/', [TodoController::class, 'index'])->name('todo.index');
        //     Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
        //     Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
        //     Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
        //     Route::get('/show/{id}', [TodoController::class, 'show'])->name('todo.show');
        //     Route::put('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
        //     Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
        //     Route::get('/status/{id}', [TodoController::class, 'status'])->name('todo.status');
        // });

        Route::prefix('about')->group(function () {
            Route::get('/credit', [AboutController::class, 'showCredit'])->name('about.credit');
            Route::get('/support', [AboutController::class, 'showSupport'])->name('about.support');
        });
    });
});

// End of the Member Routes
