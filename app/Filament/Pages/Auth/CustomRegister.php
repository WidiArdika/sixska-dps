<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Pages\Auth\Register;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\ComponentException;

class CustomRegister extends Register
{
    /**
     * Override form field bawaan untuk menambahkan kode akses.
     */
    public function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),

                        // Tambahkan input untuk kode akses
                        TextInput::make('access_code')
                            ->label('Kode Akses')
                            ->required(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    /**
     * Validasi kode akses & simpan user baru.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function handleRegistration(array $data): Model
    {
        // Ganti kode akses di sini, atau gunakan .env seperti di bawah
        $kodeAksesValid = env('SEKOLAH2025');

        if ($data['access_code'] !== $kodeAksesValid) {
            throw ValidationException::withMessages([
                'data.access_code' => 'Kode akses salah.',
            ]);
        }

        return static::getUserModel()::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // Sudah di-hash otomatis oleh form component
        ]);
    }
}
