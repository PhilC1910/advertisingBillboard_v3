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
    
    <p> Description du projet: en cliquant sur la liste liée c'est censé être en angularjs et finctionnel. 
        En allant sur l'api de billboards l'option pour ce login est supposé fonctionner avec l'option de captcha 
        en étant login tu peut changer de mot de passe ou logout. Tu peux selectionner un billboard details dans le search 
        et tu peux soit le modifier ou ajouter un autre. Tu peux voir tous les billboards dans la base de donnée 
        et tu peux soit l'éditer ou le supprimer. Il y a aussi l'option de drag and drop un image dans le lien des files du site.
        
    </p>
    
    <p> le shéma de la base de donnée 
      <?php  echo  $this->Html->image('schema_base_de_donnee.PNG', ['alt' => 'Schema base de donnnee'], ['width'=>"100"], ['height'=>"100"], ['align' => 'center']) ?>
   </p>
    <a href="http://www.databaseanswers.org/data_models/advertising_billboards/index.htm"> lien vers la bd originale </a>
     <p> le github est https://github.com/PhilC1910/advertisingBillboard_v3.git</p>
</div>
