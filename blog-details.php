<?php 
include('include/connection.php'); // should expose $conn (mysqli)
include('include/functions.php');

$slug = $_GET['slug'] ?? '';
$sql = "SELECT id, title, image, description, detail, created_at
        FROM tbl_blogs 
        WHERE slug = ? AND status = 'Active' AND is_deleted = 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
  <!-- Loading -->
  <div id="loading" class="loader-wrapper theme-g-bg" style="position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;">
    <div class="center">
      <div class="d d1"></div>
      <div class="d d2"></div>
      <div class="d d3"></div>
      <div class="d d4"></div>
      <div class="d d5"></div>
    </div>
  </div>

  <!-- Header -->
  <header class="header header-01">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand p-1-l" href="index">
          <img src="static/img/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span></span><span></span><span></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarHeader">
          <ul class="navbar-nav ms-auto">
            <li><a class="nav-link active" href="login">My Account</a></li>
            <li><a class="nav-link" href="javascript:;">Help</a></li>
            <li><a class="nav-link-btn m-btn-white" href="purchase"><i class="fa fa-cart-plus"></i> BUY</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <!-- Banner -->
    
    <!-- Blog Detail -->
    <section class="section grey-bg " style="padding-top:180px;">
      <div class="">
        <div class="row justify-content-center">
          <div class="col-lg-8">

            <!-- Tag -->
           

            <!-- Title -->
            <h1 class="blog-header"><?= $blog['title'] ?></h1>

            <!-- Meta -->
            <div class="blog-meta d-flex align-items-center gap-3 flex-wrap">
              
              <span><i class="bi bi-calendar"></i> <?= date("d M Y", strtotime($blog['created_at'])) ?></span>
              
            </div>

            <!-- Featured Image -->
            <img src="static/img/blogs/<?= $blog['image'] ?>" alt="<?= $blog['title'] ?>" class="img-fluid blog-img">

            <!-- Content -->
            <div class="blog-content">
              <?= $blog['detail'] ?>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include('footer.php'); ?>

  <!-- Scripts -->
  <script src="static/js/jquery-3.2.1.min.js"></script>
  <script src="static/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .blog-header { font-size: 2rem; font-weight: 700; margin-bottom: 10px; }
    .blog-meta { font-size: 0.9rem; color: #777; margin-bottom: 20px; }
    .blog-meta i { margin-right: 5px; }
    .blog-img { border-radius: 10px; margin-bottom: 25px; max-height: 400px; object-fit: cover; }
    .blog-content p { line-height: 1.8; margin-bottom: 15px; }
  </style>
  <script>
    $(window).on('load', function () { $('#loading').fadeOut(200); });
  </script>
</body>
</html>
