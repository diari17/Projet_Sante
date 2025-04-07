<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | XëtConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2a5bd7;
            --primary-dark: #1a4abf;
            --secondary: #00c2cb;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
            --light-gray: #e2e8f0;
            --success: #10b981;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: var(--dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header */
        header {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 100;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 8%;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        
        .logo i {
            color: var(--primary);
            font-size: 2rem;
        }
        
        .logo h1 {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Main Content */
        main {
            flex: 1;
            display: flex;
            margin-top: 80px; /* To account for fixed header */
        }
        
        /* Left Side - Illustration */
        .login-illustration {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .login-illustration::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .login-illustration::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .illustration-content {
            max-width: 500px;
            z-index: 2;
            text-align: center;
        }
        
        .illustration-content img {
            width: 100%;
            max-width: 400px;
            margin-bottom: 2rem;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .illustration-content h2 {
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }
        
        .illustration-content p {
            opacity: 0.9;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        /* Right Side - Login Form */
        .login-form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        
        .login-form {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 3rem;
            width: 100%;
            max-width: 500px;
            position: relative;
        }
        
        .login-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
            border-radius: 1rem 0 0 1rem;
        }
        
        .form-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }
        
        .form-header h2 {
            font-size: 1.8rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .form-header p {
            color: var(--gray);
            font-size: 0.95rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--light-gray);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(42, 91, 215, 0.1);
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 40px;
            cursor: pointer;
            color: var(--gray);
        }
        
        .btn {
            width: 100%;
            padding: 0.8rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            margin-bottom: 1.5rem;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .register-link {
            text-align: center;
            font-size: 0.95rem;
            color: var(--gray);
        }
        
        .register-link a {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 2rem 8%;
            margin-top: auto;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            main {
                flex-direction: column;
            }
            
            .login-illustration {
                padding: 3rem 2rem;
            }
            
            .illustration-content {
                max-width: 100%;
            }
            
            .illustration-content img {
                max-width: 300px;
            }
        }
        
        @media (max-width: 576px) {
            .login-form {
                padding: 2rem;
            }
            
            .illustration-content h2 {
                font-size: 1.8rem;
            }
            
            .illustration-content p {
                font-size: 1rem;
            }
            
            .form-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <a href="/" class="logo">
                <i class="fas fa-hand-holding-medical"></i>
                <h1>XëtConnect</h1>
            </a>
        </nav>
    </header>
    
    <!-- Main Content -->
    <main>
        <!-- Left Side - Illustration -->
        <div class="login-illustration">
            <div class="illustration-content">
                <!-- <img src="{{ asset('images/connexion.png') }}" alt="XëtConnect - Plateforme médicale"> -->
                <h2>Connectez-vous à votre espace</h2>
                <p>Accédez à la plateforme de référence pour la mise en relation entre hôpitaux et chirurgiens. Optimisez vos collaborations et simplifiez votre pratique.</p>
            </div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="login-form-container">
            <form class="login-form">
                <div class="form-header">
                    <h2>Connectez-vous à votre compte</h2>
                    <p>Entrez vos identifiants pour accéder à votre espace</p>
                </div>
                
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" class="form-control" placeholder="votre@email.com" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" class="form-control" placeholder="••••••••" required>
                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                </div>
                
                <button type="submit" class="btn btn-primary">Se connecter</button>
                
                <div class="register-link">
                    Vous n'avez pas de compte ? <a href="Inscription">S'inscrire maintenant</a>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-bottom">
            <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
        </div>
    </footer>
    
    <script>
        // Toggle password visibility
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
        
        // Form submission (would be replaced with actual auth logic)
        const form = document.querySelector('.login-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your authentication logic here
            console.log('Form submitted');
        });
    </script>
</body>
</html>