<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if (str_word_count($value) < 2) {
                    $fail('The '.$attribute.' must contain at least first name and last name.');
                }
            }],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'array'],
            'user_type.*' => ['in:student,instructor'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (in_array('student', $request->user_type)) {
            // Parse full name into first, middle, last names
            $nameParts = explode(' ', $request->name);
            if (count($nameParts) == 1) {
                $firstName = $nameParts[0];
                $lastName = '';
                $middleName = null;
            } else {
                $firstName = $nameParts[0];
                $lastName = $nameParts[count($nameParts) - 1];
                $middleName = count($nameParts) > 2 ? implode(' ', array_slice($nameParts, 1, -1)) : null;
            }

            \App\Models\Student::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'middle_name' => $middleName,
                'email' => $request->email,
                // Add other student-specific fields if needed
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
