document.getElementById("email").addEventListener("click", function() {
    const destinatario = "kawadiego.soares@gmail.com.com";
    const assunto = "Assunto do E-mail";
    const corpo = "Olá,\n\nEscreva sua mensagem aqui.\n\nAtenciosamente,\n[Seu Nome]";

    const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${destinatario}&su=${encodeURIComponent(assunto)}&body=${encodeURIComponent(corpo)}`;
    
    window.open(gmailUrl, "_blank"); // Abre o Gmail em uma nova aba
  });