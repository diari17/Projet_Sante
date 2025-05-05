<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidatures Reçues | XëtConnect</title>
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
        
        /* Liste des candidatures */
        .candidatures-list {
            margin-top: 1rem;
        }
        
        .candidatures-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .candidature-item {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .candidature-item:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .candidature-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .candidature-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
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
        
        .candidature-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        
        .candidature-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .candidature-actions {
            display: flex;
            gap: 0.8rem;
            justify-content: flex-end;
        }
        
        .candidature-details {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--light-gray);
        }
        
        /* Boutons */
        .btn {
            padding: 0.8rem 1.5rem;
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
        
        /* Modal Candidature */
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
            max-width: 800px;
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
        
        /* Formulaire */
        .form-section {
            margin-bottom: 2rem;
        }
        
        .form-section-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
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
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(42, 91, 215, 0.1);
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
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
            
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Filtres */
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
            color: var(--dark);
        }
        
        .filter-group select {
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid var(--light-gray);
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

                    <a href="DashHospi" class="dropdown-item" id="updateProfileBtn">
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
                    <a href="candidatures.html" class="active">
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
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-envelope"></i> Candidatures reçues</h1>
            </div>
            
            <!-- Filtres -->
            <div class="filters">
                <div class="filter-group">
                    <label for="filterStatus">Statut :</label>
                    <select id="filterStatus" class="form-control" style="width: 150px;">
                        <option value="all">Tous</option>
                        <option value="en-attente">En attente</option>
                        <option value="acceptee">Acceptée</option>
                        <option value="refusee">Refusée</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="filterSpecialty">Spécialité :</label>
                    <select id="filterSpecialty" class="form-control" style="width: 200px;">
                        <option value="all">Toutes</option>
                        <option value="chirurgie_generale">Chirurgie générale</option>
                        <option value="chirurgie_digestive">Chirurgie digestive</option>
                        <option value="chirurgie_orthopedique">Chirurgie orthopédique</option>
                        <option value="chirurgie_cardiovasculaire">Chirurgie cardiovasculaire</option>
                        <option value="chirurgie_thoracique">Chirurgie thoracique</option>
                        <option value="neurochirurgie">Neurochirurgie</option>
                        <option value="chirurgie_pediatrique">Chirurgie pédiatrique</option>
                        <option value="chirurgie_plastique">Chirurgie plastique</option>
                        <option value="chirurgie_urologique">Chirurgie urologique</option>
                        <option value="chirurgie_orl">Chirurgie ORL</option>
                        <option value="chirurgie_maxillo_faciale">Chirurgie maxillo-faciale</option>
                        <option value="chirurgie_gynecologique">Chirurgie gynécologique / obstétrique</option>
                        <option value="ophtalmologie_chirurgicale">Ophtalmologie (chirurgicale)</option>
                        <option value="cardiologie">Cardiologie</option>
                        <option value="pneumologie">Pneumologie</option>
                        <option value="neurologie">Neurologie</option>
                        <option value="nephrologie">Néphrologie</option>
                        <option value="hematologie">Hématologie</option>
                        <option value="endocrinologie">Endocrinologie</option>
                        <option value="gastro_enterologie">Gastro-entérologie</option>
                        <option value="rhumatologie">Rhumatologie</option>
                        <option value="dermatologie">Dermatologie</option>
                        <option value="pediatrie">Pédiatrie</option>
                        <option value="geriatrie">Gériatrie</option>
                        <option value="medecine_generale">Médecine générale</option>
                        <option value="infectiologie">Infectiologie</option>
                        <option value="medecine_interne">Médecine interne</option>
                        <option value="psychiatrie">Psychiatrie</option>
                        <option value="medecine_du_travail">Médecine du travail</option>
                        <option value="anesthesie_reanimation">Anesthésie-réanimation</option>
                        <option value="radiologie">Radiologie</option>
                        <option value="medecine_legale">Médecine légale</option>
                        <option value="medecine_urgence">Médecine d’urgence</option>
                        <option value="autre">Autre spécialité</option>    
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="filterDate">Date :</label>
                    <select id="filterDate" class="form-control" style="width: 150px;">
                        <option value="all">Toutes</option>
                        <option value="today">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                    </select>
                </div>
                
                <button id="applyFiltersBtn" class="btn btn-primary">
                    <i class="fas fa-filter"></i> Appliquer
                </button>
            </div>
            
            <!-- Liste des candidatures -->
            <div class="candidatures-list">
                <div class="candidatures-list-header">
                    <h2><i class="fas fa-list"></i> Liste des candidatures</h2>
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher..." class="form-control" style="width: 200px;">
                    </div>
                </div>
                
                <div id="candidaturesContainer">
                    <!-- Les candidatures seront ajoutées ici dynamiquement -->
                </div>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal pour voir les détails d'une candidature -->
    <div class="modal" id="candidatureModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-file-alt"></i> Détails de la candidature</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div id="candidatureDetails">
                <!-- Les détails seront ajoutés ici dynamiquement -->
            </div>
            
            <div class="form-actions" id="candidatureActions">
                <!-- Les boutons d'action seront ajoutés ici dynamiquement -->
            </div>
        </div>
    </div>
    
    <script>
        // Données simulées des candidatures
        let candidatures = [
            {
                id: 1,
                interventionId: 2,
                interventionType: "Arthroscopie genou gauche",
                medecinId: 101,
                medecinNom: "Dr. Sophie Martin",
                medecinSpecialite: "Orthopédie",
                medecinExperience: "12 ans",
                medecinNote: 4.8,
                medecinPhoto: "https://randomuser.me/api/portraits/women/65.jpg",
                dateCandidature: "2023-07-10",
                status: "en-attente",
                message: "Je suis spécialisée en chirurgie orthopédique avec une expérience particulière dans les arthroscopies du genou. Je serais ravie de pouvoir vous aider pour cette intervention.",
                disponibilites: ["2023-07-17 matin", "2023-07-18 après-midi"],
                tarifPropose: 1200
            },
            {
                id: 2,
                interventionId: 2,
                interventionType: "Arthroscopie genou gauche",
                medecinId: 102,
                medecinNom: "Dr. Jean Dupont",
                medecinSpecialite: "Orthopédie",
                medecinExperience: "8 ans",
                medecinNote: 4.5,
                medecinPhoto: "https://randomuser.me/api/portraits/men/32.jpg",
                dateCandidature: "2023-07-11",
                status: "en-attente",
                message: "J'ai réalisé plus de 150 arthroscopies du genou au cours des 5 dernières années. Je propose une approche mini-invasive pour une récupération plus rapide.",
                disponibilites: ["2023-07-17 après-midi", "2023-07-19 matin"],
                tarifPropose: 1100
            },
            {
                id: 3,
                interventionId: 3,
                interventionType: "Appendicectomie",
                medecinId: 103,
                medecinNom: "Dr. Marie Leroy",
                medecinSpecialite: "Chirurgie générale",
                medecinExperience: "15 ans",
                medecinNote: 4.9,
                medecinPhoto: "https://randomuser.me/api/portraits/women/43.jpg",
                dateCandidature: "2023-07-15",
                status: "acceptee",
                message: "Urgences digestives sont ma spécialité. Je peux intervenir rapidement pour cette appendicectomie.",
                disponibilites: ["2023-07-20 matin", "2023-07-20 après-midi"],
                tarifPropose: 950
            },
            {
                id: 4,
                interventionId: 1,
                interventionType: "Prothèse de hanche droite",
                medecinId: 104,
                medecinNom: "Dr. Alain Bernard",
                medecinSpecialite: "Orthopédie",
                medecinExperience: "20 ans",
                medecinNote: 4.7,
                medecinPhoto: "https://randomuser.me/api/portraits/men/75.jpg",
                dateCandidature: "2023-07-05",
                status: "refusee",
                message: "Expert en prothèses de hanche avec un taux de réussite de 98%. Je propose une technique innovante pour une meilleure récupération.",
                disponibilites: ["2023-07-15 matin", "2023-07-16 après-midi"],
                tarifPropose: 2500
            }
        ];
        
        // Données des interventions (pour référence)
        let interventions = [
            {
                id: 1,
                patientName: "M. Jean Dubois",
                interventionType: "Prothèse de hanche droite",
                specialty: "orthopedie",
                date: "2023-07-15"
            },
            {
                id: 2,
                patientName: "Mme. Sophie Lambert",
                interventionType: "Arthroscopie genou gauche",
                specialty: "orthopedie",
                date: "2023-07-17"
            },
            {
                id: 3,
                patientName: "M. Pierre Petit",
                interventionType: "Appendicectomie",
                specialty: "chirurgie-generale",
                date: "2023-07-20"
            }
        ];
        
        // Éléments DOM
        const candidaturesContainer = document.getElementById('candidaturesContainer');
        const candidatureModal = document.getElementById('candidatureModal');
        const candidatureDetails = document.getElementById('candidatureDetails');
        const candidatureActions = document.getElementById('candidatureActions');
        const modalCloseBtn = document.querySelector('.modal-close');
        const applyFiltersBtn = document.getElementById('applyFiltersBtn');
        const filterStatus = document.getElementById('filterStatus');
        const filterSpecialty = document.getElementById('filterSpecialty');
        const filterDate = document.getElementById('filterDate');
        
        // Afficher le modal avec les détails d'une candidature
        function showCandidatureDetails(id) {
            const candidature = candidatures.find(c => c.id === id);
            if (!candidature) return;
            
            const intervention = interventions.find(i => i.id === candidature.interventionId);
            
            // Afficher les détails
            candidatureDetails.innerHTML = `
                <div class="form-section">
                    <h3 class="form-section-title"><i class="fas fa-user-md"></i> Informations médecin</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <img src="${candidature.medecinPhoto}" alt="${candidature.medecinNom}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                                <div>
                                    <h3>${candidature.medecinNom}</h3>
                                    <p>${candidature.medecinSpecialite} • ${candidature.medecinExperience} d'expérience</p>
                                    <div style="display: flex; align-items: center; gap: 0.3rem;">
                                        ${renderStars(candidature.medecinNote)}
                                        <span>${candidature.medecinNote}/5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3 class="form-section-title"><i class="fas fa-procedures"></i> Intervention concernée</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Type d'intervention</label>
                            <p>${candidature.interventionType}</p>
                        </div>
                        ${intervention ? `
                        <div class="form-group">
                            <label>Patient</label>
                            <p>${intervention.patientName}</p>
                        </div>
                        ` : ''}
                    </div>
                </div>
                
                <div class="form-section">
                    <h3 class="form-section-title"><i class="fas fa-comment-alt"></i> Message du médecin</h3>
                    <div class="form-group">
                        <p style="white-space: pre-line;">${candidature.message}</p>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3 class="form-section-title"><i class="fas fa-calendar-check"></i> Disponibilités proposées</h3>
                    <div class="form-group">
                        <ul>
                            ${candidature.disponibilites.map(d => `<li>${d}</li>`).join('')}
                        </ul>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3 class="form-section-title"><i class="fas fa-euro-sign"></i> Tarif proposé</h3>
                    <div class="form-group">
                        <p>${candidature.tarifPropose} €</p>
                    </div>
                </div>
            `;
            
            // Afficher les actions possibles selon le statut
            candidatureActions.innerHTML = '';
            if (candidature.status === 'en-attente') {
                candidatureActions.innerHTML = `
                    <button class="btn btn-success accept-btn" data-id="${candidature.id}">
                        <i class="fas fa-check"></i> Accepter
                    </button>
                    <button class="btn btn-danger reject-btn" data-id="${candidature.id}">
                        <i class="fas fa-times"></i> Refuser
                    </button>
                    <button class="btn btn-outline close-btn">
                        <i class="fas fa-times"></i> Fermer
                    </button>
                `;
                
                document.querySelector('.accept-btn').addEventListener('click', () => {
                    acceptCandidature(candidature.id);
                });
                
                document.querySelector('.reject-btn').addEventListener('click', () => {
                    rejectCandidature(candidature.id);
                });
            } else {
                candidatureActions.innerHTML = `
                    <button class="btn btn-outline close-btn">
                        <i class="fas fa-times"></i> Fermer
                    </button>
                `;
            }
            
            document.querySelector('.close-btn').addEventListener('click', () => {
                candidatureModal.style.display = 'none';
            });
            
            candidatureModal.style.display = 'flex';
        }
        
        // Rendre les étoiles pour la notation
        function renderStars(rating) {
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 >= 0.5;
            
            for (let i = 0; i < fullStars; i++) {
                stars += '<i class="fas fa-star" style="color: #f59e0b;"></i>';
            }
            
            if (hasHalfStar) {
                stars += '<i class="fas fa-star-half-alt" style="color: #f59e0b;"></i>';
            }
            
            const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
            for (let i = 0; i < emptyStars; i++) {
                stars += '<i class="far fa-star" style="color: #f59e0b;"></i>';
            }
            
            return stars;
        }
        
        // Accepter une candidature
        function acceptCandidature(id) {
            if (confirm('Êtes-vous sûr de vouloir accepter cette candidature?')) {
                const index = candidatures.findIndex(c => c.id === id);
                if (index !== -1) {
                    candidatures[index].status = 'acceptee';
                    renderCandidatures();
                    candidatureModal.style.display = 'none';
                    alert('Candidature acceptée avec succès!');
                }
            }
        }
        
        // Refuser une candidature
        function rejectCandidature(id) {
            if (confirm('Êtes-vous sûr de vouloir refuser cette candidature?')) {
                const index = candidatures.findIndex(c => c.id === id);
                if (index !== -1) {
                    candidatures[index].status = 'refusee';
                    renderCandidatures();
                    candidatureModal.style.display = 'none';
                    alert('Candidature refusée.');
                }
            }
        }
        
        // Rendre une candidature
        function renderCandidature(candidature) {
            const intervention = interventions.find(i => i.id === candidature.interventionId);
            const statusClass = `status-${candidature.status}`;
            const statusText = getStatusText(candidature.status);
            
            return `
                <div class="candidature-item" data-id="${candidature.id}">
                    <div class="candidature-header">
                        <h3 class="candidature-title">${intervention ? intervention.patientName : 'Patient inconnu'} - ${candidature.interventionType}</h3>
                        <span class="candidature-status ${statusClass}">${statusText}</span>
                    </div>
                    
                    <div class="candidature-meta">
                        <span><i class="fas fa-user-md"></i> ${candidature.medecinNom} (${candidature.medecinSpecialite})</span>
                        <span><i class="fas fa-calendar-alt"></i> ${formatDate(candidature.dateCandidature)}</span>
                        <span><i class="fas fa-euro-sign"></i> ${candidature.tarifPropose} €</span>
                        <span><i class="fas fa-star"></i> ${candidature.medecinNote}/5</span>
                    </div>
                    
                    <div class="candidature-details">
                        <p><strong>Message :</strong> ${truncateText(candidature.message, 100)}</p>
                    </div>
                    
                    <div class="candidature-actions">
                        <button class="btn btn-primary details-btn" data-id="${candidature.id}">
                            <i class="fas fa-eye"></i> Voir détails
                        </button>
                        ${candidature.status === 'acceptee' ? 
                          `<button class="btn btn-success" disabled>
                              <i class="fas fa-check"></i> Acceptée
                          </button>` : ''}
                        ${candidature.status === 'refusee' ? 
                          `<button class="btn btn-danger" disabled>
                              <i class="fas fa-times"></i> Refusée
                          </button>` : ''}
                    </div>
                </div>
            `;
        }
        
        // Rendre toutes les candidatures
        function renderCandidatures(filteredCandidatures = null) {
            const candsToRender = filteredCandidatures || candidatures;
            candidaturesContainer.innerHTML = '';
            
            if (candsToRender.length === 0) {
                candidaturesContainer.innerHTML = `
                    <div class="candidature-item">
                        <p>Aucune candidature trouvée.</p>
                    </div>
                `;
                return;
            }
            
            candsToRender.forEach(candidature => {
                candidaturesContainer.innerHTML += renderCandidature(candidature);
            });
            
            // Ajouter les événements
            document.querySelectorAll('.details-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.currentTarget.getAttribute('data-id'));
                    showCandidatureDetails(id);
                });
            });
        }
        
        // Appliquer les filtres
        function applyFilters() {
            const statusFilter = filterStatus.value;
            const specialtyFilter = filterSpecialty.value;
            const dateFilter = filterDate.value;
            
            let filtered = [...candidatures];
            
            // Filtre par statut
            if (statusFilter !== 'all') {
                filtered = filtered.filter(c => c.status === statusFilter);
            }
            
            // Filtre par spécialité
            if (specialtyFilter !== 'all') {
                filtered = filtered.filter(c => {
                    const intervention = interventions.find(i => i.id === c.interventionId);
                    return intervention && intervention.specialty === specialtyFilter;
                });
            }
            
            // Filtre par date
            if (dateFilter !== 'all') {
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                filtered = filtered.filter(c => {
                    const candDate = new Date(c.dateCandidature);
                    
                    if (dateFilter === 'today') {
                        return candDate.toDateString() === today.toDateString();
                    } else if (dateFilter === 'week') {
                        const weekStart = new Date(today);
                        weekStart.setDate(today.getDate() - today.getDay());
                        
                        const weekEnd = new Date(weekStart);
                        weekEnd.setDate(weekStart.getDate() + 6);
                        
                        return candDate >= weekStart && candDate <= weekEnd;
                    } else if (dateFilter === 'month') {
                        return candDate.getMonth() === today.getMonth() && candDate.getFullYear() === today.getFullYear();
                    }
                    
                    return true;
                });
            }
            
            renderCandidatures(filtered);
        }
        
        // Fonctions utilitaires
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }
        
        function getStatusText(status) {
            const statuses = {
                'en-attente': 'En attente',
                'acceptee': 'Acceptée',
                'refusee': 'Refusée'
            };
            return statuses[status] || status;
        }
        
        function truncateText(text, maxLength) {
            if (text.length <= maxLength) return text;
            return text.substring(0, maxLength) + '...';
        }
        
        // Fermer le modal
        modalCloseBtn.addEventListener('click', () => {
            candidatureModal.style.display = 'none';
        });
        
        window.addEventListener('click', (e) => {
            if (e.target === candidatureModal) {
                candidatureModal.style.display = 'none';
            }
        });
        
        // Appliquer les filtres
        applyFiltersBtn.addEventListener('click', applyFilters);
        
        // Initialiser
        document.addEventListener('DOMContentLoaded', () => {
            renderCandidatures();
        });
    </script>
</body>
</html>