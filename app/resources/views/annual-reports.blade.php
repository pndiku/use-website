<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annual Reports - Uganda Securities Exchange</title>
    <meta name="description" content="Download annual reports from the Uganda Securities Exchange. Access comprehensive market data, financial insights, and regulatory updates.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
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
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.06);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);

            /* Gradients */
            --gradient-primary: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-dark) 100%);
            --gradient-accent: linear-gradient(135deg, var(--use-yellow) 0%, var(--use-yellow-light) 100%);
        }

        /* Header - EXACT COPY FROM INDEX */
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
            font-size: 1.5rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.03em;
            transition: all 0.3s ease;
            position: relative;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--gradient-accent);
            border-radius: 1px;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .logo:hover::after {
            transform: scaleX(1);
        }

        .logo:hover {
            transform: translateY(-1px);
        }

        .logo::before {
            content: "";
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-light) 100%);
            margin-right: 8px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
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
            overflow: visible;
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
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
            transform: translateX(4px);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
        }

        /* Main Content */
        .main-content {
            margin-top: 2rem;
            min-height: 100vh;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-dark) 100%);
            color: white;
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="20" cy="20" r="0.3" fill="rgba(255,255,255,0.15)"/><circle cx="80" cy="30" r="0.4" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .hero-stats {
            display: flex;
            gap: 3rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--use-yellow);
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-top: 0.5rem;
        }

        /* Reports Section */
        .reports-section {
            padding: 4rem 0;
            background: var(--surface-secondary);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Filter Controls */
        .filter-controls {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            background: var(--surface);
            border: 2px solid var(--border);
            border-radius: 50px;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .filter-btn:hover {
            border-color: var(--use-blue);
            color: var(--use-blue);
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background: var(--use-blue);
            border-color: var(--use-blue);
            color: white;
        }

        /* Reports Grid */
        .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        /* Featured Report Card */
        .report-card.featured {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            padding: 2.5rem;
            background: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-dark) 100%);
            color: white;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
        }

        .featured::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="0.5" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            animation: float 15s ease-in-out infinite;
        }

        .featured-badge {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: var(--use-yellow);
            color: var(--text-primary);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            z-index: 2;
        }

        /* Regular Report Card */
        .report-card {
            background: var(--surface);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            border: 1px solid var(--border-light);
            position: relative;
            overflow: hidden;
        }

        .report-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .report-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--use-blue-light) 0%, var(--use-blue) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .report-year {
            font-size: 0.875rem;
            color: var(--use-blue);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .featured .report-year {
            color: var(--use-yellow);
        }

        .report-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .featured .report-title {
            color: white;
            font-size: 1.5rem;
        }

        .report-description {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .featured .report-description {
            color: rgba(255, 255, 255, 0.9);
        }

        .report-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-tertiary);
        }

        .featured .meta-item {
            color: rgba(255, 255, 255, 0.8);
        }

        .meta-item i {
            color: var(--use-blue);
        }

        .featured .meta-item i {
            color: var(--use-yellow);
        }

        .report-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--use-blue);
            color: white;
        }

        .btn-primary:hover {
            background: var(--use-blue-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--use-blue);
            border: 2px solid var(--use-blue);
        }

        .btn-secondary:hover {
            background: var(--use-blue);
            color: white;
            transform: translateY(-2px);
        }

        .featured .btn-secondary {
            color: white;
            border-color: white;
        }

        .featured .btn-secondary:hover {
            background: white;
            color: var(--use-blue);
        }

        /* Footer - EXACT COPY FROM INDEX */
        .footer {
            background: var(--text-primary);
            color: white;
            padding: 4rem 0 2rem;
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
            margin-bottom: 3rem;
        }

        .footer-brand h3 {
            font-size: 1.75rem;
            font-weight: 800;
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .footer-brand p {
            color: var(--text-tertiary);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 44px;
            height: 44px;
            background: var(--use-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--use-blue-light);
            transform: translateY(-2px);
        }

        .footer-section h4 {
            color: white;
            margin-bottom: 1rem;
            font-size: 1.125rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: var(--text-tertiary);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--use-blue-light);
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-bottom p {
            color: var(--text-tertiary);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-container {
                padding: 0 1rem;
            }

            .nav {
                display: none;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-stats {
                flex-wrap: wrap;
                gap: 2rem;
                justify-content: center;
            }

            .container {
                padding: 0 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .reports-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .report-card.featured {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .filter-controls {
                justify-content: center;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hero-section {
                padding: 3rem 0;
            }

            .hero-title {
                font-size: 2rem;
            }

            .report-card {
                padding: 1.5rem;
            }

            .report-card.featured {
                padding: 2rem;
            }

            .report-actions {
                flex-direction: column;
            }
        }

        /* Animation Classes */
        .animate-in {
            opacity: 0;
            transform: translateY(30px);
            animation: slideIn 0.6s ease forwards;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Header - EXACT COPY FROM INDEX -->
    <header class="header" id="header">
        <nav class="nav-container">
            <div class="logo">USE</div>
            <div class="market-status">
                <span class="status-indicator {{ ($siteContent['market_status'] ?? 'open') == 'open' ? 'open' : 'closed' }}"></span>
                <span class="status-text">{{ ucfirst($siteContent['market_status'] ?? 'Market Open') }}</span>
                <span class="status-time">{{ $siteContent['trading_hours'] ?? '9:00 AM - 3:00 PM EAT' }}</span>
            </div>
            <ul class="nav-menu">
                @if(isset($menuItems))
                    @foreach($menuItems as $menuItem)
                        <li class="nav-item">
                            <a href="{{ $menuItem->url ?: '#' }}" class="nav-link {{ request()->is('annual-reports') && str_contains(strtolower($menuItem->title), 'report') ? 'active' : '' }}"
                               @if($menuItem->opens_new_tab) target="_blank" @endif
                               @if($menuItem->hasActiveChildren()) onclick="toggleMobileDropdown(event)" @endif>
                                @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                                {{ $menuItem->title }}
                                @if($menuItem->hasActiveChildren()) <span class="chevron-down"></span> @endif
                            </a>
                            @if($menuItem->hasActiveChildren())
                                <div class="dropdown">
                                    @foreach($menuItem->activeChildren as $childItem)
                                        @if($childItem->hasActiveChildren())
                                            <a href="{{ $childItem->url ?: '#' }}" class="dropdown-item has-submenu"
                                               @if($childItem->opens_new_tab) target="_blank" @endif>
                                                @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                                {{ $childItem->title }}
                                                <span class="chevron-right"></span>
                                                <div class="submenu">
                                                    @foreach($childItem->activeChildren as $grandchildItem)
                                                        <a href="{{ $grandchildItem->url ?: '#' }}" class="submenu-item"
                                                           @if($grandchildItem->opens_new_tab) target="_blank" @endif>
                                                            @if($grandchildItem->icon) <i class="{{ $grandchildItem->icon }}"></i> @endif
                                                            {{ $grandchildItem->title }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </a>
                                        @else
                                            <a href="{{ $childItem->url ?: '#' }}" class="dropdown-item"
                                               @if($childItem->opens_new_tab) target="_blank" @endif>
                                                @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                                {{ $childItem->title }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @endforeach
                @else
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="/securities" class="nav-link">Securities</a>
                    </li>
                    <li class="nav-item">
                        <a href="/annual-reports" class="nav-link active">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                @endif
            </ul>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">☰</button>
        </nav>
    </header>

    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-container">
                <div class="hero-content animate-in">
                    <h1 class="hero-title">Annual Reports</h1>
                    <p class="hero-subtitle">Access comprehensive insights into Uganda's capital markets performance, regulatory developments, and strategic initiatives through our detailed annual reports.</p>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">{{ count($reports) }}</div>
                            <div class="stat-label">Years of Reports</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">240+</div>
                            <div class="stat-label">Pages of Insights</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Transparency</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Reports Section -->
        <section class="reports-section">
            <div class="container">
                <div class="section-header animate-in">
                    <h2 class="section-title">Annual Reports Archive</h2>
                    <p class="section-subtitle">Download and explore our comprehensive annual reports showcasing market growth, regulatory compliance, and strategic developments.</p>
                </div>

                <!-- Filter Controls -->
                <div class="filter-controls animate-in">
                    <button class="filter-btn active" onclick="filterReports('all')">All Reports</button>
                    <button class="filter-btn" onclick="filterReports('recent')">Recent (2020+)</button>
                    <button class="filter-btn" onclick="filterReports('featured')">Featured</button>
                </div>

                <!-- Reports Grid -->
                <div class="reports-grid animate-in" id="reportsGrid">
                    @foreach($reports as $index => $report)
                        @if($report['featured'])
                            <!-- Featured Report -->
                            <div class="report-card featured" data-year="{{ $report['year'] }}" data-featured="{{ $report['featured'] ? 'true' : 'false' }}">
                                <div class="featured-badge">
                                    <i class="fas fa-star"></i>
                                    Latest Report
                                </div>

                                <div>
                                    <div class="report-year">{{ $report['year'] }}</div>
                                    <h3 class="report-title">{{ $report['title'] }}</h3>
                                    <p class="report-description">{{ $report['description'] }}</p>

                                    <div class="report-meta">
                                        <div class="meta-item">
                                            <i class="fas fa-file-pdf"></i>
                                            <span>{{ $report['file_size'] }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <i class="fas fa-file-text"></i>
                                            <span>{{ $report['pages'] }} pages</span>
                                        </div>
                                    </div>

                                    <div class="report-actions">
                                        <a href="{{ $report['file_url'] }}" class="btn btn-primary" target="_blank">
                                            <i class="fas fa-download"></i>
                                            Download PDF
                                        </a>
                                        <button class="btn btn-secondary" onclick="previewReport('{{ $report['year'] }}')">
                                            <i class="fas fa-eye"></i>
                                            Quick Preview
                                        </button>
                                    </div>
                                </div>

                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <div class="report-icon" style="width: 120px; height: 120px; font-size: 3rem;">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Regular Report Card -->
                            <div class="report-card" data-year="{{ $report['year'] }}" data-featured="false">
                                <div class="report-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>

                                <div class="report-year">{{ $report['year'] }}</div>
                                <h3 class="report-title">{{ $report['title'] }}</h3>
                                <p class="report-description">{{ $report['description'] }}</p>

                                <div class="report-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-file-pdf"></i>
                                        <span>{{ $report['file_size'] }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-file-text"></i>
                                        <span>{{ $report['pages'] }} pages</span>
                                    </div>
                                </div>

                                <div class="report-actions">
                                    <a href="{{ $report['file_url'] }}" class="btn btn-primary" target="_blank">
                                        <i class="fas fa-download"></i>
                                        Download
                                    </a>
                                    <button class="btn btn-secondary" onclick="previewReport('{{ $report['year'] }}')">
                                        <i class="fas fa-eye"></i>
                                        Preview
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Footer - EXACT COPY FROM INDEX -->
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
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About USE</a></li>
                        <li><a href="/securities">Securities</a></li>
                        <li><a href="/annual-reports">Annual Reports</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Services</h4>
                    <ul class="footer-links">
                        <li><a href="#">Market Data</a></li>
                        <li><a href="#">Trading Services</a></li>
                        <li><a href="#">Regulatory Info</a></li>
                        <li><a href="#">Investor Relations</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Contact</h4>
                    <ul class="footer-links">
                        <li><a href="tel:+256414258441">+256 414 258 441</a></li>
                        <li><a href="mailto:info@use.or.ug">info@use.or.ug</a></li>
                        <li><a href="#">4th Floor, Farmers House</a></li>
                        <li><a href="#">Kampala, Uganda</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Uganda Securities Exchange. All rights reserved.</p>
                <div>
                    <a href="#" style="color: var(--text-tertiary); text-decoration: none; margin-right: 2rem;">Privacy Policy</a>
                    <a href="#" style="color: var(--text-tertiary); text-decoration: none;">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Filter functionality
        function filterReports(filter) {
            const cards = document.querySelectorAll('.report-card');
            const buttons = document.querySelectorAll('.filter-btn');

            // Update active button
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Filter cards
            cards.forEach(card => {
                const year = parseInt(card.dataset.year);
                const featured = card.dataset.featured === 'true';

                let show = false;

                switch(filter) {
                    case 'all':
                        show = true;
                        break;
                    case 'recent':
                        show = year >= 2020;
                        break;
                    case 'featured':
                        show = featured;
                        break;
                }

                if (show) {
                    card.style.display = 'block';
                    card.style.animation = 'slideIn 0.6s ease forwards';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Preview functionality
        function previewReport(year) {
            alert(`Preview functionality for ${year} report would open here. In a real implementation, this could open a modal with report highlights or the first few pages.`);
        }

        // Animate elements on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate-in');
            const windowHeight = window.innerHeight;

            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;

                if (elementTop < windowHeight - 100) {
                    element.style.animation = 'slideIn 0.6s ease forwards';
                }
            });
        }

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements already in view
            setTimeout(() => {
                animateOnScroll();
            }, 100);

            // Animate on scroll
            window.addEventListener('scroll', animateOnScroll);
        });
    </script>
</body>
</html>