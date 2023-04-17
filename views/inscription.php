<div class="container h-100">
    <?php if(isset($_SESSION['error'])): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <?= $_SESSION['error'] ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-4">
            <div class="card border border-primary border-5">
                <div class="card-header">
                    <h4>Inscription</h4>
                </div>
                <div class="card-body">
                    <form action="/register" method="post">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <label for="name" class="form-label">Nom</label>
                        <input id="name" type="text" class="form-control" name="name" value="<?= $_SESSION['name'] ?? null ?>">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input id="firstname" type="text" class="form-control" name="firstname">
                        <label for="password" class="form-label mt-3">Mot de passe</label>
                        <input id="password" type="password" class="form-control" name="password">
                        <label for="password_confirm" class="form-label mt-3">Confirmation de mot de passe</label>
                        <input id="password_confirm" type="password" class="form-control" name="password_confirm">
                        <button class="btn btn-success btn-sm mt-3" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>