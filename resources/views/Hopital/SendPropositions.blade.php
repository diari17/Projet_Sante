<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propositions Envoyées | XëtConnect</title>
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
            min-height: calc(100vh - 120px);
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
            background-color: #f5f7fa;
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
        
        .back-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .back-btn:hover {
            text-decoration: underline;
        }
        
        /* Filtres */
        .search-filters {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.9rem;
        }
        
        .form-control {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1px solid var(--light-gray);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(42, 91, 215, 0.1);
        }
        
        .search-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        /* Liste des propositions */
        .propositions-list {
            display: grid;
            gap: 1.5rem;
        }
        
        .proposition-card {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            display: grid;
            gap: 1rem;
        }
        
        .proposition-card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .proposition-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .proposition-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .proposition-status {
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 600;
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
        
        .proposition-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        
        .proposition-doctor {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .doctor-small-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary);
        }
        
        .doctor-small-info h4 {
            margin: 0;
            font-size: 1rem;
        }
        
        .doctor-small-info p {
            margin: 0.2rem 0 0;
            color: var(--gray);
            font-size: 0.8rem;
        }
        
        .proposition-meta {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .proposition-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark);
            font-size: 0.9rem;
        }
        
        .proposition-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.8rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--light-gray);
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
        
        /* Form */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1.5rem;
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
            
            .proposition-details {
                grid-template-columns: 1fr;
            }
            
            .proposition-actions {
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <a href="dashboard.html" class="logo">
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
                    
                    <a href="DashHospi" class="dropdown-item">
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
                    <a href="DashHospi">
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
                    <a href="SendPropositions" class="active">
                        <i class="fas fa-share-square"></i>
                        <span>Propositions envoyées</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-share-square"></i> Propositions envoyées</h1>
            </div>
            
            <!-- Filtres -->
            <div class="search-filters">
                <div class="filter-grid">
                    <div class="form-group">
                        <label for="status">Statut</label>
                        <select id="status" class="form-control">
                            <option value="">Tous les statuts</option>
                            <option value="pending">En attente</option>
                            <option value="accepted">Acceptées</option>
                            <option value="rejected">Refusées</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="specialty">Spécialité</label>
                        <select id="specialty" class="form-control">
                            <option value="">Toutes spécialités</option>
                            <option value="chirurgie_generale">Chirurgie générale</option>
                            <option value="orthopedie">Orthopédie</option>
                            <option value="cardiologie">Cardiologie</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="date">Date d'intervention</label>
                        <input type="date" id="date" class="form-control">
                    </div>
                </div>
                
                <div class="search-actions">
                    <button id="resetFilters" class="btn btn-outline">
                        <i class="fas fa-undo"></i> Réinitialiser
                    </button>
                    <button id="searchPropositions" class="btn btn-primary">
                        <i class="fas fa-search"></i> Rechercher
                    </button>
                </div>
            </div>
            
            <!-- Liste des propositions -->
            <div class="propositions-list" id="propositionsContainer">
                <!-- Les propositions seront chargées ici dynamiquement -->
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal Modification Proposition -->
    <div class="modal" id="editPropositionModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Modifier la proposition</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <form id="editPropositionForm">
                <div class="form-group">
                    <label for="editDate">Nouvelle date d'intervention</label>
                    <input type="date" id="editDate" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="editTime">Nouvel horaire</label>
                    <input type="time" id="editTime" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="editMessage">Message complémentaire</label>
                    <textarea id="editMessage" class="form-control" rows="3"></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-outline" id="cancelEditBtn">
                        <i class="fas fa-times"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Modal Confirmation Suppression -->
    <div class="modal" id="deleteConfirmationModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirmer la suppression</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <p>Êtes-vous sûr de vouloir supprimer cette proposition ? Cette action est irréversible.</p>
            
            <div class="form-actions">
                <button type="button" class="btn btn-outline" id="cancelDeleteBtn">
                    <i class="fas fa-times"></i> Annuler
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // Données simulées de propositions envoyées
        const propositions = [
            {
                id: 1,
                interventionId: 1,
                interventionType: "Prothèse de hanche droite",
                patientName: "M. Jean Dubois",
                date: "2023-08-15",
                time: "09:00",
                specialty: "orthopedie",
                duration: 2,
                urgency: "normal",
                doctor: {
                    id: 1,
                    firstName: "Jean",
                    lastName: "Dupont",
                    specialty: "Orthopédie",
                    avatar: "https://randomuser.me/api/portraits/men/32.jpg",
                    location: "Paris, Île-de-France",
                    experience: 12
                },
                status: "pending",
                sentDate: "2023-07-20",
                message: "Bonjour Dr. Dupont, nous souhaiterions vous proposer cette intervention pour le patient M. Dubois qui présente une coxarthrose évoluée."
            },
            {
                id: 2,
                interventionId: 3,
                interventionType: "Appendicectomie",
                patientName: "M. Pierre Petit",
                date: "2023-08-20",
                time: "09:00",
                specialty: "chirurgie_generale",
                duration: 1,
                urgency: "urgent",
                doctor: {
                    id: 2,
                    firstName: "Marie",
                    lastName: "Lambert",
                    specialty: "Chirurgie générale",
                    avatar: "https://randomuser.me/api/portraits/women/44.jpg",
                    location: "Lyon, Auvergne-Rhône-Alpes",
                    experience: 8
                },
                status: "accepted",
                sentDate: "2023-07-18",
                acceptedDate: "2023-07-19",
                message: "Urgence pour appendicite aiguë confirmée par scanner, patient sous antibiotiques en attendant."
            },
            {
                id: 3,
                interventionId: 2,
                interventionType: "Arthroscopie genou gauche",
                patientName: "Mme. Sophie Lambert",
                date: "2023-08-17",
                time: "14:00",
                specialty: "orthopedie",
                duration: 1.5,
                urgency: "normal",
                doctor: {
                    id: 1,
                    firstName: "Jean",
                    lastName: "Dupont",
                    specialty: "Orthopédie",
                    avatar: "https://randomuser.me/api/portraits/men/32.jpg",
                    location: "Paris, Île-de-France",
                    experience: 12
                },
                status: "rejected",
                sentDate: "2023-07-15",
                rejectedDate: "2023-07-16",
                rejectionReason: "Déjà engagé pour une autre intervention à cette date",
                message: "Mme Lambert présente une lésion méniscale nécessitant une arthroscopie."
            }
        ];

        // Éléments DOM
        const searchPropositionsBtn = document.getElementById('searchPropositions');
        const resetFiltersBtn = document.getElementById('resetFilters');
        const propositionsContainer = document.getElementById('propositionsContainer');
        const editPropositionModal = document.getElementById('editPropositionModal');
        const editPropositionForm = document.getElementById('editPropositionForm');
        const cancelEditBtn = document.getElementById('cancelEditBtn');
        const deleteConfirmationModal = document.getElementById('deleteConfirmationModal');
        const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        const modalCloseBtns = document.querySelectorAll('.modal-close');
        
        let currentEditingProposition = null;
        let currentDeletingPropositionId = null;

        // Afficher toutes les propositions au chargement
        document.addEventListener('DOMContentLoaded', () => {
            renderPropositions(propositions);
        });
        
        // Rechercher des propositions
        searchPropositionsBtn.addEventListener('click', () => {
            const status = document.getElementById('status').value;
            const specialty = document.getElementById('specialty').value;
            const date = document.getElementById('date').value;
            
            const filteredPropositions = propositions.filter(proposition => {
                if (status && proposition.status !== status) return false;
                if (specialty && proposition.specialty !== specialty) return false;
                if (date && proposition.date !== date) return false;
                return true;
            });
            
            renderPropositions(filteredPropositions);
        });
        
        // Réinitialiser les filtres
        resetFiltersBtn.addEventListener('click', () => {
            document.getElementById('status').value = '';
            document.getElementById('specialty').value = '';
            document.getElementById('date').value = '';
            renderPropositions(propositions);
        });
        
        // Rendre une proposition
        function renderProposition(proposition) {
            let statusClass = '';
            let statusText = '';
            
            switch(proposition.status) {
                case 'pending':
                    statusClass = 'status-pending';
                    statusText = 'En attente';
                    break;
                case 'accepted':
                    statusClass = 'status-accepted';
                    statusText = 'Acceptée';
                    break;
                case 'rejected':
                    statusClass = 'status-rejected';
                    statusText = 'Refusée';
                    break;
            }
            
            return `
                <div class="proposition-card" data-id="${proposition.id}">
                    <div class="proposition-header">
                        <h3 class="proposition-title">${proposition.interventionType} - ${proposition.patientName}</h3>
                        <span class="proposition-status ${statusClass}">${statusText}</span>
                    </div>
                    
                    <div class="proposition-details">
                        <div class="proposition-doctor">
                            <img src="${proposition.doctor.avatar}" alt="${proposition.doctor.firstName} ${proposition.doctor.lastName}" class="doctor-small-avatar">
                            <div class="doctor-small-info">
                                <h4>Dr. ${proposition.doctor.firstName} ${proposition.doctor.lastName}</h4>
                                <p>${proposition.doctor.specialty} - ${proposition.doctor.experience} ans d'expérience</p>
                            </div>
                        </div>
                        
                        <div class="proposition-meta">
                            <div class="proposition-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>${formatDate(proposition.date)} - ${proposition.time}</span>
                            </div>
                            <div class="proposition-meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Durée estimée: ${proposition.duration}h</span>
                            </div>
                            <div class="proposition-meta-item">
                                <i class="fas fa-paper-plane"></i>
                                <span>Envoyée le: ${formatDate(proposition.sentDate)}</span>
                            </div>
                        </div>
                    </div>
                    
                    ${proposition.status === 'rejected' ? `
                        <div class="proposition-meta-item">
                            <i class="fas fa-comment"></i>
                            <span><strong>Raison du refus:</strong> ${proposition.rejectionReason}</span>
                        </div>
                    ` : ''}
                    
                    <div class="proposition-actions">
                        ${proposition.status === 'pending' ? `
                            <button class="btn btn-outline edit-proposition-btn" data-id="${proposition.id}">
                                <i class="fas fa-edit"></i> Modifier
                            </button>
                            <button class="btn btn-danger delete-proposition-btn" data-id="${proposition.id}">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        ` : ''}
                        
                        <button class="btn btn-primary view-details-btn" data-id="${proposition.id}">
                            <i class="fas fa-eye"></i> Détails
                        </button>
                    </div>
                </div>
            `;
        }
        
        // Rendre toutes les propositions
        function renderPropositions(propositionsList) {
            propositionsContainer.innerHTML = '';
            
            if (propositionsList.length === 0) {
                propositionsContainer.innerHTML = `
                    <div class="proposition-card">
                        <p>Aucune proposition trouvée avec ces critères de recherche.</p>
                    </div>
                `;
                return;
            }
            
            propositionsList.forEach(proposition => {
                propositionsContainer.innerHTML += renderProposition(proposition);
            });
            
            // Ajouter les événements aux boutons
            document.querySelectorAll('.edit-proposition-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const id = parseInt(btn.getAttribute('data-id'));
                    editProposition(id);
                });
            });
            
            document.querySelectorAll('.delete-proposition-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const id = parseInt(btn.getAttribute('data-id'));
                    confirmDeleteProposition(id);
                });
            });
            
            document.querySelectorAll('.view-details-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const id = parseInt(btn.getAttribute('data-id'));
                    viewPropositionDetails(id);
                });
            });
        }
        
        // Modifier une proposition
        function editProposition(id) {
            const proposition = propositions.find(p => p.id === id);
            if (!proposition) return;
            
            currentEditingProposition = proposition;
            
            // Remplir le formulaire
            document.getElementById('editDate').value = proposition.date;
            document.getElementById('editTime').value = proposition.time;
            document.getElementById('editMessage').value = proposition.message;
            
            // Afficher le modal
            editPropositionModal.style.display = 'flex';
        }
        
        // Confirmer la suppression d'une proposition
        function confirmDeleteProposition(id) {
            currentDeletingPropositionId = id;
            deleteConfirmationModal.style.display = 'flex';
        }
        
        // Voir les détails d'une proposition
        function viewPropositionDetails(id) {
            const proposition = propositions.find(p => p.id === id);
            if (!proposition) return;
            
            let statusClass = '';
            let statusText = '';
            
            switch(proposition.status) {
                case 'pending':
                    statusClass = 'status-pending';
                    statusText = 'En attente';
                    break;
                case 'accepted':
                    statusClass = 'status-accepted';
                    statusText = 'Acceptée';
                    break;
                case 'rejected':
                    statusClass = 'status-rejected';
                    statusText = 'Refusée';
                    break;
            }
            
            alert(`
                Détails de la proposition:
                
                Intervention: ${proposition.interventionType}
                Patient: ${proposition.patientName}
                Médecin: Dr. ${proposition.doctor.firstName} ${proposition.doctor.lastName}
                Spécialité: ${proposition.doctor.specialty}
                Date: ${formatDate(proposition.date)} à ${proposition.time}
                Durée: ${proposition.duration}h
                Urgence: ${proposition.urgency === 'urgent' ? 'Urgente' : 'Normale'}
                Statut: ${statusText}
                ${proposition.status === 'rejected' ? `Raison du refus: ${proposition.rejectionReason}` : ''}
                
                Message envoyé:
                ${proposition.message}
            `);
        }
        
        // Soumettre le formulaire de modification
        editPropositionForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            if (currentEditingProposition) {
                // Mettre à jour la proposition (simulé)
                currentEditingProposition.date = document.getElementById('editDate').value;
                currentEditingProposition.time = document.getElementById('editTime').value;
                currentEditingProposition.message = document.getElementById('editMessage').value;
                
                alert('Proposition modifiée avec succès !');
                editPropositionModal.style.display = 'none';
                renderPropositions(propositions);
            }
        });
        
        // Confirmer la suppression
        confirmDeleteBtn.addEventListener('click', () => {
            if (currentDeletingPropositionId) {
                // Supprimer la proposition (simulé)
                const index = propositions.findIndex(p => p.id === currentDeletingPropositionId);
                if (index !== -1) {
                    propositions.splice(index, 1);
                }
                
                alert('Proposition supprimée avec succès !');
                deleteConfirmationModal.style.display = 'none';
                renderPropositions(propositions);
            }
        });
        
        // Annuler la modification
        cancelEditBtn.addEventListener('click', () => {
            editPropositionModal.style.display = 'none';
        });
        
        // Annuler la suppression
        cancelDeleteBtn.addEventListener('click', () => {
            deleteConfirmationModal.style.display = 'none';
        });
        
        // Fermer les modals
        modalCloseBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.modal').forEach(modal => {
                    modal.style.display = 'none';
                });
            });
        });
        
        window.addEventListener('click', (e) => {
            if (e.target === editPropositionModal || e.target === deleteConfirmationModal) {
                e.target.style.display = 'none';
            }
        });
        
        // Fonction utilitaire pour formater la date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }
    </script>
</body>
</html>