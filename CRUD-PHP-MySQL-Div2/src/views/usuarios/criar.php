<?php
require '../../../config/conexao.php';
require '../../../config/header.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //USUNOM USUSEN USUTIP
    $nome = strtoupper(filter_input(INPUT_POST,'unom'));
    $senha = strtoupper(filter_input(INPUT_POST,'usen'));
    $tipo = strtoupper(filter_input(INPUT_POST,'utip'));
    $sql = "INSERT INTO usuarios(usunom,ususen,usutip)VALUES(?,?,?);";
    $prp = $pdo->prepare($sql);
    if ($prp->execute([$nome,$senha,$tipo])) {
        $msg = '<span class="alert alert-success text-center">DADOS GRAVADOS COM SUCESSO!</span>';
    } else {
        $msg = '<span class="alert alert-danger text-center">ERRO AO GRAVAR OS DADOS!</span>';
    }
}
?>
<form action="" method="post" class="mt-3">
    <div class="form-group mt-2">
        <label for="unom">NOME:</label>
        <input type="text" name="unom" id="unom" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="usen">SENHA:</label>
        <input type="password" name="usen" id="usen" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="utip">TIPO:</label>
        <select class="form-select" name="utip" id="utip">
            <option selected>Selecione o Tipo de Usuário</option>
            <option value="Atendente">Atendente</option>
            <option value="Enfermeira">Enfermeira</option>
            <option value="Medico">Médico</option>
            <option value="Paciente">Paciente</option>
        </select>
    </div>
    <button type="submit" class="btn btn-outline-primary mt-3">GRAVAR</button>
</form>
<div class="text-center mt-3"><?php echo $msg;?></div>