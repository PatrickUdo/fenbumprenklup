<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

use function Laravel\Prompts\text;

class SendTestMail extends Command
{
    protected $signature = 'mail:test {email? : Het e-mailadres dat de testmail ontvangt}';

    protected $description = 'Stuur een testmail om de mailinstellingen te controleren';

    public function handle(): int
    {
        $email = $this->argument('email') ?? text(
            label: 'Naar welk e-mailadres moet de testmail?',
            placeholder: 'naam@voorbeeld.nl',
            required: true,
            validate: fn (string $value) => $this->invalid($value) ? 'Vul een geldig e-mailadres in.' : null,
        );

        if ($this->invalid($email)) {
            $this->components->error("\"{$email}\" is geen geldig e-mailadres.");

            return self::FAILURE;
        }

        $mailer = config('mail.default');
        $this->components->twoColumnDetail('Mailer', $mailer);
        $this->components->twoColumnDetail('Server', config("mail.mailers.{$mailer}.host", '-').':'.config("mail.mailers.{$mailer}.port", '-'));
        $this->components->twoColumnDetail('Afzender', config('mail.from.address'));

        try {
            Mail::raw($this->body(), function ($message) use ($email) {
                $message->to($email)->subject('Testmail van '.config('app.name'));
            });
        } catch (Throwable $e) {
            $this->components->error('Versturen mislukt: '.$e->getMessage());

            return self::FAILURE;
        }

        $this->components->info("Testmail verstuurd naar {$email}.");

        return self::SUCCESS;
    }

    private function invalid(string $email): bool
    {
        return Validator::make(['email' => $email], ['email' => 'required|email'])->fails();
    }

    private function body(): string
    {
        return implode("\n", [
            'Dit is een testmail van '.config('app.name').'.',
            '',
            'Komt deze mail aan, dan werken de mailinstellingen.',
            '',
            'Omgeving: '.app()->environment(),
            'URL: '.config('app.url'),
            'Mailer: '.config('mail.default'),
            'Verstuurd: '.now()->format('d-m-Y H:i:s'),
        ]);
    }
}
