<h1>
    <strong><em>Nuova richiesta info ricevuto da form Boolfolio</em></strong>
</h1>
<p>
    <hr>
    Hai ricevuto un nuovo messaggio: <br />
    <strong>Nome Utente: </strong> {{ $lead->name }}
    <strong>E-mail: </strong> {{ $lead->email }}
    <strong>Informazioni richieste: </strong><br />
    {{ $lead->content }}
    <hr>
</p>
