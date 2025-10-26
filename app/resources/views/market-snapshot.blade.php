<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Snapshot - Uganda Securities Exchange</title>
    <meta name="description" content="Real-time market data and stock prices for all listed securities on the Uganda Securities Exchange">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- External Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/reconnecting-websocket/1.0.0/reconnecting-websocket.min.js"></script>

    <style>
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

            /* Legacy color mappings */
            --primary: var(--use-blue);
            --primary-dark: var(--use-blue-dark);
            --primary-light: var(--use-blue-light);
            --success: var(--use-green);
            --danger: var(--use-red);
            --warning: var(--use-yellow);

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

            /* Gradients */
            --gradient-primary: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-light) 100%);
            --gradient-accent: linear-gradient(135deg, var(--use-yellow) 0%, var(--use-yellow-light) 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Titillium Web', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            overflow-x: hidden;
            scroll-behavior: smooth;
            background: linear-gradient(180deg, var(--use-blue) 0%, var(--use-blue-light) 15%, var(--surface-secondary) 15%, var(--surface-secondary) 100%);
            background: var(--surface-secondary);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Titillium Web', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-weight: 700;
            letter-spacing: -0.02em;
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
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .nav-link:hover {
            color: var(--primary);
            background: rgba(0, 128, 199, 0.05);
            transform: translateY(-1px);
            text-decoration: none;
        }

        .nav-link.active {
            color: var(--primary);
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
            top: 100%;
            left: 0;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border);
            padding: 0.5rem 0;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
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
            color: var(--text-primary);
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .dropdown-item:hover {
            background: var(--surface-tertiary);
            color: var(--primary);
            text-decoration: none;
        }

        .dropdown > li:not(.has-submenu) .dropdown-item:hover {
            transform: translateX(4px);
        }

        .dropdown > li.has-submenu > .dropdown-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

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

        .dropdown > li.has-submenu:hover > .submenu {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateX(0) !important;
            pointer-events: auto !important;
        }

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
            padding: 0.625rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .submenu-item:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--primary);
            transform: translateX(4px);
        }

        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            gap: 0.25rem;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: rgba(0, 128, 199, 0.05);
        }

        .mobile-menu-btn span {
            width: 20px;
            height: 2px;
            background: var(--text-primary);
            transition: all 0.3s ease;
            border-radius: 1px;
        }

        /* Hero Section */
        .hero-section {
            background: var(--gradient-primary);
            color: white;
            padding: 12rem 0 4rem;
            width: 100vw;
            position: relative;
            left: 50%;
            margin-left: -50vw;
            margin-top: 0;
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .page-header {
            margin-bottom: 0;
        }

        .page-title {
            font-family: 'Titillium Web', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
            color: white;
        }

        .page-description {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }

        /* Main Content */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .update-status {
            background: var(--surface);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .update-status-text {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .update-pulse {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--use-green);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.1); }
        }

        .last-update {
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Market Data Table */
        .table-container {
            background: var(--surface);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-light);
            overflow: hidden;
            position: relative;
        }

        .table-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .market-table {
            width: 100%;
            border-collapse: collapse;
        }

        .market-table thead {
            background: var(--surface-secondary);
        }

        .market-table thead th {
            padding: 1.25rem 1rem;
            text-align: left;
            font-weight: 700;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
            border-bottom: 2px solid var(--border);
        }

        .market-table thead th:nth-child(n+3) {
            text-align: right;
        }

        .market-table tbody tr {
            border-bottom: 1px solid var(--border-light);
            transition: all 0.2s ease;
        }

        .market-table tbody tr:hover {
            background: var(--surface-secondary);
        }

        .market-table tbody td {
            padding: 1.25rem 1rem;
            font-size: 0.95rem;
            color: var(--text-primary);
        }

        .market-table tbody td:nth-child(n+3) {
            text-align: right;
        }

        .stock-code {
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .stock-code:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .stock-name {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .change-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .change-badge.positive {
            background: rgba(39, 221, 90, 0.1);
            color: var(--use-green);
        }

        .change-badge.negative {
            background: rgba(221, 39, 39, 0.1);
            color: var(--use-red);
        }

        .price-value {
            font-weight: 600;
            font-variant-numeric: tabular-nums;
        }

        /* Loading State */
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid var(--border);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 5rem 0 2rem;
            position: relative;
            margin-top: 4rem;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(253, 185, 19, 0.5), transparent);
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
            width: 40px;
            height: 40px;
            background: rgba(0, 128, 199, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--use-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: rgba(0, 128, 199, 0.2);
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
            color: var(--use-blue);
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
        @media (max-width: 768px) {
            .header {
                top: 0.5rem;
                width: calc(100% - 1rem);
            }

            .nav-container {
                padding: 0 1rem;
                height: 56px;
            }

            .logo img {
                height: 50px;
            }

            .market-status {
                padding: 0.375rem 0.75rem;
                order: -1;
                margin-left: auto;
                margin-right: 0.5rem;
            }

            .status-time {
                display: none;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: calc(100% + 1rem);
                left: 1rem;
                right: 1rem;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 12px;
                border: 1px solid var(--border);
                box-shadow: var(--shadow-lg);
                padding: 1rem;
                flex-direction: column;
                gap: 0;
            }

            .nav-menu.active {
                display: flex;
            }

            .nav-item {
                width: 100%;
            }

            .nav-link {
                padding: 1rem;
                justify-content: space-between;
                width: 100%;
            }

            .hero-section {
                padding: 8rem 0 3rem;
            }

            .hero-container {
                padding: 0 1rem;
            }

            .main-container {
                padding: 2rem 1rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .table-container {
                overflow-x: auto;
            }

            .market-table {
                min-width: 800px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hero-section {
                padding: 8rem 0 3rem;
            }

            .page-title {
                font-size: 1.75rem;
            }

            .page-description {
                font-size: 1rem;
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
                        <a href="{{ $menuItem->url ?: '#' }}" class="nav-link {{ Request::is(ltrim($menuItem->url, '/')) ? 'active' : '' }}"
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
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-container">
            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="/">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>Market Statistics</span>
                <i class="fas fa-chevron-right"></i>
                <span>Market Snapshot</span>
            </nav>

            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">Market Snapshot</h1>
                <p class="page-description">Real-time market data and stock prices for all listed securities on the Uganda Securities Exchange</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-container">
        <!-- Update Status -->
        <div class="update-status">
            <div class="update-status-text">
                <span class="update-pulse"></span>
                <span>Live market data</span>
            </div>
            <span id="last_update" class="last-update">Connecting...</span>
        </div>

        <!-- Market Data Table -->
        <div class="table-container">
            <table class="market-table">
                <thead>
                    <tr>
                        <th>Stock Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>% Change</th>
                        <th>Opening Price</th>
                        <th>High</th>
                        <th>Low</th>
                        <th>Last Deal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="/listed/AIRTEL_UGANDA" class="stock-code">AIRTEL UGANDA</a></td>
                        <td class="stock-name">AIRTEL UGANDA LIMITED</td>
                        <td class="price-value" id="AIRTEL_UGANDA_close">-</td>
                        <td id="AIRTEL_UGANDA_change">-</td>
                        <td class="price-value" id="AIRTEL_UGANDA_open">-</td>
                        <td class="price-value" id="AIRTEL_UGANDA_high">-</td>
                        <td class="price-value" id="AIRTEL_UGANDA_low">-</td>
                        <td id="AIRTEL_UGANDA_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/BOBU" class="stock-code">BOBU</a></td>
                        <td class="stock-name">Bank of Baroda Uganda</td>
                        <td class="price-value" id="BOBU_close">-</td>
                        <td id="BOBU_change">-</td>
                        <td class="price-value" id="BOBU_open">-</td>
                        <td class="price-value" id="BOBU_high">-</td>
                        <td class="price-value" id="BOBU_low">-</td>
                        <td id="BOBU_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/BATU" class="stock-code">BATU</a></td>
                        <td class="stock-name">British American Tobacco Uganda</td>
                        <td class="price-value" id="BATU_close">-</td>
                        <td id="BATU_change">-</td>
                        <td class="price-value" id="BATU_open">-</td>
                        <td class="price-value" id="BATU_high">-</td>
                        <td class="price-value" id="BATU_low">-</td>
                        <td id="BATU_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/CENT" class="stock-code">CENT</a></td>
                        <td class="stock-name">Centum Investment Company Ltd</td>
                        <td class="price-value" id="CENT_close">-</td>
                        <td id="CENT_change">-</td>
                        <td class="price-value" id="CENT_open">-</td>
                        <td class="price-value" id="CENT_high">-</td>
                        <td class="price-value" id="CENT_low">-</td>
                        <td id="CENT_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/DFCU" class="stock-code">DFCU</a></td>
                        <td class="stock-name">DEVELOPMENT FINANCE COMPANY OF UGANDA LTD</td>
                        <td class="price-value" id="DFCU_close">-</td>
                        <td id="DFCU_change">-</td>
                        <td class="price-value" id="DFCU_open">-</td>
                        <td class="price-value" id="DFCU_high">-</td>
                        <td class="price-value" id="DFCU_low">-</td>
                        <td id="DFCU_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/EABL" class="stock-code">EABL</a></td>
                        <td class="stock-name">East African Breweries Limited</td>
                        <td class="price-value" id="EABL_close">-</td>
                        <td id="EABL_change">-</td>
                        <td class="price-value" id="EABL_open">-</td>
                        <td class="price-value" id="EABL_high">-</td>
                        <td class="price-value" id="EABL_low">-</td>
                        <td id="EABL_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/EBL" class="stock-code">EBL</a></td>
                        <td class="stock-name">Equity Bank Limited</td>
                        <td class="price-value" id="EBL_close">-</td>
                        <td id="EBL_change">-</td>
                        <td class="price-value" id="EBL_open">-</td>
                        <td class="price-value" id="EBL_high">-</td>
                        <td class="price-value" id="EBL_low">-</td>
                        <td id="EBL_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/KCB" class="stock-code">KCB</a></td>
                        <td class="stock-name">KCB Group</td>
                        <td class="price-value" id="KCB_close">-</td>
                        <td id="KCB_change">-</td>
                        <td class="price-value" id="KCB_open">-</td>
                        <td class="price-value" id="KCB_high">-</td>
                        <td class="price-value" id="KCB_low">-</td>
                        <td id="KCB_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/KA" class="stock-code">KA</a></td>
                        <td class="stock-name">Kenya Airways</td>
                        <td class="price-value" id="KA_close">-</td>
                        <td id="KA_change">-</td>
                        <td class="price-value" id="KA_open">-</td>
                        <td class="price-value" id="KA_high">-</td>
                        <td class="price-value" id="KA_low">-</td>
                        <td id="KA_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/MTNU" class="stock-code">MTNU</a></td>
                        <td class="stock-name">MTN UGANDA LIMITED</td>
                        <td class="price-value" id="MTNU_close">-</td>
                        <td id="MTNU_change">-</td>
                        <td class="price-value" id="MTNU_open">-</td>
                        <td class="price-value" id="MTNU_high">-</td>
                        <td class="price-value" id="MTNU_low">-</td>
                        <td id="MTNU_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/NMG" class="stock-code">NMG</a></td>
                        <td class="stock-name">Nation Media Group</td>
                        <td class="price-value" id="NMG_close">-</td>
                        <td id="NMG_change">-</td>
                        <td class="price-value" id="NMG_open">-</td>
                        <td class="price-value" id="NMG_high">-</td>
                        <td class="price-value" id="NMG_low">-</td>
                        <td id="NMG_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/NIC" class="stock-code">NIC</a></td>
                        <td class="stock-name">National Insurance Corporation</td>
                        <td class="price-value" id="NIC_close">-</td>
                        <td id="NIC_change">-</td>
                        <td class="price-value" id="NIC_open">-</td>
                        <td class="price-value" id="NIC_high">-</td>
                        <td class="price-value" id="NIC_low">-</td>
                        <td id="NIC_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/NVL" class="stock-code">NVL</a></td>
                        <td class="stock-name">New Vision Printing and Publishing Company Ltd</td>
                        <td class="price-value" id="NVL_close">-</td>
                        <td id="NVL_change">-</td>
                        <td class="price-value" id="NVL_open">-</td>
                        <td class="price-value" id="NVL_high">-</td>
                        <td class="price-value" id="NVL_low">-</td>
                        <td id="NVL_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/QCIL" class="stock-code">QCIL</a></td>
                        <td class="stock-name">QUALITY CHEMICAL INDUSTRIES LIMITED</td>
                        <td class="price-value" id="QCIL_close">-</td>
                        <td id="QCIL_change">-</td>
                        <td class="price-value" id="QCIL_open">-</td>
                        <td class="price-value" id="QCIL_high">-</td>
                        <td class="price-value" id="QCIL_low">-</td>
                        <td id="QCIL_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/SBU" class="stock-code">SBU</a></td>
                        <td class="stock-name">Stanbic Bank Uganda</td>
                        <td class="price-value" id="SBU_close">-</td>
                        <td id="SBU_change">-</td>
                        <td class="price-value" id="SBU_open">-</td>
                        <td class="price-value" id="SBU_high">-</td>
                        <td class="price-value" id="SBU_low">-</td>
                        <td id="SBU_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/UMEM" class="stock-code">UMEM</a></td>
                        <td class="stock-name">UMEME LIMITED</td>
                        <td class="price-value" id="UMEM_close">-</td>
                        <td id="UMEM_change">-</td>
                        <td class="price-value" id="UMEM_open">-</td>
                        <td class="price-value" id="UMEM_high">-</td>
                        <td class="price-value" id="UMEM_low">-</td>
                        <td id="UMEM_last">-</td>
                    </tr>
                    <tr>
                        <td><a href="/listed/UCL" class="stock-code">UCL</a></td>
                        <td class="stock-name">Uganda Clays Limited</td>
                        <td class="price-value" id="UCL_close">-</td>
                        <td id="UCL_change">-</td>
                        <td class="price-value" id="UCL_open">-</td>
                        <td class="price-value" id="UCL_high">-</td>
                        <td class="price-value" id="UCL_low">-</td>
                        <td id="UCL_last">-</td>
                    </tr>
                </tbody>
            </table>
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
                        <a href="#" class="footer-link">About USE</a>
                        <a href="#" class="footer-link">How to Invest</a>
                        <a href="#" class="footer-link">Listed Securities</a>
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
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.querySelector('.nav-menu');
            menu.classList.toggle('active');
        }

        // Mobile dropdown toggle
        function toggleMobileDropdown(event) {
            if (window.innerWidth <= 768) {
                event.preventDefault();
                const dropdown = event.currentTarget.nextElementSibling;
                const chevron = event.currentTarget.querySelector('.chevron-down');

                if (dropdown && dropdown.classList.contains('dropdown')) {
                    dropdown.classList.toggle('active');
                    chevron.style.transform = dropdown.classList.contains('active')
                        ? 'rotate(225deg)'
                        : 'rotate(45deg)';
                }
            }
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

        // Market data WebSocket connection
        (function() {
            // Configure accounting.js
            accounting.settings = {
                currency: {
                    symbol: "UGX ",
                    format: "%s%v",
                    decimal: ".",
                    thousand: ",",
                    precision: 0
                },
                number: {
                    precision: 2,
                    thousand: ",",
                    decimal: "."
                }
            };

            // Function to update prices
            var updatePrices = function(data) {
                data.forEach(function(v) {
                    var stock = v.stock.replace(/ /g, "_");

                    // Check if this stock exists in our table
                    var closeElement = document.getElementById(stock + "_close");
                    if (!closeElement) {
                        // Stock not in our table, skip it
                        console.log('Skipping stock not in table:', v.stock);
                        return;
                    }

                    // Update change percentage with badge
                    var changeElement = document.getElementById(stock + "_change");
                    if (changeElement) {
                        if (v.change_percent > 0.0) {
                            changeElement.innerHTML =
                                '<span class="change-badge positive"><i class="fas fa-arrow-up"></i>' +
                                accounting.formatNumber(v.change_percent, 2) + '%</span>';
                        } else if (v.change_percent < 0.0) {
                            changeElement.innerHTML =
                                '<span class="change-badge negative"><i class="fas fa-arrow-down"></i>' +
                                accounting.formatNumber(v.change_percent, 2) + '%</span>';
                        } else {
                            changeElement.innerHTML =
                                '<span class="change-badge">0.00%</span>';
                        }
                    }

                    // Handle high/low values
                    if (v.high == 0) {
                        v.high = Math.max(v.open, v.close);
                    }
                    if (v.low == 0) {
                        v.low = Math.min(v.open, v.close);
                    }

                    // Update prices
                    var openElement = document.getElementById(stock + "_open");
                    var highElement = document.getElementById(stock + "_high");
                    var lowElement = document.getElementById(stock + "_low");
                    var lastElement = document.getElementById(stock + "_last");

                    if (openElement) openElement.textContent = accounting.formatNumber(v.open, 2);
                    if (closeElement) closeElement.textContent = accounting.formatNumber(v.close, 2);
                    if (highElement) highElement.textContent = accounting.formatNumber(v.high, 2);
                    if (lowElement) lowElement.textContent = accounting.formatNumber(v.low, 2);

                    // Update last deal
                    if (lastElement && v.last_traded_quantity > 0) {
                        lastElement.textContent =
                            accounting.formatNumber(v.last_traded_quantity, 0) + " @ UGX " +
                            accounting.formatNumber(v.last_deal_price, 2);
                    }

                    // Update timestamp
                    var updateElement = document.getElementById('last_update');
                    if (updateElement) {
                        updateElement.textContent =
                            'Last updated: ' + moment(v.time).format('DD-MMM @ HH:mm:ss');
                    }
                });
            };

            // Connect to WebSocket
            var socket = new ReconnectingWebSocket("wss://scd.use.or.ug/ws");

            socket.onopen = function() {
                console.log('Connected to market data feed');
                socket.send('{"subscribe": "prices"}');
                document.getElementById('last_update').textContent = 'Connected - waiting for data...';
            };

            socket.onerror = function(error) {
                console.error('WebSocket Error:', error);
                document.getElementById('last_update').textContent = 'Connection error - retrying...';
            };

            socket.onmessage = function(msg) {
                try {
                    var message = JSON.parse(msg.data);
                    if (message.channel == "prices" && message.data && message.data.market) {
                        updatePrices(message.data.market);
                    }
                } catch (e) {
                    console.error('Error parsing message:', e);
                }
            };

            socket.onclose = function() {
                console.log('WebSocket connection closed - reconnecting...');
                document.getElementById('last_update').textContent = 'Reconnecting...';
            };
        })();
    </script>
</body>
</html>
