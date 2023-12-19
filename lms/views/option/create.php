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
            <form action="index.php?controller=option&action=store" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="question_id">Question ID:</label>
                    <select class="form-control" id="question_id" name="question_id" required>
                        <?php foreach ($questions as $question): ?>
                            <option value="<?php echo $question['id'].'-'.$question['question']; ?>">
                            <?php echo $question['id'].'-'.$question['question']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
    <label for="option_A">Option A:</label>
    <input type="text" class="form-control" id="option_A" name="option_A" required>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="is_correct_A" name="is_correct_A" onchange="updateCheckboxes(this)">
        <label class="form-check-label" for="is_correct_A">Is Correct</label>
    </div>
</div>

<div class="form-group">
    <label for="option_B">Option B:</label>
    <input type="text" class="form-control" id="option_B" name="option_B" required>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="is_correct_B" name="is_correct_B" onchange="updateCheckboxes(this)">
        <label class="form-check-label" for="is_correct_B">Is Correct</label>
    </div>
</div>

<div class="form-group">
    <label for="option_C">Option C:</label>
    <input type="text" class="form-control" id="option_C" name="option_C" required>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="is_correct_C" name="is_correct_C" onchange="updateCheckboxes(this)">
        <label class="form-check-label" for="is_correct_C">Is Correct</label>
    </div>
</div>

<div class="form-group">
    <label for="option_D">Option D:</label>
    <input type="text" class="form-control" id="option_D" name="option_D" required>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="is_correct_D" name="is_correct_D" onchange="updateCheckboxes(this)">
        <label class="form-check-label" for="is_correct_D">Is Correct</label>
    </div>
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

<script>
    function updateCheckboxes(checkbox) {
        if (checkbox.checked) {
            var checkboxes = ['A', 'B', 'C', 'D'];
            for (var i = 0; i < checkboxes.length; i++) {
                var checkboxId = 'is_correct_' + checkboxes[i];
                if (checkboxId !== checkbox.id) {
                    document.getElementById(checkboxId).disabled = true;
                }
            }
        } else {
            var checkboxes = ['A', 'B', 'C', 'D'];
            for (var i = 0; i < checkboxes.length; i++) {
                var checkboxId = 'is_correct_' + checkboxes[i];
                document.getElementById(checkboxId).disabled = false;
            }
        }
    }

    function validateForm() {
        var checkboxes = ['A', 'B', 'C', 'D'];
        for (var i = 0; i < checkboxes.length; i++) {
            var checkboxId = 'is_correct_' + checkboxes[i];
            if (document.getElementById(checkboxId).checked) {
                return true;
                break;
            }
        }
        alert("Vui lòng chọn một đáp án đúng.");
        return false;
    }
</script>

</body>
</html>
