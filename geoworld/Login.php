<?php
session_start();
/**
 * L'inclusion de ce script déclenche la connexion à la base de données
 *
 * PHP version 7
 *
 * @category  Connexion_DB
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?>

<?php require_once 'header.php'; ?>
<html>

<form action="Session.php" method="post">
    <table>
        <tr>
            <td> Votre Login :<input type="text" name="login"> </td>
        </tr>
        <tr>
            <td> Votre Password :<input type="password" name="pwd"> </td>
        </tr>
    </table>
    <input type=submit >
</form>

</html>
