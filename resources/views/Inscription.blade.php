<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | XëtConnect</title>
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
            min-height: 100vh;
        }
        
        /* Header */
        header {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1rem 8%;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            width: fit-content;
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
        
        /* Main Content */
        main {
            display: flex;
            justify-content: center;
            padding: 3rem 8%;
        }
        
        .registration-container {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 3rem;
            width: 100%;
            max-width: 700px;
        }
        
        .form-header {
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .form-header h2 {
            font-size: 1.8rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .form-header p {
            color: var(--gray);
            font-size: 0.95rem;
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
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(42, 91, 215, 0.1);
        }
        
        .form-row {
            display: flex;
            gap: 1rem;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .role-selection {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .role-option {
            flex: 1;
            position: relative;
        }
        
        .role-option input {
            position: absolute;
            opacity: 0;
        }
        
        .role-option label {
            display: block;
            padding: 1.5rem 1rem;
            border: 2px solid var(--light-gray);
            border-radius: 0.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .role-option input:checked + label {
            border-color: var(--primary);
            background-color: rgba(42, 91, 215, 0.05);
        }
        
        .role-option i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }
        
        .specific-fields {
            display: none;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .btn {
            width: 100%;
            padding: 0.8rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--gray);
            font-size: 0.95rem;
        }
        
        .login-link a {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        small.help-text {
            display: block;
            margin-top: 0.3rem;
            color: var(--gray);
            font-size: 0.8rem;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 2rem 8%;
            text-align: center;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .role-selection {
                flex-direction: column;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .registration-container {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <a href="/" class="logo">
            <i class="fas fa-hand-holding-medical"></i>
            <h1>XëtConnect</h1>
        </a>
    </header>
    
    <!-- Main Content -->
    <main>
        <div class="registration-container">
            <div class="form-header">
                <h2>Créez votre compte</h2>
                <p>Sélectionnez votre profil et complétez les informations requises</p>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
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
            
                <!-- Sélection du rôle -->
                <div class="role-selection">
                    <div class="role-option">
                        <input type="radio" id="surgeon" name="role" value="chirurgien" required>
                        <label for="surgeon">
                            <i class="fas fa-user-md"></i>
                            <div>Je suis chirurgien</div>
                        </label>
                    </div>
                    
                    <div class="role-option">
                        <input type="radio" id="hospital" name="role" value="hopital" required>
                        <label for="hospital">
                            <i class="fas fa-hospital"></i>
                            <div>Je suis un établissement</div>
                        </label>
                    </div>
                </div>
            <form id="registrationForm" method="POST" action="traitementInsChirurgien">
                @csrf
                <!-- Champs spécifiques chirurgien -->
                <div id="surgeonFields" class="specific-fields">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input type="text" id="lastname" name="nom" class="form-control" placeholder="Votre nom" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" name="prenom" class="form-control" placeholder="Votre prénom" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email_surgeon">Email professionnel</label>
                        <input type="email" id="email_surgeon" name="email" class="form-control" placeholder="exemple@domaine.com" required>
                        <small class="help-text">Utilisez votre email professionnel (hôpital, clinique, etc.)</small>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone_surgeon">Téléphone professionnel</label>
                            <input type="tel" name="telephone" id="phone_surgeon" class="form-control" placeholder="+xx x xx xx xx xx" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="experience">Années d'expérience</label>
                            <input type="number" name="exp" id="experience" class="form-control" placeholder="5" min="0" max="50" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="specialite">Spécialité principale</label>
                            <select id="specialite" name="specialite" class="form-control" required>
                                <option value="">Sélectionnez votre spécialité</option>
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
                            <label for="ville">Ville/Région d'exercice</label>
                            <input type="text" name="region" id="ville" class="form-control" placeholder="Dakar, Sénégal" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="password_surgeon">Mot de passe</label>
                            <input type="password" name="password" id="password_surgeon" class="form-control" placeholder="••••••••" minlength="8" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password_surgeon">Confirmation</label>
                            <input type="password" name="password_confirmation" id="confirm_password_surgeon" class="form-control" placeholder="••••••••" minlength="8" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Créer mon compte</button>

                </div>
            </form>
                <!-- Champs spécifiques hôpital -->
            <form action="traitementInsHopital" method="POST">
                @csrf
                <div id="hospitalFields" class="specific-fields">
                    <div class="form-group">
                        <label for="nom_hopital">Nom de l'établissement</label>
                        <input type="text" id="nom_hopital" name="nom" class="form-control" placeholder="Nom officiel" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="statut">Statut</label>
                            <select id="statut" name="statut" class="form-control" required>
                                <option value="">Sélectionnez un statut</option>
                                <option value="public">Établissement public</option>
                                <option value="prive">Établissement privé</option>
                                <option value="prive_non_lucratif">Privé à but non lucratif</option>
                                <option value="ong">ONG/Humanitaire</option>
                                <option value="autre">Autre statut</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="region">Région</label>
                            <input type="text" name="region" id="region" class="form-control" placeholder="Région principale" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="adresse_hopital">Adresse postale complète</label>
                        <input type="text" name="adresse" id="adresse_hopital" class="form-control" placeholder="Numéro, rue, code postal, ville" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email_hopital">Email professionnel</label>
                        <input type="email" name="email" id="email_hopital" class="form-control" placeholder="contact@etablissement.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone_hopital">Téléphone</label>
                        <input type="tel" name="telephone" id="phone_hopital" class="form-control" placeholder="+xx xx xxx xx xx" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="responsable_nom">Nom du responsable</label>
                            <input type="text" name="nomRes" id="responsable_nom" class="form-control" placeholder="Nom complet" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="responsable_fonction">Fonction</label>
                            <input type="text" name="fonctionRes" id="responsable_fonction" class="form-control" placeholder="Directeur, Responsable RH, etc." required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="password_hopital">Mot de passe</label>
                            <input type="password" name="password" id="password_hopital" class="form-control" placeholder="••••••••" minlength="8" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password_hopital">Confirmation</label>
                            <input type="password" name="password_confirmation" id="confirm_password_hopital" class="form-control" placeholder="••••••••" minlength="8" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Créer mon compte</button>

                </div>
            </form>
                
                {{-- <button type="submit" class="btn btn-primary">Créer mon compte</button> --}}
                
                <div class="login-link">
                    Vous avez déjà un compte ? <a href="Login">Connectez-vous</a>
                </div>
            {{-- </form> --}}
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-bottom">
            <p>&copy; 2025 XëtConnect. Tous droits réservés.</p>
        </div>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleOptions = document.querySelectorAll('input[name="role"]');
            const surgeonFields = document.getElementById('surgeonFields');
            const hospitalFields = document.getElementById('hospitalFields');
            const form = document.getElementById('registrationForm');
            
            // Afficher les champs spécifiques selon le rôle sélectionné
            roleOptions.forEach(option => {
                option.addEventListener('change', function() {
                    if (this.value === 'chirurgien') {
                        surgeonFields.style.display = 'block';
                        hospitalFields.style.display = 'none';
                    } else if (this.value === 'hopital') {
                        surgeonFields.style.display = 'none';
                        hospitalFields.style.display = 'block';
                    }
                });
            });
        });
            
        //     // Validation des mots de passe identiques
        //     function validatePasswords() {
        //         const role = document.querySelector('input[name="role"]:checked').value;
        //         const password = role === 'chirurgien' 
        //             ? document.getElementById('password_surgeon').value 
        //             : document.getElementById('password_hopital').value;
        //         const confirmPassword = role === 'chirurgien' 
        //             ? document.getElementById('confirm_password_surgeon').value 
        //             : document.getElementById('confirm_password_hopital').value;
                
        //         if (password !== confirmPassword) {
        //             alert('Les mots de passe ne correspondent pas');
        //             return false;
        //         }
        //         return true;
        //     }
            
        //     // Gestion de la soumission du formulaire
        //     form.addEventListener('submit', function(e) {
        //         e.preventDefault();
                
        //         if (!validatePasswords()) return;
                
        //         // Récupération des données du formulaire
        //         const role = document.querySelector('input[name="role"]:checked').value;
        //         const formData = {
        //             role: role,
        //             // Champs communs
        //             email: role === 'chirurgien' 
        //                 ? document.getElementById('email_surgeon').value 
        //                 : document.getElementById('email_hopital').value,
        //             phone: role === 'chirurgien' 
        //                 ? document.getElementById('phone_surgeon').value 
        //                 : document.getElementById('phone_hopital').value,
        //             password: role === 'chirurgien' 
        //                 ? document.getElementById('password_surgeon').value 
        //                 : document.getElementById('password_hopital').value,
                    
        //             // Champs chirurgien
        //             ...(role === 'chirurgien' && {
        //                 lastname: document.getElementById('lastname').value,
        //                 firstname: document.getElementById('firstname').value,
        //                 specialite: document.getElementById('specialite').value,
        //                 experience: document.getElementById('experience').value,
        //                 ville: document.getElementById('ville').value
        //             }),
                    
        //             // Champs hôpital
        //             ...(role === 'hopital' && {
        //                 nom_hopital: document.getElementById('nom_hopital').value,
        //                 statut: document.getElementById('statut').value,
        //                 adresse: document.getElementById('adresse_hopital').value,
        //                 region: document.getElementById('region').value,
        //                 responsable_nom: document.getElementById('responsable_nom').value,
        //                 responsable_fonction: document.getElementById('responsable_fonction').value
        //             })
        //         };
                
        //         // Ici, vous enverriez les données à votre backend
        //         console.log('Données du formulaire:', formData);
                
        //         // Simulation d'envoi réussi
        //         alert('Inscription réussie ! Redirection vers le tableau de bord...');
                
        //         // Redirection vers le tableau de bord approprié
        //         // if (role === 'chirurgien') {
        //         //     window.location.href = 'dashboard-chirurgien.html';
        //         // } else {
        //         //     window.location.href = 'dashboard-hopital.html';
        //         // }
        //     });
        // // });
    </script>
</body>
</html>