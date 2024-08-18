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
                            <a href="<?= route('kasir.dashboard') ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= route('kasir.transaksi.index') ?>">Transaksi</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Tambah Transaksi</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <style>
            .form-progress {
                position: relative;
                height: 4px;
                background-color: #e9ecef;
                margin-bottom: 30px;
                margin-top: 10px;
                overflow: hidden;
            }

            .progress-bar {
                position: absolute;
                height: 100%;
                background-color: #007bff;
                transition: width 0.3s ease-in-out, background-color 0.3s ease-in-out;
            }
        </style>

        <div class="row ms-0 me-1">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="form-progress">
                        <div class="progress-bar"></div>
                    </div>
                    <form id="form-wizard" action="{{ route('kasir.transaksi.store') }}" method="POST">
                        @csrf

                        {{-- Step 1 --}}
                        <div class="step">
                            <h6 id="heading-form">Form Pelanggan(1/3)</h6>
                            <hr>

                            <div class="form-group mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="">Pilih Status</option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                                <span id="status_error" class="invalid-feedback" role="alert"></span>
                            </div>

                            <div class="form-group mb-3" id="selectClient">
                                <label class="form-label" for="pelanggan">Pelanggan</label>
                                <select id="pelanggan" name="pelanggan" class="form-select single-select">
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id_pelanggan }}" data-no-hp="{{ $pelanggan->no_hp }}">
                                            {{ $pelanggan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <span id="pelanggan_error" class="invalid-feedback" role="alert"></span>
                            </div>

                            <div class="">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="checkbox_new_client"
                                        id="checkbox_new_client">
                                    <label class="form-label" for="checkbox_new_client">Tambah Pelanggan Baru?</label>
                                </div>
                            </div>

                            <!-- New Client -->
                            <div id="newClientRealization" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input id="nama_pelanggan" type="text" class="form-control" placeholder="Nama"
                                        name="nama_pelanggan">
                                    <span id="nama_pelanggan_error" class="invalid-feedback" role="alert"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No. HP</label>
                                    <input id="no_hp_pelanggan" type="text" class="form-control" placeholder="No. HP"
                                        name="no_hp_pelanggan">
                                    <span id="no_hp_pelanggan_error" class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>

                            <div class="text-end mt-5 mb-3">
                                <a href="{{ route('kasir.transaksi.index') }}" class="btn btn-dark">
                                    <i class="lni lni-arrow-left"></i> Back</a>
                                <button type="button" class="btn btn-primary next-step"> Next <i
                                        class="lni lni-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Transaksi -->
                        <div class="step" style="display: none">
                            <h6 id="heading-form">Form Transaksi (2/3)</h6>
                            <hr>
                            <div class="form-group mb-3">
                                <label class="form-label" for="estimasi_selesai">Estimasi Selesai</label>
                                <input type="number" id="estimasi_selesai" name="estimasi_selesai" class="form-control">
                                <span id="estimasi_selesai_error" class="invalid-feedback" role="alert"></span>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="tgl_transaksi">Tanggal Transaksi</label>
                                        <input type="date" id="tgl_transaksi" name="tgl_transaksi"
                                            class="form-control">
                                        <span id="tgl_transaksi_error" class="invalid-feedback" role="alert"></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="tgl_selesai">Tanggal Selesai</label>
                                        <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control">
                                        <span id="tgl_selesai_error" class="invalid-feedback" role="alert"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4" style="background-color: #f5f5f5;">
                                <div class="card-body">
                                    <div id="checkbox-error-message" class="alert alert-danger" style="display: none;">
                                        Silahkan pilih salah satu kategori!
                                    </div>
                                    <div class="table-responsive">
                                        <table id="example" class="table align-middle ade">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th style="width: 10%" class="text-center" data-sortable="false">
                                                    </th>
                                                    <th>Kategori</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Jumlah</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($kategoris as $kategori)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="selected_modules[]"
                                                                value="{{ $kategori->id_kategori }}"
                                                                class="form-check-input border-dark">
                                                        </td>
                                                        <td>
                                                            {{ $kategori->kategori }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ 'Rp ' . number_format($kategori->harga, 0, ',', '.') }}
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="number" class="form-control border-dark"
                                                                style="display: none">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-5 mb-3">
                                <button type="button" class="btn btn-dark prev-step"><i class="lni lni-arrow-left"></i>
                                    Previous</button>
                                <button type="button" class="btn btn-primary next-step"> Next <i
                                        class="lni lni-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Step 3: Summary -->
                        <div class="step" style="display: none;">
                            <h6 id="heading-form">Preview (3/3)</h6>
                            <hr>

                            <div class="mx-5 mt-4">
                                <div class="position-relative mb-5 text-center">
                                    <h3 id="summary-cabang" class="mb-0">{{ $cabang }}</h3>
                                    <div><span id="summary-alamat-cabang">{{ $alamat_cabang }}</span></div>
                                    <div><span id="summary-no-hp-cabang">{{ $no_hp_cabang }}</span></div>
                                    <div id="div-summary-status" class="position-absolute top-0 end-0 px-3 py-2 rounded">
                                        <strong><span id="summary-status"></span></strong>
                                    </div>
                                </div>

                                <div class="mb-4" style="line-height: 1.5">
                                    <div class="d-flex justify-content-between mb-2">
                                        <strong>Nota:</strong>
                                        <span id="summary-nota">{{ $nota }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <strong>Kasir:</strong>
                                        <span id="summary-kasir">{{ $kasir }}</span>
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

                                <input type="hidden" id="selected-values" name="selected_values">

                                <div class="text-end mt-5 mb-3">
                                    <button type="button" class="btn btn-dark prev-step"><i
                                            class="lni lni-arrow-left"></i>
                                        Previous</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        // Fungsi untuk menampilkan notifikasi error
        function notifError($msg = 'Please Fill All Fields') {
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-x-circle',
                msg: $msg
            });
        };

        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi elemen dan variabel
            var form = document.getElementById("form-wizard");
            var steps = form.querySelectorAll(".step");
            var progressBar = document.querySelector('.progress-bar');
            var currentStep = 0;
            const selectedValues = [];

            // Fungsi untuk menampilkan langkah tertentu dalam form wizard
            function showStep(step) {
                steps[currentStep].style.display = "none";
                steps[step].style.display = "block";
                currentStep = step;
                updateProgress();
            }

            // Fungsi untuk melanjutkan ke langkah berikutnya
            function nextStep() {
                if (currentStep < steps.length - 1) {
                    showStep(currentStep + 1);
                }
            }

            // Fungsi untuk kembali ke langkah sebelumnya
            function prevStep() {
                if (currentStep > 0) {
                    showStep(currentStep - 1);
                }
            }

            // Fungsi untuk memperbarui progress bar
            function updateProgress() {
                let progressPercent = (currentStep + 1) * (100 / steps.length);
                progressBar.style.width = `${progressPercent}%`;
            }

            function handleCheckboxChange(event) {
                const checkbox = event.target;
                const value = checkbox.value;
                const inputCell = checkbox.closest('tr').querySelector('td input[type="number"]');
                const inputValue = inputCell.value;

                if (checkbox.checked) {
                    selectedValues.push({
                        id: value,
                        quantity: 1
                    });
                    inputCell.style.display = 'block';
                    inputCell.value = 1;
                    inputCell.min = 1;
                } else {
                    inputCell.style.display = 'none';
                    inputCell.value = '';
                    const index = selectedValues.findIndex(item => item.id === value);
                    if (index !== -1) {
                        selectedValues.splice(index, 1);
                    }
                }
                updateSummary();
            }

            function handleNumberInputChange(event) {
                const input = event.target;
                const value = input.value;
                const row = input.closest('tr');
                const checkbox = row.querySelector('td input[type="checkbox"]');
                const id = checkbox.value;

                if (checkbox.checked) {
                    const index = selectedValues.findIndex(item => item.id === id);
                    if (index !== -1) {
                        selectedValues[index].quantity = value || 0;
                    }
                }
                updateSummary();
            }

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

            function updateSummary() {
                const summaryBody = document.getElementById('summary-body');
                const totalPriceElement = document.getElementById('total-price');
                summaryBody.innerHTML = '';

                let totalPrice = 0;
                let rowNumber = 1; // Mulai nomor dari 1

                const table = $('#example').DataTable();
                if (table) {
                    // Mengambil semua baris dari DataTables
                    table.rows().nodes().to$().each(function() {
                        const checkbox = $(this).find('input[type="checkbox"]');
                        const priceCell = $(this).find('td:nth-child(3)');
                        const quantityInput = $(this).find('input[type="number"]');

                        if (checkbox.is(':checked') && quantityInput.val() > 0) {
                            const price = parseFloat(priceCell.text().replace(/[^0-9]/g, ''));
                            const quantity = parseInt(quantityInput.val(), 10);
                            const total = price * quantity;

                            totalPrice += total;

                            summaryBody.innerHTML += `
                    <tr>
                        <td class="text-center">${rowNumber}.</td> <!-- Nomor Urut -->
                        <td>${$(this).find('td:nth-child(2)').text()}</td>
                        <td class="text-center">${formatRupiah(price.toFixed(0))}</td>
                        <td class="text-center"><i class="fadeIn animated bx bx-x"></i> ${quantity}</td>
                        <td class="text-center">${formatRupiah(total.toFixed(0))}</td>
                    </tr>
                `;

                            rowNumber++; // Increment nomor urut
                        }
                    });

                    totalPriceElement.textContent = formatRupiah(totalPrice.toFixed(0));
                }
            }

            // Fungsi untuk mengupdate tanggal
            function updateTanggal() {
                const estimasiSelesai = document.getElementById('estimasi_selesai').value;
                const tglTransaksiInput = document.getElementById('tgl_transaksi');
                const tglSelesaiInput = document.getElementById('tgl_selesai');

                if (estimasiSelesai && tglTransaksiInput.value) {
                    const tglTransaksi = new Date(tglTransaksiInput.value);
                    const estimasi = parseInt(estimasiSelesai, 10);

                    // Update tgl_transaksi ke tanggal hari ini
                    tglTransaksiInput.value = new Date().toISOString().split('T')[0];

                    // Update tgl_selesai
                    tglTransaksi.setDate(tglTransaksi.getDate() + estimasi);
                    const tglSelesai = tglTransaksi.toISOString().split('T')[0];
                    tglSelesaiInput.value = tglSelesai;
                }
            }

            // Fungsi untuk mengatur tgl_transaksi ke tanggal hari ini
            function setDefaultTanggalTransaksi() {
                const tglTransaksiInput = document.getElementById('tgl_transaksi');
                const today = new Date();
                // Mengatur tanggal ke format YYYY-MM-DD
                const formattedDate = today.toISOString().split('T')[0];
                tglTransaksiInput.value = formattedDate;
            }

            function validateCurrentStep0() {
                let valid = true;

                // Reset error messages and classes
                document.querySelectorAll('.invalid-feedback').forEach(span => span.textContent = "");
                document.querySelectorAll('.form-select, .form-control').forEach(input => input.classList.remove(
                    'is-invalid'));

                // Hide the error message initially
                const errorMessage = document.getElementById('checkbox-error-message');
                errorMessage.style.display = 'none';

                // Check if 'Tambah Pelanggan Baru?' is checked
                const isNewClientChecked = document.getElementById("checkbox_new_client").checked;
                const pelanggan = document.getElementById("pelanggan");

                // If 'Tambah Pelanggan Baru?' is checked, disable and ignore validation for pelanggan
                if (isNewClientChecked) {
                    pelanggan.style.display = 'none'; // Disable the select element
                    pelanggan.value = ''; // Optionally clear the selected value
                } else {
                    pelanggan.style.display = 'block'; // Disable the select element
                }

                if (currentStep === 0) {
                    // Validate status
                    const statusPembayaran = document.getElementById("status");
                    if (!statusPembayaran.value) {
                        valid = false;
                        const errorSpan = document.getElementById("status_error");
                        errorSpan.textContent = "Status harus diisi.";
                        statusPembayaran.classList.add('is-invalid');
                    }

                    // Validate pelanggan if it is not disabled
                    if (!isNewClientChecked) {
                        if (!pelanggan.value) {
                            valid = false;
                            const errorSpan = document.getElementById("pelanggan_error");
                            errorSpan.textContent = "Pelanggan harus diisi.";
                            pelanggan.classList.add('is-invalid');
                        }
                    }

                    // Validate nama_pelanggan and no_hp_pelanggan if 'Tambah Pelanggan Baru?' is checked
                    if (isNewClientChecked) {
                        const namaPelanggan = document.getElementById("nama_pelanggan");
                        const noHpPelanggan = document.getElementById("no_hp_pelanggan");

                        // Validate nama_pelanggan
                        if (!namaPelanggan.value.trim()) {
                            valid = false;
                            const errorSpan = document.getElementById("nama_pelanggan_error");
                            errorSpan.textContent = "Nama harus diisi.";
                            namaPelanggan.classList.add('is-invalid');
                        }

                        // Validate no_hp_pelanggan
                        const noHpValue = noHpPelanggan.value.trim();
                        if (!noHpValue) {
                            valid = false;
                            const errorSpan = document.getElementById("no_hp_pelanggan_error");
                            errorSpan.textContent = "No. HP harus diisi.";
                            noHpPelanggan.classList.add('is-invalid');
                        } else if (!/^[0-9]+$/.test(noHpValue)) {
                            valid = false;
                            const errorSpan = document.getElementById("no_hp_pelanggan_error");
                            errorSpan.textContent = "No. HP hanya boleh berisi angka.";
                            noHpPelanggan.classList.add('is-invalid');
                        }
                    }
                }

                return valid;
            }


            // Initialize and format no_hp_pelanggan input
            const noHpInput = document.getElementById('no_hp_pelanggan');

            // Function to format the input value
            function formatNoHp(value) {
                // Only keep numbers from input
                value = value.replace(/\D/g, '');

                // Add "08" in front if not already present
                if (value.length > 0 && !value.startsWith('08')) {
                    value = '08' + value;
                }
                return value;
            }

            noHpInput.addEventListener('input', function(e) {
                e.target.value = formatNoHp(e.target.value);
            });

            noHpInput.addEventListener('focus', function() {
                // Add "08" in front if no number is present at all
                if (noHpInput.value.length === 0) {
                    noHpInput.value = '08';
                }
            });

            // Jika ada nilai default di server-side, tambahkan "08" di depannya
            if (noHpInput.value && !noHpInput.value.startsWith('08')) {
                noHpInput.value = '08' + noHpInput.value;
            }

            function validateCurrentStep1() {
                let valid = true;

                // Reset error messages and classes
                document.querySelectorAll('.invalid-feedback').forEach(span => span.textContent = "");
                document.querySelectorAll('.form-select, .form-control').forEach(input => input.classList.remove(
                    'is-invalid'));

                // Hide the error message initially
                const errorMessage = document.getElementById('checkbox-error-message');
                errorMessage.style.display = 'none';

                if (currentStep === 1) {
                    // Validate estimasi_selesai
                    const estimasiSelesai = document.getElementById("estimasi_selesai");
                    if (!estimasiSelesai.value) {
                        valid = false;
                        const errorSpan = document.getElementById("estimasi_selesai_error");
                        errorSpan.textContent = "Estimasi Selesai harus diisi.";
                        estimasiSelesai.classList.add('is-invalid');
                    }

                    // Validate checkbox
                    const checkboxes = document.querySelectorAll('input[name="selected_modules[]"]:checked');
                    if (checkboxes.length === 0) {
                        valid = false;
                        // Display the error message
                        errorMessage.style.display = 'block';
                    }
                }
                return valid;
            }

            function updateSummaryInfo() {
                const isNewClientChecked = document.getElementById("checkbox_new_client").checked;
                const statusSelect = document.getElementById("status");
                const pelangganSelect = document.getElementById("pelanggan");
                const namaPelangganInput = document.getElementById("nama_pelanggan");
                const tglTransaksiInput = document.getElementById("tgl_transaksi");
                const tglSelesaiInput = document.getElementById("tgl_selesai");
                const noHpPelangganInput = document.getElementById("no_hp_pelanggan");

                // Ambil status yang dipilih
                const selectedStatus = statusSelect.options[statusSelect.selectedIndex].text;

                // Update Status Text
                document.getElementById("summary-status").textContent = selectedStatus;

                // Dapatkan elemen div untuk status
                const divSummaryStatus = document.getElementById("div-summary-status");

                // Hapus kelas yang ada sebelumnya
                divSummaryStatus.classList.remove("bg-success", "bg-warning");

                // Tambahkan kelas berdasarkan status
                if (selectedStatus === "Lunas") {
                    divSummaryStatus.classList.add("bg-success");
                } else {
                    divSummaryStatus.classList.add("bg-warning");
                }

                // Update Nama Pelanggan
                const namaPelanggan = isNewClientChecked ? namaPelangganInput.value : pelangganSelect.options[
                    pelangganSelect.selectedIndex].text;
                document.getElementById("summary-nama-pelanggan").textContent = namaPelanggan;

                // Update Nomor HP
                let noHpPelanggan;
                if (isNewClientChecked) {
                    noHpPelanggan = noHpPelangganInput.value;
                } else {
                    // Ambil nomor HP dari atribut data opsi yang dipilih
                    const selectedOption = pelangganSelect.options[pelangganSelect.selectedIndex];
                    noHpPelanggan = selectedOption.getAttribute('data-no-hp');
                }
                document.getElementById("summary-no-hp").textContent = noHpPelanggan;

                // Update Tanggal Transaksi
                document.getElementById("summary-tgl-transaksi").textContent = tglTransaksiInput.value;

                // Update Estimasi Selesai
                document.getElementById("summary-estimasi-selesai").textContent = tglSelesaiInput.value;
            }

            // Mengubah tampilan elemen terkait client saat checkbox berubah
            function handleCheckboxClient() {
                var isChecked = $('#checkbox_new_client').is(":checked");
                if (isChecked) {
                    $('#selectClient').hide();
                    $('#newClientRealization').show();
                } else {
                    $('#selectClient').show();
                    $('#newClientRealization').hide();
                }
            }
            handleCheckboxClient();
            $('#checkbox_new_client').change(function() {
                handleCheckboxClient();
            });

            // Event listener untuk perubahan pada input estimasi_selesai
            document.getElementById('estimasi_selesai').addEventListener('input', updateTanggal);

            // Menjalankan fungsi untuk set default tgl_transaksi saat halaman dimuat
            setDefaultTanggalTransaksi();

            // Menambahkan event listener untuk perubahan pada checkbox
            document.querySelectorAll('input[type="checkbox"][name="selected_modules[]"]').forEach(function(
                checkbox) {
                checkbox.addEventListener('change', handleCheckboxChange);
            });

            // Menambahkan event listener untuk perubahan pada input number
            document.querySelectorAll('input[type="number"]').forEach(function(input) {
                input.addEventListener('input', handleNumberInputChange);
            });

            // Menambahkan event listener untuk tombol "Next"
            form.querySelectorAll(".next-step").forEach(function(button) {
                button.addEventListener("click", async function() {
                    if (currentStep === 0) {
                        if (!validateCurrentStep0()) {
                            return false;
                        }
                    } else if (currentStep === 1) {
                        if (!validateCurrentStep1()) {
                            return false;
                        }
                        updateSummaryInfo();
                    }
                    nextStep();
                });
            });

            // Menambahkan event listener untuk tombol "Previous"
            form.querySelectorAll(".prev-step").forEach(function(button) {
                button.addEventListener("click", prevStep);
            });

            // Menampilkan langkah pertama saat halaman dimuat
            showStep(currentStep);

            function submitForm(event) {
                event.preventDefault(); // Mencegah pengiriman formulir default

                // Validasi sebelum menambahkan input tersembunyi dan mengirimkan formulir
                if (validateCurrentStep0()) {
                    // Cek apakah input tersembunyi sudah ada
                    let hiddenInput = document.getElementById('selected-values');

                    if (!hiddenInput) {
                        // Jika tidak ada, buat elemen input tersembunyi baru
                        hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'selected_values';
                        form.appendChild(hiddenInput);
                    }

                    // Perbarui nilai elemen input tersembunyi dengan JSON.stringify(selectedValues)
                    hiddenInput.value = JSON.stringify(selectedValues);

                    // Kirimkan formulir
                    form.submit();
                }
            }

            form.addEventListener("submit", submitForm);
        });
    </script>
@endsection
