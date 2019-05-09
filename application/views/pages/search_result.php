<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Sugesstion : </h3>
        </div>

<?php
$count=sizeof($data);
if ($count==0) {?>
	<div class="box p-t-10">
		<div class='box-body'>
			<ul class="result">
				<a href="#" class='btn btn-block'>
					<li class='information'>
					<span>Data Tidak Ditemukan ! </span>
					</li>
				</a>
			</ul>
		</div>
	</	div>
<?php } else{ ?>

			<div class='box p-t-10'>
				<div class='box-body'>
					<ul class="result">
					<?php foreach ($data as $key) {?>
						<a href="<?=site_url('C_index/detail_kamus/'.$key->id)?>" class='btn btn-block'>
							<li class='information'>
								<span><?=$key->kata_kunci?></span>
							</li>
						</a>
					<?php }?>
				</ul>
				</div>
			</div>

			<?php
		}

?>
</div>