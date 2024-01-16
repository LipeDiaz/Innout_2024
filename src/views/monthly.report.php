<main class="content">
    <?php
        renderTitle(
            'Relatório Mensal',
            'Acompenhe seu saldo de horas',
            'icofont-ui-calendar'
        );


    ?>

    <div>
        <form class="mb-4" action="#" method="post">
            <select name="user" class="form-control" placeholder="Seleione o Usuário...">
                <?php 
                    foreach($users as $user) {
                        echo "<option value='{$user->id}'>{$user->name}</option>";
                    }
                ?>
            </select>
            <select name="period" class="form-control" placeholder="Seleione o período...">
                <?php 
                    foreach($periods as $key => $month) {
                        echo "<option value='{$key}'>{$month}</option>";
                    }
                ?>
            </select>
        </form>

        <table class="table table-border table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <th>Dia</th>
                <th>Entrada 1</th>
                <th>Saída 1</th>
                <th>Entrada 2</th>
                <th>Saída 2</th>
                <th>Saldo</th>
            </thead>
            <tbody>
                <?php foreach($report as $registry): ?>
                    <tr>
                        <td><?= formatDateWithLocale($registry->work_date, '%A, %d de %B de %Y')?></td>
                        <td><?= $registry->time1 ?></td>
                        <td><?= $registry->time2 ?></td>
                        <td><?= $registry->time3 ?></td>
                        <td><?= $registry->time4 ?></td>
                        <td><?= $registry->getBalance() ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tr class="bg-primary text-whit">
                <td>Horas Trabalhadas</td>
                <td colspan="3"><?= $sumOfWorkedTime ?></td>
                <td>Saldo Mensal</td>
                <td><?= $balance ?></td>
            </tr>
        </table>
        
    </div>
</main>

