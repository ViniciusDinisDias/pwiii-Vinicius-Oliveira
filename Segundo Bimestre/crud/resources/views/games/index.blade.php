<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Jogos</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #0d0d1a; color: #eee; min-height: 100vh; padding: 40px 20px; }
        h1 { text-align: center; color: #a78bfa; margin-bottom: 30px; font-size: 2rem; }
        .container { max-width: 850px; margin: 0 auto; }
        .btn { padding: 8px 16px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; font-size: 14px; }
        .btn-add { background: #7c3aed; color: white; }
        .btn-add:hover { background: #6d28d9; }
        .btn-blue { background: #1d4ed8; color: white; }
        .btn-blue:hover { background: #1e40af; }
        .btn-red { background: #374151; color: white; }
        .btn-red:hover { background: #4b5563; }
        .alert-success { padding: 12px 16px; background: #052e16; border-left: 4px solid #22c55e; border-radius: 6px; margin-bottom: 20px; color: #22c55e; }
        table { width: 100%; border-collapse: collapse; background: #13132a; border-radius: 10px; overflow: hidden; }
        th { background: #1e1b4b; color: #a78bfa; padding: 14px; text-align: left; }
        td { padding: 12px 14px; border-bottom: 1px solid #ffffff11; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #ffffff06; }
        .topo { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .topo span { color: #888; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎮 Meus Jogos</h1>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <div class="topo">
            <span>{{ count($games) }} jogo(s) cadastrado(s)</span>
            <a href="/games/create" class="btn btn-add">+ Adicionar Jogo</a>
        </div>

        <table>
            <tr>
                <th>Título</th>
                <th>Gênero</th>
                <th>Ano</th>
                <th>Nota</th>
                <th>Ações</th>
            </tr>
            @forelse($games as $game)
            <tr>
                <td>{{ $game->title }}</td>
                <td>{{ $game->genre }}</td>
                <td>{{ $game->release_year }}</td>
                <td>⭐ {{ $game->rating }}/10</td>
                <td>
                    <a href="/games/{{ $game->id }}/edit" class="btn btn-blue">Editar</a>
                    <form action="/games/{{ $game->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" onclick="return confirm('Deletar esse jogo?')">Deletar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding: 30px; color:#555">Nenhum jogo cadastrado ainda.</td>
            </tr>
            @endforelse
        </table>
    </div>
</body>
</html>