<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Debug Page</title>
    <style>
        body {
            background: white;
            color: black;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
        }
        .info {
            background: #e8f4f8;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Page de Debug</h1>
        
        <div class="info">
            <h3>Informations PHP</h3>
            <p>Version PHP: <?php echo phpversion(); ?></p>
            <p>Date actuelle: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
        
        <div class="info">
            <h3>Informations Laravel</h3>
            <p>Version Laravel: <?php echo app()->version(); ?></p>
            <p>Environment: <?php echo app()->environment(); ?></p>
        </div>
        
        <div class="info">
            <h3>Test de couleurs</h3>
            <p style="color: red;">Texte rouge</p>
            <p style="color: blue;">Texte bleu</p>
            <p style="color: green;">Texte vert</p>
            <p style="background: yellow; color: black;">Fond jaune</p>
        </div>
        
        <div class="info">
            <h3>Test des assets</h3>
            @if (file_exists(public_path('build/manifest.json')))
                <p>✅ Manifest Vite trouvé</p>
            @else
                <p>❌ Manifest Vite non trouvé</p>
            @endif
            
            @if (file_exists(public_path('hot')))
                <p>✅ Fichier hot trouvé</p>
            @else
                <p>❌ Fichier hot non trouvé</p>
            @endif
        </div>
    </div>
</body>
</html>
