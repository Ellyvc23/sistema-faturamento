<?php

use Controllers\FinanceiroController;

    require_once('../controllers/FinanceiroController.php');
    require_once('../config/Database.php');
    require_once('../models/Fatura.php');

    $teste = new FinanceiroController();
    $teste->index();