<?php

namespace Laravel\Telegram\Console\Commands;

use Illuminate\Console\Command;

class TelegramWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:webhook {bot? : The bot name}
                {--s|setup : Setup the webhook}
                {--r|remove : Remove the webhook}
                {--i|info : Get information about your webhook}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handle the webhook for the bot.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('setup')) {
            $this->setupWebhook();
        }

        if ($this->option('remove')) {
            $this->removeWebhook();
        }

        if ($this->option('info')) {
            $this->getWebhookInfo();
        }
    }

    /**
     * Setup Webhook.
     */
    protected function setupWebhook()
    {

    }

    /**
     * Remove Webhook.
     */
    protected function removeWebhook()
    {

    }

    /**
     * Get Webhook info.
     */
    protected function getWebhookInfo()
    {

    }
}
