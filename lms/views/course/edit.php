<!DOCTYPE html>
<html>
<head>
    <title>Edit course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <h1 class="text-center">Edit course</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
            <form method="post" action="index.php?controller=course&action=update" class = "m-5 mt-2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label class="input-group-text" for="title">Title:</label>
                <input class="form-control" type="text" name="title" id="title" value="<?php echo $tit; ?>" required>

                <label class="input-group-text" for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" required><?php echo $des; ?></textarea>

                <input class="btn btn-success" type="submit" value="Update">
            </form>
            </div>
        </div>
    </div>

</body>
</html>
