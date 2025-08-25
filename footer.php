<footer class="footer theme-g-bg">

	<?php $host = $_SERVER['HTTP_HOST'];

	if ($host === 'localhost') {
		// Local
		$base_url = "http://{$host}/testcreation/";
	} else {
		// Live
		$base_url = "https://{$host}/";
	} ?>
	<section class="footer-section">
		<div class="container">
			<div class="row mb-4">
				<div class="col-md-3 col-lg-3 sm-m-15px-tb">
					<h4 class="font-alt text">Helpful Links</h4>
					<div class="d-flex justify-content-around">
						<ul class="fot-link">
							<li>
								<a href="<?= $base_url ?>aboutus">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									<span>About us</span>
								</a>
							</li>
							<li>
								<a href="<?= $base_url ?>purchase">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									<span>Purchase</span>
								</a>
							</li>
							<li>
								<a href="<?= $base_url ?>privacy">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									<span>Privacy</span>
								</a>
							</li>
							<li>
								<a href="<?= $base_url ?>terms">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									<span>Terms of use</span>
								</a>
							</li>
							<li>
								<a href="javascript:;" id="contactLink">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									<span>Contact us</span>
								</a>
							</li>
							<li>
								<a href="<?= $base_url ?>blogs" target="_blank" rel="noopener">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									<span>Blog</span>
								</a>
							</li>
						</ul>

					</div>
				</div>
				<!-- col -->
				<div class="col-md-4 col-lg-6 sm-m-15px-tb">
					<h4 class="font-alt text-center">About Us</h4>
					<p class="footer-text" style="text-align: justify;line-height: 1.5;">DanquahPrep is a leading
						education provider devoted to preparing students to excel in high stakes college and licensing
						examinations. We are a team of experienced educators who excelled on our standardized exams and
						know what it takes to replicate this stellar performance among our students. We have also
						partnered with professionals at the top of their field with the single aim of providing practice
						exams at a level comparable to what is expected by the various boards.</p>
				</div>
				<!-- col -->
				<div class="col-md-3 col-lg-3 sm-m-15px-tb">
					<h4 class="font-alt">Get in touch</h4>
					<p>15941 Harlem Ave, Ste 255, Tinley Park IL 60477</p>
					<p><span>E-Mail:</span> info@danquahprep.com</p>
					<p><span>Phone:</span> (708) 497-9728</p>
					<ul class="social-icons">
						<li><a class="facebook" href="https://www.facebook.com/danquahprep/" target="_blank"><i
									class="fab fa-facebook-f"></i></a></li>
						<li><a class="twitter" href="https://twitter.com/DanquahPrep" target="_blank"><i
									class="fab fa-twitter"></i></a></li>
						<li><a class="youtube" href="https://www.youtube.com/channel/UC84wYaO8ndj7lJsGXAjA4Pw"
								target="_blank"><i class="fab fa-youtube"></i></a></li>
						<li><a class="instagram" href="https://www.instagram.com/danquahprep/" target="_blank"><i
									class="fab fa-instagram"></i></a></li>
						<li><a class="linkedin" href="https://www.linkedin.com/company/danquahprep/" target="_blank"><i
									class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
				<!-- col -->
			</div>
		</div>

		<div class="row" style="background: rgb(0,0,0,0.4); padding: 20px;">
			<div class="col-md-12">
				<h4 class="font-alt text-center mb-3">Disclaimer</h4>
				<p class="footer-text text-center" style="font-size: 12px;">ACT® is a registered trademark owned by ACT.
				</p>
				<p class="footer-text text-center" style="font-size: 12px;">PCAT® is a registered trademark owned by
					Pearson Education Inc.</p>
				<p class="footer-text text-center" style="font-size: 12px;">GRE® is a registered trademark owned by the
					Educational Testing Service.</p>
				<p class="footer-text text-center" style="font-size: 12px;">SAT® is a registered trademark owned by the
					College Entrance Examination Board.</p>
				<p class="footer-text text-center" style="font-size: 12px;">MCAT® is a registered trademark owned by the
					Association of American Medical Colleges (AAMC).</p>
				<p class="footer-text text-center" style="font-size: 12px;">NAPLEX® is a registered trademark owned by
					the National Association of Boards of Pharmacy (NABP®).</p>
				<p class="footer-text text-center" style="font-size: 12px;">NCLEX-RN® is a registered trademark owned by
					the National Council of State Boards of Nursing, Inc. (NCSBN®)</p>
				<p class="footer-text text-center" style="font-size: 12px;">USMLE® is a registered trademark owned by a
					joint program of the Federation of State Medical Boards (FSMB) and National Board of Medical
					Examiners® (NBME®).</p>
				<p class="footer-text text-center" style="font-size: 12px;">DanquahPrep is neither affiliated nor
					sponsored by any of the holders of these trademarks.</p>
			</div>
		</div>
		<div class="footer-copy">
			<div class="row">
				<div class="col-12">
					<p>All &copy;<?php echo date("Y"); ?> Copyright by DanquahPrep. All Rights Reserved.</p>
				</div>
				<!-- col -->
			</div>
			<!-- row -->
		</div>
		<!-- footer-copy -->
	</section>
</footer>