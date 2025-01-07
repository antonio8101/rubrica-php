<?php

namespace Abruno\Rubrica\pages;

use Abruno\Rubrica\Response;

interface ActionContract {

	function respond(): Response;

}