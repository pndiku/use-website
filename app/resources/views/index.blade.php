<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uganda Securities Exchange - Building East Africa's Premier Financial Market</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
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

        .header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
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
            color: var(--primary-blue);
            background: rgba(37, 99, 235, 0.05);
            transform: translateY(-1px);
        }

        .nav-link.active {
            color: var(--primary-blue);
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

        /* Level 2 - Dropdown (copied from working test) */
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

        /* Show dropdown on nav-item hover */
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
            background: rgba(37, 99, 235, 0.05);
            color: var(--primary-blue);
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

        /* Level 3 - Submenu (copied from working test) */
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

        /* Show submenu on parent li hover - KEY SELECTOR */
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
            background: rgba(37, 99, 235, 0.05);
            color: var(--primary-blue);
            transform: translateX(4px);
        }

        .cta-button {
            background: var(--gradient-primary);
            color: white;
            padding: 0.875rem 1.75rem;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.925rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-left: 1rem;
            border: 1px solid transparent;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-carousel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
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

        .hero-carousel-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(37, 99, 235, 0.4) 50%, rgba(0, 0, 0, 0.3) 100%);
        }

        .hero-carousel-slide::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.2) 70%, rgba(0, 0, 0, 0.5) 100%);
        }

        .hero-carousel-controls {
            position: absolute;
            bottom: 5rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 4;
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
            z-index: 4;
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

        /* Fallback gradient when no carousel images */
        .hero.no-carousel {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
        }

        .hero.no-carousel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
        }

        .hero.no-carousel::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 100%;
            height: 200%;
            background: linear-gradient(45deg, transparent 0%, rgba(255, 255, 255, 0.03) 50%, transparent 100%);
            animation: heroShine 8s ease-in-out infinite;
        }

        @keyframes heroShine {
            0%, 100% { transform: translateX(100%) rotate(45deg); }
            50% { transform: translateX(-100%) rotate(45deg); }
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
            text-align: left;
        }

        .slide-content {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .slide-content.active {
            opacity: 1;
            transform: translateY(0);
            position: relative;
        }

        .hero-content h1 {
            font-size: clamp(3rem, 6vw, 5rem);
            font-weight: 800;
            background: linear-gradient(135deg, white 0%, rgba(255, 255, 255, 0.9) 50%, rgba(214, 158, 46, 0.9) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
            margin-bottom: 2rem;
            letter-spacing: -0.04em;
            max-width: 900px;
            animation: heroTextSlide 1s ease-out 0.3s both;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-family: 'Titillium Web', sans-serif;
        }

        .hero-content p {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
            line-height: 1.7;
            max-width: 600px;
            animation: heroTextSlide 1s ease-out 0.6s both;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
            background: rgba(0, 0, 0, 0.2);
            padding: 1rem;
            border-radius: 8px;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        @keyframes heroTextSlide {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            animation: heroTextSlide 1s ease-out 0.9s both;
        }

        .btn-primary {
            background: var(--gradient-accent);
            color: white;
            padding: 1.25rem 2.5rem;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-shadow: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: var(--shadow-2xl);
            filter: brightness(1.1);
        }

        .btn-secondary {
            background: rgba(0, 0, 0, 0.25);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
        }


        /* Stock Ticker Overlay */
        .stock-ticker-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(10px);
            color: white;
            padding: 0.75rem 0;
            overflow: hidden;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 3;
        }

        .ticker-wrapper {
            display: flex;
            animation: scroll 45s linear infinite;
            gap: 4rem;
            white-space: nowrap;
        }

        .ticker-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .ticker-item:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .ticker-symbol {
            color: #e2e8f0;
            font-weight: 600;
        }

        .ticker-price {
            color: #94a3b8;
        }

        .ticker-change {
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.85rem;
        }

        .ticker-change.positive {
            color: var(--use-green);
            background: rgba(39, 221, 90, 0.1);
        }

        .ticker-change.negative {
            color: var(--use-red);
            background: rgba(221, 39, 39, 0.1);
        }

        .ticker-loading {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 0 2rem;
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.8);
            min-width: 100vw;
        }

        .loading-icon {
            font-size: 1.2rem;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes scroll {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        /* Gateway Section */
        .gateway {
            padding: 8rem 0;
            background: linear-gradient(135deg, var(--surface-secondary) 0%, var(--surface-tertiary) 100%);
            position: relative;
        }

        .gateway::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 25% 25%, rgba(26, 54, 93, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(214, 158, 46, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .gateway::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border), transparent);
        }

        .gateway-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 5rem;
            align-items: center;
        }

        .gateway-content h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .gateway-content p {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .gateway-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .stat-card {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            border: 1px solid var(--border-light);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--gradient-accent);
            border-radius: 0 0 2px 2px;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.03), transparent);
            transition: all 0.6s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: var(--shadow-2xl);
            border-color: var(--primary-blue-light);
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.75rem;
            line-height: 1;
            letter-spacing: -0.03em;
            font-family: 'Titillium Web', sans-serif;
        }

        .market-movers-card {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .market-movers-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.03), transparent);
            transition: all 0.6s ease;
        }

        .market-movers-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(37, 99, 235, 0.2);
        }

        .market-movers-card:hover::before {
            left: 100%;
        }

        .movers-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .movers-header h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .view-all {
            font-size: 0.75rem;
            color: var(--primary-blue);
            font-weight: 500;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .view-all:hover {
            color: var(--primary-blue-dark);
        }

        .movers-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .mover-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
        }

        .mover-symbol {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .mover-change {
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
        }

        .mover-change.positive {
            color: var(--use-green);
            background: rgba(39, 221, 90, 0.1);
        }

        .mover-change.negative {
            color: var(--use-red);
            background: rgba(221, 39, 39, 0.1);
        }

        .mover-loading {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem 0;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .stat-description {
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Services Section */
        .services {
            padding: 6rem 0;
            background: white;
        }

        .services-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            letter-spacing: -0.04em;
            line-height: 1.2;
            font-family: 'Titillium Web', sans-serif;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient-accent);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-secondary);
            max-width: 640px;
            margin: 0 auto;
            line-height: 1.7;
            font-weight: 400;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .service-card {
            background: var(--surface);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            border: 1px solid var(--border-light);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .service-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-accent);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-blue), var(--primary-blue-light));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .service-card:hover {
            background: var(--surface);
            box-shadow: var(--shadow-2xl);
            transform: translateY(-12px) scale(1.02);
            border-color: var(--primary-blue-light);
        }

        .service-card:hover::after {
            transform: scaleX(1);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-icon {
            width: 72px;
            height: 72px;
            background: var(--gradient-primary);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            font-size: 1.75rem;
            color: white;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            box-shadow: var(--shadow-md);
        }

        .service-icon::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: var(--gradient-accent);
            border-radius: 20px;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .service-card:hover .service-icon {
            transform: scale(1.15) rotate(8deg);
            box-shadow: var(--shadow-xl);
        }

        .service-card:hover .service-icon::before {
            opacity: 1;
        }

        .service-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .service-description {
            color: #64748b;
            line-height: 1.6;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .service-link {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }

        .service-link:hover {
            color: #1d4ed8;
        }

        /* What We Do Section */
        .what-we-do {
            padding: 6rem 0;
            background: #f8fafc;
        }

        .what-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .what-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .what-content h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
            letter-spacing: -0.02em;
        }

        .what-content p {
            font-size: 1.1rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .what-list {
            list-style: none;
            margin-bottom: 2rem;
        }

        .what-list li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 0;
            color: #475569;
            font-weight: 500;
        }

        .what-list li:before {
            content: '✓';
            color: #2563eb;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .what-image {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border-radius: 12px;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .what-image::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: #2563eb;
            border-radius: 12px;
            opacity: 0.1;
        }


        /* News Section */
        .news {
            padding: 6rem 0;
            background: white;
        }

        .news-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .news-item {
            background: var(--surface);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--border-light);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: block;
            box-shadow: var(--shadow-sm);
        }

        .news-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gradient-accent);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .news-item::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(37, 99, 235, 0.02), transparent);
            transform: rotate(45deg) translateX(100%);
            transition: transform 0.6s ease;
        }

        .news-item:hover {
            background: var(--surface);
            box-shadow: var(--shadow-xl);
            transform: translateY(-10px) scale(1.02);
            border-color: var(--primary-blue-light);
            text-decoration: none;
            color: inherit;
        }

        .news-item:hover::before {
            transform: scaleX(1);
        }

        .news-item:hover::after {
            transform: rotate(45deg) translateX(-100%);
        }

        .news-image {
            width: 100%;
            height: 160px;
            border-radius: 12px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
        }

        .news-image::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            background: var(--primary-blue);
            border-radius: 8px;
            opacity: 0.1;
        }

        /* Event Banner */
        .event-banner {
            position: fixed;
            top: 6rem;
            right: 2rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(226, 232, 240, 0.3);
            border-radius: 16px;
            padding: 1rem 1.25rem;
            box-shadow: var(--shadow-lg);
            z-index: 999;
            max-width: 320px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(400px);
            animation: slideInEvent 1s ease-out 2s forwards;
        }

        .event-banner.dismissed {
            transform: translateX(400px);
            opacity: 0;
        }

        @keyframes slideInEvent {
            to {
                transform: translateX(0);
            }
        }

        .event-banner-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .event-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--primary-blue);
        }

        .event-badge::before {
            content: '';
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .event-dismiss {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.25rem;
            border-radius: 4px;
            transition: all 0.2s ease;
            line-height: 1;
        }

        .event-dismiss:hover {
            color: var(--text-primary);
            background: rgba(100, 116, 139, 0.1);
        }

        .event-content {
            margin-bottom: 1rem;
        }

        .event-title-banner {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .event-meta-banner {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 0.75rem;
        }

        .event-date-banner {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            font-weight: 500;
        }

        .event-date-banner::before {
            content: '📅';
            font-size: 0.75rem;
        }

        .event-time-banner {
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .event-time-banner::before {
            content: '⏰';
            font-size: 0.75rem;
        }

        .event-actions {
            display: flex;
            gap: 0.5rem;
        }

        .event-btn {
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .event-btn-primary {
            background: var(--primary-blue);
            color: white;
        }

        .event-btn-primary:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-1px);
        }

        .event-btn-secondary {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-blue);
        }

        .event-btn-secondary:hover {
            background: rgba(37, 99, 235, 0.15);
        }

        .news-content h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .news-meta {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 0.75rem;
            font-weight: 500;
        }

        .news-excerpt {
            font-size: 0.9rem;
            color: #64748b;
            line-height: 1.5;
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

        /* Mobile Menu */
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
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
            user-select: none;
            -webkit-user-select: none;
        }

        .mobile-menu-btn:hover,
        .mobile-menu-btn:active {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-blue);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .gateway-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .what-grid {
                grid-template-columns: 1fr;
            }

            .gateway-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .market-status {
                padding: 0.375rem 0.75rem;
                order: 0;
                margin: 0;
            }

            .nav-container {
                flex-wrap: nowrap;
                height: 64px;
            }

            .status-time {
                display: none;
            }

            .ticker-wrapper {
                animation-duration: 60s;
            }


            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }

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

            .market-status {
                font-size: 0.75rem;
                padding: 0.375rem 0.625rem;
            }

            .status-text {
                font-size: 0.7rem;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            /* Mobile responsiveness for ticker overlay */
            .stock-ticker-overlay {
                padding: 0.5rem 0;
            }

            .hero-carousel-controls {
                bottom: 4rem;
            }

            .ticker-item {
                font-size: 0.75rem;
            }

            .hero-carousel-nav {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .gateway-stats {
                grid-template-columns: 1fr;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .event-banner {
                right: 1rem;
                left: 1rem;
                max-width: none;
                top: 5rem;
            }

            .header {
                width: calc(100% - 1rem);
            }

            .gateway-stats {
                grid-template-columns: 1fr;
                gap: 1.5rem;
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

            .hero-content h1 {
                font-size: 2rem;
            }

            .event-banner {
                top: 4rem;
            }
        }
    </style>
</head>
<body>

    <script>
        // Modern navbar scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Add active state to navigation links
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks[0].classList.add('active'); // Add active to first link

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    // Don't interfere with dropdown items or nav links
                    if (this.classList.contains('dropdown-item') || this.classList.contains('nav-link') || this.classList.contains('submenu-item')) {
                        return;
                    }

                    const href = this.getAttribute('href');
                    // Only handle valid anchor links, not just "#"
                    if (href && href.length > 1 && href !== '#') {
                        e.preventDefault();
                        try {
                            const target = document.querySelector(href);
                            if (target) {
                                target.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'start'
                                });
                            }
                        } catch (error) {
                            console.warn('Invalid selector:', href);
                        }
                    }
                });
            });

            // Intersection Observer for animation triggers
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationDelay = '0s';
                        entry.target.style.animationFillMode = 'forwards';
                    }
                });
            }, observerOptions);

            // Observe elements for scroll animations
            document.querySelectorAll('.service-card, .news-item, .stat-card').forEach(el => {
                observer.observe(el);
            });
        });

        // Event banner dismiss function
        function dismissEvent() {
            const banner = document.getElementById('eventBanner');
            banner.classList.add('dismissed');
            setTimeout(() => {
                banner.style.display = 'none';
            }, 400);
        }

        // Mobile menu toggle
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

        // Mobile submenu toggle
        function toggleMobileSubmenu(event) {
            if (window.innerWidth <= 768) {
                event.preventDefault();
                event.stopPropagation();
                const dropdownItem = event.currentTarget;
                const submenu = dropdownItem.nextElementSibling;
                const chevron = dropdownItem.querySelector('.chevron-right');

                console.log('toggleMobileSubmenu called');
                console.log('Submenu element:', submenu);
                console.log('Has submenu class:', submenu?.classList.contains('submenu'));

                if (submenu && submenu.classList.contains('submenu')) {
                    submenu.classList.toggle('active');
                    console.log('Submenu active:', submenu.classList.contains('active'));
                    if (chevron) {
                        chevron.style.transform = submenu.classList.contains('active')
                            ? 'rotate(45deg)'
                            : 'rotate(-45deg)';
                    }
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

        // Live price feed — fetch public ticket then connect
        (function () {
            var WS_URL = 'wss://scd.use.or.ug/ws';
            var TICKET_URL = 'https://scd.use.or.ug/ws-ticket';
            var reconnectDelay = 1000;
            var maxDelay = 30000;

            function connect() {
                fetch(TICKET_URL)
                    .then(function (r) { return r.json(); })
                    .then(function (body) {
                        var ws = new WebSocket(WS_URL + '?token=' + body.token);

                        ws.onopen = function () {
                            reconnectDelay = 1000;
                            ws.send(JSON.stringify({type: 'subscribe', channel: 'prices', id: 'broadcast'}));
                        };

                        ws.onmessage = function (event) {
                            try {
                                var data = JSON.parse(event.data);
                                if (data.type === 'message' && data.channel === 'prices' && data.data && data.data.market) {
                                    updateStockTicker(data.data.market);
                                    updateMarketMovers(data.data.market);
                                }
                            } catch (e) {}
                        };

                        ws.onclose = function () {
                            setTimeout(function () {
                                reconnectDelay = Math.min(reconnectDelay * 1.5, maxDelay);
                                connect();
                            }, reconnectDelay);
                        };

                        ws.onerror = function (err) {
                            console.error('Live data error', err);
                        };
                    })
                    .catch(function () {
                        setTimeout(function () {
                            reconnectDelay = Math.min(reconnectDelay * 1.5, maxDelay);
                            connect();
                        }, reconnectDelay);
                    });
            }

            connect();
        })();

        // Function to update stock ticker with live data
        function updateStockTicker(marketData) {
            console.log('Updating stock ticker with', marketData.length, 'stocks');
            
            const tickerWrapper = document.querySelector('.ticker-wrapper');
            if (!tickerWrapper) {
                console.log('Ticker wrapper not found');
                return;
            }
            
            // Clear existing ticker items
            tickerWrapper.innerHTML = '';
            
            // Create ticker items from live data
            marketData.forEach(function(stock) {
                const tickerItem = document.createElement('div');
                tickerItem.className = 'ticker-item';
                
                // Format the stock symbol (clean up names like "AIRTEL UGANDA" -> "AIRTEL")
                let symbol = stock.stock;
                if (symbol.includes(' ')) {
                    symbol = symbol.split(' ')[0];
                }
                
                // Format price (use last_deal_price if available, otherwise close price)
                let price = stock.last_deal_price > 0 ? stock.last_deal_price : stock.close;
                let formattedPrice = 'UGX ' + price.toFixed(2);
                
                // Format change percentage
                let changePercent = stock.change_percent;
                let changeClass = changePercent >= 0 ? 'positive' : 'negative';
                let changeSymbol = changePercent >= 0 ? '+' : '';
                let formattedChange = changeSymbol + changePercent.toFixed(2) + '%';
                
                tickerItem.innerHTML = `
                    <span class="ticker-symbol">${symbol}</span>
                    <span class="ticker-price">${formattedPrice}</span>
                    <span class="ticker-change ${changeClass}">${formattedChange}</span>
                `;
                
                tickerWrapper.appendChild(tickerItem);
            });
            
            // Duplicate the items for seamless scrolling
            const originalItems = tickerWrapper.innerHTML;
            tickerWrapper.innerHTML = originalItems + originalItems;
            
            console.log('Stock ticker updated with live data');
        }

        // Function to update Top Gainers and Top Losers with live data
        function updateMarketMovers(marketData) {
            console.log('Updating market movers with', marketData.length, 'stocks');

            // Filter stocks with valid change percentages
            const validStocks = marketData.filter(function(stock) {
                return stock.change_percent !== 0 && stock.change_percent !== null && stock.change_percent !== undefined;
            });

            // Sort by change percentage
            const sortedStocks = validStocks.sort(function(a, b) {
                return b.change_percent - a.change_percent;
            });

            // Get top 3 gainers and top 3 losers
            const topGainers = sortedStocks.slice(0, 3);
            const topLosers = sortedStocks.slice(-3).reverse(); // Reverse to get worst performers first

            // Update Top Gainers
            const gainersContainer = document.getElementById('topGainersList');
            if (gainersContainer) {
                gainersContainer.innerHTML = '';

                if (topGainers.length === 0) {
                    gainersContainer.innerHTML = '<div class="mover-loading"><span>No gainers today</span></div>';
                } else {
                    topGainers.forEach(function(stock) {
                        const moverItem = document.createElement('div');
                        moverItem.className = 'mover-item';

                        // Clean up stock symbol
                        let symbol = stock.stock;
                        if (symbol.includes(' ')) {
                            symbol = symbol.split(' ')[0];
                        }

                        const changePercent = stock.change_percent;
                        const changeClass = changePercent >= 0 ? 'positive' : 'negative';
                        const changeSymbol = changePercent >= 0 ? '+' : '';

                        moverItem.innerHTML = `
                            <span class="mover-symbol">${symbol}</span>
                            <span class="mover-change ${changeClass}">${changeSymbol}${changePercent.toFixed(2)}%</span>
                        `;

                        gainersContainer.appendChild(moverItem);
                    });
                }
            }

            // Update Top Losers
            const losersContainer = document.getElementById('topLosersList');
            if (losersContainer) {
                losersContainer.innerHTML = '';

                if (topLosers.length === 0) {
                    losersContainer.innerHTML = '<div class="mover-loading"><span>No losers today</span></div>';
                } else {
                    topLosers.forEach(function(stock) {
                        const moverItem = document.createElement('div');
                        moverItem.className = 'mover-item';

                        // Clean up stock symbol
                        let symbol = stock.stock;
                        if (symbol.includes(' ')) {
                            symbol = symbol.split(' ')[0];
                        }

                        const changePercent = stock.change_percent;
                        const changeClass = changePercent >= 0 ? 'positive' : 'negative';
                        const changeSymbol = changePercent >= 0 ? '+' : '';

                        moverItem.innerHTML = `
                            <span class="mover-symbol">${symbol}</span>
                            <span class="mover-change ${changeClass}">${changeSymbol}${changePercent.toFixed(2)}%</span>
                        `;

                        losersContainer.appendChild(moverItem);
                    });
                }
            }

            console.log('Market movers updated - Gainers:', topGainers.length, 'Losers:', topLosers.length);
        }

    </script>
    <!-- Header -->
    @include('partials.header')

    <!-- Hero Section -->
    <section id="home" class="hero {{ $carouselImages && $carouselImages->count() > 0 ? '' : 'no-carousel' }}">
        @if($carouselImages && $carouselImages->count() > 0)
        <div class="hero-carousel">
            @foreach($carouselImages as $index => $slide)
            <div class="hero-carousel-slide {{ $index === 0 ? 'active' : '' }}"
                 style="background-image: url('{{ $slide->image_url }}');"
                 data-slide="{{ $index }}">
            </div>
            @endforeach
        </div>

        @if($carouselImages->count() > 1)
        <button class="hero-carousel-nav prev" onclick="prevSlide()">‹</button>
        <button class="hero-carousel-nav next" onclick="nextSlide()">›</button>

        <div class="hero-carousel-controls">
            @foreach($carouselImages as $index => $slide)
            <button class="hero-carousel-dot {{ $index === 0 ? 'active' : '' }}"
                    onclick="goToSlide({{ $index }})"
                    data-slide="{{ $index }}"></button>
            @endforeach
        </div>
        @endif
        @endif

        <div class="hero-container">
            <div class="hero-content">
                @if($carouselImages && $carouselImages->count() > 0)
                    @foreach($carouselImages as $index => $slide)
                    <div class="slide-content {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                        <h1>{{ $slide->title }}</h1>
                        @if($slide->description)
                        <p>{{ $slide->description }}</p>
                        @endif
                        <div class="hero-buttons">
                            @if($slide->button_text && $slide->button_link)
                            <a href="{{ $slide->button_link }}" class="btn-primary">{{ $slide->button_text }}</a>
                            @endif
                            @if($slide->button_text_2 && $slide->button_link_2)
                            <a href="{{ $slide->button_link_2 }}" class="btn-secondary">{{ $slide->button_text_2 }}</a>
                            @elseif(!($slide->button_text && $slide->button_link))
                            <a href="#" class="btn-secondary">Learn More</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="slide-content active">
                        <h1>{{ $siteContent['hero_headline'] ?? 'Building East Africa\'s Premier Financial Market' }}</h1>
                        <p>{{ $siteContent['hero_subtitle'] ?? 'Connecting investors with opportunities across Uganda and East Africa through innovative trading solutions, comprehensive market data, and professional investment services.' }}</p>
                        <div class="hero-buttons">
                            <a href="{{ $siteContent['hero_cta_link'] ?? '#' }}" class="btn-primary">{{ $siteContent['hero_cta_text'] ?? 'Start Trading Today' }}</a>
                            <a href="#" class="btn-secondary">Learn More</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Stock Ticker Overlay -->
        <div class="stock-ticker-overlay">
            <div class="ticker-wrapper">
                <div class="ticker-loading">
                    <span class="loading-icon">⟳</span>
                    <span>Loading live market data...</span>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="news">
        <div class="news-container">
            <div class="section-header">
                <h2 class="section-title">Latest Market News & Insights</h2>
                <p class="section-subtitle">Stay informed with the latest developments in Uganda's financial markets and investment opportunities.</p>
            </div>
            <div class="news-grid">
                @if($latestNews && $latestNews->count() > 0)
                    @foreach($latestNews as $article)
                    <a href="{{ route('news.article', $article->slug) }}" class="news-item">
                        @if($article->article_type === 'report')
                        <div class="news-image" style="display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);">
                            <i class="fas fa-file-pdf" style="font-size: 4rem; color: white; opacity: 0.9;"></i>
                        </div>
                        @elseif($article->image_url)
                        <div class="news-image" style="background-image: url('{{ $article->image_url }}'); background-size: cover; background-position: center;"></div>
                        @else
                        <div class="news-image"></div>
                        @endif
                        <div class="news-content">
                            <div class="news-meta">{{ $article->getDisplayDate()->format('F j, Y') }} • {{ $article->article_type === 'report' ? 'Report' : 'Market News' }}</div>
                            <h3>{{ $article->title }}</h3>
                            <p class="news-excerpt">{{ $article->article_type === 'report' ? Str::limit($article->summary ?? 'Download report', 120, '...') : Str::limit($article->content, 120, '...') }}</p>
                        </div>
                    </a>
                    @endforeach
                @else
                    <!-- Fallback static content if no news articles -->
                    <article class="news-item">
                        <div class="news-image"></div>
                        <div class="news-content">
                            <div class="news-meta">Market News</div>
                            <h3>Stay Updated with Uganda Securities Exchange</h3>
                            <p class="news-excerpt">Check back soon for the latest market news and investment opportunities...</p>
                        </div>
                    </article>
                @endif
            </div>
        </div>
    </section>

    <!-- Gateway Section -->
    <section id="about" class="gateway">
        <div class="gateway-container">
            <div class="gateway-content">
                <h2>{{ $siteContent['gateway_title'] ?? 'Your Gateway to Uganda\'s Financial Markets' }}</h2>
                <p>{{ $siteContent['gateway_description'] ?? 'Access comprehensive trading services, market data, and investment opportunities through Uganda\'s premier securities exchange platform.' }}</p>
                <ul class="what-list">
                    <li>Real-time market data and analytics</li>
                    <li>Secure trading platform</li>
                    <li>Professional investment advisory</li>
                    <li>Comprehensive investor education</li>
                </ul>
                <a href="#" class="btn-primary">Learn More</a>
            </div>
            <div class="gateway-stats">
                <div class="stat-card">
                    <div class="stat-number">18+</div>
                    <div class="stat-description">Listed Companies</div>
                </div>
                <div class="market-movers-card">
                    <div class="movers-header">
                        <h4>Top Gainers</h4>
                        <span class="view-all">View All</span>
                    </div>
                    <div class="movers-list" id="topGainersList">
                        <div class="mover-loading">
                            <span class="loading-icon">⟳</span>
                            <span>Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="market-movers-card">
                    <div class="movers-header">
                        <h4>Top Losers</h4>
                        <span class="view-all">View All</span>
                    </div>
                    <div class="movers-list" id="topLosersList">
                        <div class="mover-loading">
                            <span class="loading-icon">⟳</span>
                            <span>Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="services-container">
            <div class="section-header">
                <h2 class="section-title">Your Gateway to Investment Opportunities</h2>
                <p class="section-subtitle">Comprehensive trading and investment services designed to help you navigate Uganda's financial markets with confidence.</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">📊</div>
                    <h3 class="service-title">Securities Trading</h3>
                    <p class="service-description">Trade equities and bonds with our advanced trading platform. Access real-time quotes, market depth, and execute trades efficiently.</p>
                    <a href="#" class="service-link">Start Trading →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">📈</div>
                    <h3 class="service-title">Market Data & Analytics</h3>
                    <p class="service-description">Get comprehensive market data, technical analysis tools, and insights to make informed investment decisions.</p>
                    <a href="#" class="service-link">View Market Data →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">🏢</div>
                    <h3 class="service-title">Corporate Listings</h3>
                    <p class="service-description">List your company on USE to raise capital, increase visibility, and access a broader investor base across East Africa.</p>
                    <a href="#" class="service-link">Learn About Listing →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">💼</div>
                    <h3 class="service-title">Investment Advisory</h3>
                    <p class="service-description">Professional investment advisory services to help you build and manage a diversified portfolio aligned with your goals.</p>
                    <a href="#" class="service-link">Get Advisory →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">🎓</div>
                    <h3 class="service-title">Investor Education</h3>
                    <p class="service-description">Comprehensive education programs to help investors understand financial markets and make better investment decisions.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">🔒</div>
                    <h3 class="service-title">Secure Settlement</h3>
                    <p class="service-description">Safe and efficient trade settlement with our robust clearing and settlement systems ensuring transaction security.</p>
                    <a href="#" class="service-link">View Details →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- What We Do Section -->
    <section id="market" class="what-we-do">
        <div class="what-container">
            <div class="what-grid">
                <div class="what-content">
                    <h2>What We Do</h2>
                    <p>Uganda Securities Exchange facilitates capital formation and investment opportunities across East Africa through comprehensive market infrastructure and professional services.</p>
                    <ul class="what-list">
                        <li>Securities trading and settlement</li>
                        <li>Market data and analytics</li>
                        <li>Corporate listing services</li>
                        <li>Investment advisory services</li>
                        <li>Investor education programs</li>
                    </ul>
                    <a href="#" class="btn-primary">Learn More</a>
                </div>
                <div class="what-image"></div>
            </div>
        </div>
    </section>

    <!-- Event Banner -->
    @if($upcomingEvent)
    <div class="event-banner" id="eventBanner">
        <div class="event-banner-header">
            <div class="event-badge">Upcoming Event</div>
            <button class="event-dismiss" onclick="dismissEvent()">&times;</button>
        </div>
        <div class="event-content">
            <div class="event-title-banner">{{ $upcomingEvent->title }}</div>
            <div class="event-meta-banner">
                <div class="event-date-banner">{{ $upcomingEvent->event_date->format('M j, Y') }}</div>
                <div class="event-time-banner">{{ $upcomingEvent->event_date->format('g:i A T') }}</div>
            </div>
            @if($upcomingEvent->location)
            <div class="event-location" style="font-size: 0.85rem; color: var(--text-secondary); margin-top: 0.5rem;">
                📍 {{ $upcomingEvent->location }}
            </div>
            @endif
        </div>
        <div class="event-actions">
            <button class="event-btn event-btn-primary">Learn More</button>
            <button class="event-btn event-btn-secondary">Remind Me</button>
        </div>
    </div>
    @endif @include('partials.footer')

    <!-- Carousel JavaScript -->
    <script>
        // Hero Carousel Functionality
        let currentSlide = 0;
        let carouselInterval;
        let slides, slideContents, dots;

        function initializeCarousel() {
            slides = document.querySelectorAll('.hero-carousel-slide');
            slideContents = document.querySelectorAll('.slide-content');
            dots = document.querySelectorAll('.hero-carousel-dot');

            console.log('Carousel initialized:', {
                slides: slides.length,
                slideContents: slideContents.length,
                dots: dots.length
            });
        }

        function goToSlide(slideIndex) {
            if (!slides || slides.length === 0) return;

            console.log('Going to slide:', slideIndex);

            // Remove active class from current slide
            if (slides[currentSlide]) {
                slides[currentSlide].classList.remove('active');
            }
            if (slideContents[currentSlide]) {
                slideContents[currentSlide].classList.remove('active');
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
            if (slideContents[currentSlide]) {
                slideContents[currentSlide].classList.add('active');
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