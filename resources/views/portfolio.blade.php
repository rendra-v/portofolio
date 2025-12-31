<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Saya - Showcase Karya Terbaik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .image-container {
            overflow: hidden;
            position: relative;
        }

        .image-container img {
            transition: transform 0.6s ease;
        }

        .card-hover:hover .image-container img {
            transform: scale(1.1);
        }

        .tag {
            animation: fadeInUp 0.5s ease;
        }

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

        .hero-text {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .overlay {
            background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%);
        }

        .highlighted-card {
            border: 3px solid #667eea;
            background: linear-gradient(135deg, #f5f7ff 0%, #ffffff 100%);
        }

        .highlighted-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 10;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .features-list {
            background: #f8faff;
            border-left: 4px solid #667eea;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Hero Section -->
    <header class="gradient-bg text-white">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">MyPortfolio</h1>
                <div class="space-x-6 hidden md:flex">
                    <a href="#home" class="hover:text-gray-200 transition">Home</a>
                    <a href="#portfolio" class="hover:text-gray-200 transition">Portfolio</a>
                    <a href="#contact" class="hover:text-gray-200 transition">Contact</a>
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-6 py-20 text-center hero-text">
            <h2 class="text-5xl md:text-6xl font-bold mb-6">Portfolio Karya Saya</h2>
            <p class="text-xl md:text-2xl text-gray-100 mb-8 max-w-3xl mx-auto">
                Showcase project dan karya terbaik yang telah saya kerjakan dengan passion dan dedikasi tinggi
            </p>
            <a href="#portfolio" class="inline-block bg-white text-purple-700 font-semibold px-8 py-4 rounded-full hover:bg-gray-100 transition transform hover:scale-105">
                Lihat Karya Saya
            </a>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="container mx-auto px-6 py-20">
        <div class="text-center mb-16">
            <h3 class="text-4xl font-bold text-gray-800 mb-4">Project Terbaru</h3>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Koleksi project yang menampilkan keahlian dan kreativitas dalam berbagai bidang teknologi
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolios as $portfolio)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover {{ isset($portfolio['highlighted']) && $portfolio['highlighted'] ? 'highlighted-card' : '' }}">
                <div class="image-container h-64 relative">
                    @if(isset($portfolio['highlighted']) && $portfolio['highlighted'])
                    <span class="highlighted-badge">⭐ Featured Project</span>
                    @endif
                    <img src="{{ $portfolio['image'] }}"
                         alt="{{ $portfolio['title'] }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 overlay"></div>
                </div>

                <div class="p-6">
                    <h4 class="text-2xl font-bold text-gray-800 mb-3">{{ $portfolio['title'] }}</h4>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ $portfolio['description'] }}
                    </p>

                    @if(isset($portfolio['features']))
                    <div class="features-list mb-4">
                        <h5 class="font-bold text-gray-700 mb-2">Fitur</h5>
                        <ul class="space-y-1 text-sm text-gray-600">
                            @foreach($portfolio['features'] as $feature)
                            <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($portfolio['tags'] as $tag)
                        <span class="tag bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="gradient-bg text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold mb-6">Mari Bekerja Sama</h3>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Punya project menarik? Saya siap membantu mewujudkan ide Anda menjadi kenyataan
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="mailto:your-email@example.com"
                   class="bg-white text-purple-700 font-semibold px-8 py-4 rounded-full hover:bg-gray-100 transition transform hover:scale-105">
                    📧 Email Saya
                </a>
                <a href="https://wa.me/6281234567890"
                   class="bg-green-500 text-white font-semibold px-8 py-4 rounded-full hover:bg-green-600 transition transform hover:scale-105">
                    💬 WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="mb-4">&copy; 2025 Rafli Dika Rendra Arifin. All rights reserved.</p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="hover:text-white transition">GitHub</a>
                <a href="#" class="hover:text-white transition">LinkedIn</a>
                <a href="#" class="hover:text-white transition">Instagram</a>
                <a href="#" class="hover:text-white transition">Twitter</a>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card-hover').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>
