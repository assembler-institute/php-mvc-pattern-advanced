<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    if (EXECUTION_FLOW)
        echo "<p>Create view</p>";

    require VIEWS . '/header.php';
    ?>

    <div id="main">
        <h1 class="center">Create new content</h1>

        <form action="<?php echo BASE_URL ?>content/create" method="POST">
            <p>
                <label for="name">Name</label><br>
                <input type="text" name="name" id="" required>
            </p>
            <p>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="" required>
            </p>
            <p>
                <label for="text">Text</label><br>
                <textarea name="text" cols="40" rows="5" required></textarea>
            </p>
            <p>
                <input type="submit" value="Create">
            </p>
        </form>

        <div class="center"><?php echo $this->message; ?></div>

    </div>

    <?php
    require VIEWS . '/footer.php';
    ?>
</body>

</html>