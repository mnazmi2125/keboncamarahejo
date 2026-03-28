<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  
  <!-- QR Code Generator -->
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
  
  <!-- HTML to PDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    
    /* Confetti Animation */
    @keyframes confetti-fall {
      0% {
        transform: translateY(-100vh) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(100vh) rotate(720deg);
        opacity: 0;
      }
    }
    
    .confetti {
      position: fixed;
      width: 10px;
      height: 10px;
      background: #f97316;
      animation: confetti-fall 3s linear forwards;
      z-index: 9999;
    }
    
    /* Paper Texture */
    .paper-texture {
      background-image: 
        linear-gradient(90deg, rgba(0,0,0,.03) 1px, transparent 1px),
        linear-gradient(rgba(0,0,0,.03) 1px, transparent 1px);
      background-size: 20px 20px;
    }
    
    /* Perforated Edge */
    .perforated-top {
      position: relative;
    }
    
    .perforated-top::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 2px;
      background-image: radial-gradient(circle, transparent 0%, transparent 50%, white 50%, white 100%);
      background-size: 15px 15px;
      background-position: 0 0;
    }
    
    /* Barcode */
    .barcode {
      background: repeating-linear-gradient(
        90deg,
        #000 0px,
        #000 2px,
        transparent 2px,
        transparent 4px,
        #000 4px,
        #000 6px,
        transparent 6px,
        transparent 10px
      );
      height: 60px;
    }
    
    /* Success Animation */
    @keyframes scaleIn {
      0% {
        transform: scale(0);
        opacity: 0;
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }
    
    .scale-in {
      animation: scaleIn 0.5s ease-out forwards;
    }
    
    /* Pulse Animation */
    @keyframes pulse {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
    }
    
    .pulse-slow {
      animation: pulse 2s ease-in-out infinite;
    }
  </style>
</head>
<body class="bg-gray-50">
    <!-- Container: Mobile = full screen, Desktop = centered -->
    <div class="relative flex flex-col md:flex-row w-full min-h-screen">
        
        <!-- Left Side: Background (Desktop only) -->
        <div class="hidden md:block md:w-1/2 lg:w-2/5 relative">
            <div class="fixed top-0 left-0 w-1/2 lg:w-2/5 h-screen">
                <div class="absolute inset-0 bg-gradient-to-br from-green-600/90 via-emerald-600/90 to-teal-600/90 z-10"></div>
                <img src="{{ Storage::url($bookingTransaction->ticket->thumbnail) }}" class="w-full h-full object-cover" alt="background">
                
                <!-- Success Overlay -->
                <div class="absolute inset-0 z-20 flex flex-col justify-center items-center text-center px-12">
                    <div class="scale-in">
                        <div class="w-32 h-32 mx-auto mb-8 bg-white rounded-full flex items-center justify-center shadow-2xl pulse-slow">
                            <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h1 class="text-5xl lg:text-6xl font-bold text-white mb-6">Success!</h1>
                        <p class="text-2xl text-white/90 mb-4">Booking Confirmed</p>
                        <p class="text-lg text-white/80">{{ $bookingTransaction->ticket->name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Ticket Content -->
        <div class="w-full md:w-1/2 lg:w-3/5 md:ml-auto relative">
            <!-- Mobile background -->
            <div id="background" class="fixed md:hidden w-full top-0 h-screen z-0">
                <div class="absolute z-0 w-full h-full bg-gradient-to-br from-green-600/90 via-emerald-600/90 to-teal-600/90"></div>
                <img src="{{ Storage::url($bookingTransaction->ticket->thumbnail) }}" class="w-full h-full object-cover" alt="background">
            </div>

            <!-- Top Nav (Mobile) -->
            <div id="Top-Nav-Fixed" class="relative md:hidden flex items-center justify-center w-full px-4 pt-16 pb-4 z-20">
                <h1 class="font-bold text-2xl text-white">Success Booking</h1>
            </div>

            <!-- Ticket Container -->
            <div class="relative flex flex-1 justify-center items-center p-4 md:p-8 w-full min-h-screen">
                <div class="w-full md:max-w-2xl">
                    
                    <!-- Success Icon (Mobile Only) -->
                    <div class="md:hidden flex justify-center mb-6 scale-in">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-2xl">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Realistic Ticket Card -->
                    <div id="ticket-to-download" class="relative bg-white rounded-3xl shadow-2xl overflow-hidden scale-in" style="animation-delay: 0.2s;">
                        
                        <!-- Top Section with Perforated Edge -->
                        <div class="relative bg-gradient-to-br from-orange-50 via-white to-orange-50 p-6 md:p-8 paper-texture">
                            <!-- Stamp Effect -->

                            <!-- Success Message -->
                            <div class="text-center mb-6">
                                <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                    </svg>
                                </div>
                                <h1 class="font-bold text-2xl md:text-4xl mb-2">Booking Finished!</h1>
                                <p class="text-gray-600 text-sm md:text-base">Well Done! 🤩</p>
                            </div>

                            <!-- Booking ID Card -->
                            <div class="bg-white rounded-2xl p-4 md:p-6 shadow-lg border-2 border-dashed border-gray-300">
                                <div class="flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-3 flex-1">
                                        <div class="w-12 h-12 md:w-14 md:h-14 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 md:w-7 md:h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs md:text-sm text-gray-600 mb-1">Booking ID</p>
                                            <p class="font-bold text-lg md:text-2xl text-green-600 truncate">{{ $bookingTransaction->booking_trx_id }}</p>
                                        </div>
                                    </div>
                                    <button onclick="copyBookingId()" class="p-3 md:p-4 bg-gray-100 hover:bg-gray-200 rounded-xl transition-all hover:scale-110 flex-shrink-0">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Info Message -->
                            <div class="mt-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                                <div class="flex gap-3">
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm md:text-base text-gray-700 leading-relaxed">
                                        Gunakan Kode Booking ID ini untuk mengecek tiket yang sudah di bayar di halaman My Booking. Terima kasih telah memesan tiket !
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Perforated Divider -->
                        <div class="perforated-top h-4 bg-gray-50"></div>

                        <!-- Bottom Section - Ticket Details -->
                        <div class="bg-gradient-to-br from-gray-50 to-white p-6 md:p-8 paper-texture">
                            <!-- Ticket Info -->
                            <div class="grid grid-cols-2 gap-4 md:gap-6 mb-6">
                                <div class="space-y-1">
                                    <p class="text-xs md:text-sm text-gray-500">Ticket Name</p>
                                    <p class="font-semibold text-sm md:text-base text-gray-800">{{ $bookingTransaction->ticket->name }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-xs md:text-sm text-gray-500">Date</p>
                                    <p class="font-semibold text-sm md:text-base text-gray-800">{{ date('d M Y', strtotime($bookingTransaction->started_at)) }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-xs md:text-sm text-gray-500">Participants</p>
                                    <p class="font-semibold text-sm md:text-base text-gray-800">{{ $bookingTransaction->total_participant }} Person(s)</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-xs md:text-sm text-gray-500">Total Amount</p>
                                    <p class="font-semibold text-sm md:text-base text-orange-600">Rp {{ number_format($bookingTransaction->total_amount, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3 md:space-y-4">
                                <a href="{{ route('front.index') }}" class="block w-full rounded-full py-3 md:py-4 px-6 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold text-sm md:text-base text-center shadow-lg hover:shadow-xl transition-all transform hover:scale-[1.02]">
                                    Explore More Tickets
                                </a>
                                
                                <a href="{{ route('front.check_booking') }}" class="block w-full rounded-full py-3 md:py-4 px-6 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800 text-white font-bold text-sm md:text-base text-center shadow-lg hover:shadow-xl transition-all transform hover:scale-[1.02]">
                                    View My Booking
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Note -->
                    <div class="text-center mt-6 text-white md:text-gray-600 text-xs md:text-sm">
                        <p>Keep this booking ID for future reference</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Generate QR Code
        new QRCode(document.getElementById("qrcode"), {
            text: "{{ $bookingTransaction->booking_trx_id }}",
            width: 160,
            height: 160,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // Copy Booking ID
        function copyBookingId() {
            const bookingId = "{{ $bookingTransaction->booking_trx_id }}";
            navigator.clipboard.writeText(bookingId).then(() => {
                // Show success feedback
                const btn = event.currentTarget;
                const originalHTML = btn.innerHTML;
                btn.innerHTML = `
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                `;
                btn.classList.add('bg-green-100');
                
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.classList.remove('bg-green-100');
                }, 2000);
            });
        }

        // Download Ticket as PDF
        function downloadTicket() {
            const element = document.getElementById('ticket-to-download');
            const opt = {
                margin: 0,
                filename: 'Booking-{{ $bookingTransaction->booking_trx_id }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, useCORS: true },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };
            
            // Show loading
            const btn = event.currentTarget;
            const originalHTML = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin w-5 h-5 md:w-6 md:h-6 mx-auto" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Generating PDF...
            `;

            html2pdf().set(opt).from(element).save().then(() => {
                btn.disabled = false;
                btn.innerHTML = originalHTML;
            });
        }

        // Confetti Animation on Load
        function createConfetti() {
            const colors = ['#f97316', '#10b981', '#3b82f6', '#f59e0b', '#8b5cf6'];
            for (let i = 0; i < 50; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + '%';
                    confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.animationDelay = Math.random() * 2 + 's';
                    confetti.style.animationDuration = (Math.random() * 2 + 3) + 's';
                    document.body.appendChild(confetti);
                    
                    setTimeout(() => confetti.remove(), 5000);
                }, i * 30);
            }
        }

        // Auto-download on page load (optional - uncomment if needed)
        // window.addEventListener('load', function() {
        //     setTimeout(() => {
        //         downloadTicket();
        //     }, 2000); // Wait 2 seconds before auto-download
        // });

        // Trigger confetti on load
        window.addEventListener('load', createConfetti);
    </script>
</body>
</html>