<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About USE - Uganda Securities Exchange</title>
    <meta name="description" content="Learn about Uganda Securities Exchange - our vision, mission, core values, and key milestones in building East Africa's premier financial market.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Titillium Web', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #0f172a;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        :root {
            /* Official USE Brand Colors */
            --use-blue: rgb(0, 128, 199);
            --use-blue-dark: rgb(0, 102, 159);
            --use-blue-light: rgb(51, 153, 219);
            --use-yellow: rgb(253, 185, 19);
            --use-yellow-light: rgb(254, 202, 56);
            --use-gray: rgb(88, 89, 91);
            --use-red: rgb(221, 39, 39);
            --use-green: rgb(39, 221, 90);

            /* Surface Colors */
            --surface: #ffffff;
            --surface-secondary: #f7fafc;
            --surface-tertiary: #edf2f7;
            --text-primary: #1a202c;
            --text-secondary: var(--use-gray);
            --text-tertiary: #718096;
            --border: #e2e8f0;
            --border-light: #f1f5f9;

            /* Shadows */
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);

            /* USE Brand Gradients */
            --gradient-primary: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-light) 100%);
            --gradient-accent: linear-gradient(135deg, var(--use-yellow) 0%, var(--use-yellow-light) 100%);
            --gradient-success: linear-gradient(135deg, var(--use-green) 0%, rgba(39, 221, 90, 0.8) 100%);
            --gradient-danger: linear-gradient(135deg, var(--use-red) 0%, rgba(221, 39, 39, 0.8) 100%);
        }

        /* Header */
        .header {
            position: fixed;
            top: 1rem;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(24px) saturate(180%);
            border: 1px solid var(--border-light);
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: calc(100% - 2rem);
            max-width: 1400px;
        }

        .header.scrolled {
            top: 0.5rem;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(24px) saturate(200%);
            box-shadow: var(--shadow-xl);
            border-color: rgba(226, 232, 240, 0.3);
        }

        .nav-container {
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
            gap: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .logo img {
            height: 70px;
            width: auto;
            transition: all 0.3s ease;
        }

        .logo:hover img {
            transform: translateY(-1px);
        }

        .market-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(248, 250, 252, 0.8);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(226, 232, 240, 0.3);
            flex-shrink: 0;
            min-width: fit-content;
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
            animation: statusPulse 2s infinite;
        }

        .status-indicator.open {
            background: var(--use-green);
        }

        .status-indicator.closed {
            background: var(--use-red);
            animation: none;
        }

        @keyframes statusPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .status-text {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .status-time {
            font-size: 0.75rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            background: rgba(248, 250, 252, 0.8);
            padding: 0.375rem;
            border-radius: 12px;
            backdrop-filter: blur(8px);
            flex-shrink: 0;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .nav-link:hover {
            color: var(--use-blue);
            background: rgba(0, 128, 199, 0.05);
            transform: translateY(-1px);
        }

        .nav-link.active {
            color: var(--use-blue);
            background: white;
            box-shadow: var(--shadow-sm);
        }

        .chevron-down {
            width: 6px;
            height: 6px;
            border-right: 1px solid currentColor;
            border-bottom: 1px solid currentColor;
            transform: rotate(45deg);
            transition: all 0.3s ease;
            opacity: 0.7;
        }

        .nav-item:hover .chevron-down {
            transform: rotate(225deg);
        }

        .dropdown {
            list-style: none;
            position: absolute;
            top: calc(100% + 0.5rem);
            left: 0;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border);
            min-width: 220px;
            padding: 0.5rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow: visible !important;
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown > li {
            position: relative;
        }

        .dropdown-item {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            font-weight: 500;
            position: relative;
        }

        .dropdown-item:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
        }

        /* Only apply transform to dropdown items WITHOUT submenus */
        .dropdown > li:not(.has-submenu) .dropdown-item:hover {
            transform: translateX(4px);
        }

        .dropdown > li.has-submenu > .dropdown-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Create invisible hover bridge */
        .dropdown > li.has-submenu::after {
            content: '';
            position: absolute;
            top: 0;
            right: -10px;
            bottom: 0;
            width: 15px;
            pointer-events: auto;
            z-index: 1;
        }

        .chevron-right {
            width: 5px;
            height: 5px;
            border-right: 1px solid currentColor;
            border-bottom: 1px solid currentColor;
            transform: rotate(-45deg);
            transition: all 0.2s ease;
            opacity: 0.7;
        }

        .dropdown-item:hover .chevron-right {
            transform: rotate(-45deg) translateX(2px);
        }

        /* Submenu - Third level menu - Fixed positioning */
        .submenu {
            list-style: none;
            position: absolute !important;
            top: 0 !important;
            left: 100% !important;
            background: white !important;
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border) !important;
            min-width: 200px !important;
            padding: 0.5rem !important;
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
            transform: translateX(-5px) !important;
            transition: opacity 0.15s ease, visibility 0.15s ease, transform 0.15s ease !important;
            z-index: 1050 !important;
            display: block !important;
            margin-left: 0 !important;
        }

        /* Show submenu when hovering over its parent */
        .dropdown > li.has-submenu:hover > .submenu {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateX(0) !important;
            pointer-events: auto !important;
        }

        /* Keep submenu visible when hovering over it */
        .submenu:hover {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateX(0) !important;
            pointer-events: auto !important;
        }

        .submenu > li {
            position: relative;
        }

        .submenu-item {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .submenu-item:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
            transform: translateX(4px);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-primary);
        }

        /* Hero Section */
        .hero {
            background: var(--gradient-primary);
            color: white;
            padding: 12rem 0 4rem;
            text-align: center;
            margin-top: 0;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .section {
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            text-align: center;
        }

        .section-content {
            background: var(--surface);
            padding: 3rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
        }

        /* Vision & Mission Grid */
        .vision-mission-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .vision-mission-card {
            background: var(--surface);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            text-align: center;
        }

        .vision-mission-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: var(--use-blue);
        }

        .vision-mission-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .vision-mission-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--text-secondary);
        }

        /* Core Values */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .value-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            text-align: center;
            transition: all 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .value-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--use-blue);
        }

        .value-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 2rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 1rem;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--use-blue);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 2rem;
            background: var(--surface);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            margin-left: 2rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -3.5rem;
            top: 1.5rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--use-blue);
            border: 3px solid var(--surface-secondary);
        }

        .timeline-year {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--use-blue);
            margin-bottom: 0.5rem;
        }

        .timeline-content {
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* Annual Reports */
        .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .report-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            text-align: center;
            transition: all 0.3s ease;
        }

        .report-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .report-icon {
            font-size: 3rem;
            color: var(--use-red);
            margin-bottom: 1rem;
        }

        .report-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .report-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--use-blue);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .report-link:hover {
            background: var(--use-blue-dark);
            text-decoration: none;
            color: white;
            transform: translateY(-1px);
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 5rem 0 2rem;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-brand h3 {
            font-size: 1.75rem;
            font-weight: 800;
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            font-family: 'Titillium Web', sans-serif;
        }

        .footer-brand p {
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--use-blue);
            transform: translateY(-2px);
        }

        .footer-section h4 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--use-blue-light);
        }

        .footer-bottom {
            border-top: 1px solid #334155;
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #94a3b8;
            font-size: 0.875rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            .nav-menu {
                display: none;
            }

            .hero {
                padding: 8rem 0 3rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .main-content {
                padding: 2rem 1rem;
            }

            .vision-mission-grid {
                grid-template-columns: 1fr;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .section-content {
                padding: 2rem;
            }

            .timeline {
                padding-left: 1rem;
            }

            .timeline-item {
                margin-left: 1rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <nav class="nav-container">
            <a href="/" class="logo">
                <img src="/images/logo.PNG" alt="Uganda Securities Exchange">
            </a>
            <div class="market-status">
                <span class="status-indicator {{ ($siteContent['market_status'] ?? 'open') == 'open' ? 'open' : 'closed' }}"></span>
                <span class="status-text">{{ ucfirst($siteContent['market_status'] ?? 'Market Open') }}</span>
                <span class="status-time">{{ $siteContent['trading_hours'] ?? '9:00 AM - 3:00 PM EAT' }}</span>
            </div>
            <ul class="nav-menu">
                @foreach($menuItems as $menuItem)
                    <li class="nav-item">
                        <a href="{{ $menuItem->url ?: '#' }}" class="nav-link"
                           @if($menuItem->opens_new_tab) target="_blank" @endif>
                            @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                            {{ $menuItem->title }}
                            @if($menuItem->hasActiveChildren()) <span class="chevron-down"></span> @endif
                        </a>
                        @if($menuItem->activeChildren && $menuItem->activeChildren->count() > 0)
                            <ul class="dropdown">
                                @foreach($menuItem->activeChildren as $childItem)
                                    @php
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
            <button class="mobile-menu-btn">☰</button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <h1 class="hero-title">About Uganda Securities Exchange</h1>
            <p class="hero-subtitle">Building East Africa's premier financial market through innovation, integrity, and service excellence</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Vision & Mission -->
        <div class="vision-mission-grid">
            <div class="vision-mission-card">
                <div class="vision-mission-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h2 class="vision-mission-title">Our Vision</h2>
                <p class="vision-mission-text">To be Uganda's preferred institution for investments and sourcing of capital</p>
            </div>
            <div class="vision-mission-card">
                <div class="vision-mission-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h2 class="vision-mission-title">Our Mission</h2>
                <p class="vision-mission-text">We are committed to empower our customers through service excellence and innovation in order to promote safe, convenient and sustainable investments.</p>
            </div>
        </div>

        <!-- Core Values -->
        <section class="section">
            <h2 class="section-title">Our Core Values</h2>
            <div class="section-content">
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h3 class="value-title">Efficiency</h3>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="value-title">Teamwork</h3>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="value-title">Innovation</h3>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="value-title">Integrity</h3>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="value-title">Customer Focus</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Key Milestones -->
        <section class="section">
            <h2 class="section-title">Key Milestones</h2>
            <div class="section-content">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-year">1997</div>
                        <div class="timeline-content">The Licensing of the USE by the Uganda Capital Markets Authority to operate as an approved Stock Exchange in June 1997.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">1998</div>
                        <div class="timeline-content">The listing of USE's first security, the Ushs 10 billion 4 year East African Development Bank (EADB) Bond in January 1998.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">1999</div>
                        <div class="timeline-content">The listing of the 5 year Ushs 8.3 billion PTA Bond in March 1999.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2000</div>
                        <div class="timeline-content">The flotation and eventual listing of USE's first equity, the Uganda Clays Ltd share on the 18th of January. UCL shares were 15% oversubscribed.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2000</div>
                        <div class="timeline-content">The flotation of the British American Tobacco (Uganda) Ltd –BATU share through the USE on 28th June. BATU shares were 5% oversubscribed and represented the second divestiture of government held shares in a company to take place through the Exchange.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2001</div>
                        <div class="timeline-content">The first ever cross border listing in the East African market occurred with the listing of East African Breweries Ltd (EABL) on the Uganda Capital Market on 27th March. EABL is ranked among the top 10 companies on the Nairobi Stock Exchange (NSE) in terms of capitalization.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2002</div>
                        <div class="timeline-content">The listing of the Kenya Airways share on the Uganda Capital Markets on the 28th of March becoming USE's second cross listed product. The shares currently have Blue chip status on the Nairobi Stock Exchange (NSE).</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2002</div>
                        <div class="timeline-content">The first flotation of a commercial bank's shares on the Uganda Capital market occurred on the 2nd September, 2002 when Bank of Baroda offered 20% of its stock to the public through the USE. 80million shares were on sale in multiples of 100 at Ushs 600 per share. Its shares were 16.7 % oversubscribed.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2002</div>
                        <div class="timeline-content">Official listing of Bank of Baroda Uganda Ltd (BOBU) on the USE on 14th November making it the first financial institution to list on the Uganda Capital Market.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2003</div>
                        <div class="timeline-content">The listing of the first tranche (Ushs 24 billion) of the Ushs 54 billion UTL Medium term Note on Uganda Capital Market was on 16th September.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2003</div>
                        <div class="timeline-content">The Launch of the USE All Share Index on 23rd October 2003.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2004</div>
                        <div class="timeline-content">Official Listing of the 2 year, Ushs 20 billion Uganda Government 20% Coupon Rate Treasury Bond on January 15th making it the first Government Bond to be listed on the USE. Currently there are two 2 year bonds, two 3 year bonds, a 5 year bond and a 10 year bond listed on the stock exchange.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2004</div>
                        <div class="timeline-content">DFCU group goes public making it Uganda's second financial institution to list on the Uganda Capital Market.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2004</div>
                        <div class="timeline-content">New Vision offers 20% of its shareholding for sale to the public, making it the fifth local company to conduct an IPO in the Ugandan Capital market. New Vision Limited (NVL) is officially listed on 16 Dec 2004.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2005</div>
                        <div class="timeline-content">The listing of the 8 year East African Development Bank (EADB) Bond in December 2005.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2006</div>
                        <div class="timeline-content">Official cross-listing of Jubilee Holdings Limited (JHL) on the USE on 14th February making it the first insurance institution to list on the Uganda Capital Market.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2007</div>
                        <div class="timeline-content">Stanbic Bank Uganda is listed on the USE on 25 Jan following a successful IPO that was 200% over-subscribed.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2008</div>
                        <div class="timeline-content">Cross Listing of Kenya Commercial Bank.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2009</div>
                        <div class="timeline-content">Listing of National Insurance Corporation.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2010</div>
                        <div class="timeline-content">Cross Listing of Nation Media Group.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2010</div>
                        <div class="timeline-content">Automation of the Securities Central Depository.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2011</div>
                        <div class="timeline-content">Stanbic bank undertook a bonus share issue in the ratio of 1:1 bringing the total number of shares in issue to 5,118,867,000</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2011</div>
                        <div class="timeline-content">Cross Listing of Centum Kenya on the Uganda Securities Exchange.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2012</div>
                        <div class="timeline-content">Cross Listing of Equity Bank Kenya on the Uganda Securities Exchange.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2012</div>
                        <div class="timeline-content">Stanbic Bank Uganda listed an additional 40,950,935,760 shares to the benefit of its shareholders being the bank's second bonus offer after the one done in 2011. It brought the total number of shares to 51,188,669,700.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2012</div>
                        <div class="timeline-content">Umeme Limited was listed on the Uganda Securities Exchange following the offer of 622,378,000 to the public at a price of Ush. 275.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2013</div>
                        <div class="timeline-content">African Development Bank (AfDB) listed its second two-year sh12.5b bond to fund strategic projects in Uganda.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2013</div>
                        <div class="timeline-content">Cross Listing of Uchumi.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2014</div>
                        <div class="timeline-content">NIC undertook a rights issue of 192,000,000 million shares.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2014</div>
                        <div class="timeline-content">NIC undertook a bonus issue from which an additional 819,661,942 bonus shares were listed on the Uganda Securities Exchange.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2014</div>
                        <div class="timeline-content">ADB listed a 10 year bond</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2014</div>
                        <div class="timeline-content">DFCU Group undertook a bonus issue in the ratio 1:1</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2014</div>
                        <div class="timeline-content">Umeme Limited undertook a secondary offer in which part of the stake of the majority shareholder Umeme Holdings Limited was offered to the public at a price of Ush340.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2015</div>
                        <div class="timeline-content">Automation of trading through ATS and CSD systems.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2017</div>
                        <div class="timeline-content">Launch of the Easy Portal</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2017</div>
                        <div class="timeline-content">DFCU undertook a rights issue of 263,157,895 million shares</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2017</div>
                        <div class="timeline-content">Demutualization of the Exchange</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-year">2018</div>
                        <div class="timeline-content">The Rebrand of the Exchange</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Annual Reports -->
        <section class="section">
            <h2 class="section-title">Annual Reports</h2>
            <div class="section-content">
                <div class="reports-grid">
                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <h3 class="report-title">Annual Report 2023</h3>
                        <a href="/reports/annual-report-2023.pdf" class="report-link" target="_blank">
                            <i class="fas fa-download"></i>
                            Download PDF
                        </a>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <h3 class="report-title">Annual Report 2022</h3>
                        <a href="/reports/annual-report-2022.pdf" class="report-link" target="_blank">
                            <i class="fas fa-download"></i>
                            Download PDF
                        </a>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <h3 class="report-title">Annual Report 2021</h3>
                        <a href="/reports/annual-report-2021.pdf" class="report-link" target="_blank">
                            <i class="fas fa-download"></i>
                            Download PDF
                        </a>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <h3 class="report-title">Annual Report 2020</h3>
                        <a href="/reports/annual-report-2020.pdf" class="report-link" target="_blank">
                            <i class="fas fa-download"></i>
                            Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>Uganda Securities Exchange</h3>
                    <p>Building East Africa's premier financial market through innovative trading solutions, comprehensive market data, and professional investment services.</p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <div class="footer-links">
                        <a href="{{ route('about') }}" class="footer-link">About USE</a>
                        <a href="#" class="footer-link">How to Invest</a>
                        <a href="{{ route('securities') }}" class="footer-link">Listed Securities</a>
                        <a href="#" class="footer-link">Market Data</a>
                        <a href="#" class="footer-link">Trading Rules</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Services</h4>
                    <div class="footer-links">
                        <a href="#" class="footer-link">Securities Trading</a>
                        <a href="#" class="footer-link">Corporate Listings</a>
                        <a href="#" class="footer-link">Investment Advisory</a>
                        <a href="#" class="footer-link">Investor Education</a>
                        <a href="#" class="footer-link">Market Research</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <div class="footer-links">
                        <a href="mailto:{{ $siteContent['contact_email'] ?? 'info@use.co.ug' }}" class="footer-link">
                            <i class="fas fa-envelope"></i> {{ $siteContent['contact_email'] ?? 'info@use.co.ug' }}
                        </a>
                        <a href="tel:{{ $siteContent['contact_phone'] ?? '+256414230738' }}" class="footer-link">
                            <i class="fas fa-phone"></i> {{ $siteContent['contact_phone'] ?? '+256 414 230 738' }}
                        </a>
                        <div class="footer-link">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $siteContent['contact_address'] ?? 'Uganda Securities Exchange, Plot 24/26 Kampala Road, Kampala, Uganda' }}
                        </div>
                        <div class="footer-link">
                            <i class="fas fa-clock"></i>
                            Trading Hours: {{ $siteContent['trading_hours'] ?? '9:00 AM - 3:00 PM EAT' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div>
                    <p>&copy; {{ date('Y') }} Uganda Securities Exchange. All rights reserved.</p>
                </div>
                <div>
                    <a href="#" class="footer-link">Privacy Policy</a>
                    <span style="margin: 0 1rem; color: #64748b;">|</span>
                    <a href="#" class="footer-link">Terms of Service</a>
                    <span style="margin: 0 1rem; color: #64748b;">|</span>
                    <a href="#" class="footer-link">Disclaimer</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll behavior
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
