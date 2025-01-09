<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\RedirectResponse;
use Abruno\Rubrica\Request;
use Abruno\Rubrica\Response;
use Abruno\Rubrica\App;
use Abruno\Rubrica\repository\RepositoryContract;
use Abruno\Rubrica\entity\Contact;

class ProcessForm implements ActionContract{

    public function respond(Request $request): Response{

        $repository =  App::getService(RepositoryContract::class);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->surname = $request->lastname;
        $contact->email = $request->email;
        
        $repository->save($contact);
    
        return new RedirectResponse("/");
    }

}