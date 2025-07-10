<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Propositions | XëtConnect</title>
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
        
        /* Filtres */
        .search-filters {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .filter-group {
            margin-bottom: 1rem;
        }
        
        .filter-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--light-gray);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(42, 91, 215, 0.1);
        }
        
        .filter-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }
        
        /* Liste des propositions */
        .propositions-container {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .propositions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .search-box {
            display: flex;
            gap: 1rem;
        }
        
        .proposition-item {
            padding: 1.5rem;
            border-bottom: 1px solid var(--light-gray);
            transition: all 0.3s ease;
        }
        
        .proposition-item:hover {
            background-color: rgba(42, 91, 215, 0.03);
        }
        
        .proposition-item:last-child {
            border-bottom: none;
        }
        
        .proposition-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .proposition-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .proposition-status {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-pending {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .status-accepted {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .status-rejected {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .proposition-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        
        .proposition-description {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .proposition-details {
            background-color: var(--light-gray);
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 0.5rem;
        }
        
        .detail-label {
            font-weight: 500;
            min-width: 150px;
        }
        
        .proposition-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
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
        
        .btn-success {
            background-color: var(--success);
            color: white;
        }
        
        .btn-success:hover {
            background-color: #0d9f6e;
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
        }
        
        /* Modal Confirmation */
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
            max-width: 500px;
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
        
        .modal-body {
            margin-bottom: 1.5rem;
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
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
                    <a href="DashMed" class="dropdown-item">
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
                    <a href="MyCandidatures">
                        <i class="fas fa-share-square"></i>
                        <span>Mes Candidatures</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="MyPropositions" class="active">
                        <i class="fas fa-envelope"></i>
                        <span>Mes propositions</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-envelope"></i> Mes Propositions</h1>
                <div class="search-box">
                    <input type="text" placeholder="Rechercher..." class="form-control">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}} 
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <!-- Filtres -->
            <div class="search-filters">
                <h3>Filtrer les propositions</h3>
                <div class="filters-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                    <div class="filter-group">
                        <label for="status">Statut</label>
                        <select id="status" class="form-control">
                            <option value="">Tous les statuts</option>
                            <option value="pending">En attente</option>
                            <option value="accepted">Acceptées</option>
                            <option value="rejected">Refusées</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="date-from">À partir du</label>
                        <input type="date" id="date-from" class="form-control">
                    </div>
                    
                    <div class="filter-group">
                        <label for="date-to">Jusqu'au</label>
                        <input type="date" id="date-to" class="form-control">
                    </div>
                    
                </div>
                
                <div class="filter-actions">
                    <button class="btn btn-outline reset-btn">
                        <i class="fas fa-undo"></i> Réinitialiser
                    </button>
                    <button class="btn btn-primary filter-btn">
                        <i class="fas fa-filter"></i> Appliquer filtres
                    </button>
                </div>
            </div>
            
            <!-- Liste des propositions -->
            <div class="propositions-container">
                <div class="propositions-header">
                    <h3>Mes propositions</h3>
                    <span>nombre propositions</span>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Type d'intervention</th>
                            <th>Date souhaitée</th>
                            <th>Description</th>
                            <th>Établissement</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <!--  PRENDRE EN COMPTE CELA POUR LES CONTROLLER POUR POUVOIR ENUMERER LES PROPOSITIONS-->  
                </table>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal Confirmation Acceptation -->
    <div class="modal" id="acceptModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirmer l'acceptation</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir accepter cette proposition pour l'intervention <strong>"Remplacement - Chirurgie de la hernie inguinale"</strong> au <strong>CHU de Bordeaux</strong> ?</p>
                <p>Une fois acceptée, vous serez engagé à réaliser cette intervention.</p>
            </div>
            
            <div class="form-actions">
                <button class="btn btn-outline modal-close-btn">
                    <i class="fas fa-times"></i> Annuler
                </button>
                <button class="btn btn-success confirm-accept-btn">
                    <i class="fas fa-check"></i> Confirmer l'acceptation
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Confirmation Refus -->
    <div class="modal" id="rejectModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirmer le refus</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir refuser cette proposition pour l'intervention <strong>"Remplacement - Chirurgie de la hernie inguinale"</strong> ?</p>
                
                <div class="form-group">
                    <label for="rejectReason">Motif du refus (optionnel)</label>
                    <textarea id="rejectReason" class="form-control" placeholder="Indiquez ici la raison de votre refus..."></textarea>
                </div>
            </div>
            
            <div class="form-actions">
                <button class="btn btn-outline modal-close-btn">
                    <i class="fas fa-times"></i> Annuler
                </button>
                <button class="btn btn-danger confirm-reject-btn">
                    <i class="fas fa-times"></i> Confirmer le refus
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // Gestion des modals
        const acceptModal = document.getElementById('acceptModal');
        const rejectModal = document.getElementById('rejectModal');
        const modalCloseBtns = document.querySelectorAll('.modal-close');
        const modalCloseBtns2 = document.querySelectorAll('.modal-close-btn');
        const acceptBtns = document.querySelectorAll('.accept-btn');
        const rejectBtns = document.querySelectorAll('.reject-btn');
        const confirmAcceptBtn = document.querySelector('.confirm-accept-btn');
        const confirmRejectBtn = document.querySelector('.confirm-reject-btn');
        
        // Ouvrir modal d'acceptation
        acceptBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                acceptModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
        });
        
        // Ouvrir modal de refus
        rejectBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                rejectModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
        });
        
        // Fermer modals
        [...modalCloseBtns, ...modalCloseBtns2].forEach(btn => {
            btn.addEventListener('click', () => {
                acceptModal.style.display = 'none';
                rejectModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            });
        });
        
        // Fermer en cliquant en dehors
        window.addEventListener('click', (e) => {
            if (e.target === acceptModal || e.target === rejectModal) {
                acceptModal.style.display = 'none';
                rejectModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
        
        // Confirmation d'acceptation
        confirmAcceptBtn.addEventListener('click', () => {
            alert('Vous avez accepté cette proposition avec succès !');
            acceptModal.style.display = 'none';
            document.body.style.overflow = 'auto';
            
            // Ici vous ajouteriez la logique pour enregistrer l'acceptation
        });
        
        // Confirmation de refus
        confirmRejectBtn.addEventListener('click', () => {
            const reason = document.getElementById('rejectReason').value;
            alert('Vous avez refusé cette proposition' + (reason ? ' avec le motif : ' + reason : ''));
            rejectModal.style.display = 'none';
            document.body.style.overflow = 'auto';
            
            // Ici vous ajouteriez la logique pour enregistrer le refus
        });
        
        // Gestion des filtres
        document.querySelector('.filter-btn').addEventListener('click', () => {
            const status = document.getElementById('status').value;
            const dateFrom = document.getElementById('date-from').value;
            const dateTo = document.getElementById('date-to').value;
            const specialty = document.getElementById('specialty').value;
            
            console.log(`Filtres appliqués : Statut = ${status}, Date from = ${dateFrom}, Date to = ${dateTo}, Spécialité = ${specialty}`);
            alert('Filtres appliqués avec succès !');
        });
        
        // Réinitialisation des filtres
        document.querySelector('.reset-btn').addEventListener('click', () => {
            document.getElementById('status').value = '';
            document.getElementById('date-from').value = '';
            document.getElementById('date-to').value = '';
            document.getElementById('specialty').value = '';
            
            console.log('Filtres réinitialisés');
            alert('Filtres réinitialisés !');
        });
    </script>
</body>
</html>