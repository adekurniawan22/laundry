@extends('layout.header_footer')
@section('content')
    <style>
        @media print {
            * {
                background-color: white;
                visibility: hidden;
            }

            #container-detail,
            #container-detail * {
                visibility: visible;
            }

            #container-detail {
                position: fixed;
                top: 0;
                left: 0;
                width: 40%;
                height: auto !important;
                ;
            }

            .watermark {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-transform: uppercase;
                letter-spacing: 12px;
                opacity: 0.3;
                font-size: 4rem;
                color: #000;
                z-index: 1;
                white-space: normal;
                pointer-events: none;
                line-height: 1;
                display: block;
                /* Stempel efek dengan penyesuaian lebih alami */
                text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2),
                    -1px -1px 0 rgba(0, 0, 0, 0.2),
                    1px -1px 0 rgba(0, 0, 0, 0.2),
                    -1px 1px 0 rgba(0, 0, 0, 0.2);
                /* Efek bayangan lebih subtle */

                background: rgba(255, 255, 255, 0.1);
                /* Background semi-transparan dengan opacity rendah */
                border: none;
                /* Hapus border untuk tampilan yang lebih alami */
            }

            #div-summary-status {
                display: none;
                /* Sembunyikan elemen saat mencetak */
            }
        }
    </style>

    <main class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"
            style="height: 37px; overflow: hidden; display: flex; align-items: center;">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('kasir.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Transaksi</span>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('kasir.transaksi.create') }}" class="btn btn-primary">
                    <i class="fadeIn animated bx bx-plus"></i>Tambah
                </a>
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
                                    <th style="width:5%">ID</th>
                                    <th>Nota</th>
                                    <th>Kasir</th>
                                    <th>Pelanggan</th>
                                    <th class="text-center">Tanggal Transaksi</th>
                                    <th>Status</th>
                                    <th class="text-center" data-sortable="false">Detail</th>
                                    <th class="text-center" data-sortable="false">Aksi</th>
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
                                        <td>
                                            <select class="form-select status-select"
                                                data-id="{{ $transaksi->id_transaksi }}">
                                                <option value="Lunas"
                                                    {{ $transaksi->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                                <option value="Belum Lunas"
                                                    {{ $transaksi->status == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas
                                                </option>
                                            </select>
                                        </td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                                data-bs-target="#detailModal"
                                                data-transaksi="{{ $transaksi->id_transaksi }}">
                                                Rincian
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-3 fs-6">

                                                <a href="{{ route('kasir.transaksi.edit', $transaksi->id_transaksi) }}"
                                                    class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Edit" aria-label="Edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>

                                                <button type="button" class="text-danger bg-transparent border-0 p-0"
                                                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                    data-form-id="delete-form-{{ $transaksi->id_transaksi }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>

                                                <form id="delete-form-{{ $transaksi->id_transaksi }}"
                                                    action="{{ route('kasir.transaksi.destroy', $transaksi->id_transaksi) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
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

        function updateStatus(status, icon, msg) {
            Lobibox.notify(status, {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: icon,
                msg: msg
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var detailModal = document.getElementById('detailModal');
            detailModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang memicu modal
                var idTransaksi = button.getAttribute('data-transaksi'); // Ambil ID transaksi

                // Lakukan permintaan AJAX
                fetch(`/kasir/transaksi/${idTransaksi}/detail`)
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

            document.querySelectorAll('.status-select').forEach(function(select) {
                select.addEventListener('change', function() {
                    const id = this.getAttribute('data-id');
                    console.log(id);
                    const status = this.value;

                    fetch('/kasir/transaksi/update-status', { // Gunakan URL endpoint langsung
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                id: id,
                                status: status
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            if (data.success) {
                                updateStatus('success', 'bx bx-check-circle',
                                    'Update status transaksi berhasil')
                            } else {
                                updateStatus('error', 'bx bx-x-circle',
                                    'Update status transaksi gagal')
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
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
