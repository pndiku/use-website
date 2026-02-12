<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uganda Securities Exchange - Your Ultimate Gateway to Uganda's financial market</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700&display=swap" rel="stylesheet">
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
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 220px;
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border);
            padding: 0.5rem;
            margin-top: 0.5rem;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s, visibility 0.2s;
            z-index: 1000;
            list-style: none;
        }

        .nav-item:hover > .dropdown {
            opacity: 1;
            visibility: visible;
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
        }

        .dropdown-item:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
        }

        .chevron-right {
            display: inline-block;
            width: 6px;
            height: 6px;
            border-right: 2px solid currentColor;
            border-bottom: 2px solid currentColor;
            transform: rotate(-45deg);
            transition: all 0.2s ease;
            opacity: 0.7;
            margin-left: auto;
            float: right;
        }

        .has-submenu > .dropdown-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .submenu {
            position: absolute;
            left: 100%;
            top: 0;
            background: white;
            min-width: 200px;
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border);
            padding: 0.5rem;
            margin-left: 5px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s, visibility 0.2s;
            z-index: 1001;
            list-style: none;
        }

        .dropdown > li.has-submenu:hover > .submenu {
            opacity: 1;
            visibility: visible;
        }

        .submenu > li {
            list-style: none;
        }

        .submenu-item {
            display: block;
            padding: 0.625rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .submenu-item:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
            transform: translateX(4px);
        }

        .mobile-menu-btn {
            display: none;
            background: var(--use-blue);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
        }

        /* Mobile Menu Overlay */
        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            display: none;
        }

        @media (max-width: 1024px) {
            .mobile-menu-overlay {
                display: block;
            }
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Mobile Menu Drawer */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 400px;
            height: 100vh;
            background: white;
            z-index: 10000;
            transition: right 0.3s ease;
            overflow-y: auto;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.3);
            display: none;
        }

        @media (max-width: 1024px) {
            .mobile-menu {
                display: block;
            }
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 2px solid var(--border);
            background: white;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .mobile-menu-logo {
            height: 45px;
            width: auto;
        }

        .mobile-menu-close {
            background: var(--surface-secondary);
            border: none;
            font-size: 1.5rem;
            color: var(--text-primary);
            cursor: pointer;
            padding: 0;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 300;
            line-height: 1;
        }

        .mobile-menu-close:hover {
            background: var(--use-blue);
            color: white;
        }

        .mobile-menu-list {
            list-style: none;
            padding: 0.5rem 0;
            margin: 0;
        }

        .mobile-menu-item {
            border-bottom: 1px solid var(--border-light);
        }

        .mobile-menu-item:last-child {
            border-bottom: none;
        }

        .mobile-menu-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            color: var(--text-primary);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .mobile-menu-link:hover {
            background: var(--surface-secondary);
            color: var(--use-blue);
        }

        .mobile-menu-link.has-children {
            cursor: pointer;
        }

        .mobile-chevron {
            font-size: 0.75rem;
            transition: transform 0.3s ease;
            margin-left: auto;
        }

        .mobile-menu-link.active .mobile-chevron {
            transform: rotate(180deg);
        }

        .mobile-submenu {
            list-style: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: var(--surface-secondary);
        }

        .mobile-submenu.active {
            max-height: 1000px;
        }

        .mobile-submenu-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.875rem 1.5rem 0.875rem 2.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .mobile-submenu-link:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
        }

        .mobile-submenu-link.has-children {
            cursor: pointer;
        }

        .mobile-grandsubmenu {
            list-style: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: var(--surface-tertiary);
        }

        .mobile-grandsubmenu.active {
            max-height: 1000px;
        }

        .mobile-grandsubmenu-link {
            display: block;
            padding: 0.75rem 1.5rem 0.75rem 3.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .mobile-grandsubmenu-link:hover {
            background: rgba(0, 128, 199, 0.05);
            color: var(--use-blue);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.3) 100%);
            z-index: 1;
        }

        .hero-carousel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .hero-carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .hero-carousel-slide.active {
            opacity: 1;
        }

        .hero-carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            backdrop-filter: blur(10px);
        }

        .hero-carousel-nav:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-50%) scale(1.1);
        }

        .hero-carousel-nav.prev {
            left: 2rem;
        }

        .hero-carousel-nav.next {
            right: 2rem;
        }

        .hero-carousel-controls {
            position: absolute;
            bottom: 5rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 10;
        }

        .hero-carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .hero-carousel-dot.active {
            background: white;
            border-color: white;
            transform: scale(1.2);
        }

        .hero-container {
            max-width: 1200px;
            width: 100%;
            padding: 2rem;
            padding-left: calc((100% - 1200px) / 2 + 2rem);
            position: relative;
            z-index: 2;
            text-align: left;
        }

        .hero-content {
            max-width: 700px;
            margin: 0;
        }

        .hero-tag {
            color: white;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-title .highlight {
            color: var(--use-yellow);
        }

        .hero-description {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .hero-button {
            display: inline-block;
            background: var(--use-blue);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-lg);
        }

        .hero-button:hover {
            background: var(--use-blue-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        /* Market Ticker */
        .market-ticker {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: var(--use-blue-light);
            padding: 0.75rem 0;
            overflow: hidden;
            z-index: 3;
        }

        .ticker-content {
            display: inline-flex;
            flex-wrap: nowrap;
            width: max-content;
            min-width: 100%;
            animation: scroll 60s linear infinite;
            gap: 3rem;
            white-space: nowrap;
        }

        .ticker-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
            flex: 0 0 auto;
            color: #1a202c;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .ticker-symbol {
            font-weight: 700;
            color: white;
        }

        .ticker-price {
            color: #E6E9ED;
        }

        .ticker-change {
            font-size: 0.75rem;
        }

        .ticker-change.positive {
            color: #3AD07A;
        }

        .ticker-change.negative {
            color: #FF5C5C;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Market Stats Section */
        .market-stats {
            background: #003d5c;
            padding: 3rem 2rem;
        }

        .market-stats-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .stats-main {
            background: #002438;
            padding: 2rem;
            border-radius: 12px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 1.5rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            color: white;
            font-size: 2rem;
            font-weight: 700;
        }

        .stat-footer {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .stat-footer .highlight {
            color: var(--use-yellow);
            font-weight: 700;
        }

        .movers-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .movers-section {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
        }

        .movers-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .movers-icon {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .movers-icon.positive {
            background: var(--use-green);
        }

        .movers-icon.negative {
            background: var(--use-red);
        }

        .movers-title {
            font-size: 1rem;
            font-weight: 700;
            color: #1a202c;
        }

        .movers-list {
            list-style: none;
        }

        .mover-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-light);
        }

        .mover-item:last-child {
            border-bottom: none;
        }

        .mover-symbol {
            font-weight: 700;
            color: #1a202c;
            font-size: 0.875rem;
        }

        .mover-company {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        .mover-price {
            text-align: right;
        }

        .mover-value {
            font-weight: 700;
            color: #1a202c;
            font-size: 0.875rem;
        }

        .mover-change {
            font-size: 0.75rem;
            font-weight: 600;
        }

        .mover-change.positive {
            color: var(--use-green);
        }

        .mover-change.negative {
            color: var(--use-red);
        }

        /* News Section */
        .news-section {
            padding: 5rem 2rem;
            background: var(--surface-secondary);
        }

        .news-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            margin-bottom: 3rem;
        }

        .section-tag {
            color: var(--use-blue);
            font-size: 0.875rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .section-description {
            font-size: 1.125rem;
            color: var(--text-secondary);
        }

        .news-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .news-featured {
            background: #003d5c;
            border-radius: 16px;
            overflow: hidden;
            color: white;
            position: relative;
            min-height: 450px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2rem;
            background-size: cover;
            background-position: center;
        }

        .news-featured::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
            z-index: 1;
        }

        .news-featured-content {
            position: relative;
            z-index: 2;
        }

        .news-tag {
            display: inline-block;
            background: var(--use-blue);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }

        .news-featured-title {
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .news-featured-meta {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .news-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .news-item {
            display: flex;
            gap: 1rem;
            background: white;
            padding: 1rem;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .news-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .news-item-image {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            background-size: cover;
            background-position: center;
            flex-shrink: 0;
        }

        .news-item-content {
            flex: 1;
        }

        .news-item-tag {
            color: var(--use-blue);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 0.25rem;
        }

        .news-item-title {
            font-size: 0.975rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.25rem;
            line-height: 1.4;
        }

        .news-item-meta {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        /* Events Section */
        .events-section {
            padding: 5rem 2rem;
            background: white;
        }

        .events-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .event-card {
            background: white;
            border: 2px solid var(--border-light);
            border-radius: 12px;
            overflow: hidden;
            padding: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            display: block;
        }

        .event-card:hover {
            border-color: var(--use-blue);
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .event-image {
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .event-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.3) 100%);
        }

        .event-date-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--use-blue);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 700;
            box-shadow: var(--shadow-md);
            z-index: 2;
        }

        .event-content {
            padding: 1rem 1.5rem 1.5rem 1.5rem;
        }

        .event-date-icon {
            width: 60px;
            height: 60px;
            background: var(--surface-secondary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .event-date-icon i {
            font-size: 1.5rem;
            color: var(--use-blue);
        }

        .event-date {
            font-size: 0.875rem;
            color: var(--use-blue);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .event-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .event-description {
            font-size: 0.875rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .event-location {
            font-size: 0.8rem;
            color: var(--text-secondary);
            margin-top: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .event-location i {
            color: var(--use-blue);
        }

        /* Info Cards Section */
        .info-cards-section {
            padding: 5rem 2rem;
            background: var(--surface-secondary);
        }

        .info-cards-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .info-cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .info-card {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 16px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .info-card-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: var(--surface-secondary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-card-icon i {
            font-size: 2rem;
            color: var(--use-blue);
        }

        .info-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1rem;
        }

        .info-card-description {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        /* Newsletter Section */
        .newsletter-section {
            background: #003d5c;
            padding: 4rem 2rem;
        }

        .newsletter-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .newsletter-title {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .newsletter-description {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            font-family: 'Titillium Web', sans-serif;
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .newsletter-input:focus {
            outline: none;
            border-color: var(--use-yellow);
            background: rgba(255, 255, 255, 0.15);
        }

        .newsletter-button {
            padding: 1rem 2.5rem;
            background: var(--use-blue);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Titillium Web', sans-serif;
        }

        .newsletter-button:hover {
            background: var(--use-blue-dark);
            transform: translateY(-2px);
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
        @media (max-width: 1240px) {
            .hero-container {
                padding-left: 2rem;
            }
        }

        @media (max-width: 1024px) {
            .nav-menu {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .market-status {
                display: none;
            }

            .header {
                width: calc(100% - 1rem);
            }

            .nav-container {
                padding: 0 1rem;
            }

            .logo img {
                height: 50px;
            }

            .market-stats-container {
                grid-template-columns: 1fr;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .info-cards-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .header {
                width: calc(100% - 0.5rem);
                top: 0.5rem;
            }

            .nav-container {
                padding: 0 0.75rem;
                height: 56px;
            }

            .logo img {
                height: 45px;
            }

            .mobile-menu-btn {
                padding: 0.4rem 0.8rem;
                font-size: 1.1rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .movers-container {
                grid-template-columns: 1fr;
            }

            .events-grid {
                grid-template-columns: 1fr;
            }

            .newsletter-form {
                flex-direction: column;
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
    <section class="hero {{ $carouselImages && $carouselImages->count() > 0 ? '' : 'no-carousel' }}"
             @if($carouselImages && $carouselImages->count() === 1)
             style="background-image: url('{{ $carouselImages->first()->image_url }}');"
             @elseif(!$carouselImages || $carouselImages->count() === 0)
             style="background-image: url('/images/hero-agriculture.jpg');"
             @endif>

        @if($carouselImages && $carouselImages->count() > 1)
        <div class="hero-carousel">
            @foreach($carouselImages as $index => $slide)
            <div class="hero-carousel-slide {{ $index === 0 ? 'active' : '' }}"
                 style="background-image: url('{{ $slide->image_url }}');"
                 data-slide="{{ $index }}">
            </div>
            @endforeach
        </div>

        <button style="display: none;" class="hero-carousel-nav prev" onclick="prevSlide()">‹</button>
        <button style="display: none;" class="hero-carousel-nav next" onclick="nextSlide()">›</button>

        <div class="hero-carousel-controls">
            @foreach($carouselImages as $index => $slide)
            <button class="hero-carousel-dot {{ $index === 0 ? 'active' : '' }}"
                    onclick="goToSlide({{ $index }})"
                    data-slide="{{ $index }}"></button>
            @endforeach
        </div>
        @endif

        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-tag">Welcome to the USE</div>
                <h1 class="hero-title">
                    Your <span class="highlight"> Ultimate Gateway </span> to Uganda's financial market
                </h1>
                <p class="hero-description">
                    To be Uganda's preferred institution for investments and sourcing of capital
                </p>
                <a href="/about" class="hero-button">Explore the USE</a>
            </div>
        </div>

        <!-- Market Ticker -->
        <div class="market-ticker">
            <div class="ticker-content" id="tickerContent">
                <!-- Will be populated by JavaScript -->
                <div class="ticker-item">
                    <span class="ticker-symbol">MARKET INFO</span>
                    <span class="ticker-price">Loading...</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Market Stats Section -->
    <section class="market-stats">
        <div class="market-stats-container">
            <div class="stats-main">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-label">Total Volume</div>
                        <div class="stat-value" id="totalVolume">_</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Trades</div>
                        <div class="stat-value" id="totalTrades">_</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Index Daily</div>
                        <div class="stat-value" id="indexDaily">_</div>
                    </div>
                </div>
                <div class="stat-footer">
                    The <span class="highlight">total volume</span> traded on the USE yesterday is <span class="highlight">_</span>
                </div>
            </div>

            @if($showMarketMovers)
            <div class="movers-container">
                <div class="movers-section">
                    <div class="movers-header">
                        <span class="movers-icon positive"></span>
                        <h3 class="movers-title">Top Gainers</h3>
                    </div>
                    <ul class="movers-list" id="topGainers">
                        <li class="mover-item">
                            <div class="mover-symbol">Loading...</div>
                        </li>
                    </ul>
                </div>

                <div class="movers-section">
                    <div class="movers-header">
                        <span class="movers-icon negative"></span>
                        <h3 class="movers-title">Top Losers</h3>
                    </div>
                    <ul class="movers-list" id="topLosers">
                        <li class="mover-item">
                            <div class="mover-symbol">Loading...</div>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="movers-container">
                <div class="movers-section" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                    <div style="color: rgba(255, 255, 255, 0.8); font-size: 1rem;">
                        <i class="fas fa-clock" style="font-size: 2rem; margin-bottom: 1rem; display: block; color: var(--use-yellow);"></i>
                        <strong style="display: block; margin-bottom: 0.5rem; font-size: 1.125rem; color: white;">Market Movers Available After Close</strong>
                        Top gainers and losers will be displayed after 1:00 PM EAT when the market closes.
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section">
        <div class="news-container">
            <div class="section-header">
                <div class="section-tag">Latest</div>
                <h2 class="section-title">Latest from the USE</h2>
                <p class="section-description">
                    From announcements and market updates to in-depth interviews<br>
                    with company leaders—stay informed with the latest from the USE.
                </p>
            </div>

            <div class="news-grid">
                @if($latestNews && $latestNews->count() > 0)

                    <a href="{{ route('news.article', $latestNews->first()->slug) }}" style="text-decoration: none;">
                    <div class="news-featured" style="background-image: url('{{ $latestNews->first()->image_url ?? '/images/news-placeholder.jpg' }}');">
                        <div class="news-featured-content">
                            <span class="news-tag">{{ $latestNews->first()->article_type === 'report' ? 'REPORT' : 'MARKET UPDATE' }}</span>
                            <h3 class="news-featured-title">{{ $latestNews->first()->title }}</h3>
                            <div class="news-featured-meta">
                                {{ $latestNews->first()->article_type === 'report' ? 'REPORTS' : 'UPDATES' }} • {{ $latestNews->first()->getDisplayDate()->format('d M Y') }}
                            </div>
                        </div>
                    </div>
    </a>

                    <div class="news-list">
                        @foreach($latestNews->skip(1)->take(3) as $article)
                            <a href="{{ route('news.article', $article->slug) }}" class="news-item">
                                @if($article->image_url)
                                    <div class="news-item-image" style="background-image: url('{{ $article->image_url }}');"></div>
                                @else
                                    <div class="news-item-image" style="background: var(--surface-tertiary);"></div>
                                @endif
                                <div class="news-item-content">
                                    <div class="news-item-tag">{{ $article->article_type === 'report' ? 'REPORTS' : 'UPDATES' }}</div>
                                    <h4 class="news-item-title">{{ Str::limit($article->title, 80) }}</h4>
                                    <div class="news-item-meta">{{ $article->getDisplayDate()->format('d M Y') }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="news-featured">
                        <div class="news-featured-content">
                            <span class="news-tag">CSE-WISE</span>
                            <h3 class="news-featured-title">Unlocking Value in a Tier 1 Jurisdiction</h3>
                            <div class="news-featured-meta">USE-CORPORATE / REPORTS • 8 NOV 2025</div>
                        </div>
                    </div>
                    <div class="news-list">
                        <div class="news-item">
                            <div class="news-item-image" style="background: var(--surface-tertiary);"></div>
                            <div class="news-item-content">
                                <div class="news-item-tag">USE-CORPORATE / UPDATES</div>
                                <h4 class="news-item-title">Market Updates</h4>
                                <div class="news-item-meta">8 NOV 2025</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section class="events-section">
        <div class="events-container">
            <div class="section-header">
                <div class="section-tag">Events</div>
                <h2 class="section-title">Meet us at upcoming events</h2>
                <p class="section-description">
                    Connect with our professionals and trading experts at industry events and conferences.
                </p>
            </div>

            <div class="events-grid">
                @if($upcomingEvents && $upcomingEvents->count() > 0)
                    @foreach($upcomingEvents as $event)
                        <a href="{{ route('event.show', $event->id) }}" class="event-card" style="text-decoration: none; color: inherit;">
                            @if($event->image_url)
                                <div class="event-image" style="background-image: url('{{ $event->image_url }}');">
                                    <div class="event-date-badge">
                                        {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}
                                    </div>
                                </div>
                            @endif

                            <div class="event-content">
                                @if(!$event->image_url)
                                    <div class="event-date-icon">
                                        <i class="far fa-calendar"></i>
                                    </div>
                                    <div class="event-date">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</div>
                                @endif
                                <h3 class="event-title">{{ $event->title }}</h3>
                                <p class="event-description">{{ Str::limit($event->description, 100) }}</p>
                                @if($event->location)
                                    <div class="event-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $event->location }}</span>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="event-card">
                        <div class="event-date-icon">
                            <i class="far fa-calendar"></i>
                        </div>
                        <div class="event-date">Nov 4 - 5, 2025</div>
                        <h3 class="event-title">Red Cloud Fall Mining Showcase Life of a party</h3>
                        <p class="event-description">Connect with industry leaders and explore investment opportunities.</p>
                    </div>
                    <div class="event-card">
                        <div class="event-date-icon">
                            <i class="far fa-calendar"></i>
                        </div>
                        <div class="event-date">Nov 4 - 5, 2025</div>
                        <h3 class="event-title">Blue Crux Fall Mining Showcase Life of a party</h3>
                        <p class="event-description">Network with professionals at this premier mining event.</p>
                    </div>
                    <div class="event-card">
                        <div class="event-date-icon">
                            <i class="far fa-calendar"></i>
                        </div>
                        <div class="event-date">Nov 4 - 5, 2025</div>
                        <h3 class="event-title">Red Cloud Fall Mining Showcase Life of a party</h3>
                        <p class="event-description">Discover new opportunities in Uganda's growing markets.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Info Cards Section -->
    <section class="info-cards-section">
        <div class="info-cards-container">
            <div class="section-header">
                <h2 class="section-title">Stay informed about</h2>
                <p class="section-description">
                    Whether you're an investor, business leader, or simply looking to learn<br>
                    more, start your journey with the USE here.
                </p>
            </div>

            <div class="info-cards-grid">
                <a href="/listings/how-to-list" style="text-decoration: none;">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-list-ul"></i>
                    </div>
                    <h3 class="info-card-title">Listings on the USE</h3>
                    <p class="info-card-description">
                        Learn more about the opportunities we list and how to get started trading on the USE.
                    </p>
                </div>
    </a>

    <a href="/market-statistics/market-snapshot" style="text-decoration: none;">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="info-card-title">Insights on Listed Companies</h3>
                    <p class="info-card-description">
                        Learn more about the companies we list and how to get started trading on the USE.
                    </p>
                </div>
    </a>

    <a href="/scd/services/easy-portal" style="text-decoration: none;">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="info-card-title">Trading on the USE</h3>
                    <p class="info-card-description">
                        Learn how we help connect providers and investors making opportunities for all.
                    </p>
                </div>
            </div>
        </div>

    </a>

    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="newsletter-container">
            <h2 class="newsletter-title">Stay informed on Uganda's Stock & Securities markets.</h2>
            <p class="newsletter-description">Get the latest updates delivered to your inbox.</p>
            <form action="/subscribe" method="POST" class="newsletter-form">
                @csrf
                <input type="email" name="email" class="newsletter-input" placeholder="Email address *" required>
                <button type="submit" class="newsletter-button">Subscribe</button>
            </form>
        </div>
    </section>

    @include('partials.footer')

    <!-- ReconnectingWebSocket Library -->
    <script>
        !function(a,b){"function"==typeof define&&define.amd?define([],b):"undefined"!=typeof module&&module.exports?module.exports=b():a.ReconnectingWebSocket=b()}(this,function(){function a(b,c,d){function l(a,b){var c=document.createEvent("CustomEvent");return c.initCustomEvent(a,!1,!1,b),c}var e={debug:!1,automaticOpen:!0,reconnectInterval:1e3,maxReconnectInterval:3e4,reconnectDecay:1.5,timeoutInterval:2e3};d||(d={});for(var f in e)this[f]="undefined"!=typeof d[f]?d[f]:e[f];this.url=b,this.reconnectAttempts=0,this.readyState=WebSocket.CONNECTING,this.protocol=null;var h,g=this,i=!1,j=!1,k=document.createElement("div");k.addEventListener("open",function(a){g.onopen(a)}),k.addEventListener("close",function(a){g.onclose(a)}),k.addEventListener("connecting",function(a){g.onconnecting(a)}),k.addEventListener("message",function(a){g.onmessage(a)}),k.addEventListener("error",function(a){g.onerror(a)}),this.addEventListener=k.addEventListener.bind(k),this.removeEventListener=k.removeEventListener.bind(k),this.dispatchEvent=k.dispatchEvent.bind(k),this.open=function(b){h=new WebSocket(g.url,c||[]),b||k.dispatchEvent(l("connecting")),(g.debug||a.debugAll)&&console.debug("ReconnectingWebSocket","attempt-connect",g.url);var d=h,e=setTimeout(function(){(g.debug||a.debugAll)&&console.debug("ReconnectingWebSocket","connection-timeout",g.url),j=!0,d.close(),j=!1},g.timeoutInterval);h.onopen=function(){clearTimeout(e),(g.debug||a.debugAll)&&console.debug("ReconnectingWebSocket","onopen",g.url),g.protocol=h.protocol,g.readyState=WebSocket.OPEN,g.reconnectAttempts=0;var d=l("open");d.isReconnect=b,b=!1,k.dispatchEvent(d)},h.onclose=function(c){if(clearTimeout(e),h=null,i)g.readyState=WebSocket.CLOSED,k.dispatchEvent(l("close"));else{g.readyState=WebSocket.CONNECTING;var d=l("connecting");d.code=c.code,d.reason=c.reason,d.wasClean=c.wasClean,k.dispatchEvent(d),b||j||((g.debug||a.debugAll)&&console.debug("ReconnectingWebSocket","onclose",g.url),k.dispatchEvent(l("close")));var e=g.reconnectInterval*Math.pow(g.reconnectDecay,g.reconnectAttempts);setTimeout(function(){g.reconnectAttempts++,g.open(!0)},e>g.maxReconnectInterval?g.maxReconnectInterval:e)}},h.onmessage=function(b){(g.debug||a.debugAll)&&console.debug("ReconnectingWebSocket","onmessage",g.url,b.data);var c=l("message");c.data=b.data,k.dispatchEvent(c)},h.onerror=function(b){(g.debug||a.debugAll)&&console.debug("ReconnectingWebSocket","onerror",g.url,b),k.dispatchEvent(l("error"))}},1==this.automaticOpen&&this.open(!1),this.send=function(b){if(h)return(g.debug||a.debugAll)&&console.debug("ReconnectingWebSocket","send",g.url,b),h.send(b);throw"INVALID_STATE_ERR : Pausing to reconnect websocket"},this.close=function(a,b){"undefined"==typeof a&&(a=1e3),i=!0,h&&h.close(a,b)},this.refresh=function(){h&&h.close()}}return a.prototype.onopen=function(){},a.prototype.onclose=function(){},a.prototype.onconnecting=function(){},a.prototype.onmessage=function(){},a.prototype.onerror=function(){},a.debugAll=!1,a.CONNECTING=WebSocket.CONNECTING,a.OPEN=WebSocket.OPEN,a.CLOSING=WebSocket.CLOSING,a.CLOSED=WebSocket.CLOSED,a});
        console.log('ReconnectingWebSocket library loaded');
    </script>

    <script>
        // Market movers visibility flag from server
        const showMarketMovers = {{ $showMarketMovers ? 'true' : 'false' }};

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu functions are now defined in partials/header.blade.php as USE_toggleMobileDrawer() and USE_toggleMobileSubmenu()

        // Keep ticker track stable across websocket updates so animation doesn't reset.
        let tickerSymbols = [];

        // WebSocket Connection for Live Data
        console.log('Initializing WebSocket connection...');

        try {
            var socket = new ReconnectingWebSocket("wss://scd.use.or.ug/ws");
            console.log('WebSocket object created:', socket);

            socket.onopen = function() {
                console.log('WebSocket connected successfully!');
                console.log('Sending subscription message...');
                socket.send('{"subscribe": "prices"}');
                console.log('Subscription message sent: {"subscribe": "prices"}');
            };

            socket.onmessage = function(event) {
                console.log('WebSocket message received:', event.data);
                try {
                    var data = JSON.parse(event.data);
                    console.log('Parsed message data:', data);

                    // Update stock ticker and market movers with live data
                    if (data.channel === 'prices' && data.data && data.data.market) {
                        updateStockTicker(data.data.market);
                        updateMarketMovers(data.data.market);
                    }
                } catch (e) {
                    console.log('Failed to parse message as JSON:', e);
                }
            };

            socket.onclose = function(event) {
                console.log('WebSocket connection closed:', event.code, event.reason);
            };

            socket.onerror = function(error) {
                console.error('WebSocket error occurred:', error);
            };

            // Log connection state periodically
            setInterval(function() {
                console.log('WebSocket ready state:', socket.readyState, '(0=CONNECTING, 1=OPEN, 2=CLOSING, 3=CLOSED)');
            }, 10000); // Log every 10 seconds

        } catch (error) {
            console.error('Failed to create WebSocket connection:', error);
        }

        function formatTickerStock(stock) {
            let symbol = stock.stock || '';
            if (symbol.includes(' ')) {
                symbol = symbol.split(' ')[0];
            }

            const rawPrice = stock.last_deal_price > 0 ? stock.last_deal_price : stock.close;
            const parsedPrice = Number(rawPrice);
            const price = Number.isFinite(parsedPrice) ? parsedPrice : 0;
            const formattedPrice = 'UGX ' + price.toFixed(2);

            const rawChangePercent = Number(stock.change_percent);
            const changePercent = Number.isFinite(rawChangePercent) ? rawChangePercent : 0;
            const changeClass = changePercent >= 0 ? 'positive' : 'negative';
            const changeSymbol = changePercent >= 0 ? '+' : '';
            const formattedChange = changeSymbol + changePercent.toFixed(2) + '%';

            return {
                symbol: symbol,
                formattedPrice: formattedPrice,
                formattedChange: formattedChange,
                changeClass: changeClass
            };
        }

        function createTickerItem(formattedStock) {
            const tickerItem = document.createElement('div');
            tickerItem.className = 'ticker-item';
            tickerItem.innerHTML = `
                <span class="ticker-symbol">${formattedStock.symbol}</span>
                <span class="ticker-price">${formattedStock.formattedPrice}</span>
                <span class="ticker-change ${formattedStock.changeClass}">${formattedStock.formattedChange}</span>
            `;
            return tickerItem;
        }

        function patchTickerItem(tickerItem, formattedStock) {
            if (!tickerItem) {
                return;
            }

            const symbolEl = tickerItem.querySelector('.ticker-symbol');
            const priceEl = tickerItem.querySelector('.ticker-price');
            const changeEl = tickerItem.querySelector('.ticker-change');

            if (symbolEl) {
                symbolEl.textContent = formattedStock.symbol;
            }
            if (priceEl) {
                priceEl.textContent = formattedStock.formattedPrice;
            }
            if (changeEl) {
                changeEl.textContent = formattedStock.formattedChange;
                changeEl.classList.remove('positive', 'negative');
                changeEl.classList.add(formattedStock.changeClass);
            }
        }

        function rebuildTickerTrack(tickerContent, formattedStocks) {
            tickerContent.innerHTML = '';

            const baseItems = [];
            formattedStocks.forEach(function(formattedStock) {
                const baseItem = createTickerItem(formattedStock);
                baseItems.push(baseItem);
                tickerContent.appendChild(baseItem);
            });

            // Duplicate items for seamless scrolling loop.
            baseItems.forEach(function(baseItem) {
                tickerContent.appendChild(baseItem.cloneNode(true));
            });
        }

        // Function to update stock ticker with live data
        function updateStockTicker(marketData) {
            console.log('Updating stock ticker with', marketData.length, 'stocks');

            const tickerContent = document.getElementById('tickerContent');
            if (!tickerContent) {
                console.log('Ticker content element not found');
                return;
            }

            if (!Array.isArray(marketData) || marketData.length === 0) {
                console.log('No market data available for ticker');
                return;
            }

            const formattedStocks = marketData
                .map(formatTickerStock)
                .sort(function(a, b) {
                    return a.symbol.localeCompare(b.symbol, undefined, { sensitivity: 'base' });
                });
            const nextSymbols = formattedStocks.map(function(stock) {
                return stock.symbol;
            });

            const symbolsChanged =
                tickerSymbols.length !== nextSymbols.length ||
                tickerSymbols.some(function(symbol, index) {
                    return symbol !== nextSymbols[index];
                });

            const expectedTickerItems = formattedStocks.length * 2;
            const currentTickerItems = tickerContent.querySelectorAll('.ticker-item');
            const needsRebuild = symbolsChanged || currentTickerItems.length !== expectedTickerItems;

            if (needsRebuild) {
                rebuildTickerTrack(tickerContent, formattedStocks);
            } else {
                const half = formattedStocks.length;
                formattedStocks.forEach(function(formattedStock, index) {
                    patchTickerItem(currentTickerItems[index], formattedStock);
                    patchTickerItem(currentTickerItems[index + half], formattedStock);
                });
            }

            tickerSymbols = nextSymbols;

            console.log('Stock ticker updated with live data');
        }

        // Function to fetch and update market statistics (Total Volume, Trades, Index Daily)
        function updateMarketStatistics() {
            console.log('Fetching market statistics from delayed data...');

            fetch('/api/delayed-data')
                .then(response => response.json())
                .then(data => {
                    console.log('Market statistics data received:', data);

                    // Filter equity stocks only
                    const equityStocks = data.filter(item => item.type === 'EQUITY');

                    // Calculate total volume (sum of all equity volumes)
                    const totalVolume = equityStocks.reduce((sum, stock) => sum + (stock.volume || 0), 0);

                    // Calculate total trades/deals (sum of all equity deals)
                    const totalTrades = equityStocks.reduce((sum, stock) => sum + (stock.deals || 0), 0);

                    // Find LCI index value
                    const lciIndex = data.find(item => item.type === 'INDEX' && item.stock === 'LCI');
                    const indexDaily = lciIndex ? lciIndex.price : 0;

                    // Update DOM elements
                    const totalVolumeEl = document.getElementById('totalVolume');
                    const totalTradesEl = document.getElementById('totalTrades');
                    const indexDailyEl = document.getElementById('indexDaily');

                    if (totalVolumeEl) {
                        totalVolumeEl.textContent = totalVolume.toLocaleString();
                    }

                    if (totalTradesEl) {
                        totalTradesEl.textContent = totalTrades.toLocaleString();
                    }

                    if (indexDailyEl) {
                        indexDailyEl.textContent = indexDaily.toFixed(2);
                    }

                    // Update the footer text with total volume
                    const statFooter = document.querySelector('.stat-footer .highlight:last-child');
                    if (statFooter) {
                        statFooter.textContent = totalVolume.toLocaleString();
                    }

                    console.log('Market statistics updated - Volume:', totalVolume, 'Trades:', totalTrades, 'LCI Index:', indexDaily);
                })
                .catch(error => {
                    console.error('Error fetching market statistics:', error);
                });
        }

        // Function to update Top Gainers and Top Losers with live data
        function updateMarketMovers(marketData) {
            // Only update market movers if market has closed (after 1PM EAT)
            if (!showMarketMovers) {
                console.log('Market has not closed yet. Skipping market movers update.');
                return;
            }

            console.log('Updating market movers with', marketData.length, 'stocks');

            // Filter stocks with valid change percentages
            const validStocks = marketData.filter(function(stock) {
                return stock.change_percent !== 0 && stock.change_percent !== null && stock.change_percent !== undefined;
            });

            // Filter gainers (positive change) and losers (negative change)
            const gainers = validStocks.filter(function(stock) {
                return stock.change_percent > 0;
            }).sort(function(a, b) {
                return b.change_percent - a.change_percent;
            });

            const losers = validStocks.filter(function(stock) {
                return stock.change_percent < 0;
            }).sort(function(a, b) {
                return a.change_percent - b.change_percent;
            });

            // Get top 3 gainers and top 3 losers
            const topGainers = gainers.slice(0, 3);
            const topLosers = losers.slice(0, 3);

            // Update Top Gainers
            const gainersContainer = document.getElementById('topGainers');
            if (gainersContainer) {
                gainersContainer.innerHTML = '';

                if (topGainers.length === 0) {
                    gainersContainer.innerHTML = '<li class="mover-item"><div class="mover-symbol">No gainers today</div></li>';
                } else {
                    topGainers.forEach(function(stock) {
                        const moverItem = document.createElement('li');
                        moverItem.className = 'mover-item';

                        // Clean up stock symbol and get company name
                        let symbol = stock.stock;
                        let companyName = stock.stock;
                        if (symbol.includes(' ')) {
                            const parts = symbol.split(' ');
                            symbol = parts[0];
                        }

                        const changePercent = stock.change_percent;
                        const changeClass = 'positive';
                        const changeSymbol = '+';

                        // Format price
                        let price = stock.last_deal_price > 0 ? stock.last_deal_price : stock.close;
                        let formattedPrice = 'UGX ' + price.toFixed(2);

                        moverItem.innerHTML = `
                            <div>
                                <div class="mover-symbol">${symbol}</div>
                                <div class="mover-company">${companyName}</div>
                            </div>
                            <div class="mover-price">
                                <div class="mover-value">${formattedPrice}</div>
                                <div class="mover-change ${changeClass}">${changeSymbol}${changePercent.toFixed(2)}%</div>
                            </div>
                        `;

                        gainersContainer.appendChild(moverItem);
                    });
                }
            }

            // Update Top Losers
            const losersContainer = document.getElementById('topLosers');
            if (losersContainer) {
                losersContainer.innerHTML = '';

                if (topLosers.length === 0) {
                    losersContainer.innerHTML = '<li class="mover-item"><div class="mover-symbol">No losers today</div></li>';
                } else {
                    topLosers.forEach(function(stock) {
                        const moverItem = document.createElement('li');
                        moverItem.className = 'mover-item';

                        // Clean up stock symbol and get company name
                        let symbol = stock.stock;
                        let companyName = stock.stock;
                        if (symbol.includes(' ')) {
                            const parts = symbol.split(' ');
                            symbol = parts[0];
                        }

                        const changePercent = stock.change_percent;
                        const changeClass = 'negative';
                        const changeSymbol = '';

                        // Format price
                        let price = stock.last_deal_price > 0 ? stock.last_deal_price : stock.close;
                        let formattedPrice = 'UGX ' + price.toFixed(2);

                        moverItem.innerHTML = `
                            <div>
                                <div class="mover-symbol">${symbol}</div>
                                <div class="mover-company">${companyName}</div>
                            </div>
                            <div class="mover-price">
                                <div class="mover-value">${formattedPrice}</div>
                                <div class="mover-change ${changeClass}">${changeSymbol}${changePercent.toFixed(2)}%</div>
                            </div>
                        `;

                        losersContainer.appendChild(moverItem);
                    });
                }
            }

            console.log('Market movers updated - Gainers:', topGainers.length, 'Losers:', topLosers.length);
        }

        // Carousel functionality
        let slides = null;
        let dots = null;
        let currentSlide = 0;
        let carouselInterval = null;

        function initializeCarousel() {
            slides = document.querySelectorAll('.hero-carousel-slide');
            dots = document.querySelectorAll('.hero-carousel-dot');

            console.log('Initializing carousel with', slides.length, 'slides');
            console.log('Found', dots.length, 'dots');

            if (slides && slides.length > 0) {
                currentSlide = 0;
                // Make sure first slide is active
                slides[0].classList.add('active');
                if (dots.length > 0) {
                    dots[0].classList.add('active');
                }
            }
        }

        function goToSlide(slideIndex) {
            if (!slides || slides.length === 0) {
                console.log('No slides available');
                return;
            }

            console.log('Going to slide:', slideIndex);

            // Remove active class from current slide
            if (slides[currentSlide]) {
                slides[currentSlide].classList.remove('active');
            }
            if (dots[currentSlide]) {
                dots[currentSlide].classList.remove('active');
            }

            // Update current slide index
            currentSlide = slideIndex;

            // Add active class to new slide
            if (slides[currentSlide]) {
                slides[currentSlide].classList.add('active');
            }
            if (dots[currentSlide]) {
                dots[currentSlide].classList.add('active');
            }
        }

        function nextSlide() {
            if (!slides || slides.length <= 1) return;
            const nextIndex = (currentSlide + 1) % slides.length;
            goToSlide(nextIndex);
        }

        function prevSlide() {
            if (!slides || slides.length <= 1) return;
            const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
            goToSlide(prevIndex);
        }

        function startCarouselAutoplay() {
            stopCarouselAutoplay(); // Clear any existing interval
            if (slides && slides.length > 1) {
                console.log('Starting carousel autoplay with', slides.length, 'slides');
                carouselInterval = setInterval(function() {
                    console.log('Auto-advancing to next slide');
                    nextSlide();
                }, 5000); // Change slide every 5 seconds
            }
        }

        function stopCarouselAutoplay() {
            if (carouselInterval) {
                console.log('Stopping carousel autoplay');
                clearInterval(carouselInterval);
                carouselInterval = null;
            }
        }

        // Initialize carousel when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing carousel...');

            // Fetch and update market statistics immediately
            updateMarketStatistics();

            // Refresh market statistics every 30 seconds
            setInterval(updateMarketStatistics, 30000);

            // Wait a bit for all elements to be rendered
            setTimeout(function() {
                initializeCarousel();

                // Start autoplay if there are multiple slides
                if (slides && slides.length > 1) {
                    console.log('Found', slides.length, 'slides, starting autoplay');
                    startCarouselAutoplay();

                    // Pause autoplay on hover
                    const heroSection = document.querySelector('.hero');
                    if (heroSection) {
                        heroSection.addEventListener('mouseenter', function() {
                            console.log('Mouse enter - stopping autoplay');
                            stopCarouselAutoplay();
                        });
                        heroSection.addEventListener('mouseleave', function() {
                            console.log('Mouse leave - starting autoplay');
                            startCarouselAutoplay();
                        });
                    }
                } else {
                    console.log('No slides found or only 1 slide, autoplay not started');
                }
            }, 100);
        });

        // Also initialize after window loads (backup)
        window.addEventListener('load', function() {
            console.log('Window loaded, checking carousel...');
            if (!slides || slides.length === 0) {
                initializeCarousel();
                if (slides && slides.length > 1 && !carouselInterval) {
                    startCarouselAutoplay();
                }
            }
        });
    </script>
</body>
</html>
