<!DOCTYPE html>
<html>
<head>
    <title>Edit course</title>
</head>
<body>
    <h1>Edit course</h1>

    <form method="post" action="index.php?controller=course&action=update">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $tit; ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $des; ?></textarea>

        <input type="submit" value="Update">
    </form>
</body>
</html>
