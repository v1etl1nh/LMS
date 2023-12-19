<!DOCTYPE html>
<html>
<head>
    <title>LMS is here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 class="text-center">Registered Course</h1>
        <div style="display: flex; width: 50%; flex-wrap: wrap;" class="d-flex justify-content-center align-items-center mt-5 mx-auto">
            <?php foreach ($course_user as $courseUser):?>
                <div class="card m-3" style="width: 220px;">
                    <a href=""><img src="https://png.pngtree.com/thumb_back/fh260/background/20210108/pngtree-simple-red-checkered-background-image_531695.jpg" class="" alt="" width="100%"></a>
                    <div class="card-body">
                        <a class="text-center text-decoration-none"><p class="card-text text-center"><?php  echo $courseUser['title'] ?></p></a>
                    </div>
                </div>
            <?php endforeach; ?>    
        </div>
    
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
