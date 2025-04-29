<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher Médecins | XëtConnect</title>
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
        
        /* Formulaire de recherche */
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
        
        /* Liste des médecins */
        .doctors-list {
            display: grid;
            gap: 1.5rem;
        }
        
        .doctor-card {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 1.5rem;
            align-items: center;
            cursor: pointer;
        }
        
        .doctor-card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        
        .doctor-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary);
        }
        
        .doctor-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .doctor-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }
        
        .doctor-specialty {
            color: var(--primary);
            font-weight: 500;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }
        
        .doctor-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--dark);
            font-size: 0.9rem;
            flex-wrap: wrap;
        }
        
        .doctor-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        /* Modal Profil Médecin */
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
        
        .profile-header {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary);
        }
        
        .profile-info {
            flex: 1;
        }
        
        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin: 0 0 0.5rem;
        }
        
        .profile-specialty {
            font-size: 1.1rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        .profile-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .profile-section {
            margin-bottom: 2rem;
        }
        
        .profile-section-title {
            font-size: 1.2rem;
            color: var(--primary);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .profile-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        
        .detail-item {
            margin-bottom: 1rem;
        }
        
        .detail-label {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 0.3rem;
        }
        
        .detail-value {
            color: var(--gray);
        }
        
        .documents-list {
            display: grid;
            gap: 1rem;
        }
        
        .document-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem;
            border: 1px solid var(--light-gray);
            border-radius: 0.5rem;
        }
        
        .document-icon {
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        /* Modal Invitation */
        .intervention-select-modal {
            max-height: 60vh;
            overflow-y: auto;
        }
        
        .intervention-select-list {
            display: grid;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .intervention-select-item {
            padding: 1rem;
            border: 1px solid var(--light-gray);
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .intervention-select-item:hover {
            background-color: rgba(42, 91, 215, 0.05);
            border-color: var(--primary);
        }
        
        .intervention-select-item.selected {
            background-color: rgba(42, 91, 215, 0.1);
            border-color: var(--primary);
        }
        
        .intervention-select-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .intervention-select-meta {
            display: flex;
            gap: 1rem;
            color: var(--gray);
            font-size: 0.9rem;
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
            
            .doctor-card {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .profile-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            
            .profile-meta {
                justify-content: center;
            }
            
            .profile-details {
                grid-template-columns: 1fr;
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
                    <a href="ListMed" class="active">
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
        
        <!-- Main Content -->
        <main class="main-content">
            
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-search"></i> Rechercher un médecin/chirurgien</h1>
            </div>
            
            <!-- Filtres de recherche -->
            <div class="search-filters">
                <div class="filter-grid">
                    <div class="form-group">
                        <label for="specialty">Spécialité</label>
                        <select id="specialty" class="form-control">
                            <option value="">Toutes spécialités</option>
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
                    
                    <div class="form-group">
                        <label for="location">Localisation</label>
                        <input type="text" id="location" class="form-control" placeholder="Ville, département ou région">
                    </div>
                    
                    <div class="form-group">
                        <label for="experience">Expérience minimale</label>
                        <select id="experience" class="form-control">
                            <option value="">Tous niveaux</option>
                            <option value="5">5+ années</option>
                            <option value="10">10+ années</option>
                            <option value="15">15+ années</option>
                        </select>
                    </div>
                </div>
                
                <div class="search-actions">
                    <button id="resetFilters" class="btn btn-outline">
                        <i class="fas fa-undo"></i> Réinitialiser
                    </button>
                    <button id="searchDoctors" class="btn btn-primary">
                        <i class="fas fa-search"></i> Rechercher
                    </button>
                </div>
            </div>
            
            <!-- Liste des médecins -->
            <div class="doctors-list" id="doctorsContainer">
@foreach ($chirurgien as $chirurgien)
<div class="profile-header">
    <img src="" class="profile-avatar">
    
    <div class="profile-info">
        <h2 class="profile-name">Dr. {{ $chirurgien->nom }} {{ $chirurgien->prenom }}</h2>
        <p class="profile-specialty">{{ $chirurgien->specialite }}</p>
        
        <div class="profile-meta">
            <span><i class="fas fa-map-marker-alt"></i> {{ $chirurgien->region }}</span>
            <span><i class="fas fa-briefcase"></i> {{ $chirurgien->exp }} ans d'expérience</span>
        </div>
        
        <div class="profile-meta">
            <span><i class="fas fa-envelope"></i> {{ $chirurgien->email }}</span>
            <span><i class="fas fa-phone"></i> {{ $chirurgien->telephone }}</span>
        </div>
    </div>
</div> 
{{-- <div class="profile-section">
    <h3 class="profile-section-title"><i class="fas fa-info-circle"></i> Informations générales</h3>
    
    <div class="profile-details">
        <div class="detail-item">
            <div class="detail-label">Adresse professionnelle</div>
            <div class="detail-value">{{ $chirurgien->addresse }}</div>
        </div>
        
        <div class="detail-item">
            <div class="detail-label">Disponibilités</div>
            <div class="detail-value">
                <ul style="margin: 0; padding-left: 1.2rem;">
                    ${doctor.disponibilites.map(d => `<li>${d}</li>`).join('')}
                </ul>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="profile-section">
    <h3 class="profile-section-title"><i class="fas fa-graduation-cap"></i> Parcours professionnel</h3>
    <div class="detail-value">${doctor.cv}</div>
</div>

<div class="profile-section">
    <h3 class="profile-section-title"><i class="fas fa-certificate"></i> Diplômes</h3>
    
    <div class="documents-list">
        ${doctor.diplomes.map(diplome => `
            <div class="document-item">
                <i class="fas fa-file-alt document-icon"></i>
                <div>${diplome}</div>
            </div>
        `).join('')}
    </div>
</div>

<div class="profile-section">
    <h3 class="profile-section-title"><i class="fas fa-award"></i> Formations complémentaires</h3>
    
    <div class="documents-list">
        ${doctor.formations.map(formation => `
            <div class="document-item">
                <i class="fas fa-certificate document-icon"></i>
                <div>${formation}</div>
            </div>
        `).join('')}
    </div>
</div> --}}

<div class="profile-actions" style="margin-top: 2rem; display: flex; justify-content: flex-end;">
    <button class="btn btn-primary" id="inviteDoctorBtn" data-id="${doctor.id}">
        <i class="fas fa-calendar-plus"></i> Inviter pour une intervention
    </button>
    <button class="btn btn-outline" id="backToListBtn" style="margin-right: 1rem;">
        <i class="fas fa-arrow-left"></i> Retour à la liste
    </button>
</div>
<br>
@endforeach
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal Profil Médecin -->
    <div class="modal" id="doctorModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Profil Médecin</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div id="doctorProfileContent">
                <!-- Le contenu du profil sera chargé ici dynamiquement -->
            </div>
        </div>
    </div>
    
    <!-- Modal pour sélectionner une intervention -->
    <div class="modal" id="selectInterventionModal">
        <div class="modal-content intervention-select-modal">
            <div class="modal-header">
                <h3>Inviter le médecin à une intervention</h3>
                <button class="modal-close" id="closeInterventionModal">&times;</button>
            </div>
            
            <p>Sélectionnez l'intervention à laquelle vous souhaitez inviter <strong id="doctorInviteName"></strong> :</p>
            
            <div class="intervention-select-list" id="interventionsToAssign">
                <!-- Les interventions non attribuées seront chargées ici -->
            </div>
            
            <div class="form-actions" style="margin-top: 1.5rem;">
                <button class="btn btn-outline" id="cancelInvitationBtn">
                    <i class="fas fa-times"></i> Annuler
                </button>
                <button class="btn btn-primary" id="confirmInvitationBtn">
                    <i class="fas fa-paper-plane"></i> Envoyer l'invitation
                </button>
            </div>
        </div>
    </div>
    
    {{-- <script>
        // Données simulées de médecins
        const doctors = [
            {
                id: 1,
                firstName: "Jean",
                lastName: "Dupont",
                specialty: "Orthopédie",
                specialtyDetails: "Chirurgien orthopédiste spécialisé dans les prothèses de hanche et genou",
                avatar: "https://randomuser.me/api/portraits/men/32.jpg",
                location: "Paris, Île-de-France",
                address: "15 Rue de la Paix, 75002 Paris",
                experience: 12,
                email: "j.dupont@example.com",
                phone: "+33 6 12 34 56 78",
                disponibilites: ["Lundi: 9h-12h", "Mercredi: 14h-18h", "Vendredi: 10h-16h"],
                cv: "Diplômé de la Faculté de Médecine de Paris, spécialisation en orthopédie en 2010...",
                diplomes: [
                    "Doctorat en Médecine - Université Paris Descartes (2008)",
                    "DESC Orthopédie-Traumatologie (2012)",
                    "DIU Chirurgie Prothétique de Hanche (2014)"
                ],
                formations: [
                    "Formation avancée en chirurgie robotique - New York (2016)",
                    "Certification en arthroscopie - Lyon (2018)"
                ]
            },
            {
                id: 2,
                firstName: "Marie",
                lastName: "Lambert",
                specialty: "Chirurgie générale",
                specialtyDetails: "Chirurgienne générale avec expérience en chirurgie laparoscopique et digestive",
                avatar: "https://randomuser.me/api/portraits/women/44.jpg",
                location: "Lyon, Auvergne-Rhône-Alpes",
                address: "22 Avenue des Ternes, 69006 Lyon",
                experience: 8,
                email: "m.lambert@example.com",
                phone: "+33 6 23 45 67 89",
                disponibilites: ["Mardi: 8h-12h", "Jeudi: 13h-17h", "Samedi: 9h-12h"],
                cv: "Formation complète en chirurgie générale avec spécialisation en techniques mini-invasives...",
                diplomes: [
                    "Doctorat en Médecine - Université Lyon 1 (2013)",
                    "DESC Chirurgie Générale (2017)"
                ],
                formations: [
                    "Masterclass en chirurgie laparoscopique - Strasbourg (2019)",
                    "Certification en chirurgie bariatrique (2020)"
                ]
            },
            {
                id: 3,
                firstName: "Pierre",
                lastName: "Martin",
                specialty: "Cardiologie",
                specialtyDetails: "Cardiologue interventionnel expérimenté dans les angioplasties et pose de stents",
                avatar: "https://randomuser.me/api/portraits/men/75.jpg",
                location: "Marseille, Provence-Alpes-Côte d'Azur",
                address: "45 Rue Saint-Ferréol, 13001 Marseille",
                experience: 15,
                email: "p.martin@example.com",
                phone: "+33 6 34 56 78 90",
                disponibilites: ["Lundi-Vendredi: 8h30-17h"],
                cv: "Carrière dédiée à la cardiologie interventionnelle avec plus de 2000 procédures réalisées...",
                diplomes: [
                    "Doctorat en Médecine - Aix-Marseille Université (2006)",
                    "DES Cardiologie (2010)",
                    "DIU Cardiologie Interventionnelle (2012)"
                ],
                formations: [
                    "Fellowship en cardiologie interventionnelle - Cleveland Clinic (2014)",
                    "Certification en échocardiographie transœsophagienne (2016)"
                ]
            }
        ];

        // Données d'interventions non attribuées
        const interventionsNonAttribuees = [
            {
                id: 1,
                patientName: "M. Jean Dubois",
                interventionType: "Prothèse de hanche droite",
                date: "2023-08-15",
                time: "09:00",
                specialty: "orthopedie",
                duration: 2,
                urgency: "normal"
            },
            {
                id: 2,
                patientName: "Mme. Sophie Lambert",
                interventionType: "Arthroscopie genou gauche",
                date: "2023-08-17",
                time: "14:00",
                specialty: "orthopedie",
                duration: 1.5,
                urgency: "normal"
            },
            {
                id: 3,
                patientName: "M. Pierre Petit",
                interventionType: "Appendicectomie",
                date: "2023-08-20",
                time: "09:00",
                specialty: "chirurgie-generale",
                duration: 1,
                urgency: "urgent"
            }
        ];

        // Éléments DOM
        const searchDoctorsBtn = document.getElementById('searchDoctors');
        const resetFiltersBtn = document.getElementById('resetFilters');
        const doctorsContainer = document.getElementById('doctorsContainer');
        const doctorModal = document.getElementById('doctorModal');
        const modalCloseBtn = document.querySelector('.modal-close');
        const doctorProfileContent = document.getElementById('doctorProfileContent');
        const selectInterventionModal = document.getElementById('selectInterventionModal');
        const closeInterventionModal = document.getElementById('closeInterventionModal');
        const doctorInviteName = document.getElementById('doctorInviteName');
        const interventionsToAssign = document.getElementById('interventionsToAssign');
        const cancelInvitationBtn = document.getElementById('cancelInvitationBtn');
        const confirmInvitationBtn = document.getElementById('confirmInvitationBtn');
        
        let currentSelectedDoctor = null;
        let currentSelectedIntervention = null;

        // Afficher tous les médecins au chargement
        document.addEventListener('DOMContentLoaded', () => {
            renderDoctors(doctors);
        });
        
        // Rechercher des médecins
        searchDoctorsBtn.addEventListener('click', () => {
            const specialty = document.getElementById('specialty').value;
            const location = document.getElementById('location').value.toLowerCase();
            const experience = document.getElementById('experience').value;
            
            const filteredDoctors = doctors.filter(doctor => {
                if (specialty && doctor.specialty.toLowerCase() !== specialty) return false;
                if (location && !doctor.location.toLowerCase().includes(location)) return false;
                if (experience && doctor.experience < parseInt(experience)) return false;
                return true;
            });
            
            renderDoctors(filteredDoctors);
        });
        
        // Réinitialiser les filtres
        resetFiltersBtn.addEventListener('click', () => {
            document.getElementById('specialty').value = '';
            document.getElementById('location').value = '';
            document.getElementById('experience').value = '';
            renderDoctors(doctors);
        });
        
        // Rendre un médecin
        function renderDoctor(doctor) {
            return `
                <div class="doctor-card" data-id="${doctor.id}">
                    <img src="${doctor.avatar}" alt="${doctor.firstName} ${doctor.lastName}" class="doctor-avatar">
                    
                    <div class="doctor-info">
                        <h3 class="doctor-name">Dr. ${doctor.firstName} ${doctor.lastName}</h3>
                        <p class="doctor-specialty">${doctor.specialty}</p>
                        
                        <div class="doctor-meta">
                            <span><i class="fas fa-map-marker-alt"></i> ${doctor.location}</span>
                            <span><i class="fas fa-briefcase"></i> ${doctor.experience} ans d'expérience</span>
                        </div>
                        
                        <p>${doctor.specialtyDetails}</p>
                    </div>
                </div>
            `;
        }
        
        // Rendre tous les médecins
        function renderDoctors(doctorsList) {
            doctorsContainer.innerHTML = '';
            
            if (doctorsList.length === 0) {
                doctorsContainer.innerHTML = `
                    <div class="doctor-card">
                        <p>Aucun médecin trouvé avec ces critères de recherche.</p>
                    </div>
                `;
                return;
            }
            
            doctorsList.forEach(doctor => {
                doctorsContainer.innerHTML += renderDoctor(doctor);
            });
            
            // Ajouter les événements aux cartes
            document.querySelectorAll('.doctor-card').forEach(card => {
                card.addEventListener('click', (e) => {
                    const id = parseInt(card.getAttribute('data-id'));
                    showDoctorProfile(id);
                });
            });
        }
        
        // Afficher le profil complet d'un médecin
        // function showDoctorProfile(id) {
        //     const doctor = doctors.find(d => d.id === id);
        //     if (!doctor) return;
            
        //     doctorProfileContent.innerHTML = `
        //         <div class="profile-header">
        //             <img src="${doctor.avatar}" alt="${doctor.firstName} ${doctor.lastName}" class="profile-avatar">
                    
        //             <div class="profile-info">
        //                 <h2 class="profile-name">Dr. ${doctor.firstName} ${doctor.lastName}</h2>
        //                 <p class="profile-specialty">${doctor.specialty} - ${doctor.specialtyDetails}</p>
                        
        //                 <div class="profile-meta">
        //                     <span><i class="fas fa-map-marker-alt"></i> ${doctor.location}</span>
        //                     <span><i class="fas fa-briefcase"></i> ${doctor.experience} ans d'expérience</span>
        //                 </div>
                        
        //                 <div class="profile-meta">
        //                     <span><i class="fas fa-envelope"></i> ${doctor.email}</span>
        //                     <span><i class="fas fa-phone"></i> ${doctor.phone}</span>
        //                 </div>
        //             </div>
        //         </div>
                
        //         <div class="profile-section">
        //             <h3 class="profile-section-title"><i class="fas fa-info-circle"></i> Informations générales</h3>
                    
        //             <div class="profile-details">
        //                 <div class="detail-item">
        //                     <div class="detail-label">Adresse professionnelle</div>
        //                     <div class="detail-value">${doctor.address}</div>
        //                 </div>
                        
        //                 <div class="detail-item">
        //                     <div class="detail-label">Disponibilités</div>
        //                     <div class="detail-value">
        //                         <ul style="margin: 0; padding-left: 1.2rem;">
        //                             ${doctor.disponibilites.map(d => `<li>${d}</li>`).join('')}
        //                         </ul>
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
                
        //         <div class="profile-section">
        //             <h3 class="profile-section-title"><i class="fas fa-graduation-cap"></i> Parcours professionnel</h3>
        //             <div class="detail-value">${doctor.cv}</div>
        //         </div>
                
        //         <div class="profile-section">
        //             <h3 class="profile-section-title"><i class="fas fa-certificate"></i> Diplômes</h3>
                    
        //             <div class="documents-list">
        //                 ${doctor.diplomes.map(diplome => `
        //                     <div class="document-item">
        //                         <i class="fas fa-file-alt document-icon"></i>
        //                         <div>${diplome}</div>
        //                     </div>
        //                 `).join('')}
        //             </div>
        //         </div>
                
        //         <div class="profile-section">
        //             <h3 class="profile-section-title"><i class="fas fa-award"></i> Formations complémentaires</h3>
                    
        //             <div class="documents-list">
        //                 ${doctor.formations.map(formation => `
        //                     <div class="document-item">
        //                         <i class="fas fa-certificate document-icon"></i>
        //                         <div>${formation}</div>
        //                     </div>
        //                 `).join('')}
        //             </div>
        //         </div>
                
        //         <div class="profile-actions" style="margin-top: 2rem; display: flex; justify-content: flex-end;">
        //             <button class="btn btn-primary" id="inviteDoctorBtn" data-id="${doctor.id}">
        //                 <i class="fas fa-calendar-plus"></i> Inviter pour une intervention
        //             </button>
        //             <button class="btn btn-outline" id="backToListBtn" style="margin-right: 1rem;">
        //                 <i class="fas fa-arrow-left"></i> Retour à la liste
        //             </button>
        //         </div>
        //     `;
            
            // Ajouter l'événement au bouton d'invitation
        //     document.getElementById('inviteDoctorBtn').addEventListener('click', () => {
        //         inviteDoctor(doctor.id);
        //     });
            
        //     // Bouton retour à la liste
        //     document.getElementById('backToListBtn').addEventListener('click', () => {
        //         doctorModal.style.display = 'none';
        //     });
            
        //     // Afficher le modal
        //     doctorModal.style.display = 'flex';
        // }
        
        // Fermer le modal profil
        modalCloseBtn.addEventListener('click', () => {
            doctorModal.style.display = 'none';
        });
        
        window.addEventListener('click', (e) => {
            if (e.target === doctorModal) {
                doctorModal.style.display = 'none';
            }
        });
        
        // Inviter un médecin (ouvre le modal de sélection d'intervention)
        function inviteDoctor(id) {
            currentSelectedDoctor = doctors.find(d => d.id === id);
            if (!currentSelectedDoctor) return;
            
            doctorInviteName.textContent = `Dr. ${currentSelectedDoctor.firstName} ${currentSelectedDoctor.lastName}`;
            renderInterventionsToAssign(currentSelectedDoctor.specialty);
            selectInterventionModal.style.display = 'flex';
            doctorModal.style.display = 'none';
        }

        // Afficher les interventions non attribuées correspondant à la spécialité
        function renderInterventionsToAssign(specialty) {
            interventionsToAssign.innerHTML = '';
            currentSelectedIntervention = null;
            confirmInvitationBtn.disabled = true;
            
            const filteredInterventions = interventionsNonAttribuees.filter(
                i => i.specialty === specialty.toLowerCase()
            );
            
            if (filteredInterventions.length === 0) {
                interventionsToAssign.innerHTML = `
                    <div class="intervention-select-item">
                        <p>Aucune intervention non attribuée dans cette spécialité.</p>
                    </div>
                `;
                return;
            }
            
            filteredInterventions.forEach(intervention => {
                const interventionElement = document.createElement('div');
                interventionElement.className = 'intervention-select-item';
                interventionElement.dataset.id = intervention.id;
                interventionElement.innerHTML = `
                    <div class="intervention-select-title">${intervention.interventionType} - ${intervention.patientName}</div>
                    <div class="intervention-select-meta">
                        <span><i class="fas fa-calendar-alt"></i> ${formatDate(intervention.date)} - ${intervention.time}</span>
                        <span><i class="fas fa-clock"></i> ${intervention.duration}h</span>
                        <span><i class="fas fa-exclamation-triangle"></i> ${intervention.urgency === 'urgent' ? 'Urgent' : 'Normal'}</span>
                    </div>
                `;
                
                interventionElement.addEventListener('click', () => {
                    document.querySelectorAll('.intervention-select-item').forEach(item => {
                        item.classList.remove('selected');
                    });
                    interventionElement.classList.add('selected');
                    currentSelectedIntervention = intervention;
                    confirmInvitationBtn.disabled = false;
                });
                
                interventionsToAssign.appendChild(interventionElement);
            });
        }

        // Confirmer l'invitation
        confirmInvitationBtn.addEventListener('click', () => {
            if (currentSelectedDoctor && currentSelectedIntervention) {
                alert(`Invitation envoyée au Dr. ${currentSelectedDoctor.firstName} ${currentSelectedDoctor.lastName} pour l'intervention ${currentSelectedIntervention.interventionType} (${currentSelectedIntervention.patientName})`);
                
                // Fermer les modals
                selectInterventionModal.style.display = 'none';
                
                // Mettre à jour les données (simulé)
                const interventionIndex = interventionsNonAttribuees.findIndex(
                    i => i.id === currentSelectedIntervention.id
                );
                if (interventionIndex !== -1) {
                    interventionsNonAttribuees.splice(interventionIndex, 1);
                }
            }
        });

        // Annuler l'invitation
        cancelInvitationBtn.addEventListener('click', () => {
            selectInterventionModal.style.display = 'none';
            doctorModal.style.display = 'flex';
        });

        closeInterventionModal.addEventListener('click', () => {
            selectInterventionModal.style.display = 'none';
            doctorModal.style.display = 'flex';
        });

        window.addEventListener('click', (e) => {
            if (e.target === selectInterventionModal) {
                selectInterventionModal.style.display = 'none';
                doctorModal.style.display = 'flex';
            }
        });

        // Fonction utilitaire pour formater la date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }
    </script> --}}
</body>
</html>