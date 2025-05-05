@extends('layouts.app')

@section('content')
<form id="registerForm" method="POST" action="{{ route('register') }}" onsubmit="return validatePassword()">
    @csrf

    <label for="name">Nom</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" required>

    <label for="confirmPassword">Confirmer mot de passe</label>
    <input type="password" id="confirmPassword" required>

    <p id="errorMsg" style="color:red;"></p>

    <button type="submit">S'inscrire</button>
</form>

@if (session('status'))
            <div class="alert alert-success">
                {{session('status')}} 
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

<script>
function validatePassword() {
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const errorMsg = document.getElementById("errorMsg");

  const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

  if (!regex.test(password)) {
    errorMsg.textContent = "Mot de passe faible : min. 8 caractères avec majuscule, minuscule, chiffre et symbole.";
    return false;
  }

  if (password !== confirmPassword) {
    errorMsg.textContent = "Les mots de passe ne correspondent pas.";
    return false;
  }

  return true;
}
</script>
@endsection
