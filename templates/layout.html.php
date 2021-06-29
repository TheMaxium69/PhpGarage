<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titreDeLaPage ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PhpGarage/Gateaux</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?controller=garage&task=index">Garage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?controller=gateau&task=index">Gateau</a>
        </li>
          <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <?php $modelUsers = new \Model\User();
            $LoggedIn = $modelUsers->isLoggedIn();
            if($LoggedIn){ ?>
            
            <ul class="navbar-nav form-inline">
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Compte de <?php $user = $_SESSION['user']; 
                            echo $user['name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?controller=user&task=index">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?controller=user&task=loggout">Se Deconnecter</a></li>
          </ul>
        </li>
        </ul>
           <?php } else { ?>

              <ul class="navbar-nav form-inline">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php?controller=user&task=login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php?controller=user&task=signup">Sign-up</a>
                </li>
              </ul>

            <?php } ?>
      
    </div>
  </div>
</nav>



          <?php echo $contenuDeLaPage?>


<h2>Bas de la page</h2>

<style>
    body{
        background-color: #343a40;
        color: white;
    }
</style>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>