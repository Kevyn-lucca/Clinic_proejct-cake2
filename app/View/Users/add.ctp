<?php
echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array('integrity' => 'sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH', 'crossorigin' => 'anonymous'));
echo $this->Html->css('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons');
echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css');
echo $this->Html->css('material.css'); // Assumindo que este arquivo está em app/webroot/css/
echo $this->Html->css('demo.css'); // Assumindo que este arquivo está em app/webroot/css/
echo $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
?>

<style>
    .container-left {
        margin-left: 3rem;
        margin-right: auto;
    }
</style>

<div class="container container container-left mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Cadastre-se como usuario</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <fieldset>
                            <div class="mb-3">
                                <label for="username" class="form-label text-black">Nome de usuario</label>
                                <input name="data[User][username]" type="text" id="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-black">Senha</label>
                                <input name="data[User][password]" type="password" id="password" class="form-control" required>
                            </div>
                        </fieldset>
                        <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary">Cadastrar-se</button>
                        <?php echo $this->Form->button(__('Voltar'), [
    'type' => 'button', 
    'class' => 'btn btn-primary',
 'onclick' => 'window.location.href=\'' . $this->Html->url(['controller' => 'users', 'action' => 'login']) . '\''
]); ?>
    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
echo $this->Html->script('https://code.jquery.com/jquery-3.7.1.js', array('integrity' => 'sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=', 'crossorigin' => 'anonymous'));
echo $this->Html->script('https://code.jquery.com/ui/1.14.0/jquery-ui.js', array('integrity' => 'sha256-u0L8aA6Ev3bY2HI4y0CAyr9H8FRWgX4hZ9+K7C2nzdc=', 'crossorigin' => 'anonymous'));
echo $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('integrity' => 'sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz', 'crossorigin' => 'anonymous'));
?>


