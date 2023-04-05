<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Mailjet\Resources;

trait MailTools
{
    use ApiResponser;

    public function sendPaymentReminderMail($reminder)
    {
        $user = Auth::user();
        //Payment mail
        $data = [
            'template' => Config::get('mail.templates.paymentDetails.id'),
            'subject' => Config::get('mail.templates.paymentDetails.subject'),
            'to_email' => $user->email,
            'contact_name' => $user->name,
            'contact_surname' => $user->surname_1.' '.$user->surname_2,
            'contact_email' => $user->email,
            'link' => Config::get('app.url').Config::get('app.activation').'/'.$reminder->token,
            'licence' => $reminder->licence_type,
            'token' => $reminder->token,
            'host' => Config::get('app.url'),
        ];

        $this->sendMail($data);
    }

    public function sendMail($data)
    {
        try {
            $mj = new \Mailjet\Client(
                Config::get('services.mailjet.key'),
                Config::get('services.mailjet.secret'),
                true,
                ['version' => 'v3.1']
            );

            // Define your request body
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => Config::get('mail.from.address'),
                            'Name' => Config::get('mail.from.name'),
                        ],
                        'To' => [
                            [
                                'Email' => $data['to_email'],
                            ],
                        ],
                        'TemplateID' => $data['template'],
                        'TemplateLanguage' => true,
                        'Subject' => $data['subject'],
                        'Variables' => $data,
                    ],
                ],
            ];

            $response = $mj->post(Resources::$Email, ['body' => $body]);
            Log::info($response->getStatus().' -- Sent Mail response');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
