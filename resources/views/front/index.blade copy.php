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
</head>

<style>
    /* ========================================
       RESPONSIVE DESIGN - MOBILE FIRST
    ======================================== */
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary: #FF6B35;
        --secondary: #004E89;
        --accent: #F7B801;
        --dark: #1A1A2E;
        --light: #F5F5F5;
        --success: #06D6A0;
        --gradient-hero: linear-gradient(135deg, #FF6B35 0%, #F7B801 100%);
        --max-width: 1400px;
        --container-mobile: 640px;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: linear-gradient(180deg, #FAFBFC 0%, #F0F4F8 100%);
        color: var(--dark);
        overflow-x: hidden;
    }

    /* ========================================
       CONTAINER - RESPONSIVE
    ======================================== */
    .app-container {
        max-width: var(--container-mobile);
        margin: 0 auto;
        background: #ffffff;
        min-height: 100vh;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow-x: hidden;
    }

    /* Desktop: Wider container */
    @media (min-width: 768px) {
        .app-container {
            max-width: 100%;
        }
    }

    /* ========================================
       HEADER SECTION - RESPONSIVE
    ======================================== */
    .header {
        background: var(--gradient-hero);
        padding: 20px 20px 100px;
        position: relative;
        overflow: hidden;
    }

    /* Desktop: Adjust padding */
    @media (min-width: 768px) {
        .header {
            padding: 40px 60px 120px;
        }
    }

    .header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: #ffffff;
        border-radius: 40px 40px 0 0;
    }

    .header-content {
        position: relative;
        z-index: 2;
        max-width: var(--max-width);
        margin: 0 auto;
    }

    .logo-area {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .logo {
        height: 40px;
        width: auto;
        filter: brightness(0) invert(1);
    }

    /* Desktop: Larger logo */
    @media (min-width: 768px) {
        .logo {
            height: 50px;
        }
    }

    .welcome-text {
        color: #ffffff;
        margin-bottom: 30px;
    }

    .welcome-text h1 {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 8px;
        line-height: 1.2;
    }

    /* Desktop: Larger heading */
    @media (min-width: 768px) {
        .welcome-text h1 {
            font-size: 42px;
        }
        
        .welcome-text p {
            font-size: 16px;
        }
    }

    .welcome-text p {
        font-size: 14px;
        opacity: 0.95;
    }

    .search-wrapper {
        position: relative;
        z-index: 1000;
    }

    /* Desktop: Center search box with max-width */
    @media (min-width: 768px) {
        .search-wrapper {
            max-width: 600px;
            margin: 0 auto;
        }
    }

    .search-box {
        width: 100%;
        padding: 16px 20px 16px 50px;
        border: none;
        border-radius: 16px;
        font-size: 15px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .search-box:focus {
        outline: none;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        transform: translateY(-2px);
    }

    .search-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: var(--primary);
    }

    /* ========================================
       SEARCH DROPDOWN - RESPONSIVE
    ======================================== */
    .search-dropdown {
        position: fixed;
        top: 160px;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% - 40px);
        max-width: 600px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
        max-height: calc(100vh - 220px);
        overflow-y: auto;
        display: none;
        z-index: 9999;
    }

    /* Desktop: Better positioning */
    @media (min-width: 768px) {
        .search-dropdown {
            top: 200px;
            max-height: 500px;
        }
    }

    .search-dropdown.show {
        display: block;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateX(-50%) translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }

    .search-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 9998;
        backdrop-filter: blur(2px);
    }

    .search-backdrop.show {
        display: block;
    }

    body.dropdown-open {
        overflow: hidden;
    }

    /* Desktop: Don't lock scroll */
    @media (min-width: 768px) {
        body.dropdown-open {
            overflow: visible;
        }
    }

    .search-dropdown::-webkit-scrollbar {
        width: 6px;
    }

    .search-dropdown::-webkit-scrollbar-thumb {
        background: #ddd;
        border-radius: 3px;
    }

    .search-dropdown-item {
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        color: var(--dark);
    }

    .search-dropdown-item:hover {
        background: #f8f9fa;
    }

    .search-dropdown-item.hidden {
        display: none;
    }

    .search-item-image {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .search-item-info {
        flex: 1;
    }

    .search-item-name {
        font-weight: 600;
        font-size: 15px;
        margin-bottom: 4px;
        color: var(--dark);
    }

    .search-item-location {
        font-size: 13px;
        color: #666;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .search-item-location img {
        width: 14px;
        height: 14px;
    }

    .no-results {
        padding: 40px 20px;
        text-align: center;
        display: none;
    }

    .no-results.show {
        display: block;
    }

    .no-results-icon {
        font-size: 48px;
        margin-bottom: 12px;
    }

    .no-results-text {
        font-size: 15px;
        color: #666;
    }

    /* ========================================
       MAIN CONTENT - RESPONSIVE
    ======================================== */
    main {
        padding: 20px;
        position: relative;
        z-index: 3;
        margin-top: -60px;
    }

    /* Desktop: Wider padding */
    @media (min-width: 768px) {
        main {
            padding: 40px 60px;
            max-width: var(--max-width);
            margin-left: auto;
            margin-right: auto;
        }
    }

    .section {
        margin-bottom: 40px;
    }

    /* Desktop: More spacing */
    @media (min-width: 768px) {
        .section {
            margin-bottom: 60px;
        }
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 800;
        color: var(--dark);
    }

    /* Desktop: Larger section titles */
    @media (min-width: 768px) {
        .section-title {
            font-size: 32px;
        }
    }

    .see-all {
        color: var(--primary);
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: all 0.3s ease;
    }

    .see-all:hover {
        gap: 8px;
    }

    /* ========================================
       POPULAR SLIDER - RESPONSIVE
    ======================================== */
    .popular-slider {
        overflow: visible;
    }

    .popular-card {
        width: 280px;
        flex-shrink: 0;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--dark);
        display: block;
    }

    /* Desktop: Hover effects */
    @media (min-width: 768px) {
        .popular-card {
            width: 320px;
        }
        
        .popular-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
    }

    .popular-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
        height: 180px;
    }

    .popular-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .popular-card:hover .popular-image {
        transform: scale(1.1);
    }

    .popular-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        color: var(--primary);
    }

    .popular-content {
        padding: 20px;
    }

    .popular-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 8px;
        color: var(--dark);
    }

    .popular-location {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #666;
        margin-bottom: 16px;
    }

    .popular-location img {
        width: 16px;
        height: 16px;
    }

    .popular-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .popular-price {
        font-size: 20px;
        font-weight: 800;
        color: var(--primary);
    }

    .popular-rating {
        display: flex;
        align-items: center;
        gap: 4px;
        background: #FFF5E6;
        padding: 6px 12px;
        border-radius: 20px;
    }

    .popular-rating img {
        width: 16px;
        height: 16px;
    }

    .popular-rating span {
        font-size: 13px;
        font-weight: 600;
        color: var(--accent);
    }

    /* ========================================
       CATEGORIES - RESPONSIVE GRID
    ======================================== */
    .categories-slider {
        overflow: visible;
    }

    /* Desktop: Grid layout instead of slider */
    @media (min-width: 768px) {
        .categories-slider {
            display: grid !important;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 16px;
        }
        
        .categories-slider .swiper-wrapper {
            display: contents;
        }
        
        .categories-slider .swiper-slide {
            width: auto !important;
        }
    }

    .category-card {
        width: 110px;
        background: #ffffff;
        border-radius: 16px;
        padding: 20px 16px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--dark);
        display: block;
    }

    /* Desktop: Larger cards */
    @media (min-width: 768px) {
        .category-card {
            width: 100%;
            padding: 24px 20px;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }
    }

    .category-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 12px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .category-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--dark);
    }

    /* ========================================
       SELLERS - RESPONSIVE GRID
    ======================================== */
    .sellers-slider {
        overflow: visible;
    }

    /* Desktop: Grid layout */
    @media (min-width: 768px) {
        .sellers-slider {
            display: grid !important;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .sellers-slider .swiper-wrapper {
            display: contents;
        }
        
        .sellers-slider .swiper-slide {
            width: auto !important;
        }
    }

    .seller-card {
        width: 160px;
        background: #ffffff;
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--dark);
        display: block;
    }

    /* Desktop: Larger cards */
    @media (min-width: 768px) {
        .seller-card {
            width: 100%;
            padding: 30px 24px;
        }
        
        .seller-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }
    }

    .seller-logo-wrapper {
        width: 60px;
        height: 60px;
        margin: 0 auto 12px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #f0f0f0;
    }

    .seller-logo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .seller-name {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 4px;
        color: var(--dark);
    }

    .seller-category {
        font-size: 12px;
        color: #666;
    }

    /* ========================================
       TICKETS LIST - RESPONSIVE GRID
    ======================================== */
    .tickets-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    /* Desktop: Grid layout */
    @media (min-width: 768px) {
        .tickets-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
        }
    }

    .ticket-item {
        display: flex;
        gap: 16px;
        background: #ffffff;
        border-radius: 16px;
        padding: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--dark);
        position: relative;
    }

    /* Desktop: Hover effects */
    @media (min-width: 768px) {
        .ticket-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }
    }

    .ticket-image-wrapper {
        width: 100px;
        height: 100px;
        flex-shrink: 0;
        border-radius: 12px;
        overflow: hidden;
    }

    .ticket-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .ticket-item:hover .ticket-image {
        transform: scale(1.1);
    }

    .ticket-details {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .ticket-name {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 6px;
        color: var(--dark);
    }

    .ticket-location {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 12px;
        color: #666;
        margin-bottom: 8px;
    }

    .ticket-location img {
        width: 14px;
        height: 14px;
    }

    .ticket-price {
        font-size: 16px;
        font-weight: 700;
        color: var(--primary);
    }

    .ticket-rating {
        position: absolute;
        top: 16px;
        right: 16px;
        display: flex;
        align-items: center;
        gap: 4px;
        background: #FFF5E6;
        padding: 4px 10px;
        border-radius: 20px;
    }

    .ticket-rating img {
        width: 14px;
        height: 14px;
    }

    .ticket-rating span {
        font-size: 12px;
        font-weight: 600;
        color: var(--accent);
    }

    /* ========================================
       BOTTOM NAVIGATION - RESPONSIVE
    ======================================== */
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        max-width: var(--container-mobile);
        background: #ffffff;
        border-top: 1px solid #f0f0f0;
        padding: 12px 0;
        z-index: 1000;
        box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.05);
    }

    /* Desktop: Hide on desktop (use top nav instead) */
    @media (min-width: 768px) {
        .bottom-nav {
            display: none;
        }
    }

    .nav-items {
        display: flex;
        justify-content: space-around;
        align-items: center;
        list-style: none;
        max-width: 100%;
        margin: 0 auto;
        padding: 0 20px;
    }

    .nav-item {
        flex: 1;
    }

    .nav-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        text-decoration: none;
        color: #999;
        transition: all 0.3s ease;
    }

    .nav-link.active {
        color: var(--primary);
    }

    .nav-icon {
        width: 24px;
        height: 24px;
    }

    .nav-label {
        font-size: 11px;
        font-weight: 500;
    }

    /* ========================================
       EMPTY STATE
    ======================================== */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #f8f9fa;
        border-radius: 16px;
    }

    .empty-icon {
        font-size: 64px;
        margin-bottom: 16px;
    }

    .empty-text {
        font-size: 15px;
        color: #666;
    }

    /* ========================================
       UTILITY CLASSES
    ======================================== */
    .hidden {
        display: none !important;
    }

    /* ========================================
       DESKTOP TOP NAVIGATION (Optional)
    ======================================== */
    @media (min-width: 768px) {
        .desktop-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: #ffffff;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .desktop-nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .desktop-nav-link {
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            font-size: 15px;
            transition: color 0.3s ease;
        }

        .desktop-nav-link:hover,
        .desktop-nav-link.active {
            color: var(--primary);
        }
    }

    /* ========================================
       PRINT STYLES (Optional)
    ======================================== */
    @media print {
        .header,
        .bottom-nav,
        .desktop-nav {
            display: none;
        }
        
        .app-container {
            box-shadow: none;
        }
    }
</style>

<body>
    <!-- Search Backdrop -->
    <div class="search-backdrop" id="searchBackdrop"></div>

    <div class="app-container">
        <!-- Header -->
        <header class="header">
            <div class="header-content">
                <div class="logo-area">
                    <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="Boncahe Logo" class="logo">
                </div>

                <div class="welcome-text">
                    <h1>Temukan Petualangan<br>Terbaikmu</h1>
                    <p>Jelajahi destinasi wisata menakjubkan di Indonesia</p>
                </div>

                <div class="search-wrapper">
                    <span class="search-icon">🔍</span>
                    <input type="text" 
                           id="searchInput" 
                           class="search-box" 
                           placeholder="Cari destinasi wisata...">
                </div>
            </div>
        </header>

        <!-- Search Dropdown -->
        <div class="search-dropdown" id="searchDropdown">
            @foreach($tickets as $ticket)
                <a href="{{ route('front.details', $ticket->slug) }}" 
                   class="search-dropdown-item" 
                   data-name="{{ strtolower($ticket->name) }}">
                    <img src="{{ Storage::url($ticket->thumbnail) }}" 
                         alt="{{ $ticket->name }}" 
                         class="search-item-image">
                    <div class="search-item-info">
                        <div class="search-item-name">{{ $ticket->name }}</div>
                        <div class="search-item-location">
                            <img src="{{ asset('assets/images/icons/location.svg') }}" alt="location">
                            <span>{{ $ticket->seller->name }}</span>
                        </div>
                    </div>
                </a>
            @endforeach

            <div class="no-results" id="noResults">
                <div class="no-results-icon">😔</div>
                <p class="no-results-text">Tidak ada hasil yang ditemukan</p>
            </div>
        </div>

        <!-- Main Content -->
        <main>
            <!-- Popular Tickets Section -->
            <section class="section">
                <div class="section-header">
                    <h2 class="section-title">Populer</h2>
                    <a href="#" class="see-all">Lihat Semua →</a>
                </div>

                <div class="swiper popular-slider">
                    <div class="swiper-wrapper">
                        @forelse ($popularTickets as $itemPopular)
                            <div class="swiper-slide">
                                <a href="{{ route('front.details', $itemPopular->slug) }}" class="popular-card">
                                    <div class="popular-image-wrapper">
                                        <img src="{{ Storage::url($itemPopular->thumbnail) }}" 
                                             alt="{{ $itemPopular->name }}" 
                                             class="popular-image">
                                        <span class="popular-badge">🔥 Trending</span>
                                    </div>
                                    <div class="popular-content">
                                        <h3 class="popular-title">{{ $itemPopular->name }}</h3>
                                        <div class="popular-location">
                                            <img src="{{ asset('assets/images/icons/location.svg') }}" alt="location">
                                            <span>{{ $itemPopular->seller->name }}</span>
                                        </div>
                                        <div class="popular-footer">
                                            <p class="popular-price">Rp {{ number_format($itemPopular->price, 0, '.', ',') }}</p>
                                            <div class="popular-rating">
                                                <img src="{{ asset('assets/images/icons/Star 1.svg') }}" alt="star">
                                                <span>4.8</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-icon">🎫</div>
                                <p class="empty-text">Belum ada tiket populer</p>
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
                                <a href="{{ route('front.category', $itemCategory->slug) }}" class="category-card">
                                    <div class="category-icon" style="background: {{ $itemCategory->icon ?? '#FFE5D3' }};">
                                        <img src="{{ Storage::url($itemCategory->icon) }}" 
                                             alt="{{ $itemCategory->name }}"
                                             style="width: 32px; height: 32px;">
                                    </div>
                                    <p class="category-name">{{ $itemCategory->name }}</p>
                                </a>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-icon">📂</div>
                                <p class="empty-text">Belum ada kategori</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- Sellers Section -->
            <section class="section">
                <div class="section-header">
                    <h2 class="section-title">Pengelola</h2>
                </div>

                <div class="swiper sellers-slider">
                    <div class="swiper-wrapper">
                        @forelse ($sellers as $itemSeller)
                            <div class="swiper-slide">
                                <a href="{{ route('front.seller', $itemSeller->slug) }}" class="seller-card">
                                    <div class="seller-logo-wrapper">
                                        <img src="{{ Storage::url($itemSeller->avatar) }}" 
                                             alt="{{ $itemSeller->name }}" 
                                             class="seller-logo">
                                    </div>
                                    <p class="seller-name">{{ $itemSeller->name }}</p>
                                    <p class="seller-category">Pengelola Wisata</p>
                                </a>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-icon">🏢</div>
                                <p class="empty-text">Belum ada pengelola</p>
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
                            <p class="empty-text">Belum ada tiket tersedia</p>
                        </div>
                    @endforelse
                </div>
            </section>
        </main>

    
        <!-- Bottom Navigation (Mobile Only) -->
        <nav class="bottom-nav">
            <ul class="nav-items">
                <li class="nav-item">
                    <a href="{{ route('front.index') }}" class="nav-link active">
                        <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                            <path d="M12 6c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"/>
                        </svg>
                        <span class="nav-label">Discover</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('front.check_booking') }}" class="nav-link">
                        <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                        <span class="nav-label">Bookings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        <span class="nav-label">Rewards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                        <span class="nav-label">Support</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swipers
        const swiperPopular = new Swiper('.popular-slider', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            freeMode: true,
            grabCursor: true,
        });

        const swiperCategories = new Swiper('.categories-slider', {
            slidesPerView: 'auto',
            spaceBetween: 12,
            freeMode: true,
            grabCursor: true,
            breakpoints: {
                768: {
                    enabled: false, // Disable swiper on desktop (use grid)
                }
            }
        });

        const swiperSellers = new Swiper('.sellers-slider', {
            slidesPerView: 'auto',
            spaceBetween: 16,
            freeMode: true,
            grabCursor: true,
            breakpoints: {
                768: {
                    enabled: false, // Disable swiper on desktop (use grid)
                }
            }
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const searchDropdown = document.getElementById('searchDropdown');
        const searchItems = document.querySelectorAll('.search-dropdown-item');
        const noResults = document.getElementById('noResults');
        const searchBackdrop = document.getElementById('searchBackdrop');

        function showDropdown() {
            searchDropdown.classList.add('show');
            searchBackdrop.classList.add('show');
            document.body.classList.add('dropdown-open');
        }

        function hideDropdown() {
            searchDropdown.classList.remove('show');
            searchBackdrop.classList.remove('show');
            document.body.classList.remove('dropdown-open');
        }

        searchInput.addEventListener('focus', showDropdown);
        searchBackdrop.addEventListener('click', hideDropdown);

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.search-wrapper') && !e.target.closest('.search-dropdown')) {
                hideDropdown();
            }
        });

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            if (searchTerm === '') {
                searchItems.forEach(item => item.classList.remove('hidden'));
                noResults.classList.remove('show');
                showDropdown();
                return;
            }

            let hasResults = false;

            searchItems.forEach(item => {
                const itemName = item.getAttribute('data-name');
                
                if (itemName.includes(searchTerm)) {
                    item.classList.remove('hidden');
                    hasResults = true;
                } else {
                    item.classList.add('hidden');
                }
            });

            if (hasResults) {
                noResults.classList.remove('show');
            } else {
                noResults.classList.add('show');
            }

            showDropdown();
        });

        // Keyboard navigation
        let currentFocus = -1;

        searchInput.addEventListener('keydown', function(e) {
            const visibleItems = Array.from(searchItems).filter(item => !item.classList.contains('hidden'));
            
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                currentFocus++;
                if (currentFocus >= visibleItems.length) currentFocus = 0;
                setActive(visibleItems);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                currentFocus--;
                if (currentFocus < 0) currentFocus = visibleItems.length - 1;
                setActive(visibleItems);
            } else if (e.key === 'Enter') {
                e.preventDefault();
                if (currentFocus > -1 && visibleItems[currentFocus]) {
                    visibleItems[currentFocus].click();
                }
            } else if (e.key === 'Escape') {
                hideDropdown();
            }
        });

        function setActive(items) {
            items.forEach(item => item.style.background = '');
            if (items[currentFocus]) {
                items[currentFocus].style.background = '#f8f9fa';
                items[currentFocus].scrollIntoView({ block: 'nearest', behavior: 'smooth' });
            }
        }
    </script>
</body>

</html>

