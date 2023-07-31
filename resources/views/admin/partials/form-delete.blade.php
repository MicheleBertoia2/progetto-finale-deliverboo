
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $id }}">
    <i class="fa-solid fa-trash-can"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{ $message }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form
                class="d-inline"
                action="{{ $route }}"
                method="POST"
            >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Elimina</button>
        </form>
        </div>
      </div>
    </div>
  </div>
