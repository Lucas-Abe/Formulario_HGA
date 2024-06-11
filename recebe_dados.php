<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente = $_POST['paciente'];
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $rg = $_POST['rg'];
    $cns = $_POST['cns'];
    $data_nascimento = $_POST['data-nascimento'];
    $telefone = $_POST['telefone'];
    $nome_mae = $_POST['nome_mae'];
    $cep = $_POST['cep'];
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $doenca = $_POST['doenca'];

    $db = new SQLite3('HGA-DB.sqlite3');

    if (!$db) {
        die("Erro na conexão com o banco de dados");
    }

    $stmt = $db->prepare("INSERT INTO pacientes (nome, email, sexo, genero, rg, cns, data_nascimento, telefone, nome_mae, cep, endereco, bairro, municipio, estado, numero, complemento, doenca)
    VALUES (:nome, :email, :sexo, :genero, :rg, :cns, :data_nascimento, :telefone, :nome_mae, :cep, :endereco, :bairro, :municipio, :estado, :numero, :complemento, :doenca)");

    $stmt->bindParam(':nome', $paciente);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':cns', $cns);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':nome_mae', $nome_mae);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':municipio', $municipio);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':doenca', $doenca);

    $result = $stmt->execute();

    if ($result) {
        echo "Paciente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o paciente.";
    }

    $db->close();
} else {
    echo "Erro: Os dados do formulário não foram recebidos corretamente.";
}
?>
