<form action="index.php?controller=gateau&task=create" method="post">
    <div>
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name">
    </div>
    <div>
        <label>Gout</label>
        <input type="text" class="form-control" name="gout" placeholder="Gout">
    </div>
    <input type="submit" class="btn btn-success" value="Creer un gateau">
</form>
<?php foreach($gateaux as $gateau){?>

    <div class="row">
        <p><strong>  <?php echo $gateau['name']; ?>  </strong></p>
        <p><strong>  <?php echo $gateau['gout']; ?>  </strong></p>
        <a href="index.php?controller=gateau&task=show&id=<?php echo $gateau['id']; ?>" class="btn btn-primary">Voir ce gateau</a>
        <a href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau['id']; ?>" class="btn btn-danger">Supprimer ce gateau</a>
    </div>
    <hr>



<?php } ?>