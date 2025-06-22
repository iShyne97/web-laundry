<?php require_once '../app/views/templates/header.php'; ?>
<?php require_once '../app/views/templates/sidebar.php'; ?>


<main class="col-start-2 relative bg-base-300 text-base-content overflow-y-auto">
    <div
        class="radial absolute bg-violet-600 w-40 h-40 rounded-full blur-xl animate-blob opacity-70 -translate-y-1/2 right-[50%] top-1/2 lg:w-120 lg:h-120 md:w-80 md:h-80"></div>
    <div
        class="radial absolute bg-yellow-600 w-40 h-40 rounded-full blur-xl animate-blob animation-delay-2000 opacity-70 -translate-y-1/2 left-[50%] top-1/2 lg:w-120 lg:h-120 md:w-80 md:h-80"></div>
    <div
        class="radial absolute bg-pink-600 w-40 h-40 rounded-full blur-xl animate-blob animation-delay-4000 delay-[4s] opacity-70 -translate-x-1/2 -translate-y-1/2 left-1/2 top-[55%] lg:w-120 lg:h-120 md:w-80 md:h-80"></div>
    <section class="p-2 w-full h-full backdrop-blur-xl bg-white/10">
        <?php if (isset($data['dashboard'])) : ?>
            <h1>Ini data dashboard</h1>
        <?php else :
            require_once '../app/views/' . $view . '.php';
        ?>
        <?php endif; ?>
    </section>
</main>
</div>

<?php
require_once '../app/views/templates/footer.php';
?>