<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="error">
        <section id="titre">
            <h1>ERROR 404</h1>
        </section>
        <section id="contenu">
            <p><?php echo $message; ?></p>
        </section>
    </section>
<?php
$this->endblock();