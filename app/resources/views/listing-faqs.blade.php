<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing FAQs - Uganda Securities Exchange</title>
    <meta name="description" content="Frequently asked questions about listing on the Uganda Securities Exchange and understanding securities markets.">

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

        /* FAQ Items */
        .faq-grid {
            display: grid;
            gap: 1.5rem;
        }

        .faq-item {
            background: var(--surface);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: var(--shadow-md);
            border-color: var(--use-blue-light);
        }

        .faq-question {
            padding: 1.5rem;
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--use-blue);
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            cursor: pointer;
            user-select: none;
        }

        .faq-question i {
            margin-top: 0.25rem;
            flex-shrink: 0;
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem 1.5rem;
            color: var(--text-secondary);
            line-height: 1.8;
        }

        .faq-answer p {
            margin-bottom: 1rem;
        }

        .faq-answer p:last-child {
            margin-bottom: 0;
        }

        /* Definition Box */
        .definition-box {
            background: var(--surface);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .definition-box:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .definition-term {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--use-blue);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .definition-term i {
            font-size: 1rem;
        }

        .definition-content {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        /* Benefits List */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .benefit-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            text-align: center;
            transition: all 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--use-blue-light);
        }

        .benefit-icon {
            font-size: 3rem;
            color: var(--use-blue);
            margin-bottom: 1rem;
        }

        .benefit-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }

        .benefit-text {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        /* CTA Section */
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

            .benefits-grid {
                grid-template-columns: 1fr;
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
            <h1 class="hero-title">Listing FAQs</h1>
            <p class="hero-subtitle">Frequently asked questions about listing and understanding securities markets in Uganda</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- General Questions -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-question-circle"></i>
                Understanding the Securities Exchange
            </h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-circle-right"></i>
                        <span>What is a Stock Exchange?</span>
                    </div>
                    <div class="faq-answer">
                        <p>A Stock Exchange is a market where large and small investors can buy and sell securities (shares, bonds etc). It is an organized market where buyers and sellers of securities meet as dealers/brokers represent them and acquire or sell securities. It is a market in which securities are traded by members of the Exchange who may act as both Agents (Brokers) and as Principals (Dealers).</p>
                        <p>The USE is one such market, which has recently been set up in Uganda. It was established in 1998 as a result of a Government policy of transforming the economy of the country from a public sector to the private sector basis.</p>
                        <p>The Exchange was incorporated in June 1997 as a company limited by guarantee without a share capital. It became operational in January 1998. The USE is therefore a non-profit making body created to facilitate the Government implementation of the reforms and in the future to encourage wider share ownership of the privatized and all the companies in Uganda.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-circle-right"></i>
                        <span>What is a Primary market?</span>
                    </div>
                    <div class="faq-answer">
                        <p>This is where new issues of securities are offered to the public.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-circle-right"></i>
                        <span>What is a Secondary market?</span>
                    </div>
                    <div class="faq-answer">
                        <p>This is where already existing securities are bought and sold on the exchange through licensed stockbrokers.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Key Definitions -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-book"></i>
                Key Definitions
            </h2>
            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-certificate"></i>
                    Securities
                </div>
                <div class="definition-content">
                    These are financial documents in the form of debt (bonds) or equity (shares) by which the claims of holders are secured.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Bond
                </div>
                <div class="definition-content">
                    Is a borrowing arrangement in which the borrower issues (sells) an IOU to the investor promising to pay an agreed upon amount at a given time.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-chart-line"></i>
                    Share
                </div>
                <div class="definition-content">
                    Is a unit of ownership of a company.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-landmark"></i>
                    Treasury Bills
                </div>
                <div class="definition-content">
                    Treasury bills are short-term, highly liquid financial instruments issued regularly by governments. In Uganda there are 91-day, 182-day, 271-day and 365-day treasury bills.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-tag"></i>
                    Price
                </div>
                <div class="definition-content">
                    The unit price of a security.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-hand-holding-usd"></i>
                    Offer
                </div>
                <div class="definition-content">
                    An order to sell a security posted on the Trading Board.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-shopping-cart"></i>
                    Bid
                </div>
                <div class="definition-content">
                    An order to buy a security posted on the Trading Board.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-arrows-alt-h"></i>
                    Spread
                </div>
                <div class="definition-content">
                    The step by step increase or decrease in price by which bids and offers may be raised or lowered.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-rocket"></i>
                    Public Flotation
                </div>
                <div class="definition-content">
                    This is when a company goes public by issuing its shares to the general public i.e. selling part ownership to the public.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-building"></i>
                    Listed Company
                </div>
                <div class="definition-content">
                    A company whose securities are listed at the USE.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-list-alt"></i>
                    Listed Security
                </div>
                <div class="definition-content">
                    A security which has been admitted to the listing at the USE.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-user-tie"></i>
                    Dealer or Stock Broking Firm
                </div>
                <div class="definition-content">
                    A listed company constituted for the purpose of undertaking on his behalf as well as on behalf of the clients all transactions for which he is responsible in the course of exercising his functions as a stockbroker.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-calendar-check"></i>
                    Books Close Date
                </div>
                <div class="definition-content">
                    The day on which the register of a company is closed.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-percentage"></i>
                    Coupon
                </div>
                <div class="definition-content">
                    The amount of interest which a bond pays on its nominal value.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-money-bill-wave"></i>
                    Dividend
                </div>
                <div class="definition-content">
                    The proportion of profits which is paid out to shareholders in a company, often paid in two installments as interim and final dividend.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-calculator"></i>
                    PE Ratio
                </div>
                <div class="definition-content">
                    Price-Earnings ratio, a relative measure of how cheap or dear a company's shares are.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-clipboard-list"></i>
                    Annual General Meeting
                </div>
                <div class="definition-content">
                    An annual general meeting is a meeting which must be held by all public companies which sell shares on the securities exchange. Here, a report on the company's performance is made to shareholders and shareholders are given the right to vote on major policy decisions concerning the company.
                </div>
            </div>

            <div class="definition-box">
                <div class="definition-term">
                    <i class="fas fa-file-alt"></i>
                    Prospectus
                </div>
                <div class="definition-content">
                    Is a document that gives the financial and management details of a company i.e. the financial history and future plans of the company.
                </div>
            </div>
        </section>

        <!-- Common Questions -->
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-comments"></i>
                Common Questions
            </h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-circle-right"></i>
                        <span>Why is the Securities Exchange so important for Uganda?</span>
                    </div>
                    <div class="faq-answer">
                        <p>With the growing competition and the quest for company growth and expansion, companies cannot succeed single-handedly. There is need to access alternative sources of investment capital from a wide base of investment sources. USE represents a vital link between companies with capital needs and the public with savings to invest. Investors will become part owners of the companies they invest in. In return, companies will raise capital from selling shares enabling them to expand their services, replace equipment and develop new products. This will create more employment, incomes and the overall economy will be in position to grow.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-circle-right"></i>
                        <span>What are the benefits of investing in shares?</span>
                    </div>
                    <div class="faq-answer">
                        <div class="benefits-grid">
                            <div class="benefit-card">
                                <div class="benefit-icon">
                                    <i class="fas fa-coins"></i>
                                </div>
                                <div class="benefit-title">Income in Form of Dividend</div>
                                <div class="benefit-text">
                                    When you buy shares of a company you become a part owner of that company and therefore will be entitled to get a share of the profits of the company which come in form of dividends.
                                </div>
                            </div>
                            <div class="benefit-card">
                                <div class="benefit-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="benefit-title">Capital Gains</div>
                                <div class="benefit-text">
                                    This refers to the increase in the value of your investment in shares.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <div class="cta-section">
            <h3>Have More Questions?</h3>
            <p>Our team is ready to help you understand the listing process and answer any questions you may have</p>
            <div class="cta-buttons">
                <a href="mailto:{{ $siteContent['contact_email'] ?? 'info@use.co.ug' }}" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    Contact Us
                </a>
                <a href="{{ route('how-to-list') }}" class="btn btn-secondary">
                    <i class="fas fa-list-check"></i>
                    How to List
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
                        <a href="{{ route('listing-faqs') }}" class="footer-link">FAQs</a>
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
