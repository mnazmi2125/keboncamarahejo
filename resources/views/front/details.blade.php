<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #FF6B35;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #e55a25;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Container: Mobile = full width, Desktop = centered with max-width -->
    <div class="relative flex flex-col w-full min-h-screen md:max-w-7xl mx-auto bg-white md:shadow-2xl">
        
        <!-- Header Gallery Section -->
        <header class="relative h-[480px] md:h-[600px] mb-[44px]">
            <!-- Top Navigation -->
            <div id="Absolute-Top-Nav" class="absolute flex items-center justify-between w-full px-4 md:px-8 mt-[60px] md:mt-[80px] z-10">
                <a href="{{ route('front.index') }}" class="transform hover:scale-110 transition-transform">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-all">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </div>
                </a>
                <a href="#" class="transform hover:scale-110 transition-transform">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-all group">
                        <svg class="w-6 h-6 text-gray-800 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Title Overlay -->
            <div id="Title" class="absolute bottom-0 w-full p-4 md:p-8 pt-0 z-10">
                <div class="flex items-center justify-between w-full h-fit rounded-[20px] md:rounded-3xl border border-white/40 p-[12px_16px] md:p-[16px_24px] bg-gradient-to-r from-gray-900/80 to-gray-800/80 backdrop-blur-md shadow-2xl">
                    <div class="flex-1">
                        <h1 class="font-bold text-white text-xl md:text-3xl line-clamp-2 mb-2">{{ $ticket->name }}</h1>
                        <div class="flex items-center gap-2 md:gap-3">
                            <img src="{{ Storage::url($ticket->category->icon_white) }}" class="w-[22px] h-[22px] md:w-7 md:h-7" alt="icon">
                            <p class="text-sm md:text-base leading-[18px] text-white/90">{{ $ticket->category->name }}</p>
                        </div>
                    </div>
                    <div class="flex shrink-0 items-center gap-[4px] md:gap-2 rounded-full p-[8px_12px] md:p-[10px_16px] bg-white shadow-lg">
                        <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-4 h-4 md:w-5 md:h-5" alt="star">
                        <span class="font-semibold text-sm md:text-base leading-[18px]">4/5</span>
                    </div>
                </div>
            </div>

            <!-- Gallery Swiper -->
            <div class="swiper-gallery w-full h-full overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="relative flex items-center w-full h-full bg-[#13181D] overflow-hidden">
                            <img src="{{ Storage::url($ticket->thumbnail) }}" class="absolute w-full h-full object-cover" alt="thumbnail">
                        </div>
                    </div>
                    @forelse ($ticket->photos as $itemPhoto)
                        <div class="swiper-slide">
                            <div class="relative flex items-center w-full h-full bg-[#13181D] overflow-hidden">
                                <img src="{{ Storage::url($itemPhoto->photo) }}" class="absolute w-full h-full object-cover" alt="thumbnail">
                            </div>
                        </div>
                    @empty
                    @endforelse
                    <div class="swiper-slide">
                        <div class="relative flex items-center w-full h-full bg-[#13181D] overflow-hidden">
                            <div id="playBtn" class="absolute w-full h-full z-10 bg-transparent cursor-pointer"></div>
                            <div class="plyr__video-embed" id="player" style="width: 100%; height: 100%;">
                                <iframe src="https://www.youtube.com/embed/{{ $ticket->path_video }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination !relative !bottom-auto flex items-center justify-center gap-[6px] py-5"></div>
            </div>
        </header>

        <!-- Main Content: 1 Column Mobile, 2 Column Desktop -->
        <main id="details" class="flex flex-col md:grid md:grid-cols-3 gap-6 md:gap-8 px-4 md:px-8 pb-[140px] md:pb-[120px]">
            
            <!-- Left Column (Desktop: 2/3 width) -->
            <div class="md:col-span-2 flex flex-col gap-6 md:gap-8">
                
                <!-- Get to Know Section -->
                <section id="Get-to-Know" class="flex flex-col gap-3 md:gap-4 bg-white md:bg-gray-50 md:rounded-2xl md:p-6">
                    <h2 class="font-bold text-lg md:text-2xl leading-[21px] text-gray-800">Get to Know</h2>
                    <div class="text-sm md:text-base leading-[28px] text-gray-600 space-y-4">{!! $ticket->about !!}</div>
                </section>

                <!-- Time Section -->
                <section id="Time" class="flex flex-col gap-3 md:gap-4">
                    <h2 class="font-bold text-lg md:text-2xl leading-[21px] text-gray-800">Operating Hours</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center rounded-2xl md:rounded-3xl p-[16px_20px] md:p-[20px_24px] gap-4 bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-blue-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-sm md:text-base leading-[21px] text-blue-700">Open Time</p>
                                <p class="font-bold text-xl md:text-2xl leading-[27px] text-blue-900">{{ $ticket->open_time_at }}</p>
                            </div>
                        </div>
                        <div class="flex items-center rounded-2xl md:rounded-3xl p-[16px_20px] md:p-[20px_24px] gap-4 bg-gradient-to-br from-orange-50 to-orange-100 border border-orange-200 hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-orange-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-sm md:text-base leading-[21px] text-orange-700">Closed Time</p>
                                <p class="font-bold text-xl md:text-2xl leading-[27px] text-orange-900">{{ $ticket->closed_time_at }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Features Section -->
                <section id="Travel-with-Juara" class="flex flex-col gap-3 md:gap-4">
                    <h2 class="font-bold text-lg md:text-2xl leading-[21px] text-gray-800">Why Choose Us</h2>
                    <div class="grid grid-cols-3 gap-3 md:gap-4">
                        <div class="flex flex-col items-center rounded-2xl md:rounded-3xl p-[16px] md:p-[24px] gap-3 md:gap-4 text-center bg-gradient-to-br from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800 transition-all transform hover:scale-105 shadow-lg">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm md:text-base leading-[21px] text-white mb-1">Security</h3>
                                <p class="text-xs md:text-sm leading-[18px] text-gray-300">24/7 Support</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center rounded-2xl md:rounded-3xl p-[16px] md:p-[24px] gap-3 md:gap-4 text-center bg-gradient-to-br from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800 transition-all transform hover:scale-105 shadow-lg">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-green-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm md:text-base leading-[21px] text-white mb-1">Insurance</h3>
                                <p class="text-xs md:text-sm leading-[18px] text-gray-300">Available</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center rounded-2xl md:rounded-3xl p-[16px] md:p-[24px] gap-3 md:gap-4 text-center bg-gradient-to-br from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800 transition-all transform hover:scale-105 shadow-lg">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-pink-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm md:text-base leading-[21px] text-white mb-1">Comfort</h3>
                                <p class="text-xs md:text-sm leading-[18px] text-gray-300">Easy Refund</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Map Section (Desktop only in left column) -->
                <section id="Map" class="flex flex-col gap-3 md:gap-4 md:hidden">
                    <h2 class="font-bold text-lg md:text-2xl leading-[21px] text-gray-800">Map & Address</h2>
                    <div class="w-full h-[200px] md:h-[300px] overflow-hidden rounded-2xl shadow-lg">
                        <iframe class="w-full h-full" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q={{ $ticket->address }}&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                    </div>
                    <p class="text-sm md:text-base leading-[28px] text-gray-600">{{ $ticket->address }}</p>
                </section>
            </div>

            <!-- Right Column/Sidebar (Desktop: 1/3 width) -->
            <div class="md:col-span-1 flex flex-col gap-6">
                
                <!-- Management/Seller Info -->
                <section id="Management" class="flex flex-col gap-3 md:gap-4 md:sticky md:top-8">
                    <h2 class="font-bold text-lg md:text-2xl leading-[21px] text-gray-800">Management</h2>
                    <div class="flex flex-col md:flex-col items-start md:items-start gap-4 rounded-2xl md:rounded-3xl p-5 md:p-6 bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 hover:shadow-xl transition-shadow">
                        <div class="flex items-center gap-4 w-full">
                            <div class="w-[60px] h-[60px] md:w-[80px] md:h-[80px] rounded-2xl overflow-hidden ring-4 ring-orange-500/20">
                                <img src="{{ Storage::url($ticket->seller->photo) }}" class="w-full h-full object-cover" alt="">
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-lg md:text-xl leading-[27px] text-gray-800">{{ $ticket->seller->name }}</p>
                                <p class="text-sm md:text-base leading-[21px] text-gray-600">{{ $ticket->seller->tickets->count() }} Places</p>
                            </div>
                        </div>
                        <a href="#" class="w-full">
                            <div class="flex items-center justify-center gap-3 w-full py-3 px-4 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 rounded-xl text-white font-semibold transition-all hover:shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Contact Seller
                            </div>
                        </a>
                    </div>

                    <!-- Map on Desktop (Sidebar) -->
                    <div class="hidden md:block">
                        <h2 class="font-bold text-lg md:text-2xl leading-[21px] text-gray-800 mb-4">Location</h2>
                        <div class="w-full h-[300px] overflow-hidden rounded-2xl shadow-lg mb-4">
                            <iframe class="w-full h-full" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q={{ $ticket->address }}&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>
                        <div class="flex items-start gap-3 text-sm text-gray-600">
                            <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p class="leading-relaxed">{{ $ticket->address }}</p>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- Bottom Navigation/Booking Bar -->
        <nav id="Bottom-Nav-Book" class="fixed bottom-0 left-0 right-0 md:relative md:bottom-auto flex items-center justify-between w-full md:max-w-7xl mx-auto bg-white md:bg-gradient-to-r md:from-gray-50 md:to-white p-4 md:p-6 z-30 border-t border-gray-200 shadow-2xl md:shadow-none">
            <div class="flex-1">
                <p class="text-xs md:text-sm text-gray-500 mb-1">Price per person</p>
                <p class="font-bold text-2xl md:text-3xl leading-[26px] bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">
                    Rp {{ number_format($ticket->price, 0, '.', ',') }}
                </p>
            </div>
            <a href="{{ route('front.booking', $ticket->slug) }}" class="transform hover:scale-105 transition-transform">
                <div class="flex items-center p-2 md:p-3 pl-6 md:pl-8 w-fit gap-3 md:gap-4 rounded-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 shadow-lg hover:shadow-xl transition-all">
                    <p class="font-bold text-white text-base md:text-lg">Book Now</p>
                    <div class="w-[50px] h-[50px] md:w-[60px] md:h-[60px] bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
            </a>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script>
        // Swiper Gallery
        const swiperGallery = new Swiper('.swiper-gallery', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });

        // Plyr Video
        const player = new Plyr('#player', {
            controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
            speed: {
                selected: 1
            }
        });

        const playBtn = document.getElementById("playBtn");
        let played = false;

        playBtn.addEventListener("click", () => {
            if (!played) {
                player.play();
                played = true;
                playBtn.style.display = 'none';
            }
        });

        // Hide play button when video starts
        player.on('play', () => {
            playBtn.style.display = 'none';
            played = true;
        });

        // Show play button when video ends
        player.on('ended', () => {
            playBtn.style.display = 'block';
            played = false;
        });
    </script>
</body>

</html>