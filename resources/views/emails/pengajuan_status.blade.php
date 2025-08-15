<p>Halo,</p>
<p>Status pengajuan Anda untuk unit usaha "{{ $pengajuan->unit_usaha }}" telah diperbarui menjadi
    <strong>{{ ucfirst($pengajuan->status) }}</strong>.</p>

@if ($pengajuan->komentar)
    <p>Komentar dari admin: {{ $pengajuan->komentar }}</p>
@endif

<p>Anda dapat melihat detail pengajuan Anda di sini:</p>
<a href="{{ url('/tenant/data-pengajuan') }}">Lihat Pengajuan Saya</a>

<p>Terima kasih.</p>
