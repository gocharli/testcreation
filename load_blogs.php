<?php
include('include/connection.php'); 
include('include/functions.php');

header('Content-Type: text/html; charset=utf-8');

$offset = isset($_POST['offset']) ? max(0, (int)$_POST['offset']) : 0;
$limit  = isset($_POST['limit'])  ? max(1, (int)$_POST['limit'])  : 6;
$order  = $_POST['order'] ?? 'desc';
$order  = ($order === 'asc') ? 'ASC' : 'DESC';

$sql = "SELECT id, title, image, description, created_at, slug
        FROM tbl_blogs
        WHERE status = 'Active' 
          AND is_deleted = 0
        ORDER BY created_at $order
        LIMIT ?, ?";

$stmt = $conn->prepare($sql);
if (!$stmt) { exit; }
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()):
  $title = htmlspecialchars((string)($row['title'] ?? ''), ENT_QUOTES, 'UTF-8');
  $slug  = htmlspecialchars((string)($row['slug'] ?? ''), ENT_QUOTES, 'UTF-8');
  $imagePath = 'static/img/blogs/' . htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8');
$img = (!empty($row['image']) && file_exists($imagePath)) 
    ? $imagePath 
    : 'static/img/blog-placeholder.jpg';
  $desc  = htmlspecialchars(mb_strimwidth((string)($row['description'] ?? ''), 0, 160, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8');
  $dateVal = !empty($row['created_at']) ? strtotime($row['created_at']) : time();
  $date = date('M d, Y', $dateVal);
?>
<!-- <div class="col-lg-4 col-md-6 mb-4 blog-item">
  <article class="card h-100 shadow-sm border-0">
    <div class="card-img-top overflow-hidden" style="max-height:220px;">
      <a href="blog-details?slug=<?= $slug; ?>">
        <img src="<?= $img; ?>" 
     class="img-fluid w-100" 
     style="height:220px; object-fit:cover; object-position:center;" 
     alt="<?= $title; ?>">
      </a>
    </div>
    <div class="card-body d-flex flex-column">
      <div class="small text-muted mb-2"><?= $date; ?></div>
      <h5 class="card-title mb-2">
        <a href="blog-details?slug=<?= $slug; ?>" class="text-dark text-decoration-none">
          <?= $title; ?>
        </a>
      </h5>
      <p class="card-text text-muted flex-grow-1 mb-3"><?= $desc; ?></p>
      <a href="blog-details?slug=<?= $slug; ?>" class="btn btn-sm btn-primary mt-auto">Read More</a>
    </div>
  </article>
</div> -->
<div class="col-lg-4 col-md-6 mb-4 blog-item">
  <div class="card text-white shadow-lg border-0 rounded-3 overflow-hidden h-100">
    <!-- Blog Image -->
    <a href="blog-details?slug=<?= $slug; ?>">
      <img src="<?= $img; ?>" 
           class="card-img" 
           style="height:250px; object-fit:cover;" 
           alt="<?= $title; ?>">
    </a>

    <!-- Overlay -->
    <div class="card-img-overlay d-flex flex-column justify-content-end p-4" 
         style="background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));">
         
      <!-- Blog Date -->
      <p class="small text-white-50 mb-2"><?= $date; ?></p>
      
      <!-- Blog Title -->
      <h5 class="card-title mb-2">
        <a href="blog-details?slug=<?= $slug; ?>" 
           class="text-white text-decoration-none fw-semibold">
          <?= $title; ?>
        </a>
      </h5>

      <!-- Blog Description (optional short preview) -->
      <p class="small text-white-50 mb-3"><?= $desc; ?></p>

      <!-- Read More Button -->
      <a href="blog-details?slug=<?= $slug; ?>" 
         class="btn btn-sm btn-primary px-3 rounded-pill align-self-start">
        Read More
      </a>
    </div>
  </div>
</div>


<?php endwhile;

$stmt->close();
$conn->close();
