<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário Dinâmico</title>
    <style>
        h1 {
            margin: center;
            text-align:center ;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            text-align:center;
        }
        th, td {
            background-color: #ffd502bc;
            border: 2px solid #000000;
            padding: 10px;
        }
        th {
            background-color: rgb(155, 23, 23)
        }
    </style>
</head>
<body>
    <h1>Calendário</h1>
    <form method="GET">
        <label for="mes">Mês:</label>
        <input type="number" id="mes" name="mes" min="1" max="12" value="<?= date('m') ?>" required>
        <label for="ano">Ano:</label>
        <input type="number" id="ano" name="ano" min="1900" max="2100" value="<?= date('Y') ?>" required>
        <button type="submit">Gerar</button>
    </form>
    <br>

    <?php
    if (isset($_GET['mes']) && isset($_GET['ano'])) {
        $mes = (int)$_GET['mes'];
        $ano = (int)$_GET['ano'];

        
        $primeiroDia = mktime(0, 0, 0, $mes, 1, $ano);
        $diasNoMes = date('t', $primeiroDia);
        $diaDaSemana = date('w', $primeiroDia); // 0 (domingo) a 6 (sábado)

        
        $diasSemana = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

        echo "<h2>Calendário de " . date('F', $primeiroDia) . " de $ano</h2>";
        echo "<table>";
        echo "<tr>";
        foreach ($diasSemana as $dia) {
            echo "<th>$dia</th>";
        }
        echo "</tr><tr>";

        
        for ($i = 0; $i < $diaDaSemana; $i++) {
            echo "<td></td>";
        }

        
        for ($dia = 1; $dia <= $diasNoMes; $dia++) {
            echo "<td>$dia</td>";
            
            if (($dia + $diaDaSemana) % 7 == 0) {
                echo "</tr><tr>";
            }
        }

        
        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
