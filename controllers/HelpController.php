<?php
class HelpController extends Controller
{
    function __construct()
    {
        if (EXECUTION_FLOW)
            echo "<p>Help controller</p>";

        parent::__construct();
    }

    function defaultMethod()
    {
        $this->render();
    }

    function render()
    {
        $this->view->render('help/help');
    }
}
