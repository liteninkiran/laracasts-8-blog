<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter {

    public function subscribe(string $email, string $listId = null) {
        // '??=' is the NULL-safe assignment operater
        $listId ??= config('services.mailchimp.lists.subscribers');
        return $this->client()->lists->addListMember($listId, [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }

    public function client() {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5',
        ]);
    }
}

/*
    // Other methods
    $response = $mailchimp->lists->getAllLists();
    $response = $mailchimp->lists->getList($listId);
    $response = $mailchimp->lists->getListMembersInfo($listId);
*/
