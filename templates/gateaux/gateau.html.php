
<h2><?php echo $gateau['name']; ?></h2>

<h3><?php echo $gateau['gout']; ?></h3>


<a href="index.php?controller=gateau&task=add&id=<?php echo $gateau['id']; ?>" class="btn btn-primary">Edit le gateaux</a>
<a href="index.php?controller=gateau&task=index" class="btn btn-primary">Retour aux gateaux</a>
    <?php    echo "<hr>";


    ?>

<?php   ?><?php
