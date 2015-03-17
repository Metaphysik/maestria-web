<?php
/**
 * @var \Sohoa\Framework\Environnement $this;
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../Entities"), $isDevMode);

$path = resolve(__DIR__ . '/../Database/Maestria-orm.db');

// database configuration parameters
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => $path,
);

$entityManager = EntityManager::create($conn, $config);

$container = \Application\Maestria\Container::getInstance();
$container->set('em', $entityManager);

return array();
