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
        <a href="http://localhost/Website/admin/overview" class="active">Analytics</a>
        <a href="<?php echo base_url('admin/users'); ?>">Users</a>
        <a href="<?php echo base_url('admin/add_product'); ?>">Products</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="dashboard-header">
            <h1 class="mb-0">Analytics Dashboard</h1>
            <p class="text-muted">Insights into EzPizza Performance</p>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Sales Overview Chart -->
                <div class="col-lg-6 col-md-12">
                    <div class="chart-container">
                        <h5>Monthly Sales Overview</h5>
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <!-- Top Products Chart -->
                <div class="col-lg-6 col-md-12">
                    <div class="chart-container">
                        <h5>Top Product Sales</h5>
                        <canvas id="productSalesChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Customer Insights Chart -->
                <div class="col-lg-6 col-md-12">
                    <div class="chart-container">
                        <h5>Top Customers by Total Spent</h5>
                        <canvas id="customerSpendChart"></canvas>
                    </div>
                </div>

                <!-- Product Ratings Chart -->
                <div class="col-lg-6 col-md-12">
                    <div class="chart-container">
                        <h5>Product Ratings</h5>
                        <canvas id="productRatingsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sales Overview Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: [<?php 
                    $labels = array_map(function($sale) { 
                        return "'". $sale->year . "-" . $sale->month . "'"; 
                    }, $sales_overview);
                    echo implode(',', $labels);
                ?>],
                datasets: [{
                    label: 'Total Revenue',
                    data: [<?php 
                        $revenues = array_map(function($sale) { 
                            return $sale->total_revenue; 
                        }, $sales_overview);
                        echo implode(',', $revenues);
                    ?>],
                    backgroundColor: 'rgba(116, 215, 200, 0.7)',
                    borderColor: 'rgba(116, 215, 200, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Revenue ($)',
                            color: '#1C2024'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#1C2024'
                        }
                    }
                }
            }
        });

        // Top Products Chart
        const productCtx = document.getElementById('productSalesChart').getContext('2d');
        new Chart(productCtx, {
            type: 'pie',
            data: {
                labels: [<?php 
                    $productLabels = array_map(function($product) { 
                        return "'". addslashes($product->product_name) . "'"; 
                    }, $top_products);
                    echo implode(',', $productLabels);
                ?>],
                datasets: [{
                    data: [<?php 
                        $productSales = array_map(function($product) { 
                            return $product->total_product_revenue; 
                        }, $top_products);
                        echo implode(',', $productSales);
                    ?>],
                    backgroundColor: [
                        'rgba(116, 215, 200, 0.7)',
                        'rgba(28, 32, 36, 0.7)',
                        'rgba(247, 247, 247, 0.7)',
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#1C2024'
                        }
                    }
                }
            }
        });

        // Customer Spend Chart
        const customerCtx = document.getElementById('customerSpendChart').getContext('2d');
        new Chart(customerCtx, {
            type: 'bar',
            data: {
                labels: [<?php 
                    $customerLabels = array_map(function($customer) { 
                        return "'". addslashes($customer->customer_name) . "'"; 
                    }, $customer_insights);
                    echo implode(',', $customerLabels);
                ?>],
                datasets: [{
                    label: 'Total Spent',
                    data: [<?php 
                        $customerSpends = array_map(function($customer) { 
                            return $customer->total_spent; 
                        }, $customer_insights);
                        echo implode(',', $customerSpends);
                    ?>],
                    backgroundColor: 'rgba(28, 32, 36, 0.7)',
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Spent ($)',
                            color: '#1C2024'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#1C2024'
                        }
                    }
                }
            }
        });

        // Product Ratings Chart
        const ratingsCtx = document.getElementById('productRatingsChart').getContext('2d');
        new Chart(ratingsCtx, {
            type: 'bar',
            data: {
                labels: [<?php 
                    $ratingLabels = array_map(function($review) { 
                        return "'". addslashes($review->product_name) . "'"; 
                    }, $testimonial_analysis);
                    echo implode(',', $ratingLabels);
                ?>],
                datasets: [{
                    label: 'Average Rating',
                    data: [<?php 
                        $ratings = array_map(function($review) { 
                            return $review->average_rating; 
                        }, $testimonial_analysis);
                        echo implode(',', $ratings);
                    ?>],
                    backgroundColor: 'rgba(116, 215, 200, 0.7)',
                    borderColor: 'rgba(116, 215, 200, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5,
                        title: {
                            display: true,
                            text: 'Average Rating',
                            color: '#1C2024'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#1C2024'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>