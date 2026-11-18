// ===========================================================================
// ARA0062 — comportamento da página
// Este arquivo começa vazio de propósito: o JavaScript entra no ciclo 6.
// Ele já está ligado ao index.html pela linha
// <script src="js/script.js" defer></script>
// ===========================================================================
/* Mascara de telefone */

function mascara(campo, formatacao) {
  v_obj = campo
  v_fun = formatacao
  setTimeout(execmascara, 1);
}
function execmascara() {
  v_obj.value = v_fun(v_obj.value)
}
function mascTelefone(v) {
  v = v.replace(/\D/g, ""); //Remove o que não é numero
  v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses
  v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hifen
  return v;
}
function id(el) {
  return document.getElementById(el);
}
function iniciarPagina() {

  const campoTelefone = document.getElementById("telefone");
  if (campoTelefone) {
    campoTelefone.onkeyup = function () {
      if (typeof mascara === 'function' && typeof mascTelefone === 'function') {
        mascara(this, mascTelefone);
      }
    };
  }



  /* Mascara de email */

  // Função que confere se o e-mail tem @ e .
  function validarEmail(email) {
    const padrao = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    return padrao.test(email);
  }

  const formUsuario = document.getElementById("form");
  const inputEmail = document.getElementById("email");

  if (formUsuario && inputEmail) {
    formUsuario.addEventListener("submit", function (evento) {
      const valorDigitado = inputEmail.value.trim();

      const aviso = document.getElementById("aviso");
      function mostrarAviso(texto, campo) {
        if (aviso) aviso.textContent = texto;
        if (campo) campo.focus();
        evento.preventDefault();
      }

      if (!validarEmail(valorDigitado)) {
        mostrarAviso("Insira um e-mail válido.", inputEmail);
        return;
      }

      // Verifica se a senha tem mais de 5 caracteres e se estão iguais
      const senha = document.getElementById("senha");
      const confirmar = document.getElementById("confirmar");

      if (senha.value.length <= 5) {
        mostrarAviso("A senha deve ter mais de 5 caracteres.", senha);
        return;
      }

      if (senha.value !== confirmar.value) {
        mostrarAviso("As senhas não são iguais.", confirmar);
        return;
      }

      const telefone = document.getElementById("telefone");
      if (telefone) {
        const digitos = telefone.value.replace(/\D/g, "");
        if (digitos.length === 11) {
          telefone.value = "(" + digitos.slice(0, 2) + ") " + digitos.slice(2, 7) + "-" + digitos.slice(7);
        } else if (digitos.length === 10) {
          telefone.value = "(" + digitos.slice(0, 2) + ") " + digitos.slice(2, 6) + "-" + digitos.slice(6);
        } else {
          mostrarAviso("Informe o telefone com DDD.", telefone);
          return;
        }
      }

      // A matrícula precisa ter 12 números
      const campoMatricula = document.getElementById("matricula");
      if (campoMatricula && campoMatricula.value.replace(/\D/g, "").length !== 12) {
        const erro = document.getElementById("erro-matricula");
        if (erro) erro.style.display = "block";
        mostrarAviso("A matrícula deve ter exatamente 12 números.", campoMatricula);
        return;
      }
    });
  }


  /*Mascara de matricula*/

  const inputMatricula = document.getElementById("matricula");
  const mensagemErro = document.getElementById("erro-matricula");

  if (inputMatricula) {
    //Limpa letras enquanto o usuário digita e deixa apenas números
    inputMatricula.addEventListener("input", function () {
      //encontra tudo o que não for número e substitui por nada
      this.value = this.value.replace(/\D/g, "");
    });

    //Verifica se tem 12 números
    inputMatricula.addEventListener("blur", function () {
      const totalCaracteres = this.value.length;

      //Mostra o erro caso não tenha
      if (totalCaracteres > 0 && totalCaracteres !== 12) {
        mensagemErro.style.display = "block";
      } else {
        mensagemErro.style.display = "none";
      }
    });
  }



  /* Máscara de nome próprio */

  const inputNome = document.getElementById("nome");

  if (inputNome) {
    inputNome.addEventListener('input', (e) => {
      let valor = e.target.value;

      //Remove números e caracteres especiais
      valor = valor.replace(/[^a-zA-Z\u00C0-\u00FF\s]/g, "");

      //Primeira letra maiuscula e o resto minuscula
      valor = valor.toLowerCase().replace(/(?:^|\s)\S/g, (letra) => letra.toUpperCase());

      e.target.value = valor;
    });
  }
}

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", iniciarPagina);
} else {
  iniciarPagina();
}



/* Disciplinas vinculadas só aparecem se marcar sim em "disciplinas vinculadas" */

function verificarResposta() {
  const select = document.getElementById("requisito");
  const divChecklist = document.getElementById("checklist-materia");

  if (!select || !divChecklist) return;

  if (select.value.trim().toLowerCase() === "sim") {
    divChecklist.style.display = "block";
  } else {
    divChecklist.style.display = "none";
  }
}

const requisitoSelect = document.getElementById("requisito");

if (requisitoSelect) {
  requisitoSelect.addEventListener("change", verificarResposta);
  verificarResposta();
}

/* Mensagem de sucesso ao enviar o cadastro de disciplina */

const formDisciplina = document.getElementById('form-disciplina');
if (formDisciplina) {
  formDisciplina.addEventListener('submit', function (event) {

    const aviso = document.getElementById('aviso');
    if (aviso) {
      aviso.textContent = 'Disciplina cadastrada com sucesso!';
    }
    verificarResposta();
  });
}

const botaoTema = document.querySelector("#botao-tema");
const temaNoite = document.querySelector("#tema-escuro");
const logotema = document.querySelector("#logotema");
const logopequena = document.querySelector(".logopequena");

function trocarTema() {
  temaNoite.disabled = !temaNoite.disabled;

  // O rótulo acompanha o estado: o botão diz o que ele VAI fazer.
  if (temaNoite.disabled) {
    botaoTema.textContent = "⏾";
    logotema.src = "/studytree/frontend/assets/img/logos/logo-clara.png";
    logopequena.src = "/studytree/frontend/assets/img/logos/pequena.png";

  } else {
    botaoTema.textContent = "☼";
    logotema.src = "/studytree/frontend/assets/img/logos/logo-escura.png";
    logopequena.src = "/studytree/frontend/assets/img/logos/pequena2.png";

  }
}

function desenharArvore() {
  const caixa = document.getElementById("arvore-camadas");
  const svg = document.getElementById("arvore-linhas");
  if (!caixa || !svg) {
    return;
  }

  const camadas = Array.prototype.slice.call(caixa.querySelectorAll(":scope > .arvore-camada"));
  const nos = Array.prototype.slice.call(caixa.querySelectorAll(".arvore-no"));
  const porId = {};
  nos.forEach(function (no) {
    porId[no.dataset.id] = no;
  });

  const ligacoes = [];
  nos.forEach(function (no) {
    const pais = (no.dataset.pais || "").split(",").filter(Boolean);
    pais.forEach(function (idPai) {
      const pai = porId[idPai];
      if (!pai) {
        return;
      }
      const colunaPai = camadas.indexOf(pai.closest(".arvore-camada"));
      const colunaFilha = camadas.indexOf(no.closest(".arvore-camada"));
      ligacoes.push({
        pai: pai,
        no: no,
        salto: colunaFilha - colunaPai
      });
    });
  });

  const saltos = ligacoes.filter(function (ligacao) {
    return ligacao.salto > 1;
  });
  const faixa = 18;
  caixa.style.paddingTop = "0px";
  caixa.style.paddingBottom = saltos.length ? (saltos.length * faixa + 12) + "px" : "0px";

  const rect = caixa.getBoundingClientRect();
  svg.setAttribute("viewBox", "0 0 " + rect.width + " " + rect.height);
  svg.replaceChildren();

  const ns = "http://www.w3.org/2000/svg";
  const defs = document.createElementNS(ns, "defs");
  svg.appendChild(defs);

  const tema = document.getElementById("tema-escuro");
  const escuro = tema && !tema.disabled;
  const destinos = [];
  ligacoes.forEach(function (ligacao) {
    const id = ligacao.no.dataset.id;
    if (destinos.indexOf(id) === -1) {
      destinos.push(id);
    }
  });
  let faixaUsada = 0;
  ligacoes.forEach(function (ligacao, indice) {
    const origem = ligacao.pai.getBoundingClientRect();
    const destino = ligacao.no.getBoundingClientRect();
    const x1 = origem.right - rect.left;
    const y1 = origem.top + origem.height / 2 - rect.top;
    const x2 = destino.left - rect.left;
    const y2 = destino.top + destino.height / 2 - rect.top;
    let d;

    const aproximacao = Math.min(64, Math.max(36, (x2 - x1) * 0.4));
    const chegada = x2 - aproximacao;

    if (ligacao.salto > 1) {
      const yFaixa = rect.height - 8 - faixaUsada * faixa;
      faixaUsada += 1;
      const desce = x1 + 28;
      d = "M " + x1 + " " + y1
        + " L " + desce + " " + y1
        + " L " + desce + " " + yFaixa
        + " L " + chegada + " " + yFaixa
        + " L " + chegada + " " + y2
        + " L " + x2 + " " + y2;
    } else {
      const meio = (x1 + chegada) / 2;
      d = "M " + x1 + " " + y1
        + " C " + meio + " " + y1 + ", " + meio + " " + y2 + ", " + chegada + " " + y2
        + " L " + x2 + " " + y2;
    }

    const cor = corDaSeta(destinos.indexOf(ligacao.no.dataset.id), destinos.length, escuro);
    const idMarcador = "seta-arvore-" + indice;
    const marcador = document.createElementNS(ns, "marker");
    marcador.setAttribute("id", idMarcador);
    marcador.setAttribute("viewBox", "0 0 12 10");
    marcador.setAttribute("markerUnits", "userSpaceOnUse");
    marcador.setAttribute("markerWidth", "14");
    marcador.setAttribute("markerHeight", "12");
    marcador.setAttribute("refX", "12");
    marcador.setAttribute("refY", "5");
    marcador.setAttribute("orient", "auto");
    const ponta = document.createElementNS(ns, "path");
    ponta.setAttribute("d", "M 0 0 L 12 5 L 0 10 z");
    ponta.setAttribute("fill", cor);
    marcador.appendChild(ponta);
    defs.appendChild(marcador);

    const linha = document.createElementNS(ns, "path");
    linha.setAttribute("d", d);
    linha.setAttribute("class", "arvore-linha");
    linha.style.stroke = cor;
    linha.setAttribute("marker-end", "url(#" + idMarcador + ")");
    svg.appendChild(linha);
  });
}

function corDaSeta(indice, total, escuro) {
  const matiz = Math.round((indice * 360) / Math.max(total, 1));
  const luz = escuro ? 68 : 42;
  return "hsl(" + matiz + " 62% " + luz + "%)";
}

function arrastarArvore() {
  const mapa = document.querySelector(".arvore-mapa");
  if (!mapa || mapa.dataset.arraste) {
    return;
  }
  mapa.dataset.arraste = "1";

  let ativo = false;
  let inicioX = 0;
  let inicioScroll = 0;

  mapa.addEventListener("pointerdown", function (evento) {
    if (evento.button !== 0) {
      return;
    }
    ativo = true;
    inicioX = evento.clientX;
    inicioScroll = mapa.scrollLeft;
    mapa.classList.add("arvore-arrastando");
    mapa.setPointerCapture(evento.pointerId);
  });

  mapa.addEventListener("pointermove", function (evento) {
    if (!ativo) {
      return;
    }
    mapa.scrollLeft = inicioScroll - (evento.clientX - inicioX);
  });

  function soltar() {
    ativo = false;
    mapa.classList.remove("arvore-arrastando");
  }

  mapa.addEventListener("pointerup", soltar);
  mapa.addEventListener("pointercancel", soltar);
}

window.addEventListener("load", desenharArvore);
window.addEventListener("resize", desenharArvore);
window.addEventListener("load", arrastarArvore);

// ATENÇÃO: trocarTema, SEM parênteses. Com parênteses — trocarTema() — a
// função rodaria uma vez, agora, ao carregar, e o clique não faria nada.
botaoTema.addEventListener("click", trocarTema);
