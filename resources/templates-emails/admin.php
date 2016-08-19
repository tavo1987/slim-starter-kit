<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Email Leads</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                 <h2>Nuevo Cliente:</h2>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <ul>
                        <li><span>Nombre:</span> <?= $lead->name ?></li>
                        <li><span>Apellido:</span> <?= $lead->email ?></li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
