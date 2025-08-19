<!-- <div class="menu-box text-center">
    <a href="javascript:;" id="toggle">Menu <span></span></a>
    <div id="menu">
        <div class="row">
            <div class="col-md-2"></div>
            <?php
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
            $host     = $_SERVER['HTTP_HOST'];
            $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); // handles subfolder like /testcreation

            $category_info = get_table_data('tbl_category', 'id!="" AND parent_id = "0" AND status = "Active" ');
            if ($category_info) {
                foreach ($category_info as $key => $value) {
                    ?>
                    <div class="col-md-2">
                        <h4 style="color: #fda100;"><?php echo $value->category_name; ?></h4>
                        <?php
                        $subcategory_info = get_table_data('tbl_category', 'id!="" AND parent_id = "' . $value->id . '" AND status = "Active" ');
                        if ($subcategory_info) {
                            foreach ($subcategory_info as $key => $val) {
                                // Build pretty URL (works on localhost and live)
                                $url = $protocol . $host . $basePath . "/category/" . $val->slug;
                                ?>
                                <ul>
                                    <li>
                                        <a href="<?= $url ?>" style="color:#FFF;">
                                            <?= $val->category_name; ?>
                                        </a>
                                    </li>
                                </ul>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="col-md-2"></div>
        </div>
    </div>
</div> -->
<?php
/* ===== Base URL (works on localhost + subfolders + live) ===== */
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host     = $_SERVER['HTTP_HOST'];
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');  // e.g. /testcreation
$baseUrl  = rtrim($protocol . $host . $basePath, '/');

/* ===== Categories ===== */
$parents = get_table_data('tbl_category', 'id!="" AND parent_id="0" AND status="Active" ');
?>
<!-- Google Font (lightweight) -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
  :root{
    --nav-bg:#ffffff;
    --nav-text:#1f2937;
    --nav-text-dim:#374151;
    --nav-hover:#f3f4f6;
  }

  .as-nav{
    background:var(--nav-bg);
    border:0 !important;            /* kill any header border */
    font-family:'Poppins', system-ui, -apple-system, Segoe UI, Roboto, Inter, Arial;
  }

  .as-nav__inner{
    max-width:1200px; margin-left:200px;
    padding:12px 20px;
    display:flex; align-items:center; justify-content:flex-end; gap:12px;
  }

  /* Buttons */
  .as-nav__toggle,
  .as-nav__btn{
    background:#fff;
    border:0 !important;            /* remove default button borders */
    outline:0 !important;           /* remove focus outline */
    box-shadow:none !important;     /* remove any shadows that look like borders */
    color:var(--nav-text);
    cursor:pointer;
    border-radius:10px;
  }

  /* Menu container */
  .as-nav__menu{
    list-style:none; margin:0; padding:0;
    display:flex; align-items:center; gap:18px;
    border:0 !important;            /* no lines */
    box-shadow:none !important;
  }

  .as-nav__item{ position:relative; }

  .as-nav__btn{
    display:inline-flex; align-items:center; gap:8px;
    font-size:13px; text-transform:uppercase; letter-spacing:.04em;
    text-decoration:none !important;
    padding:8px 10px;
    transition:background .15s ease, opacity .15s ease;
  }
  .as-nav__btn:hover{ background:var(--nav-hover); }

  /* Small caret icon (kept) */
  .as-nav__caret{
    width:8px; height:8px; border-right:2px solid var(--nav-text);
    border-bottom:2px solid var(--nav-text); transform:rotate(45deg); margin-left:2px;
  }

  /* Submenu */
  .as-nav__submenu{
    position:absolute; top:100%; left:0; min-width:220px;
    background:#fff;
    border:0 !important;            /* remove dropdown border */
    box-shadow:none !important;     /* remove dropdown shadow */
    border-radius:10px;
    padding:6px; display:none; z-index:20;
  }
  .as-nav__submenu li{ list-style:none; }
  .as-nav__submenu a{
    display:block; padding:9px 12px; border-radius:8px;
    color:var(--nav-text-dim); font-size:14px;
    text-decoration:none !important; border:0 !important;
  }
  .as-nav__submenu a:hover{ background:var(--nav-hover); }

  .as-nav__item.has-sub:hover > .as-nav__submenu{ display:block; }

  /* Mobile */
  @media (max-width: 992px){
    .as-nav__toggle{ display:block; }
    .as-nav__menu{
      position:absolute; top:64px; left:0; right:0;
      background:#fff;
      border:0 !important;          /* ensure no top line on mobile */
      box-shadow:none !important;
      padding:10px 14px 16px;
      flex-direction:column; align-items:flex-start; gap:6px;
      display:none; z-index:30;
    }
    .as-nav__menu.open{ display:flex; }

    .as-nav__item.has-sub > .as-nav__submenu{
      position:static;
      border:0 !important; box-shadow:none !important;
      background:transparent; padding:0 0 6px 10px; display:none;
    }
    .as-nav__item.has-sub.open > .as-nav__submenu{ display:block; }
  }

  /* Hard kill any inherited underline/borders inside nav */
  .as-nav a{ text-decoration:none !important; border:0 !important; }
  .as-nav__toggle{
  display:none !important;
}

/* Show it ONLY on mobile */
@media (max-width: 992px){
  .as-nav__toggle{
    display:inline-flex !important;
    align-items:center; justify-content:center;
    width:44px; height:38px;
    background:transparent; border:0; outline:0; box-shadow:none;
    position:absolute; right:16px; top:8px; z-index:40;
  }
}
</style>



<header class="as-nav">
  <div class="as-nav__inner">
    <!-- Mobile toggle -->
    <button class="as-nav__toggle" id="asNavToggle" aria-expanded="false" aria-controls="asMainMenu" aria-label="Toggle menu">☰</button>

    <!-- Menu -->
    <ul class="as-nav__menu" id="asMainMenu">
      <?php if ($parents): foreach ($parents as $p): ?>
        <?php
          $children = get_table_data('tbl_category', 'id!="" AND parent_id="'.$p->id.'" AND status="Active" ');
          $hasSub   = !empty($children);
          $uid      = 'submenu_'.$p->id; // unique id for ARIA
        ?>
        <li class="as-nav__item <?= $hasSub ? 'has-sub' : '' ?>">
          <?php if ($hasSub): ?>
            <button class="as-nav__btn js-subtoggle" aria-expanded="false" aria-controls="<?= $uid ?>">
              <?= htmlspecialchars($p->category_name) ?><span class="as-nav__caret"></span>
            </button>
            <ul class="as-nav__submenu" id="<?= $uid ?>">
              <?php foreach ($children as $c):
                $url = $baseUrl . "/category/" . $c->slug; ?>
                <li><a href="<?= $url ?>"><?= htmlspecialchars($c->category_name) ?></a></li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <span class="as-nav__btn"><?= htmlspecialchars($p->category_name) ?></span>
          <?php endif; ?>
        </li>
      <?php endforeach; endif; ?>
      <!-- About/Contact removed per request -->
    </ul>
  </div>
</header>

<script>
  (function(){
    const btn  = document.getElementById('asNavToggle');
    const menu = document.getElementById('asMainMenu');

    if (btn && menu){
      btn.addEventListener('click', function(){
        const open = menu.classList.toggle('open');
        btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      });
    }

    // Mobile submenus: toggle on click
    document.querySelectorAll('.js-subtoggle').forEach(function(toggler){
      toggler.addEventListener('click', function(e){
        // Only do collapsible behavior on mobile layouts
        if (window.matchMedia('(max-width: 992px)').matches){
          const li   = e.currentTarget.closest('.as-nav__item');
          const open = li.classList.toggle('open');
          e.currentTarget.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
      });
    });
  })();
</script>
