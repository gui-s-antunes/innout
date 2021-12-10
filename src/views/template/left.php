<aside class='sidebar'>
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="day_records.php">
                    <i class="icofont-ui-check mr-2">
                        Registrar ponto
                    </i>
                </a>
            </li>
            <li class="nav-item">
                <a href="day_records.php">
                    <i class="icofont-ui-calendar mr-2">
                        Registrar mensal
                    </i>
                </a>
            </li>
            <li class="nav-item">
                <a href=".php">
                    <i class="icofont-chart-histogram mr-2">
                        Registrar gerencial
                    </i>
                </a>
            </li>
            <li class="nav-item">
                <a href="day_records.php">
                    <i class="icofont-users mr-2">
                        Usuário
                    </i>
                </a>
            </li>
        </ul>
    </nav>
    <div class="sidebar-widgets">
        <div class="sidebar-widget">
            <i class="icon icofont-hour-glass text-primary"></i>
            <div class="info">
                <span class="main text-primary">
                    <?= $workedInterval ?>
                </span>
                <span class="label text-muted">Horas trabalhadas</span>
            </div>
        </div>
        <div class="division my-3"></div>
        <div class="sidebar-widget">
            <i class="icon icofont-ui-alarm text-danger"></i>
            <div class="info">
                <span class="main text-danger">
                    <?= $exitTime ?>
                </span>
                <span class="label text-muted">Horas de saída</span>
            </div>
        </div>
    </div>
</aside>