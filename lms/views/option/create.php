<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Option</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h2>Create Option</h2>
            <form action="index.php?controller=option&action=store" method="post">
                <div class="form-group">
                    <label for="question_id">Question ID:</label>
                    <select class="form-control" id="question_id" name="question_id" required>
                        <?php foreach ($questions as $question): ?>
                            <option value="<?php echo $question['id']; ?>"><?php echo $question['id']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="option">Option:</label>
                    <input type="text" class="form-control" id="option" name="option" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_correct" name="is_correct">
                    <label class="form-check-label" for="is_correct">Is Correct</label>
                </div>
                <button type="submit" class="btn btn-primary">Create Option</button>
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
