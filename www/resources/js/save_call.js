document.getElementById("call_button").addEventListener("click", function(event) {
    const linkElement = event.target.closest("a");
    const contactId = linkElement.getAttribute("data-id");

    // Envoyer une requête AJAX pour enregistrer l'action d'appel
    fetch(`/contacts/${contactId}/call`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        }
    });
});
