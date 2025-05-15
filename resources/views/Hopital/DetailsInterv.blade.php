<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Intervention | XëtConnect</title>
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
        
        /* Formulaire */
        .form-container {
            background: white;
            border-radius: 0.8rem;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .intervention-summary {
            background-color: rgba(42, 91, 215, 0.05);
            border-radius: 0.8rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .summary-item {
            display: flex;
            margin-bottom: 0.8rem;
        }
        
        .summary-label {
            font-weight: 600;
            min-width: 180px;
            color: var(--dark);
        }
        
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
                <h1 class="page-title"><i class="fas fa-file-medical"></i> Détails de l'intervention</h1>
            </div>
            
            <div class="form-container">
                <div class="intervention-summary">
                    <h3>Récapitulatif de l'intervention</h3>
                    <div class="summary-item">
                        <span class="summary-label">Patient :</span>
                        <span id="summary-patient">{{ $patient->nom }}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Type d'intervention :</span>
                        <span id="summary-type">Arthroscopie du genou</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Spécialité requise :</span>
                        <span id="summary-specialty">Orthopédie</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Date et heure :</span>
                        <span id="summary-date">15/07/2023 à 14:00</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Durée estimée :</span>
                        <span id="summary-duration">2 heures</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Urgence :</span>
                        <span id="summary-urgency">Normale</span>
                    </div>
                </div>
                
                <form id="detailsForm" action="creer-intervention-final" method="POST">
                    @csrf
                    <!-- Champs cachés pour les données de l'étape 1 -->
                    <input type="hidden" name="nomPatient" value="{{ old('nomPatient') }}">
                    <input type="hidden" name="prenomPatient" value="{{ old('prenomPatient') }}">
                    <input type="hidden" name="agePatient" value="{{ old('agePatient') }}">
                    <input type="hidden" name="sexePatient" value="{{ old('sexePatient') }}">
                    <input type="hidden" name="typeInt" value="{{ old('typeInt') }}">
                    <input type="hidden" name="speRequise" value="{{ old('speRequise') }}">
                    <input type="hidden" name="date" value="{{ old('date') }}">
                    <input type="hidden" name="heure" value="{{ old('heure') }}">
                    <input type="hidden" name="duree" value="{{ old('duree') }}">
                    <input type="hidden" name="niveau" value="{{ old('niveau') }}">
                    
                    <div class="form-section">
                        <h3 class="form-section-title"><i class="fas fa-file-medical-alt"></i> Détails médicaux</h3>
                        <div class="form-group">
                            <label for="maladie">Maladie ou condition principale</label>
                            <input type="text" name="maladie" id="maladie" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Détails médicaux importants</label>
                            <textarea name="details" id="details" class="form-control" placeholder="Antécédents médicaux, allergies, médicaments actuels, etc." required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3 class="form-section-title"><i class="fas fa-euro-sign"></i> Rémunération</h3>
                        <div class="form-group">
                            <label for="remuneration">Cette intervention est-elle rémunérée ?</label>
                            <select name="remuneration" id="remuneration" class="form-control" onchange="toggleTarifField()" required>
                                <option value="non">Non</option>
                                <option value="oui">Oui</option>
                            </select>
                        </div>
                        <div class="form-group" id="tarifGroup" style="display: none;">
                            <label for="tarif">Tarif proposé (FCFA)</label>
                            <input type="number" name="tarif" id="tarif" class="form-control" placeholder="50000" min="0">
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" onclick="window.history.back()" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Retour
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i> Finaliser l'intervention
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <script>
        // Fonction pour afficher/masquer le champ tarif
        function toggleTarifField() {
            const remuneration = document.getElementById('remuneration');
            const tarifGroup = document.getElementById('tarifGroup');
            
            if (remuneration.value === 'oui') {
                tarifGroup.style.display = 'block';
                document.getElementById('tarif').setAttribute('required', 'required');
            } else {
                tarifGroup.style.display = 'none';
                document.getElementById('tarif').removeAttribute('required');
            }
        }
        
        // Au chargement de la page, remplir le récapitulatif avec les données de l'étape précédente
        document.addEventListener('DOMContentLoaded', function() {
            // Ces valeurs devraient venir du backend dans une application réelle
            const urlParams = new URLSearchParams(window.location.search);
            
            // Remplir le récapitulatif (en production, vous utiliseriez les données de la session ou des paramètres)
            document.getElementById('summary-patient').textContent = 
                `${urlParams.get('nomPatient') || 'Jean'} ${urlParams.get('prenomPatient') || 'Martin'} 
                (${urlParams.get('agePatient') || '42'} ans, ${urlParams.get('sexePatient') === 'M' ? 'Masculin' : 'Féminin'})`;
                
            document.getElementById('summary-type').textContent = urlParams.get('typeInt') || 'Arthroscopie du genou';
            document.getElementById('summary-specialty').textContent = 
                getSpecialtyName(urlParams.get('speRequise')) || 'Orthopédie';
                
            const date = urlParams.get('date') ? new Date(urlParams.get('date')) : new Date('2023-07-15');
            document.getElementById('summary-date').textContent = 
                `${date.toLocaleDateString('fr-FR')} à ${urlParams.get('heure') || '14:00'}`;
                
            document.getElementById('summary-duration').textContent = 
                `${urlParams.get('duree') || '2'} heures`;
                
            document.getElementById('summary-urgency').textContent = 
                getUrgencyText(urlParams.get('niveau')) || 'Normale';
        });
        
        // Fonctions utilitaires
        function getSpecialtyName(specialty) {
            const specialties = {
                'chirurgie_generale': 'Chirurgie générale',
                'chirurgie_orthopedique': 'Orthopédie',
                'cardiologie': 'Cardiologie',
                'neurochirurgie': 'Neurochirurgie'
            };
            return specialties[specialty] || specialty;
        }
        
        function getUrgencyText(urgency) {
            const urgencies = {
                'normal': 'Normale',
                'urgent': 'Urgente',
                'tres-urgent': 'Très urgente'
            };
            return urgencies[urgency] || urgency;
        }
    </script>
</body>
</html>