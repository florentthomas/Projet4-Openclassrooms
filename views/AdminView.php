<?php

if(isset($_SESSION['user'])){
?>
<a href="<?=URL?>admin/disconnect">Se déconnecter</a>
<textarea name="create_chapter" cols="30" rows="10"></textarea>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>CKEDITOR.replace("create_chapter")</script>    

<?php
}
?>