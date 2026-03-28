<style>
    /* ========================================
           BOTTOM NAVIGATION
        ======================================== */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 640px;
            background: #ffffff;
            padding: 12px 20px 20px;
            box-shadow: 0 -4px 24px rgba(0, 0, 0, 0.12);
            z-index: 100;
        }

        .nav-items {
            display: flex;
            justify-content: space-around;
            align-items: center;
            list-style: none;
        }

        .nav-item {
            flex: 1;
        }

  /* ========================================
               BOTTOM NAV - TETAP TAMPIL DI DESKTOP
            ======================================== */
            .bottom-nav {
                max-width: 100%; /* Full width di desktop */
            }
            
        .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            padding: 8px;
            text-decoration: none;
            color: #999;
            transition: all 0.3s ease;
            border-radius: 12px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary);
            background: rgba(255, 107, 53, 0.08);
        }

        .nav-icon {
            width: 24px;
            height: 24px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover .nav-icon,
        .nav-link.active .nav-icon {
            transform: translateY(-3px);
        }

        .nav-label {
            font-size: 12px;
            font-weight: 600;
        }

    </style>
<!-- Bottom Navigation -->
        <nav class="bottom-nav">
            <ul class="nav-items">
                <li class="nav-item">
                    <a href="index.html" class="nav-link active">
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