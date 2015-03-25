<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="error">
        <section id="titre">
            <h1>ERROR / EXCEPTION</h1>
        </section>
        <section id="contenu">
            <h3><?php echo $class; ?></h3>

            <p><?php echo $message; ?> in <?php echo $file; ?> at line <?php echo $line; ?></p>
        </section>
    </section>
<?php
$this->endblock();