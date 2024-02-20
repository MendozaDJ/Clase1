<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condicionales en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .else-message {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
            border-radius: 4px;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
        $primer_numero = 1;
        $segundo_numero = 2;
        $resultado = suma($primer_numero, $segundo_numero);
        if ($resultado >= 5) {
        ?>
            <h1>Tabla de Usuarios</h1>
            <table>
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Julio César</td>
                        <td>Administrador</td>
                        <td>Admin</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mateo</td>
                        <td>Marketing</td>
                        <td>Recursos Humanos</td>
                        <td></td>
                    </tr>
                </tbody>
            </table> 
        <?php 
        } else { 
        ?>
            <div class="else-message">
                <h2>Estructura Else</h2>
                <p>La suma de los números es menor a 5.</p>
            </div>
        <?php 
        } 
        ?> 
    </div>

    <?php 
    function suma($a, $b) {
        return $a + $b;
    }
    ?>
</body>
</html>
