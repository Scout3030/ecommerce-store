<form action="{{ route('admin.sell.reject', $id) }}" method="POST">
    @csrf
    @method('put')
    <button type="submit" class="mb-2 mr-2 btn btn-danger">Rechazar</button>
</form>

<button class="mb-2 mr-2 btn btn-warning" onclick="window.location.href='{{route('admin.sell.show', $id)}}'">Ver</button>