use Illuminate\Validation\Rules\Password;

protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => [
            'required',
            'string',
            'confirmed', // Vérifie aussi password_confirmation
            Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
        ],
    ]);
}
