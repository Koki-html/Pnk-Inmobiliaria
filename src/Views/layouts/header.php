<body>

    <header>

        <a href="/" id="Index-Href">

            <div id="Logo-Container">

                <img
                    src="/img/icon/Pnk.png"
                    alt="Pnk logo"
                    id="logo"
                >

                <p id="Tittle">
                    Pnk Inmobiliaria
                </p>

            </div>

        </a>

        <div id="Form-Container">

            <button id="Dark-Mode">

                <img
                    src="/img/dark-mode.png"
                    class="theme-mode"
                    id="Dark-Mode-Icon"
                    alt="Modo oscuro"
                >

                <img
                    src="/img/light-mode.png"
                    class="theme-mode"
                    id="Light-Mode-Icon"
                    alt="Modo claro"
                >

            </button>

            <?php if (isset($_SESSION['user_id'])): ?>

                <?php

                $dashboardUrl = '/';

                if (isset($_SESSION['rol'])) {

                    switch ($_SESSION['rol']) {

                        case 1:
                            $dashboardUrl = '/admin';
                            break;

                        case 2:
                            $dashboardUrl = '/owner';
                            break;
                    }
                }

                ?>

                <a href="<?= $dashboardUrl ?>">

                    <button
                        class="button-form"
                        id="Dashboard-Form"
                    >
                        Dashboard
                    </button>

                </a>

                <a href="/logout">

                    <button
                        class="button-form"
                        id="Logout-Form"
                    >
                        Cerrar Sesión
                    </button>

                </a>

            <?php else: ?>

                <a href="/login">

                    <button
                        class="button-form"
                        id="Login-Form"
                    >
                        Iniciar Sesión
                    </button>

                </a>

                <a href="/register-owner">

                    <button
                        class="button-form"
                        id="Owner-Form"
                    >
                        Publica tu propiedad
                    </button>

                </a>

            <?php endif; ?>

        </div>

    </header>
