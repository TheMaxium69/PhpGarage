
<h2><?php echo $gateau['name']; ?></h2>

<h3><?php echo $gateau['gout']; ?></h3>


<a href="index.php?controller=gateau&task=add&id=<?php echo $gateau['id']; ?>" class="btn btn-info">Edit le gateaux</a>
<a href="index.php?controller=gateau&task=index" class="btn btn-primary">Retour aux gateaux</a>
    <?php echo "<hr>"; ?>


<?php  if(empty($recipes)) {
    echo "il n'y a pas encore de recette pour ce gateau";
}?>

<?php  foreach($recipes as $recipe){?>

<?php echo $recipe['name'];
echo "<br>";
echo $recipe['desc'];
echo "<br>";
?>
<?php } ?>
