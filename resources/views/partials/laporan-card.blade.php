<div class="card">
    <h3 class="text-lg font-bold text-blue-900">{{ $laporan['nama'] }}</h3>
    <p><strong>Lokasi:</strong> {{ $laporan['lokasi'] }}</p>
    <p><strong>Tinggi Genangan:</strong> {{ $laporan['tinggi_air'] }} cm</p>
    @isset($laporan['tanggal'])
        <p><strong>Tanggal:</strong> {{ $laporan['tanggal'] }}</p>
    @endisset

    @if ($laporan['tinggi_air'] < 30)
        <p><strong>Status: </strong><span style="color:green; font-weight:bold;">Waspada</span></p>
    @elseif ($laporan['tinggi_air'] <= 70)
        <p><strong>Status: </strong><span style="color:orange; font-weight:bold;">Siaga</span></p>
    @else
        <p><strong>Status: </strong><span style="color:red; font-weight:bold;">Awas</span></p>
    @endif
</div>
