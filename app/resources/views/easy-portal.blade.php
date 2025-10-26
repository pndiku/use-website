<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Portal - Uganda Securities Exchange</title>
    <meta name="description" content="Easy Portal - Online customer self-service portal for monitoring your investment portfolio anywhere, anytime.">

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
            background: linear-gradient(180deg, var(--use-blue) 0%, var(--use-blue-light) 15%, var(--surface-secondary) 15%, var(--surface-secondary) 100%);
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
            margin-bottom: 2rem;
        }

        .hero-cta {
            display: inline-block;
            background: var(--use-yellow);
            color: var(--text-primary);
            padding: 1rem 2.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.125rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(253, 185, 19, 0.3);
        }

        .hero-cta:hover {
            background: var(--use-yellow-light);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(253, 185, 19, 0.4);
        }

        .hero-cta i {
            margin-left: 0.5rem;
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .intro-section {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 4rem;
        }

        .intro-section h2 {
            color: var(--use-blue);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .intro-section p {
            color: var(--text-secondary);
            font-size: 1.25rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin: 4rem 0;
        }

        .feature-card {
            background: var(--surface);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            transition: all 0.3s ease;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--use-blue);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem;
        }

        .feature-card h3 {
            color: var(--use-blue);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .benefits-section {
            background: var(--surface-secondary);
            padding: 3rem;
            border-radius: 20px;
            margin: 4rem 0;
        }

        .benefits-section h2 {
            color: var(--use-blue);
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .benefits-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .benefit-item {
            background: var(--surface);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid var(--use-yellow);
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            transform: translateX(5px);
            box-shadow: var(--shadow-md);
        }

        .benefit-item i {
            color: var(--use-blue);
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
            display: block;
        }

        .benefit-item h4 {
            color: var(--use-blue);
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .benefit-item p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .cta-section {
            background: var(--gradient-primary);
            color: white;
            padding: 4rem 3rem;
            border-radius: 20px;
            text-align: center;
            margin: 4rem 0;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.25rem;
            opacity: 0.95;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            display: inline-block;
            background: var(--use-yellow);
            color: var(--text-primary);
            padding: 1.25rem 3rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.25rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(253, 185, 19, 0.3);
        }

        .cta-button:hover {
            background: var(--use-yellow-light);
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(253, 185, 19, 0.4);
        }

        .cta-button i {
            margin-left: 0.75rem;
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

            .hero-subtitle {
                font-size: 1rem;
            }

            .main-content {
                padding: 2rem 1rem;
            }

            .intro-section h2 {
                font-size: 2rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .benefits-list {
                grid-template-columns: 1fr;
            }

            .cta-section {
                padding: 2.5rem 1.5rem;
            }

            .cta-section h2 {
                font-size: 2rem;
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
            <h1 class="hero-title">Easy Portal</h1>
            <p class="hero-subtitle">Your personal investment dashboard - Monitor your portfolio anywhere, anytime</p>
            <a href="https://scd.use.or.ug" target="_blank" class="hero-cta">
                Access Easy Portal <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
    </section>

    <main class="main-content">
        <section class="intro-section">
            <h2>Take Charge of Your Portfolio</h2>
            <p>Easy Portal is an online customer self-service portal that allows investors to view stock performance, monitor their account balance and view statements.</p>
            <p>The portal ensures that investors take charge of their portfolio by personally monitoring their accounts instead of going to or calling the brokers for portfolio updates.</p>
            <p>It is "Do it yourself" portfolio management that allows investors to monitor their investment portfolios anywhere, anytime.</p>
        </section>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Stock Performance</h3>
                <p>View real-time and historical stock performance data for all your holdings and track market movements.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <h3>Account Balance</h3>
                <p>Monitor your account balance and portfolio valuation instantly with up-to-date information.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <h3>View Statements</h3>
                <p>Access and download your account statements anytime without waiting for broker assistance.</p>
            </div>
        </div>

        <section class="benefits-section">
            <h2>Why Choose Easy Portal?</h2>
            <div class="benefits-list">
                <div class="benefit-item">
                    <i class="fas fa-user-check"></i>
                    <h4>Self-Service Convenience</h4>
                    <p>No need to visit or call your broker for portfolio updates - access everything online instantly.</p>
                </div>

                <div class="benefit-item">
                    <i class="fas fa-mobile-alt"></i>
                    <h4>Access Anywhere, Anytime</h4>
                    <p>Monitor your investments from any device, at any time, from anywhere in the world.</p>
                </div>

                <div class="benefit-item">
                    <i class="fas fa-clock"></i>
                    <h4>Real-Time Updates</h4>
                    <p>Get instant access to current portfolio information and market data as it happens.</p>
                </div>

                <div class="benefit-item">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Secure & Reliable</h4>
                    <p>Your data is protected with industry-standard security measures and encryption.</p>
                </div>

                <div class="benefit-item">
                    <i class="fas fa-chart-bar"></i>
                    <h4>Portfolio Insights</h4>
                    <p>Gain valuable insights into your investment performance and make informed decisions.</p>
                </div>

                <div class="benefit-item">
                    <i class="fas fa-download"></i>
                    <h4>Download Statements</h4>
                    <p>Download and save your account statements for your records whenever you need them.</p>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <h2>Ready to Take Control?</h2>
            <p>Start managing your investment portfolio today with Easy Portal - the convenient way to stay on top of your investments.</p>
            <a href="https://scd.use.or.ug" target="_blank" class="cta-button">
                Login to Easy Portal <i class="fas fa-arrow-right"></i>
            </a>
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
