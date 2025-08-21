
<?php
// IMPORTANT: this file must output ONLY the item HTML (no headers/footers/extra whitespace)
include('include/connection.php'); // exposes $conn (mysqli)
include('include/functions.php');

header('Content-Type: text/html; charset=utf-8');

// Read & sanitize pagination inputs
$offset = isset($_POST['offset']) ? max(0, (int)$_POST['offset']) : 0;
$limit  = isset($_POST['limit'])  ? max(1, (int)$_POST['limit'])  : 6;

// Query your blogs table (adjust table/columns to your schema)
$sql = "SELECT id, title, image, description, created_at, slug
        FROM tbl_blogs
        WHERE status = 'Active' 
          AND is_deleted = 0
        ORDER BY created_at DESC
        LIMIT ?, ?";

$stmt = $conn->prepare($sql);
if (!$stmt) { exit; } // silence on failure for clean output
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()):
  $title = htmlspecialchars((string)($row['title'] ?? ''), ENT_QUOTES, 'UTF-8');
  $slug  = htmlspecialchars((string)($row['slug'] ?? ''), ENT_QUOTES, 'UTF-8');

  // Image fallback
  $img   = !empty($row['image']) ? htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8')
                                 : 'static/img/blog-placeholder.jpg';

  // Short description (trim to ~160 chars)
  $descRaw = (string)($row['short_description'] ?? '');
  if (function_exists('mb_strimwidth')) {
    $desc = htmlspecialchars(mb_strimwidth($descRaw, 0, 160, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8');
  } else {
    $desc = htmlspecialchars(substr($descRaw, 0, 157) . (strlen($descRaw) > 160 ? '…' : ''), ENT_QUOTES, 'UTF-8');
  }

  // Date
  $dateVal = !empty($row['created_at']) ? strtotime($row['created_at']) : time();
  $date = date('M d, Y', $dateVal);
?>
  <div class="col-lg-4 col-md-6 mb-4 blog-item">
  <article class="card h-100 shadow-sm border-0">
    <div class="card-img-top overflow-hidden" style="max-height:220px;">
      <a href="blog-details?slug=<?= $slug; ?>">
        <img src="<?= !empty($row['image']) 
                      ? 'static/img/blogs/' . htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8') 
                      : 'static/img/blog-placeholder.jpg'; ?>" 
             class="img-fluid w-100" 
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
      <p class="card-text text-muted flex-grow-1 mb-3">
        <?= htmlspecialchars(mb_strimwidth((string)$row['description'], 0, 160, '…', 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?>
      </p>
      <a href="blog-details?slug=<?= $slug; ?>" class="btn btn-sm btn-primary mt-auto">Read More</a>
    </div>
  </article>
</div>

<?php endwhile;

$stmt->close();
$conn->close();
// no closing PHP tag to avoid accidental trailing whitespace
