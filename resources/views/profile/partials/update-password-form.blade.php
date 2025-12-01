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
            letter-spacing: 0.05em;
        }

        .modern-input:focus {
            outline: none;
            border-color: #10b981;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .dark .modern-input {
            background-color: #1f2937;
            border-color: #374151;
            color: #f3f4f6;
        }

        .dark .modern-input:focus {
            border-color: #6ee7b7;
            background-color: #111827;
            box-shadow: 0 0 0 3px rgba(110, 231, 183, 0.1);
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

        .password-requirement {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.5rem;
        }

        .dark .password-requirement {
            color: #9ca3af;
        }

        .requirement-met {
            color: #10b981;
        }

        .button-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1.5rem;
            animation: slideInLeft 0.5s ease-out 0.4s forwards;
            opacity: 0;
        }

        .modern-btn {
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
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

        .security-tip {
            padding: 1rem;
            background-color: #dbeafe;
            border-left: 4px solid #3b82f6;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .dark .security-tip {
            background-color: #1e3a8a;
            border-left-color: #60a5fa;
        }

        .security-tip p {
            color: #1e40af;
            font-size: 0.875rem;
            margin: 0;
        }

        .dark .security-tip p {
            color: #93c5fd;
        }
    </style>

    <div class="security-tip">
        <p>🔒 <strong>Tip Keamanan:</strong> Gunakan password yang kuat dengan kombinasi huruf besar, kecil, angka, dan simbol untuk keamanan maksimal.</p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="form-group">
            <label for="update_password_current_password" class="form-label">{{ __('Password Saat Ini') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="modern-input" autocomplete="current-password" required />
            @if ($errors->updatePassword->has('current_password'))
                <div class="error-message">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <!-- New Password -->
        <div class="form-group">
            <label for="update_password_password" class="form-label">{{ __('Password Baru') }}</label>
            <input id="update_password_password" name="password" type="password" class="modern-input" autocomplete="new-password" required />
            <div class="password-requirement">
                <span>✓ Minimal 8 karakter</span>
            </div>
            @if ($errors->updatePassword->has('password'))
                <div class="error-message">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Konfirmasi Password Baru') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="modern-input" autocomplete="new-password" required />
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="error-message">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="button-group">
            <button type="submit" class="modern-btn">{{ __('Perbarui Password') }}</button>

            @if (session('status') === 'password-updated')
                <div class="success-message">
                    {{ __('✓ Password berhasil diperbarui!') }}
                </div>
            @endif
        </div>
    </form>
</section>
