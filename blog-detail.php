<?php
	require_once 'header.php';
	$url = $config['URLS']['API_PATH'] . $config['URLS']['GET_BLOG'] . $_GET['blogId'];
	//echo $url;
	$blogs = json_decode(sendGetRequest($url, array()));
	//print_r($companies);
	$blog = $blogs->data[0];

	$url = $config['URLS']['API_PATH'] . $config['URLS']['TOP_BLOGS'];
	//echo $url;
	$topBlogs = json_decode(sendGetRequest($url, array()));
	//print_r($companies);
	$topBlogs = $topBlogs->data;
?>		
			
		<!-- ======================= Start Page Title ===================== -->
		<div class="page-title">
			<div class="container">
				<div class="page-caption">
					<h2>Blog Detail</h2>
					<p><a href="blog-detail.html#" title="Home">Home</a> <i class="ti-arrow-right"></i> Blog Detail</p>
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->
			
		<!-- ===================== Blogs In Grid ===================== -->
		<section>
			<div class="container">
			
				<div class="row">
					<!-- =============== Blog Detail ================= -->
					<div class="col-md-8 col-sm-12">
						
						<!-- /.Article -->
						<article class="blog-news detail-wrapper">
							<div class="full-blog">
							
								<!-- Featured Image -->
								<figure class="img-holder">
									<a href="blog-detail.html"><img src="<?php echo $config['URLS']['API_PATH'] . 'BlogImages/' . $blog->img; ?>" class="img-responsive" alt="News"></a>
									<div class="blog-post-date theme-bg">
										<?php echo substr($blog->createdAt, 0, 10); ?>
									</div>
								</figure>
								
								<!-- Blog Content -->
								<div class="full blog-content">
									<div class="post-meta">By: <a href="#" class="author theme-cl"><?php echo $blog->author; ?></a> | <?php echo $blog->category->name; ?></div>
									<a href=""><h3><?php echo $blog->title; ?></h3></a>
									<div class="blog-text">
										<p><?php echo $blog->content; ?></p>
										<!--<div class="post-meta">Filed Under: <span class="category"><a href="blog-detail.html#" class="theme-cl">Technology</a></span></div>-->
									</div>
									
									<!-- Blog Share Option 
									<div class="row no-mrg">
										<div class="blog-footer-social">
											<span>Share <i class="fa fa-share-alt"></i></span>
											<ul class="list-inline social">
												<li><a href="blog-detail.html#"><i class="fa fa-facebook"></i></a></li>
												<li><a href="blog-detail.html#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="blog-detail.html#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="blog-detail.html#"><i class="fa fa-pinterest"></i></a></li>
											</ul>
										</div>
									</div>
									
								</div>
								Blog Content -->
								
							</div>
						</article>
						<!-- /.Article -->
						
						<!-- User Comments 
						<div class="row no-mrg">
							<div class="col-md-12 col-sm-12">
								<div class="comments">      
									<div class="comments-title">
										<h4>Comments (2)</h4>
									</div>
									
									<div class="single-comment">
										<div class="img-holder">
											<img src="assets/img/user-1.png" class="img-responsive" alt="">
										</div>
										<div class="text-holder">
											<div class="top">
												<div class="name pull-left">
													<h4>Robert Mil</h4>
												</div>
												<div class="rating pull-right">
													<ul>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
													</ul>
												</div>
											</div>
											
											<div class="text">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
											</div>
											
											<span class="small">Dec 30 2017</span>
										</div>
									</div>
									
									<div class="single-comment">
										<div class="img-holder">
											<img src="assets/img/user-2.jpg" class="img-responsive" alt="">
										</div>
										<div class="text-holder">
										
											<div class="top">
												<div class="name pull-left">
													<h4>Litha Dax</h4>
												</div>
												<div class="rating pull-right">
													<ul>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star"></i></li>
													</ul>
												</div>
											</div>
											
											<div class="text">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
											</div>
											<span class="small">Dec 15 2017</span>
											
										</div>
										
										<div class="single-comment">
										<div class="img-holder">
											<img src="assets/img/user-1.png" class="img-responsive" alt="">
										</div>
										<div class="text-holder">
										
											<div class="top">
												<div class="name pull-left">
													<h4>Robert Mil</h4>
												</div>
												<div class="rating pull-right">
													<ul>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star active"></i></li>
														<li><i class="fa fa-star"></i></li>
													</ul>
												</div>
											</div>
											
											<div class="text">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
											</div>
											<span class="small">Dec 15 2017</span>
											
										</div>
									</div>
									</div>
									
								</div>
							</div>
						</div>
						User Comments -->
						
						<!-- Start Blog Comment
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="comments-form"> 
									<div class="section-title2">
										<h4>Leave a Reply</h4>
									</div>
									
									<form>
										<div class="col-md-6 col-sm-6">
											<input type="text" class="form-control" placeholder="Your Name">
										</div>
										
										<div class="col-md-6 col-sm-6">
											<input type="email" class="form-control" placeholder="Your Email">
										</div>
										
										<div class="col-md-6 col-sm-6">
											<input type="text" class="form-control" placeholder="Your Mobile">
										</div>
										
										<div class="col-md-6 col-sm-6">
											<input type="text" class="form-control" placeholder="Subject">
										</div>
										
										<div class="col-md-12 col-sm-12">
											<textarea class="form-control" placeholder="Comment"></textarea>
										</div>
										
										<div class="col-md-12 col-sm-12">
											<button class="btn theme-btn width-200" type="submit">submit now</button>
										</div>
									</form>
								</div>
							
							</div>
						</div>
						End Blog Comment -->
						
					</div>
					<!-- /.col-md-8 -->
					
					<!-- ===================== Blog Sidebar ==================== -->
					<div class="col-md-4 col-sm-12">
						<div class="sidebar">
						
							<!-- Search Bar -->
							<div class="widget-boxed">
								<div class="widget-boxed-header border-0">
									<h4><i class="ti-search padd-r-10"></i>Search Here</h4>
								</div>
								
								<div class="widget-boxed-body padd-top-5">
									<div class="input-group">
										<form action="search-blog.php" method="get">
										<input type="text" class="form-control" name="q" placeholder="Search Blog">
										<span class="input-group-btn">
											<button type="submit" class="btn height-50 theme-btn">Go</button>
										</span>
										</form>
									</div>
								</div>
							
							</div>
			
							<!-- Start: Latest Blogs -->
							<div class="widget-boxed">
								<div class="widget-boxed-header">
									<h4><i class="ti-check-box padd-r-10"></i>Latest Blogs</h4>
								</div>
								<div class="widget-boxed-body padd-top-5">
									<div class="side-list">
										<ul class="side-blog-list">
											<?php
												foreach($topBlogs as $topBlog) {?>
													<li>
														<a href="blog-detail.php?blogId=<?php echo $topBlog->_id; ?>">
															<div class="blog-list-img">
																<img src="<?php echo $config['URLS']['API_PATH'] . 'BlogImages/' . $topBlog->img; ?>" class="img-responsive" alt="">
															</div>
														</a>
														<div class="blog-list-info">
															<h5><a href="blog-detail.php?blogId=<?php echo $topBlog->_id; ?>" title="blog"><?php echo $topBlog->title; ?></a></h5>
															<div class="blog-post-meta">
																<span class="updated"><?php echo substr($topBlog->createdAt, 0, 10); ?></span> | <a href="blog-detail.php?blogId=<?php echo $topBlog->_id; ?>" rel="tag"><?php echo $topBlog->category->name; ?></a>					
															</div>
														</div>
													</li>
												<?php
												}
											?>
										</ul>
									</div>
								</div>
							</div>
							<!-- End: Latest Blogs -->
							
							<!-- Start: Listing Category 
							<div class="widget-boxed">
								<div class="widget-boxed-header">
									<h4><i class="ti-briefcase padd-r-10"></i>Top Categories</h4>
								</div>
								<div class="widget-boxed-body padd-top-10 padd-bot-0">
									<div class="side-list">
										<ul class="category-list">
											<li><a href="blog-detail.html#">Business <span class="badge bg-g">4</span></a></li>
											<li><a href="blog-detail.html#">Shopping <span class="badge bg-a">7</span></a></li>
											<li><a href="blog-detail.html#">Photography <span class="badge bg-d">10</span></a></li>
											<li><a href="blog-detail.html#">Intertainment <span class="badge bg-l">55</span></a></li>
											<li><a href="blog-detail.html#">Education <span class="badge bg-o">8</span></a></li>
											<li><a href="blog-detail.html#">Travel & Tour <span class="badge bg-y">17</span></a></li>
											<li><a href="blog-detail.html#">Health & Fitness <span class="badge bg-s">9</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							End: Listing Category -->
							
							<!-- Start: Recent Listing 
							<div class="widget-boxed">
								<div class="widget-boxed-header">
									<h4><i class="ti-check-box padd-r-10"></i>Recent Blogs</h4>
								</div>
								<div class="widget-boxed-body padd-top-5">
									<div class="side-list">
										<ul class="side-blog-list">
											<li>
												<a href="blog-detail.html#">
													<div class="blog-list-img">
														<img src="assets/img/image-3.jpg" class="img-responsive" alt="">
													</div>
												</a>
												<div class="blog-list-info">
													<h5><a href="blog-detail.html#" title="blog">Freel Documentry</a></h5>
													<div class="blog-post-meta">
														<span class="updated">Nov 26, 2017</span> | <a href="blog-detail.html#" rel="tag">Documentry</a>					
													</div>
												</div>
											</li>
											
											<li>
												<a href="blog-detail.html#">
													<div class="blog-list-img">
														<img src="assets/img/image-4.jpg" class="img-responsive" alt="">
													</div>
												</a>
												<div class="blog-list-info">
													<h5><a href="blog-detail.html#" title="blog">Preez Food Rock</a></h5>
													<div class="blog-post-meta">
														<span class="updated">Oct 10, 2017</span> | <a href="blog-detail.html#" rel="tag">Food</a>					
													</div>
												</div>
											</li>
											
											<li>
												<a href="blog-detail.html#">
													<div class="blog-list-img">
														<img src="assets/img/image-1.jpg" class="img-responsive" alt="">
													</div>
												</a>
												<div class="blog-list-info">
													<h5><a href="blog-detail.html#" title="blog">Cricket Buzz High</a></h5>
													<div class="blog-post-meta">
														<span class="updated">Oct 07, 2017</span> | <a href="blog-detail.html#" rel="tag">Sport</a>					
													</div>
												</div>
											</li>
											
											<li>
												<a href="blog-detail.html#">
													<div class="blog-list-img">
														<img src="assets/img/image-5.jpg" class="img-responsive" alt="">
													</div>
												</a>
												<div class="blog-list-info">
													<h5><a href="blog-detail.html#" title="blog">Tour travel Tick</a></h5>
													<div class="blog-post-meta">
														<span class="updated">Sep 27, 2017</span> | <a href="blog-detail.html#" rel="tag">Travel</a>					
													</div>
												</div>
											</li>

										</ul>
									</div>
								</div>
							</div>
							End: Recent Listing -->
							
						</div>
					</div>
					
				</div>
				
			</div>
		</section>
		<!-- ===================== End Blogs In Grid ===================== -->
			
<?php
    require_once 'footer.php';
?>