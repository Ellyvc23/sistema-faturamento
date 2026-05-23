<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Faturamento - FinTech_Lab</title>
    <link rel="stylesheet" href="../public/css/relatorio.css">
</head>
<body>

    <h1>Relatório Geral de Faturamento</h1>

    <table>
        <thead>
            <tr>
                <th>Cód.</th>
                <th>Cliente</th>
                <th>Data Emissão</th>
                <th>Vencimento</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaFatura as $fatura): ?>
                <tr>
                    <td><?= $fatura['id']; ?></td>
                    <td><?= $fatura['nome']; ?></td>
                    <td><?= date('d/m/Y', strtotime($fatura['data_emissao'])); ?></td>
                    <td><?= date('d/m/Y', strtotime($fatura['data_vencimento'])); ?></td>
                    <td>R$ <?= number_format($fatura['valor'], 2, ',', '.'); ?></td>
                    <td><?= $fatura['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>

</body>
</html>