<!DOCTYPE html>
<html>
<head>
    <title>Редактировать рекламный тезис</title>
</head>
<body>
    <h1>Редактировать рекламный тезис</h1>

    @if ($errors->any())
        <div>
            <ul style="color:red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ad-theses.update', $adThesis->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Текст:</label><br>
        <input type="text" name="text" value="{{ old('text', $adThesis->text) }}" required><br><br>

        <button type="submit">Обновить</button>
    </form>

    <p><a href="{{ route('ad-theses.index') }}">Назад к списку</a></p>
</body>
</html>