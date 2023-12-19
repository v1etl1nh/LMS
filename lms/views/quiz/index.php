<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz List</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php require_once 'lms/views/menus.php'; ?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="index.php?controller=quiz&action=create" class="btn btn-success">Thêm mới</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Lesson ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Update At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($quizzes)): ?>
                        <?php foreach ($quizzes as $row): ?>
                            <tr>
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <td><?php echo $row['lesson_id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['updated_at']; ?></td> 
                                <td>
                                    <a href="index.php?controller=quiz&action=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <a href="#" onclick="confirmXoa(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Không có dữ liệu</td> 
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmXoa(id) {
        var xacNhan = confirm("Bạn có chắc chắn muốn xóa không?");
        if (xacNhan) {
            window.location.href = "index.php?controller=quiz&action=delete&id="+id;
        }
    }
</script>
</body>
</html>
