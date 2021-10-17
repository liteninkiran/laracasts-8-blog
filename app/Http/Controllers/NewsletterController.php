<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;
use Exception;

class NewsletterController extends Controller {

    public function __invoke(Newsletter $newsletter) {
        request()->validate(['email' => ['required', 'email']]);
        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            return redirect('/#newsletter')->with('failure', 'Could not add email');
        }
    
        return redirect('/')->with('success', 'You are now signed up to the Newsletter');
    }
}
