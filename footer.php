<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kembara
 */

?>

		</div><!-- #content -->
	
		</div>
	</div>

	<section id="secondary-nav">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-6 clearfix">
					
					<blockquote class="blockquote text-muted">
						"Life is like a camera. Focus only on what is important and you will capture it perfectly."
					</blockquote>
					
				</div>
				<div class="col-xs-6 col-sm-3 clearfix">
					
					<h4 class="title">Search</h4>
					<form role="search" method="get" class="form-search" action="#">
					  <div class="input-group">
						<label class="screen-reader-text" for="s">Search for:</label>
						<input type="text" class="form-control search-query" placeholder="Search&hellip;" value="" name="s" title="Search for:" />
						<span class="input-group-btn">
						  <button type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="Search"><i class="ion ion-search"></i></button>
						</span>
					  </div>
					</form>
				</div>
				
				<div class="col-xs-12 col-sm-3 text-xs-right">
					<img src="images/about-me.png" width="60" class="img-rounded pull-xs-right m-l-1">
					<h4 class="title">Social</h4>
					<ul class="list-inline social-list">
						<li class="list-inline-item"><a rel="nofollow" href="" title="Twitter"><i class="ion ion-social-twitter"></i></a>&nbsp;</li>
						<li class="list-inline-item"><a rel="nofollow" href="" title="Facebook"><i class="ion ion-social-facebook"></i></a></li>
						<li class="list-inline-item"><a rel="nofollow" href="" title="Github"><i class="ion ion-social-github"></i></a></li>
						<li class="list-inline-item"><a rel="nofollow" href="" title="Youtube"><i class="ion ion-social-youtube"></i></a></li>
						<li class="list-inline-item"><a rel="nofollow" href="" title="Youtube"><i class="ion ion-social-instagram-outline"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<footer id="site-footer">
		<div class="container">
			
		</div>
	</footer>

 <script>window.jQuery || document.write('<script src="<?php echo  get_template_directory_uri()?> /js/vendor/jquery/dist/jquery.min.js"><\/script>')</script>	

<?php wp_footer(); ?>

</body>
</html>
