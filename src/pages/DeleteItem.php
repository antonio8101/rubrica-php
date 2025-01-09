<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\RedirectResponse;
use Abruno\Rubrica\Request;
use Abruno\Rubrica\Response;
use Abruno\Rubrica\App;
use Abruno\Rubrica\repository\RepositoryContract;

class DeleteItem implements ActionContract{

    public function respond(Request $request): Response{

        $repository =  App::getService(RepositoryContract::class);

        $deleteId = $request->item;

        $repository->delete($deleteId);
    
        return new RedirectResponse("/");
    }

}