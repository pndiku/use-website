<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to List - Uganda Securities Exchange</title>
    <meta name="description" content="Learn about the requirements and process for listing your company on the Uganda Securities Exchange.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:400,700&display=swap" rel="stylesheet">
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
            padding: 10rem 0 4rem;
            text-align: center;
            margin-top: 5rem;
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
            max-width: 700px;
            margin: 0 auto;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .intro-section {
            background: var(--surface);
            padding: 3rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            margin-bottom: 3rem;
        }

        .intro-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        .section {
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: var(--use-blue);
            font-size: 1.5rem;
        }

        .requirements-grid {
            display: grid;
            gap: 1rem;
        }

        .requirement-item {
            background: var(--surface);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            transition: all 0.3s ease;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .requirement-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            border-color: var(--use-blue-light);
        }

        .requirement-number {
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: var(--gradient-primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
        }

        .requirement-content {
            flex: 1;
        }

        .requirement-text {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .highlight-box {
            background: linear-gradient(135deg, rgba(0, 128, 199, 0.1) 0%, rgba(51, 153, 219, 0.05) 100%);
            border-left: 4px solid var(--use-blue);
            padding: 2rem;
            border-radius: 12px;
            margin: 2rem 0;
        }

        .highlight-box h3 {
            color: var(--use-blue);
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .highlight-box p {
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: 0.75rem;
        }

        .highlight-box p:last-child {
            margin-bottom: 0;
        }

        .additional-requirements {
            background: var(--surface);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
        }

        .additional-requirements ul {
            list-style: none;
            padding: 0;
        }

        .additional-requirements li {
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .additional-requirements li:last-child {
            border-bottom: none;
        }

        .additional-requirements li i {
            color: var(--use-blue);
            font-size: 1.25rem;
            margin-top: 0.25rem;
            flex-shrink: 0;
        }

        .additional-requirements li span {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .cta-section {
            background: var(--gradient-primary);
            padding: 3rem;
            border-radius: 16px;
            text-align: center;
            margin-top: 3rem;
            color: white;
        }

        .cta-section h3 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 1.75rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-primary {
            background: white;
            color: var(--use-blue);
        }

        .btn-primary:hover {
            background: var(--use-yellow);
            color: var(--text-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: var(--use-blue);
            transform: translateY(-2px);
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

            .intro-section {
                padding: 2rem;
            }

            .additional-requirements {
                padding: 1.5rem;
            }

            .cta-section {
                padding: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
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
                        @if($menuItem->hasActiveChildren())
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
            <h1 class="hero-title">How to List on USE</h1>
            <p class="hero-subtitle">General requirements and procedures for listing your company on the Uganda Securities Exchange</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Introduction -->
        <div class="intro-section">
            <p class="intro-text">
                A Company intending to apply for a listing on the Uganda Securities Exchange must conform to the listing Rules and Regulations as stipulated in the Continuing Listing Obligations. These obligations require that for the company to be admitted to the Official List, the following information shall be disclosed in an information memorandum or prospectus for an application for securities being listed on the Exchange.
            </p>
        </div>

        <!-- Main Requirements -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-list-check"></i>
                Required Documentation
            </h2>
            <div class="requirements-grid">
                <div class="requirement-item">
                    <div class="requirement-number">1</div>
                    <div class="requirement-content">
                        <p class="requirement-text">A prospectus setting out the information contained in Appendix 1 to the USE Listing Rules 2003</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">2</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Letter of no objection from the industry regulator of the issuer (if the company operates in a regulated industry)</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">3</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Board of directors' resolution to list</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">4</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Shareholders resolutions in respect of the offer</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">5</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Capital Markets Authority approval letter</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">6</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Contracts entered into in connection with the Issue</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">7</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Underwriting agreements if any</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">8</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Contracts with registrars where applicable</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">9</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Certificate of incorporation of the issuer or any other incorporation document</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">10</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Declaration by the sponsoring broker in the form set out in Appendix 6 of the USE Listing Rules</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">11</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Memorandum and Articles of Association of the Issuer or any other constitutive documents which must comply with the requirements of the Securities Exchange whether or not required by the law</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">12</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Copies of the documents provided for inspection pursuant to the proposed issue</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">13</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Financial reports for the three to five year period preceding the issue</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">14</div>
                    <div class="requirement-content">
                        <p class="requirement-text">A list of existing shareholders</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">15</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Management contracts if applicable</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">16</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Letter of undertaking of the issuer</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">17</div>
                    <div class="requirement-content">
                        <p class="requirement-text">Material contracts</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">18</div>
                    <div class="requirement-content">
                        <p class="requirement-text">A Reporting Accountant's report. For the avoidance of doubt, the reporting accountants report shall be prepared by a firm different from the one carrying out the audit of the issuer.</p>
                    </div>
                </div>

                <div class="requirement-item">
                    <div class="requirement-number">19</div>
                    <div class="requirement-content">
                        <p class="requirement-text">For an applicant that is already listed on another exchange and is applying to list by way of introduction, a letter of no objection must be submitted from the regulator and stock exchange of the primary market where the applicant's securities are listed.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Requirements -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-building"></i>
                Company Requirements
            </h2>
            <div class="additional-requirements">
                <ul>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Following or immediately prior to listing, at least 20% - 25% of the shares must be held by not less than one hundred shareholders excluding employees and direct family members of the issuer.</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>The company should be engaged in substantially the same business and management, and share control throughout the last three years before the application.</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>The securities for which listing is sought must be freely transferable, subject to any restriction that may be imposed by written law.</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Have only one class of voting shares, which shall be offered at the exchange.</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>The name, history and description of the company's interests and activities.</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>A report by the company's auditors in respect of the last completed financial years (five for the first tier and three years for the second tier) of the company if the company has been in existence for three, five or more years.</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Forecast earnings and dividends.</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Details of share capital structure, loan capital and the borrowing powers of the company.</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Highlight Box -->
        <div class="highlight-box">
            <h3><i class="fas fa-info-circle"></i> Important Note</h3>
            <p>The above basic requirements are amplified in the USE Rules 2003 Listing Rules.</p>
            <p>The Committee may in its discretion grant exemption from compliance with any provision under these rules provided that it is justifiable and upon terms and conditions it may think fit. The Authority shall be informed of any decision to exempt an applicant from compliance with these rules.</p>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <h3>Ready to List Your Company?</h3>
            <p>Get in touch with our listings team to discuss your requirements and begin the process</p>
            <div class="cta-buttons">
                <a href="mailto:{{ $siteContent['contact_email'] ?? 'info@use.co.ug' }}" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    Contact Listings Team
                </a>
                <a href="#" class="btn btn-secondary">
                    <i class="fas fa-download"></i>
                    Download Listing Rules
                </a>
            </div>
        </div>
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
                        <a href="{{ route('how-to-list') }}" class="footer-link">How to List</a>
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
