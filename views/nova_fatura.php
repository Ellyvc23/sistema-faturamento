<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Fatura - Sistema de Faturamento</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-container">
        <aside class="sidebar">
            <div class="logo-area">
                <h2><i class="fa-solid fa-wallet"></i> FinTech_Lab</h2>
            </div>
            
            <a href="index.php" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Voltar ao Painel</a>
            
            <nav class="menu-nav">
                <a href="index.php" class="nav-item"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a href="#" class="nav-item active"><i class="fa-solid fa-file-invoice-dollar"></i> Faturas</a>
                <a href="index.php?acao=cliente" class="nav-item"><i class="fa-solid fa-users"></i> Clientes</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-header">
                <div class="search-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <form method="GET" action="index.php">
                        <input type="text" name="busca" placeholder="Buscar por cliente ou código da fatura...">
                    </form>
                </div>
                
                <div class="header-actions">
                    <button class="icon-btn"><i class="fa-regular fa-sun"></i></button>
                    <button class="icon-btn"><i class="fa-regular fa-bell"></i></button>
                    <div class="user-profile">
                        <i class="fa-regular fa-circle-user"></i>
                        <span>Admin</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-body">
                <div class="page-title">
                    <div class="title-icon"><i class="fa-solid fa-plus"></i></div>
                    <div>
                        <h1>Emitir Nova Fatura</h1>
                        <p>Preencha os campos abaixo para gerar uma nova cobrança</p>
                    </div>
                </div>

                <div class="form-container">
                    <form method="POST" action="index.php?acao=salvar">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <select id="cliente" name="cliente_id" required>
                                <option value="">Selecione um cliente...</option>
                                <?php foreach($listaClientes as $cli): ?>
                                    <option value="<?= $cli['id']; ?>"><?= $cli['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="data_emissao">Data de Emissão</label>
                                <input type="date" id="data_emissao" name="data_emissao" required>
                            </div>
                            <div class="form-group">
                                <label for="data_vencimento">Data de Vencimento</label>
                                <input type="date" id="data_vencimento" name="data_vencimento" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="valor">Valor (R$)</label>
                            <input type="number" id="valor" name="valor" step="0.01" min="0.01" placeholder="0,00" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-submit"><i class="fa-solid fa-check"></i> Salvar Fatura</button>
                            <a href="index.php" class="btn-cancel">Cancelar</a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>

</body>
</html>