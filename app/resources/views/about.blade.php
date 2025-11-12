<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About USE - Uganda Securities Exchange</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
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

        /* Responsive Design */
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
    @include('partials.header')

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

    @include('partials.footer')

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
