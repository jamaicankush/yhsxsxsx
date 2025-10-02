<!DOCTYPE html>
<html>
<head>
    <title>Добавить рекламный тезис</title>
</head>
<body>
    <h1>Добавить рекламный тезис</h1>

    @if ($errors->any())
        <div>
            <ul style="color:red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ad-theses.store') }}" method="POST">
        @csrf
        <label>Текст:</label><br>
        <input type="text" name="text" value="{{ old('text') }}" required><br><br>

        <button type="submit">Добавить</button>
    </form>

    <p><a href="{{ route('ad-theses.index') }}">Назад к списку</a></p>
</body>
</html>