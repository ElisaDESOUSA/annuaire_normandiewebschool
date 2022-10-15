<?php 
    require_once('home.php');
    require_once('header.php');
?>

<div class="wrapper">
    <h1>Ajout d'un nouvel étudiant</h1>
    <form action="post">
        <div class="form_input">
            <label for="">Prénom</label>
            <input type="text" placeholder="Renseignez un prénom">
        </div>
        <div class="form_input">
            <label for="">Nom</label>
            <input type="text" placeholder="Renseignez un nom">
        </div>
        <div class="form_input">
            <label for="">Email</label>
            <input type="email" placeholder="Renseignez une adresse email">
        </div>
        <div class="form_input">
            <label for="" >Téléphone</label>
            <input type="text" placeholder="Renseignez un numéro de téléphone">
        </div>
        <div class="form_input">
            <label for="">Année</label>
            <select name="" id="">
                <option value="">Choissiez une année</option>
                <option value="">Année 1 - Initial</option>
                <option value="">Année 1 - Alternance</option>
                <option value="">Année 2 - Initial</option>
                <option value="">Année 2 - Alternance</option>
                <option value="">Année 3 - Alternance</option>
                <option value="">Non renseigné</option>
            </select>
        </div>
        <div class="form_input">
            <label for="">Spécialité souhaitée</label>
            <select name="" id="">
                <option value="">Choissiez une spécialité</option>
                <option value="">Marketing</option>
                <option value="">Développement web</option>
                <option value="">Communication graphique</option>
                <option value="">Social media manager</option>
                <option value="">Non renseigné</option>
            </select>
        </div>
        <div class="contact_submit">
            <button type="submit" class="button button_green" id="submit" name="submit">Créer un nouvel étudiant</button>
        </div>
    </form>
</div>
