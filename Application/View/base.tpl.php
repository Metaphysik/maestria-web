<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Maestria</title>
    <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/maestria.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8"/>
</head>
<body>
<header>
    Evaluation multicritère graphisée
    <?php if (isset($userIsLogin) and $userIsLogin === true) { ?>
        <div id="logzone">
            <?php
            /**
             * @var $user \Application\Entities\User
             */

            ?>
            <div class="login"><?php echo $user->getRealName(); ?></div>
            <div class="logout"><a href="<?php echo $this->route->unroute('mainlogout'); ?>">DECONNEXION</a></div>
        </div>
    <?php } else { ?>
        <div id="logzone">
            <div class="logout"><a href="<?php echo $this->route->unroute('mainlogin'); ?>">CONNEXION</a></div>
        </div>
    <?php } ?>
</header>
<nav>
    <a href="/" class="logo"><img src="/img/maestria.jpg" alt="logo maestria"/></a>


    <?php if (isset($user) === true && ($user->getIsProfessor() === true || $user->getIsModerator() === true || $user->getIsAdmin() === true)) { ?>

        <h3><a href="<?php echo $this->route->unroute('mainindex'); ?>">EVALUER</a></h3>
        <h3 class="synthese"><a href="<?= $this->route->unroute('indexUiaSynthese'); ?>">SYNTHESE</a></h3>
        <h3 class="eval"><a href="<?= $this->route->unroute('indexUiaCorrection'); ?>"> CORRECTION</a></h3>
        <br />


        <?php if (isset($user) === true && ($user->getIsAdmin() === true || $user->getIsModerator() === true || $user->getIsProfessor())) { ?>
            <h3><a href="/evaluation/">EVALUATIONS</a></h3>
            <?php
            /**
             * @var $selected_evaluation \Application\Entities\Evaluation
             */

            if (isset($selected_evaluation) === true) {
                if (is_object($selected_evaluation)) {
                    echo '<h3 id="evalchx" class="eval">' . $selected_evaluation->getTitle() . '</h3>';
                }
            }
            if (isset($selected_evaluation) === true and is_object($selected_evaluation)) {
                ?>
                <div class="flechebas"></div>
                <h3 class="eval"><a href="<?= $this->route->unroute('editUiaEvaluation',
                        ['evaluation_id' => $selected_evaluation->getId()]); ?>"> EDITION</a></h3>

            <?php } ?>
        <?php } ?>
        <h3><a href="<?php echo $this->route->unroute('indexUiaClassroom'); ?>">CLASSES</a></h3>
    <?php } ?>

    <?php if (isset($user) === true && $user->getIsAdmin() === true) { ?>
        <h3><a href="<?php echo $this->route->unroute('indexUiaItem'); ?>">ITEMS PEDA</a></h3>

    <?php } ?>
    <!--        <footer>-->
    <!--            <a href="http://metaphysik.fr/manuel/projet.php#contact">Contact</a>|-->
    <!--            <a href="metaphysik.fr">Metaphysik</a>-->
    <!--        </footer>-->
</nav>
<div class="container">
    <?php $this->block('popup');
    if (isset($evaluations) and isset($user)) {
        ?>
        <section id="popup">
            <section id="inpopup">
                <section class="titre eval">
                    <div class="awsm exit"><i class="fa fa-close"></i></div>
                    <h3>Choix de l'évaluation</h3>
                </section>

                <section class="contenu itemchx">
                    <h1>Mes Evaluations</h1>
                    <?php
                    /**
                     * @var $user \Application\Entities\User
                     * @var $evaluations Array
                     * @var $evaluation \Application\Entities\Evaluation
                     */

                    $eval = function ($evaluation) {
                        return '<a href="' . $this->route->unroute('showUiaEvaluation',
                            ['evaluation_id' => $evaluation->getId()]) . '" data-ideval="' . $evaluation->getId() . '"><h6>' . $evaluation->getTitle() .
                        '</h6></a>';
                    };

                    foreach ($evaluations as $evaluation) {
                        if ($evaluation->getRefuser() === $user->getId()) {
                            echo $eval($evaluation);
                        }
                    }
                    ?>
                    <h1>Evaluations</h1>
                    <?php
                    foreach ($evaluations as $evaluation) {
                        if ($evaluation->getRefuser() !== $user->getId()) {
                            echo $eval($evaluation);
                        }
                    }

                    ?>
                </section>
            </section>
        </section>
        <?php
    }
    $this->endBlock() ?>
    <?php $this->block('container'); ?>
    <?php $this->endBlock() ?>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="/js/app.js?<?= time(); ?>"></script>
<?php $this->block('js:script'); ?>
<?php $this->endBlock(); ?>
</body>
</html>