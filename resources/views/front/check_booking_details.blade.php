<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #ticket-to-print,
            #ticket-to-print * {
                visibility: visible;
            }

            #ticket-to-print {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .no-print {
                display: none !important;
            }
        }

        /* TRAVELOKA TICKET STYLE */
        .ticket-container {
            background: #ffffff;
            border: 2px solid #e0e0e0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Diagonal Stripe Background */
        .diagonal-stripes {
            background-image: repeating-linear-gradient(45deg,
                    #f0f9ff 0,
                    #f0f9ff 10px,
                    #e0f2fe 10px,
                    #e0f2fe 20px);
        }

        /* Table Borders */
        .ticket-table {
            border-collapse: collapse;
            width: 100%;
        }

        .ticket-table td,
        .ticket-table th {
            border: 1px solid #e0e0e0;
            padding: 12px;
            text-align: left;
        }

        .ticket-table th {
            background: #f5f5f5;
            font-weight: 600;
        }

        /* Barcode */
        .barcode {
            background: repeating-linear-gradient(90deg,
                    #000 0px, #000 2px,
                    transparent 2px, transparent 4px);
            height: 60px;
        }

        /* Pulse animation */
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="relative flex flex-col md:flex-row w-full min-h-screen">

        <!-- Left Preview (Desktop) -->
        <div class="hidden md:block md:w-1/2 lg:w-2/5 relative">
            <div
                class="fixed top-0 left-0 w-1/2 lg:w-2/5 h-screen overflow-y-auto bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-700 p-8 flex items-center justify-center">
                <div class="text-center">
                    @if ($bookingDetails->is_paid)
                        <div
                            class="w-32 h-32 mx-auto mb-6 bg-white rounded-full flex items-center justify-center shadow-2xl">
                            <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h1 class="text-5xl font-bold text-white mb-4">Booking Confirmed!</h1>
                        <p class="text-xl text-white/90">Your ticket is ready</p>
                    @else
                        <div
                            class="w-32 h-32 mx-auto mb-6 bg-white rounded-full flex items-center justify-center shadow-2xl pulse-animation">
                            <svg class="w-16 h-16 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h1 class="text-5xl font-bold text-white mb-4">Payment Pending</h1>
                        <p class="text-xl text-white/90">Processing...</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="w-full md:w-1/2 lg:w-3/5 md:ml-auto relative">
            <div id="background" class="fixed md:hidden w-full top-0 h-screen z-0">
                <div class="absolute z-0 w-full h-full bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-700">
                </div>
                <img src="{{ Storage::url($bookingDetails->ticket->thumbnail) }}"
                    class="w-full h-full object-cover opacity-20" alt="background">
            </div>

            <!-- Top Nav -->
            <div id="Top-Nav-Fixed"
                class="relative flex items-center justify-between w-full px-4 md:px-8 mt-[60px] md:mt-8 z-20">
                <div class="flex items-center justify-between w-full md:max-w-4xl md:mx-auto">
                    <a href="{{ route('front.check_booking') }}" class="transform hover:scale-110 transition-transform">
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-white rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </div>
                    </a>
                    <h1 class="font-bold text-lg md:text-2xl text-white md:text-gray-800">Booking Details</h1>
                    <div class="w-12 md:w-14"></div>
                </div>
            </div>

            <main class="relative flex flex-col w-full px-4 md:px-8 gap-6 mt-5 md:mt-8 pb-8 md:pb-12">
                <div class="w-full md:max-w-4xl md:mx-auto">

                    @if ($bookingDetails->is_paid)

                        <!-- Ticket Info Card -->
                        <div class="flex items-center justify-between rounded-3xl p-4 md:p-6 bg-white shadow-xl mb-6">
                            <div class="flex items-center gap-4 md:gap-6">
                                <div
                                    class="w-[90px] h-[90px] md:w-[120px] md:h-[120px] rounded-3xl bg-gray-200 overflow-hidden ring-4 ring-blue-500/20">
                                    <img src="{{ Storage::url($bookingDetails->ticket->thumbnail) }}"
                                        class="w-full h-full object-cover" alt="thumbnail">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h3 class="font-semibold text-base md:text-xl">{{ $bookingDetails->ticket->name }}
                                    </h3>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-[18px] h-[18px] md:w-5 md:h-5 text-gray-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <p class="font-semibold text-xs md:text-sm text-gray-700">
                                            {{ $bookingDetails->ticket->seller->name }}</p>
                                    </div>
                                    <p class="font-bold text-sm md:text-lg text-[#F97316]">Rp
                                        {{ number_format($bookingDetails->ticket->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="flex shrink-0 items-center gap-1 rounded-full p-2 md:p-3 bg-[#FFE5D3]">
                                <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-4 h-4 md:w-5 md:h-5"
                                    alt="star">
                                <span class="font-semibold text-xs md:text-sm text-[#F97316]">4/5</span>
                            </div>
                        </div>

                        <!-- TRAVELOKA-STYLE TICKET -->
                        <div id="ticket-to-print" class="ticket-container overflow-hidden bg-white">

                            <!-- Header dengan Diagonal Stripes -->
                            <div class="diagonal-stripes p-4 md:p-6 border-b-2 border-gray-300">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">E-ticket</h1>
                                        <p class="text-sm text-gray-600">
                                            {{ $bookingDetails->ticket->category->name ?? 'Tourism Package' }}</p>
                                    </div>
                                    <div class="text-right">

                                    </div>
                                </div>
                            </div>

                            <!-- Info Section -->
                            <div class="p-4 md:p-6 border-b border-gray-200">
                                <div class="flex items-center justify-between text-sm text-gray-600 mb-4">
                                    <span>{{ $bookingDetails->started_at->format('l, d F Y') }}</span>
                                    <span>{{ $bookingDetails->started_at->format('d M Y') }}</span>
                                </div>

                                <!-- Timeline Style -->
                                <div class="flex items-center gap-4 md:gap-8 mb-6">
                                    <div class="flex-1">
                                        {{-- <div class="text-3xl md:text-4xl font-bold text-gray-800">{{ $bookingDetails->started_at->format('H:i') }}</div> --}}
                                        <div class="text-sm text-gray-600 mt-1">
                                            {{ $bookingDetails->ticket->seller->name }}</div>
                                    </div>

                                    <div class="flex-1 flex flex-col items-center">
                                        <div class="text-xs text-gray-500 mb-1">
                                            {{ $bookingDetails->total_participant }} Person(s)</div>
                                        <div class="w-full flex items-center">
                                            <div class="w-2 h-2 rounded-full bg-gray-400"></div>
                                            <div class="flex-1 h-0.5 bg-gray-300"></div>
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">Tourism Activity</div>
                                    </div>

                                    <div class="flex-1 text-right">
                                        {{-- <div class="text-3xl md:text-4xl font-bold text-gray-800">--:--</div> --}}
                                        <div class="text-sm text-gray-600 mt-1">{{ $bookingDetails->ticket->name }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Booking Code Box -->
                                <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-r">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-xs text-gray-600 mb-1">Booking Code</p>
                                            <p class="text-xl md:text-2xl font-bold text-orange-600">
                                                {{ $bookingDetails->booking_trx_id }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-xs text-gray-600 mb-1">Payment Status</p>
                                            <span
                                                class="inline-block px-3 py-1 bg-green-600 text-white rounded-full text-xs font-bold">✓
                                                PAID</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3 Icons Info (Traveloka Style) -->
                            <div
                                class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 md:p-6 bg-gray-50 border-b border-gray-200">
                                <div class="flex gap-3">
                                    <div
                                        class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm text-gray-800 mb-1">Tunjukkan e-ticket dan
                                            identitas</p>
                                        <p class="text-xs text-gray-600">Saat check-in di loket</p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div
                                        class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm text-gray-800 mb-1">30 menit sebelum</p>
                                        <p class="text-xs text-gray-600">Datang lebih awal</p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div
                                        class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm text-gray-800 mb-1">Waktu tertera adalah</p>
                                        <p class="text-xs text-gray-600">Waktu setempat (WIB)</p>
                                    </div>
                                </div>
                            </div>

                            <!-- TABLE Detail Peserta -->
                            <div class="p-4 md:p-6 border-b border-gray-200">
                                <h3 class="font-bold text-lg text-gray-800 mb-4">Detail Peserta</h3>

                                <div class="overflow-x-auto">
                                    <table class="ticket-table text-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Peserta</th>
                                                <th>Paket</th>
                                                <th>Fasilitas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <div class="font-semibold">{{ $bookingDetails->name }}</div>
                                                    <div class="text-xs text-gray-500">
                                                        Participant {{ $bookingDetails->total_participant }}
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- ✅ Safe way dengan optional chaining --}}
                                                    {{ $bookingDetails->ticket?->category?->name ?? 'Tour Package' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $extraServices = [];

                                                        if (isset($bookingDetails->extra_services_data)) {
                                                            if (is_array($bookingDetails->extra_services_data)) {
                                                                $extraServices = $bookingDetails->extra_services_data;
                                                            } elseif (is_string($bookingDetails->extra_services_data)) {
                                                                $extraServices =
                                                                    json_decode(
                                                                        $bookingDetails->extra_services_data,
                                                                        true,
                                                                    ) ?? [];
                                                            }
                                                        }
                                                    @endphp

                                                    @if (!empty($extraServices))
                                                        <ul class="text-xs space-y-1">
                                                            @foreach ($extraServices as $service)
                                                                <li>
                                                                    • {{ $service['name'] ?? 'Unknown' }}
                                                                    @if (isset($service['quantity']) && $service['quantity'] > 1)
                                                                        <span
                                                                            class="text-gray-500">(x{{ $service['quantity'] }})</span>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <span class="text-gray-400">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <!-- QR & Barcode Section -->
                            <div class="p-4 md:p-6 bg-gray-50 text-center border-b border-gray-200">
                                <p class="text-sm text-gray-600 mb-4">Tunjukkan QR Code atau Barcode ini kepada petugas</p>
                                
                                <div class="flex flex-col md:flex-row items-center justify-center gap-6 mb-4">
                                    <!-- QR Code -->
                                    <div class="bg-white p-4 rounded border border-gray-300">
                                        <div id="qrcode" class="w-40 h-40 md:w-48 md:h-48"></div>
                                        <p class="text-xs text-gray-500 mt-2">QR Code</p>
                                    </div>

                                    <!-- Barcode -->
                                    <div class="bg-white p-4 rounded border border-gray-300 w-full md:w-auto">
                                        <div class="barcode rounded mb-2 md:min-w-[300px]"></div>
                                        <p class="font-mono text-sm font-bold text-gray-700">{{ $bookingDetails->booking_trx_id }}</p>
                                        <p class="text-xs text-gray-500 mt-1">Barcode</p>
                                    </div>
                                </div> --}}

                            <!-- Important Info Box -->
                            <div class="bg-blue-50 border border-blue-200 rounded p-4 text-left">
                                <div class="flex gap-3">
                                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-xs text-gray-700">
                                        <p class="font-semibold mb-2">Catatan Penting:</p>
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>E-ticket ini berlaku untuk {{ $bookingDetails->total_participant }}
                                                orang</li>
                                            <li>Simpan e-ticket ini dengan baik</li>
                                            <li>Tunjukkan saat check-in di lokasi</li>
                                            <li>Pastikan membawa identitas diri (KTP/SIM)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="bg-gray-100 border-t-2 border-gray-300 p-4 text-center">
                            <p class="text-xs text-gray-600">Issued on
                                {{ $bookingDetails->created_at->format('d M Y, H:i') }} WIB</p>
                            <p class="text-xs text-gray-500 mt-1">
                                Terima kasih telah menggunakan layanan kami • Customer Service: 0800-123-4567
                            </p>
                        </div>
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-4 mt-6 no-print">
                    <button onclick="downloadPDF()"
                        class="flex items-center justify-center gap-2 py-4 px-6 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download PDF
                    </button>
                    <button onclick="window.print()"
                        class="flex items-center justify-center gap-2 py-4 px-6 bg-gray-800 hover:bg-gray-900 text-white font-bold rounded-xl shadow-lg transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Print
                    </button>
                </div>
            @else
                {{-- PENDING STATUS --}}

                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-amber-500 p-6 md:p-8 text-white text-center">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 mx-auto mb-4 bg-white rounded-full flex items-center justify-center pulse-animation">
                            <svg class="w-12 h-12 md:w-16 md:h-16 text-orange-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold mb-2">Payment Pending</h2>
                        <p class="text-sm md:text-base text-orange-100">Menunggu Konfirmasi Pembayaran</p>
                    </div>

                    <div class="p-6 md:p-8">
                        <div class="bg-orange-50 border-l-4 border-orange-500 rounded-r p-6 mb-6">
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <p class="text-sm text-gray-700">Booking ID</p>
                                    <p class="font-bold text-lg text-orange-600">{{ $bookingDetails->booking_trx_id }}
                                    </p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-sm text-gray-700">Total Amount</p>
                                    <p class="font-bold text-xl text-orange-600">Rp
                                        {{ number_format($bookingDetails->total_amount, 0, ',', '.') }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-sm text-gray-700">Status</p>
                                    <span
                                        class="px-4 py-2 bg-gray-800 text-white rounded-full text-sm font-bold pulse-animation">⏳
                                        PENDING</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h3 class="font-bold text-lg text-gray-800">Yang Perlu Anda Lakukan:</h3>

                            <div class="flex gap-4 p-4 bg-blue-50 rounded-xl border-l-4 border-blue-500">
                                <div
                                    class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">
                                    1</div>
                                <div>
                                    <p class="font-semibold text-sm text-gray-800">Tunggu Konfirmasi (1-24 jam)</p>
                                </div>
                            </div>

                            <div class="flex gap-4 p-4 bg-green-50 rounded-xl border-l-4 border-green-500">
                                <div
                                    class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">
                                    2</div>
                                <div>
                                    <p class="font-semibold text-sm text-gray-800">Cek Email atau Halaman Ini</p>
                                </div>
                            </div>

                            <div class="flex gap-4 p-4 bg-purple-50 rounded-xl border-l-4 border-purple-500">
                                <div
                                    class="w-8 h-8 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">
                                    3</div>
                                <div>
                                    <p class="font-semibold text-sm text-gray-800">E-Ticket Akan Tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <button onclick="location.reload()"
                        class="py-4 px-6 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg">
                        Refresh
                    </button>
                    <a href="{{ route('front.index') }}"
                        class="py-4 px-6 bg-gray-800 hover:bg-gray-900 text-white font-bold rounded-xl shadow-lg text-center">
                        Home
                    </a>
                </div>

                @endif
        </div>
        </main>
    </div>
    </div>

    <script>
        @if ($bookingDetails->is_paid)
            new QRCode(document.getElementById("qrcode"), {
                text: "{{ $bookingDetails->booking_trx_id }}",
                width: 192,
                height: 192,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });

            function downloadPDF() {
                const element = document.getElementById('ticket-to-print');
                const opt = {
                    margin: 5,
                    filename: 'E-Ticket-{{ $bookingDetails->booking_trx_id }}.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2,
                        useCORS: true
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };
                html2pdf().set(opt).from(element).save();
            }
        @endif
    </script>
</body>

</html>
