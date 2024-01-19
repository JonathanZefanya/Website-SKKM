	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb" style="padding-top: 25px;">
	 	<div class="row">

	 		<! -- SINGLE POST -->
	 		<div class="col-lg-8">
				<?php foreach ($single as $row) { ?>
					<a href="<?php echo site_url('pengumuman/'.$row->slug);?>"><h3 class="ctitle"><?php echo $row->judul; ?></h3></a>
					<p><csmall><?php echo $row->tanggal; ?></csmall> | <csmall2><?php echo $row->nama_lengkap; ?></csmall2></p>
					<p>
						<?php echo $row->isi_pengumuman; ?>
					</p>
				<?php } ?>

		 		<div class="spacing"></div>

			</div><! --/col-lg-8 -->


	 		<! -- SIDEBAR -->
	 		<div class="col-lg-4">
		 		<h4>Daftar Pengumuman</h4>
		 		<div class="hline"></div>
					<ul class="popular-posts">
						<?php foreach ($daftar_pengumuman as $row): ?>
								<li>
									<a href="<?php echo site_url('pengumuman/'.$row->slug); ?>"><?php echo $row->judul; ?></a>
									<em>Posted on <?php echo $row->tanggal; ?></em>
								</li>
						<?php endforeach; ?>
		      		</ul>
	 		</div>
	 	</div><! --/row -->
	 </div><! --/container -->
