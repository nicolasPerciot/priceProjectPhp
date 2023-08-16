

    <div class="container-fluid">
        <div id="intro" class="row justify-content-center p-5">
            <div class="col-xl-5 col-md-8 p-5">
                <h1 class="p-2 text-warning backcolor rounded-3 text-center">Formulaire de connexion</h1>
                <form class="backcolor  rounded-5 shadow-5-strong p-5" action="?model=User&method=create" method="post" >

                    <div class="form-outline mb-4">
                        <label class="form-label text-danger" for="name">Nom</label>
                        <input type="text" id="name" class="form-control" name="name" />

                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label text-warning" for="firstName">Prénom</label>
                        <input type="text" id="firstName" class="form-control" name="firstName" />

                    </div>
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label text-success" for="username">Nom d'Utilisateur</label>
                        <input type="text" id="username" class="form-control" name="username" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label text-danger" for="password">Mot de passe</label>
                        <input type="password" id="password" class="form-control" name="password" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label text-warning" for="passwordBis">Retapez votre Mot de passe</label>
                        <input type="password" id="passwordBis" class="form-control" name="passwordBis" />
                    </div>


                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block" name="subscribe" > Inscription</button>
                </form>
            </div>
        </div>
    </div>