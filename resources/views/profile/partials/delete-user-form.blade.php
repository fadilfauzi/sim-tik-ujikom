<section class="space-y-6">
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .danger-alert {
            padding: 1rem;
            background-color: #fee2e2;
            border-left: 4px solid #dc2626;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            animation: slideInLeft 0.5s ease-out 0.1s forwards;
            opacity: 0;
        }

        .dark .danger-alert {
            background-color: #7f1d1d;
            border-left-color: #ef4444;
        }

        .danger-alert p {
            color: #7f1d1d;
            font-size: 0.875rem;
            margin: 0;
            line-height: 1.5;
        }

        .dark .danger-alert p {
            color: #fecaca;
        }

        .danger-btn {
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            font-size: 0.875rem;
            animation: slideInLeft 0.5s ease-out forwards;
            opacity: 0;
            animation-delay: 0.2s;
        }

        .danger-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(220, 38, 38, 0.3);
        }

        .danger-btn:active {
            transform: translateY(0);
        }

        .modal-backdrop {
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            animation: slideInLeft 0.3s ease-out 0.1s forwards;
            opacity: 0;
        }

        .modal-title {
            color: #dc2626;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .dark .modal-title {
            color: #fca5a5;
        }

        .modal-description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .dark .modal-description {
            color: #d1d5db;
        }

        .modal-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1rem;
            background-color: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .modal-input:focus {
            outline: none;
            border-color: #dc2626;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .dark .modal-input {
            background-color: #1f2937;
            border-color: #374151;
            color: #f3f4f6;
        }

        .dark .modal-input:focus {
            border-color: #fca5a5;
            background-color: #111827;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
        }

        .cancel-btn {
            padding: 0.875rem 1.5rem;
            background-color: #e5e7eb;
            color: #1f2937;
            border: none;
            border-radius: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            font-size: 0.875rem;
        }

        .cancel-btn:hover {
            background-color: #d1d5db;
        }

        .dark .cancel-btn {
            background-color: #374151;
            color: #f3f4f6;
        }

        .dark .cancel-btn:hover {
            background-color: #4b5563;
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
    </style>

    <div class="danger-alert">
        <p>⚠️ <strong>Perhatian!</strong> Menghapus akun Anda akan menghilangkan semua data secara permanen. Tindakan ini tidak dapat dibatalkan. Pastikan Anda telah mengunduh atau menyimpan data penting sebelum melanjutkan.</p>
    </div>

    <button type="button" 
            onclick="document.getElementById('delete-modal').style.display='flex'" 
            class="danger-btn">
        🗑️ Hapus Akun
    </button>

    <!-- Modal Delete Account -->
    <div id="delete-modal" 
         style="display: none;" 
         class="modal-backdrop fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div style="max-width: 500px; width: 100%;" class="modal-content bg-white dark:bg-gray-800 rounded-lg shadow-2xl p-6">
            <h2 class="modal-title text-2xl">{{ __('Hapus Akun Anda?') }}</h2>
            
            <p class="modal-description">
                {{ __('Tindakan ini tidak dapat dibatalkan. Semua data, file, dan preferensi Anda akan dihapus secara permanen dari sistem. Masukkan password Anda untuk mengkonfirmasi penghapusan akun.') }}
            </p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <label class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    {{ __('Password Anda') }}
                </label>
                <input id="delete-password" 
                       name="password" 
                       type="password" 
                       class="modal-input" 
                       placeholder="{{ __('Masukkan password Anda...') }}"
                       required 
                       autofocus />

                @if ($errors->userDeletion->has('password'))
                    <div class="error-message">
                        {{ $errors->userDeletion->first('password') }}
                    </div>
                @endif

                <div class="modal-buttons">
                    <button type="button" 
                            onclick="document.getElementById('delete-modal').style.display='none'" 
                            class="cancel-btn">
                        {{ __('Batal') }}
                    </button>
                    <button type="submit" class="danger-btn">
                        {{ __('Ya, Hapus Akun') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Ensure modal is closed on page load
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('delete-modal');
            if (modal) {
                modal.style.display = 'none';
            }
        });

        // Close modal when clicking outside
        document.getElementById('delete-modal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('delete-modal');
                if (modal) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>
</section>
