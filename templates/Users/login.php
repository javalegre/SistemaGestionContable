<div class="middle-box loginscreen animated fadeInDown">
    <div class="text-center">
        <h3>Bienvenido a </h3>
        <h1><?= $system_abbr ?></h1>
        <strong><?= $system_name ?></strong>
        <br>
        <p>Un Sistema de Gestión diseñado para responder a las necesidades dinámicas de la producción agrícola.</p>
        <?= $this->Form->create() ?>
        <fieldset>
            <input id="username" name="username" type="text" class="form-control" placeholder="Username" required="">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="">
        </fieldset>
        <br>
        <?= $this->Form->button('Ingresar al sistema',['class'=>'btn btn-primary block full-width m-b button']) ?>
        <?= $this->Form->end() ?>
        <p class="m-t"><small><strong>Copyright</strong> <?= $system_name.' '.$version ?> &copy; <?= $year ?></p>
    </div>
</div>