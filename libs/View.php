<?php
class View{
    function __construct(){
        if(EXECUTION_FLOW)
        echo '<p>Base view class</p>';
    }

    function render($name){
        require VIEWS . '/' . $name . '.php';
    }
}
?>