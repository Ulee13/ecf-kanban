window.addEventListener("DOMContentLoaded", () => {
  // Affichage immédiat du popup avec logo personnalisé
  Swal.fire({
    title: 'Bienvenue sur Kanban !',
    html: '<img src="assets/img/logo-kanban.png" alt="Logo" style="width:450px; margin-bottom: 10px;"><br>Lancement en cours...',
    showConfirmButton: false,
    background: '#FFFFFF',
    color: '#000000',
    timer: 3000
  });

  // Redirection après délai
  setTimeout(() => {
    window.location.href = "./";
  }, 3200);
});
