<?php

namespace Damin\Controller;

use Damin\DB;

class GameController extends MasterController {
    public function paint()
    {
        $this->render("paint", []);
    }
}