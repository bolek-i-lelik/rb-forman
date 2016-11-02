<?php

?>

<div class="collection">
	<div class="row">
		<?php foreach ($collections as $collection):?>
			<div class="col-lg-4">
				<center>
				<a href="/category/keramamarazzi/<?= $collection->alias ?>">
				<img src="/images/<?= $collection->image ?>" height="150">
				</a>
				</center><br/>
				<center><a href="/category/keramamarazzi/<?= $collection->alias ?>">
					<?= $collection->name ?>
				</a></center>
			</div>
		<?php endforeach;?>
	</div>
</div>