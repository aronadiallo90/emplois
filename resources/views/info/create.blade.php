@extends('layouts.app')

@section('content')

<head>
    <!-- Ajouter le CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<!-- Barre d'en-tête -->
<header class="header-bar">
    <div class="header-content">
        <img src="../images/dss.png" alt="Logo" class="header-logo">
        <h2>PLATEFORME DE GESTION DES DEMANDES D'EMPLOI DE LA DIASPORA</h2>
    </div>
</header>

<div class="d-flex justify-content-end"> 
    <div class="dropdown">
        <a class="btn btn-light dropdown-toggle border" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Bonjour, {{ Auth::user()->name }}!
</a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <li>
                
                    <a  type="submit" class="dropdown-item"><a href="{{ route('login') }}">Déconnexion</a></a>
                
            </li>
        </ul>
    </div>
</div>

<h1></h1>
<!-- Bootstrap JS (Ajoutez-le si Bootstrap n'est pas déjà inclus) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<style>
    .header-bar {
        text-align: center;
        margin: 20px 0;
        font-size: 18px; /* Réduire la taille du texte de l'en-tête */
    }

    .header-content {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header-logo {
        width: 40px; /* Ajuster la taille de l'image */
        height: auto;
        margin-right: 10px; /* Espacement entre l'image et le texte */
    }

    h2 {
        margin: 0; /* Supprimer les marges autour du texte */
        font-size: 1.5em; /* Taille réduite du texte */
    }
</style>


<style>
    .header-bar {
        text-align: center;
        margin: 20px 0; /* Optional margin for spacing */
    }
</style>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<!-- Afficher le nom de l'utilisateur connecté et un bouton de déconnexion -->


<form action="{{ route('info.store') }}" method="POST">
    @csrf

    <!-- Step 1: Personal Information -->
    <div class="form-step" id="step-1">

    <fieldset>
    <legend><h3>Étape 1 : Informations personnelles</h3></legend>

    <div class="form-group flex">
        <div class="flex-1 pr-2">
            <label for="nom"><i class="fas fa-user"></i> Nom</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="flex-1 pl-2">
            <label for="prenom"><i class="fas fa-user"></i> Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
    </div>

    <div class="form-group flex">
        <div class="flex-1 pr-2">
            <label for="cni"><i class="fas fa-id-card"></i> CNI</label>
            <input type="text" id="cni" name="cni" required>
        </div>
        <div class="flex-1 pl-2">
            <label for="genre"><i class="fas fa-venus-mars"></i> Genre</label>
            <select id="genre" name="genre" required>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
        </div>
    </div>

    <div class="form-group flex">
        <div class="flex-1 pr-2">
            <label for="datenaiss"><i class="fas fa-calendar-alt"></i> Date de naissance</label>
            <input type="date" id="datenaiss" name="datenaiss" required>
        </div>
        <div class="flex-1 pl-2">
            <label for="lieu"><i class="fas fa-map-marker-alt"></i> Lieu de naissance</label>
            <input type="text" id="lieu" name="lieu" required>
        </div>
    </div>

    <div class="form-group flex">
        <div class="flex-1 pr-2">
            <label for="situation"><i class="fas fa-ring"></i> Situation matrimoniale</label>
            <select id="situation" name="situation" required>
                <option value="Célibataire">Célibataire</option>
                <option value="Marié(e)">Marié(e)</option>
                <option value="Divorcé(e)">Divorcé(e)</option>
                <option value="Veuf/Veuve">Veuf/Veuve</option>
            </select>
        </div>

        <div class="flex-1 pl-2">
            <label for="nombrenfant"><i class="fas fa-child"></i> Nombre d'enfants</label>
            <input type="number" id="nombrenfant" name="nombrenfant" required>
        </div>
    </div>

    <div class="form-group flex">
        <div class="flex-1 pr-2">
            <label for="lieu_residence"><i class="fas fa-map-marker-alt"></i> Lieu de résidence</label>
            <select id="lieu_residence" name="lieu_residence" required>
                @foreach (\App\Models\Country::all() as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-1 pl-2">
            <label for="adresse"><i class="fas fa-home"></i> Adresse</label>
            <input type="text" id="adresse" name="adresse" required>
        </div>
    </div>

    <div class="form-group">
        <label for="handicap"><i class="fas fa-wheelchair"></i> Handicap</label>
        <select name="handicap" id="handicap" required>
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>
    </div>

    <div class="form-group flex justify-start mt-4">
        <button type="button" class="next-step flex items-center">
            <span>Suivant</span>
            <i class="fas fa-arrow-right ml-2"></i> <!-- Arrow icon (left) -->
        </button>
    </div>
</fieldset>

<style>
    .form-group.flex {
        display: flex;
        justify-content: space-between;
        gap: 10px; /* Add spacing between items */
    }

    .flex-1 {
        flex: 1;
    }

    .pr-2 {
        padding-right: 10px;
    }

    .pl-2 {
        padding-left: 10px;
    }

    .next-step {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        display: inline-flex;
        align-items: center;
    }

    .next-step:hover {
        background-color: #45a049;
    }

    .next-step i {
        margin-left: 8px; /* Space between text and icon */
    }

    .justify-start {
        justify-content: flex-start;
    }
</style>


<style>
    .form-group.flex {
        display: flex;
        justify-content: space-between;
        gap: 10px; /* Add spacing between items */
    }

    .flex-1 {
        flex: 1;
    }

    .pr-2 {
        padding-right: 10px;
    }

    .pl-2 {
        padding-left: 10px;
    }
</style>




</fieldset>

<style>
    .form-group.flex {
        display: flex;
        justify-content: space-between;
        gap: 10px; /* Add spacing between items */
    }

    .flex-1 {
        flex: 1;
    }

    .pr-2 {
        padding-right: 10px;
    }

    .pl-2 {
        padding-left: 10px;
    }
</style>

    </div>

    <!-- Step 2: Professional Experience -->
    <div class="form-step" id="step-2" style="display: none;">
    <fieldset>
    <legend><h3>Étape 2 : Expérience professionnelle</h3></legend>

    <div class="form-group">
        <label for="exp_professionnelle"><i class="fas fa-briefcase"></i> Expérience professionnelle</label>
        <textarea id="exp_professionnelle" name="exp_professionnelle" required></textarea>
    </div>

    <div class="form-group">
        <label for="nombrexp"><i class="fas fa-cogs"></i> Nombre d'années d'expérience</label>
        <input type="number" id="nombrexp" name="nombrexp" required>
    </div>

    <div class="form-group">
        <label for="dernierposte"><i class="fas fa-briefcase"></i> Dernier poste</label>
        <input type="text" id="dernierposte" name="dernierposte" required>
    </div>

    <div class="form-group">
        <label for="dernieremp"><i class="fas fa-building"></i> Dernier employeur</label>
        <input type="text" id="dernieremp" name="dernieremp" required>
    </div>

    <div class="form-group flex justify-start mt-4">
        <!-- Précédent button with left arrow -->
        <button type="button" class="prev-step flex items-center mr-4">
            <i class="fas fa-arrow-left"></i>
            <span>Précédent</span>
        </button>
        
        <!-- Suivant button with right arrow -->
        <button type="button" class="next-step flex items-center">
            <span>Suivant</span>
            <i class="fas fa-arrow-right ml-2"></i> <!-- Arrow icon (right) -->
        </button>
    </div>
</fieldset>

<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-group.flex {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .prev-step, .next-step {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        display: inline-flex;
        align-items: center;
    }

    .prev-step:hover, .next-step:hover {
        background-color: #45a049;
    }

    .prev-step i, .next-step i {
        margin-right: 8px;
    }

    .mr-4 {
        margin-right: 16px; /* Adds space between the buttons */
    }
    
    .justify-start {
        justify-content: flex-start;
    }
</style>

    </div>
    <!-- Step 3: Formation -->
    <div class="form-step" id="step-3" style="display: none;">
    <fieldset>
    <legend><h3>Étape 3 : Formation</h3></legend>

    <div class="form-group">
        <label for="diplome"><i class="fas fa-graduation-cap"></i> Diplôme</label>
        <input type="text" id="diplome" name="diplome" required>
    </div>

    <div class="form-group">
        <label for="institution"><i class="fas fa-school"></i> Institution</label>
        <input type="text" id="institution" name="institution" required>
    </div>

    <div class="form-group">
        <label for="intitule_diplome"><i class="fas fa-certificate"></i> Intitulé du diplôme</label>
        <input type="text" id="intitule_diplome" name="intitule_diplome" required>
    </div>

    <div class="form-group">
        <label for="annee_obs"><i class="fas fa-calendar-check"></i> Année d'obtention</label>
        <input type="number" id="annee_obs" name="annee_obs" required>
    </div>

    <div class="form-group">
        <label for="specialite"><i class="fas fa-cogs"></i> Spécialité</label>
        <input type="text" id="specialite" name="specialite" required>
    </div>

    <div class="form-group">
        <label for="autre_diplome"><i class="fas fa-cogs"></i> Autre diplôme</label>
        <input type="text" id="autre_diplome" name="autre_diplome">
    </div>

    <div class="form-group flex justify-start mt-4">
        <!-- Précédent button with left arrow -->
        <button type="button" class="prev-step flex items-center mr-4">
            <i class="fas fa-arrow-left"></i>
            <span>Précédent</span>
        </button>
        
        <!-- Suivant button with right arrow -->
        <button type="button" class="next-step flex items-center">
            <span>Suivant</span>
            <i class="fas fa-arrow-right ml-2"></i> <!-- Arrow icon (right) -->
        </button>
    </div>
</fieldset>

<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-group.flex {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .prev-step, .next-step {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        display: inline-flex;
        align-items: center;
    }

    .prev-step:hover, .next-step:hover {
        background-color: #45a049;
    }

    .prev-step i, .next-step i {
        margin-right: 8px;
    }

    .mr-4 {
        margin-right: 16px; /* Adds space between the buttons */
    }
    
    .justify-start {
        justify-content: flex-start;
    }
</style>

    </div>

    <!-- Step 4: Emploi -->
    <div class="form-step" id="step-4" style="display: none;">
    <fieldset>
        <legend><h3>Étape 4 : Emploi</h3></legend>

        <div class="form-group">
            <label for="cv"><i class="fas fa-file-alt"></i> CV</label>
            <textarea id="cv" name="cv" required></textarea>
        </div>

        <div class="form-group">
            <label for="lettremoti"><i class="fas fa-file-alt"></i> Lettre de motivation</label>
            <textarea id="lettremoti" name="lettremoti" required></textarea>
        </div>
        <div class="form-group">
            <label for="secteur_id"><i class="fas fa-briefcase"></i> Secteur</label>
            <select id="secteur_id" name="secteur_id" required onchange="fetchEmplois(this.value)">
                <option value="">-- Sélectionnez un secteur --</option>
                @foreach($secteurs as $secteur)
                    <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
                @endforeach
            </select>
        </div>
      


        <div class="button-container">
    <!-- Bouton Précédent -->
    <button type="button" class="prev-step">
        <i class="fa fa-arrow-left"></i> Précédent
    </button>

    <!-- Bouton Soumettre -->
    <button type="submit" id="submit-button">
    Soumettre <i class="fa fa-check"></i>
</button>

<!-- Popup -->
<div id="popup" style="display:none;">
    <div id="popup-content">
        <p>Votre demande a été soumise.</p>
        <p id="registration-number">Votre numéro d'inscription est: </p>
        <button id="close-popup">Fermer</button>
    </div>
</div>


           


   
</div>
 </fieldset>
    </div>
   
</form>

<script>
document.getElementById("submit-button").addEventListener("click", function(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire pour rester sur la même page

    // Générer un numéro d'inscription unique
    var registrationNumber = "INS-" + Math.floor(Math.random() * 1000000);

    // Afficher le popup
    document.getElementById("registration-number").textContent = "Votre numéro d'inscription est: " + registrationNumber;
    document.getElementById("popup").style.display = "flex"; // Affiche le popup
});

document.getElementById("close-popup").addEventListener("click", function() {
    // Cacher le popup
    document.getElementById("popup").style.display = "none";
    
    // Rafraîchir la page
    location.reload(); // Cela recharge la page
});

</script>
<style>
    #popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
}

#popup-content {
    background-color: #fff;
    padding: 20px;
    text-align: center;
    border-radius: 5px;
    max-width: 300px;
    margin: auto;
}

    /* Conteneur des boutons */
.button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

/* Style du bouton Précédent */
.prev-step {
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    padding: 10px 20px;
    font-size: 16px;
    color: #333;
    display: flex;
    align-items: center;
    cursor: pointer;
    border-radius: 5px;
}

/* Style du bouton Soumettre */
.submit-button {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    display: flex;
    align-items: center;
    cursor: pointer;
    border-radius: 5px;
}

/* Icônes */
.submit-button i, .prev-step i {
    margin-left: 8px;
}

/* Hover Effect */
.prev-step:hover {
    background-color: #e0e0e0;
}

.submit-button:hover {
    background-color: #0056b3;
}

    body {
        font-family: Arial, sans-serif;
        background-color: #F4F4F9;
        margin: 0;
        padding: 0;
    }
    /* Barre d'en-tête */
    .header-bar {
        background-color: #4CAF50;
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .steps-header {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    .step-indicator {
        padding: 10px 20px;
        margin: 0 5px;
        background-color: #ccc;
        color: #333;
        border-radius: 5px;
        cursor: default;
    }
    .step-indicator.active {
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
    }
    .styled-form {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-step {
        display: none; /* Par défaut, caché */
    }
    .form-step.active {
        display: block; /* Afficher l’étape courante */
    }
    .styled-form h3 {
        margin-top: 0;
    }
    .styled-form div {
        margin-bottom: 15px;
    }
    label {
        font-weight: bold;
        margin-bottom: 8px;
        display: inline-block;
        color: #555;
    }
    label i {
        margin-right: 10px;
        color: #4CAF50; /* Couleur des icônes */
        font-size: 18px; /* Taille des icônes */
    }
    input[type="text"],
    input[type="number"],
    input[type="date"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ddd;
        box-sizing: border-box;
    }
    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
        border-color: #4CAF50;
        outline: none;
    }
    .btn-next, .btn-prev, .btn-submit {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        margin: 5px 5px 0 0;
    }
    .btn-next:hover, .btn-prev:hover, .btn-submit:hover {
        background-color: #45A049;
    }
</style>
<script>
    // Fonction pour passer à l'étape suivante
    function nextStep(step) {
        showStep(step);
    }
    // Fonction pour revenir à l'étape précédente
    function previousStep(step) {
        showStep(step);
    }
    // Fonction pour afficher une étape spécifique
    function showStep(step) {
        // Cacher toutes les étapes
        document.querySelectorAll('.form-step').forEach(stepDiv => stepDiv.classList.remove('active'));
        document.getElementById('step-' + step).classList.add('active');
        // Mettre à jour les indicateurs d'étape
        document.querySelectorAll('.step-indicator').forEach(indicator => indicator.classList.remove('active'));
        document.getElementById('indicator-step-' + step).classList.add('active');
    }
    // Ajouter un écouteur d'événement sur chaque indicateur d'étape pour naviguer en cliquant
    document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            showStep(index + 1);
        });
    });
</script>
<style>
    /* Add your existing styles for form */
    .form-step {
        display: none;
    }

    .form-step.active {
        display: block;
    }

    .next-step, .prev-step {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .next-step:hover, .prev-step:hover {
        background-color: #45a049;
    }

    .next-step:active, .prev-step:active {
        background-color: #3e8e41;
    }
    /* Basic styling */
.form-step {
    display: none;
}

.form-step:first-of-type {
    display: block;
}

button {
    margin-top: 20px;
    padding: 10px;
}

button[type="submit"] {
    background-color: green;
    color: white;
}

button[type="button"] {
    background-color: #007bff;
    color: white;
}

    .logout-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
    }

    .logout-button:hover {
        background-color: darkred;
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentStep = 1;
        const totalSteps = 4;

        function showStep(step) {
            for (let i = 1; i <= totalSteps; i++) {
                const stepElement = document.getElementById(`step-${i}`);
                if (i === step) {
                    stepElement.classList.add('active');
                } else {
                    stepElement.classList.remove('active');
                }
            }
        }

        // Show the first step
        showStep(currentStep);

        // Next step button click
        document.querySelectorAll('.next-step').forEach(button => {
            button.addEventListener('click', function () {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });

        // Previous step button click
        document.querySelectorAll('.prev-step').forEach(button => {
            button.addEventListener('click', function () {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });
    });
</script>
<script>
    // JavaScript to handle navigation between steps
let currentStep = 1;
const steps = document.querySelectorAll('.form-step');
const nextButtons = document.querySelectorAll('.next-step');
const prevButtons = document.querySelectorAll('.prev-step');

nextButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (currentStep < steps.length) {
            steps[currentStep - 1].style.display = 'none';
            steps[currentStep].style.display = 'block';
            currentStep++;
        }
    });
});

prevButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (currentStep > 1) {
            steps[currentStep - 1].style.display = 'none';
            steps[currentStep - 2].style.display = 'block';
            currentStep--;
        }
    });
});

</script>
<style>
    fieldset {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    legend {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 500;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
        border-color: #4CAF50;
        outline: none;
        box-shadow: 0 0 8px rgba(76, 175, 80, 0.2);
    }

    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    button:active {
        background-color: #3e8e41;
    }

    textarea {
        resize: vertical;
    }
</style>

@endsection
