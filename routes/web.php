use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// General Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/users/view/{id}', [AdminController::class, 'show'])->name('admin.users.show');
    Route::delete('/users/{type}/delete/{id}', [AdminController::class, 'destroy'])->name('admin.users.delete');
    Route::get('/manageallpost', [AdminController::class, 'managepost'])->name('admin.postmanage');
});

// User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users1/view/{id}', [UserController::class, 'show'])->name('users1.view');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/post/update/{id}', [UserController::class, 'update'])->name('post.update');
    Route::delete('/user/post/delete/{id}', [UserController::class, 'destroy'])->name('user.post.delete');
});

// Public Post Viewing Route
Route::get('/users/view/{id}', [UserController::class, 'show1'])->name('users.view');

// Search Route
Route::get('/search', [UserController::class, 'search'])->name('home.search');

// Welcome Page Route
Route::get('/', [UserController::class, 'index1'])->name('home');
