
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
                    enabled: false, // Disable di desktop, pakai CSS Grid
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
                    enabled: false, // Disable di desktop, pakai CSS Grid
                }
            }
        });

        // ========================================
        // SEARCH DROPDOWN FUNCTIONALITY
        // ========================================
        const searchInput = document.getElementById('searchInput');
        const searchDropdown = document.getElementById('searchDropdown');
        const searchItems = document.querySelectorAll('.search-dropdown-item');
        const noResults = document.getElementById('noResults');
        const searchBackdrop = document.getElementById('searchBackdrop');

        // Function untuk show dropdown
        function showDropdown() {
            searchDropdown.classList.add('show');
            searchBackdrop.classList.add('show');
            document.body.classList.add('dropdown-open');
        }

        // Function untuk hide dropdown
        function hideDropdown() {
            searchDropdown.classList.remove('show');
            searchBackdrop.classList.remove('show');
            document.body.classList.remove('dropdown-open');
        }

        // Show dropdown when input is focused
        searchInput.addEventListener('focus', showDropdown);

        // Hide dropdown when clicking backdrop
        searchBackdrop.addEventListener('click', hideDropdown);

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.search-wrapper')) {
                hideDropdown();
            }
        });

        // Filter items as user types
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            // If search is empty, show all items
            if (searchTerm === '') {
                searchItems.forEach(item => {
                    item.classList.remove('hidden');
                });
                noResults.classList.remove('show');
                showDropdown();
                return;
            }

            let hasResults = false;

            // Filter items based on search term
            searchItems.forEach(item => {
                const itemName = item.getAttribute('data-name');
                
                if (itemName.includes(searchTerm)) {
                    item.classList.remove('hidden');
                    hasResults = true;
                } else {
                    item.classList.add('hidden');
                }
            });

            // Show/hide no results message
            if (hasResults) {
                noResults.classList.remove('show');
            } else {
                noResults.classList.add('show');
            }

            showDropdown();
        });

        // Navigate with keyboard (optional enhancement)
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
            }
        });

        function setActive(items) {
            items.forEach(item => item.style.background = '');
            if (items[currentFocus]) {
                items[currentFocus].style.background = '#f8f9fa';
                items[currentFocus].scrollIntoView({ block: 'nearest' });
            }
        }
   