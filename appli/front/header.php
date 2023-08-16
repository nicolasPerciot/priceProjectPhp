<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./front/static/css/style.css">
    <title>Rent Car</title>
</head>
<body>
    <header class="container-fluid col-12 bg-black">
        <div class="row">
            <h1 class="col-10 offset-1 text-center p-4 ">
                Rent Car Predict
            </h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
              <div class="container-fluid">
                <a class="navbar-brand" href="?"><i class="fa-2x fa-solid fa-car-burst text-secondary"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                  <ul class="navbar-nav me-auto">
                    <div class="dropdown text-danger">
                        <div class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="text-danger">Connect</div>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item text-danger" href="?model=User&method=loginView">Connexion</a>
                            <a class="dropdown-item text-warning" href="?model=User&method=createView">Inscription</a>
                            <?php if( !empty($_SESSION['username']) ){ ?>
                                <a class="dropdown-item text-success" href="?model=User&method=disconnect">Déconnexion</a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if( !empty($_SESSION['username']) ){ ?>
                    <div class="dropdown">
                        <div class="nav-link " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="text-success">Predict</div>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="?model=Car&method=predictAllView">Predict All</a>
                            <a class="dropdown-item" href="?model=Car&method=predictLiteView">Predict Lite</a>
                        </div>
                    </div>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </nav>
    </header>