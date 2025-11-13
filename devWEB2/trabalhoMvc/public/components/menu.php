<style>
    header {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 12vh;
        background: black;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding-inline: 10px;
        box-shadow: 2px 0px 10px transparent;

        ul {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            list-style: none;
            gap: 10px;

            li {
                font-size: 1.2rem;
                letter-spacing: 1px;
            }


            a {
                text-decoration: none;
                padding: 5px 7px;
                border-radius: 7px;
                color: white;
                transition: all 0.1s ease;
            }
        }

        #pilotos {
            border: 2px solid var(--roxo);


            &:hover {
                background-color: var(--roxo);
            }
        }

        #equipes {
            border: 2px solid var(--vermelho);

            &:hover {
                background-color: var(--vermelho);
            }
        }

        #categorias {
            border: 2px solid var(--azul);

            &:hover {
                background-color: var(--azul);
            }
        }


    }
</style>

<header style="box-shadow: 
<?= $viewController->routeIs('/pilotos') ? '2px 0px 10px var(--roxo)' : '' ?>
<?= $viewController->routeIs('/equipes') ? '2px 0px 10px var(--vermelho)' : '' ?>
<?= $viewController->routeIs('/categorias') ? '2px 0px 10px var(--azul)' : '' ?>;
">


    <ul>

        <a id="pilotos" href="<?= "/pilotos" ?>"
            style="background-color: <?= $viewController->routeIs('/pilotos') ? 'var(--roxo)' : '' ?>;">
            <li>Pilotos</li>
        </a>
        <a id="equipes" href="<?= "/equipes" ?>"
            style="background-color: <?= $viewController->routeIs('/equipes') ? 'var(--vermelho)' : '' ?>;">
            <li>Equipes</li>
        </a>
        <a id="categorias" href="<?= "/categorias" ?>"
            style="background-color: <?= $viewController->routeIs('/categorias') ? 'var(--azul)' : '' ?>;">
            <li>Categorias</li>
        </a>

    </ul>


</header>