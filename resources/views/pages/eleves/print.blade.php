<!DOCTYPE html>
<html>
<head>
    <title>Liste des élèves</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="card container mt-5">
        <div class="card-body">
            <h1 class="card-title">Liste des élèves</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Classe</th>
                            <!-- Autres colonnes de votre liste d'élèves -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eleves as $eleve)
                            <tr>
                                <td>{{ $eleve->nelev }}</td>
                                <td>{{ $eleve->nom }}</td>
                                <td>{{ $eleve->postnom }}</td>
                                <td>{{ $eleve->prenom }}</td>
                                <td>{{ $eleve->sexe }}</td>
                                <td>{{ $eleve->codclas }}</td>
                                <!-- Autres colonnes de votre liste d'élèves -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-3 no-print">
        <button class="btn btn-primary" onclick="window.print()">Imprimer</button>
    </div>
</body>
</html>