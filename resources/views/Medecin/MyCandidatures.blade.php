<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Candidatures | XëtConnect</title>
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
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .page-title {
            font-size: 1.8rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        /* Liste des candidatures */
        .candidatures-container {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .candidatures-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .search-box {
            display: flex;
            gap: 1rem;
        }
        
        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        
        .filter-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .filter-group label {
            font-weight: 500;
        }
        
        .candidature-item {
            padding: 1.5rem;
            border-bottom: 1px solid var(--light-gray);
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .candidature-item:hover {
            background-color: rgba(42, 91, 215, 0.03);
        }
        
        .candidature-item:last-child {
            border-bottom: none;
        }
        
        .candidature-info h4 {
            margin: 0 0 0.5rem;
            font-size: 1.1rem;
        }
        
        .candidature-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }
        
        .candidature-status {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-en-attente {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .status-acceptee {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .status-refusee {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .status-annulee {
            background-color: rgba(100, 116, 139, 0.1);
            color: var(--gray);
        }
        
        .candidature-actions {
            display: flex;
            gap: 0.8rem;
            align-items: flex-start;
        }
        
        /* Boutons */
        .btn {
            padding: 0.7rem 1.2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
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
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
        }
        
        .btn-success {
            background-color: var(--success);
            color: white;
        }
        
        .btn-success:hover {
            background-color: #0d9f6e;
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .main-container {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                display: none;
            }
            
            .candidature-item {
                grid-template-columns: 1fr;
            }
            
            .candidature-actions {
                justify-content: flex-end;
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
                    <a href="DashMed" class="dropdown-item" id="updateProfileBtn">
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
                    <a href="DashMed">
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
                    <a href="MyCandidatures" class="active">
                        <i class="fas fa-share-square"></i>
                        <span>Mes Candidatures</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="MyPropositions">
                        <i class="fas fa-envelope"></i>
                        <span>Mes propositions</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-share-square"></i> Mes Candidatures</h1>
            </div>
            
            <div class="candidatures-container">
                <div class="candidatures-header">
                    <h2>Historique de mes candidatures</h2>
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher..." class="form-control">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <div class="filters">
                    <div class="filter-group">
                        <label for="filterStatus">Statut :</label>
                        <select id="filterStatus" class="form-control">
                            <option value="all">Tous</option>
                            <option value="en-attente">En attente</option>
                            <option value="acceptee">Acceptée</option>
                            <option value="refusee">Refusée</option>
                            <option value="annulee">Annulée</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="filterDate">Date :</label>
                        <select id="filterDate" class="form-control">
                            <option value="all">Toutes</option>
                            <option value="today">Aujourd'hui</option>
                            <option value="week">Cette semaine</option>
                            <option value="month">Ce mois</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-outline">
                        <i class="fas fa-filter"></i> Filtrer
                    </button>
                </div>
                
                <div id="candidaturesList">
                    <!-- Candidature 1 -->
                    <div class="candidature-item">
                        <div class="candidature-info">
                            <h4>Prothèse de hanche gauche - M. Jean Martin</h4>
                            <div class="candidature-meta">
                                <span><i class="fas fa-hospital"></i> CHU de Lyon</span>
                                <span><i class="fas fa-calendar-alt"></i> 15/07/2023</span>
                                <span><i class="fas fa-euro-sign"></i> 1 200 €</span>
                            </div>
                            <span class="candidature-status status-en-attente">En attente</span>
                        </div>
                        <div class="candidature-actions">
                            <button class="btn btn-outline details-btn">
                                <i class="fas fa-eye"></i> Détails
                            </button>
                            <button class="btn btn-danger delete-btn">
                                <i class="fas fa-trash"></i> Annuler
                            </button>
                        </div>
                    </div>
                    
                    <!-- Candidature 2 -->
                    <div class="candidature-item">
                        <div class="candidature-info">
                            <h4>Arthroscopie du genou droit - Mme. Sophie Lambert</h4>
                            <div class="candidature-meta">
                                <span><i class="fas fa-hospital"></i> Clinique du Parc</span>
                                <span><i class="fas fa-calendar-alt"></i> 10/07/2023</span>
                                <span><i class="fas fa-euro-sign"></i> 950 €</span>
                            </div>
                            <span class="candidature-status status-acceptee">Acceptée</span>
                        </div>
                        <div class="candidature-actions">
                            <button class="btn btn-outline details-btn">
                                <i class="fas fa-eye"></i> Détails
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-calendar-check"></i> Confirmer
                            </button>
                        </div>
                    </div>
                    
                    <!-- Candidature 3 -->
                    <div class="candidature-item">
                        <div class="candidature-info">
                            <h4>Ostéosynthèse fémur - M. Pierre Dubois</h4>
                            <div class="candidature-meta">
                                <span><i class="fas fa-hospital"></i> Hôpital Nord</span>
                                <span><i class="fas fa-calendar-alt"></i> 05/07/2023</span>
                                <span><i class="fas fa-euro-sign"></i> 1 500 €</span>
                            </div>
                            <span class="candidature-status status-refusee">Refusée</span>
                        </div>
                        <div class="candidature-actions">
                            <button class="btn btn-outline details-btn">
                                <i class="fas fa-eye"></i> Détails
                            </button>
                        </div>
                    </div>
                    
                    <!-- Candidature 4 -->
                    <div class="candidature-item">
                        <div class="candidature-info">
                            <h4>Appendicectomie - M. Thomas Petit</h4>
                            <div class="candidature-meta">
                                <span><i class="fas fa-hospital"></i> Clinique Saint-Louis</span>
                                <span><i class="fas fa-calendar-alt"></i> 01/07/2023</span>
                                <span><i class="fas fa-euro-sign"></i> 800 €</span>
                            </div>
                            <span class="candidature-status status-annulee">Annulée</span>
                        </div>
                        <div class="candidature-actions">
                            <button class="btn btn-outline details-btn">
                                <i class="fas fa-eye"></i> Détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal Détails Candidature -->
    <div class="modal" id="detailsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Détails de la candidature</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div class="modal-body">
                <div class="form-group">
                    <h4>Intervention : Prothèse de hanche gauche</h4>
                    <p><strong>Patient :</strong> M. Jean Martin (68 ans)</p>
                    <p><strong>Établissement :</strong> CHU de Lyon</p>
                    <p><strong>Date prévue :</strong> 15/07/2023 à 08:30</p>
                    <p><strong>Durée estimée :</strong> 2 heures</p>
                    <p><strong>Tarif proposé :</strong> 1 200 €</p>
                </div>
                
                <div class="form-group">
                    <h4>Message accompagnant la candidature :</h4>
                    <p>Bonjour, je suis spécialisé dans les prothèses de hanche avec plus de 150 interventions réalisées au cours des 5 dernières années. Je propose une technique mini-invasive permettant une récupération plus rapide pour le patient.</p>
                </div>
                
                <div class="form-group">
                    <h4>Statut : <span class="candidature-status status-en-attente">En attente</span></h4>
                    <p>Date de candidature : 10/07/2023</p>
                </div>
            </div>
            
            <div class="form-actions">
                <button class="btn btn-outline close-btn">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-danger">
                    <i class="fas fa-trash"></i> Annuler la candidature
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Confirmation Annulation -->
    <div class="modal" id="confirmModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirmer l'annulation</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir annuler cette candidature ? Cette action est irréversible.</p>
                <p><strong>Intervention :</strong> Prothèse de hanche gauche - CHU de Lyon</p>
            </div>
            
            <div class="form-actions">
                <button class="btn btn-outline close-btn">
                    <i class="fas fa-times"></i> Non, garder
                </button>
                <button class="btn btn-danger confirm-btn">
                    <i class="fas fa-check"></i> Oui, annuler
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // Gestion des modals
        const detailsModal = document.getElementById('detailsModal');
        const confirmModal = document.getElementById('confirmModal');
        const modalCloseBtns = document.querySelectorAll('.modal-close');
        const closeBtns = document.querySelectorAll('.close-btn');
        const detailsBtns = document.querySelectorAll('.details-btn');
        const deleteBtns = document.querySelectorAll('.delete-btn');
        
        // Ouvrir modal détails
        detailsBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                detailsModal.style.display = 'flex';
            });
        });
        
        // Ouvrir modal confirmation annulation
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                confirmModal.style.display = 'flex';
            });
        });
        
        // Fermer modals
        modalCloseBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                detailsModal.style.display = 'none';
                confirmModal.style.display = 'none';
            });
        });
        
        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                detailsModal.style.display = 'none';
                confirmModal.style.display = 'none';
            });
        });
        
        window.addEventListener('click', (e) => {
            if (e.target === detailsModal || e.target === confirmModal) {
                detailsModal.style.display = 'none';
                confirmModal.style.display = 'none';
            }
        });
        
        // Confirmation d'annulation
        document.querySelector('.confirm-btn').addEventListener('click', () => {
            // Ici vous ajouteriez la logique pour annuler la candidature
            alert('Candidature annulée avec succès');
            confirmModal.style.display = 'none';
            
            // Mettre à jour l'interface utilisateur
            // Par exemple, changer le statut ou supprimer l'élément
        });
        
        // Filtrage des candidatures
        document.querySelector('.btn-outline').addEventListener('click', () => {
            const status = document.getElementById('filterStatus').value;
            const date = document.getElementById('filterDate').value;
            
            // Ici vous implémenteriez la logique de filtrage
            alert(`Filtrage appliqué : Statut = ${status}, Date = ${date}`);
        });
    </script>
</body>
</html>