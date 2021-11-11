<?php

//Set TRUE if you want to show the execution flow anyways
$manualMode = true;

//SHOW EXECUTION FLOW
$executionFlow;
if ($manualMode) {
    $executionFlow = true;
} else {
    if (isset($_GET['execution_flow']) && $_GET['execution_flow'] == 'true') {
        $executionFlow = true;
    } else {
        $executionFlow = false;
    }
}
define("EXECUTION_FLOW", $executionFlow);
