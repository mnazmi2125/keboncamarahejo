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
    
    /* File upload animation */
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .slide-up { animation: slideUp 0.3s ease; }
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
                        <div class="w-20 h-20 mx-auto mb-6 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">Almost Done!</h1>
                        <p class="text-xl text-white/90 mb-6">Complete your payment</p>
                        <p class="text-lg text-white/80">{{$ticket->name}}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Payment Content -->
        <div class="w-full md:w-1/2 lg:w-3/5 md:ml-auto relative">
            <!-- Mobile background (only on mobile) -->
            <div id="background" class="fixed md:hidden w-full max-w-[640px] top-0 h-screen z-0">
                <div class="absolute z-0 w-full h-[459px] bg-[linear-gradient(180deg,#000000_12.61%,rgba(0,0,0,0)_70.74%)]"></div>
                <img src="{{Storage::url($ticket->thumbnail)}}" class="w-full h-full object-cover" alt="background">
            </div>

            <!-- Top Navigation -->
            <div id="Top-Nav-Fixed" class="relative flex items-center justify-between w-full px-4 md:px-8 mt-[60px] md:mt-8 z-20">
                <div class="flex items-center justify-between w-full md:max-w-4xl md:mx-auto">
                    <a href="{{ route('front.booking', $ticket->slug) }}" class="transform hover:scale-110 transition-transform">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-white md:bg-white/90 rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-all">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                        </div>
                    </a>
                    <h1 class="font-bold text-lg md:text-2xl leading-[27px] text-white md:text-gray-800">Payment</h1>
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('front.payment_store') }}" class="relative flex flex-col w-full px-4 md:px-8 gap-[18px] md:gap-6 mt-5 md:mt-8 pb-[30px] md:pb-12 overflow-x-hidden">
                @csrf
                
                <!-- Max width container for desktop -->
                <div class="w-full md:max-w-4xl md:mx-auto space-y-6">
                    
                    <!-- Ticket Info Card -->
                    <div class="flex items-center justify-between rounded-3xl p-[6px] pr-[14px] md:p-4 md:pr-6 bg-white shadow-xl overflow-hidden slide-up">
                        <div class="flex items-center gap-[14px] md:gap-6">
                            <div class="flex w-[90px] h-[90px] md:w-[120px] md:h-[120px] shrink-0 rounded-3xl bg-[#D9D9D9] overflow-hidden ring-4 ring-orange-500/20">
                                <img src="{{Storage::url($ticket->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-[6px] md:gap-2">
                                <h3 class="font-semibold text-base md:text-xl">{{ $ticket->name }}</h3>
                                <div class="flex items-center gap-1 md:gap-2">
                                    <svg class="w-[18px] h-[18px] md:w-5 md:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <p class="font-semibold text-xs md:text-sm leading-[18px] text-gray-700">{{ $ticket->seller->name }}</p>
                                </div>
                                <p class="font-bold text-sm md:text-lg leading-[21px] text-[#F97316]">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="w-fit flex shrink-0 items-center gap-[2px] rounded-full p-[6px_8px] md:p-[8px_12px] bg-[#FFE5D3]">
                            <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="w-4 h-4 md:w-5 md:h-5" alt="star">
                            <span class="font-semibold text-xs md:text-sm leading-[18px] text-[#F97316]">4/5</span>
                        </div>
                    </div>
                    
                    <!-- Payment Summary -->
                    <div class="flex flex-col rounded-[30px] p-5 md:p-8 gap-[14px] md:gap-4 bg-white shadow-xl slide-up" style="animation-delay: 0.1s;">
                        <h2 class="font-bold text-lg md:text-xl text-gray-800 mb-2">Payment Summary</h2>
                        
                        <!-- Grid for desktop -->
                        <div class="space-y-3 md:space-y-4">
                            <div class="flex items-center justify-between p-3 md:p-4 rounded-2xl bg-gradient-to-r from-gray-50 to-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                    </div>
                                    <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-700">Total People</p>
                                </div>
                                <p class="font-bold text-sm md:text-base text-gray-800">{{ $booking['total_participant'] }} Participant</p>
                            </div>
                            
                            <div class="flex items-center justify-between px-3 md:px-4">
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-600">Sub Total</p>
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-800">Rp {{ number_format($booking['sub_total'], 0, ',', '.') }}</p>
                            </div>
                            
                            <div class="flex items-center justify-between px-3 md:px-4">
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-600">Pajak (11%)</p>
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-800">Rp {{ number_format($booking['total_ppn'], 0, ',', '.') }}</p>
                            </div>
                            
                            <div class="flex items-center justify-between px-3 md:px-4">
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-600">Discount</p>
                                <p class="font-semibold text-sm md:text-base leading-[21px] text-green-600">Rp 0</p>
                            </div>
                            
                            <div class="flex items-center justify-between p-3 md:p-4 rounded-2xl bg-gradient-to-r from-green-50 to-emerald-50">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-700">Insurance</p>
                                </div>
                                <p class="font-bold text-sm md:text-base text-green-600">Included 100%</p>
                            </div>
                            
                            <!-- Grand Total -->
                            <div class="flex items-center justify-between pt-4 md:pt-6 border-t-2 border-gray-300">
                                <div>
                                    <p class="font-semibold text-sm md:text-base leading-[21px] text-gray-600">Grand Total</p>
                                    <p class="text-xs md:text-sm text-gray-500 mt-1">All fees included</p>
                                </div>
                                <p class="font-bold text-[22px] md:text-[28px] leading-[33px] text-[#F97316]">Rp {{ number_format($booking['total_amount'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="flex flex-col rounded-[30px] p-5 md:p-8 gap-6 md:gap-8 bg-white shadow-xl slide-up" style="animation-delay: 0.2s;">
                        <h2 class="font-bold text-lg md:text-xl text-gray-800">Payment Method</h2>
                        
                        <!-- Payment Options -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-[10px] md:gap-4">
                            <label for="transfer" class="relative group cursor-pointer">
                                <div class="flex items-center h-full rounded-2xl md:rounded-3xl p-[14px_12px] md:p-[18px_20px] gap-[6px] md:gap-4 bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-transparent transition-all duration-300 group-has-[:checked]:border-orange-500 group-has-[:checked]:shadow-lg group-has-[:checked]:shadow-orange-500/20 hover:border-orange-300">
                                    <div class="w-10 h-10 md:w-12 md:h-12 bg-orange-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                        </svg>
                                    </div>
                                    <p class="font-semibold text-sm md:text-base leading-[21px]">Transfer Bank</p>
                                </div>
                                <input type="radio" name="payment-method" id="transfer" class="absolute top-1/2 left-1/2 -z-10 opacity-0" required>
                            </label>
                            
                            <label for="credit" class="relative group cursor-pointer">
                                <div class="flex items-center h-full rounded-2xl md:rounded-3xl p-[14px_12px] md:p-[18px_20px] gap-[6px] md:gap-4 bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-transparent transition-all duration-300 group-has-[:checked]:border-orange-500 group-has-[:checked]:shadow-lg group-has-[:checked]:shadow-orange-500/20 hover:border-orange-300">
                                    <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                        </svg>
                                    </div>
                                    <p class="font-semibold text-sm md:text-base leading-[21px]">Credit Card</p>
                                </div>
                                <input type="radio" name="payment-method" id="credit" class="absolute top-1/2 left-1/2 -z-10 opacity-0" required>
                            </label>
                        </div>
                        
                        <!-- Bank Account Info -->
                        <div class="space-y-4">
                            <p class="font-semibold text-sm md:text-base text-gray-700">Transfer to:</p>
                            
                            <div class="flex items-center gap-3 md:gap-4 p-4 md:p-5 rounded-2xl bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 hover:shadow-md transition-shadow">
                                <div class="h-[50px] w-[71px] md:h-[60px] md:w-[85px] overflow-hidden bg-white rounded-xl flex items-center justify-center p-2">
                                    <img src="{{asset('assets/images/logos/bca.svg')}}" class="h-full w-full object-contain" alt="bank logo">
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-base md:text-lg text-gray-800">Muhammad Nazmi</p>
                                    <p class="font-mono text-sm md:text-base text-gray-600">8008129839</p>
                                </div>
                                <button type="button" onclick="navigator.clipboard.writeText('8008129839')" class="p-2 md:p-3 bg-blue-500 hover:bg-blue-600 rounded-xl transition-colors">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="flex items-center gap-3 md:gap-4 p-4 md:p-5 rounded-2xl bg-gradient-to-r from-yellow-50 to-amber-100 border border-yellow-200 hover:shadow-md transition-shadow">
                                <div class="h-[50px] w-[71px] md:h-[60px] md:w-[85px] overflow-hidden bg-white rounded-xl flex items-center justify-center p-2">
                                    <img src="{{asset('assets/images/logos/mandiri.svg')}}" class="h-full w-full object-contain" alt="bank logo">
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-base md:text-lg text-gray-800">Muhammad Nazmi</p>
                                    <p class="font-mono text-sm md:text-base text-gray-600">12379834983281</p>
                                </div>
                                <button type="button" onclick="navigator.clipboard.writeText('12379834983281')" class="p-2 md:p-3 bg-yellow-500 hover:bg-yellow-600 rounded-xl transition-colors">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Upload Proof -->
                    <div class="flex flex-col rounded-[30px] p-5 md:p-8 gap-6 md:gap-8 bg-white shadow-xl slide-up" style="animation-delay: 0.3s;">
                        <h2 class="font-bold text-lg md:text-xl text-gray-800">Upload Payment Proof</h2>
                        
                        <div class="group w-full rounded-2xl md:rounded-3xl px-5 md:px-6 flex items-center gap-[10px] md:gap-4 bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-dashed border-gray-300 hover:border-orange-500 relative transition-all duration-300">
                            <div class="w-6 h-6 md:w-8 md:h-8 flex shrink-0">
                                <svg class="w-full h-full text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                            </div>
                            <button type="button" id="Upload-btn" class="appearance-none outline-none w-full py-[14px] md:py-5 text-left text-sm md:text-base leading-[21px] overflow-hidden font-medium text-gray-700" onclick="document.getElementById('Proof').click()">
                                <span id="file-name">Click to upload payment proof</span>
                            </button>
                            <div class="w-6 h-6 md:w-8 md:h-8 flex shrink-0">
                                <svg class="w-full h-full text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <input type="file" name="proof" id="Proof" class="absolute -z-10 opacity-0" accept="image/*" required onchange="updateFileName(this)">
                        </div>
                        
                        <p class="text-xs md:text-sm text-gray-500 text-center">Supported formats: JPG, PNG (Max 5MB)</p>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="flex items-center justify-between p-1 md:p-2 pl-5 md:pl-8 w-full gap-4 md:gap-6 rounded-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 shadow-xl hover:shadow-2xl transform hover:scale-[1.02] transition-all">
                            <p class="font-bold text-white text-base md:text-lg">Confirm My Payment</p>
                            <div class="w-[50px] h-[50px] md:w-[60px] md:h-[60px] bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Update file name when file is selected
        function updateFileName(input) {
            const fileName = input.files[0]?.name || 'Click to upload payment proof';
            document.getElementById('file-name').textContent = fileName;
            
            // Add success animation
            if (input.files[0]) {
                const fileNameEl = document.getElementById('file-name');
                fileNameEl.classList.add('text-green-600', 'font-semibold');
            }
        }
        
        // Copy to clipboard notification
        let copyButtons = document.querySelectorAll('button[onclick^="navigator.clipboard"]');
        copyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const originalHTML = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
                setTimeout(() => {
                    this.innerHTML = originalHTML;
                }, 1000);
            });
        });
    </script>
    
    <script src="{{ asset('js/payment.js') }}"></script>
</body>
</html>