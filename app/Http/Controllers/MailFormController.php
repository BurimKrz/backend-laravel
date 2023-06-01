<?php

namespace App\Http\Controllers;

use App\Models\userCompany;
use App\Services\MailService;


class MailFormController extends Controller
{
    private MailService $mailService;

    public function __construct(MailService $mailService){
        $this->mailService = $mailService;
    }
    public function mailForm(MailService $mailService, $id)
    {
        return response()->json($this->mailService->mail($id));
    }
}
