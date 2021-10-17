<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter {

    public function __construct(protected ApiClient $client) {

    }

    public function subscribe(string $email, string $listId = null) {
        // '??=' is the NULL-safe assignment operater
        $listId ??= config('services.mailchimp.lists.subscribers');
        return $this->client->lists->addListMember($listId, [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }
}

/*
    // Other methods
    $response = $mailchimp->lists->getAllLists();
    $response = $mailchimp->lists->getList($listId);
    $response = $mailchimp->lists->getListMembersInfo($listId);
    $response = $mailchimp->lists->deleteList($listId);
*/
