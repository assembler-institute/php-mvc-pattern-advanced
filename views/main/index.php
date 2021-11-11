    <?php 
    if(EXECUTION_FLOW)
    echo "<p>Main view</p>";

    require VIEWS . '/header.php';
    ?>
    <div id="main">
        <h1 class="center">Welcome to the Advanced MVC</h1>
    </div>
    <?php
        require VIEWS . '/footer.php';
    ?>