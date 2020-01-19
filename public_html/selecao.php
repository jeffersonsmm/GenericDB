<?php include 'Includes/header.php' ?>

    <div class="Content">
        <table class="TabelaCrud">
            <tr>
                <td>Nome</td>
                <td>Sexo</td>
                <td>Cidade</td>
                <td>Ações</td>
            </tr>

            <!-- Estrutura de loop -->
            <?php
            $Crud=new ClassCrud();
            $BFetch=$Crud->selectDB(
                "*",
                "cadastro",
                "",
                array()
            );

            while($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $Fetch['Nome']; ?></td>
                    <td><?php echo $Fetch['Sexo']; ?></td>
                    <td><?php echo $Fetch['Cidade']; ?></td>
                    <td>
                        <a href="visualizar.php"><img src="IMG/Visualizar.png" alt="Visualizar"></a>
                        <a href="atualizacao.php"><img src="IMG/Editar.png" alt="Editar"></a>
                        <a href="delete.php"><img src="IMG/Lixeira.png" alt="Deletar"></a>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>

<?php include 'Includes/footer.php' ?>