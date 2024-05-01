<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: black;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .back-button {
            background-color: #fff;
            color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        .product-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .product-image {
            max-width: 200px;
            max-height: 200px;
            margin-right: 20px;
        }

        .product-info {
            flex: 1;
        }

        .product-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .product-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
<body>
    <header>
        <a href="javascript:history.back()" class="back-button">Back</a>
    </header>
    
    <main>
        <div class="product-details">
            <?php
                $productName = $_GET['product'];

                $products = [
                    [
                        'name' => 'Car 1',
                        'image' => 'car.jpeg',
                        'price' => '$10,000',
                        'year' => '2020',
                        'description' => 'This is a description of Car 1.',
                        'OwnerName'=>'Sanjai',
                        'DOB'=>'12-27-2003',
                    ],
                    [
                        'name' => 'Car 2',
                        'image' => 'car2.jpeg',
                        'price' => '$10,000',
                        'year' => '2020',
                        'description' => 'This is a description of Car 1.',
                        'OwnerName'=>'Tamil',
                        'DOB'=>'01-01-2003',

                    ],
                ];

                $selectedProduct = null;
                foreach ($products as $product) {
                    if ($product['name'] === $productName) {
                        $selectedProduct = $product;
                        break;
                    }
                }

                if ($selectedProduct !== null) {
                    echo '<img class="product-image" src="' . $selectedProduct['image'] . '" alt="' . $selectedProduct['name'] . '">';
                    echo '<div class="product-info">';
                    echo '<h2>' . $selectedProduct['name'] . '</h2>';
                    echo '<p>Price: ' . $selectedProduct['price'] . '</p>';
                    echo '<p>Year: ' . $selectedProduct['year'] . '</p>';
                    echo '<p>Description: ' . $selectedProduct['description'] . '</p>';
                    echo '<p>OwnerName:' .$selectedProduct['OwnerName'].'</p>';
                    echo '<p>DOB:' .$selectedProduct['DOB'].'</p>';
                    echo '<button class="buy-button">Buy Now</button>';

                    echo '</div>';
                } else {
                    echo '<p>Product not found.</p>';
                }
            ?>
        </div>
    </main>
<script>
        const buyButton = document.querySelector('.buy-button');
        
        buyButton.addEventListener('click', () => {
            // Change the URL to the desired "buy_now_page.php" page
            window.location.href = 'buy_now_page.php';
        });
    </script>
</body>
</html>
