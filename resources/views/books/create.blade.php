
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Details</title>
</head>
<body>
    <h2>Add a Book Details</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="author">Author:</label>
        <input type="text" name="author" required>

        <button type="submit">Add Book</button>
    </form>
</body>
</html>
