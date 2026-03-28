<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
      background: #F97316;
      border-radius: 4px;
    }
    
    /* Smooth transitions */
    * {
      transition-property: background-color, border-color, color, fill, stroke;
      transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
      transition-duration: 150ms;
    }
  </style>
</head>
<body class="bg-gray-50">
    <!-- Container: Mobile = full screen, Desktop = split screen -->
    <div class="relative flex flex-col md:flex-row w-full min-h-screen">
        
        <!-- Left Side: Background Image (Desktop only) -->
        <div class="hidden md:block md:w-1/2 lg:w-2/5 relative">
            <!-- Fixed background for desktop -->
            <div class="fixed top-0 left-0 w-1/2 lg:w-2/5 h-screen">
                <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/40 to-black/60 z-10"></div>
                <img src="{{Storage::url($ticket->thumbnail)}}" class="w-full h-full object-cover" alt="background">
                
                <!-- Overlay content on image -->
                <div class="absolute inset-0 z-20 flex flex-col justify-center items-center text-center px-12">
                    <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20">
                        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">{{$ticket->name}}</h1>
                        <p class="text-xl text-white/90 mb-6">Complete your booking</p>
                        <div class="flex items-center justify-center gap-3 text-white/80">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p class="text-lg">{{$ticket->seller->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Form Content -->
        <div class="w-full md:w-1/2 lg:w-3/5 md:ml-auto relative">
            <!-- Mobile background (only on mobile) -->
            <div id="background" class="fixed md:hidden w-full max-w-[640px] top-0 h-screen z-0">
                <div class="absolute z-0 w-full h-[459px] bg-[linear-gradient(180deg,#000000_12.61%,rgba(0,0,0,0)_70.74%)]"></div>
                <img src="{{Storage::url($ticket->thumbnail)}}" class="w-full h-full object-cover" alt="background">
            </div>

            <!-- Top Navigation -->
            <div id="Top-Nav-Fixed" class="relative flex items-center justify-between w-full px-4 md:px-8 mt-[60px] md:mt-8 z-20">
                <div class="flex items-center justify-between w-full md:max-w-4xl md:mx-auto">
                    <a href="{{ route('front.details', $ticket->slug) }}" class="transform hover:scale-110 transition-transform">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-white md:bg-white/90 rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-all">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                        </div>
                    </a>
                    <h1 class="font-bold text-lg md:text-2xl leading-[27px] text-white md:text-gray-800">Book a Ticket</h1>
                    <a href="#" class="transform hover:scale-110 transition-transform">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-white md:bg-white/90 rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-all group">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-gray-800 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Form Container -->
            <form method="POST" action="{{route('front.booking_store', $ticket->slug)}}" class="relative flex flex-col w-full px-4 md:px-8 gap-[18px] md:gap-6 mt-5 md:mt-8 pb-[30px] md:pb-12 overflow-x-hidden">
                @csrf
                
                <!-- Max width container for desktop -->
                <div class="w-full md:max-w-4xl md:mx-auto space-y-6">
                    
                    <!-- Ticket Info Card -->
                    <div class="flex items-center justify-between rounded-3xl p-[6px] pr-[14px] md:p-4 md:pr-6 bg-white shadow-xl overflow-hidden">
                        <div class="flex items-center gap-[14px] md:gap-6">
                            <div class="flex w-[90px] h-[90px] md:w-[120px] md:h-[120px] shrink-0 rounded-3xl bg-[#D9D9D9] overflow-hidden ring-4 ring-orange-500/20">
                                <img src="{{Storage::url($ticket->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-[6px] md:gap-2">
                                <h3 class="font-semibold text-base md:text-xl">{{$ticket->name}}</h3>
                                <div class="flex items-center gap-1 md:gap-2">
                                    <svg class="w-[18px] h-[18px] md:w-5 md:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <p class="font-semibold text-xs md:text-sm leading-[18px] text-gray-700">{{$ticket->seller->name}}</p>
                                </div>
                                <p class="font-bold text-sm md:text-lg leading-[21px] text-[#F97316]">Rp {{number_format($ticket->price, 0, ',', '.')}}</p>
                                <input type="hidden" name="realTicketPrice" id="realTicketPrice" value="{{$ticket->price}}">
                            </div>
                        </div>
                        <div class="w-fit flex shrink-0 items-center gap-[2px] rounded-full p-[6px_8px] md:p-[8px_12px] bg-[#FFE5D3]">
                            <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="w-4 h-4 md:w-5 md:h-5" alt="star">
                            <span class="font-semibold text-xs md:text-sm leading-[18px] text-[#F97316]">4/5</span>
                        </div>
                    </div>
                    
                    <!-- Personal Information -->
                    <div class="flex flex-col rounded-[30px] p-5 md:p-8 gap-[14px] md:gap-6 bg-white shadow-xl">
                        <h2 class="font-bold text-lg md:text-xl text-gray-800 mb-2">Personal Information</h2>
                        
                        <!-- Grid for desktop (2 columns) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-[14px] md:gap-6">
                            <div class="flex flex-col gap-[6px] md:col-span-2">
                                <label for="name" class="font-semibold text-sm md:text-base leading-[21px]">Full Name</label>
                                <div class="flex items-center rounded-full md:rounded-2xl px-5 md:px-6 gap-[10px] md:gap-4 bg-[#F8F8F9] transition-all duration-300 focus-within:ring-2 focus-within:ring-[#F97316]">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <input type="text" name="name" id="name" class="appearance-none outline-none py-[14px] md:py-4 !bg-transparent w-full font-semibold text-sm md:text-base leading-[21px] placeholder:font-normal placeholder:text-gray-400" placeholder="Write your complete name" value="{{ old('name') }}" required>
                                </div>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-[6px]">
                                <label for="email" class="font-semibold text-sm md:text-base leading-[21px]">Email</label>
                                <div class="flex items-center rounded-full md:rounded-2xl px-5 md:px-6 gap-[10px] md:gap-4 bg-[#F8F8F9] transition-all duration-300 focus-within:ring-2 focus-within:ring-[#F97316]">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <input type="email" name="email" id="email" class="appearance-none outline-none py-[14px] md:py-4 !bg-transparent w-full font-semibold text-sm md:text-base leading-[21px] placeholder:font-normal placeholder:text-gray-400" placeholder="Write your email" value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-[6px]">
                                <label for="phone" class="font-semibold text-sm md:text-base leading-[21px]">Phone No.</label>
                                <div class="flex items-center rounded-full md:rounded-2xl px-5 md:px-6 gap-[10px] md:gap-4 bg-[#F8F8F9] transition-all duration-300 focus-within:ring-2 focus-within:ring-[#F97316]">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <input type="tel" name="phone_number" id="phone" class="appearance-none outline-none py-[14px] md:py-4 !bg-transparent w-full font-semibold text-sm md:text-base leading-[21px] placeholder:font-normal placeholder:text-gray-400" placeholder="Give us your number" value="{{ old('phone_number') }}" required>
                                </div>
                                @error('phone_number')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-[6px] md:col-span-2">
                                <label for="started_at" class="font-semibold text-sm md:text-base leading-[21px]">Choose Date</label>
                                <div class="flex items-center rounded-full md:rounded-2xl px-5 md:px-6 gap-[10px] md:gap-4 bg-[#F8F8F9] transition-all duration-300 focus-within:ring-2 focus-within:ring-[#F97316]">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <input type="date" name="started_at" id="started_at" class="appearance-none outline-none py-[14px] md:py-4 !bg-transparent w-full font-semibold text-sm md:text-base leading-[21px] placeholder:font-normal placeholder:text-gray-400" value="{{ old('started_at') }}" required>
                                </div>
                                @error('started_at')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Extra Services --}}
                        @if(isset($extraServices) && $extraServices->count() > 0)
                            <div class="flex flex-col gap-[6px] md:gap-4 mt-4 md:mt-6">
                                <label class="font-semibold text-sm md:text-base leading-[21px]">
                                    Tambahan Peralatan Camping <span class="text-gray-400 font-normal text-xs md:text-sm">(Opsional)</span>
                                </label>
                                
                                <div id="extra-services-container" class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                                    @foreach($extraServices as $index => $service)
                                        <div class="extra-service-item flex items-center justify-between p-3 md:p-4 rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 hover:border-orange-300 hover:shadow-md transition-all" 
                                             data-service-slug="{{ $service->slug }}" 
                                             data-service-price="{{ $service->price }}"
                                             data-service-name="{{ $service->name }}">
                                            
                                            <div class="flex-1">
                                                <p class="font-semibold text-sm md:text-base">{{ $service->name }}</p>
                                                <p class="text-xs md:text-sm text-orange-600 font-medium">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                                            </div>
                                            
                                            <div class="flex items-center gap-2 md:gap-3">
                                                <button type="button" 
                                                        class="minus-service w-8 h-8 md:w-10 md:h-10 rounded-full bg-white border-2 border-gray-300 hover:border-orange-500 flex items-center justify-center transition-all hover:scale-110"
                                                        data-index="{{ $index }}">
                                                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                    </svg>
                                                </button>
                                                
                                                <span class="service-qty font-bold text-sm md:text-base w-6 md:w-8 text-center" id="qty-{{ $index }}">0</span>
                                                
                                                <button type="button" 
                                                        class="plus-service w-8 h-8 md:w-10 md:h-10 rounded-full bg-orange-500 hover:bg-orange-600 text-white flex items-center justify-center transition-all hover:scale-110 shadow-md"
                                                        data-index="{{ $index }}">
                                                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            
                                            <input type="hidden" name="extra_services[{{ $index }}][slug]" value="{{ $service->slug }}">
                                            <input type="hidden" name="extra_services[{{ $index }}][name]" value="{{ $service->name }}">
                                            <input type="hidden" name="extra_services[{{ $index }}][price]" value="{{ $service->price }}">
                                            <input type="hidden" name="extra_services[{{ $index }}][quantity]" class="service-quantity-input" value="0">
                                        </div>
                                    @endforeach
                                </div>
                                
                                <input type="hidden" name="extra_service_price" id="extraServicePrice" value="0">
                            </div>
                        @endif
                    </div>

                    <!-- Participants & Summary -->
                    <div class="flex flex-col rounded-[30px] p-5 md:p-8 gap-6 md:gap-8 bg-white shadow-xl">
                        <h2 class="font-bold text-lg md:text-xl text-gray-800">Booking Summary</h2>
                        
                        <!-- Participants Counter -->
                        <div class="flex justify-between items-center p-4 md:p-6 bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl">
                            <div>
                                <p class="font-bold text-base md:text-lg text-gray-800">How Many People?</p>
                                <p class="text-xs md:text-sm text-gray-600 mt-1">Select participants</p>
                            </div>
                            <div id="counter" class="flex items-center justify-between w-fit min-w-[135px] md:min-w-[160px] rounded-full p-[14px_20px] md:p-[16px_24px] gap-[14px] md:gap-6 bg-white shadow-lg">
                                <button type="button" id="minus" class="w-6 h-6 md:w-8 md:h-8 hover:scale-110 transition-transform">
                                    <svg class="w-full h-full text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <p id="count-text" class="font-bold text-lg md:text-xl">1</p>
                                <input type="number" name="total_participant" id="people" value="1" class="hidden">
                                <button type="button" id="plus" class="w-6 h-6 md:w-8 md:h-8 hover:scale-110 transition-transform">
                                    <svg class="w-full h-full text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Extra Services Summary -->
                        <div id="extra-services-summary" class="hidden flex-col gap-3 md:gap-4">
                            <div class="flex items-center justify-between">
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-600">Peralatan Tambahan</p>
                            </div>
                            <div id="extra-services-list" class="flex flex-col gap-2 md:gap-3">
                                {{-- Populated by JavaScript --}}
                            </div>
                            <div class="flex items-center justify-between pt-2 md:pt-3 border-t-2 border-gray-200">
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-600">Total Tambahan</p>
                                <p id="extra-services-total-display" class="font-bold text-sm md:text-base leading-[21px] text-[#F97316]">Rp 0</p>
                            </div>
                        </div>

                        <!-- Total Price -->
                        <div class="flex items-center justify-between pt-4 md:pt-6 border-t-2 border-gray-300">
                            <div>
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-600">Sub Total</p>
                                <p class="text-xs md:text-sm text-gray-500 mt-1">Including all fees</p>
                            </div>
                            <p id="total-price" class="font-bold text-[22px] md:text-[28px] leading-[33px] text-[#F97316]"></p>
                        </div>
                        
                        <input type="hidden" name="sub_total" id="subTotal">
                        <input type="hidden" name="total_ppn" id="totalPpn">
                        <input type="hidden" name="total_amount" id="totalAmount">
                        
                        <!-- Submit Button -->
                        <button type="submit" class="flex items-center justify-between p-1 md:p-2 pl-5 md:pl-8 w-full gap-4 md:gap-6 rounded-full bg-gradient-to-r from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800 shadow-xl hover:shadow-2xl transform hover:scale-[1.02] transition-all">
                            <p class="font-bold text-white text-base md:text-lg">Continue to Checkout</p>
                            <div class="w-[50px] h-[50px] md:w-[60px] md:h-[60px] bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('js/booking.js')}}"></script>
</body>
</html>