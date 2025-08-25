<?php 
include('include/connection.php'); // exposes $conn (mysqli)
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
    <section id="home-box" class="home-banner-02 grey-bg" style="min-height: 157px; margin-top: 132px;">
      <div class="carousel-caption d-flex flex-column justify-content-center align-items-center text-center h-100"style="padding-top: 73px;">
        <h2 class="font-alt text-dark">Our Blogs</h2>
        <p class="text-dark w-75 mx-auto">Stay updated with our latest articles and insights.</p>
      </div>
    </section>

    <!-- Filter -->
   

    <!-- Blog Listing -->
    <section class="section  p-50px-t">
       <div class="container mt-3">
      <div class="row mb-4">
        <div class="col-md-12 text-end">
         
          <select id="sort-order" class="form-select" style="width:20%; display:inline-block; padding:4px 28px 4px 8px; font-size:14px; border:1px solid #ccc; border-radius:6px; background-color:#fff; background-image:url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'%23666\'><path d=\'M4.646 6.646a.5.5 0 0 1 .708 0L8 9.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z\'/></svg>'); background-repeat:no-repeat; background-position:right 8px center; background-size:12px;">
 <option value="desc" selected>Newest First</option>
            <option value="asc">Oldest First</option>
</select>

        </div>
      </div>
    </div>
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

  <!-- Scripts -->
  <script src="static/js/jquery-3.2.1.min.js"></script>
  <script src="static/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    (function ($) {
      $(window).on('load', function () { $('#loading').fadeOut(200); });

      let limit = 6;
      let offset = 0;
      let isLoading = false;
      let firstBatch = true;
      let sortOrder = "desc";

      function toggleLoading(state) {
        isLoading = state;
        const $btn = $("#load-more");
        if (state) { $btn.prop("disabled", true).text("Loading..."); }
        else { $btn.prop("disabled", false).text("Load More"); }
      }

      function loadBlogs(reset = false) {
        if (isLoading) return;
        if (reset) { offset = 0; $("#blog-list").empty(); $("#load-more").show(); }

        toggleLoading(true);

        $.ajax({
          url: "load_blogs.php",
          type: "POST",
          dataType: "html",
          data: { limit: limit, offset: offset, order: sortOrder },
          success: function (response) {
            const html = $.trim(response || "");
            if (!html) {
              $("#load-more").hide();
              return;
            }

            const $html = $(html);
            $("#blog-list").append($html);

            const newCount =
              $html.filter(".blog-item").length ||
              $html.find(".blog-item").length || 0;

            offset += newCount;

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

      $(function () {
        loadBlogs();
        $("#load-more").on("click", () => loadBlogs(false));
        $("#sort-order").on("change", function () {
          sortOrder = $(this).val();
          loadBlogs(true);
        });
      });
    })(jQuery);
  </script>
</body>
</html>
