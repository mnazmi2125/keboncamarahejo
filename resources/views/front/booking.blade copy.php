<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('output.css') }}" rel="stylesheet">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="relative flex flex-col w-full min-h-screen max-w-[640px] mx-auto bg-[#F8F8F9]">
        <div id="background" class="fixed w-full max-w-[640px] top-0 h-screen z-0">
            <div class="absolute z-0 w-full h-[459px] bg-[linear-gradient(180deg,#000000_12.61%,rgba(0,0,0,0)_70.74%)]"></div>
            <img src="{{Storage::url($ticket->thumbnail )}}" class="w-full h-full object-cover" alt="background">
        </div>
        <div id="Top-Nav-Fixed" class="relative flex items-center justify-between w-full max-w-[640px] px-4 mt-[60px] z-20">
            <div class="fixed flex items-center justify-between w-full max-w-[640px] -ml-4 px-4 mx-auto">
                <a href="{{ route('front.details', $ticket->slug) }}">
                    <img src="{{asset('assets/images/icons/back.svg')}}" class="w-12 h-12" alt="icon">
                </a>
                <a href="#">
                    <img src="{{asset('assets/images/icons/heart.svg')}}" class="w-12 h-12" alt="icon">
                </a>
            </div>
            <div class="flex items-center justify-center h-12 w-full shrink-0">
                <h1 class="font-bold text-lg leading-[27px] text-white text-center w-full">Book a Ticket</h1>
            </div>
        </div>

        <form method="POST" action="{{route('front.booking_store', $ticket->slug)}}" class="relative flex flex-col w-full px-4 gap-[18px] mt-5 pb-[30px] overflow-x-hidden">
            @csrf
            <div class="flex items-center justify-between rounded-3xl p-[6px] pr-[14px] bg-white overflow-hidden">
                <div class="flex items-center gap-[14px]">
                    <div class="flex w-[90px] h-[90px] shrink-0 rounded-3xl bg-[#D9D9D9] overflow-hidden">
                        <img src="{{Storage::url($ticket->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <h3 class="font-semibold">{{$ticket->name}}</h3>
                        <div class="flex items-center gap-1">
                            <img src="{{asset('assets/images/icons/location.svg')}}" class="w-[18px] h-[18px]" alt="icon">
                            <p class="font-semibold text-xs leading-[18px]">{{$ticket->seller->name}}</p>
                        </div>
                        <p class="font-bold text-sm leading-[21px] text-[#F97316]">Rp {{number_format($ticket->price, 0, ',', '.')}}</p>
                        <input type="hidden" name="realTicketPrice" id="realTicketPrice" value="{{$ticket->price}}">
                    </div>
                </div>
                <p class="w-fit flex shrink-0 items-center gap-[2px] rounded-full p-[6px_8px] bg-[#FFE5D3]">
                    <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="w-4 h-4" alt="star">
                    <span class="font-semibold text-xs leading-[18px] text-[#F97316]">4/5</span>
                </p>
            </div>
            
            <div class="flex flex-col rounded-[30px] p-5 gap-[14px] bg-white">
                <div class="flex flex-col gap-[6px]">
                    <label for="name" class="font-semibold text-sm leading-[21px]">Full Name</label>
                    <div class="flex items-center rounded-full px-5 gap-[10px] bg-[#F8F8F9] transition-all duration-300 focus-within:ring-1 focus-within:ring-[#F97316]">
                        <img src="{{asset('assets/images/icons/user-octagon.svg')}}" class="w-6 h-6" alt="icon">
                        <input type="text" name="name" id="name" class="appearance-none outline-none py-[14px] !bg-transparent w-full font-semibold text-sm leading-[21px] placeholder:font-normal placeholder:text-[#13181D]" placeholder="Write your complete name" value="{{ old('name') }}" required>
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-[6px]">
                    <label for="email" class="font-semibold text-sm leading-[21px]">Email</label>
                    <div class="flex items-center rounded-full px-5 gap-[10px] bg-[#F8F8F9] transition-all duration-300 focus-within:ring-1 focus-within:ring-[#F97316]">
                        <img src="{{asset('assets/images/icons/sms.svg')}}" class="w-6 h-6" alt="icon">
                        <input type="email" name="email" id="email" class="appearance-none outline-none py-[14px] !bg-transparent w-full font-semibold text-sm leading-[21px] placeholder:font-normal placeholder:text-[#13181D]" placeholder="Write your email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-[6px]">
                    <label for="phone" class="font-semibold text-sm leading-[21px]">Phone No.</label>
                    <div class="flex items-center rounded-full px-5 gap-[10px] bg-[#F8F8F9] transition-all duration-300 focus-within:ring-1 focus-within:ring-[#F97316]">
                        <img src="{{asset('assets/images/icons/mobile.svg')}}" class="w-6 h-6" alt="icon">
                        <input type="tel" name="phone_number" id="phone" class="appearance-none outline-none py-[14px] !bg-transparent w-full font-semibold text-sm leading-[21px] placeholder:font-normal placeholder:text-[#13181D]" placeholder="Give us your number" value="{{ old('phone_number') }}" required>
                    </div>
                    @error('phone_number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-[6px]">
                    <label for="started_at" class="font-semibold text-sm leading-[21px]">Choose Date</label>
                    <div class="flex items-center rounded-full px-5 gap-[10px] bg-[#F8F8F9] transition-all duration-300 focus-within:ring-1 focus-within:ring-[#F97316]">
                        <img src="{{asset('assets/images/icons/calendar.svg')}}" class="w-6 h-6" alt="icon">
                        <input type="date" name="started_at" id="started_at" class="appearance-none outline-none py-[14px] !bg-transparent w-full font-semibold text-sm leading-[21px] placeholder:font-normal placeholder:text-[#13181D]" value="{{ old('started_at') }}" required>
                    </div>
                    @error('started_at')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ✅ MULTIPLE EXTRA SERVICES WITH QUANTITY --}}
                @if(isset($extraServices) && $extraServices->count() > 0)
                    <div class="flex flex-col gap-[6px]">
                        <label class="font-semibold text-sm leading-[21px]">
                            Tambahan Peralatan Camping <span class="text-gray-400 font-normal">(Opsional)</span>
                        </label>
                        
                        {{-- Container untuk list extra services --}}
                        <div id="extra-services-container" class="flex flex-col gap-3">
                            @foreach($extraServices as $index => $service)
                                <div class="extra-service-item flex items-center justify-between p-3 rounded-2xl bg-[#F8F8F9]" 
                                     data-service-slug="{{ $service->slug }}" 
                                     data-service-price="{{ $service->price }}"
                                     data-service-name="{{ $service->name }}">
                                    
                                    {{-- Info Service --}}
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm">{{ $service->name }}</p>
                                        <p class="text-xs text-gray-600">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                                    </div>
                                    
                                    {{-- Quantity Counter --}}
                                    <div class="flex items-center gap-3">
                                        <button type="button" 
                                                class="minus-service w-8 h-8 rounded-full bg-white flex items-center justify-center"
                                                data-index="{{ $index }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        
                                        <span class="service-qty font-bold text-sm w-6 text-center" id="qty-{{ $index }}">0</span>
                                        
                                        <button type="button" 
                                                class="plus-service w-8 h-8 rounded-full bg-white flex items-center justify-center"
                                                data-index="{{ $index }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    {{-- Hidden inputs untuk quantity --}}
                                    <input type="hidden" 
                                           name="extra_services[{{ $index }}][slug]" 
                                           value="{{ $service->slug }}">
                                    <input type="hidden" 
                                           name="extra_services[{{ $index }}][name]" 
                                           value="{{ $service->name }}">
                                    <input type="hidden" 
                                           name="extra_services[{{ $index }}][price]" 
                                           value="{{ $service->price }}">
                                    <input type="hidden" 
                                           name="extra_services[{{ $index }}][quantity]" 
                                           class="service-quantity-input"
                                           value="0">
                                </div>
                            @endforeach
                        </div>
                        
                        {{-- Hidden input untuk total extra service price --}}
                        <input type="hidden" name="extra_service_price" id="extraServicePrice" value="0">
                    </div>
                @endif
            </div>

            <div class="flex flex-col rounded-[30px] p-5 gap-6 bg-white">
                <div class="flex justify-between items-center">
                    <p class="font-bold">How Many <br>People Buying?</p>
                    <div id="counter" class="flex items-center justify-between w-fit min-w-[135px] rounded-full p-[14px_20px] gap-[14px] bg-[#F8F8F9]">
                        <button type="button" id="minus" class="w-6 h-6">
                            <img src="{{asset('assets/images/icons/minus.svg')}}" alt="minus">
                        </button>
                        <p id="count-text" class="font-bold">1</p>
                        <input type="number" name="total_participant" id="people" value="1" class="hidden">
                        <button type="button" id="plus" class="w-6 h-6">
                            <img src="{{asset('assets/images/icons/add.svg')}}" alt="plus">
                        </button>
                    </div>
                </div>

                {{-- ✅ FIXED: Show Selected Extra Services Summary --}}
                <div id="extra-services-summary" class="hidden flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-sm leading-[21px] text-gray-600">Peralatan Tambahan</p>
                    </div>
                    <div id="extra-services-list" class="flex flex-col gap-2">
                        {{-- Will be populated by JavaScript --}}
                    </div>
                    <div class="flex items-center justify-between pt-2 border-t border-gray-200">
                        <p class="font-semibold text-sm leading-[21px] text-gray-600">Total Tambahan</p>
                        <p id="extra-services-total-display" class="font-bold text-sm leading-[21px] text-[#F97316]">Rp 0</p>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <p class="font-semibold text-sm leading-[21px]">Sub Total</p>
                    <p id="total-price" class="font-bold text-[22px] leading-[33px] text-[#F97316]"></p>
                </div>
                <input type="hidden" name="sub_total" id="subTotal">
                <input type="hidden" name="total_ppn" id="totalPpn">
                <input type="hidden" name="total_amount" id="totalAmount">
                <button type="submit" class="flex items-center justify-between p-1 pl-5 w-full gap-4 rounded-full bg-[#13181D]">
                    <p class="font-bold text-white">Continue to Checkout</p>
                    <img src="{{asset('assets/images/icons/card.svg')}}" class="w-[50px] h-[50px]" alt="icon">
                </button>
            </div>
        </form>
    </div>

    <script src="{{asset('js/booking.js')}}"></script>
</body>
</html>