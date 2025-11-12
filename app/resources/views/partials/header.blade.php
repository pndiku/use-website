<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
<style>
    /* CSS Variables for Mobile Menu */
    :root {
        --use-blue: rgb(0, 128, 199);
        --use-blue-dark: rgb(0, 102, 159);
        --use-blue-light: rgb(51, 153, 219);
        --use-yellow: rgb(253, 185, 19);
        --use-yellow-light: rgb(254, 202, 56);
        --use-gray: rgb(88, 89, 91);
        --use-red: rgb(221, 39, 39);
        --use-green: rgb(39, 221, 90);
        --surface: #ffffff;
        --surface-secondary: #f7fafc;
        --surface-tertiary: #edf2f7;
        --text-primary: #1a202c;
        --text-secondary: var(--use-gray);
        --text-tertiary: #718096;
        --border: #e2e8f0;
        --border-light: #f1f5f9;
    }

    /* Mobile Menu Styles */
    .mobile-menu-btn {
        display: none !important;
        background: var(--use-blue) !important;
        color: white !important;
        border: none !important;
        padding: 0.5rem 1rem !important;
        border-radius: 8px !important;
        font-size: 1.2rem !important;
        cursor: pointer !important;
    }

    .mobile-menu-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
        display: none;
    }

    @media (max-width: 1024px) {
        .mobile-menu-overlay {
            display: block;
        }
    }

    .mobile-menu-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .mobile-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 85%;
        max-width: 400px;
        height: 100vh;
        background: white;
        z-index: 10000;
        transition: right 0.3s ease;
        overflow-y: auto;
        box-shadow: -2px 0 10px rgba(0, 0, 0, 0.3);
        display: none;
    }

    @media (max-width: 1024px) {
        .mobile-menu {
            display: block;
        }
    }

    .mobile-menu.active {
        right: 0;
    }

    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1.5rem;
        border-bottom: 2px solid var(--border);
        background: white;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .mobile-menu-logo {
        height: 45px;
        width: auto;
    }

    .mobile-menu-close {
        background: var(--surface-secondary);
        border: none;
        font-size: 1.5rem;
        color: var(--text-primary);
        cursor: pointer;
        padding: 0;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-weight: 300;
        line-height: 1;
    }

    .mobile-menu-close:hover {
        background: var(--use-blue);
        color: white;
    }

    .mobile-menu-list {
        list-style: none;
        padding: 0.5rem 0;
        margin: 0;
    }

    .mobile-menu-item {
        border-bottom: 1px solid var(--border-light);
    }

    .mobile-menu-item:last-child {
        border-bottom: none;
    }

    .mobile-menu-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        color: var(--text-primary);
        text-decoration: none;
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .mobile-menu-link:hover {
        background: var(--surface-secondary);
        color: var(--use-blue);
    }

    .mobile-menu-link.has-children {
        cursor: pointer;
    }

    .mobile-chevron {
        font-size: 0.75rem;
        transition: transform 0.3s ease;
        margin-left: auto;
    }

    .mobile-menu-link.active .mobile-chevron,
    .mobile-submenu-link.active .mobile-chevron {
        transform: rotate(180deg);
    }

    .mobile-submenu {
        list-style: none;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background: var(--surface-secondary);
    }

    .mobile-submenu.active {
        max-height: 1000px;
    }

    .mobile-submenu-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.875rem 1.5rem 0.875rem 2.5rem;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .mobile-submenu-link:hover {
        background: rgba(0, 128, 199, 0.05);
        color: var(--use-blue);
    }

    .mobile-submenu-link.has-children {
        cursor: pointer;
    }

    .mobile-grandsubmenu {
        list-style: none;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background: var(--surface-tertiary);
    }

    .mobile-grandsubmenu.active {
        max-height: 1000px;
    }

    .mobile-grandsubmenu-link {
        display: block;
        padding: 0.75rem 1.5rem 0.75rem 3.5rem;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .mobile-grandsubmenu-link:hover {
        background: rgba(0, 128, 199, 0.05);
        color: var(--use-blue);
    }

    @media (max-width: 1024px) {
        .nav-menu {
            display: none !important;
        }

        .mobile-menu-btn {
            display: block !important;
        }

        .market-status {
            display: none !important;
        }

        .header {
            width: 100% !important;
            left: 0 !important;
            transform: none !important;
            border-radius: 0 !important;
            border: none !important;
            border-bottom: 1px solid var(--border-light) !important;
            top: 0 !important;
        }

        .nav-container {
            padding: 0 1rem !important;
        }

        .logo img {
            height: 50px !important;
        }
    }

    @media (max-width: 768px) {
        .header {
            width: 100% !important;
            left: 0 !important;
            transform: none !important;
            top: 0 !important;
        }

        .nav-container {
            padding: 0 0.75rem !important;
            height: 56px !important;
        }

        .logo img {
            height: 45px !important;
        }

        .mobile-menu-btn {
            padding: 0.4rem 0.8rem !important;
            font-size: 1.1rem !important;
        }
    }

    /* Footer Disclaimer Styles */
    .footer-disclaimer {
        padding: 2rem 0;
        margin: 2rem 0 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer-disclaimer h4 {
        margin-bottom: 1rem;
    }

    .footer-disclaimer p {
        font-size: 0.8125rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.65);
        margin-bottom: 1rem;
    }

    .footer-disclaimer p:last-child {
        margin-bottom: 0;
    }
</style>

<script>
    // USE Mobile Menu Functions - Unique names to avoid conflicts with page-level scripts
    window.USE_toggleMobileDrawer = function() {
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        const body = document.body;

        // Check if elements exist
        if (mobileMenu && mobileMenuOverlay) {
            mobileMenu.classList.toggle('active');
            mobileMenuOverlay.classList.toggle('active');

            // Prevent body scroll when menu is open
            if (mobileMenu.classList.contains('active')) {
                body.style.overflow = 'hidden';
            } else {
                body.style.overflow = '';
            }
        }
    };

    window.USE_toggleMobileSubmenu = function(event, submenuId) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }

        const submenu = document.getElementById(submenuId);
        const link = event ? event.currentTarget : null;

        if (submenu) {
            // Toggle active class on the submenu
            submenu.classList.toggle('active');

            // Toggle active class on the link (for chevron rotation)
            if (link) {
                link.classList.toggle('active');
            }
        }
    };
</script>

<header class="header" id="header">
    <nav class="nav-container">
        <a href="/" class="logo">
            <img src="/images/logo.PNG" alt="Uganda Securities Exchange">
        </a>
        @php
            // Get current time in East African Time (EAT)
            $currentTime = now()->timezone('Africa/Nairobi');
            $currentHour = $currentTime->hour;
            $currentMinute = $currentTime->minute;
            $dayOfWeek = $currentTime->dayOfWeek; // 0 = Sunday, 6 = Saturday

            // Market is closed on weekends (Saturday = 6, Sunday = 0)
            $isWeekend = ($dayOfWeek == 0 || $dayOfWeek == 6);

            // Market is open from 9:00 AM (09:00) to 3:00 PM (15:00) on weekdays only
            $isMarketOpen = !$isWeekend
                         && ($currentHour > 9 || ($currentHour == 9 && $currentMinute >= 0))
                         && ($currentHour < 15 || ($currentHour == 13 && $currentMinute == 0));

            $marketStatus = $isMarketOpen ? 'open' : 'closed';
            $marketStatusText = $isMarketOpen ? 'Market Open' : 'Market Closed';
        @endphp
        <div class="market-status">
            <span class="status-indicator {{ $marketStatus }}"></span>
            <span class="status-text">{{ $marketStatusText }}</span>
            <span class="status-time">{{ $siteContent['trading_hours'] ?? '9:00 AM - 3:00 PM EAT' }}</span>
        </div>
        <ul class="nav-menu">
            @foreach($menuItems as $menuItem)
                <li class="nav-item">
                    <a href="{{ $menuItem->url ?: '#' }}" class="nav-link"
                       @if($menuItem->opens_new_tab) target="_blank" @endif
                       @if($menuItem->hasActiveChildren()) onclick="toggleMobileDropdown(event)" @endif>
                        @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                        {{ $menuItem->title }}
                        @if($menuItem->hasActiveChildren()) <span class="chevron-down"></span> @endif
                    </a>
                    @if($menuItem->hasActiveChildren())
                        <ul class="dropdown">
                            @foreach($menuItem->activeChildren as $childItem)
                                @php
                                    // Force load the activeChildren relationship
                                    $childItem->load('activeChildren');
                                    $grandchildren = $childItem->activeChildren;
                                    $hasGrandchildren = $grandchildren->count() > 0;
                                @endphp

                                <li class="{{ $hasGrandchildren ? 'has-submenu' : '' }}">
                                    <a href="{{ $childItem->url ?: '#' }}" class="dropdown-item"
                                       @if($childItem->opens_new_tab) target="_blank" @endif>
                                        @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                        {{ $childItem->title }}
                                        @if($hasGrandchildren) <span class="chevron-right"></span> @endif
                                    </a>

                                    @if($hasGrandchildren)
                                        <ul class="submenu">
                                            @foreach($grandchildren as $grandchildItem)
                                                <li>
                                                    <a href="{{ $grandchildItem->url ?: '#' }}" class="submenu-item"
                                                       @if($grandchildItem->opens_new_tab) target="_blank" @endif>
                                                        @if($grandchildItem->icon) <i class="{{ $grandchildItem->icon }}"></i> @endif
                                                        {{ $grandchildItem->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <button type="button" id="mobile-menu-btn" class="mobile-menu-btn" onclick="USE_toggleMobileDrawer(); return false;">☰</button>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay" onclick="USE_toggleMobileDrawer()"></div>
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <img src="/images/logo.PNG" alt="Uganda Securities Exchange" class="mobile-menu-logo">
            <button type="button" class="mobile-menu-close" onclick="USE_toggleMobileDrawer()">✕</button>
        </div>
        <ul class="mobile-menu-list">
            @foreach($menuItems as $menuItem)
                <li class="mobile-menu-item">
                    @if($menuItem->hasActiveChildren())
                        <a href="{{ $menuItem->url ?: '#' }}" class="mobile-menu-link has-children"
                           @if($menuItem->opens_new_tab) target="_blank" @endif
                           onclick="USE_toggleMobileSubmenu(event, 'submenu-{{ $loop->index }}')">
                            @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                            {{ $menuItem->title }}
                            <i class="fas fa-chevron-down mobile-chevron"></i>
                        </a>
                        <ul class="mobile-submenu" id="submenu-{{ $loop->index }}">
                            @foreach($menuItem->activeChildren as $childItem)
                                @php
                                    $childItem->load('activeChildren');
                                    $grandchildren = $childItem->activeChildren;
                                    $hasGrandchildren = $grandchildren->count() > 0;
                                @endphp
                                <li>
                                    @if($hasGrandchildren)
                                        <a href="{{ $childItem->url ?: '#' }}" class="mobile-submenu-link has-children"
                                           @if($childItem->opens_new_tab) target="_blank" @endif
                                           onclick="USE_toggleMobileSubmenu(event, 'grandsubmenu-{{ $loop->parent->index }}-{{ $loop->index }}')">
                                            @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                            {{ $childItem->title }}
                                            <i class="fas fa-chevron-down mobile-chevron"></i>
                                        </a>
                                        <ul class="mobile-grandsubmenu" id="grandsubmenu-{{ $loop->parent->index }}-{{ $loop->index }}">
                                            @foreach($grandchildren as $grandchildItem)
                                                <li>
                                                    <a href="{{ $grandchildItem->url ?: '#' }}" class="mobile-grandsubmenu-link"
                                                       @if($grandchildItem->opens_new_tab) target="_blank" @endif>
                                                        @if($grandchildItem->icon) <i class="{{ $grandchildItem->icon }}"></i> @endif
                                                        {{ $grandchildItem->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <a href="{{ $childItem->url ?: '#' }}" class="mobile-submenu-link"
                                           @if($childItem->opens_new_tab) target="_blank" @endif>
                                            @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                            {{ $childItem->title }}
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <a href="{{ $menuItem->url ?: '#' }}" class="mobile-menu-link"
                           @if($menuItem->opens_new_tab) target="_blank" @endif>
                            @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                            {{ $menuItem->title }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</header>
