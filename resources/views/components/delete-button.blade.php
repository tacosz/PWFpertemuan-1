<form action="{{ $action }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
        Delete
    </button>
</form>