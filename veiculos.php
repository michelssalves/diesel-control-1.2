<?php
session_start();
include 'assets/controllers/config.php';
include 'assets/controllers/veiculosDataBaseAcess.php';
$nivelPremissao = 1;
$login = $_SESSION['usuario'];
$usuario = $_SESSION['nome'];
$permissao =  $_SESSION['id_permissao'];
$id_funcionario = $_SESSION['id_funcionario'];
$token = $_SESSION['token'];
include 'assets/controllers/checkAcess.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="diesel-control-1.2/assets/css/menucontroles.css">
    <script src="diesel-control-1.2/assets/js/sorttable.js"></script>
    <script src="diesel-control-1.2/assets/js/jquery.table2excel.js"></script>
</head>

<body>
    <div class="container-md">
        <div class="container-lg">
            <div class="container-xl">
                <div class="container-xxl">
                    <div class="w3-bar w3-light-grey">
                        <a href="menu-principal-v2" class="w3-bar-item w3-button">Menu Principal</a>
                        <a href="controle-de-combustivel-v2" class="w3-bar-item w3-button">Controles</a>
                        <button class="w3-button w3-green" onClick="table2excel('t1')">Excel</button>
                        <a href="logout-v2" class="w3-bar-item w3-button w3-red w3-right">Sair</a>
                        <a class="w3-bar-item w3-button w3-right"><?= $usuario; ?></a>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <form method="POST">
                                <table style="margin-left:30px;">
                                    <tr>
                                        <th>
                                            <label>
                                                <center>Prefixo
                                            </label><br>
                                            <select onChange="this.form.submit()" name="prefixo">
                                                <option selected><?= ($prefixo <> '' ? $prefixo : 'TODOS') ?></options>
                                                    <?php

                                                    $sql = $pdo->prepare("SELECT * FROM veiculos ORDER BY prefixo");

                                                    $sql->execute();
                                                    $fetchAll = $sql->fetchAll();
                                                    foreach ($fetchAll as $prefixo) {
                                                        echo '<option value="' . $prefixo['prefixo'] . '">' . substr($prefixo['prefixo'], 0, 8) . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </th>
                                        <th>
                                            <label>
                                                <center>Combustivel
                                            </label><br>
                                            <select onChange="this.form.submit()" name="combustivel">
                                                <option selected><?= ($combustivel <> '' ? $combustivel : 'TODOS') ?></options>
                                                <option>TODOS</options>
                                                    <?php
                                                    $sql = $pdo->prepare("SELECT DISTINCT combustivel FROM veiculos  ORDER BY combustivel");
                                                    $sql->execute();
                                                    $fetchAll = $sql->fetchAll();
                                                    foreach ($fetchAll as $combustivel) {
                                                        echo '<option value="' . $combustivel['combustivel'] . '">' . substr($combustivel['combustivel'], 0, 10) . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </th>
                                        <th>
                                            <label>
                                                <center>Marca
                                            </label><br>
                                            <select onChange="this.form.submit()" name="marca">
                                                <option selected><?= ($marca <> '' ? $marca : 'TODOS') ?></options>
                                                <option>TODOS</options>
                                                    <?php
                                                    $sql = $pdo->prepare("SELECT DISTINCT marca FROM veiculos  ORDER BY marca");
                                                    $sql->execute();
                                                    $fetchAll = $sql->fetchAll();
                                                    foreach ($fetchAll as $marca) {
                                                        echo '<option value="' . $marca['marca'] . '">' . substr($marca['marca'], 0, 10) . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </th>
                                        <th>
                                            <label>
                                                <center>Modelo
                                            </label><br>
                                            <select onChange="this.form.submit()" name="modelo">
                                                <option selected><?= ($modelo <> '' ? $modelo : 'TODOS') ?></options>
                                                <option>TODOS</options>
                                                    <?php
                                                    $sql = $pdo->prepare("SELECT DISTINCT modelo FROM veiculos  ORDER BY modelo");
                                                    $sql->execute();
                                                    $fetchAll = $sql->fetchAll();
                                                    foreach ($fetchAll as $modelo) {
                                                        echo '<option value="' . $modelo['modelo'] . '">' . substr($modelo['modelo'], 0, 15) . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </th>
                                        <th>
                                            <label>
                                                <center>Setor
                                            </label><br>
                                            <select onChange="this.form.submit()" name="setor">
                                                <option selected><?= ($setor <> '' ? $setor : 'TODOS') ?></options>
                                                <option>TODOS</options>
                                                    <?php
                                                    $sql = $pdo->prepare("SELECT DISTINCT setor FROM veiculos  ORDER BY setor");
                                                    $sql->execute();
                                                    $fetchAll = $sql->fetchAll();
                                                    foreach ($fetchAll as $setor) {
                                                        echo '<option value="' . $setor['setor'] . '">' . substr($setor['setor'], 0, 15) . '</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </th>
                                        <th>
                                            <label>Mostrar Desativados</label><br>
                                            <center><input onChange="this.form.submit()" type="checkbox" id="status" name="status" value="checked" <?= $status ?>>
                                        </th>
                                        <th>
                                            <label>
                                                <center>
                                            </label><br>
                                            <button class="w3-button w3-blue" name="acao" value="filtrar" type="submit">Filtrar</button>
                                        </th>
                                        <th>
                                            <label>
                                                <center>
                                            </label><br>

                                            <?php $link = "PopupCenter('cadastrarVeiculo',' Cadastrar Veiculos',400,900)"; ?>
                                            <button onclick="<?= $link ?>" type="button" class="w3-button w3-black">Cadastrar</button>
                                        </th>
                                        <th>
                                            <label>
                                                <center>
                                            </label><br>
                                            <button class="w3-button w3-grey" name="acao" value="limpar" type="submit">Limpar</button>
                                        </th>

                                    </tr>
                                </table>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <table id="t1" class="table table-striped table-bordered table-hoverable">
        <thead class="thead-dark">
            <tr>
                <th>
                    <center>#
                </th>
                <th>
                    <center>N?? Equip
                </th>
                <th>
                    <center>Prefixo
                </th>
                <th>
                    <center>Placa
                </th>
                <th>
                    <center>Descricao
                </th>
                <th>
                    <center>Renavam
                </th>
                <th>
                    <center>Chassi
                </th>
                <th>
                    <center>N?? Motor
                </th>
                <th>
                    <center>Ano
                </th>
                <th>
                    <center>Marca
                </th>
                <th>
                    <center>Modelo
                </th>
                <th>
                    <center>Combustivel
                </th>
                <th>
                    <center>Metodo
                </th>
                <th>
                    <center>Setor
                </th>
                <th>
                    <center>Status
                </th>
            </tr>
        </thead>
        <tbody>
            <?= filtrarVeiculos($filtroPrefixo, $filtroCombustivel, $filtroMarca, $filtroModelo, $filtroSetor, $filtroStatus) ?>
        </tbody>
    </table>
    <script src="diesel-control-1.2/assets/js/scripts.js"></script>
</body>
</html>
