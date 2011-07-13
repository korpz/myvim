
<?php 

foreach($results as $result) {
	echo "<pre>", $result->content, "</pre><br />"; ?>
         <div class="buttons"> 
			 <button type="submit" class="positive"> favorite </button>    
			<a href="/vimup/index.php/vim/view/<?php echo $result->id; ?>" class="negative">view</a>
			<a href="/vimup/index.php/vim/plain/<?php echo $result->id; ?>" class="negative">view plain text</a>
			<a href="/vimup/index.php/vim/delete/<?php echo $result->id; ?>" class="negative">delete</a>
		</div>
		<div style="clear:both"></div>
	<?php
	}

