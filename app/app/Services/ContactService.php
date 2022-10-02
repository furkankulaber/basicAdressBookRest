<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\ContactInformation;

class ContactService
{
    private array $contactRequest;

    /**
     * @param array $contactRequest
     */
    public function __construct(array $contactRequest)
    {
        $this->contactRequest = $contactRequest;
    }


    public function createOrUpdate(): array
    {
        $contact = new Contact();
        $contact->firstName = $this->contactRequest['firstName'];
        $contact->lastName = $this->contactRequest['firstName'];
        $contact->company = $this->contactRequest['company'] ?? null;
        $contact->photo = $this->contactRequest['photo'] ?? null;
        $contact->save();

        foreach ($this->contactRequest['detail'] as $key => $value) {
            $contactInfo = new ContactInformation();
            $contactInfo->type = $key;
            $contactInfo->value = $value;
            $contact->detail()->save($contactInfo);
        }

        return $this->contactObject($contact);
    }


    private function contactObject(Contact $contact): array
    {
        $response = $contact->toArray();

        /** @var ContactInformation $variable */
        foreach ($contact->detail as $variable) {
            $response['detail'][$variable->type] = $variable->value;
        }

        return $response;
    }


}
