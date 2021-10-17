<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;
use Illuminate\Validation\ValidationException;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::delete('posts/{post:slug}/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('newsletter', function() {
    request()->validate(['email' => ['required', 'email']]);
    $mailchimp = new \MailchimpMarketing\ApiClient();
    
    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us5',
    ]);
    
    $listId = 'b9df78ea6e';

    // $response = $mailchimp->lists->getAllLists();
    // $response = $mailchimp->lists->getList($listId);
    // $response = $mailchimp->lists->getListMembersInfo($listId);

    try {
        $response = $mailchimp->lists->addListMember($listId, [
            'email_address' => request('email'),
            'status' => 'subscribed',
        ]);
    } catch (\Exception $e) {
        return redirect('/#newsletter')->with('failure', 'Could not add email');
    }

    return redirect('/')->with('success', 'You are now signed up to the Newsletter');
});
