<h2>Relevé de Notes</h2>

<p>Nom : {{ $etudiant->nom }}</p>
<p>Classe : {{ $etudiant->classe->nom }}</p>

<table border="1" width="100%" cellspacing="0" cellpadding="5">
    <tr>
        <th>Matière</th>
        <th>Coefficient</th>
        <th>Note</th>
    </tr>

    @foreach($etudiant->notes as $note)
        <tr>
            <td>{{ $note->matiere->nom }}</td>
            <td>{{ $note->matiere->coefficient }}</td>
            <td>{{ $note->note }}</td>
        </tr>
    @endforeach
</table>

<p>Moyenne : {{ $etudiant->moyenne }}</p>
<p>Statut : {{ $etudiant->statut }}</p>
