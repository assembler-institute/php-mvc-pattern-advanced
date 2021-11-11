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
        echo "<p>Detail view</p>";

    require VIEWS . '/header.php';
    ?>

    <div id="main">
        <h1 class="center">Content detail</h1>

        <form action="<?php echo BASE_URL ?>content/update" method="POST">
            <p>
                <input type="hidden" name="id" value="<?php echo $this->content->id; ?>" required>
            </p>
            <p>
                <label for="name">Name</label><br>
                <input type="text" name="name" value="<?php echo $this->content->name; ?>" required>
            </p>
            <p>
                <label for="email">Email</label><br>
                <input type="email" name="email" value="<?php echo $this->content->email; ?>" required>
            </p>
            <p>
                <label for="text">Text</label><br>
                <textarea name="text" cols="40" rows="5" required><?php echo $this->content->text; ?></textarea>
            </p>
            <p>
                <input type="submit" value="Update">
                <a href="<?php echo BASE_URL ?>content/consult" class="btn">Back</a>

            </p>
        </form>

        <div class="center"><?php echo $this->message; ?></div>

    </div>

    <?php
    require VIEWS . '/footer.php';
    ?>
</body>

</html>