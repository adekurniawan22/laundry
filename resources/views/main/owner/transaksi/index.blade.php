@extends('layout.header_footer')
@section('content')
    <main class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"
            style="height: 37px; overflow: hidden; display: flex; align-items: center;">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('owner.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Transaksi</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row ms-0 me-1">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="table-responsive-xl">
                        <div class="mt-1"></div>
                        <table id="transaksi-table" class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nota</th>
                                    <th>Kasir</th>
                                    <th>Pelanggan</th>
                                    <th class="text-center">Tanggal Transaksi</th>
                                    <th>Status</th>
                                    <th class="text-center" data-sortable="false">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $transaksi->id_transaksi }}</td>
                                        <td>NOTA-{{ $transaksi->id_transaksi }}</td>
                                        <td>{{ $transaksi->user->nama }}</td>
                                        <td>{{ $transaksi->pelanggan->nama }}</td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->locale('id')->isoFormat('D MMMM YYYY') }}
                                            &nbsp;–&nbsp;
                                            {{ \Carbon\Carbon::parse($transaksi->tgl_selesai)->locale('id')->isoFormat('D MMMM YYYY') }}
                                        </td>
                                        <td>{{ $transaksi->status }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                                data-bs-target="#detailModal"
                                                data-transaksi="{{ $transaksi->id_transaksi }}">
                                                Rincian
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="container-detail" class="mx-3 mt-3">
                        <div class="watermark" id="watermark-text" style="display: none;"></div>
                        <div class="d-flex flex-column align-items-center position-relative mb-5" style="line-height: 2">
                            <h3 id="summary-cabang" class="mb-0"></h3>
                            <div class="d-flex flex-column align-items-center">
                                <div><span id="summary-alamat-cabang"></span></div>
                                <div><span id="summary-no-hp-cabang"></span></div>
                            </div>
                            <div id="div-summary-status" class="position-absolute top-0 end-0 px-3 py-2 rounded">
                                <strong></strong>
                            </div>
                        </div>

                        <div class="mb-4" style="line-height: 1.5">
                            <div class="d-flex justify-content-between mb-2">
                                <strong>Nota:</strong>
                                <span id="summary-nota"></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <strong>Kasir:</strong>
                                <span id="summary-kasir"></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <strong>Pelanggan:</strong>
                                <span id="summary-nama-pelanggan"></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <strong>No. HP:</strong>
                                <span id="summary-no-hp"></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <strong>Tanggal Transaksi:</strong>
                                <span id="summary-tgl-transaksi"></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Estimasi Selesai:</strong>
                                <span id="summary-estimasi-selesai"></span>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="table">
                                    <table id="summary-table" class="table align-middle">
                                        <thead class="table">
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Kategori</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="summary-body">
                                            <!-- Data will be added here with JavaScript -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-end">
                                                    <h>Total Harga:</h>
                                                </th>
                                                <th class="text-center" id="total-price">0</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printModal()">Print</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function formatRupiah(value) {
            let number_string = value.replace(/[^,\d]/g, '').toString();
            let split = number_string.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah ? 'Rp. ' + rupiah : '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            var detailModal = document.getElementById('detailModal');
            detailModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang memicu modal
                var idTransaksi = button.getAttribute('data-transaksi'); // Ambil ID transaksi

                // Lakukan permintaan AJAX
                fetch(`/owner/transaksi/${idTransaksi}/detail`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.error) {
                            console.error(data.error);
                            return;
                        }

                        // Update konten modal
                        document.querySelector('#summary-cabang').textContent = data.cabang.nama_cabang;
                        document.querySelector('#summary-alamat-cabang').textContent = data.cabang
                            .alamat;
                        document.querySelector('#summary-no-hp-cabang').textContent = data.user.no_hp;
                        document.querySelector('#summary-nota').textContent =
                            `NOTA-${data.id_transaksi}`;
                        document.querySelector('#summary-kasir').textContent = data.user.nama;
                        document.querySelector('#summary-nama-pelanggan').textContent = data.pelanggan
                            .nama;
                        document.querySelector('#summary-no-hp').textContent = data.pelanggan.no_hp;
                        document.querySelector('#summary-tgl-transaksi').textContent = data
                            .tgl_transaksi;
                        document.querySelector('#summary-estimasi-selesai').textContent = data
                            .tgl_selesai;

                        // Update tabel di modal
                        var summaryBody = document.querySelector('#summary-body');
                        summaryBody.innerHTML = ''; // Clear existing rows
                        var totalPrice = 0;

                        data.details.forEach((detail, index) => {
                            var total = detail.harga * detail.jumlah;
                            var row = document.createElement('tr');
                            row.innerHTML = `
                        <td class="text-center">${index + 1}</td>
                        <td>${detail.kategori}</td>
                        <td class="text-center">${formatRupiah(detail.harga.toFixed(0))}</td>
                        <td class="text-center"><i class="fadeIn animated bx bx-x"></i> ${detail.jumlah}</td>
                        <td class="text-center">${formatRupiah(total.toFixed(0))}</td>
                    `;
                            summaryBody.appendChild(row);
                            totalPrice += total;
                        });

                        // Update Status Text
                        const divSummaryStatus = document.getElementById("div-summary-status");
                        const watermarkText = document.getElementById("watermark-text");

                        // Hapus kelas yang ada sebelumnya
                        divSummaryStatus.classList.remove("bg-success", "bg-warning");
                        watermarkText.textContent = data.status;

                        // Tambahkan kelas berdasarkan status
                        if (data.status === "Lunas") {
                            divSummaryStatus.classList.add("bg-success");
                            divSummaryStatus.innerHTML =
                                `<strong class="bg-success"> ${data.status} </strong>`;
                        } else {
                            divSummaryStatus.classList.add("bg-warning");
                            divSummaryStatus.innerHTML =
                                `<strong class="bg-warning"> ${data.status} </strong>`;
                        }

                        document.querySelector('#total-price').textContent = formatRupiah(totalPrice
                            .toFixed(0));
                    })
                    .catch(error => console.error('Error:', error));
            });
        });


        function printModal() {
            // Tampilkan watermark saat mencetak
            document.getElementById('watermark-text').style.display = 'block';
            window.print();
            // Sembunyikan watermark setelah mencetak
            document.getElementById('watermark-text').style.display = 'none';
        }
    </script>
@endsection
