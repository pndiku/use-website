<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <title>{{ $article->title }} - Uganda Securities Exchange</title>
    <meta name="description" content="{{ Str::limit(strip_tags($article->content), 160) }}">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($article->content), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ request()->url() }}">
    @if($article->image_url)
    <meta property="og:image" content="{{ $article->image_url }}">
    @endif
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
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

            /* Legacy color mappings */
            --primary: var(--use-blue);
            --primary-dark: var(--use-blue-dark);
            --primary-light: var(--use-blue-light);
            --success: var(--use-green);
            --danger: var(--use-red);
            --warning: var(--use-yellow);

            /* Surface Colors */
            --surface: #ffffff;
            --surface-secondary: #f7fafc;
            --surface-tertiary: #edf2f7;
            --text-primary: #1a202c;
            --text-secondary: var(--use-gray);
            --text-tertiary: #718096;
            --border: #e2e8f0;
            --border-light: #f1f5f9;

            /* Backgrounds */
            --bg-primary: var(--surface);
            --bg-secondary: var(--surface-secondary);
            --bg-accent: var(--surface-tertiary);

            /* Shadows */
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);

            /* Gradients */
            --gradient-primary: linear-gradient(135deg, var(--use-blue) 0%, var(--use-blue-light) 100%);
            --gradient-accent: linear-gradient(135deg, var(--use-yellow) 0%, var(--use-yellow-light) 100%);
            --gradient-success: linear-gradient(135deg, var(--use-green) 0%, rgba(39, 221, 90, 0.8) 100%);
            --gradient-danger: linear-gradient(135deg, var(--use-red) 0%, rgba(221, 39, 39, 0.8) 100%);
        }

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
            background: var(--surface-secondary);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Titillium Web', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-weight: 700;
            letter-spacing: -0.02em;
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
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .nav-link:hover {
            color: var(--primary);
            background: rgba(0, 128, 199, 0.05);
            transform: translateY(-1px);
            text-decoration: none;
        }

        .nav-link.active {
            color: var(--primary);
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

        /* Submenu styles - Fixed positioning */
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
            color: var(--primary);
            transform: translateX(4px);
        }

        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            gap: 0.25rem;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: rgba(0, 128, 199, 0.05);
        }

        .mobile-menu-btn span {
            width: 20px;
            height: 2px;
            background: var(--text-primary);
            transition: all 0.3s ease;
            border-radius: 1px;
        }

        /* Article Content */
        .article-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            background: transparent;
        }

        .breadcrumb {
            margin-bottom: 0;
            background: var(--gradient-primary);
            padding: 10rem 0 1.5rem 0;
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            margin-top: 0;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .breadcrumb-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .article-header {
            margin-bottom: 2rem;
            background: var(--gradient-primary);
            padding: 0 2rem 3rem 2rem;
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            margin-top: 0;
        }

        .article-header-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .article-title {
            font-family: 'Titillium Web', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
            color: white;
        }

        .article-meta {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.9);
            gap: 1.5rem;
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .article-date {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }

        .article-badge {
            background: var(--gradient-accent);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(253, 185, 19, 0.3);
        }

        .article-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
        }

        .article-content {
            background: var(--bg-primary);
            padding: 3rem;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-light);
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .article-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
        }

        .article-content p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--text-primary);
        }

        .article-content p:last-child {
            margin-bottom: 0;
        }

        /* Related Articles */
        .related-section {
            margin-top: 4rem;
            margin-bottom: 4rem;
        }

        .section-title {
            font-family: 'Titillium Web', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .related-articles {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .related-card {
            background: var(--bg-primary);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .related-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            text-decoration: none;
            color: inherit;
        }

        .related-image {
            width: 100%;
            height: 160px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            position: relative;
            overflow: hidden;
        }

        .related-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .related-card:hover .related-image::before {
            transform: translateX(100%);
        }

        .related-content {
            padding: 1.5rem;
        }

        .related-title {
            font-family: 'Titillium Web', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .related-excerpt {
            color: var(--text-secondary);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .related-date {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* Back to News */
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--gradient-primary);
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            border: 1px solid rgba(0, 128, 199, 0.3);
            box-shadow: var(--shadow-sm);
            font-size: 0.875rem;
            position: relative;
            overflow: hidden;
        }

        .back-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.2) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .back-button:hover {
            text-decoration: none;
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .back-button:hover::before {
            transform: translateX(100%);
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
        @media (max-width: 768px) {
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
                order: 2;
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0;
                min-width: 0;
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
        }

        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .footer {
                padding: 3rem 0 2rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
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

    <main class="article-container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <div class="breadcrumb-content">
                <a href="/">Home</a>
                <i class="fas fa-chevron-right"></i>
                <a href="/#news">News</a>
                <i class="fas fa-chevron-right"></i>
                <span>{{ Str::limit($article->title, 50) }}</span>
            </div>
        </nav>


        <!-- Article Header -->
        <div class="article-header">
            <div class="article-header-content">
                <h1 class="article-title">{{ $article->title }}</h1>
                <div class="article-meta">
                    <span class="article-date">
                        <i class="fas fa-calendar"></i>
                        {{ $article->getDisplayDate()->format('F j, Y') }}
                    </span>
                    <span class="article-badge">{{ $article->isReport() ? 'Report' : 'Market News' }}</span>
                </div>
            </div>
        </div>

        <!-- Article Image -->
        @if($article->image_url)
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="article-image">
        @endif

        <!-- Article Content -->
        <div class="article-content">
            @if($article->isReport() && $article->file_url)
                <!-- Report Download Section -->
                <div style="text-align: center; padding: 2rem 0;">
                    <i class="fas fa-file-pdf" style="font-size: 4rem; color: var(--use-red); margin-bottom: 1.5rem;"></i>
                    <h3 style="margin-bottom: 1rem; color: var(--text-primary);">Download Report</h3>
                    @if($article->summary)
                    <p style="margin-bottom: 2rem; color: var(--text-secondary);">{{ $article->summary }}</p>
                    @endif
                    <a href="{{ $article->file_url }}"
                       target="_blank"
                       download
                       style="display: inline-flex; align-items: center; gap: 0.75rem; background: var(--gradient-primary); color: white; padding: 1rem 2rem; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 1.1rem; box-shadow: var(--shadow-md); transition: all 0.3s ease;">
                        <i class="fas fa-download"></i>
                        Download PDF Report
                    </a>
                </div>
            @else
                <!-- Regular Article Content -->
                {!! nl2br(e($article->content)) !!}
            @endif
        </div>

        <!-- Related Articles -->
        @if($relatedArticles->count() > 0)
        <section class="related-section">
            <h2 class="section-title">Related Articles</h2>
            <div class="related-articles">
                @foreach($relatedArticles as $related)
                <a href="{{ route('news.article', $related->slug) }}" class="related-card">
                    <div class="related-image" @if($related->article_type === 'report') style="background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);" @endif>
                        @if($related->article_type === 'report')
                            <i class="fas fa-file-pdf"></i>
                        @elseif($related->image_url)
                            <img src="{{ $related->image_url }}" alt="{{ $related->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fas fa-newspaper"></i>
                        @endif
                    </div>
                    <div class="related-content">
                        <h3 class="related-title">{{ $related->title }}</h3>
                        <p class="related-excerpt">{{ $related->article_type === 'report' ? Str::limit($related->summary ?? 'Download report', 120) : Str::limit(strip_tags($related->content), 120) }}</p>
                        <span class="related-date">{{ $related->getDisplayDate()->format('M j, Y') }}@if($related->article_type === 'report') • Report @endif</span>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        @endif
    </main> @include('partials.footer')

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

        // Mobile menu toggle
        

        // Mobile dropdown toggle
        
        }

        // Initialize mobile menu functionality
        

            // Header scroll effect
            const header = document.querySelector('.header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>
</html>