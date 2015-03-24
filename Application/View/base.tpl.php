<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Maestria</title>
    <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/maestria.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8"/>
</head>
<body>
<header>
    <a href="index.html">Maestria</a> Evaluer c'est connaître et comprendre c'est progresser
    <?php if(isset($userIsLogin) and $userIsLogin === true) { ?>
        <div id="logzone">
            <?php
            /**
             * @var $user \Application\Entities\User
             */

            ?>
            <div class="login"><?php echo $user->getRealName(); ?></div>
            <div class="logout"><a href="<?php echo $this->route->unroute('mainlogout'); ?>">DECONNEXION</a></div>
        </div>
    <?php } ?>
</header>
<nav>

    <h3><a href="classes.html">CLASSES</a></h3>

    <h3 class="synthese"><a href="synthese.html">SYNTHESE</a></h3>
    <br/>

    <h3><a href="evals.html">EVALUATIONS</a></h3>

    <h3 id="evalchx" class="eval">PUISSANCE</h3>

    <div class="flechebas"></div>
    <h3 class="eval"><a href="correction.html">CORRECTION</a></h3>
    <br/>

    <h3><a href="items.html">ITEMS PEDA</a></h3>

    <footer>
        <a href="">Contact</a>
        <a href="http://metaphysik.fr">Metaphysik</a>
    </footer>
</nav>
<section id="popup">
    <section id="inpopup">

    </section>
</section>
<?php $this->block('container'); ?>
<?php $this->endBlock() ?>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="/js/maestria.js"></script>
<script>


</script>
</body>
</html>