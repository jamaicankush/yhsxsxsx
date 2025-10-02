<!DOCTYPE html>
<html>
<head>
    <title>Админка - Рекламные тезисы</title>
</head>
<body>
    <h1>Рекламные тезисы</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('ad-theses.create') }}">Добавить новый тезис</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Текст</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adTheses as $thesis)
                <tr>
                    <td>{{ $thesis->id }}</td>
                    <td>{{ $thesis->text }}</td>
                    <td>
                        <a href="{{ route('ad-theses.show', $thesis->id) }}">Просмотр</a> |
                        <a href="{{ route('ad-theses.edit', $thesis->id) }}">Редактировать</a> |
                        <form action="{{ route('ad-theses.destroy', $thesis->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Удалить запись?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if($adTheses->isEmpty())
                <tr><td colspan="3">Записей нет</td></tr>
            @endif
        </tbody>
    </table>
</body>
</html>