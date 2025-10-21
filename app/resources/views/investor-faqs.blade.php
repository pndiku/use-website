<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investor FAQs - Uganda Securities Exchange</title>
    <meta name="description" content="Frequently asked questions about investing in the Uganda Securities Exchange - everything you need to know about shares, trading, and benefits.">

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
            max-width: 1000px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .faq-container {
            margin-bottom: 1.5rem;
        }

        .faq-question {
            background: var(--surface);
            padding: 1.5rem 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .faq-question:hover {
            box-shadow: var(--shadow-lg);
            border-color: var(--use-blue);
        }

        .faq-question.active {
            background: var(--gradient-primary);
            color: white;
            border-color: var(--use-blue);
        }

        .question-text {
            font-size: 1.2rem;
            font-weight: 600;
            flex: 1;
        }

        .toggle-icon {
            width: 32px;
            height: 32px;
            background: rgba(0, 128, 199, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .faq-question.active .toggle-icon {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .faq-answer.active {
            max-height: 5000px;
        }

        .answer-content {
            padding: 2rem;
            background: var(--surface);
            border: 1px solid var(--border-light);
            border-top: none;
            border-radius: 0 0 12px 12px;
            margin-top: -12px;
        }

        .answer-content p {
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .answer-content p:last-child {
            margin-bottom: 0;
        }

        .answer-content ul, .answer-content ol {
            margin: 1rem 0 1rem 2rem;
            color: var(--text-secondary);
        }

        .answer-content li {
            margin-bottom: 0.75rem;
            line-height: 1.7;
        }

        .answer-content strong {
            color: var(--use-blue);
        }

        .highlight-box {
            background: linear-gradient(135deg, rgba(0, 128, 199, 0.05) 0%, rgba(51, 153, 219, 0.05) 100%);
            border-left: 4px solid var(--use-blue);
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
        }

        .example-box {
            background: linear-gradient(135deg, rgba(253, 185, 19, 0.1) 0%, rgba(254, 202, 56, 0.1) 100%);
            border-left: 4px solid var(--use-yellow);
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
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

            .faq-question {
                padding: 1.25rem 1.5rem;
            }

            .question-text {
                font-size: 1.05rem;
            }

            .answer-content {
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
            <h1 class="hero-title">Investor FAQs</h1>
            <p class="hero-subtitle">Everything you need to know about investing in the Uganda Securities Exchange</p>
        </div>
    </section>

    <main class="main-content">
        <!-- FAQ 1 -->
        <div class="faq-container">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span class="question-text">What is a Share?</span>
                <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="faq-answer">
                <div class="answer-content">
                    <p>A share is a single unit of ownership in a company. When an individual buys shares, he or she buys a stake in a company.</p>
                    <p>One of the reasons and this being the main reason as to why companies sell ownership of their companies in the form of shares is the need to raise capital.</p>
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-container">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span class="question-text">How to become a shareholder?</span>
                <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="faq-answer">
                <div class="answer-content">
                    <p>Visit one of our licensed stock brokerage firms and open a Security Central Depositary (SCD) Account.</p>
                    <div class="highlight-box">
                        <p><strong>Requirements:</strong> To open an SCD account, you need a valid ID and 3 passport photos.</p>
                        <p><strong>Important:</strong> Please note that account opening is free and there are no monthly or annual charges.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-container">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span class="question-text">How do you buy Shares?</span>
                <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="faq-answer">
                <div class="answer-content">
                    <p>As an investor wishing to buy shares through the USE, follow these steps:</p>
                    <ol>
                        <li>Approach your stock broker and express your desire to buy shares of a given listed company.</li>
                        <li>Your Stock broker will provide you with details of the trust account specifically opened by the stock brokers to keep investor's money intended for USE transactions.</li>
                        <li>Deposit the money of any amount into the trust account. It is a requirement of the USE that for local orders, payment is made upfront by the investor.</li>
                        <li>Your stock broker will then post the order (bid) on the Automated Trading System (ATS) during trading hours.</li>
                        <li>When the bid matches an offer (an order to sell) by either the same stock broker or other stock brokers, then the transaction is considered to have been concluded.</li>
                        <li>Your Stock broker will then credit the shares to your SCD account.</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-container">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span class="question-text">How about selling of Shares?</span>
                <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="faq-answer">
                <div class="answer-content">
                    <p>As an investor wishing to sell shares through the USE, follow these steps:</p>
                    <ol>
                        <li>Approach your stock broker and express your desire to sell your shares of a given listed company.</li>
                        <li>Your Stock broker will assist you to complete a Sell Order form.</li>
                        <li>Your stock broker will then post the sell order on the ATS.</li>
                        <li>When the offer is matched with a bid, the transaction is considered to have been concluded, and the shares will have been sold.</li>
                        <li>Your stock broker will then debit the shares from your SCD account.</li>
                        <li>Money is then wired to your bank account by your Stock broker.</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="faq-container">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span class="question-text">What are the Types of Orders?</span>
                <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="faq-answer">
                <div class="answer-content">
                    <p>An investor may instruct his/her stock broker to process several types of orders:</p>

                    <div class="highlight-box">
                        <p><strong>Limit Order:</strong> An order which has a specified price when it is posted for execution.</p>
                    </div>

                    <div class="highlight-box">
                        <p><strong>Market Order:</strong> An order which does not have a specific price when posted for execution. This type of order must be executed promptly at the best price obtainable and will have priority over limit order at the same price levels.</p>
                        <p>It assumes an initial price limit value normally based on the price most advantageous in the market. A market order trades through a range of prices starting at the best price in the market.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ 6 -->
        <div class="faq-container">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span class="question-text">How do you benefit from owning shares?</span>
                <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="faq-answer">
                <div class="answer-content">
                    <ul>
                        <li><strong>Ownership:</strong> An investment in a share gives you part ownership of the company.</li>

                        <li><strong>Voting Rights:</strong> As a shareholder, you will be a participant in the running of a company through your Voter's Rights. Voting rights give you the power to decide on future company actions at the company Annual General Meeting (AGM).</li>

                        <li><strong>Income Return:</strong> If market conditions are favorable, some companies pay out dividends which can make the investor money even if the share price does not rise.</li>

                        <li><strong>Form of Savings:</strong> Some shareholders commit a part of their monthly salary or earnings to buying shares. Share prices can increase by any margin unlike fixed deposits which have a fixed interest rate.</li>

                        <li><strong>Investments are Liquid:</strong> Shares and Bonds can be bought and sold anytime the market is open for trading.</li>

                        <li><strong>Protection against Inflation:</strong> Offers protection against inflation especially when stock prices appreciate at rates greater than inflation.</li>

                        <li><strong>Accessibility:</strong> There are many stocks and bonds available in the market today.</li>

                        <li><strong>Safe Investment:</strong> A principle amount is returned to the investor after maturity.</li>

                        <li><strong>Limited Liability:</strong> One of the great advantages of buying stocks is limited liability. Even though you own part of the company, you are not held personally liable if the company goes bankrupt and has to pay debts. The Capital Markets Authority (stock market regulator) monitors the market to ensure the safety of shareholders' investments.</li>

                        <li><strong>Enhances wealth through Capital Appreciation:</strong> You get to increase your wealth and worth as the price of your shares rise over time.</li>
                    </ul>

                    <div class="example-box">
                        <p><strong>Example 1:</strong> You may buy 100,000 shares in a particular company at 100ugx each. If, after some time, each share increases to 300ugx and you sell, you will have made a gain of 200ugx per share.</p>

                        <p><strong>Example 2:</strong> In the year 2000, BATU sold shares at 1000ugx each. If you bought 1000 shares then, today BATU share price is 30,000ugx. Your net worth today would be 30,000,000ugx.</p>
                    </div>

                    <ul>
                        <li><strong>Collateral Security for getting loans:</strong> Shares can be used as collateral for securing loans.</li>

                        <li><strong>Gains through Bonus and Rights Issues:</strong> A bonus issue is when a public listed company gives free shares to its existing shareholders. A rights issue is when a public listed company gives its existing shareholders the right to buy more shares at a reduced (discount) price compared to the prevailing market price. In both cases, the shareholders can sell their newly acquired shares at the prevailing market price and make a profit but one has to be a shareholder already to qualify for bonus shares or rights.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- FAQ 7 -->
        <div class="faq-container">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span class="question-text">What are the risks you may face?</span>
                <div class="toggle-icon"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="faq-answer">
                <div class="answer-content">
                    <p><strong>Unfavorable changes:</strong> Share prices vary widely day to day. This may be caused by changes in the industry, economically or politically driven. This can affect a company's financial performance.</p>
                </div>
            </div>
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

        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const allQuestions = document.querySelectorAll('.faq-question');
            const allAnswers = document.querySelectorAll('.faq-answer');

            // Close all other FAQs
            allQuestions.forEach(q => {
                if (q !== element) {
                    q.classList.remove('active');
                }
            });

            allAnswers.forEach(a => {
                if (a !== answer) {
                    a.classList.remove('active');
                }
            });

            // Toggle current FAQ
            element.classList.toggle('active');
            answer.classList.toggle('active');
        }
    </script>
</body>
</html>
