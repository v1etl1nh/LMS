<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
</head>
<body>
    <h1>Create Course</h1>

    <form method="post" action="index.php?controller=course&action=store">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="content">Description:</label>
        <textarea name="description" id="content" required></textarea>

        <input type="submit" value="Create">
    </form>
</body>
</html>
