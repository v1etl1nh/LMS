<!DOCTYPE html>
<html>
<head>
    <title>Create Lesson</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <h1 class="text-center">Create Lesson</h1>

    <div class="coitainer-fluid">
        <div class="row">
            <div class="col-sm">
                <form method="post" action="index.php?controller=lesson&action=store" class="m-5 mt-2">

                <label class="input-group-text" for="title">Course_ID:</label>
                <input class="form-control" type="text" name="course_id" id="" required>

                <label class="input-group-text" for="title">Title:</label>
                <input class="form-control" type="text" name="title" id="title" required>

                <label class="input-group-text" for="content">Description:</label>
                <textarea class="form-control" name="description" id="content" required></textarea>

                <input type="submit" value="Create" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

</body>
</html>