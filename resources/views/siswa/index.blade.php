@extends('template')

@section('main')
    <div id= "siswa">
        <h2>Siswa</h2>

        @if (!empty($siswa))
            <table class="table">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $list_siswa)
                        <tr>
                            <td> {{ $list_siswa->nisn }} </td>
                            <td> {{ $list_siswa->nama }} </td>
                            <td> {{ $list_siswa->tanggal_lahir->format('d-m-Y') }} </td>
                            <td> {{ $list_siswa->jenis_kelamin }} </td>
                            <td>
                                <div class="box-button">
                                    {{ link_to('siswa/' .$list_siswa->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
                                </div>
                                <div class="box-button">
                                    {{ link_to('siswa/' .$list_siswa->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                </div>
                                <div class="box-button">
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['SiswaController@destroy', $list_siswa->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada data siswa.</p>
        @endif

        <div class="table-nav">
            <div class="jumlah-data">
                <strong>Jumlah siswa : {{ $jumlah_siswa }} </strong>
            </div>
            <div class="paging">
                {{ $siswa->links() }}
            </div>
        </div>

        <div class="tombol-nav">
            <div>
                <a href="siswa/create" class="btn btn-primary"> Tambah Siswa </a>
            </div>
        </div>

    </div>
@endsection

@section('footer')
    @include('footer');
@endsection
