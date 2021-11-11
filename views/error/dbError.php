<?php 
    if(EXECUTION_FLOW)
    echo "<p>Database Error view</p>";

    require VIEWS . '/header.php';
    ?>
    <div id="main">
        <h1 class="center">Database error</h1>
    </div>
    <?php
        require VIEWS . '/footer.php';
    ?>