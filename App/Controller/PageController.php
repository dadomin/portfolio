<?php

namespace Damin\Controller;

use Damin\DB;

class PageController extends MasterController {
    public function games()
    {
        $this->render("games", []);
    }
}