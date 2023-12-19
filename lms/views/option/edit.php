<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Option</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h2>Edit Option</h2>
            <form action="index.php?controller=option&action=update" method="post" onsubmit="return validateForm()">                
                <div class="form-group">
                    <label for="question_id">Question ID:</label>
                    <input type="text" class="form-control" id="question_id" name="question_id" value="<?php echo $question['id'].'-'.$question['question'];?>" required>
                </div>

                <?php foreach ($optionswithquestion as $key => $value): ?>
                <input type="hidden" name="id_<?php echo $key;?>" value="<?php echo $value['id']; ?>">
                <div class="form-group">
                    <label for="option_<?php echo $key;?>">Option <?php echo $key?>:</label>
                    <input type="text" class="form-control" id="option_<?php echo $key;?>" name="option_<?php echo $key;?>" value="<?php echo $value['option'];?>" required>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_correct_<?php echo $key;?>" name="is_correct_<?php echo $key;?>" <?php echo $value['is_correct']?'checked':'';?> onchange="updateCheckboxes(this)">
                        <label class="form-check-label" for="is_correct_<?php echo $key;?>">Is Correct</label>
                    </div>
                </div>
                <?php endforeach; ?>

                <button type="submit" class="btn btn-primary">Update Option</button>
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