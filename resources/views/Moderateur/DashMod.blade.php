<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Modérateur | XëtConnect</title>
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
        
        /* Tableau des utilisateurs */
        .users-container {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .users-header {
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
        
        .users-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .users-table th, .users-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .users-table th {
            font-weight: 600;
            color: var(--dark);
            background-color: rgba(42, 91, 215, 0.05);
        }
        
        .users-table tr:hover {
            background-color: rgba(42, 91, 215, 0.03);
        }
        
        .user-status {
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
        
        .status-approved {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .status-rejected {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .user-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        /* Boutons */
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-sm {
            padding: 0.3rem 0.6rem;
            font-size: 0.7rem;
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
        
        .user-details {
            display: grid;
            grid-template-columns: 100px 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .user-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary);
        }
        
        .user-info h3 {
            margin-bottom: 0.5rem;
        }
        
        .user-meta {
            display: flex;
            gap: 1rem;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .documents-list {
            margin-top: 1.5rem;
        }
        
        .document-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .document-item a {
            color: var(--primary);
            text-decoration: none;
        }
        
        .document-item a:hover {
            text-decoration: underline;
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
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
            
            .users-table {
                display: block;
                overflow-x: auto;
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
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Modérateur" class="profile-img">
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user-cog"></i>
                        <span>Mon compte</span>
                    </a>
                    
                    <a href="login-moderateur.html" class="dropdown-item">
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
                    <a href="dashboard-moderateur.html" class="active">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="utilisateurs-en-attente.html">
                        <i class="fas fa-user-clock"></i>
                        <span>En attente</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="utilisateurs-approuves.html">
                        <i class="fas fa-user-check"></i>
                        <span>Approuvés</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="utilisateurs-rejetes.html">
                        <i class="fas fa-user-times"></i>
                        <span>Rejetés</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-home"></i> Tableau de bord Modérateur</h1>
            </div>
            
            <div class="users-container">
                <div class="users-header">
                    <h2>Dernières demandes d'inscription</h2>
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher..." class="form-control">
                        <button class="btn btn-outline">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <div class="filters">
                    <div class="filter-group">
                        <label for="filterType">Type :</label>
                        <select id="filterType" class="form-control">
                            <option value="all">Tous</option>
                            <option value="medecin">Médecins</option>
                            <option value="hopital">Hôpitaux</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="filterDate">Date :</label>
                        <select id="filterDate" class="form-control">
                            <option value="all">Toutes</option>
                            <option value="today">Aujourd'hui</option>
                            <option value="week">Cette semaine</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-outline">
                        <i class="fas fa-filter"></i> Filtrer
                    </button>
                </div>
                
                <table class="users-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Martin" style="width: 30px; height: 30px; border-radius: 50%;">
                                    <span>Dr. Jean Martin</span>
                                </div>
                            </td>
                            <td>Chirurgien</td>
                            <td>jean.martin@example.com</td>
                            <td>15/07/2023</td>
                            <td><span class="user-status status-pending">En attente</span></td>
                            <td>
                                <div class="user-actions">
                                    <button class="btn btn-sm btn-success approve-btn">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger reject-btn">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline details-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Clinique" style="width: 30px; height: 30px; border-radius: 50%;">
                                    <span>Clinique Saint-Louis</span>
                                </div>
                            </td>
                            <td>Hôpital</td>
                            <td>contact@clinique-saintlouis.fr</td>
                            <td>14/07/2023</td>
                            <td><span class="user-status status-pending">En attente</span></td>
                            <td>
                                <div class="user-actions">
                                    <button class="btn btn-sm btn-success approve-btn">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger reject-btn">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline details-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Dr. Sophie" style="width: 30px; height: 30px; border-radius: 50%;">
                                    <span>Dr. Sophie Lambert</span>
                                </div>
                            </td>
                            <td>Chirurgien</td>
                            <td>sophie.lambert@example.com</td>
                            <td>12/07/2023</td>
                            <td><span class="user-status status-approved">Approuvé</span></td>
                            <td>
                                <div class="user-actions">
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline details-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Dr. Pierre" style="width: 30px; height: 30px; border-radius: 50%;">
                                    <span>Dr. Pierre Dubois</span>
                                </div>
                            </td>
                            <td>Chirurgien</td>
                            <td>pierre.dubois@example.com</td>
                            <td>10/07/2023</td>
                            <td><span class="user-status status-rejected">Rejeté</span></td>
                            <td>
                                <div class="user-actions">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-redo"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline details-btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal Détails Utilisateur -->
    <div class="modal" id="userModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Détails de l'utilisateur</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div class="user-details">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Martin" class="user-avatar">
                <div class="user-info">
                    <h3>Dr. Jean Martin</h3>
                    <div class="user-meta">
                        <span><i class="fas fa-envelope"></i> jean.martin@example.com</span>
                        <span><i class="fas fa-phone"></i> +33 6 12 34 56 78</span>
                    </div>
                    <div class="user-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Lyon, France</span>
                        <span><i class="fas fa-user-tag"></i> Chirurgien orthopédique</span>
                    </div>
                    <div class="user-meta">
                        <span><i class="fas fa-calendar-alt"></i> Inscrit le 15/07/2023</span>
                        <span class="user-status status-pending">En attente de validation</span>
                    </div>
                </div>
            </div>
            
            <div class="documents-list">
                <h4>Documents vérifiables :</h4>
                <div class="document-item">
                    <i class="fas fa-file-pdf" style="color: var(--danger);"></i>
                    <a href="#" target="_blank">Diplôme_de_Chirurgie.pdf</a>
                </div>
                <div class="document-item">
                    <i class="fas fa-file-certificate" style="color: var(--success);"></i>
                    <a href="#" target="_blank">Certificat_Spécialisation.pdf</a>
                </div>
                <div class="document-item">
                    <i class="fas fa-id-card" style="color: var(--primary);"></i>
                    <a href="#" target="_blank">Carte_Professionnelle.pdf</a>
                </div>
            </div>
            
            <div class="form-actions">
                <button class="btn btn-outline close-btn">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-danger reject-btn">
                    <i class="fas fa-times"></i> Rejeter
                </button>
                <button class="btn btn-success approve-btn">
                    <i class="fas fa-check"></i> Approuver
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Confirmation -->
    <div class="modal" id="confirmModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirmer l'action</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div class="modal-body">
                <p id="confirmMessage">Êtes-vous sûr de vouloir approuver cet utilisateur ?</p>
            </div>
            
            <div class="form-actions">
                <button class="btn btn-outline cancel-btn">
                    <i class="fas fa-times"></i> Annuler
                </button>
                <button class="btn btn-primary confirm-btn">
                    <i class="fas fa-check"></i> Confirmer
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // Gestion des modals
        const userModal = document.getElementById('userModal');
        const confirmModal = document.getElementById('confirmModal');
        const modalCloseBtns = document.querySelectorAll('.modal-close');
        const closeBtns = document.querySelectorAll('.close-btn');
        const detailsBtns = document.querySelectorAll('.details-btn');
        const approveBtns = document.querySelectorAll('.approve-btn');
        const rejectBtns = document.querySelectorAll('.reject-btn');
        const cancelBtn = document.querySelector('.cancel-btn');
        const confirmBtn = document.querySelector('.confirm-btn');
        
        // Ouvrir modal détails
        detailsBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                userModal.style.display = 'flex';
            });
        });
        
        // Ouvrir modal confirmation approbation
        approveBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                document.getElementById('confirmMessage').textContent = "Êtes-vous sûr de vouloir approuver cet utilisateur ?";
                confirmModal.style.display = 'flex';
            });
        });
        
        // Ouvrir modal confirmation rejet
        rejectBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                document.getElementById('confirmMessage').textContent = "Êtes-vous sûr de vouloir rejeter cet utilisateur ?";
                confirmModal.style.display = 'flex';
            });
        });
        
        // Fermer modals
        modalCloseBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                userModal.style.display = 'none';
                confirmModal.style.display = 'none';
            });
        });
        
        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                userModal.style.display = 'none';
                confirmModal.style.display = 'none';
            });
        });
        
        cancelBtn.addEventListener('click', () => {
            confirmModal.style.display = 'none';
        });
        
        // Confirmer action
        confirmBtn.addEventListener('click', () => {
            // Ici vous ajouteriez la logique pour approuver/rejeter l'utilisateur
            alert('Action confirmée !');
            confirmModal.style.display = 'none';
            userModal.style.display = 'none';
            
            // Mettre à jour l'interface utilisateur
            // Par exemple, changer le statut ou supprimer l'élément
        });
        
        window.addEventListener('click', (e) => {
            if (e.target === userModal || e.target === confirmModal) {
                userModal.style.display = 'none';
                confirmModal.style.display = 'none';
            }
        });
        
        // Filtrage des utilisateurs
        document.querySelector('.btn-outline').addEventListener('click', () => {
            const type = document.getElementById('filterType').value;
            const date = document.getElementById('filterDate').value;
            
            // Ici vous implémenteriez la logique de filtrage
            alert(`Filtrage appliqué : Type = ${type}, Date = ${date}`);
        });
    </script>
</body>
</html>