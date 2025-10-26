<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Uganda Securities Exchange</title>
    <meta name="description" content="Get in touch with Uganda Securities Exchange. We're here to help with your questions and inquiries.">

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

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        /* Contact Info Cards */
        .contact-info-grid {
            display: grid;
            gap: 1.5rem;
        }

        .info-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .info-content h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .info-content p {
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .info-content a {
            color: var(--use-blue);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .info-content a:hover {
            color: var(--use-blue-dark);
        }

        /* Contact Form */
        .form-container {
            background: var(--surface);
            padding: 3rem;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-light);
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-label .required {
            color: var(--use-red);
            margin-left: 0.25rem;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            color: var(--text-primary);
            background: var(--surface);
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--use-blue);
            box-shadow: 0 0 0 3px rgba(0, 128, 199, 0.1);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: var(--text-tertiary);
        }

        .form-textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-button {
            background: var(--gradient-primary);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: var(--shadow-md);
        }

        .form-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .form-button:active {
            transform: translateY(0);
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

            .content-grid {
                grid-template-columns: 1fr;
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
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .main-content {
                padding: 2rem 1rem;
            }

            .form-container {
                padding: 2rem;
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
            <h1 class="hero-title">Contact Us</h1>
            <p class="hero-subtitle">Get in touch with us. We're here to help with your questions and inquiries about the Uganda Securities Exchange</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="content-grid">
            <!-- Contact Information -->
            <div>
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 2rem; color: var(--text-primary);">Get In Touch</h2>
                <div class="contact-info-grid">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Visit Us</h3>
                            <p>{{ $siteContent['contact_address'] ?? 'Uganda Securities Exchange, Plot 24/26 Kampala Road, Kampala, Uganda' }}</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h3>Call Us</h3>
                            <p><a href="tel:{{ $siteContent['contact_phone'] ?? '+256414230738' }}">{{ $siteContent['contact_phone'] ?? '+256 414 230 738' }}</a></p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email Us</h3>
                            <p><a href="mailto:{{ $siteContent['contact_email'] ?? 'info@use.co.ug' }}">{{ $siteContent['contact_email'] ?? 'info@use.co.ug' }}</a></p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h3>Trading Hours</h3>
                            <p>{{ $siteContent['trading_hours'] ?? '9:00 AM - 3:00 PM EAT' }}<br>Monday - Friday</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="form-container">
                <h2 class="form-title">Send Us a Message</h2>
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Name<span class="required">*</span></label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email<span class="required">*</span></label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="your.email@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">Subject<span class="required">*</span></label>
                        <input type="text" id="subject" name="subject" class="form-input" placeholder="Brief subject of your inquiry" required>
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">Category<span class="required">*</span></label>
                        <select id="category" name="category" class="form-select" required>
                            <option value="">Select a category</option>
                            <option value="general">General Inquiry</option>
                            <option value="trading">Trading & Securities</option>
                            <option value="listing">Corporate Listings</option>
                            <option value="investor">Investor Relations</option>
                            <option value="technical">Technical Support</option>
                            <option value="media">Media & Press</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Message<span class="required">*</span></label>
                        <textarea id="message" name="message" class="form-textarea" placeholder="Please provide details about your inquiry..." required></textarea>
                    </div>

                    <button type="submit" class="form-button">
                        <i class="fas fa-paper-plane" style="margin-right: 0.5rem;"></i>
                        Send Message
                    </button>
                </form>
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
