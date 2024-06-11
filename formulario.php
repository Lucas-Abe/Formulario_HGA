<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Busca</title>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["rg"]) && !empty($_POST["rg"])) {
            $db = new SQLite3('HGA-DB.sqlite3');

            if (!$db) {
                die("Erro ao conectar ao banco de dados");
            }

            $query = $db->prepare("SELECT * FROM Pacientes WHERE rg = :rg");
            $query->bindValue(':rg', $_POST["rg"], SQLITE3_TEXT);

            $result = $query->execute();

            if ($result) {
                $row = $result->fetchArray(SQLITE3_ASSOC);

                if ($row) {

                    echo "<h2>Informações do Paciente</h2>";
                    echo "<p>Nome: " . $row['nome'] . "</p>";
                    echo "<p>E-mail: " . $row['email'] . "</p>";
                    echo "<p>Sexo: " . $row['sexo'] . "</p>";
                    echo "<p>Gênero: " . $row['genero'] . "</p>";
                    echo "<p>R.G: " . $row['rg'] . "</p>";
                    echo "<p>CNS: " . $row['cns'] . "</p>";
                    echo "<p>Data de Nascimento: " . $row['data_nascimento'] . "</p>";
                    echo "<p>Telefone: " . $row['telefone'] . "</p>";
                    echo "<p>Nome da Mãe: " . $row['nome_mae'] . "</p>";
                    echo "<p>CEP: " . $row['cep'] . "</p>";
                    echo "<p>Endereço: " . $row['endereco'] . "</p>";
                    echo "<p>Bairro: " . $row['bairro'] . "</p>";
                    echo "<p>Município: " . $row['municipio'] . "</p>";
                    echo "<p>Estado: " . $row['estado'] . "</p>";
                    echo "<p>Número: " . $row['numero'] . "</p>";
                    echo "<p>Complemento: " . $row['complemento'] . "</p>";
                    echo "<p>Doença: " . $row['doenca'] . "</p>";
                } else {
                    echo "<p>Nenhum paciente encontrado com o R.G fornecido.</p>";
                }
            } else {
                echo "<p>Ocorreu um erro ao executar a consulta.</p>";
            }

            $db->close();
        } else {
            echo "<p>Por favor, preencha o campo R.G.</p>";
        }
    }
    ?>

</body>

</html>
