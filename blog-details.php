<?php 
include('include/connection.php'); // should expose $conn (mysqli)
include('include/functions.php');

$slug = $_GET['slug'] ?? '';
$sql = "SELECT id, title, image, description, detail, created_at, category_id, tags
        FROM tbl_blogs 
        WHERE slug = ? AND status = 'Active' AND is_deleted = 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();

// If the blog exists, fetch related blogs and parse the tags
if ($blog) {
    $current_blog_id = $blog['id'];
    $category_id = $blog['category_id'];

    // Fetch related blogs (latest 5 blogs from the same category, excluding the current one)
    $sql_related = "SELECT id, title, slug, image
                    FROM tbl_blogs
                    WHERE category_id = ? AND id != ? AND status = 'Active' AND is_deleted = 0
                    ORDER BY created_at DESC
                    LIMIT 5";
    $stmt_related = $conn->prepare($sql_related);
    $stmt_related->bind_param("ii", $category_id, $current_blog_id);
    $stmt_related->execute();
    $related_blogs_result = $stmt_related->get_result();
    $related_blogs = $related_blogs_result->fetch_all(MYSQLI_ASSOC);

    // Get tags from the 'tags' column and split them into an array
    // Trim each tag to remove leading/trailing whitespace
    $tags_string = $blog['tags'] ?? '';
    $tags_array = array_map('trim', explode(',', $tags_string));
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
  <div id="loading" class="loader-wrapper theme-g-bg" style="position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;">
    <div class="center">
      <div class="d d1"></div>
      <div class="d d2"></div>
      <div class="d d3"></div>
      <div class="d d4"></div>
      <div class="d d5"></div>
    </div>
  </div>

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

  <main class="page-content">
    <div class="container" style="margin-top: 90px;">
      <div class="row">
        <div class="col-lg-8">
          <article class="blog-article">
            <h1 class="blog-title"><?= $blog['title'] ?></h1>
            <div class="blog-meta">
              <span>By <a href="#"><?= $blog['author'] ?? 'Admin' ?></a></span>
              <span class="meta-separator">|</span>
              <span><i class="bi bi-calendar"></i> <?= date("F j, Y", strtotime($blog['created_at'])) ?></span>
            </div>
            <figure class="featured-image">
              <img src="static/img/blogs/<?= $blog['image'] ?>" alt="<?= $blog['title'] ?>" class="img-fluid">
            </figure>
            <div class="blog-content">
              <?= $blog['detail'] ?>
            </div>
          </article>
        </div>

        <div class="col-lg-4">
          <aside class="blog-sidebar">
            <div class="sidebar-widget">
              <h4 class="widget-title">Related Blogs</h4>
              <?php if (!empty($related_blogs)): ?>
                <ul class="list-unstyled related-posts">
                  <?php foreach ($related_blogs as $related_blog): 
                    $relatedImagePath = 'static/img/blogs/' . ($related_blog['image'] ?? '');
                $relatedImg = (!empty($related_blog['image']) && file_exists($relatedImagePath)) 
                    ? $relatedImagePath 
                    : 'static/img/blog-placeholder.jpg';
            ?>
                    <li>
                      <a href="blog-details?slug=<?= $related_blog['slug'] ?>" class="d-flex align-items-start">
                    <img src="<?= $relatedImg ?>" alt="<?= htmlspecialchars($related_blog['title']) ?>" class="related-img me-3">
                        <div>
                          <h6 class="related-title"><?= $related_blog['title'] ?></h6>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php else: ?>
                <p>No related blogs found.</p>
              <?php endif; ?>
            </div>

            <div class="sidebar-widget mt-4">
              <h4 class="widget-title">Tags</h4>
              <div class="tags-container">
                <?php if (!empty($tags_array) && $tags_array[0] !== ''): ?>
                  <?php foreach ($tags_array as $tag): ?>
                    <a href="#" class="tag-link"><?= htmlspecialchars($tag) ?></a>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No tags found.</p>
                <?php endif; ?>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </main>

  <?php include('footer.php'); ?>

  <script src="static/js/jquery-3.2.1.min.js"></script>
  <script src="static/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* General Styles */
    body {
      background-color: #f7f9fc;
    }
    .page-content {
      padding: 100px 0 60px;
    }
    .blog-article {
      background: #ffffff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    .blog-title {
      font-size: 2.5rem;
      font-weight: 700;
      color: #333;
      line-height: 1.2;
      margin-bottom: 10px;
    }
    .blog-meta {
      font-size: 0.9rem;
      color: #777;
      margin-bottom: 25px;
    }
    .blog-meta a {
      color: #007bff;
      text-decoration: none;
    }
    .meta-separator {
      margin: 0 8px;
    }
    .featured-image {
      margin-bottom: 30px;
      border-radius: 8px;
      overflow: hidden;
    }
    .featured-image img {
      width: 100%;
      height: auto;
      display: block;
    }
    .blog-content p {
      font-size: 1rem;
      line-height: 1.8;
      color: #555;
      margin-bottom: 1.5rem;
    }

    
    .sidebar-widget {
      background: #ffffff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    .widget-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
      border-bottom: 2px solid #007bff;
      padding-bottom: 10px;
    }
    .related-posts li {
      margin-bottom: 15px;
    }
    .related-posts li:last-child {
      margin-bottom: 0;
    }
    .related-posts a {
      text-decoration: none;
      color: #333;
      transition: color 0.3s;
    }
    .related-posts a:hover {
      color: #007bff;
    }
    .related-img {
      width: 80px;
      height: 60px;
      object-fit: cover;
      border-radius: 4px;
    }
    .related-title {
      font-size: 0.95rem;
      font-weight: 500;
      line-height: 1.3;
      margin-top: 0;
      margin-bottom: 0;
      margin-left: 10px;
    }
    .tags-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .tag-link {
      background-color: #e9ecef;
      color: #495057;
      padding: 6px 14px;
      border-radius: 20px;
      text-decoration: none;
      font-size: 0.85rem;
      transition: background-color 0.3s, color 0.3s;
    }
    .tag-link:hover {
      background-color: #007bff;
      color: #fff;
    }
  </style>
  <script>
    $(window).on('load', function () { $('#loading').fadeOut(200); });
  </script>
</body>
</html>