<section>
    <style>
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-15px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-group {
            animation: slideInLeft 0.5s ease-out forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }

        .modern-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1rem;
            background-color: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .modern-input:focus {
            outline: none;
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .modern-input::placeholder {
            color: #9ca3af;
        }

        .dark .modern-input {
            background-color: #1f2937;
            border-color: #374151;
            color: #f3f4f6;
        }

        .dark .modern-input:focus {
            border-color: #60a5fa;
            background-color: #111827;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 0.875rem;
            color: #1f2937;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .dark .form-label {
            color: #e5e7eb;
        }

        .button-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1.5rem;
            animation: slideInLeft 0.5s ease-out 0.5s forwards;
            opacity: 0;
        }

        .modern-btn {
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            font-size: 0.875rem;
        }

        .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .modern-btn:active {
            transform: translateY(0);
        }

        .success-message {
            animation: slideInLeft 0.5s ease-out forwards;
            padding: 0.75rem 1rem;
            background-color: #d1fae5;
            color: #065f46;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .dark .success-message {
            background-color: #064e3b;
            color: #d1fae5;
        }

        .error-message {
            padding: 0.5rem 0;
            color: #dc2626;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .dark .error-message {
            color: #fca5a5;
        }

        .verification-section {
            padding: 1rem;
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            border-radius: 0.5rem;
            margin-top: 1rem;
        }

        .dark .verification-section {
            background-color: #78350f;
            border-left-color: #d97706;
        }

        .verification-section p {
            color: #92400e;
            font-size: 0.875rem;
            margin: 0;
        }

        .dark .verification-section p {
            color: #fcd34d;
        }

        .verification-link {
            color: #d97706;
            text-decoration: underline;
            cursor: pointer;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .verification-link:hover {
            color: #b45309;
        }

        .dark .verification-link:hover {
            color: #fbbf24;
        }
    </style>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Nama -->
        <div class="form-group">
            <label for="name" class="form-label">{{ __('Nama Lengkap') }}</label>
            <input id="name" name="name" type="text" class="modern-input" value="{{ old('name', $user->name) }}" required autofocus />
            @if ($errors->has('name'))
                <div class="error-message">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('Alamat Email') }}</label>
            <input id="email" name="email" type="email" class="modern-input" value="{{ old('email', $user->email) }}" required />
            @if ($errors->has('email'))
                <div class="error-message">{{ $errors->first('email') }}</div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="verification-section">
                    <p class="mb-2">{{ __('Email Anda belum diverifikasi.') }}</p>
                    <button form="send-verification" class="verification-link">
                        {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-green-600 dark:text-green-400 font-semibold">
                            {{ __('Email verifikasi telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Button Group -->
        <div class="button-group">
            <button type="submit" class="modern-btn">{{ __('Simpan Perubahan') }}</button>

            @if (session('status') === 'profile-updated')
                <div class="success-message">
                    {{ __('✓ Profil Anda telah berhasil diperbarui!') }}
                </div>
            @endif
        </div>
    </form>
</section>
