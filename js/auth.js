// Register form
const passwordInput = document.getElementById('password-input')
const passwordInputValidation = document.getElementById('password-input-confirmation')
const submitButton = document.getElementById('submit-button')
const error = document.getElementById('error')

function passwordConfirmation(e) {
    e.preventDefault()
    console.log('Hello world!')
    if (passwordInput.value !== passwordInputValidation.value) {
        error.innerHTML = 
        `
        <div class="alert alert-danger" role="alert">
            Les mots de passe ne sont pas identiques.
        </div>
        `
    }
}

submitButton.addEventListener('submit', passwordConfirmation(e))