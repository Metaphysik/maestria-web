<?php
/**
 * Created by PhpStorm.
 * User: Camael24
 * Date: 16/01/14
 * Time: 17:22
 */
namespace Application\Bin\Command\Sqlite {

    class Migrate extends \Hoa\Console\Dispatcher\Kit
    {

        /**
         * Options description.
         *
         * @var \Hoa\Core\Bin\Welcome array
         */
        protected $options = [
            ['help', \Hoa\Console\GetOption::NO_ARGUMENT, 'h'],
            ['help', \Hoa\Console\GetOption::NO_ARGUMENT, '?'],
        ];

        protected $maxEleve = 5;
        protected $maxQuestion = 5;
        protected $defaultPassword = 'sample';

        /**
         * The entry method.
         *
         * @access  public
         * @return  int
         */
        public function main()
        {

            $command = null;

            while (false !== $c = $this->getOption($v)) {
                switch ($c) {

                    case 'h':
                    case '?':
                        return $this->usage();
                        break;
                }
            }

            var_dump(resolve('hoa://Application'));

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
            echo '   Sqlite:Migrate ' . "\n\n";

            echo $this->stylize('Options:', 'h1'), "\n";
            echo $this->makeUsageOptionsList([
                'help' => 'This help.'
            ]);

            return;
        }
    }
}

__halt_compiler();
Sample command
