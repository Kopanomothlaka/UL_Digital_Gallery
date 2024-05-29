<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordManager extends Controller
{
    public function forgetPassword()
    {
        return view("forget-password");
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
        ]);

        $existingToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        $token = $existingToken ? $existingToken->token : Str::random(64);

        if ($existingToken) {
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }

        Mail::send("emails.forget-password", ["token" => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route("forget.password"))->with("success", "We have sent an email with a link to reset your password.");
    }

    public function resetPassword($token)
    {
        return view("new-password", compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:6|confirmed",
            "password_confirmation" => "required"
        ]);

        $validToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$validToken) {
            return redirect()->to(route("reset.password"))->with("error", "Invalid token.");
        }

        User::where("email", $request->email)->update([
            "password" => Hash::make($request->password)
        ]);

        DB::table("password_reset_tokens")->where(['email' => $request->email])->delete();

        return redirect()->to(route("log"))->with("success", "Password reset successfully.");
    }
}
