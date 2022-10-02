<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{



    public function create(ContactRequest $request)
    {
        $validated = $request->validated();
        $contactService = new ContactService($validated);

        $contactRespone = $contactService->createOrUpdate();

        return response()->json($contactRespone);
    }
}
