<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\Request;
use Abruno\Rubrica\Response;

interface ActionContract {

	function respond(Request $request): Response;

}