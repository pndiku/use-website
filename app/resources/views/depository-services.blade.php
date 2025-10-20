<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depository Services - Uganda Securities Exchange</title>
    <meta name="description" content="Comprehensive depository services including securities accounts, statements, deposits, withdrawals, pledges, transfers, and more.">

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

        .service-content ul {
            list-style: none;
            margin: 1.5rem 0;
        }

        .service-content ul li {
            color: var(--text-secondary);
            padding: 0.75rem 0;
            padding-left: 2rem;
            position: relative;
            line-height: 1.7;
        }

        .service-content ul li:before {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--use-blue);
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

        .highlight-box strong {
            color: var(--use-blue);
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

        .info-box strong {
            color: var(--use-blue);
        }

        .fee-badge {
            display: inline-block;
            background: var(--use-blue);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .process-steps {
            margin: 1.5rem 0;
        }

        .process-step {
            background: var(--surface-secondary);
            padding: 1.25rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            border-left: 4px solid var(--use-blue);
        }

        .process-step h4 {
            color: var(--use-blue);
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .process-step p {
            color: var(--text-secondary);
            margin: 0;
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
            <h1 class="hero-title">Depository Services</h1>
            <p class="hero-subtitle">Comprehensive securities management and depository solutions for all market participants</p>
        </div>
    </section>

    <main class="main-content">
        <!-- I. Securities Accounts -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">I</div>
                <h2 class="service-title">Securities Accounts</h2>
                <i class="fas fa-user-circle service-icon"></i>
            </div>
            <div class="service-content">
                <p>Securities Depository Agents (SCDAs) open and maintain Securities Accounts. These comprise Clients' Securities Accounts and Participants' (proprietary/dealers) Securities Accounts which are segregated from each other.</p>

                <p>Clients' Securities Accounts are opened through and/or registered with a Securities Central Depository Agent (Broker/Dealer, Investment Advisors or Custodian Banks). A Client may open accounts with several Securities Central Depository Agents.</p>

                <div class="info-box">
                    <p><strong>Account Opening Forms Available</strong></p>
                    <p>Contact your Securities Central Depository Agent to obtain the necessary forms to open your securities account.</p>
                </div>
            </div>
        </section>

        <!-- II. Statement of Accounts -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">II</div>
                <h2 class="service-title">Statement of Accounts</h2>
                <i class="fas fa-file-invoice service-icon"></i>
            </div>
            <div class="service-content">
                <p>SCD is mandated to provide client account statements semi-annually to all active and non-active clients in the Depository. The SCD provides monthly statements of accounts on request to all holders of active securities accounts. SCD mails these statements of accounts directly to securities account holders at the addresses recorded in the system.</p>

                <div class="highlight-box">
                    <p><strong>How to Update Your Email Address:</strong></p>
                    <p>To enjoy this service, simply ensure that we have your correct and up to date email address. Once in place, send your SCD account name, account number, ID/Passport number used to open this account to your broker and your email will be updated.</p>
                </div>

                <p>Investors receive regular statements detailing their electronic holdings and, as these statements are not negotiable instruments, investors need not worry about loss or duplication of such statements.</p>

                <p>Clients can request for statements as and when they so wish to enable them monitor their accounts.</p>

                <span class="fee-badge"><i class="fas fa-tag"></i> Fee: UGX 3,000 per statement</span>
            </div>
        </section>

        <!-- III. Deposits -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">III</div>
                <h2 class="service-title">Deposits</h2>
                <i class="fas fa-download service-icon"></i>
            </div>
            <div class="service-content">
                <p>SCD accepts deposits of securities certificates from Clients through SCDAs. To use the SCD Depository services, the investor opens a Securities accounts in the SCD system through a SCDA.</p>

                <div class="process-steps">
                    <div class="process-step">
                        <h4><i class="fas fa-arrow-right"></i> Step 1: Submission</h4>
                        <p>Deposited certificates are submitted to the registry for verification.</p>
                    </div>
                    <div class="process-step">
                        <h4><i class="fas fa-arrow-right"></i> Step 2: Verification</h4>
                        <p>Certificates are verified and authenticated by the registry.</p>
                    </div>
                    <div class="process-step">
                        <h4><i class="fas fa-arrow-right"></i> Step 3: Confirmation</h4>
                        <p>Clients' Securities Accounts are credited only upon receipt of written confirmation of the authenticity of the deposited certificates from the registry.</p>
                    </div>
                </div>

                <div class="info-box">
                    <p><strong>Security Guarantee:</strong> This process eliminates the risk of introducing invalid securities in the SCD system.</p>
                </div>
            </div>
        </section>

        <!-- IV. Withdrawals -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">IV</div>
                <h2 class="service-title">Withdrawals</h2>
                <i class="fas fa-upload service-icon"></i>
            </div>
            <div class="service-content">
                <p>Clients can withdraw securities from the SCD by submitting a request through the relevant SCDA. Upon withdrawal, the Client Securities Account is debited and the issuer's registry is instructed to issue a certificate in the name of the client.</p>
            </div>
        </section>

        <!-- V. Pledges & Releases -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">V</div>
                <h2 class="service-title">Pledges & Releases</h2>
                <i class="fas fa-handshake service-icon"></i>
            </div>
            <div class="service-content">
                <p>The Depository Services also include the recording of pledges in favour of lending institutions with the agreement of both the borrower & the lending institution.</p>

                <p>This is the process by which shares are used as collateral. A standard pledge form (SCD 5) is completed by the client and approved by the SCDA and the lender. The completed form is delivered to SCD by the SCDA where the securities are frozen and confirmation is done directly to the lender.</p>

                <div class="highlight-box">
                    <p><strong>Release Process:</strong></p>
                    <p>Once the loan facility has been cleared, a release form (SCD 6) is completed by the lender and the SCDA, and delivered to SCD where the shares are released.</p>
                </div>

                <p>In the records of SCD, a pledgor remains the shareholder of the pledged securities. However, the pledgor cannot access these shares unless the pledgee submits the appropriate pledge release instruction (SCD 6) in accordance with SCD Procedures. The shares remain in a frozen state on the pledgor's account.</p>
            </div>
        </section>

        <!-- VI. Transfers -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">VI</div>
                <h2 class="service-title">Transfers</h2>
                <i class="fas fa-exchange-alt service-icon"></i>
            </div>
            <div class="service-content">
                <p>An investor may have more than one account, by registering his/her SCD account with Securities Central Depository Agents. The investor can transfer securities among these accounts by making the request through the relevant Securities Central Depository Agents.</p>
            </div>
        </section>

        <!-- VII. Inter-Depository -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">VII</div>
                <h2 class="service-title">Inter-Depository</h2>
                <i class="fas fa-globe service-icon"></i>
            </div>
            <div class="service-content">
                <p>The Securities Central Depository has an inter-depository transfer mechanism where securities of a primary jurisdiction can be transferred to a secondary market.</p>

                <div class="info-box">
                    <p><strong>Uganda-Kenya Partnership:</strong></p>
                    <p>This mechanism has been established between the Ugandan and Kenyan depositories, to allow for shares to be transacted to a market of the client's choice.</p>
                </div>
            </div>
        </section>

        <!-- VIII. Initial Public Offers -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">VIII</div>
                <h2 class="service-title">Initial Public Offers – Direct Crediting of Securities</h2>
                <i class="fas fa-coins service-icon"></i>
            </div>
            <div class="service-content">
                <p>The Clients will, if they already have a securities account in the depository, indicate the account number on the application form. If they do not already have an account, they will open one and the number will be indicated on the application form.</p>

                <p>Upon completion of an IPO, the Shares Registrar provides SCD with an allotment schedule indicating the respective SCD account numbers. Thereafter at the close of the Business Day and before the trade date SCD credits the clients' securities accounts with the number of shares allotted to them as per the allotment schedule.</p>

                <p>A new issues schedule is made available to the Shares Registrar who in turn will register the securities as per that schedule in the name of SCD and generate a Securities Certificate which will then be forwarded to SCD.</p>
            </div>
        </section>

        <!-- IX. Bonus Issues -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">IX</div>
                <h2 class="service-title">Bonus Issues</h2>
                <i class="fas fa-gift service-icon"></i>
            </div>
            <div class="service-content">
                <p>The Shares Registrar informs the Securities Exchange and SCD in writing of any proposed Bonus Issue and with the Entitlement Date stated.</p>

                <p>Following settlement of all transactions that took place on or before the last cum-date, SCD provides the Shares Registrar with an Entitlement Schedule with respect to shareholders registered as at Entitlement Date.</p>

                <p>The Shares Registrar then submits to SCD an Allotment Schedule.</p>

                <p>At the close of Business Day before the listing of the new shares, SCD credits the clients' accounts with the number of Bonus Securities allotted to them.</p>

                <div class="info-box">
                    <p><strong>Important Note:</strong> All clients with paper certificates are credited with bonus shares only after depositing the certificate with the registrar for authentication.</p>
                </div>
            </div>
        </section>

        <!-- X. Dividends -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">X</div>
                <h2 class="service-title">Dividends</h2>
                <i class="fas fa-money-bill-wave service-icon"></i>
            </div>
            <div class="service-content">
                <p>The Shares Registrar informs the Uganda Securities Exchange in writing of the Entitlement Date in respect of dividend payment.</p>

                <p>Following settlement of all transactions that took place on or before the last cum-date, SCD provides the Shares Registrar with an Entitlement Schedule with respect to shareholders registered as at the Entitlement Date.</p>

                <p>The Shares Registrar then effects payment of dividends to its shareholders.</p>
            </div>
        </section>

        <!-- XI. Rights Issues -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">XI</div>
                <h2 class="service-title">Rights Issues</h2>
                <i class="fas fa-certificate service-icon"></i>
            </div>
            <div class="service-content">
                <p>The Shares Registrar informs SCD of:</p>
                <ul>
                    <li>The Rights Issue</li>
                    <li>The Entitlement Date</li>
                    <li>The period during which the Rights will be traded</li>
                    <li>The opening and closing dates of application</li>
                </ul>

                <p>Following settlement of all transactions that took place on or before the last cum-date, CDSC provides the Shares Registrar with an Entitlement Schedule with respect to shareholders registered as at the Entitlement Date. The Shares Registrar forwards Provisional Letters of Allotment (PAL) for Securities Account holders indicated on the list.</p>

                <p>The Shares Registrar submits to SCD a Rights Allotment Schedule. On the Business Day before the trade date of Rights, SCD credits the relevant Securities Account with the number of Rights as per the Rights Allotment Schedule.</p>
            </div>
        </section>

        <!-- XII. ISIN Generation -->
        <section class="service-section">
            <div class="service-header">
                <div class="service-number">XII</div>
                <h2 class="service-title">ISIN – Generation</h2>
                <i class="fas fa-barcode service-icon"></i>
            </div>
            <div class="service-content">
                <p>The USE is a member of the Association of National Numbering Agency (ANNA) and is recognized as the National Numbering Agency for Uganda.</p>

                <p>USE's depository is responsible for codifying all financial instruments listed on the market by issuing unique ISIN codes in accordance with the ISO-6166 standard. The ISIN codes allocated to listed instruments are shown on all reports generated by the SCD.</p>

                <div class="highlight-box">
                    <p><strong>International Standards:</strong></p>
                    <p>The CDS also allocates CFI Codes to instruments in accordance with the ISO-10962 standard.</p>
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
