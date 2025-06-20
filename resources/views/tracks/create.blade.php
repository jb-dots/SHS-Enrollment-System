<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Track</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/mkce0t2ptbzww5yzig0hxcbu1b6x9y2ho6j09l4q71599tjg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#strands',
        menubar: false,
        plugins: 'lists link',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link',
        branding: false
      });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #111827;
        }
        .mb-3 {
            margin-bottom: 1.5rem !important;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create New Track</h1>
        <form action="{{ route('tracks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Track Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="strands" class="form-label">Strands (comma separated)</label>
                <textarea id="strands" name="strands" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Track</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>