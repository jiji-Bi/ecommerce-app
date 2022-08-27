<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire ajout catégorie </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
   <div class="container">
        <h2 class="text-center">Ajouter Catégorie</h2>
        @if($message = Session::get('alerte'))
            <div class="alert alert-success">{{ $message }}</div>
         @endif
        <hr/>
            <form  method="POST" action="/categorie/add">
                @csrf 
                <div class="form-group">
                    <label for="">Nom</label> <br/>
                    <input type="text"  name="nom" class="form-control" value="{{@old('nom')}}">
                        @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label > Description de la catégorie</label> <br/>
                    <textarea  name="description" class="form-control">{{@old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            <br/>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
   </div>
</body>
</html>