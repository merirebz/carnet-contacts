<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nom" required>
    <input type="text" name="phone" placeholder="Téléphone" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Ajouter</button>
</form>

</body>
</html>
