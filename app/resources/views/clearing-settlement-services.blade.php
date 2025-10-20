<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearing and Settlement Services - Uganda Securities Exchange</title>
    <meta name="description" content="Automated trade reporting, clearing and settlement services with T+3 settlement cycle and delivery versus payment guarantee.">

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

        .footer {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 5rem 0 2rem;
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
            background: linear-gradient(135deg, var(--use-yellow) 0%, var(--use-yellow-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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

        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
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
                        <a href="{{ $menuItem->url ?: '#' }}" class="nav-link" @if($menuItem->opens_new_tab) target="_blank" @endif>
                            @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                            {{ $menuItem->title }}
                        </a>
                        @if($menuItem->activeChildren && $menuItem->activeChildren->count() > 0)
                            <ul class="dropdown">
                                @foreach($menuItem->activeChildren as $childItem)
                                    @php
                                        $childItem->load('activeChildren');
                                        $hasGrandchildren = $childItem->activeChildren->count() > 0;
                                    @endphp
                                    <li class="{{ $hasGrandchildren ? 'has-submenu' : '' }}">
                                        <a href="{{ $childItem->url ?: '#' }}" class="dropdown-item" @if($childItem->opens_new_tab) target="_blank" @endif>
                                            {{ $childItem->title }}
                                        </a>
                                        @if($hasGrandchildren)
                                            <ul class="submenu">
                                                @foreach($childItem->activeChildren as $grandchildItem)
                                                    <li>
                                                        <a href="{{ $grandchildItem->url ?: '#' }}" class="submenu-item" @if($grandchildItem->opens_new_tab) target="_blank" @endif>
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
        </nav>
    </header>

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

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>Uganda Securities Exchange</h3>
                    <p>Building East Africa's premier financial market through innovative trading solutions, comprehensive market data, and professional investment services.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
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
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div><p>&copy; {{ date('Y') }} Uganda Securities Exchange. All rights reserved.</p></div>
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
