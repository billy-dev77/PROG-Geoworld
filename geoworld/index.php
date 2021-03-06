<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';
if (isset($_GET['continent'])) {
    $continent = $_GET['continent'];
    $desPays = getCountriesByContinent($continent);
    session_start();
}

else{
    $continent = 'Africa';
}
$desPays = getCountriesByContinent($continent);

?>

<main role="main" class="flex-shrink-0">

  <div class="container">
    <h1>Liste des pays d'<?php echo $continent ?></h1>
    <div>
     <table class="table">
         <tr>
             <th>Nom</th>
             <th>Population</th>
             <th>Continent</th>
             <th>Surface</th>
             <th>Durée de vie</th>
             <th>Capitale</th>
         </tr>
       <?php
       // $desPays est un tableau dont les éléments sont des objets représentant
       // des caractéristiques d'un pays (en relation avec les colonnes de la table Country)
       foreach ($desPays as $pays):

           $drap = drapeau($pays->Name);
           $drap = $str = strtolower($drap);

           ?>
          <tr>
              <td><i class="<?php echo $drap; ?> flag"></i> <?php echo $pays->Name ?></td>
              <td> <?php echo $pays->Population ?> habitants</td>
              <td> <?php echo $pays->Continent ?></td>
              <td> <?php echo $pays->SurfaceArea ?> km²</td>
              <td> <?php echo $pays->LifeExpectancy ?> ans</td>
              <td> <?php echo $pays->Capital ?></td>
          </tr>
         <?php endforeach; ?>
     </table>
    </div>
    <!-- <section class="jumbotron">
      <div class="container">
        <h1 class="jumbotron-heading">Tableau d'objets</h1>

        <p>La variable <b><code>$desPays</code></b> référence un tableau (<i>array</i>).
          Pour générer le code HTML (table), vous devrez coder une boucle,
          par exemple de type <b><code>foreach</code></b> sur l'ensembles des objets de ce tableau. </p>
        <p>Référez-vous à la structure des tables SQL pour connaître le nom des <b><code>attributs</code></b>.
          En effet, les objets du tableau ont pour attributs les noms des colonnes de la table interrogée par un requête SQL, via l'appel à la
          fonction <b><code>getCountriesByContinent</code></b> (du script <b><code>manager-db.php</code></b>.</p>
        <p>Par exemple <b><code>Name</code></b> est une des colonnes de la table <b><code>Country</code></b> de la base de données.</p>
          <p> Bonne programmation</p>
          <div class="alert alert-warning" role="alert">
            Cette section ne s'auto-détruit pas automatiquement, ce sera à vous de le faire, une fois compris son message !
          </div>
      </div>
    </section> -->
  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
