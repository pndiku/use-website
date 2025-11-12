<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearing and Settlement Services - Uganda Securities Exchange</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <meta name="description" content="Automated trade reporting, clearing and settlement services with T+3 settlement cycle and delivery versus payment guarantee.">

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
            --text-primary: #1a202c;
            --text-secondary: var(--use-gray);
            --border: #e2e8f0;
            --border-light: #f1f5f9;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --gradient-primary: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-light) 100%);
        }

        .header {
            position: fixed;
            top: 1rem;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(24px);
            border: 1px solid var(--border-light);
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
            z-index: 1000;
            transition: all 0.4s ease;
            width: calc(100% - 2rem);
            max-width: 1400px;
        }

        .header.scrolled {
            top: 0.5rem;
        }

        .nav-container {
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
            gap: 1rem;
        }

        .logo img {
            height: 70px;
        }

        .market-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(248, 250, 252, 0.8);
            padding: 0.5rem 1rem;
            border-radius: 10px;
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .status-indicator.open {
            background: var(--use-green);
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
            color: var(--use-blue);
            background: rgba(0, 128, 199, 0.05);
        }

        .dropdown, .submenu {
            list-style: none;
            position: absolute;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border);
            padding: 0.5rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .dropdown {
            top: calc(100% + 0.5rem);
            min-width: 220px;
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
        }

        .submenu {
            top: 0 !important;
            left: 100% !important;
            min-width: 200px !important;
        }

        .dropdown > li.has-submenu:hover > .submenu {
            opacity: 1 !important;
            visibility: visible !important;
        }

        .dropdown-item, .submenu-item {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.875rem;
        }

        .dropdown-item:hover, .submenu-item:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
        }

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
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .service-section {
            margin-bottom: 4rem;
            background: var(--surface);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .service-section:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .service-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--use-yellow);
        }

        .service-number {
            background: var(--gradient-primary);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .service-title {
            color: var(--use-blue);
            font-size: 1.75rem;
            font-weight: 700;
            flex: 1;
        }

        .service-icon {
            color: var(--use-yellow);
            font-size: 2rem;
        }

        .service-content p {
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 1.25rem;
        }

        .timeline-section {
            background: var(--surface-secondary);
            padding: 2rem;
            border-radius: 12px;
            margin: 2rem 0;
        }

        .timeline-header {
            color: var(--use-blue);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .timeline-header i {
            color: var(--use-yellow);
        }

        .timeline-item {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 23px;
            top: 50px;
            width: 2px;
            height: calc(100% - 20px);
            background: var(--use-blue);
            opacity: 0.2;
        }

        .timeline-marker {
            background: var(--use-blue);
            color: white;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: 0 0 0 4px rgba(0, 128, 199, 0.1);
        }

        .timeline-content {
            flex: 1;
            padding-top: 0.5rem;
        }

        .timeline-content h4 {
            color: var(--use-blue);
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .timeline-content p {
            color: var(--text-secondary);
            margin: 0;
        }

        .highlight-box {
            background: linear-gradient(135deg, rgba(0, 128, 199, 0.05) 0%, rgba(51, 153, 219, 0.05) 100%);
            border-left: 4px solid var(--use-blue);
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
        }

        .highlight-box p {
            margin: 0.5rem 0;
            color: var(--text-primary);
            line-height: 1.7;
        }

        .highlight-box p:first-child {
            margin-top: 0;
        }

        .highlight-box p:last-child {
            margin-bottom: 0;
        }

        .highlight-box strong {
            color: var(--use-blue);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .feature-card {
            background: var(--surface);
            border: 2px solid var(--border);
            padding: 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            border-color: var(--use-blue);
            background: var(--surface-secondary);
            transform: translateY(-3px);
        }

        .feature-card-icon {
            width: 48px;
            height: 48px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .feature-card h4 {
            color: var(--use-blue);
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.7;
        }

        .info-box {
            background: linear-gradient(135deg, rgba(253, 185, 19, 0.1) 0%, rgba(254, 202, 56, 0.1) 100%);
            border-left: 4px solid var(--use-yellow);
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
        }

        .info-box p {
            margin: 0.5rem 0;
            color: var(--text-primary);
            line-height: 1.7;
        }

        .info-box p:first-child {
            margin-top: 0;
        }

        .info-box p:last-child {
            margin-bottom: 0;
        }

        .info-box strong {
            color: var(--use-blue);
        }

        /* Footer */
        .footer {
            background: #001e2f;
            padding: 4rem 2rem 2rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand {
            max-width: 300px;
        }

        .footer-logo {
            height: 100px;
            margin-bottom: 1.5rem;
        }

        .footer-address {
            font-size: 0.875rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-section-title {
            font-size: 1rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--use-yellow);
        }

        .footer-contact {
            font-size: 0.875rem;
            line-height: 1.7;
        }

        .footer-contact p {
            margin-bottom: 0.75rem;
        }

        .footer-contact a {
            color: var(--use-blue-light);
            text-decoration: none;
        }

        .footer-contact a:hover {
            color: var(--use-yellow);
        }

        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--use-blue);
            transform: translateY(-2px);
        }

        .footer-bottom {
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-copyright {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .footer-legal {
            display: flex;
            gap: 2rem;
        }

        .footer-legal a {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-legal a:hover {
            color: var(--use-yellow);
        }

        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
                        .mobile-menu-btn {
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10;
                order: 3;
                flex-shrink: 0;
            }

            .logo {
                order: 1;
                flex-shrink: 0;
                display: flex;
                align-items: center;
            }

            .logo img {
                height: 55px;
                display: block;
            }

            .market-status {
                display: none !important;
            }

            .status-indicator {
                flex-shrink: 0;
            }

            .status-text {
                flex-shrink: 0;
            }

            .nav-container {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0.75rem;
                height: 72px;
                gap: 0.5rem;
            }

            .nav-menu {
                order: 4;
            }

            .nav-menu {
                display: flex;
                position: absolute;
                top: calc(100% + 0.5rem);
                left: 0.5rem;
                right: 0.5rem;
                background: white;
                border-radius: 16px;
                box-shadow: var(--shadow-xl);
                border: 1px solid var(--border);
                padding: 0.5rem;
                flex-direction: column;
                gap: 0;
                max-height: calc(100vh - 100px);
                overflow-y: auto;
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s;
                pointer-events: none;
            }

            .nav-menu.active {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
                pointer-events: auto;
            }

            .nav-item {
                width: 100%;
                border-bottom: 1px solid var(--border-light);
            }

            .nav-item:last-child {
                border-bottom: none;
            }

            .nav-link {
                padding: 0.875rem 1rem;
                justify-content: space-between;
                width: 100%;
                font-size: 0.9rem;
            }

            .nav-link:hover {
                background: var(--surface);
            }

            .dropdown {
                position: static;
                opacity: 0;
                visibility: hidden;
                max-height: 0;
                overflow: hidden;
                box-shadow: none;
                border: none;
                margin-top: 0;
                border-radius: 0;
                background: var(--surface);
                transition: opacity 0.3s ease, visibility 0.3s ease, max-height 0.3s ease;
                display: block;
            }

            .dropdown.active {
                opacity: 1;
                visibility: visible;
                max-height: 1000px;
                display: block;
            }

            .dropdown-item {
                padding: 0.75rem 1.5rem;
                border-bottom: 1px solid var(--border-light);
                justify-content: space-between;
                font-size: 0.85rem;
            }

            .dropdown li:last-child .dropdown-item {
                border-bottom: none;
            }

            .submenu {
                position: static;
                background: #f8fafc;
                box-shadow: none;
                margin: 0;
                padding: 0;
                border-radius: 0;
                opacity: 0;
                visibility: hidden;
                max-height: 0;
                overflow: hidden;
                transition: opacity 0.3s ease, visibility 0.3s ease, max-height 0.3s ease;
                display: block;
            }

            .submenu.active {
                opacity: 1 !important;
                visibility: visible !important;
                max-height: 800px !important;
                display: block !important;
            }

            .submenu-item {
                padding: 0.625rem 2rem;
                font-size: 0.8rem;
                border-bottom: 1px solid #e2e8f0;
            }

            .submenu li:last-child .submenu-item {
                border-bottom: none;
            }

            .chevron-down,
            .chevron-right {
                font-size: 0.7rem;
                transition: transform 0.3s ease;
            }

.nav-menu {
                display: none;
            }

            .hero {
                padding: 8rem 0 3rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .main-content {
                padding: 2rem 1rem;
            }

            .service-section {
                padding: 1.5rem;
            }

            .service-title {
                font-size: 1.5rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .timeline-item {
                gap: 1rem;
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
    @include('partials.header')

    <section class="hero">
        <div class="hero-container">
            <h1 class="hero-title">Clearing and Settlement Services</h1>
            <p class="hero-subtitle">Automated real-time trade processing with T+3 settlement and delivery versus payment guarantee</p>
        </div>
    </section>

    <main class="main-content">
        <!-- I. Trade Reporting & Clearing -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">I</div>
                <h2 class="service-title">Trade Reporting & Clearing</h2>
                <i class="fas fa-chart-line service-icon"></i>
            </div>
            <div class="service-content">
                <div class="highlight-box">
                    <p><strong>Automation Since July 2015</strong></p>
                    <p>The Stock Exchange automated its trading platform which saw the SCD integrate with the Automated Trading System (ATS), eliminating the manual process of data capture.</p>
                </div>

                <div class="timeline-section">
                    <div class="timeline-header">
                        <i class="fas fa-clock"></i>
                        <span>Real-Time Processing Flow</span>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker">1</div>
                        <div class="timeline-content">
                            <h4>Trade Execution</h4>
                            <p>Trades executed in the ATS are automatically fed into the SCD system</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker">2</div>
                        <div class="timeline-content">
                            <h4>Real-Time Updates</h4>
                            <p>Relevant securities accounts are updated and matched on a real-time basis (pending buy, pending sale)</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker">3</div>
                        <div class="timeline-content">
                            <h4>Reports Generation (T+0)</h4>
                            <p>Transaction reports and settlement obligations are generated by SCD and made available to Securities Central Depository Agents (SCDAs) on trade date</p>
                        </div>
                    </div>
                </div>

                <div class="feature-grid">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h4>Automated Integration</h4>
                        <p>Seamless integration between ATS and SCD eliminates manual data entry and reduces errors</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <h4>Real-Time Matching</h4>
                        <p>Securities accounts updated instantly with pending buy and pending sale positions</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h4>Same-Day Reporting</h4>
                        <p>Transaction reports available to SCDAs immediately on trade date (T+0)</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- II. Settlement -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">II</div>
                <h2 class="service-title">Settlement</h2>
                <i class="fas fa-handshake service-icon"></i>
            </div>
            <div class="service-content">
                <p>The SCD settles funds through a settlement bank. All settlement participants (SCDAs) are required to open a settlement account with the Settlement Bank.</p>

                <div class="timeline-section">
                    <div class="timeline-header">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Settlement Process</span>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker"><i class="fas fa-building"></i></div>
                        <div class="timeline-content">
                            <h4>Settlement Accounts</h4>
                            <p>All SCDAs maintain dedicated settlement accounts with the Settlement Bank</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker"><i class="fas fa-money-bill-transfer"></i></div>
                        <div class="timeline-content">
                            <h4>Net Funds Transfer</h4>
                            <p>On settlement date, funds transfer amongst participants takes place on a net basis at the Settlement Bank</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker"><i class="fas fa-arrows-rotate"></i></div>
                        <div class="timeline-content">
                            <h4>Simultaneous Exchange</h4>
                            <p>The seller's Securities Account is debited and the buyer's Securities Account is credited in the SCD simultaneously</p>
                        </div>
                    </div>
                </div>

                <div class="highlight-box">
                    <p><strong>T+3 Settlement Cycle with Delivery Versus Payment</strong></p>
                    <p>By implementing strict delivery versus payment within a T+3 settlement cycle, the SCD significantly improved the efficiency of the settlement mechanism in the stock market.</p>
                    <p>This simultaneous exchange of cash and securities guarantees irrevocability of settlement and offers the high level of customer protection.</p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-shield-halved"></i>
                        </div>
                        <h4>Irrevocability Guarantee</h4>
                        <p>Simultaneous exchange ensures that settlements cannot be reversed, protecting all parties</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>T+3 Efficiency</h4>
                        <p>Trades settle three business days after execution, balancing speed with settlement security</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h4>Customer Protection</h4>
                        <p>High level of customer protection through guaranteed delivery versus payment mechanism</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- III. Guarantee Fund -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">III</div>
                <h2 class="service-title">Guarantee Fund</h2>
                <i class="fas fa-piggy-bank service-icon"></i>
            </div>
            <div class="service-content">
                <p>To ensure financial integrity in the securities market, SCD has put in place a fund which ensures that trades will be settled among the SCDAs (i.e. that the selling SCDA will deliver the securities and that the buying SCDA will effect payment).</p>

                <div class="info-box">
                    <p><strong>Purpose of the Guarantee Fund:</strong></p>
                    <p>The fund provides a safety net that protects market participants from settlement failures, ensuring that all trades are honored even in cases where a participant faces financial difficulties.</p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h4>Settlement Assurance</h4>
                        <p>Guarantees that selling SCDAs will deliver securities as agreed</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h4>Payment Guarantee</h4>
                        <p>Ensures that buying SCDAs will effect payment for purchased securities</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Market Integrity</h4>
                        <p>Maintains financial integrity and confidence in the securities market</p>
                    </div>
                </div>

                <div class="highlight-box">
                    <p><strong>Risk Mitigation:</strong> The Guarantee Fund serves as a critical risk management tool, protecting the entire market ecosystem from potential settlement failures and maintaining investor confidence in the Ugandan securities market.</p>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')

    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>

    <script>
        function toggleMobileMenu() {
            console.log('toggleMobileMenu called');
            const menu = document.querySelector('.nav-menu');
            console.log('menu element:', menu);
            if (menu) {
                menu.classList.toggle('active');
                console.log('menu active state:', menu.classList.contains('active'));
            } else {
                console.error('nav-menu not found!');
            }
        }

        // Mobile dropdown toggle
        let lastDropdownToggle = 0;
        function toggleMobileDropdown(event) {
            console.log('>>> toggleMobileDropdown called <<<');
            console.log('Window width:', window.innerWidth);

            if (window.innerWidth <= 768) {
                event.preventDefault();
                event.stopPropagation();

                // Prevent rapid double-clicks
                const now = Date.now();
                if (now - lastDropdownToggle < 300) {
                    console.log('⚠️ Too fast, ignoring');
                    return;
                }
                lastDropdownToggle = now;

                const dropdown = event.currentTarget.nextElementSibling;
                const chevron = event.currentTarget.querySelector('.chevron-down');

                console.log('Dropdown element:', dropdown);
                console.log('Has dropdown class:', dropdown?.classList.contains('dropdown'));
                console.log('Chevron found:', !!chevron);

                if (dropdown && dropdown.classList.contains('dropdown')) {
                    const wasActive = dropdown.classList.contains('active');
                    dropdown.classList.toggle('active');
                    console.log('Dropdown toggled from', wasActive, 'to', dropdown.classList.contains('active'));

                    if (chevron) {
                        chevron.style.transform = dropdown.classList.contains('active')
                            ? 'rotate(225deg)'
                            : 'rotate(45deg)';
                        console.log('Chevron rotated');
                    }

                    // List all dropdown items for debugging
                    const dropdownItems = dropdown.querySelectorAll('.dropdown-item');
                    console.log('Dropdown contains', dropdownItems.length, 'items');
                    dropdownItems.forEach((item, index) => {
                        const hasSubmenu = item.parentElement.classList.contains('has-submenu');
                        const hasChevron = !!item.querySelector('.chevron-right');
                        console.log(`  Item ${index + 1}:`, item.textContent.trim(), '- has-submenu:', hasSubmenu, '- has chevron-right:', hasChevron);
                    });
                }
            }
        }

        // Initialize mobile menu functionality
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOMContentLoaded - Initializing mobile menu');

            const mobileBtn = document.querySelector('.mobile-menu-btn');
            const menu = document.querySelector('.nav-menu');
            const navLinks = document.querySelectorAll('.nav-link');

            console.log('Mobile button found:', mobileBtn);
            console.log('Menu found:', menu);

            // Add click handlers for mobile dropdown toggles
            navLinks.forEach(link => {
                if (link.querySelector('.chevron-down')) {
                    link.addEventListener('click', toggleMobileDropdown);
                }
            });

            // Use event delegation for submenu toggles
            document.body.addEventListener('click', function(e) {
                // Only on mobile
                if (window.innerWidth > 768) return;

                // Check if we clicked on a dropdown-item
                const dropdownItem = e.target.closest('.dropdown-item');
                if (!dropdownItem) return;

                // Check if this dropdown-item has a submenu
                const parentLi = dropdownItem.parentElement;
                const hasSubmenuClass = parentLi && parentLi.classList.contains('has-submenu');

                console.log('🔵 Clicked on dropdown-item:', dropdownItem.textContent.trim());
                console.log('🔵 Parent li has has-submenu class:', hasSubmenuClass);

                if (hasSubmenuClass) {
                    const submenu = parentLi.querySelector('.submenu');
                    const chevron = dropdownItem.querySelector('.chevron-right');

                    console.log('🔵 Submenu found:', !!submenu);
                    console.log('🔵 Chevron found:', !!chevron);

                    // Prevent navigation
                    e.preventDefault();
                    e.stopPropagation();

                    if (submenu) {
                        const wasActive = submenu.classList.contains('active');
                        submenu.classList.toggle('active');
                        console.log('✅ Submenu toggled from', wasActive, 'to', submenu.classList.contains('active'));

                        if (chevron) {
                            chevron.style.transform = submenu.classList.contains('active')
                                ? 'rotate(45deg)'
                                : 'rotate(-45deg)';
                            console.log('✅ Chevron rotated');
                        }
                    } else {
                        console.log('❌ No submenu element found');
                    }
                }
            }, false);

            // Close mobile menu when clicking outside
            document.addEventListener('click', (e) => {
                const menu = document.querySelector('.nav-menu');
                const mobileBtn = document.querySelector('.mobile-menu-btn');
                const header = document.querySelector('.header');

                // Only close if clicking completely outside the header
                if (menu && menu.classList.contains('active')) {
                    if (!header.contains(e.target)) {
                        console.log('🔴 Closing menu - clicked outside header');
                        menu.classList.remove('active');
                        // Close all dropdowns and submenus
                        document.querySelectorAll('.dropdown.active, .submenu.active').forEach(el => {
                            el.classList.remove('active');
                        });
                        // Reset all chevrons
                        document.querySelectorAll('.chevron-down, .chevron-right').forEach(chevron => {
                            if (chevron.classList.contains('chevron-down')) {
                                chevron.style.transform = 'rotate(45deg)';
                            } else {
                                chevron.style.transform = 'rotate(-45deg)';
                            }
                        });
                    }
                }
            }, true); // Use capture phase
        });
    </script>

</body>
</html>
