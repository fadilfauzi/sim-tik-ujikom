<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Animasi untuk lambang Polres: Merah, Putih, Biru */
            @keyframes polres-gradient {
                0% { background-position: 0% 50%; }
                33% { background-position: 100% 50%; }
                66% { background-position: 0% 50%; }
                100% { background-position: 100% 50%; }
            }

            @keyframes polres-wave {
                0% { transform: translateX(-100%); }
                100% { transform: translateX(100%); }
            }

            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-50px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(60px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-12px); }
            }

            @keyframes shimmer {
                0% { background-position: -1000px 0; }
                100% { background-position: 1000px 0; }
            }

            @keyframes glow-red {
                0%, 100% { box-shadow: 0 0 20px rgba(220, 38, 38, 0.4), 0 0 40px rgba(220, 38, 38, 0.2); }
                50% { box-shadow: 0 0 30px rgba(220, 38, 38, 0.6), 0 0 60px rgba(220, 38, 38, 0.3); }
            }

            @keyframes glow-blue {
                0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.4), 0 0 40px rgba(59, 130, 246, 0.2); }
                50% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.6), 0 0 60px rgba(59, 130, 246, 0.3); }
            }

            body {
                background: linear-gradient(-45deg, #dc2626, #ffffff, #1e40af, #dc2626);
                background-size: 400% 400%;
                animation: polres-gradient 20s ease infinite;
                min-height: 100vh;
                position: relative;
                overflow-x: hidden;
                overflow-y: auto;
            }

            /* Decorative Elements */
            .orb-red {
                position: absolute;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle, rgba(220, 38, 38, 0.15) 0%, transparent 70%);
                border-radius: 50%;
                top: -150px;
                left: -150px;
                animation: float 8s ease-in-out infinite;
            }

            .orb-blue {
                position: absolute;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(30, 64, 175, 0.15) 0%, transparent 70%);
                border-radius: 50%;
                bottom: -100px;
                right: -100px;
                animation: float 10s ease-in-out infinite 1s;
            }

            .logo-container {
                animation: fadeInDown 0.9s cubic-bezier(0.34, 1.56, 0.64, 1);
                position: relative;
                z-index: 10;
            }

            .logo-badge {
                position: relative;
                width: 120px;
                height: 120px;
                margin: 0 auto;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .logo-badge::before {
                content: '';
                position: absolute;
                inset: 0;
                background-image: url('{{ asset('images/TIK_POLRI.png') }}');
                background-size: contain;
                background-position: center;
                background-repeat: no-repeat;
                border-radius: 50%;
                opacity: 0.8;
            }

            .logo-badge::after {
                content: '';
                position: absolute;
                inset: 0;
                /* Hapus background putih agar logo TIK terlihat */
                border-radius: 50%;
                z-index: 1;
            }

            .logo-icon {
                position: relative;
                z-index: 2;
                font-size: 60px;
                animation: float 4s ease-in-out infinite;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 80px;
                height: 80px;
                margin: 0 auto;
            }

            .logo-icon img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                border-radius: 50%;
                padding: 8px;
                background: rgba(255, 255, 255, 0.9);
            }

            .logo-title {
                text-center;
                margin-top: 1.5rem;
                animation: fadeInDown 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) 0.1s backwards;
            }

            .logo-title h1 {
                font-size: 3rem;
                font-weight: 900;
                background: linear-gradient(135deg, #dc2626 0%, #1e40af 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                letter-spacing: -0.02em;
            }

            .logo-title p {
                color: rgba(255, 255, 255, 0.95);
                font-size: 0.875rem;
                margin-top: 0.5rem;
                font-weight: 500;
            }

            .login-card {
                animation: slideInUp 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s backwards;
                backdrop-filter: blur(10px) brightness(1.1);
                position: relative;
                z-index: 10;
            }

            .login-card .card-content {
                background: white;
                border-radius: 1.5rem;
                overflow: hidden;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            .card-header {
                height: 6px;
                background: linear-gradient(90deg, #dc2626 0%, #ffffff 33%, #1e40af 66%, #dc2626 100%);
                background-size: 200% 100%;
                animation: polres-wave 3s ease-in-out infinite;
            }

            .card-body {
                padding: 2.5rem 2rem;
            }

            @media (min-width: 640px) {
                .card-body {
                    padding: 3rem 2.5rem;
                }
            }

            /* Demo Credentials Section */
            .demo-section {
                margin-top: 2rem;
                text-align: center;
                animation: fadeInDown 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s backwards;
            }

            .demo-label {
                color: rgba(255, 255, 255, 0.9);
                font-size: 0.875rem;
                font-weight: 600;
                margin-bottom: 1rem;
                filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
            }

            .demo-cards {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 0.5rem;
                margin-bottom: 1rem;
            }

            .demo-card {
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(10px);
                padding: 0.75rem;
                border-radius: 0.75rem;
                border: 1px solid rgba(255, 255, 255, 0.3);
                transition: all 0.3s ease;
            }

            .demo-card:hover {
                background: rgba(255, 255, 255, 0.25);
                border-color: rgba(255, 255, 255, 0.5);
                transform: translateY(-2px);
            }

            .demo-card-title {
                font-weight: 700;
                color: rgba(255, 255, 255, 0.95);
                font-size: 0.75rem;
            }

            .demo-card-email {
                font-size: 0.7rem;
                color: rgba(255, 255, 255, 0.7);
                margin-top: 0.25rem;
                font-family: monospace;
            }

            .location-link, .phone-link, .website-link {
                color: rgba(255, 255, 255, 0.9);
                text-decoration: none;
                transition: all 0.3s ease;
                display: block;
                padding: 2px 4px;
                border-radius: 4px;
            }

            .location-link:hover, .phone-link:hover, .website-link:hover {
                color: #ffffff;
                background: rgba(255, 255, 255, 0.1);
                text-decoration: underline;
            }

            .demo-password {
                color: rgba(255, 255, 255, 0.75);
                font-size: 0.75rem;
                filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.2));
                font-family: monospace;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Decorative Orbs -->
        <div class="orb-red"></div>
        <div class="orb-blue"></div>

        <div class="flex flex-col items-center pt-6 sm:pt-12 pb-12 relative px-4">
            <!-- Logo Container -->
            <div class="logo-container mb-12">
                <div class="logo-badge">
                    <div class="logo-icon">
                        <!-- Logo TIK sebagai background -->
                    </div>
                </div>
                <div class="logo-title">
                    <h1>SIM-TIK</h1>
                    <p>Sistem Informasi Manajemen TIK</p>
                </div>
            </div>

            <!-- Login Card -->
            <div class="w-full sm:max-w-md login-card">
                <div class="card-content">
                    <div class="card-header"></div>
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>

                <!-- Lokasi Polres Garut -->
                <div class="demo-section">
                    <p class="demo-label">🚔 POLRES GARUT</p>
                    <div class="demo-cards">
                        <div class="demo-card">
                            <div class="demo-card-title">📍 Lokasi</div>
                            <div class="demo-card-email">
                                <a href="https://maps.google.com/?q=Polres+Garut+Jl.+Jendral+Sudirman+No.204+Karangpawitan" target="_blank" class="location-link">
                                    Jl. Jendral Sudirman No.204, Sucikaler, Kec. Karangpawitan, Kabupaten Garut, Jawa Barat 44182
                                </a>
                            </div>
                        </div>
                        <div class="demo-card">
                            <div class="demo-card-title">📞 Kontak</div>
                            <div class="demo-card-email">
                                <a href="tel:0262236415" class="phone-link">(0262) 236415</a>
                            </div>
                        </div>
                        <div class="demo-card">
                            <div class="demo-card-title">🌐 Website</div>
                            <div class="demo-card-email">
                                <a href="https://www.polres-garut.polri.go.id" target="_blank" class="website-link">www.polres-garut.polri.go.id</a>
                            </div>
                        </div>
                    </div>
                    <p class="demo-password">🏢 Kepolisian Resor Garut - Polda Jawa Barat</p>
                </div>
            </div>
        </div>
    </body>
</html>
