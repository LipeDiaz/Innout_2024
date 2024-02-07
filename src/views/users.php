<main class="content">
    <?php
        renderTitle(
            'Cadastro  de Usuários',
            'Mantenha os dados dos usuários atualizados',
            'icofont-users'
        );

        include(TEMPLETE_PATH . "/messages.php")
    ?>

    <a class="btn btn-lg btn-primary"
        href="save_user.php">Novo Usuário</a>
    
    <table class="table table-bordered table-striped table-hover mt-4">
        <thead class="thead-dark">
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Adimissão</th>
            <th>Data de Desligamento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->start_date ?></td>
                    <td><?= $user->end_date ?></td>
                    <td>
                        <a href="save_user.php?update=<?= $user->id ?>" 
                            class="btn btn-warning rounded-circle ml-3 mr-4">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?= $user->id ?>" 
                            class="btn btn-danger rounded-circle">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>