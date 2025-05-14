<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Intervention | XëtConnect</title>
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
        
        /* Liste des interventions */
        .interventions-list {
            margin-top: 1rem;
        }
        
        .interventions-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .intervention-item {
            background: white;
            border-radius: 0.8rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .intervention-item:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        
        .intervention-status {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-attribuee {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .status-non-attribuee {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }
        
        .intervention-meta {
            display: flex;
            gap: 1.5rem;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        
        .intervention-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .intervention-actions {
            display: flex;
            gap: 0.8rem;
            justify-content: flex-end;
        }
        
        .intervention-details {
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
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
        }
        
        /* Modal Intervention */
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
                    <a href="CreerInterv" class="active">
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
                <h1 class="page-title"><i class="fas fa-plus-circle"></i> Gérer les interventions</h1>
                <button id="newInterventionBtn" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nouvelle intervention
                </button>
            </div>
            
            <!-- Liste des interventions existantes -->
            <div class="interventions-list">
                <div class="interventions-list-header">
                    <h2><i class="fas fa-list"></i> Interventions programmées</h2>
                    <div class="search-box">
                        <input type="text" placeholder="Rechercher..." class="form-control" style="width: 200px;">
                    </div>
                </div>
                
                <div id="interventionsContainer">
                    <!-- Les interventions seront ajoutées ici dynamiquement -->
                </div>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
    </footer>
    
    <!-- Modal pour nouvelle intervention -->
    <div class="modal" id="interventionModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-plus-circle"></i> <span id="modalInterventionTitle">Nouvelle intervention</span></h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <form id="interventionForm" action="traitementCreerPatient" method="POST">
                @csrf
                <input type="hidden" id="interventionId">
                
                <div class="form-section">
                    <h3 class="form-section-title"><i class="fas fa-user-injured"></i> Informations patient</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="patientName">Nom du patient</label>
                            <input type="text" name="nomPatient" id="patientName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="patientName">Prenom du patient</label>
                            <input type="text" name="prenomPatient" id="patientName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="patientAge">Âge</label>
                            <input type="number" name="agePatient" id="patientAge" class="form-control" min="0" max="120" required>
                        </div>
                        <div class="form-group">
                            <label for="patientAge">Maladie</label>
                            <input type="text" name="maladie" id="patientAge" class="form-control" min="0" max="120" required>
                        </div>
                        <div class="form-group">
                            <label for="patientGender">Sexe</label>
                            <select name="sexePatient" id="patientGender" class="form-control" required>
                                <option value="">Sélectionner</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="patientFile">Numéro dossier</label>
                            <input type="text" name="numDossier" id="patientFile" class="form-control" required>
                        </div>
                    </div>
                </div>
                
             
                
                <div class="form-actions">
                <button type="button" onclick="window.location.href='CreerInterv'" class="btn btn-outline">Annuler</button>
                    <button type="submit" class="btn btn-primary">Continuer vers les détails</button>
                </div>
            </form>
        </div>
    </div>
      
    <script>
        // Données simulées
        /* let interventions = [
            {
                id: 1,
                patientName: "M. Jean Dubois",
                patientAge: 68,
                patientGender: "M",
                patientFile: "D2023001",
                interventionType: "Prothèse de hanche droite",
                specialty: "orthopedie",
                date: "2023-07-15",
                time: "08:30",
                duration: 2,
                urgency: "normal",
                details: "Patient avec antécédents d'arthrose sévère. Allergie à la pénicilline.",
                status: "attribuee",
                surgeon: "Dr. Jean Dupont"
            },
            {
                id: 2,
                patientName: "Mme. Sophie Lambert",
                patientAge: 45,
                patientGender: "F",
                patientFile: "D2023002",
                interventionType: "Arthroscopie genou gauche",
                specialty: "orthopedie",
                date: "2023-07-17",
                time: "14:00",
                duration: 1.5,
                urgency: "normal",
                details: "Lésion méniscale. Aucune allergie connue.",
                status: "non-attribuee",
                applications: 3
            },
            {
                id: 3,
                patientName: "M. Pierre Petit",
                patientAge: 32,
                patientGender: "M",
                patientFile: "D2023003",
                interventionType: "Appendicectomie",
                specialty: "chirurgie-generale",
                date: "2023-07-20",
                time: "09:00",
                duration: 1,
                urgency: "urgent",
                details: "Appendicite aiguë confirmée par échographie. Aucune allergie.",
                status: "non-attribuee",
                applications: 0
            }
        ]; */
        
        
        // Éléments DOM
        const newInterventionBtn = document.getElementById('newInterventionBtn');
        const interventionModal = document.getElementById('interventionModal');
        const modalInterventionTitle = document.getElementById('modalInterventionTitle');
        const interventionForm = document.getElementById('interventionForm');
        const cancelInterventionBtn = document.getElementById('cancelInterventionBtn');
        const modalCloseBtn = document.querySelector('.modal-close');
        const interventionsContainer = document.getElementById('interventionsContainer');
        
        // Afficher le modal pour nouvelle intervention
        newInterventionBtn.addEventListener('click', () => {
            interventionForm.reset();
            document.getElementById('interventionId').value = '';
            modalInterventionTitle.textContent = 'Nouvelle intervention';
            interventionModal.style.display = 'flex';
        });
        
        // Fermer le modal
        cancelInterventionBtn.addEventListener('click', () => {
            interventionModal.style.display = 'none';
        });
        
        modalCloseBtn.addEventListener('click', () => {
            interventionModal.style.display = 'none';
        });
        
        window.addEventListener('click', (e) => {
            if (e.target === interventionModal) {
                interventionModal.style.display = 'none';
            }
        });
        
        // Soumission du formulaire
        // interventionForm.addEventListener('submit', (e) => {
        //     e.preventDefault();
            
        //     const id = document.getElementById('interventionId').value;
        //     const isNew = id === '';
            
        //     const interventionData = {
        //         id: isNew ? Date.now() : parseInt(id),
        //         patientName: document.getElementById('patientName').value,
        //         patientAge: parseInt(document.getElementById('patientAge').value),
        //         patientGender: document.getElementById('patientGender').value,
        //         patientFile: document.getElementById('patientFile').value,
        //         interventionType: document.getElementById('interventionType').value,
        //         specialty: document.getElementById('specialty').value,
        //         date: document.getElementById('interventionDate').value,
        //         time: document.getElementById('interventionTime').value,
        //         duration: parseFloat(document.getElementById('estimatedDuration').value),
        //         urgency: document.getElementById('urgency').value,
        //         details: document.getElementById('interventionDetails').value,
        //         status: "non-attribuee",
        //         applications: 0
        //     };
            
        //     if (isNew) {
        //         interventions.unshift(interventionData);
        //     } else {
        //         const index = interventions.findIndex(i => i.id === parseInt(id));
        //         if (index !== -1) {
        //             interventions[index] = interventionData;
        //         }
        //     }
            
        //     interventionForm.reset();
        //     interventionModal.style.display = 'none';
        //     renderInterventions();
        //     alert(`Intervention ${isNew ? 'ajoutée' : 'mise à jour'} avec succès!`);
        // });
        
        // Rendre une intervention
        // function renderIntervention(intervention) {
        //     const statusClass = intervention.status === 'attribuee' ? 'status-attribuee' : 'status-non-attribuee';
        //     const statusText = intervention.status === 'attribuee' ? 'Attribuée' : 'Non attribuée';
            
        //     return `
        //         <div class="intervention-item" data-id="${intervention.id}">
        //             <div class="intervention-header">
        //                 <h3 class="intervention-title">${intervention.interventionType} - ${intervention.patientName}</h3>
        //                 <span class="intervention-status ${statusClass}">${statusText}</span>
        //             </div>
                    
        //             <div class="intervention-meta">
        //                 <span><i class="fas fa-calendar-alt"></i> ${formatDate(intervention.date)} - ${intervention.time}</span>
        //                 <span><i class="fas fa-user-md"></i> ${getSpecialtyName(intervention.specialty)}</span>
        //                 <span><i class="fas fa-clock"></i> ${intervention.duration}h estimées</span>
        //                 <span><i class="fas fa-exclamation-triangle"></i> ${getUrgencyText(intervention.urgency)}</span>
        //             </div>
                    
        //             <div class="intervention-details">
        //                 <p><strong>Détails :</strong> ${intervention.details || 'Aucun détail supplémentaire'}</p>
        //                 ${intervention.status === 'attribuee' ? 
        //                   `<p><strong>Chirurgien :</strong> ${intervention.surgeon}</p>` : 
        //                   `<p><strong>Candidatures :</strong> ${intervention.applications || 0}</p>`}
        //             </div>
                    
        //             <div class="intervention-actions">
        //                 <button class="btn btn-outline edit-btn" data-id="${intervention.id}">
        //                     <i class="fas fa-edit"></i> Modifier
        //                 </button>
        //                 ${intervention.status === 'non-attribuee' ? 
        //                   `<button class="btn btn-primary search-btn" data-id="${intervention.id}">
        //                       <i class="fas fa-search"></i> Rechercher
        //                   </button>` : 
        //                   `<button class="btn btn-primary details-btn" data-id="${intervention.id}">
        //                       <i class="fas fa-info-circle"></i> Détails
        //                   </button>`}
        //                 <button class="btn btn-danger delete-btn" data-id="${intervention.id}">
        //                     <i class="fas fa-trash"></i> Supprimer
        //                 </button>
        //             </div>
        //         </div>
        //     `;
        // }
        
        // Rendre toutes les interventions
        // function renderInterventions() {
        //     interventionsContainer.innerHTML = '';
            
        //     if (interventions.length === 0) {
        //         interventionsContainer.innerHTML = `
        //             <div class="intervention-item">
        //                 <p>Aucune intervention programmée pour le moment.</p>
        //             </div>
        //         `;
        //         return;
        //     }
            
        //     interventions.forEach(intervention => {
        //         interventionsContainer.innerHTML += renderIntervention(intervention);
        //     });
            
        //     // Ajouter les événements
        //     document.querySelectorAll('.edit-btn').forEach(btn => {
        //         btn.addEventListener('click', (e) => {
        //             const id = parseInt(e.currentTarget.getAttribute('data-id'));
        //             editIntervention(id);
        //         });
        //     });
            
        //     document.querySelectorAll('.delete-btn').forEach(btn => {
        //         btn.addEventListener('click', (e) => {
        //             const id = parseInt(e.currentTarget.getAttribute('data-id'));
        //             deleteIntervention(id);
        //         });
        //     });
        // }
        
        // Éditer une intervention
        // function editIntervention(id) {
        //     const intervention = interventions.find(i => i.id === id);
        //     if (!intervention) return;
            
        //     document.getElementById('interventionId').value = intervention.id;
        //     document.getElementById('patientName').value = intervention.patientName;
        //     document.getElementById('patientAge').value = intervention.patientAge;
        //     document.getElementById('patientGender').value = intervention.patientGender;
        //     document.getElementById('patientFile').value = intervention.patientFile;
        //     document.getElementById('interventionType').value = intervention.interventionType;
        //     document.getElementById('specialty').value = intervention.specialty;
        //     document.getElementById('interventionDate').value = intervention.date;
        //     document.getElementById('interventionTime').value = intervention.time;
        //     document.getElementById('estimatedDuration').value = intervention.duration;
        //     document.getElementById('urgency').value = intervention.urgency;
        //     document.getElementById('interventionDetails').value = intervention.details || '';
            
        //     modalInterventionTitle.textContent = 'Modifier intervention';
        //     interventionModal.style.display = 'flex';
        // }
        
        // Supprimer une intervention
        function deleteIntervention(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette intervention?')) {
                interventions = interventions.filter(i => i.id !== id);
                renderInterventions();
                alert('Intervention supprimée avec succès!');
            }
        }
        
        // Fonctions utilitaires
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }
        
        function getSpecialtyName(specialty) {
            const specialties = {
                'orthopedie': 'Orthopédie',
                'chirurgie-generale': 'Chirurgie générale',
                'cardiologie': 'Cardiologie',
                'neurochirurgie': 'Neurochirurgie',
                'urologie': 'Urologie'
            };
            return specialties[specialty] || specialty;
        }
        
        function getUrgencyText(urgency) {
            const urgencies = {
                'normal': 'Normal',
                'urgent': 'Urgent',
                'tres-urgent': 'Très urgent'
            };
            return urgencies[urgency] || urgency;
        }
        
        // Initialiser
        document.addEventListener('DOMContentLoaded', () => {
            renderInterventions();
        });
        // Gestion de l'affichage du champ tarif
        const remunerationSelect = document.getElementById('rénuméré');
        const priceGroup = document.querySelector('.price-group');
        const tarifInput = document.getElementById('tarif');

        remunerationSelect.addEventListener('change', function() {
            if (this.value === 'Oui') {
                priceGroup.style.display = 'block';
                tarifInput.setAttribute('required', 'required');
            } else {
                priceGroup.style.display = 'none';
                tarifInput.removeAttribute('required');
                tarifInput.value = ''; // Réinitialiser la valeur
            }
        });

        // Au chargement de la page, vérifier l'état initial
        if (remunerationSelect.value === 'Oui') {
            priceGroup.style.display = 'block';
            tarifInput.setAttribute('required', 'required');
        }
    </script>
</body>
</html>