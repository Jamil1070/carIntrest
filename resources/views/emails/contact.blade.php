<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nieuw contactbericht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        .field {
            margin-bottom: 15px;
            padding: 10px;
            background-color: white;
            border-radius: 3px;
            border-left: 4px solid #007bff;
        }
        .field-label {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
        }
        .field-value {
            margin: 0;
        }
        .message-content {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🚗 Nieuw contactbericht - CarIntrest</h1>
    </div>
    
    <div class="content">
        <p>Er is een nieuw contactbericht ontvangen via de website:</p>
        
        <div class="field">
            <div class="field-label">Naam:</div>
            <p class="field-value">{{ $name }}</p>
        </div>
        
        <div class="field">
            <div class="field-label">Email:</div>
            <p class="field-value">{{ $email }}</p>
        </div>
        
        <div class="field">
            <div class="field-label">Onderwerp:</div>
            <p class="field-value">{{ $subject }}</p>
        </div>
        
        <div class="field">
            <div class="field-label">Bericht:</div>
            <div class="message-content">{{ $messageContent }}</div>
        </div>
        
        <hr style="margin: 20px 0; border: none; border-top: 1px solid #ddd;">
        
        <p style="font-size: 12px; color: #666; text-align: center;">
            Dit bericht is verzonden via het contactformulier op CarIntrest.com<br>
            Verzonden op: {{ date('d-m-Y H:i:s') }}
        </p>
    </div>
</body>
</html>
