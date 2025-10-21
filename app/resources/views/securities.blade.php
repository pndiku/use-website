<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listed Securities - Uganda Securities Exchange</title>
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

        /* Dropdown Styles */
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
            overflow: visible;
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
            transition: all 0.3s ease;
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
            padding: 0.5rem 0.75rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.2s ease;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .submenu-item:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
            transform: translateX(4px);
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

        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 4rem 0;
            margin-bottom: 3rem;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
            letter-spacing: -0.03em;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.125rem;
            color: var(--text-secondary);
            max-width: 640px;
            margin: 0 auto;
            line-height: 1.7;
            font-weight: 400;
        }

        /* Enhanced Stats Grid */
        .stats-overview {
            margin-bottom: 4rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: var(--surface);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
            border-color: rgba(0, 128, 199, 0.2);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .stat-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            background: var(--gradient-primary);
            box-shadow: var(--shadow-md);
        }

        .stat-trend {
            background: rgba(39, 221, 90, 0.1);
            color: var(--use-green);
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            border: 1px solid rgba(39, 221, 90, 0.2);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stat-label {
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 1rem;
        }

        /* Market Performance Section */
        .market-performance {
            background: var(--surface);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            margin-bottom: 4rem;
        }

        .performance-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .performance-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .performance-title i {
            color: var(--use-blue);
        }

        .time-filters {
            display: flex;
            gap: 0.5rem;
            background: var(--surface-secondary);
            padding: 0.25rem;
            border-radius: 12px;
        }

        .time-filter {
            background: transparent;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .time-filter:hover {
            color: var(--text-primary);
            background: rgba(0, 128, 199, 0.05);
        }

        .time-filter.active {
            background: var(--use-blue);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .performance-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .performance-item {
            text-align: center;
            padding: 1.5rem;
            background: var(--surface-secondary);
            border-radius: 16px;
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .performance-item:hover {
            background: var(--surface);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .performance-label {
            font-size: 0.875rem;
            color: var(--text-tertiary);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .performance-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .performance-change {
            font-size: 0.875rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
        }

        .performance-change.positive {
            color: var(--use-green);
        }

        .performance-change.negative {
            color: var(--use-red);
        }

        /* Chart Container */
        .chart-container {
            background: var(--surface);
            border-radius: 16px;
            padding: 1.5rem;
            height: 300px;
            border: 1px solid var(--border);
        }

        /* Enhanced Search Section */
        .search-section {
            background: var(--surface);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            margin-bottom: 3rem;
        }

        .search-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .search-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .search-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
        }

        .search-container {
            position: relative;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: var(--surface-secondary);
            border: 2px solid var(--border);
            border-radius: 16px;
            font-size: 1rem;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--use-blue);
            box-shadow: 0 0 0 3px rgba(0, 128, 199, 0.1);
            background: var(--surface);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-tertiary);
            font-size: 1.125rem;
        }

        .filter-pills {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-pill {
            background: var(--surface-secondary);
            border: 2px solid var(--border);
            color: var(--text-secondary);
            padding: 0.75rem 1.5rem;
            border-radius: 24px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-pill:hover {
            background: var(--surface);
            color: var(--use-blue);
            border-color: var(--use-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .filter-pill.active {
            background: var(--use-blue);
            color: white;
            border-color: var(--use-blue);
            box-shadow: var(--shadow-lg);
        }

        /* Premium Securities Tables */
        .securities-section {
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: var(--use-blue);
        }

        .securities-table-container {
            background: var(--surface);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .securities-table-container:hover {
            box-shadow: var(--shadow-xl);
        }

        .table-header {
            background: var(--surface-secondary);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .table-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--text-secondary);
            padding: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn:hover {
            background: var(--use-blue);
            color: white;
            border-color: var(--use-blue);
        }

        .securities-table {
            width: 100%;
            border-collapse: collapse;
        }

        .securities-table th {
            background: var(--surface-secondary);
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-primary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--border);
        }

        .securities-table td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            color: var(--text-primary);
            font-weight: 500;
        }

        .securities-table tbody tr {
            transition: all 0.2s ease;
        }

        .securities-table tbody tr:hover {
            background: rgba(0, 128, 199, 0.02);
        }

        .securities-table tbody tr:last-child td {
            border-bottom: none;
        }

        .security-symbol {
            font-weight: 700;
            color: var(--use-blue);
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .security-symbol:hover {
            color: var(--use-blue-dark);
            text-decoration: underline;
        }

        .security-name {
            font-weight: 600;
            color: var(--text-primary);
        }

        .security-type-badge {
            background: rgba(0, 128, 199, 0.1);
            color: var(--use-blue);
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-block;
            border: 1px solid rgba(0, 128, 199, 0.2);
        }

        .rate-value {
            color: var(--use-green);
            font-weight: 600;
        }

        /* Footer - EXACT COPY FROM INDEX */
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
            background: linear-gradient(90deg, transparent, rgba(253, 185, 19, 0.5), transparent);
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
            width: 40px;
            height: 40px;
            background: rgba(0, 128, 199, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--use-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: rgba(0, 128, 199, 0.2);
            transform: translateY(-2px);
        }

        .footer-section h4 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            font-family: 'Titillium Web', sans-serif;
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
            color: var(--use-blue);
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

            .performance-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: calc(100% + 1rem);
                left: 1rem;
                right: 1rem;
                background: white;
                border-radius: 16px;
                box-shadow: var(--shadow-xl);
                border: 1px solid var(--border);
                padding: 1rem;
                flex-direction: column;
                gap: 0;
            }

            .nav-menu.active {
                display: flex;
            }

            .header {
                width: calc(100% - 1rem);
            }

            .nav-container {
                padding: 0 1rem;
                flex-wrap: wrap;
                height: auto;
                padding: 0.75rem 1rem;
            }

            .market-status {
                order: -1;
                margin-left: auto;
                margin-right: 0.5rem;
            }

            .container {
                padding: 0 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .stat-card {
                padding: 1.5rem;
            }

            .performance-grid {
                grid-template-columns: 1fr;
            }

            .filter-pills {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 0.5rem;
            }

            .filter-pill {
                flex-shrink: 0;
            }

            .securities-table th,
            .securities-table td {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            }

            .securities-table th:nth-child(n+4),
            .securities-table td:nth-child(n+4) {
                display: none;
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

        @media (max-width: 480px) {
            .main-content {
                padding-top: 6rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .securities-table th:nth-child(n+3),
            .securities-table td:nth-child(n+3) {
                display: none;
            }
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
    </style>
</head>
<body>
    <!-- Header - EXACT COPY FROM INDEX -->
    <header class="header" id="header">
        <nav class="nav-container">
            <div class="logo">USE</div>
            <div class="market-status">
                <span class="status-indicator {{ ($siteContent['market_status'] ?? 'open') == 'open' ? 'open' : 'closed' }}"></span>
                <span class="status-text">{{ ucfirst($siteContent['market_status'] ?? 'Market Open') }}</span>
                <span class="status-time">{{ $siteContent['trading_hours'] ?? '9:00 AM - 3:00 PM EAT' }}</span>
            </div>
            <ul class="nav-menu">
                @if(isset($menuItems))
                    @foreach($menuItems as $menuItem)
                        <li class="nav-item">
                            <a href="{{ $menuItem->url ?: '#' }}" class="nav-link {{ request()->is('securities') && str_contains(strtolower($menuItem->title), 'securit') ? 'active' : '' }}"
                               @if($menuItem->opens_new_tab) target="_blank" @endif
                               @if($menuItem->hasActiveChildren()) onclick="toggleMobileDropdown(event)" @endif>
                                @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                                {{ $menuItem->title }}
                                @if($menuItem->hasActiveChildren()) <span class="chevron-down"></span> @endif
                            </a>
                            @if($menuItem->hasActiveChildren())
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
                @else
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="/securities" class="nav-link active">Securities</a>
                    </li>
                    <li class="nav-item">
                        <a href="/annual-reports" class="nav-link">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                @endif
            </ul>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">☰</button>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            @php
                $equities = $securities->where('security_type', 'equity');
                $treasuryBonds = $securities->where('security_type', 'treasury_bond');
                $treasuryBills = $securities->where('security_type', 'treasury_bill');
                $totalSecurities = $securities->count();
            @endphp

            <!-- Hero Section -->
            <section class="hero-section animate-in">
                <h1 class="hero-title">Listed Securities</h1>
                <p class="hero-subtitle">Explore comprehensive data on all securities traded on the Uganda Securities Exchange with advanced filtering and real-time market insights</p>
            </section>

            <!-- Enhanced Stats Overview -->
            <section class="stats-overview animate-in-delay">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="stat-trend">+12.3%</div>
                        </div>
                        <div class="stat-value">{{ $totalSecurities }}</div>
                        <div class="stat-label">Total Securities</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="stat-trend">+5.7%</div>
                        </div>
                        <div class="stat-value">{{ $equities->count() }}</div>
                        <div class="stat-label">Equity Securities</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="stat-trend">+8.9%</div>
                        </div>
                        <div class="stat-value">{{ $treasuryBonds->count() }}</div>
                        <div class="stat-label">Treasury Bonds</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="stat-trend">+2.1%</div>
                        </div>
                        <div class="stat-value">{{ $treasuryBills->count() }}</div>
                        <div class="stat-label">Treasury Bills</div>
                    </div>
                </div>

                <!-- Market Performance -->
                <div class="market-performance">
                    <div class="performance-header">
                        <h2 class="performance-title">
                            <i class="fas fa-chart-area"></i>
                            Market Performance
                        </h2>
                        <div class="time-filters">
                            <button class="time-filter active">Live</button>
                            <button class="time-filter">1D</button>
                            <button class="time-filter">1W</button>
                            <button class="time-filter">1M</button>
                        </div>
                    </div>

                    <div class="performance-grid">
                        <div class="performance-item">
                            <div class="performance-label">Market Cap</div>
                            <div class="performance-value">UGX 8.2T</div>
                            <div class="performance-change positive">
                                +2.3% <i class="fas fa-arrow-up"></i>
                            </div>
                        </div>
                        <div class="performance-item">
                            <div class="performance-label">Volume Today</div>
                            <div class="performance-value">UGX 245M</div>
                            <div class="performance-change positive">
                                +15.7% <i class="fas fa-arrow-up"></i>
                            </div>
                        </div>
                        <div class="performance-item">
                            <div class="performance-label">USE Index</div>
                            <div class="performance-value">1,847.32</div>
                            <div class="performance-change positive">
                                +0.8% <i class="fas fa-arrow-up"></i>
                            </div>
                        </div>
                        <div class="performance-item">
                            <div class="performance-label">Active Securities</div>
                            <div class="performance-value">{{ $securities->where('is_active', true)->count() }}</div>
                            <div class="performance-change">
                                Live <i class="fas fa-circle" style="color: var(--use-green); font-size: 0.5rem;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="chart-container">
                        <canvas id="marketChart"></canvas>
                    </div>
                </div>
            </section>

            <!-- Enhanced Search Section -->
            <section class="search-section animate-in">
                <div class="search-header">
                    <h2 class="search-title">Explore Securities</h2>
                    <p class="search-subtitle">Search and filter through all listed securities with advanced tools</p>
                </div>

                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" id="searchInput" placeholder="Search by symbol, company name, or ISIN...">
                </div>

                <div class="filter-pills">
                    <button class="filter-pill active" data-filter="all">
                        <i class="fas fa-list"></i>
                        All Securities ({{ $totalSecurities }})
                    </button>
                    <button class="filter-pill" data-filter="equity">
                        <i class="fas fa-building"></i>
                        Equities ({{ $equities->count() }})
                    </button>
                    <button class="filter-pill" data-filter="treasury_bond">
                        <i class="fas fa-university"></i>
                        Treasury Bonds ({{ $treasuryBonds->count() }})
                    </button>
                    <button class="filter-pill" data-filter="treasury_bill">
                        <i class="fas fa-file-invoice-dollar"></i>
                        Treasury Bills ({{ $treasuryBills->count() }})
                    </button>
                </div>
            </section>

            <!-- Equities Section -->
            @if($equities->count() > 0)
            <section class="securities-section animate-in" data-section="equity">
                <h2 class="section-title">
                    <i class="fas fa-building"></i>
                    Equity Securities
                </h2>
                <div class="securities-table-container">
                    <div class="table-header">
                        <h3 class="table-title">Listed Companies</h3>
                        <div class="table-actions">
                            <button class="action-btn" title="Download"><i class="fas fa-download"></i></button>
                            <button class="action-btn" title="Filter"><i class="fas fa-filter"></i></button>
                            <button class="action-btn" title="Sort"><i class="fas fa-sort"></i></button>
                        </div>
                    </div>
                    <table class="securities-table">
                        <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Company Name</th>
                                <th>Type</th>
                                <th>ISIN</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equities as $security)
                            <tr>
                                <td>
                                    @if($security->ticker)
                                        <a href="/securities/{{ $security->ticker }}" class="security-symbol">{{ $security->ticker }}</a>
                                    @else
                                        <span class="security-symbol">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="security-name">{{ $security->company_name ?: 'N/A' }}</span>
                                </td>
                                <td>
                                    <span class="security-type-badge">Equity</span>
                                </td>
                                <td>{{ $security->isin ?: 'N/A' }}</td>
                                <td>
                                    <span class="security-type-badge" style="background: rgba(39, 221, 90, 0.1); color: var(--use-green); border-color: rgba(39, 221, 90, 0.2);">
                                        Active
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            @endif

            <!-- Treasury Bonds Section -->
            @if($treasuryBonds->count() > 0)
            <section class="securities-section animate-in" data-section="treasury_bond">
                <h2 class="section-title">
                    <i class="fas fa-university"></i>
                    Treasury Bonds
                </h2>
                <div class="securities-table-container">
                    <div class="table-header">
                        <h3 class="table-title">Government Bonds</h3>
                        <div class="table-actions">
                            <button class="action-btn" title="Download"><i class="fas fa-download"></i></button>
                            <button class="action-btn" title="Filter"><i class="fas fa-filter"></i></button>
                            <button class="action-btn" title="Sort"><i class="fas fa-sort"></i></button>
                        </div>
                    </div>
                    <table class="securities-table">
                        <thead>
                            <tr>
                                <th>ISIN</th>
                                <th>Issuer</th>
                                <th>Interest Rate</th>
                                <th>Issue Date</th>
                                <th>Maturity Date</th>
                                <th>Currency</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($treasuryBonds as $security)
                            <tr>
                                <td>
                                    @if($security->isin)
                                        <a href="/securities/{{ $security->isin }}" class="security-symbol">{{ $security->isin }}</a>
                                    @else
                                        <span class="security-symbol">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="security-name">{{ $security->issuer_name ?: 'Government of Uganda' }}</span>
                                </td>
                                <td>
                                    @if($security->rate)
                                        <span class="rate-value">{{ number_format($security->rate, 2) }}%</span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $security->issue_date ? $security->issue_date->format('M d, Y') : 'N/A' }}</td>
                                <td>{{ $security->maturity_date ? $security->maturity_date->format('M d, Y') : 'N/A' }}</td>
                                <td>{{ $security->currency }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            @endif

            <!-- Treasury Bills Section -->
            @if($treasuryBills->count() > 0)
            <section class="securities-section animate-in" data-section="treasury_bill">
                <h2 class="section-title">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Treasury Bills
                </h2>
                <div class="securities-table-container">
                    <div class="table-header">
                        <h3 class="table-title">Government Bills</h3>
                        <div class="table-actions">
                            <button class="action-btn" title="Download"><i class="fas fa-download"></i></button>
                            <button class="action-btn" title="Filter"><i class="fas fa-filter"></i></button>
                            <button class="action-btn" title="Sort"><i class="fas fa-sort"></i></button>
                        </div>
                    </div>
                    <table class="securities-table">
                        <thead>
                            <tr>
                                <th>ISIN</th>
                                <th>Issuer</th>
                                <th>Interest Rate</th>
                                <th>Issue Date</th>
                                <th>Maturity Date</th>
                                <th>Currency</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($treasuryBills as $security)
                            <tr>
                                <td>
                                    @if($security->isin)
                                        <a href="/securities/{{ $security->isin }}" class="security-symbol">{{ $security->isin }}</a>
                                    @else
                                        <span class="security-symbol">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="security-name">{{ $security->issuer_name ?: 'Government of Uganda' }}</span>
                                </td>
                                <td>
                                    @if($security->rate)
                                        <span class="rate-value">{{ number_format($security->rate, 2) }}%</span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $security->issue_date ? $security->issue_date->format('M d, Y') : 'N/A' }}</td>
                                <td>{{ $security->maturity_date ? $security->maturity_date->format('M d, Y') : 'N/A' }}</td>
                                <td>{{ $security->currency }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            @endif

            @if($totalSecurities === 0)
            <div class="empty-state">
                <div class="empty-icon">📊</div>
                <div class="empty-message">No Securities Available</div>
                <div class="empty-description">There are currently no securities listed on the exchange.</div>
            </div>
            @endif
        </div>
    </main>

    <!-- Footer - EXACT COPY FROM INDEX -->
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
                        <a href="#" class="footer-link">About USE</a>
                        <a href="#" class="footer-link">How to Invest</a>
                        <a href="#" class="footer-link">Listed Securities</a>
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
                        <a href="mailto:info@use.co.ug" class="footer-link">
                            <i class="fas fa-envelope"></i> info@use.co.ug
                        </a>
                        <a href="tel:+256414230738" class="footer-link">
                            <i class="fas fa-phone"></i> +256 414 230 738
                        </a>
                        <div class="footer-link">
                            <i class="fas fa-map-marker-alt"></i>
                            Uganda Securities Exchange, Plot 24/26 Kampala Road, Kampala, Uganda
                        </div>
                        <div class="footer-link">
                            <i class="fas fa-clock"></i>
                            Trading Hours: 9:00 AM - 3:00 PM EAT
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
        // Header scroll effect from index
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle from index
        function toggleMobileMenu() {
            const menu = document.querySelector('.nav-menu');
            menu.classList.toggle('active');
        }

        // Initialize chart
        function initChart() {
            const ctx = document.getElementById('marketChart').getContext('2d');

            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(0, 128, 199, 0.3)');
            gradient.addColorStop(1, 'rgba(0, 128, 199, 0.05)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00'],
                    datasets: [{
                        label: 'USE Index',
                        data: [1840, 1845, 1842, 1850, 1847, 1852, 1847],
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
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                                borderColor: 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                color: '#718096'
                            }
                        },
                        y: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                                borderColor: 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                color: '#718096'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });
        }

        // Enhanced Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterPills = document.querySelectorAll('.filter-pill');
            const sections = document.querySelectorAll('.securities-section');
            const searchInput = document.getElementById('searchInput');
            const timeFilters = document.querySelectorAll('.time-filter');

            let currentFilter = 'all';
            let currentSearch = '';

            // Filter functionality
            filterPills.forEach(pill => {
                pill.addEventListener('click', function() {
                    currentFilter = this.getAttribute('data-filter');

                    filterPills.forEach(p => p.classList.remove('active'));
                    this.classList.add('active');

                    applyFilters();
                });
            });

            // Search functionality
            searchInput.addEventListener('input', function() {
                currentSearch = this.value.toLowerCase();
                applyFilters();
            });

            // Time filter functionality
            timeFilters.forEach(filter => {
                filter.addEventListener('click', function() {
                    timeFilters.forEach(f => f.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            function applyFilters() {
                sections.forEach(section => {
                    const sectionType = section.getAttribute('data-section');
                    const rows = section.querySelectorAll('tbody tr');
                    let visibleRows = 0;

                    let sectionVisible = currentFilter === 'all' || sectionType === currentFilter;

                    if (sectionVisible) {
                        rows.forEach(row => {
                            const symbolCell = row.querySelector('.security-symbol');
                            const nameCell = row.querySelector('.security-name');
                            const cells = row.querySelectorAll('td');

                            const symbol = symbolCell ? symbolCell.textContent.toLowerCase() : '';
                            const name = nameCell ? nameCell.textContent.toLowerCase() : '';
                            const allText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');

                            const searchMatch = currentSearch === '' ||
                                symbol.includes(currentSearch) ||
                                name.includes(currentSearch) ||
                                allText.includes(currentSearch);

                            const shouldShow = searchMatch;
                            row.style.display = shouldShow ? '' : 'none';

                            if (shouldShow) visibleRows++;
                        });

                        section.style.display = visibleRows > 0 ? 'block' : 'none';
                    } else {
                        section.style.display = 'none';
                    }
                });
            }

            // Initialize chart and filters
            initChart();
            applyFilters();
        });
    </script>
</body>
</html>