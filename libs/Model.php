<?php
class Model
{
    function __construct()
    {
        if (EXECUTION_FLOW)
            echo '<p>Base model class</p>';

        $this->db = new Database();
    }
}
