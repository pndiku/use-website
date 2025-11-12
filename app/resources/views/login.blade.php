<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Uganda Securities Exchange</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">


    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://use.co.ug">
<meta property="og:type" content="website">
<meta property="og:title" content="Uganda Securities Exchange - Premier Financial Market">
<meta property="og:description" content="Access Uganda's premier securities exchange. Trade equities, bonds and access comprehensive market data and investment services.">
<meta property="og:image" content="https://use.co.ug/images/og.png">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:site" content="@UgandaSE">
<meta property="twitter:url" content="https://use.co.ug">
<meta name="twitter:title" content="Uganda Securities Exchange - Premier Financial Market">
<meta name="twitter:description" content="Access Uganda's premier securities exchange. Trade equities, bonds and access comprehensive market data and investment services.">
<meta name="twitter:image" content="https://use.co.ug/images/og.png">



    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
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
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--surface-secondary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 2rem 0;
        }


        .login-card {
            background: var(--surface);
            border-radius: 20px;
            border: 1px solid var(--border);
            padding: 3rem;
            width: 100%;
            max-width: 440px;
            position: relative;
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }


        .text-gradient {
            color: var(--primary-blue);
            font-weight: 700;
        }

        .form-control {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text-primary);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: var(--surface);
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            color: var(--text-primary);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-secondary);
        }

        .input-group-text {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text-secondary);
        }

        .btn-login {
            background: var(--primary-blue);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: var(--primary-blue-dark);
            transform: translateY(-1px);
        }

        .social-login {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 0.8rem;
            color: white;
            transition: all 0.3s ease;
        }

        .social-login:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .divider {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.5);
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .divider span {
            padding: 0 1rem;
        }

        .logo-icon {
            display: flex;
            align-items: center;
        }

        .use-logo-square {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            border-radius: 8px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .use-logo-square::before {
            content: 'U';
            color: white;
            font-weight: 700;
            font-size: 16px;
            text-align: center;
        }


        .secure-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.8rem;
            margin-top: 1.5rem;
        }

        .secure-badge i {
            color: var(--primary-blue);
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center mb-4">
                    <a href="/" class="d-inline-flex align-items-center text-decoration-none">
                        <div class="logo-icon me-2">
                            <div class="use-logo-square"></div>
                        </div>
                        <span class="text-gradient h3 mb-0">Uganda Securities Exchange</span>
                    </a>
                </div>
                
                <div class="login-card mx-auto">
                    <h4 class="text-center mb-4">Sign In</h4>
                    
                    <form method="post" action="/login">
                    {{ csrf_field() }}

                    <p style="color: #ff0000" class="text-center" style="margin-bottom: 66px">
                    {{ $errors->first('username') }}
                    {{ $errors->first('password') }}
                    {{ $errors->first('failed') }}
                </p>

                         @if(session()->has('success'))
    <div class="alert alert-success m-b-16">
       <strong>Success!</strong> {{ session()->get('success') }}
    </div>
@endif


              @if(session()->has('failed'))
    <div class="alert alert-danger m-b-16">
       <strong>Error!</strong> {{ session()->get('failed') }}
    </div>
@endif

     @if(session()->has('info'))
    <div class="alert alert-info m-b-16">
       <strong>Message!</strong> {{ session()->get('info') }}
    </div>
@endif
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="Email address" required value="{{old('email')}}">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label opacity-75" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="text-accent-color text-decoration-none">Forgot password?</a>
                        </div>

                        
                        <button type="submit" class="btn btn-login w-100 mb-3">Sign In</button>
                        
                        <!--<div class="divider">
                            <span>or continue with</span>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col">
                                <button type="button" class="social-login w-100">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="social-login w-100">
                                    <i class="fab fa-google"></i>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="social-login w-100">
                                    <i class="fab fa-twitter"></i>
                                </button>
                            </div>
                        </div>-->
                    </form>
                    
                   <!-- <div class="text-center mt-4">
                        <span style="color: var(--text-secondary);">Don't have an account?</span>
                        <a href="/register" style="color: var(--primary-blue);" class="text-decoration-none ms-1">Create account</a>
                    </div>
                    
                    <div class="secure-badge">
                        <i class="fas fa-shield-alt"></i>
                        <span>Secure login</span>
                    </div> -->
                </div>
                
                <div class="text-center mt-4">
                    <a href="#" style="color: var(--text-secondary);" class="text-decoration-none me-3">Terms</a>
                    <a href="#" style="color: var(--text-secondary);" class="text-decoration-none">Privacy</a>
                </div>
            </div>
        </div>
    </div>


</body>
</html>