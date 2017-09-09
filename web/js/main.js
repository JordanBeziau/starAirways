/**
 * Created by jordanbeziau on 09/09/2017.
 */

Array.from(document.querySelectorAll(".remove-button"))
  .map(button => {
    button.addEventListener("click", event => {
      if (!confirm("Êtes-vous sur de vouloir supprimer ce vol ?")) event.preventDefault()
    })
  })