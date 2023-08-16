

    <div class="container-fluid">
        <div id="intro" class="row justify-content-center p-5">
            <div class="col-xl-5 col-md-8 p-5">
                <h1 class="p-2 text-warning backcolor rounded-3 text-center">Formulaire de connexion</h1>
                <form class="backcolor rounded-5 shadow-5-strong p-5" action="?model=User&method=login" method="post" >
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label text-warning" for="form1Example1">Nom d'Utilisateur</label>
                        <input type="text" id="form1Example1" class="form-control" name="username" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label text-warning" for="form1Example2">Password</label>
                        <input type="password" id="form1Example2" class="form-control" name="password" />

                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                          <label class="form-check-label text-warning" for="form1Example3">
                            Remember me
                          </label>
                        </div>
                      </div>

                      <div class="col text-center">
                        <!-- Simple link -->
                        <a href="#!" class="text-warning">Forgot password?</a>
                      </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block" name="Connect" >Connection</button>
                </form>
            </div>
        </div>
    </div>
