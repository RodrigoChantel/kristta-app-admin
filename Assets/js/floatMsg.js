// Função para exibir o aviso flutuante
function showFloatingNotice() {
    var floatingNotice = document.getElementById('floatingNotice');
    floatingNotice.style.display = 'block';
    document.getElementById('main').style.filter = 'blur(5px)';
}

// Verificar se o cookie existe
var cookieExists = document.cookie.indexOf('floatingNoticeShown=') !== -1;

if (!cookieExists) {
    // Se o cookie não existir, exibir o aviso flutuante e definir o cookie
    showFloatingNotice();
    document.cookie = 'floatingNoticeShown=true; max-age=43200'; // Definir o cookie por 4 horas (4 * 60 * 60 segundos)
}

function submitWarning() {
    document.getElementById('floatingNotice').style.display = 'none';
    document.getElementById('main').style.filter = 'blur(0)';
}

