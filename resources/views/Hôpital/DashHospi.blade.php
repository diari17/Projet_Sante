<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Hôpital | XëtConnect</title>
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
            --warning: #f59e0b;
            --danger: #ef4444;
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
            display: grid;
            grid-template-rows: auto 1fr auto;
            min-height: 100vh;
        }
        
        /* Header */
        header {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 8%;
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
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }
        
        .profile-dropdown {
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }
        
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary);
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            padding: 1rem;
            display: none;
            z-index: 10;
        }
        
        .profile-dropdown:hover .dropdown-menu {
            display: block;
        }
        
        .dropdown-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .dropdown-profile img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .dropdown-profile-info h4 {
            margin: 0;
            font-size: 1rem;
        }
        
        .dropdown-profile-info p {
            margin: 0.2rem 0 0;
            color: var(--gray);
            font-size: 0.8rem;
        }
        
        .dropdown-item {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            color: var(--primary);
        }
        
        .dropdown-item i {
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .main-container {
            display: grid;
            grid-template-columns: 250px 1fr;
        }
        
        .sidebar {
            background: white;
            padding: 1.5rem;
            border-right: 1px solid var(--light-gray);
        }
        
        .nav-menu {
            list-style: none;
        }
        
        .nav-item {
            margin-bottom: 0.5rem;
        }
        
        .nav-item a {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            color: var(--dark);
            transition: all 0.3s ease;
        }
        
        .nav-item a:hover, .nav-item a.active {
            background-color: rgba(42, 91, 215, 0.1);
            color: var(--primary);
        }
        
        .nav-item i {
            width: 20px;
            text-align: center;
        }
        
        .main-content {
            padding: 2rem;
        }
        
        .dashboard-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .action-card {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--dark);
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .action-card h3 {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }
        
        .action-card i {
            color: var(--primary);
            font-size: 1.2rem;
        }
        
        .action-card p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        /* Interventions Container */
        .interventions-container {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .interventions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .intervention-item {
            padding: 1rem;
            border-bottom: 1px solid var(--light-gray);
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 1rem;
        }
        
        .intervention-item:last-child {
            border-bottom: none;
        }
        
        .intervention-info h4 {
            margin: 0 0 0.3rem;
            font-size: 1.1rem;
        }
        
        .intervention-meta {
            display: flex;
            gap: 1rem;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }
        
        .intervention-status {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-attribuee {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .status-non-attribuee {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .btn {
            padding: 0.6rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: rgba(42, 91, 215, 0.1);
        }
        
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 0.8rem;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 2rem;
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
        }
        
        .profile-form {
            display: grid;
            gap: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--light-gray);
            border-radius: 0.5rem;
        }
        
        .file-upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--light);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .file-upload-btn:hover {
            background-color: var(--light-gray);
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 1.5rem;
            text-align: center;
            grid-column: 1 / -1;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .main-container {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <a class="logo">
                <i class="fas fa-hand-holding-medical"></i>
                <h1>XëtConnect</h1>
            </a>
            
            <div class="profile-dropdown">
                <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Directrice Martin" class="profile-img">
                <div class="dropdown-menu">
                    <div class="dropdown-profile">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Directrice Martin">
                        <div class="dropdown-profile-info">
                            <h4>Clinique Saint-Louis</h4>
                            <p>Paris, Île-de-France</p>
                        </div>
                    </div>
                    
                    <a href="#" class="dropdown-item" id="updateProfileBtn">
                        <i class="fas fa-user-cog"></i>
                        <span>Paramètres du compte</span>
                    </a>
                    
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Main Content -->
    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="active">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="CreerInterv">
                        <i class="fas fa-plus-circle"></i>
                        <span>Créer une intervention</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="ListMed">
                        <i class="fas fa-search"></i>
                        <span>Rechercher un médecin/chirurgien</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="ListCandidatures">
                        <i class="fas fa-envelope"></i>
                        <span>Candidatures reçues</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="SendPropositions">
                        <i class="fas fa-share-square"></i>
                        <span>Propositions envoyées</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- Dashboard Content -->
        <main class="main-content">
            <div class="dashboard-actions">
                <a href="CreerInterv" class="action-card">
                    <h3><i class="fas fa-plus-circle"></i> Créer une intervention</h3>
                    <p>Publiez une nouvelle demande d'intervention chirurgicale</p>
                </a>
                
                <a href="ListMed" class="action-card">
                    <h3><i class="fas fa-search"></i> Rechercher un médecin/chirurgien</h3>
                    <p>Trouvez des chirurgiens par spécialité et disponibilité</p>
                </a>
                
                <a href="candidatures.html" class="action-card">
                    <h3><i class="fas fa-envelope"></i> Gérer les candidatures</h3>
                    <p>Consultez et répondez aux candidatures reçues</p>
                </a>
            </div>
            
            <div class="interventions-container">
                <div class="interventions-header">
                    <h3>Mes interventions récentes</h3>
                    <a href="CreerInterv" class="btn btn-outline">Voir toutes</a>
                </div>
                
                <div class="intervention-item">
                    <div class="intervention-info">
                        <h4>Prothèse de hanche droite - M. Dubois</h4>
                        <div class="intervention-meta">
                            <span><i class="fas fa-calendar-alt"></i> 15/07/2023 - 08:30</span>
                            <span><i class="fas fa-user-md"></i> Orthopédie</span>
                            <span><i class="fas fa-clock"></i> 2h estimées</span>
                        </div>
                        <span class="intervention-status status-attribuee">Attribuée</span>
                        <p>Chirurgien: Dr. Jean Dupont</p>
                    </div>
                    <div class="intervention-actions">
                        <button class="btn btn-outline">Modifier</button>
                        <button class="btn btn-primary">Détails</button>
                    </div>
                </div>
                
                <div class="intervention-item">
                    <div class="intervention-info">
                        <h4>Arthroscopie genou gauche - Mme. Lambert</h4>
                        <div class="intervention-meta">
                            <span><i class="fas fa-calendar-alt"></i> 17/07/2023 - 01:30</span>
                            <span><i class="fas fa-user-md"></i> Orthopédie</span>
                            <span><i class="fas fa-clock"></i> 1h30 estimées</span>
                        </div>
                        <span class="intervention-status status-non-attribuee">Non attribuée</span>
                        <p>3 candidatures reçues</p>
                    </div>
                    <div class="intervention-actions">
                        <button class="btn btn-outline">Modifier</button>
                        <button class="btn btn-primary">Voir candidatures</button>
                    </div>
                </div>
                
                <div class="intervention-item">
                    <div class="intervention-info">
                        <h4>Appendicectomie - M. Petit</h4>
                        <div class="intervention-meta">
                            <span><i class="fas fa-calendar-alt"></i> 20/07/2023 - 09:00</span>
                            <span><i class="fas fa-user-md"></i> Chirurgie générale</span>
                            <span><i class="fas fa-clock"></i> 3h estimée</span>
                        </div>
                        <span class="intervention-status status-non-attribuee">Non attribuée</span>
                        <p>Aucune candidature</p>
                    </div>
                    <div class="intervention-actions">
                        <button class="btn btn-outline">Modifier</button>
                        <button class="btn btn-outline">Rechercher</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal Paramètres du compte -->
    <div class="modal" id="updateProfileModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Paramètres du compte</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <form class="profile-form">
                <div class="form-group">
                    <label>Photo de l'établissement</label>
                    <div class="file-upload-btn">
                        <i class="fas fa-camera"></i>
                        <span>Changer la photo</span>
                        <input type="file" accept="image/*" style="display: none;">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Nom de l'établissement</label>
                    <input type="text" class="form-control" value="Clinique Saint-Louis">
                </div>
                
                <div class="form-group">
                    <label>Adresse</label>
                    <input type="text" class="form-control" value="12 Rue Larvel">
                </div>
                
                <div class="form-group">
                    <label>Téléphone</label>
                    <input type="tel" class="form-control" value="+xxx xx xxx xx xx">
                </div>
                
                <div class="form-group">
                    <label>Email de contact</label>
                    <input type="email" class="form-control" value="contact@clinique-saint-louis.fr">
                </div>
                
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
    
    <script>
        // Gestion du modal
        const updateProfileBtn = document.getElementById('updateProfileBtn');
        const updateProfileModal = document.getElementById('updateProfileModal');
        const modalClose = document.querySelector('.modal-close');
        
        updateProfileBtn.addEventListener('click', function(e) {
            e.preventDefault();
            updateProfileModal.style.display = 'flex';
        });
        
        modalClose.addEventListener('click', function() {
            updateProfileModal.style.display = 'none';
        });
        
        window.addEventListener('click', function(e) {
            if (e.target === updateProfileModal) {
                updateProfileModal.style.display = 'none';
            }
        });
        
        // Gestion des actions sur les interventions
        document.querySelectorAll('.intervention-actions .btn').forEach(button => {
            button.addEventListener('click', function() {
                const interventionTitle = this.closest('.intervention-item').querySelector('h4').textContent;
                
                if (this.textContent.includes('Modifier')) {
                    console.log(`Modifier intervention: ${interventionTitle}`);
                    // window.location.href = `modifier-intervention.html?id=123`;
                } else if (this.textContent.includes('Détails')) {
                    console.log(`Voir détails: ${interventionTitle}`);
                    // window.location.href = `details-intervention.html?id=123`;
                } else if (this.textContent.includes('Voir')) {
                    console.log(`Voir candidatures: ${interventionTitle}`);
                    // window.location.href = `candidatures.html?intervention=123`;
                } else if (this.textContent.includes('Rechercher')) {
                    console.log(`Rechercher chirurgien pour: ${interventionTitle}`);
                    // window.location.href = `rechercher-chirurgien.html?intervention=123`;
                }
            });
        });
    </script>
</body>
</html>