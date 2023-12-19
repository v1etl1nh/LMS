<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 class="text-center">Create Course</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
            <form method="post" action="index.php?controller=course&action=store"class = "m-5 mt-2">
                <label class="input-group-text" for="title">Title:</label>
                <input class="form-control" type="text" name="title" id="title" required>

                <label class="input-group-text" for="content">Description:</label>
                <textarea class="form-control" name="description" id="content" required></textarea>

                <input class="btn btn-success" type="submit" value="Create">
            </form>
            </div>
        </div>
    </div>

</body>
</html>