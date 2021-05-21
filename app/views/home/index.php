<div class="container mt-4">
    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more <i class="fas fa-arrow-right"></i></a>
        </p>
    </div>
    <div class="mt-3">
        <form id="formInput" method="POST">
            <div class="form-group">
                <label for="fullName">Nama Lengkap</label>
                <input type="text" class="form-control" name="full_name" id="fullName">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane"></i> Simpan</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tBody"></tbody>
            </table>
        </div>
    </div>
</div>