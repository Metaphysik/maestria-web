<?php
require_once __DIR__ . '/Application/Config/Environnement.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);