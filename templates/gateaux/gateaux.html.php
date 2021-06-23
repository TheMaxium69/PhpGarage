<?php foreach($gateaux as $gateau){?>

    <div class="row">
        <p><strong>  <?php echo $gateau['name']; ?>  </strong></p>
        <p><strong>  <?php echo $gateau['gout']; ?>  </strong></p>
        <a href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau['id']; ?>" class="btn btn-danger">Supprimer ce garage</a>
    </div>
    <hr>



<?php } ?>