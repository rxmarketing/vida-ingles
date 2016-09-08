<div class="row hidden-xs hidden-sm">
	<div class="col-md-3">
		<h4 class="footer-links-header ucase-text">Cursos</h4>
		<ul class="list-unstyled">
			<?php echo $course_list ?>
		</ul>
	</div><!-- Ends col-md-3 -->
	<div class="col-md-3">
		<h4 class="footer-links-header ucase-text">Lecciones</h4>
		<ul class="list-unstyled">
			<?php echo $lessons_list ?>
		</ul>
	</div>							
	<div class="col-md-3">
		<h4 class="footer-links-header ucase-text">Ejercicios</h4>
		<ul class="list-unstyled">
			<?php echo $exam_list ?>
		</ul>
	</div>						
	<div class="col-md-3">
		<h4 class="footer-links-header ucase-text">Canciones</h4>
		<ul class="list-unstyled">
			<?php echo $song_list ?>
		</ul>
	</div>
</div><!-- Ends .row -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
      <div class="microdata">
				<a href="<?php echo home(); ?>">&copy; <?php echo date('Y'); ?>
					<span itemscope itemtype="http://schema.org/Organization"> 
					<span itemprop="name"><?php echo $site_name ?></span></a> 
					<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
						<span class="hidden-xs hidden-sm" itemprop="streetAddress"><?php echo $site_address1. ' '. $site_address2 ?></span>
						<span class="hidden-xs hidden-sm" itemprop="addressLocality"> <?php echo $site_city .', ' ?></span>
						<span class="hidden-xs hidden-sm" itemprop="addressRegion"><?php echo $site_state. ' ' .$site_cp ?></span>
					</span> <span class="hidden-xs hidden-sm"><img itemprop="logo" src="<?php echo home()?>/i/vidaingles-logo50x50.png" width="12" height="12" alt="Vida Inglés" /> <a href="<?php echo home()?>" itemprop="url"><?php echo home(); ?></a></span>
				</span>
			</div><!-- Ends microdata -->
		</div>
	</div>
</div>
<script src="<?php echo home() ?>/js/ie10-viewport-bug-workaround.js"></script>
<?php include_once('includes/ga.php') ?>