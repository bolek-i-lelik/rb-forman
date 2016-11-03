<?php

?>

<div class="collection">
	<div class="row">
		<?php foreach ($products as $product):?>
			<div class="col-lg-4">
				<center>
				<!--<a href="/category/keramaproducts/<?= $product->alias ?>">-->
				<img src="/images/grunt/<?= $product->image ?>" width="150">
				<!--</a>-->
				</center><br/>
			
				<center><a href="/product/<?= $product->alias ?>">
					<?= $product->name ?>
				</a></center><br/><br/>
			</div>
			
		<?php endforeach;?>
	</div>
</div>