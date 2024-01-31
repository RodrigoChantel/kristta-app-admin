  function redesSociais() {
    document.getElementById('redes-click').style.display = 'block';
    document.getElementById('idv-click').style.display = 'none';
    document.getElementById('website-click').style.display = 'none';
    document.getElementById('treinamentos-click').style.display = 'none';
  }
  
  function identidadeVisual() {
    document.getElementById('redes-click').style.display = 'none';
    document.getElementById('idv-click').style.display = 'block';
    document.getElementById('website-click').style.display = 'none';
    document.getElementById('treinamentos-click').style.display = 'none';
  }
  
  function webSites() {
    document.getElementById('redes-click').style.display = 'none';
    document.getElementById('idv-click').style.display = 'none';
    document.getElementById('website-click').style.display = 'block';
    document.getElementById('treinamentos-click').style.display = 'none';
  }
  
  function treinamentos() {
    document.getElementById('redes-click').style.display = 'none';
    document.getElementById('idv-click').style.display = 'none';
    document.getElementById('website-click').style.display = 'none';
    document.getElementById('treinamentos-click').style.display = 'block';
  }

  //Menu do início
  function editarCadastro() {
    document.getElementById('editarcadastro').style.display = 'block';
    document.getElementById('resume').style.display = 'none';
    document.getElementById('request').style.display = 'none';
    document.getElementById('archives').style.display = 'none';
    document.getElementById('submitcadastro').style.backgroundColor = '#0b5ed7';
    document.getElementById('submitresumo').style.backgroundColor = 'white';
    document.getElementById('submitarchives').style.backgroundColor = 'white';
    document.getElementById('submitcadastro').style.color = 'white';
    document.getElementById('submitresumo').style.color = 'black';
    document.getElementById('submitarchives').style.color = 'black';
  }

  function editarResume() {
    document.getElementById('editarcadastro').style.display = 'none';
    document.getElementById('resume').style.display = 'block';
    document.getElementById('request').style.display = 'block';
    document.getElementById('archives').style.display = 'none';
    document.getElementById('submitcadastro').style.backgroundColor = 'white';
    document.getElementById('submitresumo').style.backgroundColor = '#0b5ed7';
    document.getElementById('submitarchives').style.backgroundColor = 'white';
    document.getElementById('submitcadastro').style.color = 'black';
    document.getElementById('submitresumo').style.color = 'white';
    document.getElementById('submitarchives').style.color = 'black';
  }

  function editarArchives() {
    document.getElementById('editarcadastro').style.display = 'none';
    document.getElementById('resume').style.display = 'none';
    document.getElementById('request').style.display = 'none';
    document.getElementById('archives').style.display = 'block';
    document.getElementById('submitcadastro').style.backgroundColor = 'white';
    document.getElementById('submitresumo').style.backgroundColor = 'white';
    document.getElementById('submitarchives').style.backgroundColor = '#0b5ed7';
    document.getElementById('submitcadastro').style.color = 'black';
    document.getElementById('submitresumo').style.color = 'black';
    document.getElementById('submitarchives').style.color = 'white';
  }

  //left menu
  function geralSubmit() {
    document.getElementById('geral').style.display = 'block';
    document.getElementById('requests').style.display = 'none';
    document.getElementById('plans').style.display = 'none';
    document.getElementById('financial').style.display = 'none';
    document.getElementById('workflow').style.display = 'none';
    document.getElementById('support').style.display = 'none';

    document.getElementById('editarcadastro').style.display = 'none';
    document.getElementById('resume').style.display = 'block';
    document.getElementById('request').style.display = 'block';
    document.getElementById('archives').style.display = 'none';
    document.getElementById('submitcadastro').style.backgroundColor = 'white';
    document.getElementById('submitresumo').style.backgroundColor = '#0b5ed7';
    document.getElementById('submitarchives').style.backgroundColor = 'white';
    document.getElementById('submitcadastro').style.color = 'black';
    document.getElementById('submitresumo').style.color = 'white';
    document.getElementById('submitarchives').style.color = 'black';
  }

  function requestSubmit() {
    document.getElementById('geral').style.display = 'none';
    document.getElementById('requests').style.display = 'block';
    document.getElementById('plans').style.display = 'none';
    document.getElementById('financial').style.display = 'none';
    document.getElementById('workflow').style.display = 'none';
    document.getElementById('support').style.display = 'none';
  }

  function plansSubmit() {
    document.getElementById('geral').style.display = 'none';
    document.getElementById('requests').style.display = 'none';
    document.getElementById('plans').style.display = 'block';
    document.getElementById('financial').style.display = 'none';
    document.getElementById('workflow').style.display = 'none';
    document.getElementById('support').style.display = 'none';
  }

  function financialSubmit() {
    document.getElementById('geral').style.display = 'none';
    document.getElementById('requests').style.display = 'none';
    document.getElementById('plans').style.display = 'none';
    document.getElementById('financial').style.display = 'block';
    document.getElementById('workflow').style.display = 'none';
    document.getElementById('support').style.display = 'none';
  }

  function workflowSubmit() {
    document.getElementById('geral').style.display = 'none';
    document.getElementById('requests').style.display = 'none';
    document.getElementById('plans').style.display = 'none';
    document.getElementById('financial').style.display = 'none';
    document.getElementById('workflow').style.display = 'block';
    document.getElementById('support').style.display = 'none';
  }

  function supportSubmit() {
    document.getElementById('geral').style.display = 'none';
    document.getElementById('requests').style.display = 'none';
    document.getElementById('plans').style.display = 'none';
    document.getElementById('financial').style.display = 'none';
    document.getElementById('workflow').style.display = 'none';
    document.getElementById('support').style.display = 'block';
  }

  function emitirFaturas() {
    document.getElementById('emitirF').style.display = 'block';
    document.getElementById('emitidasF').style.display = 'none';
  }

  function faturasEmitidas() {
    document.getElementById('emitirF').style.display = 'none';
    document.getElementById('emitidasF').style.display = 'block';
  }


  //ANIMAÇÃO ANTES DE DO CARREGAMENTO
  function aguardarTresSegundos() {
    var botaoEnviar = document.getElementById("meuFormulario").querySelector("button");

    // Ativar animação de carregamento
    document.getElementById('spinner').style.display = 'block';

    //Bur no main
    document.getElementById('editarcadastro').style.filter = 'blur(5px)';

    // Desabilita o botão de envio para evitar múltiplos cliques
    botaoEnviar.disabled = true;

    // Aguarda 3 segundos antes de enviar o formulário
    setTimeout(function() {
      // Habilita o botão de envio novamente
      botaoEnviar.disabled = false;

      // Envia o formulário
      document.getElementById("meuFormulario").submit();
    }, 1000);
  }

  //ANIMAÇÃO ANTES DE DO CARREGAMENTO
  function aguardarTresSegundosRequest() {
    var botaoEnviar = document.getElementById("requestForm").querySelector("button");

    // Ativar animação de carregamento
    document.getElementById('spinner').style.display = 'block';

    //Bur no main
    document.getElementById('requestsForm').style.filter = 'blur(5px)';

    // Desabilita o botão de envio para evitar múltiplos cliques
    botaoEnviar.disabled = true;

    // Aguarda 3 segundos antes de enviar o formulário
    setTimeout(function() {
      // Habilita o botão de envio novamente
      botaoEnviar.disabled = false;

      // Envia o formulário
      document.getElementById("requestForm").submit();
    }, 1000);
  }