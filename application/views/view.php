<?php
/*print_r($results);*/
echo "<pre>";
echo($results[0]->content);
echo "</pre>";
echo "<p><em>";
echo($results[0]->title);
echo "</em></p>";
echo "<br />";
echo "<strong>Comments</strong>";
echo "<br />";
echo "<br />";
echo "<strong>TAGS</strong>";
echo "<br />";
echo "<br />";
?>
         <div class="buttons"> 
<a href="/vimup/index.php/vim/" class="negative">back</a>
<a href="/vimup/index.php/vim/delete/<?php echo $results[0]->cid; ?>" class="negative">delete</a>
<a href="/vimup/index.php/vim/edit/<?php echo $results[0]->cid; ?>" class="negative">edit</a>
<button type="submit" class="positive"> favorite </button>    
<a href="/vimup/index.php/vim/view/<?php echo $results[0]->id; ?>" class="negative">view</a>
<a href="/vimup/index.php/vim/plain/<?php echo $results[0]->id; ?>" class="negative">view plain text</a>
</div>
