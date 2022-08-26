<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire ajout catégorie </title>


</head>
<body>
    <form method="POST" action="/add/category">
        @csrf
        <div class="mb-6">
            <label class="mb-6">Nom</label>
            <input type="text" name="nom">
        </div>
        <div class="mb-6">
            <label class="mb-6">Description</label>
            <input type="text" name="description">
        </div>
        <div class="mb-6">
            <a href="/home"> <button class="btn-primary">Ajouter</button></a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>