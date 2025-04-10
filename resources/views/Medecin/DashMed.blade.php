<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Chirurgien | XëtConnect</title>
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
        
        .dropdown-item {
            padding: 0.8rem 0;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .dropdown-item:last-child {
            border-bottom: none;
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
        

        .candidatures-container {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .candidature-item {
            padding: 1rem;
            border-bottom: 1px solid var(--light-gray);
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 1rem;
        }

        .candidature-item:last-child {
            border-bottom: none;
        }

        .candidature-info h4 {
            margin: 0 0 0.3rem;
            font-size: 1.1rem;
        }

        .candidature-meta {
            display: flex;
            gap: 1rem;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .candidature-status {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-en-attente {
            background-color: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .status-acceptee {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        .status-refusee {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
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
        
        .profile-preview {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .profile-preview-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary);
        }
        
        .file-preview {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .file-preview a {
            color: var(--primary);
            text-decoration: none;
        }
        
        .file-preview a:hover {
            text-decoration: underline;
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
        
        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
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
                <img src="https://randomuser.me/api/portraits/men/42.jpg" alt="Dr. Dupont" class="profile-img">
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item" id="updateProfileBtn">
                        <i class="fas fa-user-cog"></i>
                        <span>Mettre à jour mon profil</span>
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
                    <a href="ListInterv">
                        <i class="fas fa-search"></i>
                        <span>Rechercher interventions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="MyCandidatures">
                        <i class="fas fa-share-square"></i>
                        <span>Mes Candidatures</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="propositions.html">
                        <i class="fas fa-envelope"></i>
                        <span>Mes propositions</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- Dashboard Content -->
        <main class="main-content">
            <div class="dashboard-actions">
                <a href="ListInterv" class="action-card">
                    <h3><i class="fas fa-search"></i> Rechercher interventions</h3>
                    <p>Parcourez les interventions disponibles correspondant à votre spécialité</p>
                </a>
                
                <a href="MyPropositions" class="action-card">
                    <h3><i class="fas fa-envelope"></i> Voir mes propositions</h3>
                    <p>Consultez les interventions que les hôpitaux vous ont proposées</p>
                </a>
                
                <a href="MyCandidatures" class="action-card">
                    <h3><i class="fas fa-share-square"></i> Voir mes candidatures</h3>
                    <p>Consulter l'état de mes candidatures</p>
                </a>
            </div>

            
            <!-- doit contenir les n premieres candidatures -->
            <div class="candidatures-container">
                <h3>Mes candidatures récentes</h3>
                
                <div class="candidature-item">
                    <div class="candidature-info">
                        <h4>Prothèse de hanche gauche</h4>
                        <div class="candidature-meta">
                            <span><i class="fas fa-hospital"></i> CHU de Lyon</span>
                            <span><i class="fas fa-calendar-alt"></i> 15/07/2023</span>
                        </div>
                        <span class="candidature-status status-en-attente">En attente</span>
                    </div>
                    <div>
                        <button class="btn btn-outline">Détails</button>
                    </div>
                </div>
                
                <div class="candidature-item">
                    <div class="candidature-info">
                        <h4>Arthroscopie du genou droit</h4>
                        <div class="candidature-meta">
                            <span><i class="fas fa-hospital"></i> Clinique du Parc</span>
                            <span><i class="fas fa-calendar-alt"></i> 10/07/2023</span>
                        </div>
                        <span class="candidature-status status-acceptee">Acceptée</span>
                    </div>
                    <div>
                        <button class="btn btn-outline">Détails</button>
                    </div>
                </div>
                
                <div class="candidature-item">
                    <div class="candidature-info">
                        <h4>Ostéosynthèse fémur</h4>
                        <div class="candidature-meta">
                            <span><i class="fas fa-hospital"></i> Hôpital Nord</span>
                            <span><i class="fas fa-calendar-alt"></i> 05/07/2023</span>
                        </div>
                        <span class="candidature-status status-refusee">Refusée</span>
                    </div>
                    <div>
                        <button class="btn btn-outline">Détails</button>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 1rem;">
                    <a href="MyCandidatures" style="color: var(--primary); text-decoration: none;">
                        Voir toutes mes candidatures <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
        </div>
    </footer>
    
    <!-- Rubrique Mise à jour du profil -->
    <div class="modal" id="updateProfileModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Mettre à jour mon profil</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div class="profile-form">
                <div class="form-group">
                    <label>Photo de profil</label>
                    <div class="profile-preview">
                        <img src="https://randomuser.me/api/portraits/men/42.jpg" alt="Dr. Dupont" class="profile-preview-img">
                        <div>
                            <div class="file-upload-btn">
                                <i class="fas fa-camera"></i>
                                <span>Changer la photo</span>
                                <input type="file" accept="image/*" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>CV actuel</label>
                    <div class="file-preview">
                        <i class="fas fa-file-pdf" style="color: var(--danger);"></i>
                        <a href="#" target="_blank">CV_Dr_Dupont.pdf</a>
                    </div>
                    <div class="file-upload-btn">
                        <i class="fas fa-upload"></i>
                        <span>Mettre à jour le CV</span>
                        <input type="file" accept=".pdf" style="display: none;">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Diplômes</label>
                    <div class="file-preview">
                        <i class="fas fa-file-certificate" style="color: var(--success);"></i>
                        <a href="#" target="_blank">Diplome_Chirurgie.pdf</a>
                    </div>
                    <div class="file-preview">
                        <i class="fas fa-file-certificate" style="color: var(--success);"></i>
                        <a href="#" target="_blank">Specialisation_Orthopedie.pdf</a>
                    </div>
                    <div class="file-upload-btn">
                        <i class="fas fa-plus-circle"></i>
                        <span>Ajouter un diplôme</span>
                        <input type="file" accept=".pdf" style="display: none;" multiple>
                    </div>
                </div>
                
                <button class="btn btn-primary">Enregistrer les modifications</button>
            </div>
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
        
        // Gestion du clic en dehors du modal pour fermer
        window.addEventListener('click', function(e) {
            if (e.target === updateProfileModal) {
                updateProfileModal.style.display = 'none';
            }
        });
        
        // Gestion du calendrier - marquer les jours comme indisponibles
        const calendarDays = document.querySelectorAll('.calendar-day');
        calendarDays.forEach(day => {
            day.addEventListener('click', function() {
                if (!this.classList.contains('unavailable')) {
                    this.classList.add('unavailable');
                } else {
                    this.classList.remove('unavailable');
                }
            });
        });
        
        // Gestion de l'upload de fichiers
        const fileUploadBtns = document.querySelectorAll('.file-upload-btn');
        fileUploadBtns.forEach(btn => {
            const input = btn.querySelector('input');
            
            btn.addEventListener('click', function(e) {
                if (e.target !== input) {
                    input.click();
                }
            });
            
            input.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    // Ici vous pourriez ajouter une prévisualisation
                    console.log('Fichier sélectionné:', this.files[0].name);
                }
            });
        });
    </script>
</body>
</html>