<?php

?>

<div class="collection">
	<div class="row">
		<?php foreach ($collections as $collection):?>
			<div class="col-lg-4">
				<center>
				<a href="/category/keramaproducts/<?= $collection->alias ?>">
				<img src="/images/kerama/<?= $collection->alias ?>.jpg" height="150">
				</a>
				</center><br/>
				<center><a href="/category/keramaproducts/<?= $collection->alias ?>">
					<?= $collection->name ?>
				</a></center><br/><br/>
			</div>
		<?php endforeach;?>
	</div>
</div>