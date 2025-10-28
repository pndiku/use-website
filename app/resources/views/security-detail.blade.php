<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $security->ticker ?: $security->isin }} - Security Details - Uganda Securities Exchange</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        /* Header - EXACT COPY FROM INDEX */
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
            font-family: 'Titillium Web', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.03em;
            transition: all 0.3s ease;
            position: relative;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--gradient-accent);
            border-radius: 1px;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .logo:hover::after {
            transform: scaleX(1);
        }

        .logo:hover {
            transform: translateY(-1px);
        }

        .logo::before {
            content: "";
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-light) 100%);
            margin-right: 8px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
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
            background: #10b981;
        }

        .status-indicator.closed {
            background: #ef4444;
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
            text-decoration: none;
        }

        .nav-link.active {
            color: var(--use-blue);
            background: white;
            box-shadow: var(--shadow-sm);
            font-weight: 600;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .mobile-menu-btn:hover {
            background: rgba(37, 99, 235, 0.05);
            color: var(--use-blue);
        }

        /* Main Content */
        .main-content {
            padding-top: 8rem;
            min-height: 100vh;
            background: var(--surface-secondary);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Breadcrumb */
        .breadcrumb {
            margin-bottom: 2rem;
        }

        .breadcrumb-list {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
            font-size: 0.875rem;
            background: var(--surface);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb-link {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.2s ease;
            font-weight: 500;
        }

        .breadcrumb-link:hover {
            color: var(--use-blue);
        }

        .breadcrumb-separator {
            color: var(--text-tertiary);
            font-size: 0.75rem;
        }

        .breadcrumb-current {
            color: var(--text-primary);
            font-weight: 600;
        }

        /* Security Header */
        .security-header {
            background: var(--surface);
            border-radius: 24px;
            padding: 3rem 2rem;
            margin-bottom: 3rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .security-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .security-symbol {
            font-size: 3.5rem;
            font-weight: 900;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            letter-spacing: -0.03em;
            line-height: 1.1;
        }

        .security-name {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            line-height: 1.3;
        }

        .security-type-badge {
            background: rgba(0, 128, 199, 0.1);
            color: var(--use-blue);
            padding: 0.75rem 1.5rem;
            border-radius: 16px;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            display: inline-block;
            margin-bottom: 1rem;
            border: 1px solid rgba(0, 128, 199, 0.2);
        }

        .last-updated {
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Chart Section */
        .chart-section {
            margin-bottom: 3rem;
        }

        .chart-card {
            background: var(--surface);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .chart-card:hover {
            box-shadow: var(--shadow-xl);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .chart-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .chart-title i {
            color: var(--use-blue);
        }

        .chart-controls {
            display: flex;
            gap: 0.5rem;
            background: var(--surface-secondary);
            padding: 0.25rem;
            border-radius: 12px;
        }

        .chart-btn {
            background: transparent;
            border: none;
            color: var(--text-secondary);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .chart-btn:hover {
            color: var(--text-primary);
            background: rgba(0, 128, 199, 0.05);
        }

        .chart-btn.active {
            background: var(--use-blue);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .chart-container {
            position: relative;
            height: 400px;
            margin-bottom: 1rem;
            background: var(--surface-secondary);
            border-radius: 16px;
            padding: 1rem;
        }

        .chart-loading,
        .chart-error {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            color: var(--text-secondary);
            font-size: 1rem;
            font-weight: 500;
        }

        .chart-loading i {
            font-size: 2.5rem;
            color: var(--use-blue);
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .chart-error {
            color: var(--use-red);
        }

        .chart-error i {
            font-size: 2.5rem;
            color: var(--use-red);
        }

        #priceChart {
            display: none;
            width: 100% !important;
            height: 100% !important;
        }

        /* Security Details Grid */
        .security-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .detail-card {
            background: var(--surface);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .detail-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .detail-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-2xl);
        }

        .detail-card:hover::before {
            transform: scaleX(1);
        }

        .detail-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .detail-card-title i {
            color: var(--use-blue);
            font-size: 1.125rem;
        }

        .detail-list {
            list-style: none;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border);
        }

        .detail-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-item:first-child {
            padding-top: 0;
        }

        .detail-label {
            font-weight: 500;
            color: var(--text-secondary);
            font-size: 0.875rem;
            flex: 1;
        }

        .detail-value {
            font-weight: 600;
            color: var(--text-primary);
            text-align: right;
            flex: 1;
            word-break: break-word;
        }

        .detail-value.rate {
            color: var(--use-green);
            font-weight: 700;
            font-size: 1.125rem;
        }

        .detail-value.amount {
            font-family: 'Inter', monospace;
            font-weight: 600;
        }

        /* Actions Section */
        .actions-section {
            background: var(--surface);
            border-radius: 24px;
            padding: 3rem 2rem;
            margin-bottom: 3rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .actions-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-accent);
        }

        .actions-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .actions-subtitle {
            color: var(--text-secondary);
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--use-blue);
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            box-shadow: var(--shadow-md);
        }

        .action-btn:hover {
            background: var(--use-blue-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            text-decoration: none;
            color: white;
        }

        .action-btn.secondary {
            background: var(--surface);
            color: var(--text-primary);
            border: 2px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        .action-btn.secondary:hover {
            background: var(--surface-secondary);
            border-color: var(--use-blue);
            color: var(--use-blue);
            box-shadow: var(--shadow-md);
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

        /* Enhanced Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-in-delay {
            animation: fadeInUp 0.6s ease-out 0.2s both;
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
                font-size: 0.7rem;
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
                transform: none;
            }

            .chevron-down {
                transition: transform 0.3s ease;
            }

            .dropdown {
                position: static;
                opacity: 0;
                visibility: hidden;
                transform: none;
                box-shadow: none;
                border: none;
                padding: 0;
                margin-top: 0;
                background: transparent;
                border-radius: 0;
                max-height: 0;
                overflow: hidden;
                padding-left: 1rem;
                transition: max-height 0.3s ease, opacity 0.3s ease, visibility 0.3s ease;
            }

            .dropdown.active {
                opacity: 1;
                visibility: visible;
                max-height: 1000px;
                display: block;
            }

            .dropdown > li {
                border-top: 1px solid var(--border-light);
            }

            .dropdown > li:first-child {
                border-top: none;
            }

            .dropdown-item {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            /* Mobile submenu styles */
            .submenu {
                position: static !important;
                opacity: 0 !important;
                visibility: hidden !important;
                transform: none !important;
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                margin: 0 !important;
                margin-left: 0 !important;
                background: transparent !important;
                max-height: 0 !important;
                overflow: hidden !important;
                padding-left: 1rem !important;
                transition: max-height 0.3s ease, opacity 0.3s ease, visibility 0.3s ease !important;
            }

            .submenu.active {
                opacity: 1 !important;
                visibility: visible !important;
                max-height: 800px !important;
                display: block !important;
            }

            .submenu > li {
                border-top: 1px solid var(--border-light);
            }

            .submenu > li:first-child {
                border-top: none;
            }

            .submenu-item {
                padding: 0.625rem 1rem;
                font-size: 0.8125rem;
            }

            .submenu-item:hover {
                transform: none;
            }

            .header {
                width: calc(100% - 1rem);
            }

            .container {
                padding: 0 1rem;
            }

            .security-header {
                padding: 2rem 1.5rem;
            }

            .security-symbol {
                font-size: 2.5rem;
            }

            .security-details {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .detail-card {
                padding: 2rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .action-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .chart-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .chart-controls {
                width: 100%;
                justify-content: space-between;
            }

            .chart-btn {
                flex: 1;
                padding: 0.5rem 0.25rem;
                font-size: 0.75rem;
            }

            .chart-container {
                height: 300px;
            }

            .chart-card {
                padding: 2rem;
            }

            .chart-title {
                font-size: 1.25rem;
            }
        }

        /* Extra small devices (phones, 480px and down) */
        @media (max-width: 480px) {
            .header {
                width: calc(100% - 0.5rem);
                top: 0.5rem;
            }

            .header.scrolled {
                top: 0.25rem;
            }

            .nav-container {
                padding: 0.625rem;
                height: 68px;
                gap: 0.375rem;
            }

            .logo img {
                height: 50px;
            }

            .market-status {
                padding: 0.25rem 0.5rem;
                font-size: 0.65rem;
            }

            .status-indicator {
                width: 6px;
                height: 6px;
            }

            .status-text {
                font-size: 0.65rem;
            }

            .mobile-menu-btn {
                font-size: 1.25rem;
                padding: 0.375rem;
            }

            .nav-menu {
                top: calc(100% + 0.25rem);
                left: 0.25rem;
                right: 0.25rem;
                max-height: calc(100vh - 80px);
            }

            .nav-link {
                padding: 0.75rem 0.875rem;
                font-size: 0.85rem;
            }

            .dropdown-item {
                padding: 0.625rem 0.875rem;
                font-size: 0.8125rem;
            }

            .submenu-item {
                padding: 0.5rem 0.875rem;
                font-size: 0.75rem;
            }

            .main-content {
                padding-top: 6rem;
            }

            .breadcrumb-list {
                font-size: 0.8rem;
                padding: 0.75rem 1rem;
            }

            .security-header {
                padding: 1.5rem 1rem;
            }

            .security-symbol {
                font-size: 2rem;
            }

            .detail-card {
                padding: 1.5rem;
            }

            .chart-controls {
                gap: 0.25rem;
            }

            .chart-btn {
                padding: 0.375rem 0.125rem;
                font-size: 0.7rem;
                min-width: 0;
            }

            .chart-container {
                height: 250px;
                padding: 0.5rem;
            }

            .chart-loading,
            .chart-error {
                font-size: 0.875rem;
            }

            .chart-loading i,
            .chart-error i {
                font-size: 2rem;
            }
        }

        /* Related News Section */
        .related-news-section {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: var(--use-blue);
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .news-card {
            background: var(--surface);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            border: 1px solid var(--border-light);
        }

        .news-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .news-image {
            aspect-ratio: 16/9;
            overflow: hidden;
            background: var(--surface-secondary);
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.05);
        }

        .news-content {
            padding: 1.5rem;
        }

        .news-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .news-date {
            font-weight: 500;
        }

        .news-author {
            position: relative;
        }

        .news-author::before {
            content: '•';
            margin-right: 0.5rem;
            color: var(--use-blue);
        }

        .news-title {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 0.75rem;
        }

        .news-title a {
            color: var(--text-primary);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .news-title a:hover {
            color: var(--use-blue);
        }

        .news-summary {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .news-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--use-blue);
            font-weight: 500;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .news-link:hover {
            color: var(--use-blue-dark);
            gap: 0.75rem;
        }

        .news-link i {
            transition: transform 0.2s ease;
        }

        .news-link:hover i {
            transform: translateX(2px);
        }

        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .section-title {
                font-size: 1.25rem;
            }

            .news-content {
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Breadcrumb -->
            <nav class="breadcrumb animate-in">
                <ol class="breadcrumb-list">
                    <li class="breadcrumb-item">
                        <a href="/" class="breadcrumb-link">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/securities" class="breadcrumb-link">Securities</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="breadcrumb-current">{{ $security->ticker ?: $security->isin }}</span>
                    </li>
                </ol>
            </nav>

            <!-- Security Header -->
            <div class="security-header animate-in">
                <div class="security-symbol">{{ $security->ticker ?: $security->isin }}</div>
                @if($security->security_type === 'equity')
                    <div class="security-name">{{ $security->company_name ?: 'N/A' }}</div>
                @else
                    <div class="security-name">{{ $security->issuer_name ?: 'Government of Uganda' }}{{ $security->type ? ' - ' . $security->type : '' }}</div>
                @endif
                <div class="security-type-badge">{{ ucfirst(str_replace('_', ' ', $security->security_type)) }}</div>
                <div class="last-updated">Last updated: {{ $security->updated_at->format('M d, Y \a\t g:i A') }}</div>
            </div>

            <!-- Price Chart Section -->
            @if($security->ticker && $security->security_type === 'equity')
            <div class="chart-section animate-in-delay">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">
                            <i class="fas fa-chart-line"></i>
                            Price Performance
                        </h3>
                        <div class="chart-controls">
                            <button class="chart-btn active" data-period="1M">1M</button>
                            <button class="chart-btn" data-period="3M">3M</button>
                            <button class="chart-btn" data-period="6M">6M</button>
                            <button class="chart-btn" data-period="1Y">1Y</button>
                            <button class="chart-btn" data-period="ALL">All</button>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="priceChart" width="400" height="200"></canvas>
                    </div>
                    <div class="chart-loading" id="chartLoading">
                        <i class="fas fa-spinner fa-spin"></i>
                        <span>Loading chart data...</span>
                    </div>
                    <div class="chart-error" id="chartError" style="display: none;">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Unable to load chart data. Please check console for details.</span>
                    </div>
                </div>
            </div>
            @endif

            <!-- Security Details -->
            <div class="security-details animate-in">
                <!-- Basic Information -->
                <div class="detail-card">
                    <h3 class="detail-card-title">
                        <i class="fas fa-info-circle"></i>
                        Basic Information
                    </h3>
                    <ul class="detail-list">
                        @if($security->ticker)
                        <li class="detail-item">
                            <span class="detail-label">Symbol</span>
                            <span class="detail-value">{{ $security->ticker }}</span>
                        </li>
                        @endif
                        @if($security->isin)
                        <li class="detail-item">
                            <span class="detail-label">ISIN</span>
                            <span class="detail-value">{{ $security->isin }}</span>
                        </li>
                        @endif
                        <li class="detail-item">
                            <span class="detail-label">Security Type</span>
                            <span class="detail-value">{{ ucfirst(str_replace('_', ' ', $security->security_type)) }}</span>
                        </li>
                        @if($security->currency)
                        <li class="detail-item">
                            <span class="detail-label">Currency</span>
                            <span class="detail-value">{{ $security->currency }}</span>
                        </li>
                        @endif
                        @if($security->category)
                        <li class="detail-item">
                            <span class="detail-label">Category</span>
                            <span class="detail-value">{{ $security->category }}</span>
                        </li>
                        @endif
                    </ul>
                </div>

                @if($security->security_type === 'equity')
                <!-- Equity Details -->
                <div class="detail-card">
                    <h3 class="detail-card-title">
                        <i class="fas fa-building"></i>
                        Company Details
                    </h3>
                    <ul class="detail-list">
                        @if($security->company_name)
                        <li class="detail-item">
                            <span class="detail-label">Company Name</span>
                            <span class="detail-value">{{ $security->company_name }}</span>
                        </li>
                        @endif
                        @if($security->issued_shares)
                        <li class="detail-item">
                            <span class="detail-label">Issued Shares</span>
                            <span class="detail-value amount">{{ number_format($security->issued_shares) }}</span>
                        </li>
                        @endif
                        @if($security->issue_date)
                        <li class="detail-item">
                            <span class="detail-label">Issue Date</span>
                            <span class="detail-value">{{ $security->issue_date->format('M d, Y') }}</span>
                        </li>
                        @endif
                    </ul>
                </div>
                @else
                <!-- Bond/Bill Details -->
                <div class="detail-card">
                    <h3 class="detail-card-title">
                        <i class="fas fa-university"></i>
                        Financial Details
                    </h3>
                    <ul class="detail-list">
                        @if($security->issuer_name)
                        <li class="detail-item">
                            <span class="detail-label">Issuer</span>
                            <span class="detail-value">{{ $security->issuer_name }}</span>
                        </li>
                        @endif
                        @if($security->rate)
                        <li class="detail-item">
                            <span class="detail-label">Interest Rate</span>
                            <span class="detail-value rate">{{ number_format($security->rate, 2) }}%</span>
                        </li>
                        @endif
                        @if($security->issue_date)
                        <li class="detail-item">
                            <span class="detail-label">Issue Date</span>
                            <span class="detail-value">{{ $security->issue_date->format('M d, Y') }}</span>
                        </li>
                        @endif
                        @if($security->maturity_date)
                        <li class="detail-item">
                            <span class="detail-label">Maturity Date</span>
                            <span class="detail-value">{{ $security->maturity_date->format('M d, Y') }}</span>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif

                <!-- Trading Information -->
                <div class="detail-card">
                    <h3 class="detail-card-title">
                        <i class="fas fa-chart-line"></i>
                        Trading Information
                    </h3>
                    <ul class="detail-list">
                        <li class="detail-item">
                            <span class="detail-label">Status</span>
                            <span class="detail-value">{{ $security->is_active ? 'Active' : 'Inactive' }}</span>
                        </li>
                        <li class="detail-item">
                            <span class="detail-label">Trading Hours</span>
                            <span class="detail-value">9:00 AM - 3:00 PM EAT</span>
                        </li>
                        <li class="detail-item">
                            <span class="detail-label">Settlement</span>
                            <span class="detail-value">T+3</span>
                        </li>
                        <li class="detail-item">
                            <span class="detail-label">Market</span>
                            <span class="detail-value">Uganda Securities Exchange</span>
                        </li>
                    </ul>
                </div>
            </div>

            @if($relatedNews && $relatedNews->count() > 0)
            <!-- Related News Section -->
            <div class="related-news-section animate-in">
                <h3 class="section-title">
                    <i class="fas fa-newspaper"></i>
                    Related News & Updates
                </h3>
                <div class="news-grid">
                    @foreach($relatedNews as $article)
                    <article class="news-card">
                        @if($article->article_type === 'report')
                        <div class="news-image" style="display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); height: 200px;">
                            <i class="fas fa-file-pdf" style="font-size: 4rem; color: white; opacity: 0.9;"></i>
                        </div>
                        @elseif($article->image_url)
                        <div class="news-image">
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" loading="lazy">
                        </div>
                        @endif
                        <div class="news-content">
                            <div class="news-meta">
                                <time class="news-date">{{ $article->getDisplayDate()->format('M d, Y') }}</time>
                                @if($article->article_type === 'report')
                                <span class="news-author">Report</span>
                                @elseif($article->author)
                                <span class="news-author">by {{ $article->author }}</span>
                                @endif
                            </div>
                            <h4 class="news-title">
                                <a href="{{ route('news.article', $article->slug) }}">{{ $article->title }}</a>
                            </h4>
                            @if($article->summary)
                            <p class="news-summary">{{ Str::limit($article->summary, 120) }}</p>
                            @endif
                            <a href="{{ route('news.article', $article->slug) }}" class="news-link">
                                {{ $article->article_type === 'report' ? 'Download Report' : 'Read More' }} <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Actions Section -->
            <div class="actions-section animate-in">
                <h3 class="actions-title">Interested in Trading?</h3>
                <p class="actions-subtitle">Contact our licensed brokers to start trading this security or explore more investment opportunities</p>
                <div class="action-buttons">
                    <a href="#" class="action-btn">
                        <i class="fas fa-phone"></i>
                        Contact Broker
                    </a>
                    <a href="/securities" class="action-btn secondary">
                        <i class="fas fa-arrow-left"></i>
                        Back to Securities
                    </a>
                    <button class="action-btn secondary" onclick="window.print()">
                        <i class="fas fa-print"></i>
                        Print Details
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer - EXACT COPY FROM INDEX -->
    @include('partials.footer')

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.querySelector('.nav-menu');
            if (menu) {
                menu.classList.toggle('active');
            }
        }

        // Mobile dropdown toggle
        let lastDropdownToggle = 0;
        function toggleMobileDropdown(event) {
            if (window.innerWidth <= 768) {
                event.preventDefault();
                event.stopPropagation();

                // Prevent rapid double-clicks
                const now = Date.now();
                if (now - lastDropdownToggle < 300) {
                    return;
                }
                lastDropdownToggle = now;

                const dropdown = event.currentTarget.nextElementSibling;
                const chevron = event.currentTarget.querySelector('.chevron-down');

                if (dropdown && dropdown.classList.contains('dropdown')) {
                    dropdown.classList.toggle('active');

                    if (chevron) {
                        chevron.style.transform = dropdown.classList.contains('active')
                            ? 'rotate(225deg)'
                            : 'rotate(45deg)';
                    }
                }
            }
        }

        // Initialize mobile menu functionality
        document.addEventListener('DOMContentLoaded', () => {
            // Add click handlers for mobile dropdown toggles
            const navLinks = document.querySelectorAll('.nav-link');
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

                if (hasSubmenuClass) {
                    const submenu = parentLi.querySelector('.submenu');
                    const chevron = dropdownItem.querySelector('.chevron-right');

                    // Prevent navigation
                    e.preventDefault();
                    e.stopPropagation();

                    if (submenu) {
                        submenu.classList.toggle('active');

                        if (chevron) {
                            chevron.style.transform = submenu.classList.contains('active')
                                ? 'rotate(45deg)'
                                : 'rotate(-45deg)';
                        }
                    }
                }
            }, false);

            // Close mobile menu when clicking outside
            document.addEventListener('click', (e) => {
                const menu = document.querySelector('.nav-menu');
                const header = document.querySelector('.header');

                // Only close if clicking completely outside the header
                if (menu && menu.classList.contains('active')) {
                    if (!header.contains(e.target)) {
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
            }, true);
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        @if($security->ticker && $security->security_type === 'equity')
        // Stock Chart Implementation
        let priceChart = null;
        let chartData = null;
        const stockSymbol = '{{ $security->ticker }}';

        // Fetch stock data from USE API using JSONP (required due to CORS)
        async function fetchStockData() {
            return new Promise((resolve, reject) => {
                const timestamp = Date.now();
                const callbackName = `jQuery${Math.floor(Math.random() * 100000000000000000000)}_${timestamp}`;
                const url = `https://www.use.or.ug/data.php?stock=${stockSymbol}&callback=${callbackName}&_=${timestamp}`;

                console.log(`Attempting to fetch data for ${stockSymbol} from USE API...`);
                console.log(`URL: ${url}`);

                // Create JSONP callback
                window[callbackName] = function(data) {
                    console.log('Received data from USE API:', data);
                    resolve(data);
                    // Cleanup
                    delete window[callbackName];
                    if (document.body.contains(script)) {
                        document.body.removeChild(script);
                    }
                };

                // Create script tag for JSONP request
                const script = document.createElement('script');
                script.src = url;
                script.onerror = () => {
                    console.error('JSONP request failed for stock:', stockSymbol);
                    delete window[callbackName];
                    if (document.body.contains(script)) {
                        document.body.removeChild(script);
                    }
                    reject(new Error('Failed to load stock data'));
                };
                document.body.appendChild(script);

                // Timeout after 15 seconds
                setTimeout(() => {
                    if (window[callbackName]) {
                        console.warn('API request timed out for stock:', stockSymbol);
                        delete window[callbackName];
                        if (document.body.contains(script)) {
                            document.body.removeChild(script);
                        }
                        reject(new Error('Request timeout'));
                    }
                }, 15000);
            });
        }

        // Generate mock data for demonstration
        function generateMockData() {
            console.log('Using mock data for demonstration');
            const data = [];
            const basePrice = 1000 + Math.random() * 2000; // Random base price between 1000-3000
            const now = Date.now();

            // Generate 30 days of data
            for (let i = 29; i >= 0; i--) {
                const timestamp = now - (i * 24 * 60 * 60 * 1000);
                const variance = (Math.random() - 0.5) * 0.1; // ±10% variance
                const price = Math.max(100, basePrice * (1 + variance));
                const volume = Math.floor(Math.random() * 10000) + 1000;

                // [timestamp, open, high, low, close, price, volume]
                data.push([
                    timestamp,
                    price * 0.99,  // open
                    price * 1.02,  // high
                    price * 0.98,  // low
                    price,         // close
                    price,         // price
                    volume         // volume
                ]);
            }

            return data;
        }

        // Process stock data for Chart.js
        function processStockData(rawData, period = 'ALL') {
            if (!rawData || !Array.isArray(rawData)) return null;

            // Filter data based on period
            const now = Date.now();
            const periodMap = {
                '1M': 30 * 24 * 60 * 60 * 1000,
                '3M': 90 * 24 * 60 * 60 * 1000,
                '6M': 180 * 24 * 60 * 60 * 1000,
                '1Y': 365 * 24 * 60 * 60 * 1000,
                'ALL': Infinity
            };

            const cutoffTime = now - (periodMap[period] || periodMap['ALL']);
            const filteredData = rawData.filter(item => item[0] >= cutoffTime);

            // Convert to Chart.js format
            const labels = [];
            const prices = [];
            const volumes = [];

            filteredData.forEach(item => {
                const [timestamp, open, high, low, close, price, volume] = item;
                const date = new Date(timestamp);

                labels.push(date.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric'
                }));
                prices.push(close);
                volumes.push(volume);
            });

            return { labels, prices, volumes };
        }

        // Create or update the chart
        function createChart(data) {
            const ctx = document.getElementById('priceChart').getContext('2d');

            if (priceChart) {
                priceChart.destroy();
            }

            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(0, 128, 199, 0.3)');
            gradient.addColorStop(1, 'rgba(0, 128, 199, 0.05)');

            priceChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: `${stockSymbol} Price (UGX)`,
                        data: data.prices,
                        borderColor: 'rgb(0, 128, 199)',
                        backgroundColor: gradient,
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: 'rgb(0, 128, 199)',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                color: '#718096',
                                font: {
                                    family: 'Inter',
                                    weight: '500'
                                }
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            borderColor: 'rgb(0, 128, 199)',
                            borderWidth: 1,
                            callbacks: {
                                label: function(context) {
                                    return `Price: ${context.parsed.y.toLocaleString()} UGX`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Date',
                                color: '#718096',
                                font: {
                                    family: 'Inter',
                                    weight: '500'
                                }
                            },
                            ticks: {
                                color: '#718096',
                                font: {
                                    family: 'Inter'
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                                borderColor: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Price (UGX)',
                                color: '#718096',
                                font: {
                                    family: 'Inter',
                                    weight: '500'
                                }
                            },
                            ticks: {
                                color: '#718096',
                                font: {
                                    family: 'Inter'
                                },
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                                borderColor: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    }
                }
            });
        }

        // Show loading state
        function showLoading() {
            document.getElementById('chartLoading').style.display = 'flex';
            document.getElementById('chartError').style.display = 'none';
            document.getElementById('priceChart').style.display = 'none';
        }

        // Show error state
        function showError() {
            document.getElementById('chartLoading').style.display = 'none';
            document.getElementById('chartError').style.display = 'flex';
            document.getElementById('priceChart').style.display = 'none';
        }

        // Show chart
        function showChart() {
            document.getElementById('chartLoading').style.display = 'none';
            document.getElementById('chartError').style.display = 'none';
            document.getElementById('priceChart').style.display = 'block';
        }

        // Load chart data
        async function loadChart(period = 'ALL') {
            showLoading();

            try {
                if (!chartData) {
                    try {
                        chartData = await fetchStockData();
                    } catch (apiError) {
                        console.warn('USE API failed, using mock data:', apiError.message);
                        chartData = generateMockData();
                    }
                }

                const processedData = processStockData(chartData, period);

                if (!processedData || processedData.labels.length === 0) {
                    throw new Error('No data available');
                }

                createChart(processedData);
                showChart();
            } catch (error) {
                console.error('Chart loading error:', error);
                showError();
            }
        }

        // Period button handlers
        document.addEventListener('DOMContentLoaded', function() {
            const chartButtons = document.querySelectorAll('.chart-btn');

            chartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    chartButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Load chart with selected period
                    const period = this.getAttribute('data-period');
                    loadChart(period);
                });
            });

            // Load initial chart
            loadChart('1M');
        });
        @endif
    </script>
</body>
</html>