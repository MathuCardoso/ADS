<style>
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .c-head {
        width: 100%;
        height: fit-content;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .c-head img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .c-body {
        padding: 1rem 1.2rem;
        text-align: center;
    }

    .c-body h2 {
        font-size: 1.25rem;
        color: white;
        margin-bottom: 0.8rem;
    }

    .c-body .info {
        font-size: 0.95rem;
        color: white;
        margin-bottom: 1.2rem;
    }

    .c-body p {
        margin: 0.3rem 0;
    }

    .ver-btn {
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 0.6rem 1.2rem;
        cursor: pointer;
        font-weight: 500;
        transition: background 0.2s ease;
    }

    .ver-btn:hover {
        background: #0056b3;
    }
</style>

<div class="list">
    
    <?php require_once App::DIR_COMPONENTS . "menu.php" ?>

    <h1>Categorias Cadastradas</h1>

    <div class="categorias">
        <?php foreach ($categorias as $c): ?>
            <div class="card">
                <div class="c-head">
                    <img src="<?= APP::URL_HTML_UPLOADS . "categorias/" . $c->getLogo(); ?>" alt="<?= $c->getNome(); ?>">
                </div>

                <div class="c-body">
                    <h3><?= htmlspecialchars($c->getNome()); ?></h3>

                    <div class="info">
                        <p><strong>Máx. Pilotos:</strong> <?= $c->getMaxPilotos(); ?></p>
                        <p><strong>Máx. Equipes:</strong> <?= $c->getMaxEquipes(); ?></p>
                    </div>

                    <button class="ver-btn">Ver Detalhes</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>