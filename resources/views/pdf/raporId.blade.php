<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rapor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-5">
	    <div class="row">
	        <div class="col-lg-10 mx-auto">
	            <div class="row">
	                <div class="col-lg-6">
	                    <table>
	                        <tr>
	                            <td>
	                                <h5>Nama</h5>
	                            </td>
	                            <td>
	                                <h5>:</h5>
	                            </td>
	                            <td>
	                                <h5>{{ Auth::user()->name }}</h5>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <h5>NIS/NISN</h5>
	                            </td>
	                            <td>
	                                <h5>:</h5>
	                            </td>
	                            <td>
	                                <h5>{{ Auth::user()->nis.'/'.Auth::user()->nisn }}</h5>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <h5>Nama Sekolah</h5>
	                            </td>
	                            <td>
	                                <h5>:</h5>
	                            </td>
	                            <td>
	                                <h5>SMAS YAPPENDA</h5>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <h5>Alamat Sekolah</h5>
	                            </td>
	                            <td>
	                                <h5>:</h5>
	                            </td>
	                            <td>
	                                <h5>Jl. Swasembada Timur V, No.10</h5>
	                            </td>
	                        </tr>
	                    </table>    
	                </div>
	                <div class="col-lg-2"></div>
	                <div class="col-lg-4">
	                    <table>
	                        <tr>
	                            <td>
	                                <h5>Kelas</h5>
	                            </td>
	                            <td>
	                                <h5>:</h5>
	                            </td>
	                            <td>
	                                <h5>{{ Auth::user()->kelas }}</h5>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <h5>Fase</h5>
	                            </td>
	                            <td>
	                                <h5>:</h5>
	                            </td>
	                            <td>
	                                <h5>{{ Auth::user()->fase }}</h5>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <h5>Semester</h5>
	                            </td>
	                            <td>
	                                <h5>:</h5>
	                            </td>
	                            <td>
	                                <h5>-</h5>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <h5>Tahun Pelajaran</h5>
	                            </td>
	                            <td>
	                                <h5>:</h5>
	                            </td>
	                            <td>
	                                <h5>-</h5>
	                            </td>
	                        </tr>
	                    </table>    
	                </div>
	                <hr style="border: 1px solid #333333 !important;" class="mt-4 mb-3"/>
	            </div>
	            <H4 class="text-center mb-1">LAPORAN HASIL BELAJAR 
	            </H4>
	            <table class="table table-bordered" style="border: 1px solid black;">
	                <thead>
	                    <tr>
	                    <th scope="col" width="5%">No</th>
	                    <th>Mata Pelajaran</th>
	                    <th scope="col" width="7%" class="text-center">Nilai</th>
	                    <th scope="col">Capaian Pembelajaran</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($content as $key => $value)
	                    <tr>
	                        <th scope="row">{{ $key+1 }}</th>
	                        <td>{{ $value->exam->lesson->name }}</td>
	                        <td class="text-center">{{ $value->nilai }}</td>
	                        <td>{{ $value->description }}</td>
	                    </tr>
	                    @endforeach
	                    
	                </tbody>
	            </table>
	            <div class="row mt-5">
	                <div class="col-lg-4">
	                    <p>Mengetahui</p>
	                    <p>Orang Tua / Wali</p>
	                    <p class="mt-5">.......................</p>
	                </div>
	                <div class="col-lg-4">
	                    <p>Mengetahui</p>
	                    <p>Kepala Sekolah</p>
	                    <p class="mt-5"><b>Wahyu Dawam Budi Utomo, M.Pd</b></p>
	                </div>
	                <div class="col-lg-4">
	                    <p>Jakarta, -</p>
	                    <p>Wali Kelas</p>
	                    <p class="mt-5"><b>-</b></p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
</html>
