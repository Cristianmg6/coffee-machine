<?php

namespace GetWith\CoffeeMachine\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeDrinkCommand extends Command
{
	protected static $defaultName              = 'app:order-drink';
	
	private const DRINK_TYPE_ARGUMENT_NAME                      = 'drink-type';
	private const DRINK_TYPE_ARGUMENT_DESCRIPTION               = 'The type of the drink. (Tea, Coffee or Chocolate)';
	private const MONEY_ARGUMENT_NAME                           = 'money';
	private const MONEY_ARGUMENT_DESCRIPTION                    = 'The amount of money given by the user';
	private const SUGARS_ARGUMENT_NAME                          = 'sugars';
	private const SUGAR_ARGUMENT_DESCRIPTION                    = 'The number of sugars you want. (0, 1, 2)';
	private const EXTRA_HOT_OPTION_NAME                         = 'extra-hot';
	private const EXTRA_HOT_OPTION_SHORTCUT                     = 'e';
	private const EXTRA_HOT_OPTION_DESCRIPTION 					= 'If the user wants to make the drink extra hot';

    public function __construct()
    {
        parent::__construct(MakeDrinkCommand::$defaultName);
    }


    protected function configure(): void
    {
        $this->addArgument(
			self::DRINK_TYPE_ARGUMENT_NAME,
			InputArgument::REQUIRED,
			self::DRINK_TYPE_ARGUMENT_DESCRIPTION
		);

        $this->addArgument(
			self::MONEY_ARGUMENT_NAME,
			InputArgument::REQUIRED,
			self::MONEY_ARGUMENT_DESCRIPTION
        );

        $this->addArgument(
			self::SUGARS_ARGUMENT_NAME,
			InputArgument::OPTIONAL,
			self::SUGAR_ARGUMENT_DESCRIPTION,
			0
        );

        $this->addOption(
			self::EXTRA_HOT_OPTION_NAME,
			self::EXTRA_HOT_OPTION_SHORTCUT,
			InputOption::VALUE_NONE,
			$description = self::EXTRA_HOT_OPTION_DESCRIPTION
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $drinkType = strtolower($input->getArgument(self::DRINK_TYPE_ARGUMENT_NAME));
		$money = $input->getArgument(self::MONEY_ARGUMENT_NAME);
		$sugars = $input->getArgument(self::SUGARS_ARGUMENT_NAME);
		$extraHot = $input->getOption(self::EXTRA_HOT_OPTION_NAME);
        if (!in_array($drinkType, ['tea', 'coffee', 'chocolate'])) {
            $output->writeln('The drink type should be tea, coffee or chocolate.');
        } else {
            /**
             * Tea       --> 0.4
             * Coffee    --> 0.5
             * Chocolate --> 0.6
             */
            switch ($drinkType) {
                case 'tea':
                    if ($money < 0.4) {
                        $output->writeln('The tea costs 0.4.');
                        return 0;
                    }
                    break;
                case 'coffee':
                    if ($money < 0.5) {
                        $output->writeln('The coffee costs 0.5.');
                        return 0;
                    }
                    break;
                case 'chocolate':
                    if ($money < 0.6) {
                        $output->writeln('The chocolate costs 0.6.');
                        return 0;
                    }
                    break;
            }

            $stick = false;
            if ($sugars >= 0 && $sugars <= 2) {
                $output->write('You have ordered a ' . $drinkType);
                if ($extraHot) {
                    $output->write(' extra hot');
                }

                if ($sugars > 0) {
                    $stick = true;
                    $output->write(' with ' . $sugars . ' sugars (stick included)');
                }
                $output->writeln('');
            } else {
                $output->writeln('The number of sugars should be between 0 and 2.');
            }
        }

        return 0;
    }
}
