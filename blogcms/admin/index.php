    <?php include "includes/admin_header.php" ?>

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <!-- Entire content wrapper -->
    <div class="navik-side-content pt-5 pb-5 px-3" style="background-color: #f6f6fb;">

    	<div class="container">
    		<!-- Show logged in username -->
    		<small><?php echo $_SESSION['username'] ?></small><span style="color: yellowgreen;">.</span>

    		<div class="row">

    			<!-- Total Users -->
    			<div class="col-lg-3 col-md-6">

    				<div class="card-body" style="background-color: #fff; border-radius: 7px; box-shadow:0 4px 25px 0 rgb(168 180 208 / 10%); ">

    					<div class="d-flex justify-content-between">
    						<div>
    							<h6>Total Users</h6>
    							<?php
								$sql = "SELECT * FROM users";
								$select_all_users = $conn->query($sql);
								$user_count = mysqli_num_rows($select_all_users);
								echo "<h2>{$user_count}</h2>";
								?>
    						</div>

    						<!-- Icon -->
    						<div class="card_icon">
    							<i class="fa-solid fa-user fa-3x"></i>
    						</div>

    					</div>
    				</div>
    				<!-- End Total Users -->
    			</div>

    			<!-- Total Posts -->
    			<div class="col-lg-3 col-md-6">

    				<div class="card-body" style="background-color: #fff; border-radius: 7px; box-shadow:0 4px 25px 0 rgb(168 180 208 / 10%)">

    					<div class="d-flex justify-content-between">

    						<div>
    							<!-- Title -->
    							<h6>Total Posts</h6>
    							<?php
								$sql = "SELECT * FROM posts";
								$select_all_posts = $conn->query($sql);
								$post_count = mysqli_num_rows($select_all_posts);
								echo "<h2>{$post_count}</h2>";
								?>
    						</div>

    						<!-- Icon -->
    						<div class="card_icon">
    							<i class="fa-solid fa-file-lines fa-3x"></i>
    						</div>

    					</div>
    				</div>
    				<!-- End Total Posts -->
    			</div>

    			<!-- Total Comments -->
    			<div class="col-lg-3 col-md-6">

    				<div class="card-body" style="background-color: #fff; border-radius: 7px; box-shadow:0 4px 25px 0 rgb(168 180 208 / 10%)">

    					<div class="d-flex justify-content-between">

    						<div>
    							<!-- Title -->
    							<h6>Total Comments</h6>
    							<?php
								$sql = "SELECT * FROM comments";
								$select_all_comments = $conn->query($sql);
								$comment_count = mysqli_num_rows($select_all_comments);
								echo "<h2>{$comment_count}</h2>";
								?>
    						</div>

    						<!-- Icon -->
    						<div class="card_icon">
    							<i class="fa fa-comments fa-3x"></i>
    						</div>

    					</div>
    				</div>
    				<!-- End Total Comments -->
    			</div>

    			<!-- Total Categories -->
    			<div class="col-lg-3 col-md-6">
    				<div class="card-body" style="background-color: #fff; border-radius: 7px; box-shadow:0 4px 25px 0 rgb(168 180 208 / 10%)">
    					<div class="d-flex justify-content-between">
    						<div>
    							<h6>Total Categories</h6>
    							<?php
								$sql = "SELECT * FROM categories";
								$select_all_categories = $conn->query($sql);
								$category_count = mysqli_num_rows($select_all_categories);
								echo "<h2>{$category_count}</h2>";
								?>
    						</div>
    						<div class="card_icon">
    							<i class="fa-solid fa-list fa-3x"></i>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- End Total Categories -->
    		</div>



    		<?php

			// select --> published
			$query = "SELECT * FROM posts WHERE post_status = 'published' ";
			$select_all_published_posts = mysqli_query($conn, $query);
			$post_published_count = mysqli_num_rows($select_all_published_posts);

			// select --> draft
			$query = "SELECT * FROM posts WHERE post_status = 'draft' ";
			$select_all_draft_posts = mysqli_query($conn, $query);
			$post_draft_count = mysqli_num_rows($select_all_draft_posts);

			// select --> unapproved
			$query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
			$unapproved_comments_query = mysqli_query($conn, $query);
			$unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);

			// select --> subscriber
			$query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
			$select_all_subscribers = mysqli_query($conn, $query);
			$subscribers_count = mysqli_num_rows($select_all_subscribers);

			?>

    		<!-- Google chart -->
    		<div class="row mt-5" style="background: white;">
    			<script type="text/javascript">
    				google.charts.load('current', {
    					'packages': ['bar']
    				});
    				google.charts.setOnLoadCallback(drawChart);

    				function drawChart() {
    					var data = google.visualization.arrayToDataTable([

    						['Data', 'Count'],

    						<?php
							$element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
							$element_count = [$post_published_count, $post_count, $post_draft_count, $comment_count,  $unapproved_comment_count,  $user_count, $subscribers_count, $category_count];

							for ($i = 0; $i < 8; $i++) {
								echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
							}
							?>
    					]);

    					var options = {
    						chart: {
    							title: '',
    							subtitle: '',
    						}
    					};

    					var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    					chart.draw(data, google.charts.Bar.convertOptions(options));
    				}
    			</script>

    			<div id="columnchart_material" style="width: 1200px; height: 500px;"></div>
			
			<!-- End Google Chart -->
    		</div>

    	</div>
    </div>

    <!-- Footer -->
    <?php include "includes/admin_footer.php" ?>