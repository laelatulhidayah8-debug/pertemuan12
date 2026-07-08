<div class="card h-100">
        <div class="form-check m-2">
        <input class="form-check-input"
               type="checkbox"
               name="buku_ids[]"
               value="{{ $buku->id }}">
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            <i class="bi bi-book text-primary" style="font-size:3.5rem;"></i>
        </div>

        <span class="badge bg-{{ $buku->kategori == 'Programming' ? 'primary' : ($buku->kategori == 'Database' ? 'success' : ($buku->kategori == 'Web Design' ? 'info' : ($buku->kategori == 'Networking' ? 'warning' : 'danger'))) }} mb-2">
            {{ $buku->kategori }}
        </span>

        <h5 class="card-title">
            {{ Str::limit($buku->judul, 50) }}
        </h5>

        <p class="card-text text-muted small">
            <i class="bi bi-person"></i> {{ $buku->pengarang }}<br>
            <i class="bi bi-building"></i> {{ $buku->penerbit }}
        </p>

        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="fw-bold text-success">{{ $buku->harga_format }}</span>
            @if ($buku->stok > 0)
                <span class="badge bg-success">
                    <i class="bi bi-check-circle"></i> Tersedia ({{ $buku->stok }})
                </span>
            @else
                <span class="badge bg-danger">
                    <i class="bi bi-x-circle"></i> Habis
                </span>
            @endif
        </div>

        @if ($showActions)
        <div class="btn-group-vertical d-grid gap-2">
            <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-info btn-sm text-white">
                <i class="bi bi-eye"></i> Detail
            </a>

            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>

            <form action="{{ route('buku.destroy', $buku->id) }}" 
                method="POST" 
                class="d-inline"
                onsubmit="return confirmDelete(event, this)">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger w-100">
                    <i class="bi bi-trash"></i> Hapus
                </button>
            </form>

        @push('scripts')
        <script>
            // SweetAlert confirmation untuk delete
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    const judul = this.getAttribute('data-judul');
                    
                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: `Apakah Anda yakin ingin menghapus buku "${judul}"?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
        @endpush
        </div>
        @endif
    </div>
</div>