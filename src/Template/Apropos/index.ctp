<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view large-9 medium-8 columns content">
    <h3> À propos de  advertising billboard</h3>
    
    <p>philippe chevry</p>
   
    <p>le titre du cours est 420-5b7 MO Aplication Internet</p>
    
    <p> Automne 2018, College Montmorency</p>
    
    <p> Description du projet:en cliquant sur le menu de autocomplete, on peut voir le billboards detail dans la base de donnée. La liste déroulante est supposée donnée les donner du hiring party détail.
        L'API REST  envois a la table du billboard pour supprimer,modifier et ajouter dans la table. il est supppoé avoir un coverage de test dans un lien dans la page a propos. il y a un routage admin et le bootstap est dans la même table.
        il est aussi sensé avoir un document pdf sur le la view du billboard hired dans le dossier Admin.
        
    </p>
    
    
   
    <p> le shéma de la base de donnée 
      <?php  echo  $this->Html->image('schema_base_de_donnee.PNG', ['alt' => 'Schema base de donnnee'], ['width'=>"100"], ['height'=>"100"], ['align' => 'center']) ?>
   </p>
    <a href="http://www.databaseanswers.org/data_models/advertising_billboards/index.htm"> lien vers la bd originale </a>
     <p> le github est https://github.com/PhilC1910/advertisingBillboard_v3.git</p>
</div>
