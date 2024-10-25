<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">To-Do List</h1>

        <div class="card">
            <div class="card-body">
                <form action="/tasks" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Add a new task">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>

                <ul class="list-group">
                    @foreach($tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm {{ $task->completed ? 'btn-success' : 'btn-warning' }}">
                                    {{ $task->completed ? 'Completed' : 'Mark as complete' }}
                                </button>
                            </form>
                            <span>{{ $task->title }}</span>
                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
