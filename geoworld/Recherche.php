<?php require_once 'header.php'; ?>

<div class="ui container main">
    <?php
    require_once 'inc/manager-db.php';


    if (isset($_POST['pays'])) {
        $pays = $_POST['recherche'];
        $ville2 = cherchPays($pays);
    }

    ?>
    <h1>Recherche sur

        <?php

        if (isset($_POST['pays'])) {
            echo $pays;
        }
        ?>

    </h1>
    <div>
        <center>

    </div>
    <body>
    <center>
        <table style="text-align: center;" class="ui inverted grey large fixed single line celled table">

                <?php

            if (isset($_POST['pays'])) {
                ?>
                <tr>
                    <th>Pays</th>
                    <th>Surface</th>
                    <th>Population</th>
                    <th>Duree de vie</th>
                    <th>Capitale</th>

                </tr>
                <?php
            }

            ?>



            </tr>
        </table>
    </center>
</div>
</body>
<br>
<?php
require_once 'footer.php';
?>
