<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Requirements - Uganda Securities Exchange</title>
    <meta name="description" content="Know Your Customer (KYC) requirements for opening an account with the Uganda Securities Exchange.">

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
            --surface-tertiary: #edf2f7;
            --text-primary: #1a202c;
            --text-secondary: var(--use-gray);
            --text-tertiary: #718096;
            --border: #e2e8f0;
            --border-light: #f1f5f9;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --gradient-primary: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-light) 100%);
            --gradient-accent: linear-gradient(135deg, var(--use-yellow) 0%, var(--use-yellow-light) 100%);
        }

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
        }

        .market-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(248, 250, 252, 0.8);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
        }

        .status-indicator.open {
            background: var(--use-green);
        }

        .status-text {
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-time {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            background: rgba(248, 250, 252, 0.8);
            padding: 0.375rem;
            border-radius: 12px;
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
            color: var(--use-blue);
            background: rgba(0, 128, 199, 0.05);
        }

        .chevron-down, .chevron-right {
            width: 6px;
            height: 6px;
            border-right: 1px solid currentColor;
            border-bottom: 1px solid currentColor;
            transform: rotate(45deg);
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
            left: 0;
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
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }

        .dropdown-item:hover, .submenu-item:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
        }

        .mobile-menu-btn {
            display: none;
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

        .notice-header {
            background: var(--surface);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border-left: 4px solid var(--use-blue);
            margin-bottom: 3rem;
        }

        .notice-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--use-blue);
            margin-bottom: 1rem;
        }

        .notice-meta {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.8;
        }

        .category-section {
            margin-bottom: 3rem;
        }

        .category-header {
            background: var(--gradient-primary);
            color: white;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .category-number {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .category-title {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .subcategory {
            background: var(--surface);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            margin-bottom: 1.5rem;
        }

        .subcategory-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .requirements-list {
            list-style: none;
            padding: 0;
        }

        .requirements-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .requirements-list li:last-child {
            border-bottom: none;
        }

        .requirement-letter {
            width: 30px;
            height: 30px;
            background: var(--use-blue);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
            flex-shrink: 0;
            margin-top: 0.25rem;
        }

        .requirement-text {
            flex: 1;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .note-box {
            background: linear-gradient(135deg, rgba(253, 185, 19, 0.1) 0%, rgba(254, 202, 56, 0.1) 100%);
            border-left: 4px solid var(--use-yellow);
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 3rem;
        }

        .note-box h3 {
            color: var(--use-blue);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .note-box p, .note-box ul {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .note-box ul {
            margin-left: 1.5rem;
            margin-top: 0.5rem;
        }

        .note-box li {
            margin-bottom: 0.5rem;
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
            background: var(--gradient-accent);
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

            .subcategory {
                padding: 1.5rem;
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
                                        <a href="{{ $childItem->url ?: '#' }}" class="dropdown-item" @if($childItem->opens_new_tab) target="_blank" @endif>
                                            @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                            {{ $childItem->title }}
                                            @if($hasGrandchildren) <span class="chevron-right"></span> @endif
                                        </a>
                                        @if($hasGrandchildren)
                                            <ul class="submenu">
                                                @foreach($grandchildren as $grandchildItem)
                                                    <li>
                                                        <a href="{{ $grandchildItem->url ?: '#' }}" class="submenu-item" @if($grandchildItem->opens_new_tab) target="_blank" @endif>
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

    <section class="hero">
        <div class="hero-container">
            <h1 class="hero-title">KYC Requirements</h1>
            <p class="hero-subtitle">Know Your Customer requirements for account opening at the Uganda Securities Exchange</p>
        </div>
    </section>

    <main class="main-content">
        <div class="notice-header">
            <h2 class="notice-title">MEMBERS' NOTICE No. 1/2018</h2>
            <div class="notice-meta">
                <p><strong>Date:</strong> 5th June, 2018</p>
                <p><strong>To:</strong> All Members of the Uganda Securities Exchange Limited</p>
                <p style="margin-top: 1rem;">The USE hereby informs all its esteemed agents of the following required documents for account opening which are in line with Regulations 18,19,20,21,22,23,24,25,26 and 27 of the Anti Money Laundering Regulations No 75 of 2015 and Operating Procedure no. 3 under the USE SCD Operating procedures of 2015.</p>
            </div>
        </div>

        <!-- Category 1: Individuals -->
        <div class="category-section">
            <div class="category-header">
                <div class="category-number">1</div>
                <h2 class="category-title">Individuals</h2>
            </div>

            <div class="subcategory">
                <h3 class="subcategory-title"><i class="fas fa-user"></i> Individuals (Locals)</h3>
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">3 coloured passport Photos</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">Identification Documents (National IDs, Passport and Driving Permits only)</span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Fully Filled and Executed Form 1A</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">A summary of the nature of business activities that the person is engaged in or details of source of income</span></li>
                    <li><span class="requirement-letter">e</span><span class="requirement-text">A disclosure of the risk appetite of the client</span></li>
                </ul>
            </div>

            <div class="subcategory">
                <h3 class="subcategory-title"><i class="fas fa-globe-africa"></i> Individuals (East African)</h3>
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">3 coloured passport Photos</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">Identification Documents (National IDs, Passport only)</span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Fully Filled and Executed Form 1A</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">A summary of the nature of business activities that the person is engaged in or details of source of income</span></li>
                    <li><span class="requirement-letter">e</span><span class="requirement-text">A disclosure of the risk appetite of the client</span></li>
                </ul>
            </div>

            <div class="subcategory">
                <h3 class="subcategory-title"><i class="fas fa-globe"></i> Individuals (Foreign)</h3>
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">3 coloured passport Photos</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">Identification Documents (Certified copies of Passport Only)</span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Fully Filled and Executed Form 1A</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">A summary of the nature of business activities that the person is engaged in or details of source of income</span></li>
                    <li><span class="requirement-letter">e</span><span class="requirement-text">A disclosure of the risk appetite of the client</span></li>
                </ul>
            </div>
        </div>

        <!-- Category 2: Minors -->
        <div class="category-section">
            <div class="category-header">
                <div class="category-number">2</div>
                <h2 class="category-title">Minors (Foreign, Locals and East African)</h2>
            </div>

            <div class="subcategory">
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">3 passport photos of the Minor</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">Birth Certificate/ certified copy of the Passport</span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Parents details as stipulated in 1 above</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">Fully Filled and Executed Form 1A</span></li>
                </ul>
            </div>
        </div>

        <!-- Category 3: Companies -->
        <div class="category-section">
            <div class="category-header">
                <div class="category-number">3</div>
                <h2 class="category-title">Limited Companies</h2>
            </div>

            <div class="subcategory">
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">Certified Incorporation certificate (plus copy of notarised certificate of incorporation for a foreign company or any other similar documentation evidencing legal status of the entity)</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">The trade name under which the entity or body conducts business</span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Articles and memorandum of association or any other form of incorporation documentation</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">Board resolution indicating that the account is to be opened with the U.S.E and the relevant signing powers<br><em>Note: foreign nationals present passport or refugee card</em></span></li>
                    <li><span class="requirement-letter">e</span><span class="requirement-text">Fully Filled and Executed Form 1b and attach Identification documents for the Signatories as indicated in 1 above</span></li>
                    <li><span class="requirement-letter">f</span><span class="requirement-text">Fully Filled and Executed Form 1A for all the Signatories</span></li>
                    <li><span class="requirement-letter">g</span><span class="requirement-text">Three (3) passport photographs of the proposed signatories</span></li>
                </ul>
            </div>
        </div>

        <!-- Category 4: Clubs -->
        <div class="category-section">
            <div class="category-header">
                <div class="category-number">4</div>
                <h2 class="category-title">Clubs, Associations and Committees Not Set Up By Govt</h2>
            </div>

            <div class="subcategory">
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">Certified Proof of registration</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">Constitution/ memorandum of understanding should be provided</span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Resolution indicating that the account is to be opened with the U.S.E and the relevant signing powers</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">Proof of identity of the proposed signatories (passport, drivers licence, voters card, ID document, national ID)<br><em>Note: foreign nationals present either passport or refugee card</em></span></li>
                    <li><span class="requirement-letter">e</span><span class="requirement-text">Three (3) passport photographs of the proposed signatories</span></li>
                    <li><span class="requirement-letter">f</span><span class="requirement-text">Fully Filled and Executed Form 1A for all the Signatories</span></li>
                    <li><span class="requirement-letter">g</span><span class="requirement-text">Fully Filled and Executed Form 1b</span></li>
                </ul>
            </div>
        </div>

        <!-- Category 5: Partnership -->
        <div class="category-section">
            <div class="category-header">
                <div class="category-number">5</div>
                <h2 class="category-title">Partnership</h2>
            </div>

            <div class="subcategory">
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">Registered Partnership deed</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">Certificate of Registration of the business</span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Legal document listing authorized signatories</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">Mandate from the partnership authorizing the opening of an account with the U.S.E and the relevant signing powers</span></li>
                    <li><span class="requirement-letter">e</span><span class="requirement-text">Proof of identity of the proposed signatories (passport, drivers license, National ID document)<br><em>Note: foreign nationals present either passport or refugee card</em></span></li>
                    <li><span class="requirement-letter">f</span><span class="requirement-text">Three (3) passport photographs of the proposed signatories</span></li>
                    <li><span class="requirement-letter">g</span><span class="requirement-text">Fully Filled and Executed Form 1A for all the Signatories</span></li>
                    <li><span class="requirement-letter">h</span><span class="requirement-text">Fully Filled and Executed Form 1b</span></li>
                </ul>
            </div>
        </div>

        <!-- Category 6: Sole Proprietorship -->
        <div class="category-section">
            <div class="category-header">
                <div class="category-number">6</div>
                <h2 class="category-title">Sole Proprietorship</h2>
            </div>

            <div class="subcategory">
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">Certified Registration certificate (if not trading in own names)</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">Declaration of terms</span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Application to open an account addressed to the USE</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">Proof of identity of the proposed signatories (passport, drivers license, National ID document)</span></li>
                    <li><span class="requirement-letter">e</span><span class="requirement-text">Three (3) passport photographs of the proposed signatories</span></li>
                    <li><span class="requirement-letter">f</span><span class="requirement-text">Fully Filled and Executed Form 1A for all the Signatories</span></li>
                    <li><span class="requirement-letter">g</span><span class="requirement-text">Fully Filled and Executed Form 1b</span></li>
                </ul>
            </div>
        </div>

        <!-- Category 7: Estate Accounts -->
        <div class="category-section">
            <div class="category-header">
                <div class="category-number">7</div>
                <h2 class="category-title">Estate Accounts</h2>
            </div>

            <div class="subcategory">
                <ul class="requirements-list">
                    <li><span class="requirement-letter">a</span><span class="requirement-text">Letters of Administration*/Letters of probate* and will (if applicable)</span></li>
                    <li><span class="requirement-letter">b</span><span class="requirement-text">Proof of identity of the proposed signatories (passport, drivers license, National ID document)<br><em>Note: foreign nationals present either passport or refugee card</em></span></li>
                    <li><span class="requirement-letter">c</span><span class="requirement-text">Three (3) passport photographs of the proposed signatories</span></li>
                    <li><span class="requirement-letter">d</span><span class="requirement-text">Fully Filled and Executed Form 1A for all the Signatories</span></li>
                </ul>
                <p style="margin-top: 1rem; color: var(--text-secondary); font-style: italic;">*The documents should be certified by the relevant issuing authority</p>
            </div>
        </div>

        <!-- Important Notes -->
        <div class="note-box">
            <h3><i class="fas fa-exclamation-circle"></i> Kindly Note:</h3>
            <ul>
                <li>These are general requirements but in specific cases, the Exchange might require some extra KYC documents</li>
                <li>Fully Filled and Executed SCD Form: This refers to a form with all the fields properly filled, authorized and stamped by the SCDA</li>
                <li>Company Documents from Kenya should be certified by a commissioner of oaths</li>
            </ul>
            <p style="margin-top: 1rem; font-weight: 600;">Failure to observe these requirements shall be treated as a default of the company's membership obligations, and the USE reserves the right to reject any accounts that do not comply.</p>
        </div>
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
