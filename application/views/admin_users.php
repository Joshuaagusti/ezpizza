<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EzPizza Analytics Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #F7F7F7;
            --dark-bg: #1C2024;
            --accent-color: #74d7c8;
            --light-accent: #a6e6dc;
            --text-color: #333;
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Arial', sans-serif;
            color: var(--text-color);
        }

        .sidebar {
            height: 100vh;
            background-color: var(--dark-bg);
            color: white;
            position: fixed;
            width: 240px;
            top: 0;
            left: 0;
            padding-top: 30px;
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .sidebar a {
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(116, 215, 200, 0.2);
            border-left-color: var(--accent-color);
            color: var(--accent-color);
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        .dashboard-header {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .chart-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            padding: 25px;
            transition: transform 0.3s ease;
        }

        .chart-container:hover {
            transform: translateY(-5px);
        }

        .chart-container h5 {
            color: var(--dark-bg);
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">EzPizza</div>
        <a href="https://ezpizza.store/admin/overview" >Analytics</a>
        <a href="<?php echo base_url('admin/users');?>" class="active">Users</a>
        <a href="<?php echo base_url('admin/add_product'); ?>">Products</a>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Success and Error Messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <h2 class="mb-4">Client Data</h2>

            <!-- Table to Display Client Data -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Cliente</th>
                        <th>Cliente Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Fecha Registro</th>
                        <th>Total Órdenes</th>
                        <th>Total Revenue</th>
                        <th>Total Productos Comprados</th>
                        <th>Total Items Carrito</th>
                        <th>Valor Carrito</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $client): ?>
                        <tr>
                            <td><?= $client['id_cliente'] ?></td>
                            <td><?= $client['cliente_nombre'] ?></td>
                            <td><?= $client['email'] ?></td>
                            <td><?= $client['telefono'] ?? 'N/A' ?></td>
                            <td><?= $client['direccion'] ?? 'N/A' ?></td>
                            <td><?= $client['fecha_registro'] ?></td>
                            <td><?= $client['total_ordenes'] ?></td>
                            <td>$<?= number_format($client['total_revenue'] ?? 0, 2) ?></td>
                            <td><?= $client['total_productos_comprados'] ?? 0 ?></td>
                            <td><?= $client['total_items_carrito'] ?></td>
                            <td>$<?= number_format($client['valor_carrito'] ?? 0, 2) ?></td>
                            <td>
                                <!-- Delete User Button -->
                                <form action="<?php echo base_url('admin/delete_user'); ?>" method="POST" style="display:inline;">
                                    <input type="hidden" name="id_cliente" value="<?= $client['id_cliente'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete User</button>
                                </form>
                                
                                <!-- Make Admin Button -->
                                <form action="<?php echo base_url('admin/make_admin'); ?>" method="POST" style="display:inline;">
                                    <input type="hidden" name="id_cliente" value="<?= $client['id_cliente'] ?>">
                                    <button type="submit" class="btn btn-warning btn-sm">Make Admin</button>
                                </form>

                                <!-- Revoke Admin Button (only show if the client is an admin) -->
                                <?php if ($client['is_admin'] == 1): ?>
                                    <form action="<?php echo base_url('admin/revoke_admin'); ?>" method="POST" style="display:inline;">
                                        <input type="hidden" name="id_cliente" value="<?= $client['id_cliente'] ?>">
                                        <button type="submit" class="btn btn-secondary btn-sm">Revoke Admin</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
