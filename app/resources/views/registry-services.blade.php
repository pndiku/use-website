<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry Services - Uganda Securities Exchange</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <meta name="description" content="Comprehensive registry services including share register maintenance, corporate actions, IPO processing, and shareholder communications.">

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

        .intro-section {
            text-align: center;
            max-width: 900px;
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
            font-size: 1.125rem;
            line-height: 1.8;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 4rem 0;
        }

        .service-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--use-blue);
        }

        .service-card-icon {
            width: 64px;
            height: 64px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        .service-card h3 {
            color: var(--use-blue);
            font-size: 1.375rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .service-card p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .values-section {
            background: var(--surface-secondary);
            padding: 4rem 3rem;
            border-radius: 20px;
            margin: 4rem 0;
        }

        .values-section h2 {
            color: var(--use-blue);
            font-size: 2.25rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
        }

        .value-item {
            text-align: center;
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 20px rgba(0, 128, 199, 0.2);
        }

        .value-item h3 {
            color: var(--use-blue);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .value-item p {
            color: var(--text-secondary);
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .commitment-section {
            background: var(--gradient-primary);
            color: white;
            padding: 4rem 3rem;
            border-radius: 20px;
            text-align: center;
            margin: 4rem 0;
        }

        .commitment-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .commitment-section p {
            font-size: 1.25rem;
            line-height: 1.8;
            opacity: 0.95;
            max-width: 900px;
            margin: 0 auto;
        }

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

            .intro-section h2 {
                font-size: 2rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .values-section {
                padding: 2.5rem 1.5rem;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .commitment-section {
                padding: 2.5rem 1.5rem;
            }

            .commitment-section h2 {
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
    @include('partials.header')

    <section class="hero">
        <div class="hero-container">
            <h1 class="hero-title">Registry Services</h1>
            <p class="hero-subtitle">Comprehensive registry solutions backed by innovative technology and experienced professionals</p>
        </div>
    </section>

    <main class="main-content">
        <section class="intro-section">
            <h2>Full Range of Registry Services</h2>
            <p>SCD Registrars provide a comprehensive suite of registry services designed to meet all your corporate needs with precision and efficiency.</p>
        </section>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-card-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h3>Share Register Maintenance</h3>
                <p>Comprehensive management and maintenance of your share register with accuracy and compliance.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <h3>Entitlement Files & Dividend Payments</h3>
                <p>Efficient processing of entitlement files and accurate distribution of dividend payments to shareholders.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>AGM/EGM Administration</h3>
                <p>Complete administration of Annual General Meetings and Extraordinary General Meetings, including annual report dispatch.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Corporate Actions</h3>
                <p>Seamless management of all corporate actions including rights issues, bonus issues, and share splits.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h3>Regulatory Reporting</h3>
                <p>Timely and accurate regulatory reporting to ensure compliance with all statutory requirements.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <h3>Share Transfers & Transmission</h3>
                <p>Professional registration of share transfers and transmission with proper documentation and verification.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3>Shareholder Communications</h3>
                <p>Direct and effective communication with shareholders ensuring transparency and timely information delivery.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>IPO Processing & Register Creation</h3>
                <p>Complete IPO processing services and creation of new share registers for public offerings.</p>
            </div>
        </div>

        <section class="values-section">
            <h2>Our Commitment to Excellence</h2>
            <div class="values-grid">
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Innovative Technology</h3>
                    <p>We know how important every aspect of the registry experience is, which is why all of our services are supported by our innovative technology platform and a highly experienced team with a "can-do" approach.</p>
                </div>

                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Client Partnership Model</h3>
                    <p>Our client partnership model ensures you will receive the most simplified and personalized service possible, tailored to your specific needs.</p>
                </div>

                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Personalized Service</h3>
                    <p>By leveraging the full suite of our capabilities, insight and experience, you will receive a truly personalized, efficient, accurate and elegant service where you are informed all the way through the process.</p>
                </div>
            </div>
        </section>

        <section class="commitment-section">
            <h2>Making a Difference</h2>
            <p>We commit to make a difference for the better. We put at the disposal of our clients a professional and focused service backed by expertise, experience and understanding of different markets.</p>
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
