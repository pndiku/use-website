<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

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
            font-family: 'Poppins', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--bg-secondary);
            padding-top: 120px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-weight: 600;
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
            font-family: 'Poppins', sans-serif;
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
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: rgba(0, 128, 199, 0.1);
            border-radius: 20px;
            font-size: 0.85rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 128, 199, 0.2);
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--use-green);
            animation: pulse 2s infinite;
        }

        .status-indicator.open {
            background: var(--use-green);
        }

        .status-indicator.closed {
            background: var(--use-red);
            animation: none;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .status-text {
            font-weight: 600;
            color: var(--text-primary);
        }

        .status-time {
            color: var(--text-secondary);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            background: rgba(248, 250, 252, 0.8);
            padding: 0.375rem;
            border-radius: 12px;
            border: 1px solid rgba(226, 232, 240, 0.6);
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

        .dropdown-item.has-submenu {
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        /* Submenu styles */
        .submenu {
            position: absolute !important;
            top: 0 !important;
            left: calc(100% + 5px) !important;
            background: white !important;
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border) !important;
            min-width: 200px !important;
            padding: 0.5rem !important;
            opacity: 0 !important;
            visibility: hidden !important;
            transform: translateX(-10px) !important;
            transition: all 0.3s ease !important;
            z-index: 1050 !important;
            display: block !important;
        }

        /* Ensure dropdown container doesn't clip submenu */
        .dropdown {
            overflow: visible !important;
        }

        /* Show submenu on hover */
        .has-submenu:hover .submenu,
        .dropdown-item:hover .submenu,
        a.has-submenu:hover .submenu,
        a.dropdown-item.has-submenu:hover .submenu {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateX(0) !important;
        }

        .has-submenu:hover > .submenu {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateX(0) !important;
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
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .article-header {
            margin-bottom: 2rem;
        }

        .article-title {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
            color: var(--text-primary);
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .article-date {
            color: var(--text-secondary);
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
        }

        .section-title {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
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
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
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
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 5rem 0 2rem;
            position: relative;
            margin-top: 4rem;
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
            font-family: 'Poppins', sans-serif;
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
            font-family: 'Poppins', sans-serif;
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
        @media (max-width: 768px) {
            body {
                padding-top: 100px;
            }

            .header {
                top: 0.5rem;
                width: calc(100% - 1rem);
            }

            .nav-container {
                padding: 0 1rem;
                height: 56px;
            }

            .logo {
                font-size: 1.25rem;
            }

            .market-status {
                padding: 0.375rem 0.75rem;
                font-size: 0.75rem;
                gap: 0.5rem;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: calc(100% + 1rem);
                left: 1rem;
                right: 1rem;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 12px;
                border: 1px solid var(--border);
                box-shadow: var(--shadow-lg);
                padding: 1rem;
                flex-direction: column;
                gap: 0;
            }

            .nav-menu.active {
                display: flex;
            }

            .nav-item {
                width: 100%;
            }

            .nav-link {
                padding: 1rem;
                justify-content: space-between;
                width: 100%;
            }

            .article-container {
                padding: 0 1rem;
                margin: 1.5rem auto;
            }

            .article-title {
                font-size: 2rem;
                line-height: 1.1;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .article-content {
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
            }

            .article-content p {
                font-size: 1rem;
            }

            .back-button {
                padding: 0.75rem 1rem;
                font-size: 0.8rem;
            }

            .related-articles {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .article-title {
                font-size: 1.75rem;
            }

            .article-content {
                padding: 1.5rem 1rem;
            }

            .breadcrumb {
                font-size: 0.8rem;
            }

            .article-image {
                height: 250px;
                border-radius: 8px;
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
    <header class="header" id="header">
        <nav class="nav-container">
            <div class="logo">USE</div>
            <div class="market-status">
                <span class="status-indicator {{ ($siteContent['market_status'] ?? 'open') == 'open' ? 'open' : 'closed' }}"></span>
                <span class="status-text">{{ ucfirst($siteContent['market_status'] ?? 'Market Open') }}</span>
                <span class="status-time">{{ $siteContent['trading_hours'] ?? '9:00 AM - 3:00 PM EAT' }}</span>
            </div>
            <ul class="nav-menu">
                @foreach($menuItems as $menuItem)
                    <li class="nav-item">
                        <a href="{{ $menuItem->url ?: '#' }}" class="nav-link"
                           @if($menuItem->opens_new_tab) target="_blank" @endif
                           @if($menuItem->hasActiveChildren()) onclick="toggleMobileDropdown(event)" @endif>
                            @if($menuItem->icon) <i class="{{ $menuItem->icon }}"></i> @endif
                            {{ $menuItem->title }}
                            @if($menuItem->hasActiveChildren()) <span class="chevron-down"></span> @endif
                        </a>
                        @if($menuItem->hasActiveChildren())
                            <div class="dropdown">
                                @foreach($menuItem->activeChildren as $childItem)
                                    @if($childItem->hasActiveChildren())
                                        <a href="{{ $childItem->url ?: '#' }}" class="dropdown-item has-submenu"
                                           @if($childItem->opens_new_tab) target="_blank" @endif>
                                            @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                            {{ $childItem->title }}
                                            <span class="chevron-right"></span>
                                            <div class="submenu">
                                                @foreach($childItem->activeChildren as $grandchildItem)
                                                    <a href="{{ $grandchildItem->url ?: '#' }}" class="submenu-item"
                                                       @if($grandchildItem->opens_new_tab) target="_blank" @endif>
                                                        @if($grandchildItem->icon) <i class="{{ $grandchildItem->icon }}"></i> @endif
                                                        {{ $grandchildItem->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ $childItem->url ?: '#' }}" class="dropdown-item"
                                           @if($childItem->opens_new_tab) target="_blank" @endif>
                                            @if($childItem->icon) <i class="{{ $childItem->icon }}"></i> @endif
                                            {{ $childItem->title }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    <main class="article-container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="/">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="/#news">News</a>
            <i class="fas fa-chevron-right"></i>
            <span>{{ Str::limit($article->title, 50) }}</span>
        </nav>


        <!-- Article Header -->
        <div class="article-header">
            <h1 class="article-title">{{ $article->title }}</h1>
            <div class="article-meta">
                <span class="article-date">
                    <i class="fas fa-calendar"></i>
                    {{ $article->created_at->format('F j, Y') }}
                </span>
                <span class="article-badge">Market News</span>
            </div>
        </div>

        <!-- Article Image -->
        @if($article->image_url)
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="article-image">
        @endif

        <!-- Article Content -->
        <div class="article-content">
            {!! nl2br(e($article->content)) !!}
        </div>

        <!-- Related Articles -->
        @if($relatedArticles->count() > 0)
        <section class="related-section">
            <h2 class="section-title">Related Articles</h2>
            <div class="related-articles">
                @foreach($relatedArticles as $related)
                <a href="{{ route('news.article', $related->id) }}" class="related-card">
                    <div class="related-image">
                        @if($related->image_url)
                            <img src="{{ $related->image_url }}" alt="{{ $related->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fas fa-newspaper"></i>
                        @endif
                    </div>
                    <div class="related-content">
                        <h3 class="related-title">{{ $related->title }}</h3>
                        <p class="related-excerpt">{{ Str::limit(strip_tags($related->content), 120) }}</p>
                        <span class="related-date">{{ $related->created_at->format('M j, Y') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        @endif
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>Uganda Securities Exchange</h3>
                    <p>Driving Uganda's capital markets forward with innovation, transparency, and excellence. Building the future of African finance.</p>
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
                    <h4>Markets</h4>
                    <div class="footer-links">
                        <a href="#" class="footer-link">Equities</a>
                        <a href="#" class="footer-link">Bonds</a>
                        <a href="#" class="footer-link">Market Data</a>
                        <a href="#" class="footer-link">Listed Companies</a>
                        <a href="#" class="footer-link">Trading Hours</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Services</h4>
                    <div class="footer-links">
                        <a href="#" class="footer-link">Listing Services</a>
                        <a href="#" class="footer-link">Market Making</a>
                        <a href="#" class="footer-link">Clearing & Settlement</a>
                        <a href="#" class="footer-link">Registry Services</a>
                        <a href="#" class="footer-link">Training</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Resources</h4>
                    <div class="footer-links">
                        <a href="#" class="footer-link">Market Reports</a>
                        <a href="#" class="footer-link">Investor Education</a>
                        <a href="#" class="footer-link">Downloads</a>
                        <a href="#" class="footer-link">Contact</a>
                        <a href="#" class="footer-link">Support</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div>
                    <p>&copy; {{ date('Y') }} Uganda Securities Exchange. All rights reserved.</p>
                </div>
                <div>
                    <a href="#" class="footer-link">Privacy Policy</a> |
                    <a href="#" class="footer-link">Terms of Service</a> |
                    <a href="#" class="footer-link">Disclaimer</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.querySelector('.nav-menu');
            menu.classList.toggle('active');
        }

        // Mobile dropdown toggle
        function toggleMobileDropdown(event) {
            if (window.innerWidth <= 768) {
                event.preventDefault();
                const dropdown = event.currentTarget.nextElementSibling;
                const chevron = event.currentTarget.querySelector('.chevron-down');

                if (dropdown && dropdown.classList.contains('dropdown')) {
                    dropdown.classList.toggle('active');
                    chevron.style.transform = dropdown.classList.contains('active')
                        ? 'rotate(225deg)'
                        : 'rotate(45deg)';
                }
            }
        }

        // Initialize mobile menu functionality
        document.addEventListener('DOMContentLoaded', () => {
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            const navLinks = document.querySelectorAll('.nav-link');

            if (mobileBtn) {
                mobileBtn.addEventListener('click', toggleMobileMenu);
            }

            // Add click handlers for mobile dropdown toggles
            navLinks.forEach(link => {
                if (link.querySelector('.chevron-down')) {
                    link.addEventListener('click', toggleMobileDropdown);
                }
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', (e) => {
                const menu = document.querySelector('.nav-menu');
                const mobileBtn = document.querySelector('.mobile-menu-btn');
                const header = document.querySelector('.header');

                if (menu && menu.classList.contains('active')) {
                    if (!header.contains(e.target)) {
                        menu.classList.remove('active');
                    }
                }
            });

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