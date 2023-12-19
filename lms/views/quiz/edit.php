<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h2>Edit Quiz</h2>
            <form action="index.php?controller=quiz&action=update" method="post">
                <input type="hidden" name="id" value="<?php echo $quiz['id']; ?>">
                <div class="form-group">
                    <label for="lesson_id">Lesson ID:</label>
                    <select class="form-control" id="lesson_id" name="lesson_id" required>
                        <?php foreach ($lessons as $lesson): ?>
                            <option value="<?php echo $quiz['lesson_id']; ?>">
                                <?php echo $lesson['id']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $quiz['title']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Quiz</button>
            </form>
        </div>
    </div>
</main>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
