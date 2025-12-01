<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <style>
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-group {
            animation: slideInLeft 0.6s ease-out forwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }

        .form-title {
            animation: slideInRight 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            background: linear-gradient(135deg, #dc2626 0%, #1e40af 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
        }

        .form-title h2 {
            font-size: 1.875rem;
            font-weight: 900;
            letter-spacing: -0.01em;
        }

        .form-title p {
            color: #6b7280;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        .input-field {
            border: 2px solid #e5e7eb;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            font-size: 0.9375rem;
            background: #f9fafb;
            width: 100%;
        }

        .input-field:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
            background: white;
            outline: none;
        }

        .input-field::placeholder {
            color: #d1d5db;
        }

        .input-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .input-label-icon {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-login {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #dc2626 0%, #1e40af 100%);
            color: white;
            width: 100%;
            padding: 0.875rem 1.5rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-size: 0.875rem;
            border: none;
            border-radius: 0.75rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(220, 38, 38, 0.2);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(220, 38, 38, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .checkbox-wrapper {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            user-select: none;
        }

        .checkbox-input {
            appearance: none;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #dc2626;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s ease;
            background: white;
        }

        .checkbox-input:checked {
            background: linear-gradient(135deg, #dc2626 0%, #1e40af 100%);
            border-color: #1e40af;
            box-shadow: inset 0 0 0 2px white;
        }

        .checkbox-input:hover {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .checkbox-label {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
        }

        .link-animated {
            position: relative;
            text-decoration: none;
            color: #dc2626;
            font-weight: 600;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .link-animated::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #dc2626 0%, #1e40af 100%);
            transition: width 0.3s ease;
        }

        .link-animated:hover {
            color: #1e40af;
        }

        .link-animated:hover::after {
            width: 100%;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
            animation: slideInLeft 0.6s ease-out 0.5s backwards;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            font-weight: 500;
        }

        .form-divider {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .form-divider p {
            font-size: 0.75rem;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }
    </style>

    <!-- Form Title -->
    <div class="form-title">
        <h2>Masuk ke Sistem</h2>
        <p>Kelola aset TIK Anda dengan efisien dan aman</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="input-label">
                <span class="input-label-icon">
                    <span>📧</span>
                    Email Address
                </span>
            </label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username"
                class="input-field"
                placeholder="admin@sim.id"
            />
            @if ($errors->has('email'))
                <div class="error-message">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="input-label">
                <span class="input-label-icon">
                    <span>🔐</span>
                    Password
                </span>
            </label>
            <input 
                id="password" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password"
                class="input-field"
                placeholder="••••••••"
            />
            @if ($errors->has('password'))
                <div class="error-message">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="form-group">
            <label class="checkbox-wrapper">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    name="remember"
                    class="checkbox-input"
                />
                <span class="checkbox-label">Ingat saya di perangkat ini</span>
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="button-group">
            <button type="submit" class="btn-login">
                <span>🚀 Masuk Sekarang</span>
            </button>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="link-animated text-center py-2 px-4 rounded-lg hover:bg-gray-50 transition">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>
    </form>

    </x-guest-layout>
