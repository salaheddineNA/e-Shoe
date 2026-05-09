<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preuve de Soumission - {{ $message->submission_id }}</title>
    <style>
        @page {
            margin: 20mm;
            size: A4;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f8f9fa;
            color: #333;
        }
        
        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
            border: 2px solid #e9ecef;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }
        
                
        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        .content {
            padding: 40px;
        }
        
        .submission-id {
            background: #f8f9fa;
            border: 2px dashed #667eea;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .submission-id .label {
            font-size: 14px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        
        .submission-id .value {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            letter-spacing: 2px;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .info-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }
        
        .info-section h3 {
            margin: 0 0 15px 0;
            color: #495057;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .info-item {
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
        }
        
        .info-item .label {
            font-weight: 600;
            color: #6c757d;
            min-width: 80px;
            margin-right: 10px;
        }
        
        .info-item .value {
            color: #495057;
            flex: 1;
        }
        
        .message-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .message-section h3 {
            margin: 0 0 15px 0;
            color: #495057;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .message-content {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            min-height: 100px;
            white-space: pre-wrap;
            line-height: 1.6;
            color: #495057;
        }
        
        .footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }
        
        .footer .logo {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .footer .company-info {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .footer .timestamp {
            background: #e9ecef;
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            color: #495057;
            font-weight: 500;
        }
        
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .badge-subject {
            background: #e7f3ff;
            color: #0066cc;
        }
        
        .badge-status {
            background: #d4edda;
            color: #155724;
        }
        
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 120px;
            color: rgba(102, 126, 234, 0.1);
            font-weight: 700;
            z-index: 0;
            pointer-events: none;
        }
        
        @media print {
            body { margin: 0; }
            .card { box-shadow: none; border: 1px solid #ddd; }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <div class="watermark">SHOESTORE</div>
            <h1>Preuve de Soumission</h1>
            <p>Ce document certifie que votre demande a bien été reçue</p>
        </div>
        
        <div class="content">
            <div class="submission-id">
                <div class="label">Numéro de Soumission</div>
                <div class="value">{{ $message->submission_id }}</div>
            </div>
            
            <div class="info-grid">
                <div class="info-section">
                    <h3>Informations Personnelles</h3>
                    <div class="info-item">
                        <div class="label">Nom:</div>
                        <div class="value">{{ $message->name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Email:</div>
                        <div class="value">{{ $message->email }}</div>
                    </div>
                    @if($message->phone)
                    <div class="info-item">
                        <div class="label">Téléphone:</div>
                        <div class="value">{{ $message->phone }}</div>
                    </div>
                    @endif
                </div>
                
                <div class="info-section">
                    <h3>Détails de la Demande</h3>
                    <div class="info-item">
                        <div class="label">Sujet:</div>
                        <div class="value">
                            <span class="badge badge-subject">{{ $message->getSubjectLabel() }}</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="label">Statut:</div>
                        <div class="value">
                            <span class="badge badge-status">{{ $message->getStatusLabel() }}</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="label">Newsletter:</div>
                        <div class="value">{{ $message->newsletter ? 'Oui' : 'Non' }}</div>
                    </div>
                </div>
            </div>
            
            <div class="message-section">
                <h3>Message</h3>
                <div class="message-content">{{ $message->message }}</div>
            </div>
        </div>
        
        <div class="footer">
            <div class="logo">ShoeStore</div>
            <div class="company-info">
                Votre boutique de chaussures en ligne<br>
                contact@shoestore.fr | +33 1 23 45 67 89
            </div>
            <div class="timestamp">
                Soumis le {{ $message->created_at->format('d/m/Y à H:i') }}
            </div>
        </div>
    </div>
</body>
</html>
