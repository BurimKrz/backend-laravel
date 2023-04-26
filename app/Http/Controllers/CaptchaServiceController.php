<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class CaptchaServiceController extends Controller
// {
//     public function index()
//     {
//         return view('index');
//     }
//     public function capthcaFormValidate(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'surname' => 'required',
//             'email' => 'required|email',
//             'password' => 'required',
//             'phone_number' => 'required',
//             'country' => 'required',
//             'gender' => 'required',
//             'agreement' => 'required|boolean',
//             'g-recaptcha-response' => 'required|captcha'
//         ]);
//     }
//     public function reloadCaptcha()
//     {
//         return response()->json(['captcha'=> captcha_img()]);
//     }
// }
