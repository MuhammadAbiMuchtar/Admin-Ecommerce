<style> 
    table { 
        border-collapse: collapse; 
        width: 100%; 
        border: 1px solid #ccc; 
    } 
 
    table tr td { 
        padding: 6px; 
        font-weight: normal; 
        border: 1px solid #ccc; 
    } 
 
    table th { 
        border: 1px solid #ccc; 
    } 
</style> 
<table> 
    <!-- <tr> 
        <td align="center"> 
            <img src="{{ asset('images/header.png') }}" width="50%"> 
        </td> 
    </tr> --> 
    <tr> 
        <td align="left"> 
            Perihal : {{ $judul }} <br> 
            Tanggal Awal: {{ $tanggalAwal }} s/d Tanggal Akhir: {{ $tanggalAkhir }} 
        </td> 
    </tr> 
</table> 
<p></p> 
<table> 
    <thead> 
        <tr> 
            <th>No</th> 
            <th>Kategori</th> 
            <th>Status</th> 
            <th>Nama Produk</th> 
            <th>Gambar</th> 
            <th>Harga</th> 
            <th>Berat</th> 
            <th>Stok</th> 
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($produk as $row) 
        <tr> 
            <td> {{ $loop->iteration }}</td> 
            <td> {{ $row->kategori->nama_kategori }} </td> 
            <td> 
                @if ($row->status ==1) 
                Publis 
                @elseif($row->status ==0) 
                Blok 
                @endif 
            </td> 
            <td> {{ $row->nama_produk }} </td> 
            <td>
                @if($row->foto)
                    <img src="{{ asset('storage/img-produk/' . $row->foto) }}" width="60" height="60" style="object-fit:cover;">
                @else
                    <img src="{{ asset('storage/img-produk/imgdefault.jpg') }}" width="60" height="60" style="object-fit:cover;">
                @endif
            </td>
            <td> Rp. {{ number_format($row->harga, 0, ',', '.') }} </td> 
            <td>
                {{ $row->berat }}
                @if($row->satuan_berat == 'gr' || $row->satuan_berat == 'kg')
                    {{ $row->satuan_berat }}
                @endif
            </td>
            <td> {{ $row->stok }} </td> 
        </tr> 
        @endforeach 
 
    </tbody> 
</table> 
 
 
 
 
<script> 
    window.onload = function() { 
        printStruk(); 
    } 
 
    function printStruk() { 
        window.print(); 
    } 
</script>
