	<div class="album py-5 bg-light">
	<div class="container">
	<h3 id="total-posts">Total Posts: N/A</h3>

		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="masonry-area">
			<?php
			use Carbon\Carbon;
            $posts = Post::getAllPost();
			foreach ($posts as $post) {
				$p = new Post($post['id']);
			    ?>

			<div class="col" id="post-<?=$post['id']?>">
				<div class="card shadow-sm">
					<div class="bd-placeholder-img card-img-top"
						style="height: 255px; width: 100%; background: url(<?=$post['file_name']?>); background-position: center; background-size: contain;background-repeat: no-repeat;">
					</div>

					<div class="card-body">
						<p class="card-text"><?=$post['caption']?>
						</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group"
							data-id="<?=$post['id']?>">
								</p>
								<button style="border: 1px solid black; margin: left 50px;" type="button" class="btn btn-sm btn-outline-primary">Like</button>
								<button style="border: 1px solid blue; margin: left 50px;" type="button" class="btn btn-sm btn-outline-secondary">Share</button>
								<?php if(Session::isOwnerOf($post['owner'])){
									?><button type="button" class="btn btn-sm btn-outline-danger btn-delete">Delete</button>
								<?}?>
							</div>

							<small class="text-muted"><?= carbon::parse($post['uploaded_on'])->diffForHumans();?></small>
						</div>
					</div>
				</div>
			</div>
			<?}?>