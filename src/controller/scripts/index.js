document.getElementById("form-cadastro").addEventListener("submit", async (e) => {
  e.preventDefault();
  const nome = document.getElementById("nome").value;
  const email = document.getElementById("email").value;
  const senha = document.getElementById("senha").value;
  const confirmSenha = document.getElementById("confirm-senha").value;
  if (senha !== confirmSenha) {
    alert("As senhas não coincidem.");
    return;
  }
  const response = await fetch("cadastro.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ nome, email, senha }),
  });

  const result = await response.json();
  if (result.success) {
    window.location.href = "minha-conta.php";
  } else {
    alert("Erro: " + result.message);
  }
});

document.getElementById("form-contato").addEventListener("submit", async (e) => {
  e.preventDefault();
  const nome = document.getElementById("nome").value;
  const email = document.getElementById("email").value;
  const mensagem = document.getElementById("mensagem").value;

  const response = await fetch("contato.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ nome, email, mensagem }),
  });

  const result = await response.json();
  if (result.success) {
    alert("Mensagem enviada com sucesso!");
    document.getElementById("form-contato").reset();
  } else {
    alert("Erro: " + result.message);
  }
});

document.getElementById("form-login").addEventListener("submit", async (e) => {
  e.preventDefault();
  const email = document.getElementById("email").value;
  const senha = document.getElementById("senha").value;

  const response = await fetch("login.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ email, senha }),
  });

  const result = await response.json();
  if (result.success) {
    window.location.href = "minha-conta.php";
  } else {
    alert("Erro: " + result.message);
  }
});