<h1>Daftar Pengumuman</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<ul>
    @forelse($pengumuman as $item)
        <li>
            <strong>{{ $item->judul }}</strong><br>
            {{ $item->isi }}
        </li>
    @empty
        <li>Belum ada pengumuman.</li>
    @endforelse
</ul>