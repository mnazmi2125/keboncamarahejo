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

    /* Floating animation */
    @keyframes float {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-20px);
      }
    }

    .float-animation {
      animation: float 3s ease-in-out infinite;
    }

    /* Pulse animation for icon */
    @keyframes pulse-glow {
      0%, 100% {
        box-shadow: 0 0 20px rgba(249, 115, 22, 0.4);
      }
      50% {
        box-shadow: 0 0 40px rgba(249, 115, 22, 0.8);
      }
    }

    .pulse-glow {
      animation: pulse-glow 2s ease-in-out infinite;
    }
  </style>
</head>
<body class="bg-gray-50">
    <!-- Container: Mobile = full screen, Desktop = split screen -->
    <div class="relative flex flex-col md:flex-row w-full min-h-screen">
        
        <!-- Left Side: Illustration (Desktop only) -->
        <div class="hidden md:flex md:w-1/2 lg:w-2/5 relative bg-gradient-to-br from-orange-500 via-orange-600 to-amber-600">
            <div class="fixed top-0 left-0 w-1/2 lg:w-2/5 h-screen flex items-center justify-center p-12">
                <div class="text-center">
                    <!-- Animated Icon -->
                    <div class="w-40 h-40 mx-auto mb-8 bg-white rounded-full flex items-center justify-center shadow-2xl pulse-glow float-animation">
                        <svg class="w-20 h-20 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-bold text-white mb-6">Check Your Booking</h1>
                    <p class="text-xl text-white/90 mb-4">Enter your details to view tickets</p>
                    <p class="text-lg text-white/80">Track your adventure status</p>
                    
                    <!-- Decorative elements -->
                    <div class="mt-12 grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mx-auto mb-2 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p class="text-white/80 text-sm">Fast</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mx-auto mb-2 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <p class="text-white/80 text-sm">Secure</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mx-auto mb-2 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <p class="text-white/80 text-sm">Easy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Form Content -->
        <div class="w-full md:w-1/2 lg:w-3/5 md:ml-auto relative flex items-center justify-center min-h-screen">
            <!-- Mobile Background (Gradient) -->
            <div class="md:hidden fixed inset-0 bg-gradient-to-br from-orange-500 via-orange-600 to-amber-600 z-0"></div>

            <!-- Form Container -->
            <main class="relative z-10 flex flex-col justify-center items-center w-full px-4 md:px-8 py-8">
                <div class="w-full md:max-w-md">
                    
                    <!-- Mobile Icon -->
                    <div class="md:hidden flex justify-center mb-8">
                        <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-2xl pulse-glow">
                            <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Form Card -->
                    <form method="POST" action="{{ route('front.check_booking_details') }}" class="bg-white rounded-[30px] p-6 md:p-8 shadow-2xl">
                        @csrf
                        
                        <!-- Header -->
                        <div class="text-center mb-8">
                            <div class="hidden md:block w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                </svg>
                            </div>
                            <h1 class="font-bold text-2xl md:text-3xl text-gray-800 mb-2">View Your Tickets</h1>
                            <p class="text-gray-600 text-sm md:text-base">Enter your booking details to continue</p>
                        </div>

                        <!-- Booking ID Input -->
                        <div class="mb-6">
                            <label for="bookId" class="block font-semibold text-sm md:text-base text-gray-700 mb-2">Booking ID</label>
                            <div class="flex items-center rounded-2xl md:rounded-3xl px-5 md:px-6 gap-3 md:gap-4 bg-gray-50 border-2 border-transparent transition-all duration-300 focus-within:border-orange-500 focus-within:bg-white focus-within:shadow-lg">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <input 
                                    type="text" 
                                    name="booking_trx_id" 
                                    id="bookId" 
                                    class="appearance-none outline-none py-4 md:py-5 bg-transparent w-full font-semibold text-sm md:text-base text-gray-800 placeholder:font-normal placeholder:text-gray-400" 
                                    placeholder="Enter your booking ID"
                                    required>
                            </div>
                            <p class="text-xs md:text-sm text-gray-500 mt-2 ml-1">Example: JRT4307</p>
                        </div>

                        <!-- Phone Number Input -->
                        <div class="mb-8">
                            <label for="phone" class="block font-semibold text-sm md:text-base text-gray-700 mb-2">Phone Number</label>
                            <div class="flex items-center rounded-2xl md:rounded-3xl px-5 md:px-6 gap-3 md:gap-4 bg-gray-50 border-2 border-transparent transition-all duration-300 focus-within:border-orange-500 focus-within:bg-white focus-within:shadow-lg">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <input 
                                    type="tel" 
                                    name="phone_number" 
                                    id="phone" 
                                    class="appearance-none outline-none py-4 md:py-5 bg-transparent w-full font-semibold text-sm md:text-base text-gray-800 placeholder:font-normal placeholder:text-gray-400" 
                                    placeholder="Enter your phone number"
                                    required>
                            </div>
                            <p class="text-xs md:text-sm text-gray-500 mt-2 ml-1">Use the same number from booking</p>
                        </div>

                        <!-- Info Card -->
                        <div class="mb-8 p-4 md:p-5 bg-blue-50 border-l-4 border-blue-500 rounded-xl">
                            <div class="flex gap-3">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <p class="font-semibold text-sm md:text-base text-blue-800 mb-1">Quick Tip</p>
                                    <p class="text-xs md:text-sm text-blue-700">Your booking ID was sent to your email after payment confirmation</p>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full rounded-full py-4 md:py-5 px-6 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold text-base md:text-lg shadow-lg hover:shadow-xl transition-all transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Find My Booking
                        </button>

                        <!-- Back to Home Link -->
                        <div class="text-center mt-6">
                            <a href="{{ route('front.index') }}" class="text-sm md:text-base text-gray-600 hover:text-orange-600 transition-colors inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Back to Home
                            </a>
                        </div>
                    </form>
                </div>
            </main>

            <!-- Bottom Navigation -->
            @include('components.navbar')
        </div>
    </div>
</body>
</html>