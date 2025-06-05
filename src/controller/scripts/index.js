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