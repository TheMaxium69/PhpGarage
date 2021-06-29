<?php $user = $_SESSION['user'];?> 
    <h1><?php echo $user['name']; ?></h1> 
    <h5><?php echo $user['email']; ?></h5>
    <hr>
<a href="index.php?controller=gateau&task=index" class="btn btn-primary">Retour</a>
                            