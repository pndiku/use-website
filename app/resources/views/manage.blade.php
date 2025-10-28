<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management - Uganda Securities Exchange</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Quill.js Rich Text Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <style>
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
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--surface-secondary);
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 2rem;
            border-bottom: 1px solid var(--border);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-blue);
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1rem 0;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-section-title {
            padding: 0 2rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 2rem;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .nav-item:hover {
            color: var(--primary-blue);
            background: rgba(37, 99, 235, 0.05);
        }

        .nav-item.active {
            color: var(--primary-blue);
            background: rgba(37, 99, 235, 0.1);
            border-left-color: var(--primary-blue);
        }

        .nav-item i {
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid var(--border);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .user-role {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        .logout-btn {
            padding: 0.5rem;
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            color: var(--danger);
            background: rgba(239, 68, 68, 0.1);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .header-actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--surface);
            color: var(--text-secondary);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            color: var(--text-primary);
            border-color: var(--text-secondary);
        }

        .content {
            flex: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
            max-width: 1400px;
        }

        .card {
            background: var(--surface);
            border-radius: 12px;
            border: 1px solid var(--border);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .card-body {
            padding: 1.5rem;
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
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: var(--surface);
            color: var(--text-primary);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-control[readonly] {
            background: var(--surface-secondary);
            color: var(--text-secondary);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--surface);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid var(--border);
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .market-data {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .ticker-item {
            background: var(--surface);
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticker-symbol {
            font-weight: 600;
            color: var(--text-primary);
        }

        .ticker-change {
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .ticker-change.positive {
            color: var(--success);
            background: rgba(16, 185, 129, 0.1);
        }

        .ticker-change.negative {
            color: var(--danger);
            background: rgba(239, 68, 68, 0.1);
        }

        /* Notification System */
        .notification-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            max-width: 400px;
        }

        .notification {
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow-lg);
            border-left: 4px solid var(--success);
            padding: 1rem 1.5rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transform: translateX(100%);
            animation: slideInNotification 0.3s ease-out forwards;
            opacity: 0;
        }

        .notification.error {
            border-left-color: var(--danger);
        }

        .notification.warning {
            border-left-color: var(--warning);
        }

        /* Files Grid */
        .files-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            max-height: 600px;
            overflow-y: auto;
        }

        .file-item {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .file-item:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
            transform: translateY(-2px);
        }

        .file-thumbnail {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 4px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .file-thumbnail img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 4px;
        }

        .file-icon {
            font-size: 3rem;
            color: #6b7280;
        }

        .file-name {
            font-weight: 500;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
            word-break: break-word;
        }

        .file-meta {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .file-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.75rem;
            justify-content: center;
        }

        .file-actions .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .notification-content {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .notification-icon {
            font-size: 1.2rem;
        }

        .notification-text {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .notification-close {
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 0;
            margin-left: 1rem;
            transition: color 0.2s ease;
        }

        .notification-close:hover {
            color: var(--text-primary);
        }

        @keyframes slideInNotification {
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .btn-saving {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .btn-saved {
            background: var(--success) !important;
        }

        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .notification-container {
                right: 10px;
                left: 10px;
                max-width: none;
            }
        }

        /* Securities Stats Cards */
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        .security-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.2s;
        }

        .security-item:hover {
            background-color: #f9fafb;
        }

        .security-item:last-child {
            border-bottom: none;
        }

        .security-info {
            flex: 1;
        }

        .security-ticker {
            font-weight: 600;
            color: #1f2937;
            font-size: 1.1rem;
        }

        .security-name {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .security-details {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .security-price {
            font-weight: 600;
            color: #059669;
        }

        .security-change {
            font-size: 0.875rem;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
        }

        .security-change.positive {
            background-color: #dcfce7;
            color: #059669;
        }

        .security-change.negative {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .security-actions {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Notification Container -->
    <div class="notification-container" id="notificationContainer"></div>
    
    <div class="dashboard">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="/" class="logo">
                    <div class="logo-icon">U</div>
                    <span>USE Admin</span>
                </a>
            </div>
            
            <div class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Content</div>
                    <a href="#" class="nav-item active" data-section="content">
                        <i class="fas fa-chart-line"></i>
                        <span>Market Status</span>
                    </a>
                    <a href="#" class="nav-item" data-section="contact">
                        <i class="fas fa-address-book"></i>
                        <span>Contact Information</span>
                    </a>
                    <a href="#" class="nav-item" data-section="news">
                        <i class="fas fa-newspaper"></i>
                        <span>News Articles</span>
                    </a>
                    <a href="#" class="nav-item" data-section="events">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Events</span>
                    </a>
                    <a href="#" class="nav-item" data-section="securities">
                        <i class="fas fa-chart-area"></i>
                        <span>Securities</span>
                    </a>
                    <a href="#" class="nav-item" data-section="carousel">
                        <i class="fas fa-images"></i>
                        <span>Hero Carousel</span>
                    </a>
                    <a href="#" class="nav-item" data-section="files">
                        <i class="fas fa-folder-open"></i>
                        <span>File Repository</span>
                    </a>
                    <a href="#" class="nav-item" data-section="market-performance">
                        <i class="fas fa-chart-bar"></i>
                        <span>Market Performance</span>
                    </a>
                    <a href="#" class="nav-item" data-section="menu">
                        <i class="fas fa-bars"></i>
                        <span>Navigation Menu</span>
                    </a>
                </div>
                
                <div class="nav-section">
                    <div class="nav-section-title">Settings</div>
                    <a href="#" class="nav-item" data-section="users">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                    <a href="#" class="nav-item" data-section="settings">
                        <i class="fas fa-cog"></i>
                        <span>Site Settings</span>
                    </a>
                </div>
            </div>
            
            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-avatar">A</div>
                    <div class="user-info">
                        <div class="user-name">Admin User</div>
                        <div class="user-role">Site Administrator</div>
                    </div>
                    <form method="POST" action="/logout" style="margin: 0;">
                        @csrf
                        <button type="submit" class="logout-btn" title="Logout">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1 class="page-title">Content Management</h1>
                <div class="header-actions">
                    <a href="/" target="_blank" class="btn btn-secondary">
                        <i class="fas fa-external-link-alt"></i>
                        View Site
                    </a>
                    <button class="btn btn-primary" id="saveChanges">
                        <i class="fas fa-save"></i>
                        Save Changes
                    </button>
                </div>
            </header>
            
            <div class="content">
                <!-- Market Status Section -->
                <div id="content-section" class="content-section">
                    <div class="content-grid">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Market Status</h3>
                            </div>
                            <div class="card-body">
                                <form id="siteContentForm">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Market Status</label>
                                        <select name="market_status" class="form-control site-content-field" data-key="market_status">
                                            <option value="open">Market Open</option>
                                            <option value="closed">Market Closed</option>
                                            <option value="premarket">Pre-Market</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Trading Hours</label>
                                        <input type="text" name="trading_hours" class="form-control site-content-field" data-key="trading_hours" placeholder="9:00 AM - 3:00 PM EAT">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 2rem;">
                        <button class="btn btn-primary" onclick="saveSiteContent()">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div id="contact-section" class="content-section" style="display: none;">
                    <div class="content-grid">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Contact Information</h3>
                            </div>
                            <div class="card-body">
                                <form id="contactInfoForm">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="contact_email" class="form-control site-content-field" data-key="contact_email" placeholder="info@use.co.ug">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="contact_phone" class="form-control site-content-field" data-key="contact_phone" placeholder="+256 414 230 738">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea name="contact_address" class="form-control site-content-field" data-key="contact_address" placeholder="Uganda Securities Exchange, Plot 24/26 Kampala Road, Kampala, Uganda"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 2rem;">
                        <button class="btn btn-primary" onclick="saveContactInfo()">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </div>


                <!-- News Section -->
                <div id="news-section" class="content-section" style="display: none;">
                    <div class="content-grid">
                        <!-- Add News Form -->
                        <div class="card" style="grid-column: span 2;">
                            <div class="card-header">
                                <h3 class="card-title">Add News Article</h3>
                            </div>
                            <div class="card-body">
                                <form id="newsForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Article Title</label>
                                                <input type="text" id="newsTitle" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Type</label>
                                                <select id="newsType" class="form-control" onchange="toggleNewsContentFields()">
                                                    <option value="article">Article</option>
                                                    <option value="report">Report (PDF)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Summary/Excerpt</label>
                                                <textarea id="newsSummary" class="form-control" placeholder="Brief summary for homepage..." style="min-height: 80px;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Featured Image URL</label>
                                                <input type="url" id="newsImageUrl" class="form-control" placeholder="https://example.com/image.jpg">
                                                <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="openFileRepository('newsImageUrl')">
                                                    <i class="fas fa-folder-open"></i> Browse Files
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Author</label>
                                                <input type="text" id="newsAuthor" class="form-control" placeholder="Author name">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Published Date (Optional)</label>
                                                <input type="datetime-local" id="newsPublishedAt" class="form-control">
                                                <small class="text-muted">Leave empty to use current date/time</small>
                                            </div>
                                            <div class="form-group" id="newsFileGroup" style="display: none;">
                                                <label class="form-label">PDF Report File URL</label>
                                                <input type="url" id="newsFileUrl" class="form-control" placeholder="Paste file URL here (e.g., https://example.com/uploads/report.pdf)">
                                                <small class="text-muted">Copy the file URL from Files section and paste it here</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Related Securities</label>
                                                <select id="newsSecurities" class="form-control" multiple style="height: 100px;">
                                                    <!-- Securities will be loaded here -->
                                                </select>
                                                <small class="text-muted">Hold Ctrl/Cmd to select multiple securities</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <input type="checkbox" id="newsPublished" checked> Published
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="newsContentGroup">
                                                <label class="form-label">Content</label>
                                                <div id="newsContent" style="min-height: 300px; background: white; border: 1px solid #ddd; border-radius: 4px;"></div>
                                                <input type="hidden" id="newsContentInput" name="content">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Add News Article
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- News List -->
                        <div class="card" style="grid-column: span 2;">
                            <div class="card-header">
                                <h3 class="card-title">News Articles</h3>
                                <div class="d-flex gap-2">
                                    <select id="newsStatusFilter" class="form-control" style="width: auto;">
                                        <option value="all">All Articles</option>
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                    <input type="text" id="newsSearch" class="form-control" placeholder="Search articles..." style="width: 200px;">
                                    <button class="btn btn-secondary" onclick="loadNews()">
                                        <i class="fas fa-sync"></i> Refresh
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="newsList" style="max-height: 500px; overflow-y: auto;"></div>
                            </div>
                        </div>

                        <!-- Edit News Modal (as card) -->
                        <div class="card" id="editNewsCard" style="display: none; grid-column: span 2;">
                            <div class="card-header">
                                <h3 class="card-title">Edit News Article</h3>
                                <button class="btn btn-secondary btn-sm" onclick="cancelEditNews()">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                            <div class="card-body">
                                <form id="editNewsForm">
                                    @csrf
                                    <input type="hidden" id="editNewsId">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Article Title</label>
                                                <input type="text" id="editNewsTitle" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Type</label>
                                                <select id="editNewsType" class="form-control" onchange="toggleEditNewsContentFields()">
                                                    <option value="article">Article</option>
                                                    <option value="report">Report (PDF)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Summary/Excerpt</label>
                                                <textarea id="editNewsSummary" class="form-control" style="min-height: 80px;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Featured Image URL</label>
                                                <input type="url" id="editNewsImageUrl" class="form-control">
                                                <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="openFileRepository('editNewsImageUrl')">
                                                    <i class="fas fa-folder-open"></i> Browse Files
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Author</label>
                                                <input type="text" id="editNewsAuthor" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Published Date (Optional)</label>
                                                <input type="datetime-local" id="editNewsPublishedAt" class="form-control">
                                                <small class="text-muted">Leave empty to use current date/time</small>
                                            </div>
                                            <div class="form-group" id="editNewsFileGroup" style="display: none;">
                                                <label class="form-label">PDF Report File URL</label>
                                                <input type="url" id="editNewsFileUrl" class="form-control" placeholder="Paste file URL here (e.g., https://example.com/uploads/report.pdf)">
                                                <small class="text-muted">Copy the file URL from Files section and paste it here</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Related Securities</label>
                                                <select id="editNewsSecurities" class="form-control" multiple style="height: 100px;">
                                                    <!-- Securities will be loaded here -->
                                                </select>
                                                <small class="text-muted">Hold Ctrl/Cmd to select multiple securities</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <input type="checkbox" id="editNewsPublished"> Published
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="editNewsContentGroup">
                                                <label class="form-label">Content</label>
                                                <div id="editNewsContent" style="min-height: 300px; background: white; border: 1px solid #ddd; border-radius: 4px;"></div>
                                                <input type="hidden" id="editNewsContentInput" name="content">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Article
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Events Section -->
                <div id="events-section" class="content-section" style="display: none;">
                    <div class="content-grid">

                        <!-- Add Event Form -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Upcoming Event</h3>
                            </div>
                            <div class="card-body">
                                <form id="eventForm">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Event Title</label>
                                        <input type="text" id="eventTitle" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea id="eventDescription" class="form-control" required style="min-height: 100px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Event Date</label>
                                        <input type="datetime-local" id="eventDate" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Location (Optional)</label>
                                        <input type="text" id="eventLocation" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Image URL (Optional)</label>
                                        <input type="url" id="eventImageUrl" class="form-control" placeholder="https://example.com/image.jpg">
                                        <small class="form-text text-muted">Enter the full URL of the event image</small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="eventActive" checked> Active
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="eventVisible" checked> Show on Site
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Event</button>
                                </form>
                            </div>
                        </div>

                        <!-- Events List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Upcoming Events</h3>
                                <button class="btn btn-secondary" onclick="loadEvents()">
                                    <i class="fas fa-sync"></i> Refresh
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="eventsList" style="max-height: 400px; overflow-y: auto;"></div>
                            </div>
                        </div>

                        <!-- Edit Event Modal (as card) -->
                        <div class="card" id="editEventCard" style="display: none; grid-column: span 2;">
                            <div class="card-header">
                                <h3 class="card-title">Edit Event</h3>
                                <button class="btn btn-secondary btn-sm" onclick="cancelEditEvent()">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                            <div class="card-body">
                                <form id="editEventForm">
                                    @csrf
                                    <input type="hidden" id="editEventId">
                                    <div class="form-group">
                                        <label class="form-label">Event Title</label>
                                        <input type="text" id="editEventTitle" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea id="editEventDescription" class="form-control" required style="min-height: 100px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Event Date</label>
                                        <input type="datetime-local" id="editEventDate" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Location (Optional)</label>
                                        <input type="text" id="editEventLocation" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Image URL (Optional)</label>
                                        <input type="url" id="editEventImageUrl" class="form-control" placeholder="https://example.com/image.jpg">
                                        <small class="form-text text-muted">Enter the full URL of the event image</small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="editEventActive"> Active
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="editEventVisible"> Show on Site
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Event
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Securities Section -->
                <div id="securities-section" class="content-section" style="display: none;">
                    <div class="content-grid">
                        <!-- Add Security Form -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Security</h3>
                            </div>
                            <div class="card-body">
                                <form id="securityForm">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Security Type</label>
                                        <select id="securityType" class="form-control" required onchange="toggleFormFields()">
                                            <option value="equity">Equity</option>
                                            <option value="treasury_bond">Treasury Bond</option>
                                            <option value="treasury_bill">Treasury Bill</option>
                                        </select>
                                    </div>

                                    <!-- Fields for Equities -->
                                    <div id="equityFields">
                                        <div class="form-group">
                                            <label class="form-label">Ticker Symbol</label>
                                            <input type="text" id="securityTicker" name="ticker" class="form-control" maxlength="10" style="text-transform: uppercase;">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">ISIN</label>
                                            <input type="text" id="securityIsin" name="isin" class="form-control" maxlength="12">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" id="securityCompanyName" name="company_name" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Fields for Bonds/Bills -->
                                    <div id="bondFields" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label">ISIN</label>
                                            <input type="text" id="bondIsin" name="isin" class="form-control" maxlength="12">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Issuer Name</label>
                                            <input type="text" id="bondIssuerName" name="issuer_name" class="form-control" value="Republic of Uganda">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Type</label>
                                            <input type="text" id="bondType" name="type" class="form-control" placeholder="e.g. Fixed Rate Bond">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Issued Shares</label>
                                            <input type="number" id="bondIssuedShares" name="issued_shares" class="form-control" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Issue Date</label>
                                            <input type="date" id="bondIssueDate" name="issue_date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Rate (%)</label>
                                            <input type="number" id="bondRate" name="rate" class="form-control" step="0.0001" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Maturity Date</label>
                                            <input type="date" id="bondMaturityDate" name="maturity_date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <input type="text" id="bondCategory" name="category" class="form-control" value="Government">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="securityActive" name="is_active" checked> Active
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add Security
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Edit Security Form -->
                        <div class="card" id="editSecurityCard" style="display: none;">
                            <div class="card-header">
                                <h3 class="card-title">Edit Security</h3>
                                <button class="btn btn-secondary btn-sm" onclick="cancelEditSecurity()">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                            <div class="card-body">
                                <form id="editSecurityForm">
                                    @csrf
                                    <input type="hidden" id="editSecurityId">

                                    <div class="form-group">
                                        <label class="form-label">Security Type</label>
                                        <select id="editSecurityType" class="form-control" required onchange="toggleEditFormFields()">
                                            <option value="equity">Equity</option>
                                            <option value="treasury_bond">Treasury Bond</option>
                                            <option value="treasury_bill">Treasury Bill</option>
                                        </select>
                                    </div>

                                    <!-- Fields for Equities -->
                                    <div id="editEquityFields">
                                        <div class="form-group">
                                            <label class="form-label">Ticker Symbol</label>
                                            <input type="text" id="editSecurityTicker" name="ticker" class="form-control" maxlength="10" style="text-transform: uppercase;">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">ISIN</label>
                                            <input type="text" id="editSecurityIsin" name="isin" class="form-control" maxlength="12">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" id="editSecurityCompanyName" name="company_name" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Fields for Bonds/Bills -->
                                    <div id="editBondFields" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label">ISIN</label>
                                            <input type="text" id="editBondIsin" name="isin" class="form-control" maxlength="12">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Issuer Name</label>
                                            <input type="text" id="editBondIssuerName" name="issuer_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Type</label>
                                            <input type="text" id="editBondType" name="type" class="form-control" placeholder="e.g. Fixed Rate Bond">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Issued Shares</label>
                                            <input type="number" id="editBondIssuedShares" name="issued_shares" class="form-control" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Issue Date</label>
                                            <input type="date" id="editBondIssueDate" name="issue_date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Rate (%)</label>
                                            <input type="number" id="editBondRate" name="rate" class="form-control" step="0.0001" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Maturity Date</label>
                                            <input type="date" id="editBondMaturityDate" name="maturity_date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <input type="text" id="editBondCategory" name="category" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="editSecurityActive" name="is_active"> Active
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Security
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Securities List -->
                        <div class="card" style="grid-column: span 2;">
                            <div class="card-header">
                                <h3 class="card-title">Listed Securities</h3>
                                <div class="d-flex gap-2">
                                    <select id="securityTypeFilter" class="form-control" style="width: auto;">
                                        <option value="all">All Types</option>
                                        <option value="equity">Equities</option>
                                        <option value="bond">Bonds</option>
                                        <option value="treasury_bond">Treasury Bonds</option>
                                        <option value="treasury_bill">Treasury Bills</option>
                                    </select>
                                    <select id="securitySectorFilter" class="form-control" style="width: auto;">
                                        <option value="all">All Sectors</option>
                                    </select>
                                    <input type="text" id="securitySearch" class="form-control" placeholder="Search securities..." style="width: 200px;">
                                    <button class="btn btn-secondary" onclick="loadSecurities()">
                                        <i class="fas fa-sync"></i> Refresh
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="max-height: 600px; overflow-y: auto;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ticker/ISIN</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Rate/Details</th>
                                                <th>Maturity</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="securitiesList">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Management Section -->
                <div id="carousel-section" class="content-section" style="display: none;">
                    <div class="content-grid">
                        <!-- Add Carousel Image Form -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Carousel Image</h3>
                            </div>
                            <div class="card-body">
                                <form id="carouselForm">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Image Title</label>
                                        <input type="text" id="carouselTitle" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea id="carouselDescription" class="form-control" style="min-height: 100px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Image URL</label>
                                        <input type="url" id="carouselImageUrl" class="form-control" required placeholder="https://example.com/image.jpg">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Button Text (Optional)</label>
                                        <input type="text" id="carouselButtonText" class="form-control" placeholder="Start Trading">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Button Link (Optional)</label>
                                        <input type="url" id="carouselButtonLink" class="form-control" placeholder="https://example.com">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sort Order</label>
                                        <input type="number" id="carouselSortOrder" class="form-control" value="0" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="carouselActive" checked> Active
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Carousel Image</button>
                                </form>
                            </div>
                        </div>

                        <!-- Carousel Images List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Carousel Images</h3>
                                <button class="btn btn-secondary" onclick="loadCarouselImages()">
                                    <i class="fas fa-sync"></i> Refresh
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="carouselImagesList" style="max-height: 600px; overflow-y: auto;"></div>
                            </div>
                        </div>

                        <!-- Edit Carousel Image Modal (as card) -->
                        <div class="card" id="editCarouselCard" style="display: none;">
                            <div class="card-header">
                                <h3 class="card-title">Edit Carousel Image</h3>
                                <button class="btn btn-secondary btn-sm" onclick="cancelEditCarousel()">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                            <div class="card-body">
                                <form id="editCarouselForm">
                                    @csrf
                                    <input type="hidden" id="editCarouselId">
                                    <div class="form-group">
                                        <label class="form-label">Image Title</label>
                                        <input type="text" id="editCarouselTitle" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea id="editCarouselDescription" class="form-control" style="min-height: 100px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Image URL</label>
                                        <input type="url" id="editCarouselImageUrl" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Button Text (Optional)</label>
                                        <input type="text" id="editCarouselButtonText" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Button Link (Optional)</label>
                                        <input type="url" id="editCarouselButtonLink" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sort Order</label>
                                        <input type="number" id="editCarouselSortOrder" class="form-control" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="editCarouselActive"> Active
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Carousel Image</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Files Repository Section -->
                <div id="files-section" class="content-section" style="display: none;">
                    <div class="content-grid">
                        <!-- File Upload Form -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Upload File</h3>
                            </div>
                            <div class="card-body">
                                <form id="fileUploadForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Select File</label>
                                        <input type="file" id="fileInput" class="form-control" required accept="image/*,application/pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt">
                                        <small class="form-text text-muted">
                                            Supported: Images (JPG, PNG, GIF, WebP), PDFs, Documents (DOC, XLS, PPT). Max size: 10MB
                                        </small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description (Optional)</label>
                                        <textarea id="fileDescription" class="form-control" placeholder="Describe this file..." style="min-height: 80px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Alt Text (Optional - for images)</label>
                                        <input type="text" id="fileAltText" class="form-control" placeholder="Alternative text for accessibility">
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-upload"></i> Upload File
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- File Browser -->
                        <div class="card" style="grid-column: span 2;">
                            <div class="card-header">
                                <h3 class="card-title">File Repository</h3>
                                <div class="d-flex gap-2">
                                    <select id="fileTypeFilter" class="form-control" style="width: auto;">
                                        <option value="all">All Files</option>
                                        <option value="image">Images</option>
                                        <option value="pdf">PDFs</option>
                                        <option value="document">Documents</option>
                                        <option value="video">Videos</option>
                                        <option value="audio">Audio</option>
                                    </select>
                                    <input type="text" id="fileSearch" class="form-control" placeholder="Search files..." style="width: 200px;">
                                    <button class="btn btn-secondary" onclick="loadFiles()">
                                        <i class="fas fa-sync"></i> Refresh
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="filesGrid" class="files-grid"></div>
                                <div id="filesLoading" class="text-center" style="display: none;">
                                    <i class="fas fa-spinner fa-spin"></i> Loading files...
                                </div>
                            </div>
                        </div>

                        <!-- File Details Modal (as card) -->
                        <div class="card" id="fileDetailsCard" style="display: none; grid-column: span 3;">
                            <div class="card-header">
                                <h3 class="card-title">File Details</h3>
                                <button class="btn btn-secondary btn-sm" onclick="closeFileDetails()">
                                    <i class="fas fa-times"></i> Close
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="fileDetailsContent"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Market Performance Section -->
                <div id="market-performance-section" class="content-section" style="display: none;">
                    <div class="content-grid">
                        <!-- Add Market Performance Report Form -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" id="marketPerformanceFormTitle">Add Market Performance Report</h3>
                            </div>
                            <div class="card-body">
                                <form id="marketPerformanceForm">
                                    @csrf
                                    <input type="hidden" id="marketPerformanceId">
                                    <div class="form-group">
                                        <label class="form-label">Report Title *</label>
                                        <input type="text" id="marketPerformanceTitle" class="form-control" placeholder="e.g., Market Performance Report Q1 2025" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">File URL *</label>
                                        <div style="display: flex; gap: 0.5rem;">
                                            <input type="url" id="marketPerformanceFileUrl" class="form-control" placeholder="https://example.com/report.pdf" required style="flex: 1;">
                                            <button type="button" class="btn btn-secondary" onclick="openFileRepositoryForMarketPerformance()">
                                                <i class="fas fa-folder-open"></i> Browse Files
                                            </button>
                                        </div>
                                        <small class="form-text text-muted">
                                            Upload the PDF to File Repository first, then paste the URL here or browse files
                                        </small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">File Size</label>
                                        <input type="text" id="marketPerformanceFileSize" class="form-control" placeholder="e.g., 2.5 MB">
                                        <small class="form-text text-muted">Optional - e.g., 1.2 MB, 500 KB</small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Published Date</label>
                                        <input type="datetime-local" id="marketPerformancePublishedDate" class="form-control">
                                    </div>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> <span id="marketPerformanceSubmitText">Add Report</span>
                                        </button>
                                        <button type="button" class="btn btn-secondary" onclick="resetMarketPerformanceForm()" style="display: none;" id="marketPerformanceCancelBtn">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Market Performance Reports List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Market Performance Reports</h3>
                            </div>
                            <div class="card-body">
                                <div id="marketPerformanceList" class="table-container">
                                    <p class="text-muted">Loading reports...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu Section -->
                <div id="menu-section" class="content-section" style="display: none;">
                    <div class="content-grid">
                        <!-- Add Menu Item Form -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Menu Item</h3>
                            </div>
                            <div class="card-body">
                                <form id="menuForm">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Menu Title</label>
                                        <input type="text" id="menuTitle" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">URL (Optional)</label>
                                        <input type="text" id="menuUrl" class="form-control" placeholder="https://example.com or #section">
                                        <small class="form-text text-muted">Leave blank for dropdown menu items</small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Parent Menu</label>
                                        <select id="menuParent" class="form-control">
                                            <option value="">-- Main Menu Item --</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sort Order</label>
                                        <input type="number" id="menuSortOrder" class="form-control" value="0" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Icon (Optional)</label>
                                        <input type="text" id="menuIcon" class="form-control" placeholder="fas fa-home">
                                        <small class="form-text text-muted">FontAwesome icon class</small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description (Optional)</label>
                                        <textarea id="menuDescription" class="form-control" style="min-height: 80px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="menuActive" checked> Active
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" id="menuNewTab"> Open in New Tab
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add Menu Item
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Menu Items List -->
                        <div class="card" style="grid-column: span 2;">
                            <div class="card-header">
                                <h3 class="card-title">Navigation Menu Structure</h3>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-secondary" onclick="loadMenuItems()">
                                        <i class="fas fa-sync"></i> Refresh
                                    </button>
                                    <button class="btn btn-info" onclick="previewMenu()">
                                        <i class="fas fa-eye"></i> Preview Menu
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="menuItemsList" style="max-height: 600px; overflow-y: auto;"></div>
                            </div>
                        </div>

                        <!-- Edit Menu Item Modal (as card) -->
                        <div class="card" id="editMenuCard" style="display: none; grid-column: span 3;">
                            <div class="card-header">
                                <h3 class="card-title">Edit Menu Item</h3>
                                <button class="btn btn-secondary btn-sm" onclick="cancelEditMenu()">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                            <div class="card-body">
                                <form id="editMenuForm">
                                    @csrf
                                    <input type="hidden" id="editMenuId">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Menu Title</label>
                                                <input type="text" id="editMenuTitle" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">URL (Optional)</label>
                                                <input type="text" id="editMenuUrl" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Parent Menu</label>
                                                <select id="editMenuParent" class="form-control">
                                                    <option value="">-- Main Menu Item --</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Sort Order</label>
                                                <input type="number" id="editMenuSortOrder" class="form-control" min="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Icon (Optional)</label>
                                                <input type="text" id="editMenuIcon" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description (Optional)</label>
                                                <textarea id="editMenuDescription" class="form-control" style="min-height: 100px;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <input type="checkbox" id="editMenuActive"> Active
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <input type="checkbox" id="editMenuNewTab"> Open in New Tab
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Menu Item
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users Section -->
                <div id="users-section" class="content-section" style="display: none;">
                    <div class="content-grid">
                        <!-- Add User Form -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New User</h3>
                            </div>
                            <div class="card-body">
                                <form id="userForm">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" id="userName" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="userEmail" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" id="userPassword" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Role</label>
                                        <select id="userRole" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="editor">Editor</option>
                                            <option value="viewer">Viewer</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add User
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Users List -->
                        <div class="card" style="grid-column: span 2;">
                            <div class="card-header">
                                <h3 class="card-title">All Users</h3>
                                <button class="btn btn-secondary" onclick="loadUsers()">
                                    <i class="fas fa-sync"></i> Refresh
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="usersList" style="max-height: 600px; overflow-y: auto;">
                                    <div class="text-center text-muted py-5">
                                        <i class="fas fa-users fa-3x mb-3"></i>
                                        <p>Loading users...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit User Modal (as card) -->
                        <div class="card" id="editUserCard" style="display: none; grid-column: span 3;">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                                <button class="btn btn-secondary btn-sm" onclick="cancelEditUser()">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                            <div class="card-body">
                                <form id="editUserForm">
                                    @csrf
                                    <input type="hidden" id="editUserId">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" id="editUserName" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" id="editUserEmail" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Password (leave blank to keep current)</label>
                                                <input type="password" id="editUserPassword" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <select id="editUserRole" class="form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="editor">Editor</option>
                                                    <option value="viewer">Viewer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update User
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Helper function to escape HTML
        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, m => map[m]);
        }

        // Navigation functionality
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all nav items
                document.querySelectorAll('.nav-item').forEach(navItem => {
                    navItem.classList.remove('active');
                });

                // Add active class to clicked item
                this.classList.add('active');

                // Hide all sections
                document.querySelectorAll('.content-section').forEach(section => {
                    section.style.display = 'none';
                });

                // Show selected section
                const sectionId = this.getAttribute('data-section') + '-section';
                const section = document.getElementById(sectionId);
                if (section) {
                    section.style.display = 'block';

                    // Initialize section-specific functionality
                    const sectionName = this.getAttribute('data-section');
                    if (sectionName === 'menu') {
                        loadMenuItems();
                        loadParentOptions();
                    } else if (sectionName === 'news') {
                        loadNews();
                        loadSecuritiesForNews();
                    } else if (sectionName === 'events') {
                        loadEvents();
                    } else if (sectionName === 'users') {
                        loadUsers();
                    }
                }
            });
        });

        // Save changes functionality
        document.getElementById('saveChanges').addEventListener('click', function() {
            // Add save logic here
            alert('Changes saved successfully!');
        });

        // Form change tracking (removed auto-save)
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                console.log('Content modified - remember to save changes');
            });
        });


        // Event Management
        document.getElementById('eventForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = {
                title: document.getElementById('eventTitle').value,
                description: document.getElementById('eventDescription').value,
                event_date: document.getElementById('eventDate').value,
                location: document.getElementById('eventLocation').value,
                image_url: document.getElementById('eventImageUrl').value,
                is_active: document.getElementById('eventActive').checked,
                show_on_site: document.getElementById('eventVisible').checked,
                _token: document.querySelector('input[name="_token"]').value
            };

            try {
                const response = await fetch('/admin/events', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('Event added successfully!');
                    document.getElementById('eventForm').reset();
                    document.getElementById('eventActive').checked = true;
                    document.getElementById('eventVisible').checked = true;
                    loadEvents();
                } else {
                    throw new Error('Failed to add event');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });


        // Load Events Function  
        async function loadEvents() {
            try {
                const response = await fetch('/admin/events');
                const events = await response.json();
                
                const eventsList = document.getElementById('eventsList');
                eventsList.innerHTML = '';
                
                if (events.length === 0) {
                    eventsList.innerHTML = '<p class="text-center text-muted">No events found.</p>';
                    return;
                }

                events.forEach(event => {
                    const eventItem = document.createElement('div');
                    eventItem.className = 'border-bottom pb-3 mb-3';
                    eventItem.innerHTML = `
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${event.title}</h6>
                                <p class="text-muted small mb-1">${event.description.substring(0, 100)}...</p>
                                <small class="text-secondary d-block">Date: ${new Date(event.event_date).toLocaleDateString()}</small>
                                ${event.location ? `<small class="text-info d-block">Location: ${event.location}</small>` : ''}
                                <span class="badge ${event.is_active ? 'bg-success' : 'bg-secondary'} me-1">${event.is_active ? 'Active' : 'Inactive'}</span>
                                <span class="badge ${event.show_on_site ? 'bg-primary' : 'bg-secondary'}">${event.show_on_site ? 'Visible' : 'Hidden'}</span>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <button class="btn btn-sm btn-primary" onclick="editEvent(${event.id})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="toggleEventVisibility(${event.id}, ${!event.show_on_site})">
                                    <i class="fas fa-eye${event.show_on_site ? '-slash' : ''}"></i> ${event.show_on_site ? 'Hide' : 'Show'}
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteEvent(${event.id})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    `;
                    eventsList.appendChild(eventItem);
                });
            } catch (error) {
                console.error('Error loading events:', error);
            }
        }

        // Delete News Function
        async function deleteNews(id) {
            if (!confirm('Are you sure you want to delete this news article?')) return;
            
            try {
                const response = await fetch(`/admin/news/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    showNotification('News article deleted successfully!');
                    loadNews();
                } else {
                    throw new Error('Failed to delete news article');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        // Delete Event Function
        async function deleteEvent(id) {
            if (!confirm('Are you sure you want to delete this event?')) return;
            
            try {
                const response = await fetch(`/admin/events/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    showNotification('Event deleted successfully!');
                    loadEvents();
                } else {
                    throw new Error('Failed to delete event');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        // Toggle Event Visibility
        async function toggleEventVisibility(id, showOnSite) {
            try {
                const response = await fetch(`/admin/events/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ show_on_site: showOnSite })
                });

                if (response.ok) {
                    loadEvents();
                    showNotification(`Event ${showOnSite ? 'shown' : 'hidden'} on website`);
                } else {
                    throw new Error('Failed to update event visibility');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        // Load data when events section is shown
        document.querySelector('[data-section="events"]').addEventListener('click', function() {
            setTimeout(() => {
                loadEvents();
            }, 100);
        });

        // Load data when carousel section is shown
        document.querySelector('[data-section="carousel"]').addEventListener('click', function() {
            setTimeout(() => {
                loadCarouselImages();
            }, 100);
        });

        // Load data when files section is shown
        document.querySelector('[data-section="files"]').addEventListener('click', function() {
            setTimeout(() => {
                loadFiles();
            }, 100);
        });

        // Load data when menu section is shown
        document.querySelector('[data-section="menu"]').addEventListener('click', function() {
            setTimeout(() => {
                loadMenuItems();
                loadParentOptions();
            }, 100);
        });

        // Load data when securities section is shown
        document.querySelector('[data-section="securities"]').addEventListener('click', function() {
            setTimeout(() => {
                loadSecurities();
            }, 100);
        });

        // Securities Management Functions
        async function loadSecurities() {
            try {
                const response = await fetch('/admin/securities');
                const data = await response.json();

                const listHtml = data.data.map(security => {
                    const displayName = security.company_name || security.issuer_name || '-';
                    const tickerOrIsin = security.ticker || security.isin || '-';
                    const typeDisplay = security.security_type === 'equity' ? 'Equity' :
                                       security.security_type === 'treasury_bond' ? 'Treasury Bond' :
                                       security.security_type === 'treasury_bill' ? 'Treasury Bill' : '-';

                    let rateDetails = '-';
                    if (security.rate) {
                        rateDetails = security.rate + '%';
                    }

                    const maturityDate = security.maturity_date ?
                        new Date(security.maturity_date).toLocaleDateString() : '-';

                    return `
                        <tr>
                            <td><strong>${tickerOrIsin}</strong></td>
                            <td>${displayName}</td>
                            <td>${typeDisplay}</td>
                            <td>${rateDetails}</td>
                            <td>${maturityDate}</td>
                            <td>
                                <button class="btn btn-sm btn-primary me-1" onclick="editSecurity(${security.id})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteSecurity(${security.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                }).join('');

                document.getElementById('securitiesList').innerHTML = listHtml;
            } catch (error) {
                console.error('Error loading securities:', error);
                showNotification('Error loading securities', 'error');
            }
        }

        function toggleEditFormFields() {
            const securityType = document.getElementById('editSecurityType').value;
            const equityFields = document.getElementById('editEquityFields');
            const bondFields = document.getElementById('editBondFields');

            if (securityType === 'equity') {
                equityFields.style.display = 'block';
                bondFields.style.display = 'none';
            } else {
                equityFields.style.display = 'none';
                bondFields.style.display = 'block';
            }
        }

        async function editSecurity(id) {
            try {
                const response = await fetch(`/admin/securities/${id}`);
                const security = await response.json();

                // Populate the form
                document.getElementById('editSecurityId').value = security.id;
                document.getElementById('editSecurityType').value = security.security_type;

                // Set active checkbox
                document.getElementById('editSecurityActive').checked = security.is_active;

                if (security.security_type === 'equity') {
                    // Populate equity fields
                    document.getElementById('editSecurityTicker').value = security.ticker || '';
                    document.getElementById('editSecurityIsin').value = security.isin || '';
                    document.getElementById('editSecurityCompanyName').value = security.company_name || '';
                } else {
                    // Populate bond/bill fields
                    document.getElementById('editBondIsin').value = security.isin || '';
                    document.getElementById('editBondIssuerName').value = security.issuer_name || '';
                    document.getElementById('editBondType').value = security.type || '';
                    document.getElementById('editBondIssuedShares').value = security.issued_shares || '';
                    document.getElementById('editBondRate').value = security.rate || '';
                    document.getElementById('editBondCategory').value = security.category || '';

                    // Format dates for input fields
                    if (security.issue_date) {
                        const issueDate = new Date(security.issue_date);
                        document.getElementById('editBondIssueDate').value = issueDate.toISOString().split('T')[0];
                    }
                    if (security.maturity_date) {
                        const maturityDate = new Date(security.maturity_date);
                        document.getElementById('editBondMaturityDate').value = maturityDate.toISOString().split('T')[0];
                    }
                }

                // Toggle form fields based on security type
                toggleEditFormFields();

                // Show edit form
                document.getElementById('editSecurityCard').style.display = 'block';
                document.getElementById('editSecurityCard').scrollIntoView({ behavior: 'smooth' });

            } catch (error) {
                console.error('Error loading security for edit:', error);
                showNotification('Error loading security', 'error');
            }
        }

        function cancelEditSecurity() {
            document.getElementById('editSecurityCard').style.display = 'none';
            document.getElementById('editSecurityForm').reset();
        }

        document.getElementById('editSecurityForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const securityId = document.getElementById('editSecurityId').value;
            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());
            data.is_active = document.getElementById('editSecurityActive').checked;
            data.security_type = document.getElementById('editSecurityType').value;

            try {
                const response = await fetch(`/admin/securities/${securityId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    showNotification('Security updated successfully');
                    cancelEditSecurity();
                    loadSecurities();
                } else {
                    const errorData = await response.json();
                    showNotification(errorData.message || 'Error updating security', 'error');
                }
            } catch (error) {
                console.error('Error updating security:', error);
                showNotification('Error updating security', 'error');
            }
        });

        function toggleFormFields() {
            const securityType = document.getElementById('securityType').value;
            const equityFields = document.getElementById('equityFields');
            const bondFields = document.getElementById('bondFields');

            if (securityType === 'equity') {
                equityFields.style.display = 'block';
                bondFields.style.display = 'none';
            } else {
                equityFields.style.display = 'none';
                bondFields.style.display = 'block';
            }
        }

        document.getElementById('securityForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());
            data.is_active = document.getElementById('securityActive').checked;
            data.security_type = document.getElementById('securityType').value;

            try {
                const response = await fetch('/admin/securities', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    showNotification('Security added successfully');
                    this.reset();
                    toggleFormFields(); // Reset form visibility
                    loadSecurities();
                } else {
                    const errorData = await response.json();
                    showNotification(errorData.message || 'Error adding security', 'error');
                }
            } catch (error) {
                console.error('Error adding security:', error);
                showNotification('Error adding security', 'error');
            }
        });

        async function deleteSecurity(id) {
            if (!confirm('Are you sure you want to delete this security?')) return;

            try {
                const response = await fetch(`/admin/securities/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    showNotification('Security deleted successfully');
                    loadSecurities();
                } else {
                    showNotification('Error deleting security', 'error');
                }
            } catch (error) {
                console.error('Error deleting security:', error);
                showNotification('Error deleting security', 'error');
            }
        }

        // Notification System
        function showNotification(message, type = 'success') {
            const container = document.getElementById('notificationContainer');
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            
            const icons = {
                success: '✅',
                error: '❌',
                warning: '⚠️'
            };
            
            notification.innerHTML = `
                <div class="notification-content">
                    <span class="notification-icon">${icons[type] || icons.success}</span>
                    <span class="notification-text">${message}</span>
                </div>
                <button class="notification-close">&times;</button>
            `;
            
            container.appendChild(notification);
            
            // Auto remove after 4 seconds
            const autoRemove = setTimeout(() => {
                removeNotification(notification);
            }, 4000);
            
            // Manual close
            notification.querySelector('.notification-close').addEventListener('click', () => {
                clearTimeout(autoRemove);
                removeNotification(notification);
            });
        }

        function removeNotification(notification) {
            notification.style.transform = 'translateX(100%)';
            notification.style.opacity = '0';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }

        // Site Content Management
        let siteContentLoaded = false;
        let siteContentSaving = false;

        async function loadSiteContent() {
            if (siteContentLoaded) return;
            
            try {
                const response = await fetch('/admin/site-content');
                if (!response.ok) throw new Error('Failed to load content');
                
                const contentData = await response.json();
                
                // Populate form fields with existing content
                document.querySelectorAll('.site-content-field').forEach(field => {
                    const key = field.dataset.key;
                    if (contentData[key]) {
                        field.value = contentData[key];
                    }
                });
                
                siteContentLoaded = true;
                console.log('Site content loaded successfully');
            } catch (error) {
                console.error('Error loading site content:', error);
                showNotification('Failed to load site content', 'error');
            }
        }

        async function saveSiteContent() {
            // Prevent multiple simultaneous saves
            if (siteContentSaving) return;
            siteContentSaving = true;
            
            const saveBtn = document.querySelector('button[onclick="saveSiteContent()"]');
            if (saveBtn) {
                saveBtn.classList.add('btn-saving');
                saveBtn.textContent = 'Saving...';
                saveBtn.disabled = true;
            }
            
            const contents = {};
            
            // Collect all site content field values
            document.querySelectorAll('.site-content-field').forEach(field => {
                const key = field.dataset.key;
                const value = field.value.trim();
                if (key) {
                    contents[key] = value; // Allow empty values to clear content
                }
            });
            
            try {
                const response = await fetch('/admin/site-content', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ contents: contents })
                });

                if (response.ok) {
                    showNotification('Site content updated successfully!');
                    if (saveBtn) {
                        saveBtn.classList.remove('btn-saving');
                        saveBtn.classList.add('btn-saved');
                        saveBtn.textContent = 'Saved!';
                        setTimeout(() => {
                            saveBtn.classList.remove('btn-saved');
                            saveBtn.textContent = 'Save Changes';
                            saveBtn.disabled = false;
                        }, 2000);
                    }
                } else {
                    throw new Error('Failed to update site content');
                }
            } catch (error) {
                console.error('Error saving site content:', error);
                showNotification('Error: ' + error.message, 'error');
                if (saveBtn) {
                    saveBtn.classList.remove('btn-saving');
                    saveBtn.textContent = 'Save Changes';
                    saveBtn.disabled = false;
                }
            } finally {
                siteContentSaving = false;
            }
        }

        // Contact info save function (reuses site content endpoint)
        async function saveContactInfo() {
            // Reuse the saveSiteContent function as it handles all site-content-field elements
            await saveSiteContent();
        }

        // Load site content when market status section is shown
        document.querySelector('[data-section="content"]').addEventListener('click', function() {
            setTimeout(() => {
                loadSiteContent();
            }, 100);
        });

        // Load site content when contact section is shown
        document.querySelector('[data-section="contact"]').addEventListener('click', function() {
            setTimeout(() => {
                loadSiteContent();
            }, 100);
        });

        // Load site content on page load if we're already on the content section
        document.addEventListener('DOMContentLoaded', function() {
            if (document.querySelector('[data-section="content"]').classList.contains('active')) {
                loadSiteContent();
            }

            // Always load securities for news forms on page load with a small delay
            setTimeout(() => {
                loadSecuritiesForNews();
            }, 100);

            // If news section is active, also load news
            if (document.querySelector('[data-section="news"]').classList.contains('active')) {
                loadNews();
            }
        });

        // Carousel Management Functions
        document.getElementById('carouselForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = {
                title: document.getElementById('carouselTitle').value,
                description: document.getElementById('carouselDescription').value,
                image_url: document.getElementById('carouselImageUrl').value,
                button_text: document.getElementById('carouselButtonText').value,
                button_link: document.getElementById('carouselButtonLink').value,
                sort_order: parseInt(document.getElementById('carouselSortOrder').value) || 0,
                is_active: document.getElementById('carouselActive').checked,
                _token: document.querySelector('input[name="_token"]').value
            };

            try {
                const response = await fetch('/admin/carousel-images', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('Carousel image added successfully!');
                    document.getElementById('carouselForm').reset();
                    document.getElementById('carouselActive').checked = true;
                    document.getElementById('carouselSortOrder').value = 0;
                    loadCarouselImages();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to add carousel image');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        document.getElementById('editCarouselForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const id = document.getElementById('editCarouselId').value;
            const formData = {
                title: document.getElementById('editCarouselTitle').value,
                description: document.getElementById('editCarouselDescription').value,
                image_url: document.getElementById('editCarouselImageUrl').value,
                button_text: document.getElementById('editCarouselButtonText').value,
                button_link: document.getElementById('editCarouselButtonLink').value,
                sort_order: parseInt(document.getElementById('editCarouselSortOrder').value) || 0,
                is_active: document.getElementById('editCarouselActive').checked,
                _token: document.querySelector('input[name="_token"]').value
            };

            try {
                const response = await fetch(`/admin/carousel-images/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('Carousel image updated successfully!');
                    cancelEditCarousel();
                    loadCarouselImages();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to update carousel image');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        async function loadCarouselImages() {
            try {
                const response = await fetch('/admin/carousel-images');
                const images = await response.json();

                const imagesList = document.getElementById('carouselImagesList');
                imagesList.innerHTML = '';

                if (images.length === 0) {
                    imagesList.innerHTML = '<p class="text-center text-muted">No carousel images found.</p>';
                    return;
                }

                images.forEach(image => {
                    const imageItem = document.createElement('div');
                    imageItem.className = 'border-bottom pb-3 mb-3';
                    imageItem.innerHTML = `
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${image.title}</h6>
                                ${image.description ? `<p class="text-muted small mb-1">${image.description.substring(0, 100)}${image.description.length > 100 ? '...' : ''}</p>` : ''}
                                <div class="mb-2">
                                    <img src="${image.image_url}" alt="${image.title}" style="width: 100px; height: 60px; object-fit: cover; border-radius: 4px;">
                                </div>
                                ${image.button_text ? `<small class="text-info d-block">Button: ${image.button_text}</small>` : ''}
                                ${image.button_link ? `<small class="text-secondary d-block">Link: ${image.button_link}</small>` : ''}
                                <small class="text-secondary d-block">Sort Order: ${image.sort_order}</small>
                                <span class="badge ${image.is_active ? 'bg-success' : 'bg-secondary'}">${image.is_active ? 'Active' : 'Inactive'}</span>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <button class="btn btn-sm btn-primary" onclick="editCarouselImage(${image.id})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="toggleCarouselStatus(${image.id}, ${!image.is_active})">
                                    <i class="fas fa-toggle-${image.is_active ? 'off' : 'on'}"></i> ${image.is_active ? 'Deactivate' : 'Activate'}
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteCarouselImage(${image.id})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    `;
                    imagesList.appendChild(imageItem);
                });
            } catch (error) {
                console.error('Error loading carousel images:', error);
                showNotification('Failed to load carousel images', 'error');
            }
        }

        async function editCarouselImage(id) {
            try {
                const response = await fetch(`/admin/carousel-images/${id}`);
                const image = await response.json();

                document.getElementById('editCarouselId').value = image.id;
                document.getElementById('editCarouselTitle').value = image.title;
                document.getElementById('editCarouselDescription').value = image.description || '';
                document.getElementById('editCarouselImageUrl').value = image.image_url;
                document.getElementById('editCarouselButtonText').value = image.button_text || '';
                document.getElementById('editCarouselButtonLink').value = image.button_link || '';
                document.getElementById('editCarouselSortOrder').value = image.sort_order;
                document.getElementById('editCarouselActive').checked = image.is_active;

                document.getElementById('editCarouselCard').style.display = 'block';
            } catch (error) {
                showNotification('Error loading carousel image', 'error');
            }
        }

        function cancelEditCarousel() {
            document.getElementById('editCarouselCard').style.display = 'none';
            document.getElementById('editCarouselForm').reset();
        }

        async function toggleCarouselStatus(id, newStatus) {
            try {
                const response = await fetch(`/admin/carousel-images/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ is_active: newStatus })
                });

                if (response.ok) {
                    loadCarouselImages();
                    showNotification(`Carousel image ${newStatus ? 'activated' : 'deactivated'}`);
                } else {
                    throw new Error('Failed to update carousel image status');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        async function deleteCarouselImage(id) {
            if (!confirm('Are you sure you want to delete this carousel image?')) return;

            try {
                const response = await fetch(`/admin/carousel-images/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    showNotification('Carousel image deleted successfully!');
                    loadCarouselImages();
                } else {
                    throw new Error('Failed to delete carousel image');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        // Files Management Functions
        document.getElementById('fileUploadForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData();
            const fileInput = document.getElementById('fileInput');
            const description = document.getElementById('fileDescription').value;
            const altText = document.getElementById('fileAltText').value;

            if (!fileInput.files[0]) {
                showNotification('Please select a file to upload', 'error');
                return;
            }

            formData.append('file', fileInput.files[0]);
            formData.append('description', description);
            formData.append('alt_text', altText);
            formData.append('_token', document.querySelector('input[name="_token"]').value);

            try {
                console.log('Submitting file upload...', formData);

                const response = await fetch('/admin/files', {
                    method: 'POST',
                    body: formData
                });

                console.log('Response status:', response.status);

                if (response.ok) {
                    const responseData = await response.json();
                    console.log('Upload successful:', responseData);
                    showNotification('File uploaded successfully!');
                    document.getElementById('fileUploadForm').reset();
                    loadFiles();
                } else {
                    const errorData = await response.json();
                    console.error('Upload failed:', errorData);
                    throw new Error(errorData.message || 'Failed to upload file');
                }
            } catch (error) {
                console.error('Upload error:', error);
                showNotification('Error: ' + error.message, 'error');
            }
        });

        async function loadFiles() {
            const loadingEl = document.getElementById('filesLoading');
            const gridEl = document.getElementById('filesGrid');

            loadingEl.style.display = 'block';
            gridEl.innerHTML = '';

            try {
                const typeFilter = document.getElementById('fileTypeFilter').value;
                const search = document.getElementById('fileSearch').value;

                let url = '/admin/files?';
                if (typeFilter !== 'all') url += `type=${typeFilter}&`;
                if (search) url += `search=${encodeURIComponent(search)}&`;

                const response = await fetch(url);
                const data = await response.json();

                loadingEl.style.display = 'none';

                if (data.data && data.data.length === 0) {
                    gridEl.innerHTML = '<p class="text-center text-muted">No files found.</p>';
                    return;
                }

                data.data.forEach(file => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'file-item';

                    const thumbnail = getFileThumbnail(file);
                    const fileSize = formatFileSize(file.file_size);

                    fileItem.innerHTML = `
                        <div class="file-thumbnail">${thumbnail}</div>
                        <div class="file-name" title="${file.original_name}">${truncateText(file.original_name, 25)}</div>
                        <div class="file-meta">${file.file_type.toUpperCase()} • ${fileSize}</div>
                        <div class="file-actions">
                            <button class="btn btn-sm btn-primary" onclick="copyFileUrl('${file.file_url}')">
                                <i class="fas fa-copy"></i> Copy URL
                            </button>
                            <button class="btn btn-sm btn-info" onclick="showFileDetails(${file.id})">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteFile(${file.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;

                    gridEl.appendChild(fileItem);
                });
            } catch (error) {
                loadingEl.style.display = 'none';
                showNotification('Failed to load files', 'error');
            }
        }

        function getFileThumbnail(file) {
            if (file.file_type === 'image') {
                return `<img src="${file.file_url}" alt="${file.alt_text || file.original_name}">`;
            }

            const icons = {
                'pdf': 'fas fa-file-pdf',
                'document': 'fas fa-file-word',
                'video': 'fas fa-file-video',
                'audio': 'fas fa-file-audio'
            };

            const iconClass = icons[file.file_type] || 'fas fa-file';
            return `<i class="${iconClass} file-icon"></i>`;
        }

        function formatFileSize(bytes) {
            if (bytes >= 1073741824) {
                return (bytes / 1073741824).toFixed(2) + ' GB';
            } else if (bytes >= 1048576) {
                return (bytes / 1048576).toFixed(2) + ' MB';
            } else if (bytes >= 1024) {
                return (bytes / 1024).toFixed(2) + ' KB';
            } else {
                return bytes + ' bytes';
            }
        }

        function truncateText(text, maxLength) {
            return text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
        }

        async function copyFileUrl(url) {
            try {
                await navigator.clipboard.writeText(url);
                showNotification('File URL copied to clipboard!');
            } catch (error) {
                showNotification('Failed to copy URL', 'error');
            }
        }

        async function showFileDetails(fileId) {
            try {
                const response = await fetch(`/admin/files/${fileId}`);
                const file = await response.json();

                const detailsContent = document.getElementById('fileDetailsContent');
                detailsContent.innerHTML = `
                    <div class="row">
                        <div class="col-md-6">
                            <div class="file-preview mb-3">
                                ${file.file_type === 'image'
                                    ? `<img src="${file.file_url}" alt="${file.alt_text || file.original_name}" style="max-width: 100%; border-radius: 8px;">`
                                    : `<div class="text-center p-4 bg-light rounded"><i class="${getFileIcon(file.file_type)} fa-4x text-muted"></i></div>`
                                }
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>${file.original_name}</h5>
                            <p><strong>File Type:</strong> ${file.file_type.toUpperCase()}</p>
                            <p><strong>Size:</strong> ${formatFileSize(file.file_size)}</p>
                            <p><strong>Uploaded:</strong> ${new Date(file.created_at).toLocaleDateString()}</p>
                            ${file.description ? `<p><strong>Description:</strong> ${file.description}</p>` : ''}
                            ${file.alt_text ? `<p><strong>Alt Text:</strong> ${file.alt_text}</p>` : ''}
                            <p><strong>URL:</strong> <code style="word-break: break-all;">${file.file_url}</code></p>
                            <div class="mt-3">
                                <button class="btn btn-primary" onclick="copyFileUrl('${file.file_url}')">
                                    <i class="fas fa-copy"></i> Copy URL
                                </button>
                                <button class="btn btn-success" onclick="useInCarousel('${file.file_url}')">
                                    <i class="fas fa-images"></i> Use in Carousel
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                document.getElementById('fileDetailsCard').style.display = 'block';
            } catch (error) {
                showNotification('Failed to load file details', 'error');
            }
        }

        function getFileIcon(fileType) {
            const icons = {
                'pdf': 'fas fa-file-pdf',
                'document': 'fas fa-file-word',
                'video': 'fas fa-file-video',
                'audio': 'fas fa-file-audio'
            };
            return icons[fileType] || 'fas fa-file';
        }

        function closeFileDetails() {
            document.getElementById('fileDetailsCard').style.display = 'none';
        }

        function useInCarousel(imageUrl) {
            // Switch to carousel section and populate the image URL
            document.querySelector('[data-section="carousel"]').click();
            setTimeout(() => {
                document.getElementById('carouselImageUrl').value = imageUrl;
                showNotification('Image URL added to carousel form!');
                closeFileDetails();
            }, 500);
        }

        async function deleteFile(fileId) {
            if (!confirm('Are you sure you want to delete this file? This action cannot be undone.')) return;

            try {
                const response = await fetch(`/admin/files/${fileId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    showNotification('File deleted successfully!');
                    loadFiles();
                    closeFileDetails();
                } else {
                    throw new Error('Failed to delete file');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        // File search and filter
        document.getElementById('fileTypeFilter').addEventListener('change', loadFiles);
        document.getElementById('fileSearch').addEventListener('input', debounce(loadFiles, 500));

        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Quill.js Rich Text Editor initialization
        let newsContentQuill, editNewsContentQuill;

        function initializeQuill() {
            if (!newsContentQuill) {
                newsContentQuill = new Quill('#newsContent', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'align': [] }],
                            ['link', 'image'],
                            ['clean']
                        ]
                    }
                });

                newsContentQuill.on('text-change', function() {
                    document.getElementById('newsContentInput').value = newsContentQuill.root.innerHTML;
                });
            }

            if (!editNewsContentQuill) {
                editNewsContentQuill = new Quill('#editNewsContent', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'align': [] }],
                            ['link', 'image'],
                            ['clean']
                        ]
                    }
                });

                editNewsContentQuill.on('text-change', function() {
                    document.getElementById('editNewsContentInput').value = editNewsContentQuill.root.innerHTML;
                });
            }
        }

        // Initialize Quill when the news section is shown
        document.querySelector('[data-section="news"]').addEventListener('click', function() {
            setTimeout(() => {
                initializeQuill();
                loadNews();
            }, 100);
        });

        // Toggle content fields based on article type (create form)
        function toggleNewsContentFields() {
            const type = document.getElementById('newsType').value;
            const contentGroup = document.getElementById('newsContentGroup');
            const fileGroup = document.getElementById('newsFileGroup');

            if (type === 'report') {
                contentGroup.style.display = 'none';
                fileGroup.style.display = 'block';
            } else {
                contentGroup.style.display = 'block';
                fileGroup.style.display = 'none';
            }
        }

        // Toggle content fields based on article type (edit form)
        function toggleEditNewsContentFields() {
            const type = document.getElementById('editNewsType').value;
            const contentGroup = document.getElementById('editNewsContentGroup');
            const fileGroup = document.getElementById('editNewsFileGroup');

            if (type === 'report') {
                contentGroup.style.display = 'none';
                fileGroup.style.display = 'block';
            } else {
                contentGroup.style.display = 'block';
                fileGroup.style.display = 'none';
            }
        }

        // Function to handle file repository integration
        function openFileRepository(targetInputId) {
            // Switch to files section
            document.querySelector('[data-section="files"]').click();
            setTimeout(() => {
                loadFiles();
                // Store the target input ID for later use
                window.fileRepositoryTarget = targetInputId;
                showNotification('Browse files below and click "Copy URL" to use in form');
            }, 500);
        }

        // Override copyFileUrl to also populate form fields
        const originalCopyFileUrl = copyFileUrl;
        copyFileUrl = async function(url) {
            await originalCopyFileUrl(url);

            // If we have a target input, populate it
            if (window.fileRepositoryTarget) {
                const targetInput = document.getElementById(window.fileRepositoryTarget);
                if (targetInput) {
                    targetInput.value = url;
                    showNotification('URL added to form field!');
                    window.fileRepositoryTarget = null;
                }
            }
        };

        // Update news form submission to include new fields
        document.getElementById('newsForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            // Update Quill content to hidden input
            if (newsContentQuill) {
                document.getElementById('newsContentInput').value = newsContentQuill.root.innerHTML;
            }

            // Get selected securities
            const selectedSecurities = Array.from(document.getElementById('newsSecurities').selectedOptions)
                .map(option => option.value);

            const articleType = document.getElementById('newsType').value;
            const formData = {
                title: document.getElementById('newsTitle').value,
                content: articleType === 'article' ? document.getElementById('newsContentInput').value : '',
                summary: document.getElementById('newsSummary').value,
                image_url: document.getElementById('newsImageUrl').value,
                author: document.getElementById('newsAuthor').value,
                is_published: document.getElementById('newsPublished').checked,
                published_at: document.getElementById('newsPublishedAt').value || null,
                article_type: articleType,
                file_url: articleType === 'report' ? (document.getElementById('newsFileUrl').value || null) : null,
                securities: selectedSecurities,
                _token: document.querySelector('input[name="_token"]').value
            };

            try {
                const response = await fetch('/admin/news', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('News article added successfully!');
                    document.getElementById('newsForm').reset();
                    document.getElementById('newsPublished').checked = true;
                    // Clear Quill content after reset
                    if (newsContentQuill) {
                        newsContentQuill.setContents([]);
                        document.getElementById('newsContentInput').value = '';
                    }
                    loadNews();
                } else {
                    throw new Error('Failed to add news article');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        // Update edit news form submission
        document.getElementById('editNewsForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            // Update Quill content to hidden input
            if (editNewsContentQuill) {
                document.getElementById('editNewsContentInput').value = editNewsContentQuill.root.innerHTML;
            }

            const id = document.getElementById('editNewsId').value;

            // Get selected securities for edit form
            const selectedSecurities = Array.from(document.getElementById('editNewsSecurities').selectedOptions)
                .map(option => option.value);

            const editArticleType = document.getElementById('editNewsType').value;
            const formData = {
                title: document.getElementById('editNewsTitle').value,
                content: editArticleType === 'article' ? document.getElementById('editNewsContentInput').value : '',
                summary: document.getElementById('editNewsSummary').value,
                image_url: document.getElementById('editNewsImageUrl').value,
                author: document.getElementById('editNewsAuthor').value,
                is_published: document.getElementById('editNewsPublished').checked,
                published_at: document.getElementById('editNewsPublishedAt').value || null,
                article_type: editArticleType,
                file_url: editArticleType === 'report' ? (document.getElementById('editNewsFileUrl').value || null) : null,
                securities: selectedSecurities,
                _token: document.querySelector('input[name="_token"]').value
            };

            try {
                const response = await fetch(`/admin/news/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('News article updated successfully!');
                    cancelEditNews();
                    loadNews();
                } else {
                    throw new Error('Failed to update news article');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        // Add function to cancel edit news
        function cancelEditNews() {
            document.getElementById('editNewsCard').style.display = 'none';
            document.getElementById('editNewsForm').reset();
            // Clear Quill content
            if (editNewsContentQuill) {
                editNewsContentQuill.setContents([]);
                document.getElementById('editNewsContentInput').value = '';
            }
        }

        // Update loadNews to show enhanced information
        async function loadNews() {
            try {
                const response = await fetch('/admin/news');
                const news = await response.json();

                const newsList = document.getElementById('newsList');
                newsList.innerHTML = '';

                if (news.length === 0) {
                    newsList.innerHTML = '<p class="text-center text-muted">No news articles found.</p>';
                    return;
                }

                news.forEach(article => {
                    const newsItem = document.createElement('div');
                    newsItem.className = 'border-bottom pb-3 mb-3';
                    newsItem.innerHTML = `
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${article.title}</h6>
                                ${article.summary ? `<p class="text-muted small mb-1"><strong>Summary:</strong> ${article.summary.substring(0, 100)}...</p>` : ''}
                                <p class="text-muted small mb-1">${article.content ? article.content.substring(0, 100) + '...' : 'No content'}</p>
                                ${article.author ? `<small class="text-info d-block">By: ${article.author}</small>` : ''}
                                ${article.image_url ? `<small class="text-success d-block"><i class="fas fa-image"></i> Has featured image</small>` : ''}
                                <small class="text-secondary d-block">Published: ${new Date(article.created_at).toLocaleDateString()}</small>
                                <span class="badge ${article.is_published ? 'bg-success' : 'bg-secondary'}">${article.is_published ? 'Published' : 'Draft'}</span>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <button class="btn btn-sm btn-primary" onclick="editNews(${article.id})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteNews(${article.id})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    `;
                    newsList.appendChild(newsItem);
                });
            } catch (error) {
                console.error('Error loading news:', error);
            }
        }

        // Load securities for news form dropdowns
        async function loadSecuritiesForNews() {
            try {
                console.log('Loading securities for news forms...');
                const response = await fetch('/admin/securities');

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                console.log('Securities response:', result);

                // Handle paginated response (Laravel might return paginated data)
                const securities = result.data || result;

                if (!Array.isArray(securities)) {
                    console.error('Securities data is not an array:', securities);
                    return;
                }

                const newsSecuritiesSelect = document.getElementById('newsSecurities');
                const editNewsSecuritiesSelect = document.getElementById('editNewsSecurities');

                if (!newsSecuritiesSelect || !editNewsSecuritiesSelect) {
                    console.log('Securities select elements not found, will retry later');
                    return;
                }

                // Clear existing options
                newsSecuritiesSelect.innerHTML = '';
                editNewsSecuritiesSelect.innerHTML = '';

                console.log(`Loading ${securities.length} securities`);

                securities.forEach(security => {
                    const displayName = `${security.ticker} - ${security.company_name || security.issuer_name}`;

                    // For add form
                    const option1 = document.createElement('option');
                    option1.value = security.id;
                    option1.textContent = displayName;
                    newsSecuritiesSelect.appendChild(option1);

                    // For edit form
                    const option2 = document.createElement('option');
                    option2.value = security.id;
                    option2.textContent = displayName;
                    editNewsSecuritiesSelect.appendChild(option2);
                });

                console.log('Securities loaded successfully');
            } catch (error) {
                console.error('Error loading securities for news:', error);
            }
        }

        // Add editNews function
        async function editNews(id) {
            try {
                const response = await fetch(`/admin/news/${id}`);
                const article = await response.json();

                document.getElementById('editNewsId').value = article.id;
                document.getElementById('editNewsTitle').value = article.title;
                document.getElementById('editNewsSummary').value = article.summary || '';
                document.getElementById('editNewsImageUrl').value = article.image_url || '';
                document.getElementById('editNewsAuthor').value = article.author || '';
                document.getElementById('editNewsPublished').checked = article.is_published;

                // Set published_at if it exists (convert to datetime-local format)
                if (article.published_at) {
                    const date = new Date(article.published_at);
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const day = String(date.getDate()).padStart(2, '0');
                    const hours = String(date.getHours()).padStart(2, '0');
                    const minutes = String(date.getMinutes()).padStart(2, '0');
                    document.getElementById('editNewsPublishedAt').value = `${year}-${month}-${day}T${hours}:${minutes}`;
                } else {
                    document.getElementById('editNewsPublishedAt').value = '';
                }

                // Set article type
                document.getElementById('editNewsType').value = article.article_type || 'article';

                // Set file URL if it's a report
                document.getElementById('editNewsFileUrl').value = article.file_url || '';

                // Toggle content fields based on type
                toggleEditNewsContentFields();

                // Set selected securities
                const editSecuritiesSelect = document.getElementById('editNewsSecurities');
                // Clear all selections first
                Array.from(editSecuritiesSelect.options).forEach(option => option.selected = false);
                // Select the securities associated with this article
                if (article.securities && article.securities.length > 0) {
                    article.securities.forEach(security => {
                        const option = editSecuritiesSelect.querySelector(`option[value="${security.id}"]`);
                        if (option) option.selected = true;
                    });
                }

                // Set Quill content
                if (editNewsContentQuill) {
                    editNewsContentQuill.root.innerHTML = article.content || '';
                    document.getElementById('editNewsContentInput').value = article.content || '';
                }

                document.getElementById('editNewsCard').style.display = 'block';
            } catch (error) {
                showNotification('Error loading news article', 'error');
            }
        }

        // Add editEvent function
        async function editEvent(id) {
            try {
                const response = await fetch(`/admin/events/${id}`);
                const event = await response.json();

                document.getElementById('editEventId').value = event.id;
                document.getElementById('editEventTitle').value = event.title;
                document.getElementById('editEventDescription').value = event.description;
                document.getElementById('editEventDate').value = event.event_date ? event.event_date.slice(0, 16) : '';
                document.getElementById('editEventLocation').value = event.location || '';
                document.getElementById('editEventImageUrl').value = event.image_url || '';
                document.getElementById('editEventActive').checked = event.is_active;
                document.getElementById('editEventVisible').checked = event.show_on_site;

                document.getElementById('editEventCard').style.display = 'block';
            } catch (error) {
                showNotification('Error loading event', 'error');
            }
        }

        // Add cancelEditEvent function
        function cancelEditEvent() {
            document.getElementById('editEventCard').style.display = 'none';
            document.getElementById('editEventForm').reset();
        }

        // Update edit event form submission
        document.getElementById('editEventForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const id = document.getElementById('editEventId').value;
            const formData = {
                title: document.getElementById('editEventTitle').value,
                description: document.getElementById('editEventDescription').value,
                event_date: document.getElementById('editEventDate').value,
                location: document.getElementById('editEventLocation').value,
                image_url: document.getElementById('editEventImageUrl').value,
                is_active: document.getElementById('editEventActive').checked,
                show_on_site: document.getElementById('editEventVisible').checked,
                _token: document.querySelector('input[name="_token"]').value
            };

            try {
                const response = await fetch(`/admin/events/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('Event updated successfully!');
                    cancelEditEvent();
                    loadEvents();
                } else {
                    throw new Error('Failed to update event');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        // Menu Management Functions
        document.getElementById('menuForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = {
                title: document.getElementById('menuTitle').value,
                url: document.getElementById('menuUrl').value || null,
                parent_id: document.getElementById('menuParent').value || null,
                sort_order: parseInt(document.getElementById('menuSortOrder').value) || 0,
                icon: document.getElementById('menuIcon').value || null,
                description: document.getElementById('menuDescription').value || null,
                is_active: document.getElementById('menuActive').checked,
                opens_new_tab: document.getElementById('menuNewTab').checked,
                _token: document.querySelector('input[name="_token"]').value
            };

            try {
                const response = await fetch('/admin/menu-items', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('Menu item added successfully!');
                    document.getElementById('menuForm').reset();
                    document.getElementById('menuActive').checked = true;
                    document.getElementById('menuSortOrder').value = 0;
                    loadMenuItems();
                    loadParentOptions();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to add menu item');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        document.getElementById('editMenuForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const id = document.getElementById('editMenuId').value;
            const formData = {
                title: document.getElementById('editMenuTitle').value,
                url: document.getElementById('editMenuUrl').value || null,
                parent_id: document.getElementById('editMenuParent').value || null,
                sort_order: parseInt(document.getElementById('editMenuSortOrder').value) || 0,
                icon: document.getElementById('editMenuIcon').value || null,
                description: document.getElementById('editMenuDescription').value || null,
                is_active: document.getElementById('editMenuActive').checked,
                opens_new_tab: document.getElementById('editMenuNewTab').checked,
                _token: document.querySelector('input[name="_token"]').value
            };

            try {
                const response = await fetch(`/admin/menu-items/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('Menu item updated successfully!');
                    cancelEditMenu();
                    loadMenuItems();
                    loadParentOptions();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to update menu item');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        async function loadMenuItems() {
            try {
                const response = await fetch('/admin/menu-items-all');
                const menuItems = await response.json();

                const menuList = document.getElementById('menuItemsList');
                menuList.innerHTML = '';

                if (menuItems.length === 0) {
                    menuList.innerHTML = '<p class="text-center text-muted">No menu items found. Add some menu items to get started.</p>';
                    return;
                }

                // Build hierarchical structure
                function renderMenuItem(item, depth = 0, processedIds = new Set()) {
                    // Prevent infinite loops
                    if (processedIds.has(item.id)) {
                        return;
                    }
                    processedIds.add(item.id);

                    const menuElement = createMenuItemElement(item, depth);
                    menuList.appendChild(menuElement);

                    // Find and render children
                    const children = menuItems.filter(child => child.parent_id === item.id);
                    children
                        .sort((a, b) => a.sort_order - b.sort_order)
                        .forEach(child => {
                            renderMenuItem(child, depth + 1, new Set(processedIds));
                        });
                }

                // Start with root items (no parent)
                const rootItems = menuItems
                    .filter(item => !item.parent_id)
                    .sort((a, b) => a.sort_order - b.sort_order);

                rootItems.forEach(item => {
                    renderMenuItem(item, 0);
                });

            } catch (error) {
                console.error('Error loading menu items:', error);
                showNotification('Failed to load menu items', 'error');
            }
        }

        function createMenuItemElement(item, depth = 0) {
            const div = document.createElement('div');

            // Add indentation based on depth
            let indentClass = '';
            let levelBadge = '';
            let indentStyle = '';

            if (depth === 0) {
                levelBadge = '<span class="badge bg-primary me-2">Level 1</span>';
            } else if (depth === 1) {
                levelBadge = '<span class="badge bg-info me-2">Level 2</span>';
                indentClass = 'ms-4';
                indentStyle = 'border-left: 3px solid #3b82f6; padding-left: 1rem;';
            } else if (depth === 2) {
                levelBadge = '<span class="badge bg-secondary me-2">Level 3</span>';
                indentClass = 'ms-5';
                indentStyle = 'border-left: 3px solid #6b7280; padding-left: 1rem;';
            }

            div.className = `border-bottom pb-3 mb-3 ${indentClass}`;
            div.style.cssText = indentStyle;

            const iconHtml = item.icon ? `<i class="${item.icon}"></i> ` : '';
            const urlDisplay = item.url ? `<small class="text-secondary d-block">URL: ${item.url}</small>` : '<small class="text-warning d-block">No URL (Dropdown only)</small>';

            div.innerHTML = `
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <h6 class="mb-1">${levelBadge}${iconHtml}${item.title}</h6>
                        ${urlDisplay}
                        ${item.description ? `<p class="text-muted small mb-1">${item.description}</p>` : ''}
                        <small class="text-secondary d-block">Sort Order: ${item.sort_order}</small>
                        <div class="mt-1">
                            <span class="badge ${item.is_active ? 'bg-success' : 'bg-secondary'} me-1">${item.is_active ? 'Active' : 'Inactive'}</span>
                            ${item.opens_new_tab ? '<span class="badge bg-info me-1">New Tab</span>' : ''}
                            ${item.parent ? `<span class="badge bg-light text-dark">Parent: ${item.parent.title}</span>` : '<span class="badge bg-warning text-dark">Root Item</span>'}
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <button class="btn btn-sm btn-primary" onclick="editMenuItem(${item.id})">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-warning" onclick="toggleMenuStatus(${item.id}, ${!item.is_active})">
                            <i class="fas fa-toggle-${item.is_active ? 'off' : 'on'}"></i> ${item.is_active ? 'Deactivate' : 'Activate'}
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteMenuItem(${item.id})">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            `;

            return div;
        }

        async function loadParentOptions() {
            try {
                const response = await fetch('/admin/menu-parent-options');
                const parentOptions = await response.json();

                const selects = ['menuParent', 'editMenuParent'];
                selects.forEach(selectId => {
                    const select = document.getElementById(selectId);
                    // Clear existing options except the first one
                    while (select.children.length > 1) {
                        select.removeChild(select.lastChild);
                    }

                    parentOptions.forEach(option => {
                        const optionElement = document.createElement('option');
                        optionElement.value = option.id;
                        optionElement.textContent = option.title;
                        select.appendChild(optionElement);
                    });
                });
            } catch (error) {
                console.error('Error loading parent options:', error);
            }
        }

        async function editMenuItem(id) {
            try {
                const response = await fetch(`/admin/menu-items/${id}`);
                const menuItem = await response.json();

                document.getElementById('editMenuId').value = menuItem.id;
                document.getElementById('editMenuTitle').value = menuItem.title;
                document.getElementById('editMenuUrl').value = menuItem.url || '';
                document.getElementById('editMenuParent').value = menuItem.parent_id || '';
                document.getElementById('editMenuSortOrder').value = menuItem.sort_order;
                document.getElementById('editMenuIcon').value = menuItem.icon || '';
                document.getElementById('editMenuDescription').value = menuItem.description || '';
                document.getElementById('editMenuActive').checked = menuItem.is_active;
                document.getElementById('editMenuNewTab').checked = menuItem.opens_new_tab;

                document.getElementById('editMenuCard').style.display = 'block';
            } catch (error) {
                showNotification('Error loading menu item', 'error');
            }
        }

        function cancelEditMenu() {
            document.getElementById('editMenuCard').style.display = 'none';
            document.getElementById('editMenuForm').reset();
        }

        async function toggleMenuStatus(id, newStatus) {
            try {
                // First get the current menu item data
                const getResponse = await fetch(`/admin/menu-items/${id}`);
                const currentItem = await getResponse.json();

                // Update with all required fields
                const updateData = {
                    title: currentItem.title,
                    url: currentItem.url,
                    parent_id: currentItem.parent_id,
                    sort_order: currentItem.sort_order,
                    icon: currentItem.icon,
                    description: currentItem.description,
                    is_active: newStatus,
                    opens_new_tab: currentItem.opens_new_tab
                };

                const response = await fetch(`/admin/menu-items/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(updateData)
                });

                if (response.ok) {
                    loadMenuItems();
                    showNotification(`Menu item ${newStatus ? 'activated' : 'deactivated'}`);
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to update menu item status');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        async function deleteMenuItem(id) {
            if (!confirm('Are you sure you want to delete this menu item?')) return;

            try {
                const response = await fetch(`/admin/menu-items/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    showNotification('Menu item deleted successfully!');
                    loadMenuItems();
                    loadParentOptions();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.error || 'Failed to delete menu item');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        function previewMenu() {
            // Open the homepage in a new tab to preview menu changes
            window.open('/', '_blank');
            showNotification('Homepage opened in new tab. Check the navigation menu!');
        }

        // ========================================
        // User Management Functions
        // ========================================

        // Load all users
        async function loadUsers() {
            try {
                const response = await fetch('/admin/users');
                if (response.ok) {
                    const users = await response.json();
                    displayUsers(users);
                } else {
                    throw new Error('Failed to load users');
                }
            } catch (error) {
                console.error('Error loading users:', error);
                document.getElementById('usersList').innerHTML = `
                    <div class="text-center text-danger py-5">
                        <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                        <p>Error loading users</p>
                    </div>
                `;
            }
        }

        // Display users in the list
        function displayUsers(users) {
            const usersList = document.getElementById('usersList');

            if (users.length === 0) {
                usersList.innerHTML = `
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <p>No users found</p>
                    </div>
                `;
                return;
            }

            let html = '<div class="table-responsive"><table class="table" style="width: 100%; border-collapse: collapse;"><thead style="background: var(--surface-secondary);"><tr><th style="padding: 1rem; text-align: left;">Name</th><th style="padding: 1rem; text-align: left;">Email</th><th style="padding: 1rem; text-align: left;">Role</th><th style="padding: 1rem; text-align: left;">Created</th><th style="padding: 1rem; text-align: center;">Actions</th></tr></thead><tbody>';

            users.forEach(user => {
                const createdDate = new Date(user.created_at).toLocaleDateString();
                html += `
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 1rem;">${escapeHtml(user.name)}</td>
                        <td style="padding: 1rem;">${escapeHtml(user.email)}</td>
                        <td style="padding: 1rem;"><span class="badge" style="padding: 0.25rem 0.75rem; border-radius: 12px; background: ${user.role === 'admin' ? 'var(--primary-blue)' : 'var(--text-secondary)'}; color: white; font-size: 0.75rem;">${escapeHtml(user.role || 'user')}</span></td>
                        <td style="padding: 1rem;">${createdDate}</td>
                        <td style="padding: 1rem; text-align: center;">
                            <button onclick="editUser(${user.id})" class="btn btn-secondary btn-sm" style="padding: 0.25rem 0.75rem; margin-right: 0.5rem;">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button onclick="deleteUser(${user.id})" class="btn btn-secondary btn-sm" style="padding: 0.25rem 0.75rem; background: var(--danger); color: white;">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                `;
            });

            html += '</tbody></table></div>';
            usersList.innerHTML = html;
        }

        // Add new user
        document.getElementById('userForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = {
                name: document.getElementById('userName').value,
                email: document.getElementById('userEmail').value,
                password: document.getElementById('userPassword').value,
                role: document.getElementById('userRole').value
            };

            try {
                const response = await fetch('/admin/users', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('User created successfully!');
                    this.reset();
                    loadUsers();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to create user');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        // Edit user
        async function editUser(id) {
            try {
                const response = await fetch(`/admin/users/${id}`);
                if (response.ok) {
                    const user = await response.json();

                    document.getElementById('editUserId').value = user.id;
                    document.getElementById('editUserName').value = user.name;
                    document.getElementById('editUserEmail').value = user.email;
                    document.getElementById('editUserPassword').value = '';
                    document.getElementById('editUserRole').value = user.role || 'user';

                    document.getElementById('editUserCard').style.display = 'block';
                    document.getElementById('editUserCard').scrollIntoView({ behavior: 'smooth' });
                } else {
                    throw new Error('Failed to load user');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        // Update user
        document.getElementById('editUserForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const id = document.getElementById('editUserId').value;
            const formData = {
                name: document.getElementById('editUserName').value,
                email: document.getElementById('editUserEmail').value,
                role: document.getElementById('editUserRole').value
            };

            const password = document.getElementById('editUserPassword').value;
            if (password) {
                formData.password = password;
            }

            try {
                const response = await fetch(`/admin/users/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification('User updated successfully!');
                    cancelEditUser();
                    loadUsers();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to update user');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        // Cancel edit user
        function cancelEditUser() {
            document.getElementById('editUserCard').style.display = 'none';
            document.getElementById('editUserForm').reset();
        }

        // Delete user
        async function deleteUser(id) {
            if (!confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                return;
            }

            try {
                const response = await fetch(`/admin/users/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    showNotification('User deleted successfully!');
                    loadUsers();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to delete user');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        // ===========================
        // Market Performance Functions
        // ===========================

        // Load market performance reports
        async function loadMarketPerformance() {
            try {
                const response = await fetch('/admin/market-performance');
                const reports = await response.json();

                const listContainer = document.getElementById('marketPerformanceList');

                if (reports.length === 0) {
                    listContainer.innerHTML = '<p class="text-muted">No market performance reports yet.</p>';
                    return;
                }

                const table = `
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>File Size</th>
                                <th>Published Date</th>
                                <th style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${reports.map(report => `
                                <tr>
                                    <td>
                                        <a href="${report.file_url}" target="_blank" style="color: var(--primary-blue); text-decoration: none;">
                                            <i class="fas fa-file-pdf"></i> ${report.title}
                                        </a>
                                    </td>
                                    <td>${report.file_size || 'N/A'}</td>
                                    <td>${report.published_date ? new Date(report.published_date).toLocaleDateString() : 'N/A'}</td>
                                    <td>
                                        <button onclick="editMarketPerformance(${report.id})" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteMarketPerformance(${report.id})" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                `;

                listContainer.innerHTML = table;
            } catch (error) {
                console.error('Error loading market performance reports:', error);
                document.getElementById('marketPerformanceList').innerHTML =
                    '<p class="text-danger">Error loading reports. Please try again.</p>';
            }
        }

        // Handle market performance form submission
        document.getElementById('marketPerformanceForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const id = document.getElementById('marketPerformanceId').value;
            const formData = {
                title: document.getElementById('marketPerformanceTitle').value,
                file_url: document.getElementById('marketPerformanceFileUrl').value,
                file_size: document.getElementById('marketPerformanceFileSize').value || null,
                published_date: document.getElementById('marketPerformancePublishedDate').value || null
            };

            try {
                const url = id ? `/admin/market-performance/${id}` : '/admin/market-performance';
                const method = id ? 'PUT' : 'POST';

                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                       document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showNotification(id ? 'Report updated successfully!' : 'Report added successfully!');
                    resetMarketPerformanceForm();
                    loadMarketPerformance();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to save report');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        });

        // Edit market performance report
        async function editMarketPerformance(id) {
            try {
                const response = await fetch(`/admin/market-performance/${id}`);
                const report = await response.json();

                document.getElementById('marketPerformanceId').value = report.id;
                document.getElementById('marketPerformanceTitle').value = report.title;
                document.getElementById('marketPerformanceFileUrl').value = report.file_url;
                document.getElementById('marketPerformanceFileSize').value = report.file_size || '';

                // Format datetime for datetime-local input
                if (report.published_date) {
                    const date = new Date(report.published_date);
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const day = String(date.getDate()).padStart(2, '0');
                    const hours = String(date.getHours()).padStart(2, '0');
                    const minutes = String(date.getMinutes()).padStart(2, '0');
                    document.getElementById('marketPerformancePublishedDate').value =
                        `${year}-${month}-${day}T${hours}:${minutes}`;
                }

                document.getElementById('marketPerformanceFormTitle').textContent = 'Edit Market Performance Report';
                document.getElementById('marketPerformanceSubmitText').textContent = 'Update Report';
                document.getElementById('marketPerformanceCancelBtn').style.display = 'inline-block';

                // Scroll to form
                document.getElementById('marketPerformanceForm').scrollIntoView({ behavior: 'smooth', block: 'start' });
            } catch (error) {
                showNotification('Error loading report: ' + error.message, 'error');
            }
        }

        // Delete market performance report
        async function deleteMarketPerformance(id) {
            if (!confirm('Are you sure you want to delete this market performance report?')) {
                return;
            }

            try {
                const response = await fetch(`/admin/market-performance/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                                       document.querySelector('input[name="_token"]').value
                    }
                });

                if (response.ok) {
                    showNotification('Report deleted successfully!');
                    loadMarketPerformance();
                } else {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to delete report');
                }
            } catch (error) {
                showNotification('Error: ' + error.message, 'error');
            }
        }

        // Reset market performance form
        function resetMarketPerformanceForm() {
            document.getElementById('marketPerformanceForm').reset();
            document.getElementById('marketPerformanceId').value = '';
            document.getElementById('marketPerformanceFormTitle').textContent = 'Add Market Performance Report';
            document.getElementById('marketPerformanceSubmitText').textContent = 'Add Report';
            document.getElementById('marketPerformanceCancelBtn').style.display = 'none';
        }

        // Open file repository for market performance
        function openFileRepositoryForMarketPerformance() {
            // Switch to files section
            document.querySelector('[data-section="files"]').click();
            setTimeout(() => {
                loadFiles();

                // Show instruction
                showNotification('Select a file and copy its URL to use in the Market Performance report', 'info');

                // Store that we came from market performance
                window.marketPerformanceFileSelection = true;
            }, 100);
        }

        // Load market performance when section is shown
        document.querySelector('[data-section="market-performance"]').addEventListener('click', function() {
            setTimeout(() => {
                loadMarketPerformance();
            }, 100);
        });
    </script>
</body>
</html>