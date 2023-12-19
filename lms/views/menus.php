<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end align-items-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">LMS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=user&action=index">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=course&action=index">Course</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=lesson&action=index">Lesson</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=material&action=index">Material</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=option&action=index">Option</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=question&action=index">Question</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=quiz&action=index">Quiz</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome, <?php echo 'admin'?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=auth&action=logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
