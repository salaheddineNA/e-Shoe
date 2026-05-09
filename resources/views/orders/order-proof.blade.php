<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preuve de Commande - {{ $order->order_number }}</title>
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
        
        .order-number {
            background: #f8f9fa;
            border: 2px dashed #667eea;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .order-number .label {
            font-size: 14px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        
        .order-number .value {
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
        
        .items-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .items-section h3 {
            margin: 0 0 15px 0;
            color: #495057;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .item-table {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .item-header {
            background: #e9ecef;
            padding: 12px 15px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            font-weight: 600;
            color: #495057;
            font-size: 14px;
            border-bottom: 1px solid #dee2e6;
        }
        
        .item-row {
            padding: 12px 15px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            border-bottom: 1px solid #f8f9fa;
            align-items: center;
        }
        
        .item-row:last-child {
            border-bottom: none;
        }
        
        .item-name {
            font-weight: 500;
            color: #495057;
        }
        
        .item-details {
            font-size: 12px;
            color: #6c757d;
            margin-top: 2px;
        }
        
        .summary-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .summary-section h3 {
            margin: 0 0 15px 0;
            color: #495057;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            padding: 5px 0;
        }
        
        .summary-row.total {
            border-top: 2px solid #667eea;
            padding-top: 10px;
            margin-top: 10px;
            font-weight: 700;
            font-size: 18px;
            color: #667eea;
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
        
        .badge-status {
            background: #fff3cd;
            color: #856404;
        }
        
        .badge-payment {
            background: #d1ecf1;
            color: #0c5460;
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
        
        .notes-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .notes-section h3 {
            margin: 0 0 15px 0;
            color: #495057;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .notes-content {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            min-height: 60px;
            white-space: pre-wrap;
            line-height: 1.6;
            color: #495057;
            font-style: italic;
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
            <h1>Preuve de Commande</h1>
            <p>Ce document certifie que votre commande a bien été enregistrée</p>
        </div>
        
        <div class="content">
            <div class="order-number">
                <div class="label">Numéro de Commande</div>
                <div class="value">{{ $order->order_number }}</div>
            </div>
            
            <div class="info-grid">
                <div class="info-section">
                    <h3>Informations Client</h3>
                    <div class="info-item">
                        <div class="label">Nom:</div>
                        <div class="value">{{ $order->customer_name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Email:</div>
                        <div class="value">{{ $order->customer_email }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Téléphone:</div>
                        <div class="value">{{ $order->customer_phone }}</div>
                    </div>
                </div>
                
                <div class="info-section">
                    <h3>Détails de la Commande</h3>
                    <div class="info-item">
                        <div class="label">Date:</div>
                        <div class="value">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="label">Statut:</div>
                        <div class="value">
                            <span class="badge badge-status">{{ ucfirst($order->status) }}</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="label">Paiement:</div>
                        <div class="value">
                            <span class="badge badge-payment">Paiement à la livraison</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h3>Adresse de Livraison</h3>
                <div class="info-item">
                    <div class="value">{{ $order->shipping_address }}</div>
                </div>
            </div>
            
            @if($order->notes)
            <div class="notes-section">
                <h3>Notes</h3>
                <div class="notes-content">{{ $order->notes }}</div>
            </div>
            @endif
            
            <div class="items-section">
                <h3>Articles Commandés</h3>
                <div class="item-table">
                    <div class="item-header">
                        <div>Article</div>
                        <div style="text-align: center;">Quantité</div>
                        <div style="text-align: right;">Prix U.</div>
                        <div style="text-align: right;">Total</div>
                    </div>
                    @foreach($order->orderItems as $item)
                    <div class="item-row">
                        <div>
                            <div class="item-name">{{ $item->product_name }}</div>
                            @if($item->color || $item->size)
                            <div class="item-details">
                                @if($item->color)Couleur: {{ $item->color }}@endif
                                @if($item->color && $item->size) | @endif
                                @if($item->size)Taille: {{ $item->size }}@endif
                            </div>
                            @endif
                        </div>
                        <div style="text-align: center;">{{ $item->quantity }}</div>
                        <div style="text-align: right;">{{ number_format($item->price, 2, ',', ' ') }} €</div>
                        <div style="text-align: right; font-weight: 600;">{{ number_format($item->subtotal, 2, ',', ' ') }} €</div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="summary-section">
                <h3>Résumé Financier</h3>
                <div class="summary-row">
                    <div>Sous-total:</div>
                    <div>{{ number_format($order->total_amount, 2, ',', ' ') }} €</div>
                </div>
                <div class="summary-row">
                    <div>Livraison:</div>
                    <div>{{ $order->total_amount >= 100 ? 'Gratuite' : '5,90 €' }}</div>
                </div>
                <div class="summary-row total">
                    <div>Total à payer:</div>
                    <div>{{ number_format($order->total_amount >= 100 ? $order->total_amount : $order->total_amount + 5.90, 2, ',', ' ') }} €</div>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <div class="logo">ShoeStore</div>
            <div class="company-info">
                Votre boutique de chaussures en ligne<br>
                contact@shoestore.fr | +33 1 23 45 67 89
            </div>
            <div class="timestamp">
                Commande passée le {{ $order->created_at->format('d/m/Y à H:i') }}
            </div>
        </div>
    </div>
</body>
</html>
