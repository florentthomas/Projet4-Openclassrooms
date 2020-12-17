<?php

if(isset($_SESSION['user'])){
?>

<textarea name="create_chapter" cols="30" rows="10"></textarea>
<script>CKEDITOR.replace("create_chapter")</script>    

<?php
}
?>