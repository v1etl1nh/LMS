<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 class="text-center">Course List</h1>

    <a class="btn btn-success m-5 mt-2 mb-2" href="index.php?controller=Course&action=create">Create Course</a>

    <div class="row container-fluid m-5 mt-2">
        <div class="col-sm">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $course['title']; ?></td>
                    <td><?php echo $course['description']; ?></td>
                    <td>
                        <a href="index.php?controller=course&action=edit&id=<?php echo $course['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="index.php?controller=course&action=delete&id=<?php echo $course['id']; ?>" onclick="confirmDelete(<?php echo $course['id']; ?>)"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
        </div>
    </div>

    <script>
    </script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function confirmDelete(courseId) {
            var confirmDelete = confirm("Bạn có muốn xóa không?");
            if (!confirmDelete) {
            // Nếu người dùng chọn "Hủy", hủy sự kiện mặc định của thẻ <a>
            event.preventDefault();
            }
        }
    </script>
</html>
