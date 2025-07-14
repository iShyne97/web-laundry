<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Laundry - POS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            text-align: center;
            color: #4a5568;
            margin-bottom: 10px;
            font-size: 2.5em;
            font-weight: 700;
        }

        .header .subtitle {
            text-align: center;
            color: #718096;
            font-size: 1.1em;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card h2 {
            color: #4a5568;
            margin-bottom: 20px;
            font-size: 1.8em;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #4a5568;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(72, 187, 120, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 101, 101, 0.3);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            color: white;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(237, 137, 54, 0.3);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .service-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .service-card h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .service-card .price {
            font-size: 1.5em;
            font-weight: 700;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .cart-table th {
            background: #f7fafc;
            font-weight: 600;
            color: #4a5568;
        }

        .cart-table tr:hover {
            background: #f7fafc;
        }

        .total-section {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
        }

        .total-section h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .total-amount {
            font-size: 2.5em;
            font-weight: 700;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: #fed7d7;
            color: #c53030;
        }

        .status-0 {
            background: #fed7d7;
            color: #c53030;
        }

        .status-process {
            background: #feebc8;
            color: #dd6b20;
        }

        .status-ready {
            background: #c6f6d5;
            color: #2f855a;
        }

        .status-1 {
            background: #c6f6d5;
            color: #2f855a;
        }

        .status-delivered {
            background: #bee3f8;
            color: #2b6cb0;
        }

        .transaction-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .transaction-item {
            background: #f7fafc;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 4px solid #667eea;
        }

        .transaction-item h4 {
            color: #4a5568;
            margin-bottom: 5px;
        }

        .transaction-item p {
            color: #718096;
            margin-bottom: 5px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .close:hover {
            color: #000;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }

        .stat-card h3 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 2em;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }

        .receipt {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: "Courier New", monospace;
        }

        .receipt-header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .receipt-total {
            border-top: 2px solid #333;
            padding-top: 10px;
            margin-top: 10px;
            font-weight: bold;
        }

        .sign-out {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🧺 Sistem Informasi Laundry</h1>
            <p class="subtitle">
                Point of Sales System - Kelola Transaksi Laundry dengan Mudah
            </p>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3 id="totalTransactions">0</h3>
                <p>Total Transaksi</p>
            </div>
            <div class="stat-card">
                <h3 id="totalRevenue">Rp 0</h3>
                <p>Total Pendapatan</p>
            </div>
            <div class="stat-card">
                <h3 id="activeOrders">0</h3>
                <p>Pesanan Aktif</p>
            </div>
            <div class="stat-card">
                <h3 id="completedOrders">0</h3>
                <p>Pesanan Selesai</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Left Panel: New Transaction -->
            <div class="card">
                <h2>🛒 Transaksi Baru</h2>

                <form id="transactionForm">
                    <div class="form-group">
                        <label for="customerName">Nama Pelanggan</label>
                        <select name="customer" id="id_customer">
                            <option disabled selected>Pilih pelanggan</option>
                            <?php foreach ($data['customer'] as $d) : ?>
                                <option
                                    value="<?= $d['id'] ?>"
                                    data-id-cust="<?= $d['id'] ?>"
                                    data-cust-name="<?= $d['customer_name'] ?>"
                                    data-phone="<?= $d['phone'] ?>"
                                    data-address="<?= $d['address'] ?>">
                                    <?= $d['customer_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <input type="text" id="customerName" required /> -->
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="customerPhone">No. Telepon</label>
                            <input type="tel" id="customerPhone" required />
                            <input type="hidden" id="customerName" required />
                            <input type="hidden" id="order_code" value="TR-<?= date('YmdHis') ?>" required />
                            <input type="hidden" id="id_customer" required />
                        </div>
                        <div class="form-group">
                            <label for="customerAddress">Alamat</label>
                            <input type="text" id="customerAddress" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pilih Layanan</label>
                        <div class="services-grid">
                            <?php foreach ($data['service'] as $d) : ?>
                                <button
                                    type="button"
                                    class="service-card"
                                    onclick="addService(<?= $d['id'] ?>, <?= $d['price'] ?>)">
                                    <h3>👔 <?= $d['service_name'] ?></h3>
                                    <div class="price"><?= $d['price'] ?></div>
                                </button>
                            <?php endforeach; ?>
                            <!-- <button
                                type="button"
                                class="service-card"
                                onclick="addService('Cuci Setrika', 7000)">
                                <h3>Cuci Setrika</h3>
                                <div class="price">Rp 7.000/kg</div>
                            </button>
                            <button
                                type="button"
                                class="service-card"
                                onclick="addService('Setrika Saja', 3000)">
                                <h3>🔥 Setrika Saja</h3>
                                <div class="price">Rp 3.000/kg</div>
                            </button>
                            <button
                                type="button"
                                class="service-card"
                                onclick="addService('Dry Clean', 15000)">
                                <h3>✨ Dry Clean</h3>
                                <div class="price">Rp 15.000/kg</div>
                            </button>
                            <button
                                type="button"
                                class="service-card"
                                onclick="addService('Cuci Sepatu', 25000)">
                                <h3>👟 Cuci Sepatu</h3>
                                <div class="price">Rp 25.000/pasang</div>
                            </button>
                            <button
                                type="button"
                                class="service-card"
                                onclick="addService('Cuci Karpet', 20000)">
                                <h3>🏠 Cuci Karpet</h3>
                                <div class="price">Rp 20.000/m²</div>
                            </button> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="serviceWeight">Berat/Jumlah</label>
                            <input
                                type="number"
                                id="serviceWeight"
                                step="0.1"
                                min="0.1"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="serviceType">Jenis Layanan</label>
                            <select id="serviceType" required>
                                <option disabled selected>Pilih Layanan</option>
                                <?php foreach ($data['service'] as $d) : ?>
                                    <option value="<?= $d['id'] ?>" data-serv-name="<?= $d['service_name'] ?>" data-serv-price="<?= $d['price'] ?> ?>"><?= $d['service_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="notes">Catatan</label>
                        <textarea
                            id="notes"
                            rows="3"
                            placeholder="Catatan khusus untuk pesanan..."></textarea>
                    </div>

                    <button
                        type="button"
                        class="btn btn-primary"
                        onclick="addToCart()"
                        style="width: 100%; margin-bottom: 10px">
                        ➕ Tambah ke Keranjang
                    </button>
                </form>

                <!-- Cart -->
                <div id="cartSection" style="display: none">
                    <h3>📋 Keranjang Belanja</h3>
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Layanan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems"></tbody>
                    </table>

                    <div class="total-section">
                        <h3>Total Pembayaran</h3>
                        <div class="total-amount" id="totalAmount">Rp 0</div>
                        <input type="hidden" id="total" />
                        <button
                            class="btn btn-success"
                            onclick="processTransaction()"
                            style="width: 100%; margin-top: 15px">
                            💳 Proses Transaksi
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Panel: Transaction History -->
            <div class="card">
                <h2>📊 Riwayat Transaksi</h2>
                <div class="transaction-list" id="transactionHistory">
                    <div class="transaction-item">
                        <h4>TRX-001 - John Doe</h4>
                        <p>📞 0812-3456-7890</p>
                        <p>🛍️ Cuci Setrika - 2.5kg</p>
                        <p>💰 Rp 17.500</p>
                        <p>📅 13 Juli 2025, 14:30</p>
                        <span class="status-badge status-process">Proses</span>
                    </div>
                    <div class="transaction-item">
                        <h4>TRX-002 - Jane Smith</h4>
                        <p>📞 0813-7654-3210</p>
                        <p>🛍️ Cuci Kering - 3kg</p>
                        <p>💰 Rp 15.000</p>
                        <p>📅 13 Juli 2025, 13:15</p>
                        <span class="status-badge status-ready">Siap</span>
                    </div>
                </div>

                <button
                    class="btn btn-warning"
                    onclick="showAllTransactions()"
                    style="width: 100%; margin-top: 15px">
                    📋 Lihat Semua Transaksi
                </button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div style="text-align: center; margin-top: 20px">
            <button
                class="btn btn-primary"
                onclick="showReports()"
                style="margin: 0 10px">
                📈 Laporan Penjualan
            </button>
            <a
                href="<?= BASEURL ?>/Auth/logout"
                class="btn btn-warning sign-out"
                onclick="manageServices()"
                style="margin: 0 10px">
                ⚙️ Keluar
            </a>
            <button
                class="btn btn-danger"
                onclick="clearCart()"
                style="margin: 0 10px">
                🗑️ Bersihkan Keranjang
            </button>
        </div>
    </div>

    <!-- Modal for Transaction Details -->
    <div id="transactionModal" class="modal">
        <div class="modal-content">
            <span class="close no-print" onclick="closeModal()">&times;</span>
            <div id="modalContent"></div>
        </div>
    </div>

    <script>
        let servicesData = [];
        const BASEURL = '<?= BASEURL ?>';
        fetch(`${BASEURL}/service/getServiceData`)
            .then(res => res.json())
            .then(data => {
                servicesData = data.services;
                // console.log(data.services);
            });

        // console.log(servicesData)

        let cart = [];
        let transactions = [];

        function addService(serviceName, price) {
            document.getElementById("serviceType").value = serviceName;
            document.getElementById("serviceWeight").focus();
        }

        function addToCart() {
            console.log(servicesData);
            const id_order = document.getElementById('order_code').value;
            const serviceType = document.getElementById('serviceType').value;
            const weight = parseFloat(document.getElementById('serviceWeight').value);
            const selectEl = document.getElementById('serviceType');
            const selected = selectEl.options[selectEl.selectedIndex];
            const service_name = selected.getAttribute('data-serv-name');
            // const notes = document.getElementById('notes').value;

            if (!serviceType || !weight || weight <= 0) {
                alert('Mohon lengkapi semua field yang diperlukan!');
                return;
            }

            const price = getPriceById(serviceType) / 1000;
            const subtotal = price * weight;

            const item = {
                order_code: id_order,
                id_service: serviceType,
                service: service_name,
                weight: weight,
                price: getPriceById(serviceType),
                subtotal: subtotal,
            };

            console.log(item)
            cart.push(item);
            updateCartDisplay();

            // Clear form
            document.getElementById('serviceType').value = '';
            document.getElementById('serviceWeight').value = '';
            document.getElementById('notes').value = '';
        }

        function getPriceById(serviceId) {
            const service = servicesData.find(item => item.id == serviceId);
            return service ? parseFloat(service.price) : 0;
        }


        function updateCartDisplay() {
            const cartItems = document.getElementById("cartItems");
            const cartSection = document.getElementById("cartSection");
            const totalAmount = document.getElementById("totalAmount");

            if (cart.length === 0) {
                cartSection.style.display = "none";
                return;
            }

            cartSection.style.display = "block";

            let html = "";
            let total = 0;

            cart.forEach((item) => {
                html += `
                    <tr>
                        <td>${item.service}</td>
                        <td>${item.weight/1000} kg</td>
                        <td>Rp ${item.price.toLocaleString()}</td>
                        <td>Rp ${item.subtotal.toLocaleString()}</td>
                        <td>
                            <button class="btn btn-danger" onclick="removeFromCart(${
                              item.id
                            })" style="padding: 5px 10px; font-size: 12px;">
                                🗑️
                            </button>
                        </td>
                    </tr>
                `;
                total += item.subtotal;
            });

            cartItems.innerHTML = html;
            totalAmount.textContent = `Rp ${total.toLocaleString()}`;
            // document.getElementById("total").value = total;
        }

        function removeFromCart(itemId) {
            cart = cart.filter((item) => item.id !== itemId);
            updateCartDisplay();
        }

        function clearCart() {
            cart = [];
            updateCartDisplay();
            document.getElementById("transactionForm").reset();
        }

        function processTransaction() {
            const customerName = document.getElementById("customerName").value;
            const id_customer = document.getElementById("id_customer").value;
            const customerPhone = document.getElementById("customerPhone").value;
            const order_code = document.getElementById("order_code").value;
            const note = document.getElementById("notes").value;
            const customerAddress =
                document.getElementById("customerAddress").value;

            if (!customerName || !customerPhone || cart.length === 0) {
                alert(
                    "Mohon lengkapi data pelanggan dan pastikan ada item di keranjang!"
                );
                return;
            }

            const total = cart.reduce((sum, item) => sum + item.subtotal, 0);
            const dateNow = new Date();
            const finishDate = new Date(dateNow);
            finishDate.setDate(finishDate.getDate() + 2);

            const transaction = {
                customer: {
                    id: id_customer,
                    name: customerName,
                    phone: customerPhone,
                    address: customerAddress,
                },
                items: [...cart],
                total: total,
                date: new Date().toISOString(),
                finish: finishDate.toISOString(),
                note: note ? note : ''
            };

            // transactions.push(transaction);
            // localStorage.setItem(
            //     "laundryTransactions",
            //     JSON.stringify(transactions)
            // );
            fetch('<?= BASEURL ?>/transaction/addOperatorTransaction', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(transaction),
                })
                .then(response => response.text()) // terima response sebagai teks
                .then(text => {
                    console.log('RESPONSE DARI SERVER:', text); // tampilkan di console
                    try {
                        const data = JSON.parse(text); // coba ubah ke JSON
                        if (data.success) {
                            alert('Transaksi berhasil disimpan!');
                            showReceipt(transaction);
                            clearCart();
                            updateTransactionHistory();
                            updateStats();
                        } else {
                            alert('Gagal menyimpan transaksi: ' + data.message);
                        }
                    } catch (e) {
                        alert('Response dari server bukan JSON!');
                        console.error('Bukan JSON:', text); // <== Lihat isi HTML/erronya di console
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                    alert('Terjadi kesalahan saat mengirim data transaksi!');
                });


        }

        function showReceipt(transaction) {
            const receiptHtml = `
                <div class="receipt">
                    <div class="receipt-header">
                        <h2>🧺 LAUNDRY RECEIPT</h2>
                        <p>ID: ${transaction.order_code}</p>
                        <p>Tanggal: ${new Date(transaction.date).toLocaleString(
                          "id-ID"
                        )}</p>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <strong>Pelanggan:</strong><br>
                        ${transaction.customer.name}<br>
                        ${transaction.customer.phone}<br>
                        ${transaction.customer.address}
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <strong>Detail Pesanan:</strong><br>
                        ${transaction.items
                          .map(
                            (item) => `
                            <div class="receipt-item">
                                <span>${item.service} (${item.weight} ${
                              item.service.includes("Sepatu")
                                ? "pasang"
                                : item.service.includes("Karpet")
                                ? "m²"
                                : "kg"
                            })</span>
                                <span>Rp ${item.subtotal.toLocaleString()}</span>
                            </div>
                        `
                          )
                          .join("")}
                    </div>
                    
                    <div class="receipt-total">
                        <div class="receipt-item">
                            <span>TOTAL:</span>
                            <span>Rp ${transaction.total.toLocaleString()}</span>
                        </div>
                    </div>
                    
                    <div style="text-align: center; margin-top: 20px;">
                        <p>Terima kasih atas kepercayaan Anda!</p>
                        <p>Barang akan siap dalam 1-2 hari kerja</p>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 20px;">
                    <button class="btn btn-primary no-print" onclick="printReceipt()">🖨️ Cetak Struk</button>
                    <button type="submit" class="btn btn-success no-print" onclick="closeModal()">✅ Selesai</button>
                    </div>
            `;

            document.getElementById("modalContent").innerHTML = receiptHtml;
            document.getElementById("transactionModal").style.display = "block";
        }

        function printReceipt() {
            window.print();
        }

        function updateTransactionHistory() {
            fetch("<?= BASEURL ?>/transaction/getRecentTransactions")
                .then((res) => res.json())
                .then((transactions) => {
                    const historyContainer = document.getElementById("transactionHistory");

                    const html = transactions
                        .map(
                            (transaction) => `
                <div class="transaction-item">
                    <h4>${transaction.order_code} - ${transaction.cust_name}</h4>
                    <p>📞 ${transaction.cust_phone}</p>
                    <p>📍 ${transaction.cust_address}</p>
                    <p>💰 Rp ${parseInt(transaction.total || 0).toLocaleString()}</p>
                    <p>📅 ${new Date(transaction.order_date).toLocaleDateString("id-ID")}</p>
                    <span class="status-badge status-${transaction.order_status}">
                        ${getStatusText(transaction.order_status, transaction.order_pay)}
                    </span>
                </div>
            `
                        )
                        .join("");

                    historyContainer.innerHTML = html || "<p>Belum ada transaksi</p>";
                })
                .catch((error) => {
                    console.error("Gagal mengambil data transaksi:", error);
                });
        }


        function getStatusText(status, pay) {
            if (status == 0) {
                return "In Machine";
            } else if (status == 1) {
                return pay == 0 || pay == null || pay == '' ?
                    "Finish" :
                    "Finished | Paid";
            }
            return "Unknown";
        }


        function updateStats() {
            fetch("<?= BASEURL ?>/transaction/getDailyStats")
                .then(res => res.json())
                .then(stats => {
                    document.getElementById("totalTransactions").textContent = stats.total_transactions;
                    document.getElementById("totalRevenue").textContent = `Rp ${stats.total_revenue.toLocaleString()}`;
                    document.getElementById("activeOrders").textContent = stats.active_orders;
                    document.getElementById("completedOrders").textContent = stats.completed_orders;
                })
                .catch(err => {
                    console.error("Gagal memuat statistik:", err);
                });
        }


        function showAllTransactions() {
            fetch("<?= BASEURL ?>/transaction/getAllTransactions")
                .then(res => res.json())
                .then(data => {
                    transactions = data;
                    const html = `
                <h2>📋 Semua Transaksi</h2>
                <input type="text" id="searchOrderInput" placeholder="🔍 Cari transaksi..." 
                    oninput="filterTransactions()" 
                    style="width: 100%; padding: 8px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;" />
                <div id="transactionList" style="max-height: 400px; overflow-y: auto;">
                    ${renderTransactionList(transactions)}
                </div>
            `;
                    document.getElementById("modalContent").innerHTML = html;
                    document.getElementById("transactionModal").style.display = "block";
                })
                .catch((err) => {
                    console.error("Gagal mengambil semua transaksi:", err);
                    alert("Gagal memuat semua transaksi!");
                });
        }

        function filterTransactions() {
            const keyword = document.getElementById("searchOrderInput").value.toLowerCase();
            const filtered = transactions.filter(t =>
                t.order_code.toLowerCase().includes(keyword)
            );

            document.getElementById("transactionList").innerHTML = renderTransactionList(filtered);
        }

        function renderTransactionList(data) {
            return data.map((transaction) => `
                <div class="transaction-item">
                    <h4>${transaction.order_code} - ${transaction.cust_name}</h4>
                    <p>📞 ${transaction.cust_phone}</p>
                    <p>📍 ${transaction.cust_address}</p>
                    <p>💰 Rp ${parseInt(transaction.total || 0).toLocaleString()}</p>
                    <p>📅 ${new Date(transaction.order_date).toLocaleDateString("id-ID")}</p>
                    ${
                        transaction.order_status == 0
                            ? `<form method="POST" action="<?= BASEURL ?>/transaction/updateStatus" style="display:inline;">
                                    <input type="hidden" name="id" value="${transaction.id}">
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" class="status-badge status-0" style="border:none; background:none; cursor:pointer;">
                                        <span class="status-badge status-0">
                                            ${getStatusText(0, transaction.order_pay)}
                                        </span>
                                    </button>
                                </form>`
                            : `<span class="status-badge status-${transaction.order_status}">
                                ${getStatusText(transaction.order_status, transaction.order_pay)}
                            </span>`
                    }
                    ${(!transaction.order_pay && !transaction.order_change) ? `
                        <button class="btn btn-primary" onclick="updateTransactionStatus('${transaction.order_code}', '${transaction.total}')"
                            style="margin-top: 10px; padding: 5px 15px; font-size: 12px;">
                            📝 Payment
                        </button>
                    ` : ''}
                </div>
            `).join("");
        }


        function showReports() {
            fetch("<?= BASEURL ?>/transaction/getReportData")
                .then(res => res.json())
                .then(data => {
                    const {
                        summary,
                        services
                    } = data;

                    const reportsHtml = `
                <h2>📈 Laporan Penjualan</h2>
                <div class="stats-grid" style="margin-bottom: 20px;">
                    <div class="stat-card"><h3>${summary.total_all}</h3><p>Total Transaksi</p></div>
                    <div class="stat-card"><h3>${summary.total_month}</h3><p>Transaksi Bulan Ini</p></div>
                    <div class="stat-card"><h3>Rp ${parseInt(summary.revenue_month || 0).toLocaleString()}</h3><p>Pendapatan Bulan Ini</p></div>
                </div>
                <h3>📊 Statistik Layanan</h3>
                <table class="cart-table">
                    <thead>
                        <tr><th>Layanan</th><th>Jumlah Order</th><th>Total Pendapatan</th></tr>
                    </thead>
                    <tbody>
                        ${services.map(service => `
                            <tr>
                                <td>${service.service_name}</td>
                                <td>${service.order_count}</td>
                                <td>Rp ${parseInt(service.total_revenue).toLocaleString()}</td>
                            </tr>
                        `).join("")}
                    </tbody>
                </table>
            `;

                    document.getElementById("modalContent").innerHTML = reportsHtml;
                    document.getElementById("transactionModal").style.display = "block";
                })
                .catch(err => {
                    console.error("Gagal memuat laporan:", err);
                    alert("Gagal memuat laporan penjualan!");
                });
        }

        function updateTransactionStatus(orderCode, total) {
            const transaction = transactions.find(t => t.order_code === orderCode);
            if (!transaction) return;

            const statusHtml = `
        <h2>📝 Update Payment Transaksi</h2>
        <h3>${transaction.order_code} - ${transaction.cust_name}</h3>

        
            <input type="hidden" name="id" id="order_id" value="${transaction.id}" />
            <input type="hidden" name="total_input" id="total_input" value="${total}" />

            <div class="form-group">
                <label>Total Bayar:</label>
                <input type="number" name="order_pay" id="order_pay" class="input" required />
            </div>
            <div class="form-group">
                <label>Kembalian:</label>
                <input type="number" name="order_change" id="order_change" class="input" readonly />
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" onclick="savePaymentUpdate()" class="btn btn-success">
                    ✅ Simpan Update
                </button>
                <button type="button" class="btn btn-danger" onclick="closeModal()" style="margin-left: 10px;">
                    ❌ Batal
                </button>
            </div>
    `;

            document.getElementById("modalContent").innerHTML = statusHtml;
            document.getElementById("transactionModal").style.display = "block";

            // Kalkulasi otomatis order_change
            setTimeout(() => {
                const orderPayInput = document.getElementById("order_pay");
                const orderChangeInput = document.getElementById("order_change");
                const totalValue = parseInt(total);

                orderPayInput.addEventListener("input", () => {
                    const pay = parseInt(orderPayInput.value || 0);
                    const change = pay - totalValue;
                    orderChangeInput.value = change > 0 ? change : 0;
                });
            }, 100);
        }

        function savePaymentUpdate() {
            const id = document.getElementById('order_id').value;
            const orderPay = parseInt(document.getElementById('order_pay').value);
            const total = parseInt(document.getElementById('total_input').value);
            const orderChange = parseInt(document.getElementById('order_change').value);

            fetch("<?= BASEURL ?>/transaction/updatePayment", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: new URLSearchParams({
                        id: id,
                        order_pay: orderPay,
                        order_change: orderChange
                    })
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.success) {
                        closeModal(); // menutup modal
                        showAllTransactions(); // refresh daftar transaksi
                    }
                })
                .catch(err => {
                    console.error("Terjadi kesalahan:", err);
                    alert("Terjadi kesalahan pada server!");
                });
        }

        function closeModal() {
            document.getElementById("transactionModal").style.display = "none";
        }

        // Initialize the application
        document.addEventListener("DOMContentLoaded", function() {
            updateTransactionHistory();
            updateStats();

            const customer = document.getElementById('id_customer');
            customer.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                const phone = selected.getAttribute('data-phone');
                const address = selected.getAttribute('data-address');
                const cust_name = selected.getAttribute('data-cust-name');
                const id_cust = selected.getAttribute('data-id-cust');

                document.getElementById('customerPhone').value = phone || '';
                document.getElementById('customerAddress').value = address || '';
                document.getElementById('customerName').value = cust_name || '';
                document.getElementById('id_customer').value = id_cust || '';
            });

            // Add event listener for weight input to handle decimal with comma
            const weightInput = document.getElementById("serviceWeight");
            weightInput.addEventListener("input", function() {
                formatNumber(this);
            });

            // Close modal when clicking outside
            window.onclick = function(event) {
                const modal = document.getElementById("transactionModal");
                if (event.target === modal) {
                    closeModal();
                }
            };
        });
    </script>
</body>

</html>