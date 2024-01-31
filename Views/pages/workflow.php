<?php
    require_once('Controller/Solicitacoes.php');
    $teste = new Solicitacoes;
?>
<div class="container-fluid overflow-auto d-block" style="max-height: 100%;">
    <div class="row pt-3">
        <div class="col-md-12 d-flex flex-row flex-nowrap justify-content-between">
            <h6>Workflow</h6>
            <span>Bem-vindo, <?php echo ucwords($_SESSION['user']); ?>!</span>
        </div>
        <hr>
    </div>
    <div class="row">
    </div>
</div>

<div class="container">
    <div class="alert" id="alert" role="alert"></div>
    <h2 class="h2 mt-5 margem">Tutorial - Enviar um cadastro sem refresh com PHP e AJAX</h2>
    <form id="name_form">
        <label>Nome</label>
        <input type="text" name="nome" id="nome" class="form-control margem">
        <label>Telefone</label>
        <input type="text" name="fone" id="fone" class="form-control margem">
        <label>Cidade</label>
        <input type="text" name="cidade" id="cidade" class="form-control margem">
        <input type="button" name="submit" id="submit" class="btn btn-info" value="Cadastrar">
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#submit').click(function(){
            var nome = $('#nome').val();
            var fone = $('#fone').val();
            var cidade = $('#cidade').val();

            $('#alert').html('');
            if (nome == '') {
                $('#alert').html('Preencha o nome.');
                $('#alert').addClass("alert-danger");
                return false;
            }

            $('#alert').html('');
            if (fone == '') {
                $('#alert').html('Preencha o telefone.');
                $('#alert').addClass("alert-danger");
                return false;
            }

            $('#alert').html('');
            if (cidade == '') {
                $('#alert').html('Preencha a cidade.');
                $('#alert').addClass("alert-danger");
                return false;
            }

            $('#alert').html('');

            $.ajax({
                url: 'enviar.php',
                method: 'POST',
                data: {nome: nome, fone: fone, cidade: cidade},
                success: function(result) {
                    $('form').trigger("reset");
                    $('#alert').addClass("alert-success");
                    $('#alert').fadeIn().html(result);
                    setTimeout(function(){
                        $('#alert').fadeOut('slow');
                    }, 3000);
                }
            });
        });
    });
</script>
