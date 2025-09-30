<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About USE - Uganda Securities Exchange</title>
    <meta name="description" content="Learn about Uganda Securities Exchange - our vision, mission, core values, and key milestones in building East Africa's premier financial market.">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #60a5fa;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-accent: #f1f5f9;
            --border: #e2e8f0;
            --border-light: #f1f5f9;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--bg-secondary);
        }

        /* Header */
        .header {
            position: fixed;
            top: 1rem;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: calc(100% - 2rem);
            max-width: 1200px;
        }

        .header.scrolled {
            top: 0.5rem;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(24px) saturate(200%);
            box-shadow: var(--shadow-xl);
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
            font-size: 1.375rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: -0.02em;
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: translateY(-1px);
        }

        .logo::before {
            content: "";
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            margin-right: 8px;
            border-radius: 7px;
            display: flex;
        }

        .market-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.875rem;
            background: rgba(37, 99, 235, 0.1);
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary);
            border: 1px solid rgba(37, 99, 235, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .status-indicator {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--success);
            animation: pulse 2s infinite;
            flex-shrink: 0;
        }

        .status-indicator.open {
            background: var(--success);
        }

        .status-indicator.closed {
            background: var(--danger);
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .status-text {
            font-weight: 600;
            color: var(--primary);
            white-space: nowrap;
        }

        .status-time {
            color: var(--text-secondary);
            font-weight: 500;
            white-space: nowrap;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            align-items: center;
            gap: 1.75rem;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.375rem;
            transition: all 0.3s ease;
            font-size: 0.875rem;
            letter-spacing: -0.01em;
        }

        .nav-link:hover {
            color: var(--primary);
            text-decoration: none;
        }

        .chevron-down {
            font-size: 0.75rem;
            transition: transform 0.3s ease;
        }

        .nav-item:hover .chevron-down {
            transform: rotate(180deg);
        }

        .chevron-down::before {
            content: '▼';
        }

        .dropdown {
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
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
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
            background: var(--bg-accent);
            color: var(--primary);
            text-decoration: none;
        }

        .nav-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 0.25rem;
        }

        .nav-toggle span {
            width: 25px;
            height: 3px;
            background: white;
            transition: all 0.3s ease;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
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
            background: var(--bg-primary);
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
            background: var(--bg-primary);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            text-align: center;
        }

        .vision-mission-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
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
            background: var(--bg-primary);
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
            color: var(--primary);
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
            background: var(--primary);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 2rem;
            background: var(--bg-primary);
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
            background: var(--primary);
            border: 3px solid var(--bg-secondary);
        }

        .timeline-year {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
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
            background: var(--bg-primary);
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
            color: var(--danger);
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
            background: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .report-link:hover {
            background: var(--primary-dark);
            text-decoration: none;
            color: white;
            transform: translateY(-1px);
        }

        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .footer p {
            margin: 0;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 1rem;
            }

            .nav-links {
                display: none;
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
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <nav class="nav-container">
            <div class="logo">USE</div>
            <div class="market-status">
                <span class="status-indicator open"></span>
                <span class="status-text">Market Open</span>
                <span class="status-time">9:00 AM - 3:00 PM EAT</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link">About USE <span class="chevron-down"></span></a>
                    <div class="dropdown">
                        <a href="{{ route('about') }}" class="dropdown-item">About USE</a>
                        <a href="#" class="dropdown-item">Governance</a>
                        <a href="#" class="dropdown-item">Products and Services</a>
                        <a href="#" class="dropdown-item">Trading Participants</a>
                        <a href="#" class="dropdown-item">Contact Us</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/#listings" class="nav-link">Listings <span class="chevron-down"></span></a>
                    <div class="dropdown">
                        <a href="#" class="dropdown-item">How to List</a>
                        <a href="#" class="dropdown-item">Listing Rules</a>
                        <a href="#" class="dropdown-item">Listed Securities</a>
                        <a href="#" class="dropdown-item">FAQs</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/#services" class="nav-link">Services <span class="chevron-down"></span></a>
                    <div class="dropdown">
                        <a href="#" class="dropdown-item">Securities Trading</a>
                        <a href="#" class="dropdown-item">Investment Advisory</a>
                        <a href="#" class="dropdown-item">Market Research</a>
                        <a href="#" class="dropdown-item">Investor Education</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/#news" class="nav-link">News & Updates</a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link">Contact</a>
                </li>
            </ul>
            <div class="nav-toggle" id="navToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

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

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Uganda Securities Exchange. All rights reserved.</p>
    </footer>
</body>
</html>