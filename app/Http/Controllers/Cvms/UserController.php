<?php

namespace App\Http\Controllers\Cvms;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('cvms.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('cvms.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $v = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            Rule::unique('users')->ignore($user->email),
            'image' => 'sometimes|file|image|max:5000',
            'new_password' =>
            'nullable|different:current_password|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Only validate if a new password is provided
        if (isset($v['new_password'])) {
            if ($request->current_password && Hash::check(
                $request->current_password,
                $user->getAuthPassword()
            )) {

                // Encrypt and append the new password to data
                $data['password'] = Hash::make($request->new_password);
            } else {
                $error = ValidationException::withMessages([
                    'incorrect_password' => [
                        'The entered password does not match your current password.'
                    ],
                ]);

                throw $error;
            }
        }

        if ($request->has('image')) {

            // Unlink the old image from storage
            if (Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // Append to data so we don't have to query twice
            $data['image'] = $request->image->store(
                'uploads/cvms',
                'public'
            );
        }

        $user->update($data);

        return redirect(route('users.show', $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        // Ensure we're deleting the user's own account
        if ($user->id == auth()->id()) {

            // Unlink the user's image from storage
            if (Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            $user->delete();

            return redirect('/');
        }

        return back();
    }
}