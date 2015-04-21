<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 * @var $profil \Application\Entities\User
 * @var $user \Application\Entities\User
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>

    <section id="corps" class="classes">
        <section id="titre">
            <h1>Edition</h1>
        </section>
        <section id="contenu">
            <form action="<?php echo $this->route->unroute('updateUiaUser', ['user_id' => $profil->getId()]); ?>"
                  method="post" enctype="application/x-www-form-urlencoded">
                <section>
                    <h4><?php echo $profil->getRealName(); ?></h4>
                    <div><label for="name">RealName : </label><input type="text" name="name" id="name" value="<?php echo $profil->getRealName(); ?>" /></div>
                    <div><label for="login">Login : </label><input type="text" name="login" id="login" value="<?php echo $profil->getLogin(); ?>" /></div>
                    <div><label for="email">Email : </label><input type="email" name="email" id="email" value="<?php echo $profil->getEmail(); ?>" /></div>
                    <div><label for="email">Birthdate : </label><input type="date" name="birthdate" id="birthdate" value="<?php echo date('H:i:s d/m/Y', $profil->getBirthdate()); ?>" /></div>
                </section>
                <section id="changepsswd">
                    <h4>Gestion des mots de passe</h4>
                    <div><label for="psswd">Nouveau Mot de passe : </label><input type="password" name="psswd" id="psswd"/></div>
                    <div><label for="cpsswd">Confirmation Mot de passe : </label><input type="password" name="cpsswd" id="cpsswd"/></div>
                </section>
                <section id="adminZone">
                    <h4>Gestion des droits</h4>
                    <div><label for="isAdmin">Administrator : </label><input type="checkbox" name="isAdmin" id="isAdmin" <?php echo ($profil->getIsAdmin() === true) ? 'checked' : ''; ?>/></div>
                    <div><label for="isModo">Moderator : </label><input type="checkbox" name="isModo" id="isModo" <?php echo ($profil->getIsModerator() === true) ? 'checked' : ''; ?>/></div>
                    <div><label for="isProf">Professor : </label><input type="checkbox" name="isProf" id="isProf" <?php echo ($profil->getIsProfessor() === true) ? 'checked' : ''; ?>/></div>
                    <div><label>Status :</label> <span><?php
                            switch($profil->getStatus())
                            {
                                case -1:
                                    echo 'Ban/Pending to trash';
                                    break;
                                case 0;
                                    echo 'Unactivate';
                                    break;
                                case 1;
                                    echo 'Pending activate';
                                    break;
                                case 2;
                                    echo 'Available';
                                    break;
                                default:
                                    echo '#ERROR CALL AN ADMINISTRATOR#';
                            }
                        ?></span></div>
                </section>
                <input type="submit" value="ENREGISTRER" />
            </form>
        </section>
    </section>
<?php
$this->endblock();
?>