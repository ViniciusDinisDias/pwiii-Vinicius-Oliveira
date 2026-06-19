<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Jogo</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #0d0d1a; color: #eee; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { background: #13132a; padding: 40px; border-radius: 12px; width: 100%; max-width: 480px; border: 1px solid #2e2b6e; }
        h1 { color: #a78bfa; margin-bottom: 8px; }
        a { color: #666; font-size: 13px; text-decoration: none; display: block; margin-bottom: 25px; }
        a:hover { color: #a78bfa; }
        label { font-size: 13px; color: #aaa; display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 10px; margin-bottom: 6px; background: #1e1b4b; border: 1px solid #3730a3; border-radius: 6px; color: #eee; font-size: 14px; }
        input:focus { outline: none; border-color: #a78bfa; }
        .error { color: #f87171; font-size: 12px; margin-bottom: 12px; display: block; }
        .grupo { margin-bottom: 16px; }
        .btn { width: 100%; padding: 12px; background: #1d4ed8; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 15px; margin-top: 10px; }
        .btn:hover { background: #1e40af; }
    </style>
</head>
<body>
    <div class="card">
        <h1>✏️ Editar Jogo</h1>
        <a href="/games">← Voltar para lista</a>

        <form action="/games/{{ $game->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grupo">
                <label>Título</label>
                <input type="text" name="title" value="{{ old('title', $game->title) }}">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo">
                <label>Gênero</label>
                <input type="text" name="genre" value="{{ old('genre', $game->genre) }}">
                @error('genre') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo">
                <label>Ano de Lançamento</label>
                <input type="number" name="release_year" value="{{ old('release_year', $game->release_year) }}">
                @error('release_year') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo">
                <label>Nota (0 a 10)</label>
                <input type="number" step="0.1" name="rating" value="{{ old('rating', $game->rating) }}">
                @error('rating') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn">Atualizar Jogo</button>
        </form>
    </div>
</body>
</html>