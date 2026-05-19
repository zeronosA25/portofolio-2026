<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Shape - Creative Designer</title>
    <link href="{{ asset('css/templatemo-personal-style.css') }}" rel="stylesheet">
    @livewireStyles

    <!--
    TemplateMo 593 personal shape
    https://templatemo.com/tm-593-personal-shape
    -->
</head>
<body>
    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">Personal Shape</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="mobile-menu-toggle" id="mobileMenuToggle">
                <div class="hamburger"></div>
                <div class="hamburger"></div>
                <div class="hamburger"></div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <ul class="mobile-nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
            <div class="shape shape-6"></div>
        </div>

        <div class="hero-content">
            <div class="hero-subtitle">Mahasiswa Esa Unggul</div>
            <h1>Muhammad Aditya Teknik Informatika</h1>
            <p class="subtitle">
                Saya Mahasiswa angkatan 24 dari fakultas Ilmu Komputer Prodi Teknik Informatika yang sedang mendalami Full Stack Enginer
            </p>
            <a href="#portfolio" class="cta-button">Explore My Work</a>
        </div>

        <div class="scroll-indicator" onclick="document.getElementById('about').scrollIntoView()"></div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title fade-in">About Me</h2>

            <div class="about-content">
                <div class="about-image slide-in-left"><img src="{{ asset('images/Adit.JPG') }}" alt="Adit"></div>

                <div class="about-text slide-in-right">
                    <h3>Data Diri Muhammad Aditya</h3>
                    <p>
                        Saya Mahasiswa angkatan 24 dari fakultas Ilmu Komputer Prodi Teknik Informatika yang sedang mendalami Full Stack Enginer
                    </p>
                    <p>
                        Jujur bingung mau ngisi apa tapi sekarang sedang berusaha untuk memahami lebih dalam tentang codingan maupun lain lain.
                    </p>
                    <p>
                        Semoga bisa menjadi lebih baik lagi
                    </p>

                    <div class="skills">
                        <span class="skill-tag">UI/UX Design</span>
                        <span class="skill-tag">Web Development</span>
                        <span class="skill-tag">Brand Identity</span>
                        <span class="skill-tag">Motion Graphics</span>
                        <span class="skill-tag">Prototyping</span>
                        <span class="skill-tag">Design Systems</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <h2 class="section-title fade-in">Featured Work</h2>

            <div class="portfolio-grid">
                @forelse ($projects as $project)
                    @php
                        /*
                            Support 2 sumber gambar:
                            1. FileUpload Filament: projects/file.png -> /storage/projects/file.png
                            2. Public manual: images/file.png -> /images/file.png
                        */
                        $imageUrl = function (?string $path) {
                            if (! $path) {
                                return null;
                            }

                            return str_starts_with($path, 'images/')
                                ? asset($path)
                                : asset('storage/' . $path);
                        };
                    @endphp

                    <div class="portfolio-item">
                        <div class="portfolio-image">
                            @if ($project->image)
                                <img
                                    src="{{ $imageUrl($project->image) }}"
                                    alt="{{ $project->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;"
                                >
                            @endif
                        </div>

                        <div class="portfolio-content">
                            <h4>{{ $project->title }}</h4>

                            <p>{{ $project->description }}</p>

                            <div class="portfolio-tech">
                                @foreach ($project->technologies ?? [] as $technology)
                                    <span class="tech-tag">{{ $technology }}</span>
                                @endforeach
                            </div>

                            @if ($project->erd_image || $project->flowchart_image)
                                <div class="project-diagrams">
                                    @if ($project->erd_image)
                                        <div class="diagram-card">
                                            <h5>ERD</h5>
                                            <img
                                                src="{{ $imageUrl($project->erd_image) }}"
                                                alt="ERD {{ $project->title }}"
                                            >
                                        </div>
                                    @endif

                                    @if ($project->flowchart_image)
                                        <div class="diagram-card">
                                            <h5>Flowchart</h5>
                                            <img
                                                src="{{ $imageUrl($project->flowchart_image) }}"
                                                alt="Flowchart {{ $project->title }}"
                                            >
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if ($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener">
                                    Live Demo
                                </a>
                            @endif

                            @if ($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" rel="noopener">
                                    GitHub
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>Belum ada project yang ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="contact-floating-shapes">
            <div class="contact-shape contact-shape-1"></div>
            <div class="contact-shape contact-shape-2"></div>
            <div class="contact-shape contact-shape-3"></div>
            <div class="contact-shape contact-shape-4"></div>
            <div class="contact-shape contact-shape-5"></div>
            <div class="contact-shape contact-shape-6"></div>
        </div>

        <div class="container">
            <div class="contact-content">
                <h2 class="section-title fade-in">Let's Work Together</h2>
                <p class="fade-in">
                    Ready to bring your vision to life? Let's discuss how we can create something amazing together.
                    I'm always excited to take on new challenges and collaborate on innovative projects.
                </p>

                @livewire('contact-form')
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-left">
                    <p>&copy; 2025 Personal Shape. All rights reserved.</p>
                </div>

                <div class="footer-right">
                    <a href="#privacy">Privacy Policy</a>
                    <a href="#terms">Terms of Use</a>
                    <a href="#sitemap">Sitemap</a>
                    <a href="https://templatemo.com" target="_blank" rel="noopener nofollow">Provided by TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script src="{{ asset('js/templatemo-personal-javascripts.js') }}"></script>
</body>
</html>
