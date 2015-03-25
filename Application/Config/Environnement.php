<?php
/**
 * @var \Sohoa\Framework\Environnement $this ;
 */
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . "/../Entities"], $isDevMode);
$path = resolve(__DIR__ . '/../Database/Maestria-orm.db');
$conn = [
    'driver' => 'pdo_sqlite',
    'path' => $path,
];

$entityManager = EntityManager::create($conn, $config);
$container = \Application\Maestria\Container::getInstance();

$container->set('em', $entityManager);

return [];
