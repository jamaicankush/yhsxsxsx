<!DOCTYPE html>
<html>
<head>
    <title>Просмотр рекламного тезиса</title>
</head>
<body>
    <h1>Просмотр рекламного тезиса</h1>

    <p><strong>ID:</strong> {{ $adThesis->id }}</p>
    <p><strong>Текст:</strong> {{ $adThesis->text }}</p>
    <p><strong>Создан:</strong> {{ $adThesis->created_at }}</p>
    <p><strong>Обновлен:</strong> {{ $adThesis->updated_at }}</p>

    <p><a href="{{ route('ad-theses.index') }}">Назад к списку</a></p>
</body>
</html>