<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boncahe - Destinasi Wisata Terbaik</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Custom CSS -->
    <link href="{{ asset('index.css') }}" rel="stylesheet">
     <script src="https://cdn.tailwindcss.com"></script>
    
     
    
</head>

  
    
<body>
    <div class="app-container">
        <!-- Header -->
        <header class="header">
            <div class="header-content">
                <div class="logo-area">
                    <a href="index.html">
                        <img src="{{ asset('assets/images/thumbnails/boncahe_logo.png') }}" alt="Boncahe Logo" class="logo">
                    </a>
                </div>

                <div class="welcome-text">
                    <h1>Temukan Keseruanmu disini<br></h1>
                    <p>Jelajahi destinasi wisata alam di Kebon Camara Hejo</p>
                </div>

                <!-- SEARCH WITH DROPDOWN -->
              
            </div>
        </header>

        <!-- Backdrop untuk dropdown -->
        <div class="search-backdrop" id="searchBackdrop"></div>

        <!-- Main Content -->
        <main class="content-wrapper">
            <!-- Popular Section -->
            <section class="section">
                <div class="section-header">
                    <h2 class="section-title">Populer</h2>
                    <a href="#" class="view-all-btn">Lihat Semua →</a>
                </div>

                <div class="swiper popular-slider">
                    <div class="swiper-wrapper">
                        @forelse ($popularTickets as $itemPopularTicket)
                            <div class="swiper-slide">
                                <a href="{{ route('front.details', $itemPopularTicket->slug) }}" class="popular-card">
                                    <div class="popular-card-inner">
                                        <img src="{{ Storage::url($itemPopularTicket->thumbnail) }}" 
                                             alt="{{ $itemPopularTicket->name }}" 
                                             class="popular-card-image">
                                        <div class="popular-card-overlay"></div>
                                        <div class="popular-card-content">
                                            <div class="popular-card-badge">
                                                <img src="{{ asset('assets/images/icons/Star 1.svg') }}" alt="star">
                                                <span>4.5/5</span>
                                            </div>
                                            <h3 class="popular-card-title">{{ $itemPopularTicket->name }}</h3>
                                            <p class="popular-card-category">{{ $itemPopularTicket->category->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-icon">🏝️</div>
                                <p class="empty-text">Belum ada data</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- Categories Section -->
            <section class="section">
                <div class="section-header">
                    <h2 class="section-title">Kategori</h2>
                </div>

                <div class="swiper categories-slider">
                    <div class="swiper-wrapper">
                        @forelse ($categories as $itemCategory)
                            <div class="swiper-slide">
                                <a href="{{ route('front.category', $itemCategory->slug) }}" class="category-chip">
                                    <img src="{{ Storage::url($itemCategory->icon) }}" 
                                         alt="{{ $itemCategory->name }}" 
                                         class="category-icon">
                                    <span>{{ $itemCategory->name }}</span>
                                </a>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-icon">📂</div>
                                <p class="empty-text">Belum ada data</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- Sellers Section -->
            <section class="section">
                <div class="section-header">
                    <h2 class="section-title">Kunjungi</h2>
                    <a href="#" class="view-all-btn">Lihat Semua →</a>
                </div>

                <div class="swiper sellers-slider">
                    <div class="swiper-wrapper">
                        @forelse($sellers as $itemSeller)
                            <div class="swiper-slide">
                                <a href="{{ route('front.seller', $itemSeller->slug) }}" class="seller-card">
                                    <div class="seller-card-inner">
                                        <img src="{{ Storage::url($itemSeller->photo) }}" 
                                             alt="{{ $itemSeller->name }}" 
                                             class="seller-card-image">
                                        <div class="seller-card-overlay"></div>
                                        <div class="seller-card-info">
                                            <h3 class="seller-card-name">{{ $itemSeller->name }}</h3>
                                            <p class="seller-card-count">{{ $itemSeller->tickets->count() }} Places</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-icon">🏢</div>
                                <p class="empty-text">Belum ada data</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- Available Tickets Section -->
            <section class="section">
                <div class="section-header">
                    <h2 class="section-title">Tersedia</h2>
                </div>

                <div class="tickets-list">
                    @forelse ($newTickets as $itemNewTicket)
                        <a href="{{ route('front.details', $itemNewTicket->slug) }}" class="ticket-item">
                            <div class="ticket-image-wrapper">
                                <img src="{{ Storage::url($itemNewTicket->thumbnail) }}" 
                                     alt="{{ $itemNewTicket->name }}" 
                                     class="ticket-image">
                            </div>
                            <div class="ticket-details">
                                <h3 class="ticket-name">{{ $itemNewTicket->name }}</h3>
                                <div class="ticket-location">
                                    <img src="{{ asset('assets/images/icons/location.svg') }}" alt="location">
                                    <span>{{ $itemNewTicket->seller->name }}</span>
                                </div>
                                <p class="ticket-price">Rp {{ number_format($itemNewTicket->price, 0, '.', ',') }}</p>
                            </div>
                            <div class="ticket-rating">
                                <img src="{{ asset('assets/images/icons/Star 1.svg') }}" alt="star">
                                <span>4.5</span>
                            </div>
                        </a>
                    @empty
                        <div class="empty-state">
                            <div class="empty-icon">🎫</div>
                            <p class="empty-text">Belum ada data</p>
                        </div>
                    @endforelse
                </div>
            </section>
        </main>

   @include('components.footer')
   @include('components.navbar')
        
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('index.js') }}"></script>
</body>
</html>