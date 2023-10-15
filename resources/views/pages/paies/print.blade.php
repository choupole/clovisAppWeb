<!DOCTYPE html>
<html>
<head>
    <title>Liste de paie des enseignants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="card container mt-5">
        <div class="card-body">
            <h1 class="card-title">Liste de paie des enseignants</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>N°</th>
                            <th>Nom</th>
                            <th>PostNom</th>
                            <th>Prénom</th>
                            <th>Montant</th>
                            <!-- Autres colonnes de votre liste de paie -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paies as $paie)
                            <tr>
                                <td>{{ $paie->npaie }}</td>
                                <td>{{ $paie->enseignant->nom }}</td>
                                <td>{{ $paie->enseignant->postnom }}</td>
                                <td>{{ $paie->enseignant->prenom }}</td>
                                <td>{{ $paie->mont }}</td>
                                <!-- Autres colonnes de votre liste de paie -->
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