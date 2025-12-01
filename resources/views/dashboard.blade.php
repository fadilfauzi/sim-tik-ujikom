<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

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

    @keyframes pulse-glow {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
        }
        50% {
            box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-8px);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .animate-slideInLeft {
        animation: slideInLeft 0.6s ease-out forwards;
    }

    .animate-pulse-glow {
        animation: pulse-glow 2s infinite;
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .stat-card {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .stat-card:nth-child(1) { animation-delay: 0s; }
    .stat-card:nth-child(2) { animation-delay: 0.1s; }
    .stat-card:nth-child(3) { animation-delay: 0.2s; }
    .stat-card:nth-child(4) { animation-delay: 0.3s; }

    .action-card {
        animation: slideInLeft 0.6s ease-out forwards;
    }

    .action-card:nth-child(1) { animation-delay: 0.4s; }
    .action-card:nth-child(2) { animation-delay: 0.5s; }
    .action-card:nth-child(3) { animation-delay: 0.6s; }

    .gradient-animation {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<!-- Redirect ke dashboard sesuai role -->
@if(auth()->user()->role === 'admin')
    @include('admin.dashboard')
@elseif(auth()->user()->role === 'technician')
    @include('technician.dashboard')
@else
    @include('user.dashboard')
@endif
