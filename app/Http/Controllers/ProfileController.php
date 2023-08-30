<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\user_account;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        // finding and storing the user information by fetching from the database
        $query = user_account::find(session('id'));

        // returning to the view page with the user information
        return view('profile-setting', [
            // key => value
            'user' => $query,
        ]);
    }

    public function changePassword(Request $request) {
        $query = user_account::where('id', session('id'))->where('password', $request->oldPassword)->first();

        if ($query) {
            if ($request->newPassword == $request->confirmPassword) {

                $query->password=$request->newPassword;

                $query->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Password Changed Successfully',
                    'redirect' => 'profile'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Enter the Same Password on the New Password and Confirm Password Field',
                    'redirect' => '#'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Password does not Match',
                'redirect' => '#'
            ]);
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {

        $userdb = user_account::find(session('id'));

         // Validate contact number length
        if (strlen($request->number) != 10) {
            return response()->json([
                'status' => false,
                'message' => 'Contact number must be at least 10 digits',
                'redirect' => 'profile'
            ]);
        }



        // dd($request->number);

        $userdb->fname = $request->fname;
        $userdb->lname = $request->lname;
        $userdb->Contact_Number = $request->number;
        $userdb->address = $request->address;
        $userdb->email = $request->email;
        // $userdb->company = $request->company;

             // Validate password length

        $userdb->save();


        return response()->json([
            'status' => true,
            'message' => 'Details Changed Successfully',
            'redirect' => 'profile'
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function deleteAccount(Request $request) // : RedirectResponse  // <---- (:) Extends
    {
        $query = user_account::find(session('id'));

        if ($query->password == $request->password) {
            session()->forget('id');
            session()->forget('userType');

            $query->delete();

            // return redirect('/'); // <-- Bugged Code

            //     \/Below\/     is the Solved bug for the   /\above/\    commented code
            return response()->json([
                'status' => true,
                'message' => 'Account Deleted Successfully',
                'redirect' => '/'

            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Password Does not Match',
                'redirect' => '#'

            ]);
        }
    }
}
