<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher Interventions | XëtConnect</title>
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
            box-shadow:  0 4px 6px -1px rgba(0, 0, 0, 0.1);
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
        
        /* Filtres de recherche */
        .search-filters {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
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
        
        /* Liste des interventions */
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
        
        .search-box {
            display: flex;
            gap: 1rem;
        }
        
        .intervention-item {
            padding: 1.5rem;
            border-bottom: 1px solid var(--light-gray);
            transition: all 0.3s ease;
        }
        
        .intervention-item:hover {
            background-color: rgba(42, 91, 215, 0.03);
        }
        
        .intervention-item:last-child {
            border-bottom: none;
        }
        
        .intervention-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .intervention-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .intervention-specialty {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
            background-color: rgba(42, 91, 215, 0.1);
            color: var(--primary);
        }
        
        .intervention-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        
        .intervention-urgency {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .urgency-normal {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .urgency-high {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .urgency-critical {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .intervention-description {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .intervention-actions {
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
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
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

        /* POUR Disponibilité*/
        .availability-input {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 1rem;
            margin-bottom: 0.5rem;
            align-items: center;
        }

        .availability-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .availability-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--light-gray);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }

        .availability-item button {
            margin-left: auto;
            background: none;
            border: none;
            color: var(--danger);
            cursor: pointer;
            padding: 0.3rem;
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
            
            .filters-grid {
                grid-template-columns: 1fr;
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
                    <a href="ListInterv" class="active">
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
                <h1 class="page-title"><i class="fas fa-search"></i> Rechercher Interventions</h1>
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

            <!-- Filtres de recherche -->
            <div class="search-filters">
                <h3>Filtrer les interventions</h3>
                <div class="filters-grid">
                    <div class="filter-group">
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
                    
                    <div class="filter-group">
                        <label for="location">Localisation</label>
                        <select id="location" class="form-control">
                            <option value="">Toutes régions</option>
                            <option value="ile_de_france">Île-de-France</option>
                            <option value="auvergne_rhone_alpes">Auvergne-Rhône-Alpes</option>
                            <option value="provence_alpes_cote_dazur">Provence-Alpes-Côte d'Azur</option>
                            <option value="nouvelle_aquitaine">Nouvelle-Aquitaine</option>
                            <option value="occitanie">Occitanie</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" class="form-control">
                    </div>
                    
                    <div class="filter-group">
                        <label for="urgency">Urgence</label>
                        <select id="urgency" class="form-control">
                            <option value="">Tous niveaux</option>
                            <option value="normal">Normal</option>
                            <option value="urgent">Urgent</option>
                            <option value="tres_urgent">Très urgent</option>
                        </select>
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
            
            <!-- Liste des interventions -->
            <div class="interventions-container">
                <div class="interventions-header">
                    <h3>Interventions disponibles</h3>
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher..." class="form-control">
                        <button class="btn btn-primary search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <h3>Liste des interventions ouvertes</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date souhaitée</th>
                            <th>Description</th>
                            <th>Urgence</th>
                            <th>Établissement</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!--  PRENDRE EN COMPTE CELA POUR LES CONTROLLER POUR POUVOIR ENUMERER LES INTERVENTIONS-->  
                </table>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal Détails Intervention -->
    <div class="modal" id="detailsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Détails de l'intervention</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <div class="modal-body">
                <div class="form-group">
                    <h4>Prothèse de hanche gauche</h4>
                    <p><strong>Patient :</strong> M. Jean Martin (68 ans)</p>
                    <p><strong>Établissement :</strong> CHU de Lyon</p>
                    <p><strong>Adresse :</strong> 1 Place de l'Hôpital, 69000 Lyon</p>
                    <p><strong>Date prévue :</strong> 15/07/2023 à 08:30</p>
                    <p><strong>Durée estimée :</strong> 2 heures</p>
                    <p><strong>Urgence :</strong> <span class="intervention-urgency urgency-normal">Normale</span></p>
                </div>
                
                <div class="form-group">
                    <h4>Détails médicaux</h4>
                    <p>Patient avec antécédents d'arthrose sévère évoluant depuis 5 ans. Échec des traitements conservateurs. Allergie connue à la pénicilline. Le patient présente les caractéristiques suivantes :</p>
                    <ul style="margin-left: 1.5rem; margin-top: 0.5rem;">
                        <li>Poids : 85 kg</li>
                        <li>Taille : 175 cm</li>
                        <li>Allergies : Pénicilline</li>
                        <li>Médicaments actuels : Paracétamol, Anti-inflammatoires</li>
                    </ul>
                </div>
                
                <div class="form-group">
                    <h4>Matériel disponible</h4>
                    <p>La clinique dispose de tout le matériel nécessaire pour une prothèse totale de hanche, y compris les implants de dernière génération. Salle opératoire équipée pour la chirurgie orthopédique.</p>
                </div>
            </div>
            
            <div class="form-actions">
                <button class="btn btn-outline modal-close-btn">
                    <i class="fas fa-times"></i> Fermer
                </button>
                <button class="btn btn-primary modal-apply-btn">
                    <i class="fas fa-paper-plane"></i> Postuler
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Postuler -->
    <div class="modal" id="applyModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Postuler à l'intervention</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <form id="applicationForm">
                <div class="form-group">
                    <h4>Prothèse de hanche gauche - CHU de Lyon</h4>
                    <p>Date prévue : 15/07/2023 à 08:30</p>
                </div>
                
                <!-- Pour que le medecin/chirurgien puisse proposer une date,heure -->
                <div class="form-group">
                    <label for="availability">Disponibilités proposées</label>
                    <div class="availability-input">
                        <input type="date" id="availability-date" class="form-control">
                        <input type="time" id="availability-time" class="form-control">
                        <button type="button" class="btn btn-outline add-availability" style="padding: 0.5rem;">
                            <i class="fas fa-plus"></i> Ajouter
                        </button>
                    </div>
                    <div class="availability-list">
                        <!-- Les disponibilités ajoutées apparaîtront ici -->
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="tarif">Tarif proposés (en Fcfa)</label>
                    <input type="number" id="tarif" class="form-control" placeholder="450000" min="0" step="50">
                </div>

                
                <div class="form-group">
                    <label for="message">Message accompagnant votre candidature</label>
                    <textarea id="message" class="form-control" placeholder="..."></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-outline modal-close-btn">
                        <i class="fas fa-times"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Envoyer ma candidature
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Gestion des modals
        const detailsModal = document.getElementById('detailsModal');
        const applyModal = document.getElementById('applyModal');
        const modalCloseBtns = document.querySelectorAll('.modal-close');
        const modalCloseBtns2 = document.querySelectorAll('.modal-close-btn');
        const detailsBtns = document.querySelectorAll('.details-btn');
        const applyBtns = document.querySelectorAll('.apply-btn');
        const modalApplyBtns = document.querySelectorAll('.modal-apply-btn');
        const applicationForm = document.getElementById('applicationForm');
        
        // Ouvrir modal détails
        detailsBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                detailsModal.style.display = 'flex';
                document.body.style.overflow = 'hidden'; // Empêche le défilement en arrière-plan
            });
        });
        
        // Ouvrir modal postuler depuis détails
        modalApplyBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                detailsModal.style.display = 'none';
                applyModal.style.display = 'flex';
            });
        });
        
        // Ouvrir modal postuler directement
        applyBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                applyModal.style.display = 'flex';
                document.body.style.overflow = 'hidden'; // Empêche le défilement en arrière-plan
            });
        });
        
        // Fermer modals - tous les boutons de fermeture
        [...modalCloseBtns, ...modalCloseBtns2].forEach(btn => {
            btn.addEventListener('click', () => {
                detailsModal.style.display = 'none';
                applyModal.style.display = 'none';
                document.body.style.overflow = 'auto'; // Rétablit le défilement
            });
        });
        
        // Fermer en cliquant en dehors du modal
        window.addEventListener('click', (e) => {
            if (e.target === detailsModal || e.target === applyModal) {
                detailsModal.style.display = 'none';
                applyModal.style.display = 'none';
                document.body.style.overflow = 'auto'; // Rétablit le défilement
            }
        });
        
        // Gestion du formulaire de candidature
        applicationForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Votre candidature a bien été envoyée !');
            applyModal.style.display = 'none';
            document.body.style.overflow = 'auto'; // Rétablit le défilement
        });
        
        // Gestion des filtres
        document.querySelector('.filter-btn').addEventListener('click', () => {
            const specialty = document.getElementById('specialty').value;
            const location = document.getElementById('location').value;
            const date = document.getElementById('date').value;
            const urgency = document.getElementById('urgency').value;
            
            // Ici vous implémenteriez la logique de filtrage
            console.log(`Filtres appliqués : Spécialité = ${specialty}, Localisation = ${location}, Date = ${date}, Urgence = ${urgency}`);
        });
        
        // Réinitialisation des filtres
        document.querySelector('.reset-btn').addEventListener('click', () => {
            document.getElementById('specialty').value = '';
            document.getElementById('location').value = '';
            document.getElementById('date').value = '';
            document.getElementById('urgency').value = '';
            
            console.log('Filtres réinitialisés');
        });
        
        // Recherche
        document.querySelector('.search-btn').addEventListener('click', () => {
            const searchTerm = document.querySelector('.search-box input').value;
            console.log(`Recherche : ${searchTerm}`);
        });

        //Gestion disponibilité
        const availabilityList = document.querySelector('.availability-list');
        const addAvailabilityBtn = document.querySelector('.add-availability');
        const availabilityDate = document.getElementById('availability-date');
        const availabilityTime = document.getElementById('availability-time');

        // Gestion des disponibilités
        addAvailabilityBtn.addEventListener('click', () => {
            const date = availabilityDate.value;
            const time = availabilityTime.value;
            
            if (!date || !time) {
                alert('Veuillez sélectionner une date et une heure');
                return;
            }
            
            const datetime = `${date} à ${time}`;
            
            const item = document.createElement('div');
            item.className = 'availability-item';
            item.innerHTML = `
                <span>${formatDate(date)} à ${time}</span>
                <button type="button" class="remove-availability">
                    <i class="fas fa-times"></i>
                </button>
                <input type="hidden" name="availabilities[]" value="${date}T${time}">
            `;
            
            availabilityList.appendChild(item);
            
            // Réinitialiser les champs
            availabilityDate.value = '';
            availabilityTime.value = '';
        });

        // Suppression des disponibilités
        availabilityList.addEventListener('click', (e) => {
            if (e.target.closest('.remove-availability')) {
                e.target.closest('.availability-item').remove();
            }
        });

        // Fonction pour formater la date (optionnelle)
        function formatDate(dateString) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('fr-FR', options);
        }
    </script>
</body>
</html>