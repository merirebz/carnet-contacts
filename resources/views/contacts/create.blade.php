
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>{{ isset($contact) ? 'Modifier le contact' : 'Ajouter un contact' }}</h2>
    <form action="{{ isset($contact) ? route('contacts.update', $contact->id) : route('contacts.store') }}" method="POST">
        @csrf
        @if(isset($contact))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Entrez le nom" value="{{ $contact->name ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="number" name="phone" class="form-control" id="phone" placeholder="Entrez le téléphone" value="{{ $contact->phone ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Entrez l'email" value="{{ $contact->email ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($contact) ? 'Mettre à jour' : 'Ajouter' }}</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
