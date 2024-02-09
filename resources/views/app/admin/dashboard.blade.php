@extends("layouts.app")

@section("content")
<h4 class="c-grey-900 mT-10 mB-30">Selamat Datang di Halaman Administrator</h4>
<div class="row">
    <div class="col-md-12">
    	{{-- <div class="row">
    		<div class="col-md-4">
	    		<div class="bgc-white bd bdrs-3 p-20 mB-20" style="min-height: 100px;font-size: 20px;">
	    			<h6>Jumlah Data BDT</h6>
	    			<p>
	    				<div style="float: left;"><span class="c-blue-500 ti-flag-alt"></span></div>
	    				<div style="float: right;"><h3></h3></div>
	    			</p>
	    			<p></p>
	    		</div>
    		</div>
    		<div class="col-md-4">
                <div class="bgc-white bd bdrs-3 p-20 mB-20" style="min-height: 100px;font-size: 20px;">
                    <h6>Jumlah Data KKS</h6>
                    <p>
                        <div style="float: left;"><span class="c-blue-500 ti-download"></span></div>
                        <div style="float: right;"><h3></h3></div>
                    </p>
                    <p></p>
                </div>
            </div>
            <div class="col-md-4">
	    		<div class="bgc-white bd bdrs-3 p-20 mB-20" style="min-height: 100px;font-size: 20px;">
	    			<h6>Jumlah Data PKH</h6>
	    			<p>
	    				<div style="float: left;"><span class="c-blue-500 ti-announcement"></span></div>
	    				<div style="float: right;"><h3></h3></div>
	    			</p>
	    			<p></p>
	    		</div>
    		</div>
    	</div>     --}}

        {{-- <div class="row">
            <div class="col-md-6">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h6 class="c-grey-900 mB-20">Pengajuan BDT Terbaru</h6>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $submission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $submission->nik }}</td>
                                    <td>{{ $submission->nama_krt }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.submission.show',$submission->id) }}" title="Selengkapnya"><button class="btn btn-primary"><span class="fa fa-eye"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h6 class="c-grey-900 mB-20">Pengaduan Terbaru</h6>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIK Pengadu</th>
                                <th>Nama Pengadu</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $complaint)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $complaint->nik_pengadu }}</td>
                                    <td>{{ $complaint->nama_pengadu }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.complaint.show',$complaint->id) }}" title="Selengkapnya"><button class="btn btn-primary"><span class="fa fa-eye"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 

        </div>  --}}
    </div>
</div>
@endsection