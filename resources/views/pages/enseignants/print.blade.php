<!DOCTYPE html>
<html>
<head>
    <title>Liste des enseignants</title>
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
            <h1 class="card-title">Liste des enseignants</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Caisse</th>
                            <!-- Autres colonnes de votre liste d'enseignants -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enseignants as $enseignant)
                            <tr>
                                <td>{{ $enseignant->nens }}</td>
                                <td>{{ $enseignant->nom }}</td>
                                <td>{{ $enseignant->postnom }}</td>
                                <td>{{ $enseignant->prenom }}</td>
                                <td>{{ $enseignant->sexe }}</td>
                                <td>{{ $enseignant->codcais }}</td>
                                <!-- Autres colonnes de votre liste d'enseignants -->
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