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

        .nav-item a.active {
            background-color: rgba(42, 91, 215, 0.2);
            border-left: 3px solid var(--primary);
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--gray);
        }
        
        .type-badge {
            display: inline-block;
            padding: 0.3rem 0.6rem;
            border-radius: 0.5rem;
            font-size: 0.7rem;
            font-weight: 500;
        }
        
        .type-medecin {
            background-color: rgba(0, 194, 203, 0.1);
            color: var(--secondary);
        }
        
        .type-hopital {
            background-color: rgba(42, 91, 215, 0.1);
            color: var(--primary);
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
        <!-- Sidebar modifié -->
        <aside class="sidebar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="active" data-filter="all">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-filter="pending">
                        <i class="fas fa-user-clock"></i>
                        <span>En attente</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-filter="approved">
                        <i class="fas fa-user-check"></i>
                        <span>Approuvés</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-filter="rejected">
                        <i class="fas fa-user-times"></i>
                        <span>Rejetés</span>
                    </a>
                </li>
            </ul>
            
            <div style="padding: 1rem; border-top: 1px solid var(--light-gray); margin-top: 1rem;">
                <h4 style="margin-bottom: 0.5rem; font-size: 0.9rem;">Filtrer par type :</h4>
                <select id="userTypeFilter" class="form-control">
                    <option value="all">Tous les types</option>
                    <option value="chirurgien">Chirurgiens</option>
                    <option value="etablissement">Établissements</option>
                </select>
            </div>
        </aside>
        
        <!-- Main Content modifié -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title" id="currentViewTitle"><i class="fas fa-home"></i> Tableau de bord Modérateur</h1>
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Rechercher..." class="form-control">
                    <button class="btn btn-outline" id="searchBtn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            
            <div class="users-container">
                <div id="usersTableContainer">
                    <!-- Le contenu sera chargé dynamiquement ici -->
                </div>
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
        // Données initiales
        let chirurgiens = @json($chirurgiens ?? collect());
        let etablissements = @json($etablissements ?? collect());
        
        // Variables d'état
        let currentFilter = "all";
        let currentTypeFilter = "all";
        let currentSearch = "";

        // Fonction pour filtrer les utilisateurs
        function filterUsers() {
            let filteredChirurgiens = chirurgiens.filter(user => {
                const statusMatch = currentFilter === "all" || user.status === currentFilter;
                const typeMatch = currentTypeFilter === "all" || currentTypeFilter === "chirurgien";
                const searchMatch = currentSearch === "" || 
                    user.nom.toLowerCase().includes(currentSearch.toLowerCase()) || 
                    user.email.toLowerCase().includes(currentSearch.toLowerCase()) ||
                    user.specialite.toLowerCase().includes(currentSearch.toLowerCase());
                
                return statusMatch && typeMatch && searchMatch;
            });

            let filteredEtablissements = etablissements.filter(user => {
                const statusMatch = currentFilter === "all" || user.status === currentFilter;
                const typeMatch = currentTypeFilter === "all" || currentTypeFilter === "etablissement";
                const searchMatch = currentSearch === "" || 
                    user.nom.toLowerCase().includes(currentSearch.toLowerCase()) || 
                    user.email.toLowerCase().includes(currentSearch.toLowerCase()) ||
                    user.type.toLowerCase().includes(currentSearch.toLowerCase());
                
                return statusMatch && typeMatch && searchMatch;
            });

            return [...filteredChirurgiens, ...filteredEtablissements];
        }

        // Fonction pour afficher les utilisateurs
        function renderUsers() {
            const filteredUsers = filterUsers();
            const container = document.getElementById('usersTableContainer');
            
            if (filteredUsers.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-user-slash" style="font-size: 3rem; margin-bottom: 1rem; color: var(--gray);"></i>
                        <h3>Aucun utilisateur trouvé</h3>
                        <p>Aucun utilisateur ne correspond à vos critères de recherche.</p>
                    </div>
                `;
                return;
            }
            
            let html = `
                <div class="users-header">
                    <h2>${getViewTitle()}</h2>
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
            `;
            
            filteredUsers.forEach(user => {
                const isChirurgien = user.hasOwnProperty('specialite');
                const type = isChirurgien ? 'chirurgien' : 'etablissement';
                const specialty = isChirurgien ? user.specialite : user.type;
                
                html += `
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <img src="${user.photo || 'https://randomuser.me/api/portraits/men/32.jpg'}" alt="${user.nom}" style="width: 30px; height: 30px; border-radius: 50%;">
                                <span>${user.nom}</span>
                            </div>
                        </td>
                        <td>
                            <span class="type-badge ${type === 'chirurgien' ? 'type-medecin' : 'type-hopital'}">
                                ${type === 'chirurgien' ? 'Chirurgien' : 'Établissement'}
                            </span>
                        </td>
                        <td>${user.email}</td>
                        <td>${user.created_at}</td>
                        <td>
                            <span class="user-status ${getStatusClass(user.status)}">
                                ${getStatusText(user.status)}
                            </span>
                        </td>
                        <td>
                            <div class="user-actions">
                                ${user.status === 'pending' ? `
                                    <button class="btn btn-sm btn-success approve-btn" data-id="${user.id}" data-type="${type}">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger reject-btn" data-id="${user.id}" data-type="${type}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                ` : user.status === 'approved' ? `
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="${user.id}" data-type="${type}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                ` : `
                                    <button class="btn btn-sm btn-success restore-btn" data-id="${user.id}" data-type="${type}">
                                        <i class="fas fa-redo"></i>
                                    </button>
                                `}
                                <button class="btn btn-sm btn-outline details-btn" data-id="${user.id}" data-type="${type}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            });
            
            html += `</tbody></table>`;
            container.innerHTML = html;
            
            // Mettre à jour les écouteurs d'événements
            setupEventListeners();
        }

        // Fonctions utilitaires
        function getStatusClass(status) {
            return {
                'pending': 'status-pending',
                'approved': 'status-approved',
                'rejected': 'status-rejected'
            }[status] || '';
        }

        function getStatusText(status) {
            return {
                'pending': 'En attente',
                'approved': 'Approuvé',
                'rejected': 'Rejeté'
            }[status] || status;
        }

        function getViewTitle() {
            const titles = {
                'all': 'Tous les utilisateurs',
                'pending': 'Demandes en attente',
                'approved': 'Utilisateurs approuvés',
                'rejected': 'Utilisateurs rejetés'
            };
            return titles[currentFilter] || 'Utilisateurs';
        }

        function setupEventListeners() {
            // Navigation sidebar
            document.querySelectorAll('.nav-item a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    document.querySelectorAll('.nav-item a').forEach(item => {
                        item.classList.remove('active');
                    });
                    this.classList.add('active');
                    
                    currentFilter = this.getAttribute('data-filter');
                    document.getElementById('currentViewTitle').textContent = getViewTitle();
                    renderUsers();
                });
            });
            
            // Filtre par type
            document.getElementById('userTypeFilter').addEventListener('change', function() {
                currentTypeFilter = this.value;
                renderUsers();
            });
            
            // Recherche
            document.getElementById('searchBtn').addEventListener('click', function() {
                currentSearch = document.getElementById('searchInput').value;
                renderUsers();
            });
            
            document.getElementById('searchInput').addEventListener('keyup', function(e) {
                if (e.key === 'Enter') {
                    currentSearch = this.value;
                    renderUsers();
                }
            });
            
            // Boutons actions
            document.querySelectorAll('.approve-btn, .reject-btn, .delete-btn, .restore-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const userId = parseInt(this.getAttribute('data-id'));
                    const userType = this.getAttribute('data-type');
                    const action = this.classList.contains('approve-btn') ? 'approve' :
                                  this.classList.contains('reject-btn') ? 'reject' :
                                  this.classList.contains('delete-btn') ? 'delete' : 'restore';
                    
                    handleUserAction(userId, action, userType);
                });
            });
            
            // Boutons détails
            document.querySelectorAll('.details-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const userId = parseInt(this.getAttribute('data-id'));
                    const userType = this.getAttribute('data-type');
                    showUserDetails(userId, userType);
                });
            });
        }

        function handleUserAction(userId, action, userType) {
            const user = userType === 'chirurgien' 
                ? chirurgiens.find(u => u.id === userId)
                : etablissements.find(u => u.id === userId);
                
            if (!user) return;
            
            let message = '';
            let successMessage = '';
            let endpoint = '';
            
            switch(action) {
                case 'approve':
                    message = `Êtes-vous sûr de vouloir approuver ${user.nom} ?`;
                    successMessage = `${user.nom} a été approuvé avec succès.`;
                    endpoint = `/${userType}s/${userId}/approve`;
                    break;
                case 'reject':
                    message = `Êtes-vous sûr de vouloir rejeter ${user.nom} ?`;
                    successMessage = `${user.nom} a été rejeté.`;
                    endpoint = `/${userType}s/${userId}/reject`;
                    break;
                case 'delete':
                    message = `Êtes-vous sûr de vouloir supprimer ${user.nom} ? Cette action est irréversible.`;
                    successMessage = `${user.nom} a été supprimé.`;
                    endpoint = `/${userType}s/${userId}`;
                    break;
                case 'restore':
                    message = `Êtes-vous sûr de vouloir réactiver ${user.nom} ?`;
                    successMessage = `${user.nom} a été réactivé.`;
                    endpoint = `/${userType}s/${userId}/restore`;
                    break;
            }
            
            document.getElementById('confirmMessage').textContent = message;
            const confirmModal = document.getElementById('confirmModal');
            const confirmBtn = document.querySelector('.confirm-btn');
            
            confirmBtn.setAttribute('data-user-id', userId);
            confirmBtn.setAttribute('data-action', action);
            confirmBtn.setAttribute('data-type', userType);
            confirmBtn.setAttribute('data-endpoint', endpoint);
            
            confirmModal.style.display = 'flex';
        }

        function showUserDetails(userId, userType) {
            const user = userType === 'chirurgien' 
                ? chirurgiens.find(u => u.id === userId)
                : etablissements.find(u => u.id === userId);
                
            if (!user) return;
            
            const modal = document.getElementById('userModal');
            modal.querySelector('.user-avatar').src = user.photo || 'https://randomuser.me/api/portraits/men/32.jpg';
            modal.querySelector('.user-info h3').textContent = user.nom;
            modal.querySelector('.user-meta:nth-of-type(1) span:first-child').innerHTML = `<i class="fas fa-envelope"></i> ${user.email}`;
            modal.querySelector('.user-meta:nth-of-type(1) span:last-child').innerHTML = `<i class="fas fa-phone"></i> ${user.telephone || 'Non renseigné'}`;
            modal.querySelector('.user-meta:nth-of-type(2) span:first-child').innerHTML = `<i class="fas fa-map-marker-alt"></i> ${user.adresse || 'Non renseigné'}`;
            modal.querySelector('.user-meta:nth-of-type(2) span:last-child').innerHTML = `<i class="fas fa-user-tag"></i> ${userType === 'chirurgien' ? user.specialite : user.type}`;
            modal.querySelector('.user-meta:nth-of-type(3) span:first-child').innerHTML = `<i class="fas fa-calendar-alt"></i> Inscrit le ${user.created_at}`;
            
            const statusSpan = modal.querySelector('.user-meta:nth-of-type(3) span:last-child');
            statusSpan.className = 'user-status ' + getStatusClass(user.status);
            statusSpan.textContent = getStatusText(user.status);
            
            // Documents
            const documentsList = modal.querySelector('.documents-list');
            documentsList.innerHTML = '<h4>Documents vérifiables :</h4>';
            
            if (user.documents && user.documents.length > 0) {
                user.documents.forEach(doc => {
                    documentsList.innerHTML += `
                        <div class="document-item">
                            <i class="fas fa-file-pdf" style="color: var(--danger);"></i>
                            <a href="${doc.path}" target="_blank">${doc.nom}</a>
                        </div>
                    `;
                });
            } else {
                documentsList.innerHTML += '<p>Aucun document disponible</p>';
            }
            
            modal.style.display = 'flex';
        }

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            // Confirmation des actions
            document.querySelector('.confirm-btn').addEventListener('click', function() {
                const userId = parseInt(this.getAttribute('data-user-id'));
                const action = this.getAttribute('data-action');
                const userType = this.getAttribute('data-type');
                const endpoint = this.getAttribute('data-endpoint');
                
                // Faire la requête API
                fetch(endpoint, {
                    method: action === 'delete' ? 'DELETE' : 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Mettre à jour les données locales
                        if (action === 'delete') {
                            if (userType === 'chirurgien') {
                                chirurgiens = chirurgiens.filter(u => u.id !== userId);
                            } else {
                                etablissements = etablissements.filter(u => u.id !== userId);
                            }
                        } else {
                            const user = userType === 'chirurgien' 
                                ? chirurgiens.find(u => u.id === userId)
                                : etablissements.find(u => u.id === userId);
                                
                            if (user) {
                                switch(action) {
                                    case 'approve':
                                        user.status = 'approved';
                                        break;
                                    case 'reject':
                                        user.status = 'rejected';
                                        break;
                                    case 'restore':
                                        user.status = 'pending';
                                        break;
                                }
                            }
                        }
                        
                        // Fermer le modal et actualiser
                        document.getElementById('confirmModal').style.display = 'none';
                        renderUsers();
                        
                        // Afficher le message de succès
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de l\'opération.');
                });
            });
            
            // Initial render
            renderUsers();
        });
    </script>
</body>
</html>