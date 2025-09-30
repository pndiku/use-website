<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uganda Securities Exchange - Next Generation Financial Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0066ff;
            --primary-dark: #0052cc;
            --primary-light: #3385ff;
            --accent: #00d4aa;
            --accent-secondary: #ff6b35;
            --surface: rgba(255, 255, 255, 0.95);
            --surface-glass: rgba(255, 255, 255, 0.08);
            --surface-glass-2: rgba(255, 255, 255, 0.12);
            --text-primary: #0a0a0a;
            --text-secondary: #525252;
            --text-tertiary: #737373;
            --border-glass: rgba(255, 255, 255, 0.15);
            --shadow-glass: 0 8px 32px rgba(0, 0, 0, 0.1);
            --shadow-intense: 0 20px 40px rgba(0, 0, 0, 0.15);
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-dark: linear-gradient(135deg, #0c0c0c 0%, #1a1a1a 100%);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
            color: var(--text-primary);
            overflow-x: hidden;
            min-height: 100vh;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Floating Particles Background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0px) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-10vh) translateX(100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Glassmorphism Header */
        .header {
            position: fixed;
            top: 1rem;
            left: 50%;
            transform: translateX(-50%);
            background: var(--surface-glass);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid var(--border-glass);
            border-radius: 24px;
            padding: 0.75rem 2rem;
            z-index: 1000;
            width: calc(100% - 2rem);
            max-width: 1400px;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .header.scrolled {
            background: var(--surface);
            box-shadow: var(--shadow-intense);
            border-color: rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .logo {
            font-size: 1.75rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.03em;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0.5rem;
            background: var(--surface-glass-2);
            padding: 0.5rem;
            border-radius: 16px;
            backdrop-filter: blur(10px);
        }

        .nav-link {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--surface);
            color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-glass);
        }

        .cta-button {
            background: linear-gradient(135deg, var(--accent), var(--accent-secondary));
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: var(--shadow-glass);
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
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: var(--shadow-intense);
        }

        /* Hero Section with 3D Elements */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 8rem 0 4rem;
            z-index: 2;
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-content {
            z-index: 3;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--surface-glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-glass);
            border-radius: 50px;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: white;
            margin-bottom: 1.5rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .hero-title {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 900;
            line-height: 0.9;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, white 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.04em;
            animation: titleSlide 1s ease-out;
        }

        @keyframes titleSlide {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-subtitle {
            font-size: 1.25rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
            font-weight: 400;
            animation: subtitleSlide 1s ease-out 0.3s both;
        }

        @keyframes subtitleSlide {
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
            animation: buttonsSlide 1s ease-out 0.6s both;
        }

        @keyframes buttonsSlide {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent-secondary));
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: var(--shadow-glass);
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
            transition: left 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: var(--shadow-intense);
        }

        .btn-secondary {
            background: var(--surface-glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-glass);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .btn-secondary:hover {
            background: var(--surface);
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-glass);
        }

        /* 3D Floating Dashboard */
        .hero-dashboard {
            perspective: 1000px;
            animation: dashboardFloat 1s ease-out 0.9s both;
        }

        @keyframes dashboardFloat {
            0% {
                opacity: 0;
                transform: translateY(50px) rotateX(20deg);
            }
            100% {
                opacity: 1;
                transform: translateY(0) rotateX(0deg);
            }
        }

        .dashboard-3d {
            position: relative;
            transform-style: preserve-3d;
            animation: rotate3d 20s linear infinite;
        }

        @keyframes rotate3d {
            0% { transform: rotateY(0deg) rotateX(5deg); }
            100% { transform: rotateY(360deg) rotateX(5deg); }
        }

        .dashboard-card {
            background: var(--surface-glass);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid var(--border-glass);
            border-radius: 24px;
            padding: 2rem;
            margin-bottom: 1rem;
            box-shadow: var(--shadow-glass);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .dashboard-card:hover::before {
            left: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-5px) translateZ(20px);
            box-shadow: var(--shadow-intense);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 600;
            color: white;
        }

        .card-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--accent), var(--accent-secondary));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.875rem;
        }

        .metric-value {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--accent), white);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            font-family: 'JetBrains Mono', monospace;
        }

        .metric-change {
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .metric-change.positive {
            color: var(--accent);
        }

        .metric-change.negative {
            color: var(--accent-secondary);
        }

        /* Live Chart */
        .live-chart {
            height: 80px;
            background: var(--surface-glass);
            border-radius: 12px;
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
        }

        .chart-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--accent), var(--accent-secondary));
            clip-path: polygon(0 100%, 0 80%, 10% 75%, 20% 85%, 30% 70%, 40% 80%, 50% 65%, 60% 75%, 70% 60%, 80% 70%, 90% 55%, 100% 65%, 100% 100%);
            animation: chartPulse 3s ease-in-out infinite;
        }

        @keyframes chartPulse {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }

        /* Immersive Sections */
        .section {
            position: relative;
            padding: 8rem 0;
            z-index: 2;
        }

        .section-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-badge {
            display: inline-block;
            background: var(--surface-glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-glass);
            border-radius: 50px;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: white;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, white 0%, rgba(255, 255, 255, 0.7) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.03em;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .service-card {
            background: var(--surface-glass);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid var(--border-glass);
            border-radius: 24px;
            padding: 3rem 2rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .service-card:hover::before {
            left: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-intense);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--accent), var(--accent-secondary));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin: 0 auto 1.5rem;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .service-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .service-description {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .service-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .service-link:hover {
            transform: translateX(5px);
            color: white;
        }

        /* Market Data Stream */
        .market-stream {
            background: var(--surface-glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-glass);
            border-radius: 24px;
            padding: 2rem;
            margin: 4rem 0;
            overflow: hidden;
            position: relative;
        }

        .stream-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .stream-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
        }

        .stream-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--accent);
            font-weight: 500;
        }

        .stream-indicator {
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .market-ticker {
            display: flex;
            gap: 2rem;
            animation: scroll 30s linear infinite;
        }

        @keyframes scroll {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        .ticker-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            min-width: 120px;
            padding: 1rem;
            background: var(--surface-glass-2);
            border-radius: 16px;
            backdrop-filter: blur(10px);
        }

        .ticker-symbol {
            font-weight: 700;
            color: white;
            font-size: 0.875rem;
        }

        .ticker-price {
            font-family: 'JetBrains Mono', monospace;
            color: var(--accent);
            font-weight: 600;
        }

        .ticker-change {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.25rem 0.5rem;
            border-radius: 8px;
        }

        .ticker-change.positive {
            background: rgba(0, 212, 170, 0.2);
            color: var(--accent);
        }

        .ticker-change.negative {
            background: rgba(255, 107, 53, 0.2);
            color: var(--accent-secondary);
        }

        /* Mobile Responsiveness */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 3rem;
                text-align: center;
            }

            .services-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero-title {
                font-size: clamp(2rem, 8vw, 3.5rem);
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .dashboard-3d {
                animation: none;
            }
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: fadeOut 2s ease-out 1s forwards;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                visibility: hidden;
            }
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 3px solid rgba(255, 255, 255, 0.1);
            border-top: 3px solid var(--accent);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Cursor Trail Effect */
        .cursor-trail {
            position: fixed;
            width: 20px;
            height: 20px;
            background: radial-gradient(circle, var(--accent) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .cursor-trail.active {
            opacity: 0.6;
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>

    <!-- Particles Background -->
    <div class="particles" id="particles"></div>

    <!-- Cursor Trail -->
    <div class="cursor-trail" id="cursorTrail"></div>

    <!-- Header -->
    <header class="header" id="header">
        <nav class="nav-container">
            <div class="logo">USE</div>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link active">Home</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#market" class="nav-link">Market</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
            </ul>
            <a href="#" class="cta-button">Start Trading</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-chart-line"></i>
                    <span>Live Market Data</span>
                </div>
                <h1 class="hero-title">Next-Gen Financial Platform</h1>
                <p class="hero-subtitle">
                    Experience the future of trading with our AI-powered platform.
                    Real-time analytics, immersive data visualization, and seamless trading execution.
                </p>
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">Launch Platform</a>
                    <a href="#" class="btn-secondary">Watch Demo</a>
                </div>
            </div>
            <div class="hero-dashboard">
                <div class="dashboard-3d">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-title">Market Index</div>
                            <div class="card-icon">
                                <i class="fas fa-trending-up"></i>
                            </div>
                        </div>
                        <div class="metric-value">2,847.52</div>
                        <div class="metric-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>+2.3% (64.8)</span>
                        </div>
                        <div class="live-chart">
                            <div class="chart-line"></div>
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-title">Volume</div>
                            <div class="card-icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                        </div>
                        <div class="metric-value">1.2B</div>
                        <div class="metric-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>+12.5%</span>
                        </div>
                    </div>
                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-title">Active Trades</div>
                            <div class="card-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                        </div>
                        <div class="metric-value">8,423</div>
                        <div class="metric-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>Real-time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Market Data Stream -->
    <div class="market-stream">
        <div class="stream-header">
            <div class="stream-title">Live Market Feed</div>
            <div class="stream-status">
                <div class="stream-indicator"></div>
                <span>Real-time</span>
            </div>
        </div>
        <div class="market-ticker" id="marketTicker">
            <div class="ticker-item">
                <div class="ticker-symbol">BATU</div>
                <div class="ticker-price">15,000</div>
                <div class="ticker-change positive">+2.3%</div>
            </div>
            <div class="ticker-item">
                <div class="ticker-symbol">UCL</div>
                <div class="ticker-price">4,200</div>
                <div class="ticker-change negative">-1.2%</div>
            </div>
            <div class="ticker-item">
                <div class="ticker-symbol">NIC</div>
                <div class="ticker-price">8,500</div>
                <div class="ticker-change positive">+0.8%</div>
            </div>
            <div class="ticker-item">
                <div class="ticker-symbol">UMEME</div>
                <div class="ticker-price">2,150</div>
                <div class="ticker-change positive">+1.5%</div>
            </div>
            <div class="ticker-item">
                <div class="ticker-symbol">STANBIC</div>
                <div class="ticker-price">6,800</div>
                <div class="ticker-change negative">-0.5%</div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="section-container">
            <div class="section-header">
                <div class="section-badge">Our Services</div>
                <h2 class="section-title">Revolutionary Trading Experience</h2>
                <p class="section-subtitle">
                    Advanced tools and features designed for the modern investor,
                    powered by cutting-edge technology and real-time insights.
                </p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3 class="service-title">AI-Powered Analytics</h3>
                    <p class="service-description">
                        Advanced machine learning algorithms provide intelligent market insights
                        and predictive analytics for smarter trading decisions.
                    </p>
                    <a href="#" class="service-link">
                        Explore AI Features <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <h3 class="service-title">3D Market Visualization</h3>
                    <p class="service-description">
                        Immersive 3D charts and data visualization bring market movements
                        to life with stunning visual clarity and depth.
                    </p>
                    <a href="#" class="service-link">
                        View Demo <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-lightning-bolt"></i>
                    </div>
                    <h3 class="service-title">Ultra-Fast Execution</h3>
                    <p class="service-description">
                        Lightning-fast trade execution with sub-millisecond latency
                        ensuring you never miss market opportunities.
                    </p>
                    <a href="#" class="service-link">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="service-title">Bank-Grade Security</h3>
                    <p class="service-description">
                        Military-grade encryption and multi-layer security protocols
                        protect your investments and personal data.
                    </p>
                    <a href="#" class="service-link">
                        Security Details <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3 class="service-title">Smart Predictions</h3>
                    <p class="service-description">
                        AI-driven market predictions and sentiment analysis
                        help you stay ahead of market trends and movements.
                    </p>
                    <a href="#" class="service-link">
                        Try Predictions <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="service-title">Mobile-First Design</h3>
                    <p class="service-description">
                        Seamless trading experience across all devices with
                        responsive design and native mobile applications.
                    </p>
                    <a href="#" class="service-link">
                        Download App <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        // Create floating particles
        function createParticles() {
            const particles = document.getElementById('particles');
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.width = particle.style.height = Math.random() * 4 + 2 + 'px';
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particles.appendChild(particle);
            }
        }

        // Cursor trail effect
        function initCursorTrail() {
            const trail = document.getElementById('cursorTrail');
            let mouseX = 0, mouseY = 0;
            let trailX = 0, trailY = 0;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                trail.classList.add('active');
            });

            document.addEventListener('mouseleave', () => {
                trail.classList.remove('active');
            });

            function updateTrail() {
                trailX += (mouseX - trailX) * 0.1;
                trailY += (mouseY - trailY) * 0.1;
                trail.style.left = trailX + 'px';
                trail.style.top = trailY + 'px';
                requestAnimationFrame(updateTrail);
            }
            updateTrail();
        }

        // Header scroll effect
        function initHeaderScroll() {
            const header = document.getElementById('header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        }

        // Smooth scroll for navigation
        function initSmoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }

        // Animate market ticker with real-time updates
        function animateMarketData() {
            const ticker = document.getElementById('marketTicker');
            const items = ticker.children;

            setInterval(() => {
                Array.from(items).forEach(item => {
                    const priceElement = item.querySelector('.ticker-price');
                    const changeElement = item.querySelector('.ticker-change');

                    // Simulate price changes
                    const currentPrice = parseFloat(priceElement.textContent.replace(',', ''));
                    const changePercent = (Math.random() - 0.5) * 5; // -2.5% to +2.5%
                    const newPrice = Math.round(currentPrice * (1 + changePercent / 100));

                    priceElement.textContent = newPrice.toLocaleString();
                    changeElement.textContent = (changePercent >= 0 ? '+' : '') + changePercent.toFixed(1) + '%';
                    changeElement.className = 'ticker-change ' + (changePercent >= 0 ? 'positive' : 'negative');
                });
            }, 3000);
        }

        // Initialize everything
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            initCursorTrail();
            initHeaderScroll();
            initSmoothScroll();
            animateMarketData();
        });

        // Navigation active state
        function updateActiveNav() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');

            window.addEventListener('scroll', () => {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (window.scrollY >= sectionTop - 200) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.add('active');
                    }
                });
            });
        }

        updateActiveNav();
    </script>
</body>
</html>