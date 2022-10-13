<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserImageController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\CompanyProfileController;


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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/submenu/{id}', [HomeController::class, 'submenu'])->name('submenu');
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/product-detail/{id}', [HomeController::class, 'productDetail'])->name('productDetail');
// serarch route
Route::get('/get_suggestions/{k}', [HomeController::class, 'getSearchSuggestions']);
Route::get('/search', [HomeController::class, 'productSearch'])->name('search');
// login
Route::get('admin', [AuthenticationController::class, 'login'])->name('login');
Route::post('admin', [AuthenticationController::class, 'AuthCheck'])->name('login.check');

Route::group(['middleware' => ['auth']] , function(){
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // logout
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::put('/admin', [AuthenticationController::class, 'passwordUpdate'])->name('password.change');
    // company profile 
    Route::get('company-profile', [CompanyProfileController::class, 'edit'])->name('company.edit');
    Route::put('company-profile/{company}', [CompanyProfileController::class, 'update'])->name('company.update');

    // Create user
    Route::get('/registration', [RegistrationController::class, 'index'])->name('register.create');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('register.store');

    Route::get('/settings', [RegistrationController::class, 'settings'])->name('settings');
    Route::put('/registration', [RegistrationController::class, 'profileUpdate'])->name('register.update');

    // Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    // Subcategory Routes
    Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories');
    Route::post('/subcategory/store', [SubcategoryController::class, 'store'])->name('admin.subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'edit'])->name('admin.subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubcategoryController::class, 'update'])->name('admin.subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])->name('admin.subcategory.delete');

    // Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    Route::get('/product/subcategory/get/{subcat_id}', [ProductController::class, 'getSubCate'])->name('admin.product.get.subcat');

    Route::get('/user-image', [UserImageController::class, 'index'])->name('user-image.index');
    Route::post('/user-store', [UserImageController::class, 'store'])->name('user-image.store');
    
   
   
});