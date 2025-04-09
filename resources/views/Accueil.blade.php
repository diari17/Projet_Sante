<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XëtConnect | Plateforme Hôpitaux-Chirurgiens</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #2a5bd7;
            --primary-dark: #1a4abf;
            --secondary: #00c2cb;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
            --success: #10b981;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
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
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent; /* Version standard */
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .cta-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .hamburger {
            display: none;
            cursor: pointer;
        }
        
        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8rem 8% 5rem;
            min-height: 100vh;
        }
        
        .hero-content {
            flex: 1;
            padding-right: 2rem;
        }
        
        .hero-content h2 {
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }
        
        .hero-content p {
            font-size: 1.2rem;
            color: var(--gray);
            margin-bottom: 2rem;
            line-height: 1.6;
            max-width: 600px;
        }
        
        .hero-image {
            flex: 1;
            position: relative;
        }
        
        .hero-image img {
            width: 100%;
            max-width: 600px;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        

        /* Specialties Section */
        .specialties {
            padding: 6rem 2rem;
            background-color: var(--white);
        }
        
        .specialties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .specialty-card {
            background-color: var(--light);
            border-radius: 0.5rem;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--light-gray);
        }
        
        .specialty-card:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateY(-5px);
        }
        
        .specialty-card:hover p {
            color: var(--white);
        }
        
        .specialty-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
        }
        
        .specialty-card:hover .specialty-icon {
            color: var(--white);
        }
        
        .specialty-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        
        .specialty-card p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        /* How It Works */
        .how-it-works {
            padding: 6rem 8%;
            background-color: #f1f5f9;
        }
        
        .steps {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 4rem;
            flex-wrap: wrap;
        }
        
        .step {
            flex: 1;
            min-width: 250px;
            max-width: 300px;
            text-align: center;
            position: relative;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 1.5rem;
            position: relative;
            z-index: 2;
        }
        
        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 30px;
            left: 50%;
            width: 100%;
            height: 2px;
            background-color: var(--primary);
            opacity: 0.2;
            z-index: 1;
        }
        
        .step h4 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .step p {
            color: var(--gray);
            line-height: 1.6;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 4rem 8% 2rem;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }
        
        .footer-col h4 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-col h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: var(--secondary);
        }
        
        .footer-col ul {
            list-style: none;
        }
        
        .footer-col ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-col ul li a {
            color: var(--gray);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-col ul li a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .footer-col .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .footer-col .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }
        
        .footer-col .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
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
            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 10rem;
            }
            
            .hero-content {
                padding-right: 0;
                margin-bottom: 3rem;
            }
            
            .hero-content h2 {
                font-size: 2.8rem;
            }
            
            .hero-content p {
                margin-left: auto;
                margin-right: auto;
            }
            
            .cta-buttons {
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            nav {
                padding: 1.5rem 5%;
            }
            
            .nav-links {
                display: none;
            }
            
            .hamburger {
                display: block;
            }
            
            .hero-content h2 {
                font-size: 2.2rem;
            }
            
            .section-title h3 {
                font-size: 2rem;
            }
            
            .cta h3 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero {
                padding: 8rem 5% 5rem;
            }
            
            .features, .how-it-works, .testimonials, .cta {
                padding: 4rem 5%;
            }
            
            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
            
            .cta-buttons-2 {
                flex-direction: column;
                gap: 1rem;
            }
            
            .cta-buttons-2 .btn {
                width: 100%;
            }
        }

    </style>
</head>
<body>
    <!-- Entête -->
    <header>
        <nav>
            <div class="logo">
                <i class="fas fa-hand-holding-medical"></i>
                <h1>XëtConnect</h1>
            </div>
            
            <div class="nav-links">
                <a href="#">Accueil</a>
                <a href="#specialties">Spécialités</a>
                <a href="#how-it-works">Comment ça marche?</a>
                <a href="#contact">Contact</a>
            </div>
            
            <div class="cta-buttons">
                <a href="Login" >
                    <button class="btn btn-outline">Connexion</button>
                </a>
                <a href="Inscription">
                    <button class="btn btn-primary">Inscription</button>
                </a>
            </div>
            
            <div class="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>La plateforme de référence pour connecter les hôpitaux et les chirurgiens</h2>
            <p>Optimisez la gestion des interventions chirurgicales, trouvez les meilleurs spécialistes et simplifiez la collaboration entre établissements et praticiens.</p>
            <div class="cta-buttons">
                <button class="btn btn-primary">Je suis un hôpital</button>
                <button class="btn btn-outline">Je suis chirurgien</button>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/operation.png') }}" alt="Plateforme XëtConnect">
        </div>
    </section>
 
    <!-- Specialties Section -->
    <section class="specialties" id="specialties">
        <div class="section-container">
            <div class="section-title">
                <h1>Spécialités médicales couvertes</h1>
                <p>Notre plateforme connecte les établissements avec des chirurgiens qualifiés dans toutes les spécialités</p>
                <br>
            </div>
            
            <div class="specialties-grid">
                <div class="specialty-card">
                    <div class="specialty-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Chirurgie cardiaque</h3>
                    <p>Cardiologues et chirurgiens vasculaires</p>
                </div>
                
                <div class="specialty-card">
                    <div class="specialty-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>Neurochirurgie</h3>
                    <p>Spécialistes du système nerveux</p>
                </div>
                
                <div class="specialty-card">
                    <div class="specialty-icon">
                        <i class="fas fa-bone"></i>
                    </div>
                    <h3>Orthopédie</h3>
                    <p>Chirurgiens orthopédistes et traumatologues</p>
                </div>
                
                <div class="specialty-card">
                    <div class="specialty-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Ophtalmologie</h3>
                    <p>Chirurgiens ophtalmologistes</p>
                </div>
                
                <div class="specialty-card">
                    <div class="specialty-icon">
                        <i class="fas fa-child"></i>
                    </div>
                    <h3>Pédiatrie</h3>
                    <p>Chirurgiens pédiatriques</p>
                </div>
                
                <div class="specialty-card">
                    <div class="specialty-icon">
                        <i class="fas fa-x-ray"></i>
                    </div>
                    <h3>Radiologie interventionnelle</h3>
                    <p>Spécialistes en imagerie médicale</p>
                </div>
                
                <div class="specialty-card">
                    <div class="specialty-icon">
                        <i class="fas fa-teeth"></i>
                    </div>
                    <h3>Stomatologie</h3>
                    <p>Chirurgiens dentistes et maxillo-faciaux</p>
                </div>
                
                <div class="specialty-card">
                    <div class="specialty-icon">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <h3>Autres spécialités</h3>
                    <p>Plastique, digestive, thoracique, urologie...</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- How It Works -->
    <section class="how-it-works" id="how-it-works">
        <div class="section-title">
            <h1>Comment fonctionne XëtConnect ?</h1>
            <p>En quelques étapes simples, optimisez votre activité chirurgicale</p>
            <br>
        </div>
        
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h4>Créez votre profil</h4>
                <p>Hôpital ou chirurgien, complétez votre profil avec vos informations professionnelles et vos spécificités.</p>
            </div>
            
            <div class="step">
                <div class="step-number">2</div>
                <h4>Recherchez des partenaires</h4>
                <p>Trouvez des correspondants idéaux grâce à nos algorithmes de matching intelligent.</p>
            </div>
            
            <div class="step">
                <div class="step-number">3</div>
                <h4>Planifiez les interventions</h4>
                <p>Organisez les interventions chirurgicales en synchronisant les plannings de tous les acteurs.</p>
            </div>
            
            <div class="step">
                <div class="step-number">4</div>
                <h4>Collaborer efficacement</h4>
                <p>Bénéficiez de tous nos outils pour une collaboration fluide et sécurisée.</p>
            </div>
        </div>
    </section>
    
    
    <!-- Footer -->
    <footer id="contact">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="logo">
                    <i class="fas fa-hand-holding-medical"></i>
                    <h1>XëtConnect</h1>
                </div>
                <p style="margin-top: 1rem; color: var(--gray);">La plateforme de référence pour connecter les hôpitaux et les chirurgiens.</p>
                <div class="social-links" style="margin-top: 1.5rem;">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="footer-col">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#features">Fonctionnalités</a></li>
                    <li><a href="#how-it-works">Comment ça marche</a></li>
                    <li><a href="#testimonials">Témoignages</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Légal</h4>
                <ul>
                    <li><a href="#">Conditions d'utilisation</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">RGPD</a></li>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">CGU</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt" style="margin-right: 0.5rem;"></i> Palais Vert de Gris</li>
                    <li><i class="fas fa-phone" style="margin-right: 0.5rem;"></i> +221 77 777 77 77</li>
                    <li><i class="fas fa-envelope" style="margin-right: 0.5rem;"></i> contact@xëtconnect.com</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
        </div>
    </footer>
    
    <script>
        // Simple script for mobile menu toggle (can be expanded)
        document.querySelector('.hamburger').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>