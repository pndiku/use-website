<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About SCD - Uganda Securities Exchange</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <meta name="description" content="Learn about the Securities Central Depository (SCD) - Uganda's licensed Central Securities Depository for safe and efficient securities transfer.">

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
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .content-section {
            margin-bottom: 4rem;
        }

        .content-section h2 {
            color: var(--use-blue);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid var(--use-yellow);
            display: inline-block;
        }

        .intro-text {
            font-size: 1.125rem;
            line-height: 1.8;
            color: var(--text-secondary);
            margin-bottom: 2rem;
        }

        .intro-text p {
            margin-bottom: 1.25rem;
        }

        .highlight-box {
            background: linear-gradient(135deg, rgba(0, 128, 199, 0.05) 0%, rgba(51, 153, 219, 0.05) 100%);
            border-left: 4px solid var(--use-blue);
            padding: 1.5rem;
            border-radius: 8px;
            margin: 2rem 0;
        }

        .highlight-box p {
            margin: 0;
            color: var(--text-primary);
            line-height: 1.7;
        }

        .highlight-box strong {
            color: var(--use-blue);
        }

        .governance-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .governance-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .governance-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--use-blue);
        }

        .governance-card h3 {
            color: var(--use-blue);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .governance-card h3 i {
            color: var(--use-yellow);
            font-size: 1.75rem;
        }

        .governance-card p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .participants-section {
            margin-top: 2.5rem;
        }

        .participants-category {
            margin-bottom: 3rem;
        }

        .participants-category h3 {
            color: var(--use-blue);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            padding-left: 1rem;
            border-left: 4px solid var(--use-yellow);
        }

        .participants-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1rem;
        }

        .participant-item {
            background: var(--surface);
            padding: 1.25rem 1.5rem;
            border-radius: 12px;
            border: 2px solid var(--border);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .participant-item:hover {
            border-color: var(--use-blue);
            background: var(--surface-secondary);
            transform: translateX(5px);
        }

        .participant-item i {
            color: var(--use-blue);
            font-size: 1.5rem;
        }

        .participant-item span {
            font-weight: 500;
            color: var(--text-primary);
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

            .governance-grid {
                grid-template-columns: 1fr;
            }

            .participants-list {
                grid-template-columns: 1fr;
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
            <h1 class="hero-title">About the SCD</h1>
            <p class="hero-subtitle">Securities Central Depository - Enabling safe and efficient securities transfer since 2010</p>
        </div>
    </section>

    <main class="main-content">
        <!-- Introduction Section -->
        <section class="content-section">
            <h2>INTRODUCTION</h2>
            <div class="intro-text">
                <p>The Securities Central Depository (SCD) was established to operate as a subsidiary company of the Uganda Securities Exchange and is licensed as a Central Securities Depository under the Capital Markets Authority Act Cap 84.</p>

                <p>The Securities Central Depository has been operational since July 2010 and commenced full dematerialization in 2012. Uganda now operates a T+3 settlement cycle which allows for real time transfer of ownership as trades are confirmed by the depository participants.</p>
            </div>

            <div class="highlight-box">
                <p><strong>What is a Central Securities Depository?</strong></p>
                <p>A Central Securities Depository (CSD) is a specialized financial institution that holds securities in either physical or electronic (dematerialized) form to enable book entry transfer of securities. The CSD plays a crucial role in ensuring the safe and efficient transfer of securities ownership in financial markets.</p>
            </div>
        </section>

        <!-- Ownership and Governance Section -->
        <section class="content-section">
            <h2>OWNERSHIP AND GOVERNANCE</h2>

            <div class="governance-grid">
                <div class="governance-card">
                    <h3><i class="fas fa-building"></i> Ownership Structure</h3>
                    <p>The Securities Central Depository is a wholly-owned subsidiary of the Uganda Securities Exchange, operating under the regulatory oversight of the Capital Markets Authority.</p>
                </div>

                <div class="governance-card">
                    <h3><i class="fas fa-shield-alt"></i> Regulatory Framework</h3>
                    <p>Licensed and regulated under the Capital Markets Authority Act Cap 84, ensuring compliance with international best practices and standards for securities depositories.</p>
                </div>

                <div class="governance-card">
                    <h3><i class="fas fa-cog"></i> Operational Excellence</h3>
                    <p>Operating on a T+3 settlement cycle with full dematerialization capabilities, providing real-time transfer of ownership and enhanced market efficiency.</p>
                </div>
            </div>
        </section>

        <!-- Participants Section -->
        <section class="content-section">
            <h2>PARTICIPANTS</h2>

            <div class="participants-section">
                <!-- Broker Dealers -->
                <div class="participants-category">
                    <h3>Broker Dealers</h3>
                    <div class="participants-list">
                        <div class="participant-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Chipper</span>
                        </div>
                        <div class="participant-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Crested Capital</span>
                        </div>
                        <div class="participant-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Dyer and Blair</span>
                        </div>
                        <div class="participant-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Standard Bank Group Securities</span>
                        </div>
                        <div class="participant-item">
                            <i class="fas fa-chart-line"></i>
                            <span>UAP Financial Services</span>
                        </div>
                    </div>
                </div>

                <!-- Custodian Banks -->
                <div class="participants-category">
                    <h3>Custodian Banks</h3>
                    <div class="participants-list">
                        <div class="participant-item">
                            <i class="fas fa-university"></i>
                            <span>Housing Finance Bank</span>
                        </div>
                        <div class="participant-item">
                            <i class="fas fa-university"></i>
                            <span>KCB Uganda</span>
                        </div>
                        <div class="participant-item">
                            <i class="fas fa-university"></i>
                            <span>Stanbic</span>
                        </div>
                        <div class="participant-item">
                            <i class="fas fa-university"></i>
                            <span>Bank of Africa</span>
                        </div>
                        <div class="participant-item">
                            <i class="fas fa-university"></i>
                            <span>Standard Chartered</span>
                        </div>
                    </div>
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
