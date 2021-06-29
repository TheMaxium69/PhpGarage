<?php $user = $_SESSION['user'];?> 
    <h1><?php echo $user['userName']; ?></h1> 
    <h5><?php echo $user['userEmail']; ?></h5>
    <hr>
<a href="index.php?controller=gateau&task=index" class="btn btn-primary">Retour</a>
                            