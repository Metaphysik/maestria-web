<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="login">
        <section id="titre">
            <h1>CONNEXION</h1>
        </section>
        <section id="contenu">
            <form action="<?php echo $this->route->unroute('mainlogin'); ?>" method="post">
                <section><a href="<?php echo $this->route->unroute('mainregister'); ?>">Pas encore inscrit ?</a>

                    <div><label for="mail">ADRESSE MAIL</label><input name="mail" id="mail"
                                                                      placeholder="adressedAlbert@metaphysik.fr"
                                                                      value="admin@nowhere.com"></div>
                    <div><label for="mdp1">MOT DE PASSE</label><input name="mdp" id="mdp" type="password" value="admin">

                        <div><label for="send"></label><input type="submit" value="Connexion"/></div>

                        <br/>
                        <br/>
                        <a href="">Mot de passe perdu?</a> checkbox : Rester connecté
                </section>
            </form>


        </section>
    </section>
<?php
$this->endBlock();