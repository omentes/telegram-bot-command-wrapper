<?php

declare(strict_types=1);

namespace TelegramBot\CommandWrapper\Command;

/**
 * Class CommandDirector
 * @package TelegramBot\CommandWrapper\Command
 */
class CommandDirector
{
    /**
     * CommandDirector constructor.
     *
     * @param CommandOptions $options
     */
    public function __construct(protected CommandOptions $options)
    {
    }

    /**
     * @return CommandOptions
     */
    public function getOptions(): CommandOptions
    {
        return $this->options;
    }

    /**
     * @return CommandInterface
     */
    public function makeService(): CommandInterface
    {
        return match($this->getOptions()->getCommand()) {
            default => $this->makeEmptyCommand($this->getOptions()),
        };
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeAlarmCommand(CommandOptions $options): CommandInterface
    {
        return (new AlarmService($options))->validate(new AlarmValidator());
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeCollectionCommand(CommandOptions $options): CommandInterface
    {
        return new CollectionService($options);
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeEmptyCommand(CommandOptions $options): CommandInterface
    {
        return new EmptyCallbackService($options);
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeSettingsCommand(CommandOptions $options): CommandInterface
    {
        return new SettingsService($options);
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeSettingsVoicesCommand(CommandOptions $options): CommandInterface
    {
        return new SettingsVoicesService($options);
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeSettingsSilentCommand(CommandOptions $options): CommandInterface
    {
        return new SettingsSilentService($options);
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeSettingsPriorityCommand(CommandOptions $options): CommandInterface
    {
        return new SettingsPriorityService($options);
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeDelCommand(CommandOptions $options): CommandInterface
    {
        return (new DelService($options))->validate(new DelProgressValidator());
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeExportCommand(CommandOptions $options): CommandInterface
    {
        return (new ExportService($options))->validate(new ExportValidator());
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeHelpCommand(CommandOptions $options): CommandInterface
    {
        return new HelpService($options);
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeProgressCommand(CommandOptions $options): CommandInterface
    {
        return new ProgressService($options);
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeResetCommand(CommandOptions $options): CommandInterface
    {
        return (new ResetService($options))->validate(new ResetProgressValidator());
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeTrainingCommand(CommandOptions $options): CommandInterface
    {
        return (new TrainingService($options));
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeTranslateTrainingCommand(CommandOptions $options): CommandInterface
    {
        return (new TranslateTrainingService($options));
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeStartCommand(CommandOptions $options): CommandInterface
    {
        return (new StartService($options));
    }

    /**
     * @param CommandOptions $options
     *
     * @return CommandInterface
     */
    private function makeTimeCommand(CommandOptions $options): CommandInterface
    {
        return (new TimeService($options));
    }
}
