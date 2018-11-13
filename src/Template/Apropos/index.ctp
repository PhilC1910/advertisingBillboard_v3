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
    
    <p> Description du projet: En ajoutant un utilisateur avec le rôle d'agent de marketing, il doit avoir un courriel envoyer
        pour avoir un lien de confiramtion et un bouton le renvoyer s'il n'a pas confirmer son courriel. Il l'a possibilité de changer de langue 
        avec 3 choix au menu et de voir le changement d'une ligne parmi les 3 options. la page de la list des utilisateurs permet d'aller dans la list des billboards hired et les différents page. 
        la page de la liste du fichier permet de voir un image du invoice. 
    </p>
    
    
   
    <p> le shéma de la base de donnée 
      <?php  echo  $this->Html->image('schema_base_de_donnee.PNG', ['alt' => 'Schema base de donnnee'], ['width'=>"100"], ['height'=>"100"], ['align' => 'center']) ?>
   </p>
    <a href="http://www.databaseanswers.org/data_models/advertising_billboards/index.htm"> lien vers la bd originale </a>

</div>
