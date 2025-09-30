<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Uganda Securities Exchange</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="Get in touch with Uganda Securities Exchange. Contact our team for investment inquiries, trading support, and market information.">
    <meta property="og:title" content="Contact Us - Uganda Securities Exchange">
    <meta property="og:description" content="Get in touch with Uganda Securities Exchange for investment inquiries and trading support.">
    <meta property="og:type" content="website">
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #0f172a;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        :root {
            --primary-blue: #2563eb;
            --primary-blue-dark: #1d4ed8;
            --primary-blue-light: #3b82f6;
            --surface: #ffffff;
            --surface-secondary: #f8fafc;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --border: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
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
            font-size: 1.375rem;
            font-weight: 700;
            color: var(--primary-blue);
            letter-spacing: -0.02em;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: translateY(-1px);
        }

        .logo::before {
            content: "";
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            margin-right: 8px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
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

        /* Main Content */
        .main-content {
            padding-top: 120px;
            min-height: 100vh;
            background: var(--surface-secondary);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            padding: 4rem 0;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
        }

        .page-header-content {
            position: relative;
            z-index: 2;
        }

        .page-title {
            font-size: clamp(2.5rem, 4vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        .page-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Contact Section */
        .contact-section {
            padding: 6rem 0;
            background: var(--surface);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .contact-info {
            background: var(--surface);
            padding: 3rem;
            border-radius: 20px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-lg);
        }

        .contact-info h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: var(--surface-secondary);
            transform: translateY(-2px);
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .contact-details h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .contact-details p {
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .contact-details a {
            color: var(--primary-blue);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-details a:hover {
            color: var(--primary-blue-dark);
        }

        /* Contact Form */
        .contact-form {
            background: var(--surface);
            padding: 3rem;
            border-radius: 20px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-lg);
        }

        .contact-form h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--surface);
            color: var(--text-primary);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-secondary);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn-submit {
            background: var(--primary-blue);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            justify-content: center;
        }

        .btn-submit:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Office Hours */
        .office-hours {
            background: var(--surface-secondary);
            padding: 2rem;
            border-radius: 12px;
            margin-top: 2rem;
        }

        .office-hours h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .hours-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .hours-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .hours-item.today {
            color: var(--primary-blue);
            font-weight: 600;
        }

        /* Map Section */
        .map-section {
            padding: 6rem 0;
            background: var(--surface-secondary);
        }

        .map-container {
            background: var(--surface);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
        }

        .map-placeholder {
            height: 400px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Footer */
        .footer {
            background: #1e293b;
            color: white;
            padding: 3rem 0 2rem;
        }

        .footer-content {
            text-align: center;
        }

        .footer-content p {
            color: #94a3b8;
            margin-bottom: 1rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--primary-blue);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                display: none;
            }

            .contact-info,
            .contact-form {
                padding: 2rem;
            }

            .page-header {
                padding: 3rem 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <nav class="nav-container">
            <a href="/" class="logo">USE</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="/listings" class="nav-link">Listings</a>
                </li>
                <li class="nav-item">
                    <a href="/investors" class="nav-link">Investors</a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link active">Contact</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Page Header -->
        <section class="page-header">
            <div class="container">
                <div class="page-header-content">
                    <h1 class="page-title">Contact Us</h1>
                    <p class="page-subtitle">Get in touch with our team for investment inquiries, trading support, and market information</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section">
            <div class="container">
                <div class="contact-grid">
                    <!-- Contact Information -->
                    <div class="contact-info">
                        <h3>Get In Touch</h3>
                        
                        <div class="contact-item">
                            <div class="contact-icon">📍</div>
                            <div class="contact-details">
                                <h4>Our Location</h4>
                                <p>Plot 24/26 Kampala Road<br>Kampala, Uganda<br>P.O. Box 23552</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">📞</div>
                            <div class="contact-details">
                                <h4>Phone Numbers</h4>
                                <p><a href="tel:+256414230738">+256 414 230 738</a><br>
                                <a href="tel:+256414230739">+256 414 230 739</a></p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">✉️</div>
                            <div class="contact-details">
                                <h4>Email Addresses</h4>
                                <p>General Inquiries: <a href="mailto:info@use.co.ug">info@use.co.ug</a><br>
                                Trading Support: <a href="mailto:trading@use.co.ug">trading@use.co.ug</a><br>
                                Listing Inquiries: <a href="mailto:listings@use.co.ug">listings@use.co.ug</a></p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">🌐</div>
                            <div class="contact-details">
                                <h4>Online Resources</h4>
                                <p>Website: <a href="https://use.co.ug">www.use.co.ug</a><br>
                                Investor Portal: <a href="/login">Login to Trade</a></p>
                            </div>
                        </div>

                        <div class="office-hours">
                            <h4>Trading Hours</h4>
                            <div class="hours-list">
                                <div class="hours-item today">
                                    <span>Monday - Friday</span>
                                    <span>9:00 AM - 3:00 PM</span>
                                </div>
                                <div class="hours-item">
                                    <span>Saturday - Sunday</span>
                                    <span>Closed</span>
                                </div>
                                <div class="hours-item">
                                    <span>Public Holidays</span>
                                    <span>Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form">
                        <h3>Send Us a Message</h3>
                        <form method="POST" action="/contact" id="contactForm">
                            @csrf
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">First Name *</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Your first name" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name *</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Your last name" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control" placeholder="your.email@example.com" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="+256 xxx xxx xxx">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Inquiry Type *</label>
                                <select name="inquiry_type" class="form-control" required>
                                    <option value="">Select inquiry type</option>
                                    <option value="general">General Information</option>
                                    <option value="trading">Trading Support</option>
                                    <option value="listing">Company Listing</option>
                                    <option value="investment">Investment Advisory</option>
                                    <option value="education">Investor Education</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="partnership">Partnership Opportunities</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Subject *</label>
                                <input type="text" name="subject" class="form-control" placeholder="Brief subject of your inquiry" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Message *</label>
                                <textarea name="message" class="form-control" placeholder="Please provide detailed information about your inquiry..." required></textarea>
                            </div>

                            <button type="submit" class="btn-submit">
                                <span>Send Message</span>
                                <span>✉️</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="map-section">
            <div class="container">
                <div class="map-container">
                    <div class="map-placeholder">
                        📍 Uganda Securities Exchange<br>
                        Plot 24/26 Kampala Road, Kampala
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>&copy; 2025 Uganda Securities Exchange. All rights reserved.</p>
                <div class="footer-links">
                    <a href="/terms" class="footer-link">Terms & Conditions</a>
                    <a href="/privacy" class="footer-link">Privacy Policy</a>
                    <a href="/risk-disclosure" class="footer-link">Risk Disclosure</a>
                    <a href="/complaints" class="footer-link">Complaints Procedure</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#ef4444';
                } else {
                    field.style.borderColor = '#e2e8f0';
                }
            });
            
            if (isValid) {
                // Here you would typically submit the form to your backend
                alert('Thank you for your message! We\'ll get back to you within 24 hours.');
                this.reset();
            } else {
                alert('Please fill in all required fields.');
            }
        });

        // Remove error styling on input
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = '#e2e8f0';
            });
        });
    </script>
</body>
</html>