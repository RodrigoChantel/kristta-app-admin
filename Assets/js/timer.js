// Tempo inicial em minutos
let tempoInicial = 5;
let tempoAtual = tempoInicial * 60;

// Elemento HTML para exibir o contador
let contadorElemento = document.getElementById('timer');

// Função para atualizar o contador
function atualizarContador() {
  let minutos = Math.floor(tempoAtual / 60);
  let segundos = tempoAtual % 60;

  // Formata os minutos e segundos com dois dígitos
  let minutosFormatados = minutos < 10 ? '0' + minutos : minutos;
  let segundosFormatados = segundos < 10 ? '0' + segundos : segundos;

  // Atualiza o elemento HTML com o tempo restante
  contadorElemento.textContent = minutosFormatados + ':' + segundosFormatados;

  // Verifica se o tempo chegou a zero
  if (tempoAtual === 0) {
    // Aqui você pode executar alguma ação quando o tempo chegar a zero
    console.log("Redirecionando...");
    window.location.replace("Controller/logout.php");
    // Reinicia o tempo
    tempoAtual = tempoInicial * 60;
  } else {
    // Decrementa o tempo em 1 segundo
    tempoAtual--;
  }
}

// Função para reiniciar o contador
function reiniciarContador() {
  tempoAtual = tempoInicial * 60;
}

// Evento de movimento do mouse
window.addEventListener('mousemove', reiniciarContador);

// Evento de pressionamento de tecla
window.addEventListener('keydown', reiniciarContador);

// Inicializa o contador
atualizarContador();

// Atualiza o contador a cada segundo
setInterval(atualizarContador, 1000);