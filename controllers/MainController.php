<?php
class MainController extends Controller{
    function __construct(){
        if(EXECUTION_FLOW)
        echo '<p>Main Controller</p>';

        parent::__construct();
        // It's calling to the lib/controller that create a View class from libs/view
        // because it's loaded already in the index.php (Router)
    }

    function render(){
        $this->view->render('main/index');
    }

    function hey(){
        echo "Hey!";
    }
}
?>