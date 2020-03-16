<?php
	if(isset($_SESSION['email']) && isset($_SESSION['date'])) {
?>       
<div class="session">
    <p>| Votre Email : <?= $_SESSION['email']; ?>  |   Votre date d'inscription : <?= $_SESSION['date']; ?> | </p>
</div>    
<?php
    }
?>