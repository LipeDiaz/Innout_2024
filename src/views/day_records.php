<main class="content">
    <?php 
        renderTitle(
            'Registrar Ponto',
            'Mantenha seu ponto consistente',
            'icofont-check-alt'
        );
        include(TEMPLETE_PATH . "/messages.php");
    ?>
    <div class="card">
        <div class="card-header">
            <h3><?= $today ?></h3>
            <p class="mb-0">Os batimentos efetuados</p>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 1: <?= $workingHours->time1 ?? '----'?></span>
                <span class="record">Saída 1: <?= $workingHours->time2 ?? '----'?></span>
            </div>
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 2: <?= $workingHours->time3 ?? '----'?></span>
                <span class="record">Saída 2: <?= $workingHours->time4 ?? '----'?></span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="innout.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Bater o Ponto
            </a>
        </div>
    </div>

    <form class="mt-5" action="innout.php" method="post">
        <div class="input-group no-boder">
            <input type="text" name="forcedTime" class="form-control"
                placeholder="Informa a hora para simular o bantimento">
            <button class="btn btn-danger ml-3">
                Simular Ponto
            </button>
            <!-- Lipe -->
            <button class="btn btn-danger ml-3">
                <a href="data_generator.php" style="text-decoration: none;color:black;">Limpar</a>
            </button>
            <!-- Lipe -->
        </div>
    </form>
</main>
    
