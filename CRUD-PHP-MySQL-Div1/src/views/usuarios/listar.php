<?php
require '../../../config/conexao.php';
require '../../../config/header.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT usucod AS ID,usunom AS NOME,ususen AS SENHA,usutip AS TIPO FROM usuarios ORDER BY usunom;";
$prp = $pdo->prepare($sql);
$prp->execute();
/*
while($data=$prp->fetch(PDO::FETCH_ASSOC)){
    echo $data['NOME'];
}
*/
?>
<form>
    <div class="form-group mt-2">
        <label for="filtro">Digite um Nome para Filtrar</label>
        <input type="text" name="filtrar" id="filtrar" class="form-control">
        <button type="submit" class="btn btn-outline-info mt-2" name="btnfiltrar" id="btnfiltrar">🔎FILTRAR</button>
    </div>
</form>
<div class="d-flex justify-content-end mt-2 mb-2"><a href="http://" class="btn btn-outline-success">📄</a></div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID:</th>
            <th scope="col">NOME:</th>
            <th scope="col">TIPO:</th>
            <th scope="col">OPERAÇÕES:</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($data = $prp->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <th scope="row"><?php echo $data['ID']; ?></th>
                <td><?php echo $data['NOME']; ?></td>
                <td><?php echo $data['TIPO']; ?></td>
                <td><a href="http://" class="btn btn-outline-warning">🖋️</a> <a href="http://" class="btn btn-outline-danger">🗑️</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>