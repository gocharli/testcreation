<?php 
include('include/connection.php'); // should expose $conn (mysqli)
include('include/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
  <!-- Loading (overlay) -->
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
        <!-- Brand -->
        <a class="navbar-brand p-1-l" href="index">
          <img src="static/img/logo.png" alt="Logo">
        </a>
        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span></span><span></span><span></span>
        </button>
        <!-- Top Menu -->
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
<section id="home-box" class="home-banner-02 theme-after-bg theme-bg" 
         style="background: url('bannerImg/why-choose-us.jpg') center center/cover no-repeat; min-height: 400px;">
  <div class="carousel-caption d-flex flex-column justify-content-center align-items-center text-center h-100">
    <h2 class="font-alt text-white">Our Blogs</h2>
    <p class="text-white w-75 mx-auto">Stay updated with our latest articles and insights.</p>
  </div>
</section>

    <!-- Blog Listing -->
    <section class="section grey-bg p-50px-t">
      <div class="container">
        <div class="row" id="blog-list"><!-- items append here --></div>
        <div class="row">
          <div class="col-md-12 text-center mt-4">
            <button id="load-more" class="btn btn-primary">Load More</button>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include('footer.php'); ?>

  <!-- Scripts (single block only) -->
  <script src="static/js/jquery-3.2.1.min.js"></script>
  <script src="static/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    (function ($) {
      // Hide loader when window fully ready (images/fonts loaded)
      $(window).on('load', function () { $('#loading').fadeOut(200); });

      let limit = 6;
      let offset = 0;
      let isLoading = false;
      let firstBatch = true;

      function toggleLoading(state) {
        isLoading = state;
        const $btn = $("#load-more");
        if (state) { $btn.prop("disabled", true).text("Loading..."); }
        else { $btn.prop("disabled", false).text("Load More"); }
      }

      function loadBlogs() {
        if (isLoading) return;
        toggleLoading(true);

        $.ajax({
          url: "load_blogs.php",
          type: "POST",
          dataType: "html",
          data: { limit: limit, offset: offset },
          success: function (response) {
            const html = $.trim(response || "");
            if (!html) {
              $("#load-more").hide();
              return;
            }

            // Append items
            const $html = $(html);
            $("#blog-list").append($html);

            // Count how many items returned (requires .blog-item on each)
            const newCount =
              $html.filter(".blog-item").length ||
              $html.find(".blog-item").length || 0;

            // Update offset by actual returned items
            offset += newCount;

            // If fewer than limit returned, no more pages
            if (newCount < limit) { $("#load-more").hide(); }
          },
          error: function (xhr, status, error) {
            console.error("Failed to load blogs:", error);
          },
          complete: function () {
            toggleLoading(false);
            if (firstBatch) { $('#loading').fadeOut(200); firstBatch = false; }
          }
        });
      }

      // Initial load + button
      $(function () {
        loadBlogs();
        $("#load-more").on("click", loadBlogs);
      });
    })(jQuery);
  </script>
</body>
</html>
