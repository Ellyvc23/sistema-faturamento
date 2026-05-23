<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cliente - FinTech_Lab</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/cliente.css">
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
                <a href="index.php?acao=nova" class="nav-item"><i class="fa-solid fa-file-invoice-dollar"></i> Faturas</a>
                <a href="#" class="nav-item active"><i class="fa-solid fa-users"></i> Clientes</a>
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
                    <div class="title-icon" style="background-color: #eff6ff; color: #2563eb;"><i class="fa-solid fa-user-plus"></i></div>
                    <div>
                        <h1>Cadastrar Novo Cliente</h1>
                        <p>Adicione uma nova entidade parceira ao banco de dados</p>
                    </div>
                </div>

                <div class="cliente-form-container">
                    <form method="POST" action="index.php?acao=salvar_cliente">
                        <div class="form-group">
                            <label for="nome">Nome do Cliente</label>
                            <input type="text" id="nome" name="nome" placeholder="Nome completo ou Razão Social" required>
                        </div>

                        <div class="form-group">
                            <label for="cnpj_cpf">CPF / CNPJ</label>
                            <input type="text" id="cnpj_cpf" name="cnpj_cpf" placeholder="000.000.000-00" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="exemplo@empresa.com" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-submit"><i class="fa-solid fa-check"></i> Salvar Cliente</button>
                            <a href="index.php" class="btn-cancel">Cancelar</a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>

</body>
</html>