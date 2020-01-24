<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($results)
        {!! nl2br($results) !!}
    @endif
    <form action="" method="POST">
        <textarea name="db" id="" cols="100" rows="10"></textarea> <br>
        <textarea name="sequence" id="" cols="100" rows="5"></textarea> <br>
        <input type="submit" value="Analyse">
    </form>
</body>
</html>
