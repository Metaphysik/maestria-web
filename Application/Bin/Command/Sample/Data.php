<?php
/**
 * Created by PhpStorm.
 * User: Camael24
 * Date: 16/01/14
 * Time: 17:22
 */
namespace Application\Bin\Command\Sample;


use Application\Model\Uia;
use Application\Model\User;

class Data extends \Hoa\Console\Dispatcher\Kit
{

    /**
     * Options description.
     *
     * @var \Hoa\Core\Bin\Welcome array
     */
    protected $options = [
        ['help', \Hoa\Console\GetOption::NO_ARGUMENT, 'h'],
        ['help', \Hoa\Console\GetOption::NO_ARGUMENT, '?'],
        ['test', \Hoa\Console\GetOption::NO_ARGUMENT, 't'],
    ];

    /**
     * The entry method.
     *
     * @access  public
     * @return  int
     */
    public function main()
    {
        require 'hoa://Application/Config/Environnement.php';

        $this->hydrateUia();
        $this->hydrateUser();
    }


    public function hydrateUia()
    {

        $model = new Uia();

        $model->insert('demo', 'Lycée de la démologie', '1 Place du Mont Blanc', 'Sarlat la Canéda', 'Dordogne',
            'Aquitaine', 'Mr Toupasbo', 'https://gmkfreelogos.com/logos/I/img/Its__Demo.gif');

        $model->insert('caraminot', 'Lycée Professionnel Pierre Caraminot', '15 Avenue du paradis', 'Egletons',
            'Correze', 'Limousin', 'Mr Vraimentbobo', 'https://gmkfreelogos.com/logos/I/img/Its__Demo.gif');
    }

    public function hydrateUser()
    {
        $user = new User();

        $user->insert('demo', 'admin', 'admin@nowhere.com', sha1('admin'), 1, 1, 0, 'Admin Istrator', 0, time(), '', 2);
        $user->insert('demo', 'modo', 'modo@nowhere.com', sha1('modo'), 0, 1, 0, 'Maude Erator', 0, time(), '', 2);
        $user->insert('demo', 'prof', 'prof@nowhere.com', sha1('prof'), 0, 1, 0, 'Prof Essor', 0, time(), '', 2);

        $user->insert('caraminot', 'admin', 'admin@nowhere.com', sha1('admin'), 1, 1, 0, 'Admin Istrator', 0, time(), '', 2);
        $user->insert('caraminot', 'modo', 'modo@nowhere.com', sha1('modo'), 0, 1, 0, 'Maude Erator', 0, time(), '', 2);
        $user->insert('caraminot', 'prof', 'prof@nowhere.com', sha1('prof'), 0, 1, 0, 'Prof Essor', 0, time(), '', 2);
    }

    /**
     * The command usage.
     *
     * @access  public
     * @return  int
     */
    public function usage()
    {
        echo \Hoa\Console\Chrome\Text::colorize('Usage:', 'fg(yellow)') . "\n";
        echo '   Welcome ' . "\n\n";

        echo $this->stylize('Options:', 'h1'), "\n";
        echo $this->makeUsageOptionsList([
            'help' => 'This help.'
        ]);

        return;
    }
}

__halt_compiler();
Generate data
