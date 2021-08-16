<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet MVC</title>

    <link rel="stylesheet" href="/boostrap/css/bootstrap.css">
    <script type="text/javascript" src="/js/jquery.js"></script>

</head>
<body>

    <div class="container">
        @yield("content")
    </div>
 
    <!-- @todo créer un footer et remplacer par un lien vers le fichier de js -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
                var file = e.target.files[0].name;
                $("#image").after(file);
            });
        });
    </script>
</body>
</html>