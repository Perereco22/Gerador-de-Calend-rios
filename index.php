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
            background-color: #08520b;
            border: 7px solid #000000;
            padding: 10px;
        }
        th {
            background-color: rgba(155, 23, 23)
        }
    #mes{
            background-color: #9c0404;
            color: black;
            padding: 5px;
            border: 3px solid rgb(6, 108, 8);
            border-radius: 5px;
            text-align: center;
    
        }
    #ano{

        background-color: #9c0404;
        color: #000000;
        padding: 5px;
        border: 3px solid rgb(6, 108, 8);
        border-radius: 5px;
        text-align: center;
        
    }

        body{
            background-image:url( https://th.bing.com/th/id/OIP.fhMJJDkQuOWYzlOHOnvvzwHaE7?w=251&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7
        )
            
        }
    </style>
</head>
<body>
    
    <h1>Calendário
    <form method="GET">
        <div style=text-align:center>
        <label for="mes">Mês:</label>
        <input type="number" id="mes" name="mes" min="1" max="12" value="<?= date('m') ?>" required>
        <label for="ano">Ano:</label>
        <input type="number" id="ano" name="ano" min="1900" max="2100" value="<?= date('Y') ?>" required>
        <button type="submit">Gerar</button>
        </div>
    </h1>
    </form>
    <br>

    <?php
    if (isset($_GET['mes']) && isset($_GET['ano'])) 
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
    
    ?>
</body>
</html>
