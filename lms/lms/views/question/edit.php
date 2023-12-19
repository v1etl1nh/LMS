<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Question</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h2>Edit Question</h2>
            <form action="index.php?controller=question&action=update" method="post">
                <input type="hidden" name="id" value="<?php echo $question['id']; ?>">
                <div class="form-group">
                    <label for="quiz_id">Quiz ID:</label>
                    <input type="text" class="form-control" id="quiz_id" name="quiz_id" value="<?php echo $question['quiz_id']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="question">Question:</label>
                    <textarea class="form-control" id="question" name="question" rows="4" required><?php echo $question['question']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Question</button>
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
