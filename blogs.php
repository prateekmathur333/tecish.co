<?php
	require_once 'header.php';
	
	$url = $config['URLS']['API_PATH'] . $config['URLS']['GET_ALL_BLOGS'];
	//echo $url;
	$blogs = json_decode(sendGetRequest($url, array()));
	//print_r($companies);
	$blogs = $blogs->data;
?>		
		
		<!-- ======================= Start Page Title ===================== -->
		<div class="page-title">
			<div class="container">
				<div class="page-caption">
					<h2>Blog</h2>
					<p><a href="blog.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Blog</p>
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->
		
		<!-- ===================== Blogs In Grid ===================== -->
		<section>
			<div class="container">
				<div class="row">
					
					<?php
						foreach($blogs as $blog) { 
								$desc = $blog->content;
								if (strlen($desc) > 90) {
									$desc = substr($desc, 0, 90) . "...";
								}
							?>						
							<div class="col-md-4 col-sm-6">
								<div class="blog-box blog-grid-box">
									<div class="blog-grid-box-img">
										<img src="<?php echo $config['URLS']['API_PATH'] . 'BlogImages/' . $blog->img; ?>" class="img-responsive" alt="" />
									</div>
									
									<div class="blog-grid-box-content">
										<div class="blog-avatar text-center">
											<!--<img src="assets/img/user-1.png" class="img-responsive" alt="" />-->
											<p><strong>By</strong> <span class="theme-cl"><?php echo $blog->author; ?></span></p>
										</div>
										<h4><?php echo $blog->title; ?></h4>
										<p><?php echo $desc; ?></p>
										<a href="blog-detail.php?blogId=<?php echo $blog->_id; ?>" class="theme-cl" title="Read More..">Continue...</a>
									</div>
									
								</div>
							</div>
						<?php
						}
					?>

				
				<div class="row">
					<div class="col-md-12">
						<div class="bs-example">
							<ul class="pagination">
								<li><a href="blog.html#">«</a></li>
								<li><a href="blog.html#">1</a></li>
								<li><a href="blog.html#">2</a></li>
								<li><a href="blog.html#">3</a></li>
								<li><a href="blog.html#">4</a></li>
								<li><a href="blog.html#">5</a></li>
								<li><a href="blog.html#">»</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== End Blogs In Grid ===================== -->

<?php
    require_once 'footer.php';
?>