<!DOCTYPE html>
<html>
<head>
    <title>Liste des agents</title>
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
            <h1 class="card-title">Liste des agents</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Direction</th>
                            <!-- Autres colonnes de votre liste d'agents -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agents as $agent)
                            <tr>
                                <td>{{ $agent->matri }}</td>
                                <td>{{ $agent->nom }}</td>
                                <td>{{ $agent->postnom }}</td>
                                <td>{{ $agent->prenom }}</td>
                                <td>{{ $agent->sexe }}</td>
                                <td>{{ $agent->cooddir }}</td>
                                <!-- Autres colonnes de votre liste d'agents -->
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