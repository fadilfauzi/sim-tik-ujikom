<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
        <style>
            /* Ensure dashboard is clickable */
            .stat-card, .action-card, .performance-card {
                pointer-events: auto !important;
                z-index: 999 !important;
                position: relative !important;
            }
            
            .absolute.inset-0 {
                pointer-events: none !important;
                z-index: -1 !important;
            }
            
            /* Remove any overlay interference */
            body {
                position: relative !important;
                overflow-x: hidden !important;
            }
            
            main {
                position: relative !important;
                z-index: 10 !important;
                pointer-events: auto !important;
            }
            
            /* Hide any potential overlays */
            .modal-backdrop, [class*="fixed inset-0"] {
                display: none !important;
                visibility: hidden !important;
                opacity: 0 !important;
            }
            
            /* Ensure all interactive elements are clickable */
            button, a, input, select, textarea {
                pointer-events: auto !important;
                z-index: 100 !important;
                position: relative !important;
            }
            
            /* Remove backdrop filters */
            * {
                backdrop-filter: none !important;
            }
        </style>
        
        <script>
            // Ensure all modals are closed on page load
            document.addEventListener('DOMContentLoaded', function() {
                // Close delete modal if exists
                const deleteModal = document.getElementById('delete-modal');
                if (deleteModal) {
                    deleteModal.style.display = 'none';
                }
                
                // Remove any overlay elements
                const overlays = document.querySelectorAll('.modal-backdrop, [class*="fixed inset-0"]');
                overlays.forEach(overlay => {
                    if (overlay.id !== 'navigation') {
                        overlay.style.display = 'none';
                        overlay.style.visibility = 'hidden';
                        overlay.style.opacity = '0';
                    }
                });
                
                // Ensure body can scroll
                document.body.classList.remove('overflow-y-hidden');
                
                // Force close all Alpine.js dropdowns and modals
                if (window.Alpine) {
                    Alpine.store('modals', {});
                    window.Alpine.nextTick(() => {
                        document.querySelectorAll('[x-data]').forEach(el => {
                            if (el._x_dataStack) {
                                el._x_dataStack.forEach(data => {
                                    if (data.open !== undefined) {
                                        data.open = false;
                                    }
                                    if (data.show !== undefined) {
                                        data.show = false;
                                    }
                                });
                            }
                        });
                    });
                }
                
                // Remove any backdrop filters that might cause visual issues
                document.querySelectorAll('*').forEach(el => {
                    const style = window.getComputedStyle(el);
                    if (style.backdropFilter !== 'none') {
                        el.style.backdropFilter = 'none';
                    }
                });
            });
        </script>
    </body>
</html>
