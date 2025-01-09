<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\RedirectResponse;
use Abruno\Rubrica\Request;
use Abruno\Rubrica\Response;
use Abruno\Rubrica\App;
use Abruno\Rubrica\repository\RepositoryContract;
use Abruno\Rubrica\entity\Contact;
use Abruno\Rubrica\UploadManagerContract;

class ProcessForm implements ActionContract{

    public function respond(Request $request): Response{

        $repository =  App::getService(RepositoryContract::class);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->surname = $request->lastname;
        $contact->email = $request->email;

		// USO IL SERVIZIO!!!
	    $uploadManager =  App::getService(UploadManagerContract::class);
	    $picture = $uploadManager->manage($request);
		$contact->picture = $picture;
        
        $repository->save($contact);
    
        return new RedirectResponse("/");
    }

}