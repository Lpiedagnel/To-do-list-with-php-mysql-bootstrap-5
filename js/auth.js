// Register form
const passwordInput = document.getElementById('password-input')
const passwordInputValidation = document.getElementById('password-input-confirmation')
const registerForm = document.getElementById('register-form')
const error = document.getElementById('error')

registerForm.addEventListener('submit', function(event) {
    event.preventDefault()
    if (passwordInput.value === passwordInputValidation.value) {
        registerForm.submit()
    } else {
        error.innerHTML = 
        `
        <div class="alert alert-danger" role="alert">
            Les deux mots de passe doivent être identiques !
        </div>
        `
    }
})

// Delete button alert
function deleteAlert(id) {
    if (window.confirm('Êtes-vous sûr(e) de supprimer cette tâche ?')) {
        window.location.href= `index.php?controller=task&action=delete&id=${id}`
    }
}