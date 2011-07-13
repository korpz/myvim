<?php 

foreach($results as $result) {
	echo "<pre>"; 
	echo $result->content, "</pre><br />"; 
	echo "<p style='margin-top:-20px;'><em>", $result->title, "</em></p>";
	?>
         <div class="buttons"> 
			 <button type="submit" class="positive"> favorite </button>    
			<a href="/vimup/index.php/vim/view/<?php echo $result->id; ?>" class="negative">view</a>
			<a href="/vimup/index.php/vim/plain/<?php echo $result->id; ?>" class="negative">view plain text</a>
			<a href="/vimup/index.php/vim/delete/<?php echo $result->id; ?>" class="negative">delete</a>
			<a href="/vimup/index.php/vim/edit/<?php echo $result->id; ?>" class="negative">edit</a>
		</div>
		<div style="clear:both"><br /></div>
	<?php
	}

