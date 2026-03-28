const plus = document.getElementById("plus");
const minus = document.getElementById("minus");
const text = document.getElementById("count-text");
const people = document.getElementById("people");
const totalPriceElement = document.getElementById("total-price");
const realTicketPrice = document.getElementById("realTicketPrice");

const subTotal = document.getElementById("subTotal");
const inputTotalPpn = document.getElementById("totalPpn");
const totalAmount = document.getElementById("totalAmount");

// Extra services elements
const extraServicesContainer = document.getElementById("extra-services-container");
const extraServicesSummary = document.getElementById("extra-services-summary");
const extraServicesList = document.getElementById("extra-services-list");
const extraServicesTotalDisplay = document.getElementById("extra-services-total-display");
const extraServicePriceInput = document.getElementById("extraServicePrice");

const pricePerItem = parseInt(realTicketPrice.value);

function formatRupiah(number) {
    return "Rp " + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function calculateExtraServicesTotal() {
    let total = 0;
    
    if (extraServicesContainer) {
        document.querySelectorAll('.extra-service-item').forEach(item => {
            const price = parseInt(item.dataset.servicePrice);
            const qtyElement = item.querySelector('.service-qty');
            const qty = parseInt(qtyElement.textContent);
            
            if (qty > 0) {
                total += price * qty;
            }
        });
    }
    
    return total;
}

function updateExtraServicesSummary() {
    if (!extraServicesContainer) return;
    
    const total = calculateExtraServicesTotal();
    
    // Update hidden input
    extraServicePriceInput.value = total;
    
    // Build summary HTML
    let summaryHTML = '';
    let hasItems = false;
    
    document.querySelectorAll('.extra-service-item').forEach(item => {
        const name = item.dataset.serviceName;
        const price = parseInt(item.dataset.servicePrice);
        const qtyElement = item.querySelector('.service-qty');
        const qty = parseInt(qtyElement.textContent);
        
        if (qty > 0) {
            hasItems = true;
            const subtotal = price * qty;
            summaryHTML += `
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">${name} (${qty}x)</span>
                    <span class="font-semibold">${formatRupiah(subtotal)}</span>
                </div>
            `;
        }
    });
    
    // Show/hide summary
    if (hasItems && extraServicesSummary) {
        extraServicesSummary.classList.remove('hidden');
        extraServicesSummary.classList.add('flex');
        if (extraServicesList) {
            extraServicesList.innerHTML = summaryHTML;
        }
        if (extraServicesTotalDisplay) {
            extraServicesTotalDisplay.textContent = formatRupiah(total);
        }
    } else if (extraServicesSummary) {
        extraServicesSummary.classList.remove('flex');
        extraServicesSummary.classList.add('hidden');
    }
    
    // ✅ KUNCI: Update total price setiap kali extra service berubah
    updateTotalPrice();
}

function updateTotalPrice() {
    let currentValue = parseInt(people.value);
    let ticketTotal = currentValue * pricePerItem;
    let extraServicesTotal = calculateExtraServicesTotal();
    
    // Total = (ticket price × participants) + extra services total
    let totalPrice = ticketTotal + extraServicesTotal;
    
    const ppn = 0;
    const totalPpn = totalPrice * ppn;
    const grandTotalPrice = totalPrice + totalPpn;
    
    totalPriceElement.textContent = formatRupiah(grandTotalPrice);

    subTotal.value = totalPrice;
    inputTotalPpn.value = totalPpn;
    totalAmount.value = grandTotalPrice;
}

// Plus/Minus for participants
plus.addEventListener("click", () => {
    let currentValue = parseInt(people.value);
    currentValue++;
    people.value = currentValue;
    text.textContent = currentValue;
    updateTotalPrice();
});

minus.addEventListener("click", () => {
    let currentValue = parseInt(people.value);
    if (currentValue > 1) {
        currentValue--;
        people.value = currentValue;
        text.textContent = currentValue;
        updateTotalPrice();
    }
});

// Plus/Minus for extra services
if (extraServicesContainer) {
    // ✅ Plus button handler
    document.querySelectorAll('.plus-service').forEach(button => {
        button.addEventListener('click', function() {
            const index = this.dataset.index;
            const item = this.closest('.extra-service-item');
            const qtyElement = item.querySelector('.service-qty');
            const qtyInput = item.querySelector('.service-quantity-input');
            
            let currentQty = parseInt(qtyElement.textContent);
            currentQty++;
            
            qtyElement.textContent = currentQty;
            qtyInput.value = currentQty;
            
            // ✅ KUNCI: Langsung update summary dan total price
            updateExtraServicesSummary();
        });
    });
    
    // ✅ Minus button handler
    document.querySelectorAll('.minus-service').forEach(button => {
        button.addEventListener('click', function() {
            const index = this.dataset.index;
            const item = this.closest('.extra-service-item');
            const qtyElement = item.querySelector('.service-qty');
            const qtyInput = item.querySelector('.service-quantity-input');
            
            let currentQty = parseInt(qtyElement.textContent);
            if (currentQty > 0) {
                currentQty--;
                
                qtyElement.textContent = currentQty;
                qtyInput.value = currentQty;
                
                // ✅ KUNCI: Langsung update summary dan total price
                updateExtraServicesSummary();
            }
        });
    });
}

// Initialize total price on page load
updateTotalPrice();