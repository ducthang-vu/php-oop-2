<?php
    include_once './partials/script.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse | Home</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header class="mb-5 text-center">
        <div class="container">
            <h1>Warehouse code: <?php echo $myWarehouse->getId() ?></h1>
            <p><strong>Address: </strong><?php echo $myWarehouse->getAddress() ?> </p>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="col-8 offset-2 mb-4">
                <h2>Books</h2>

                <table class="table">
                    <tr>
                        <th scope="col">Author</th>
                        <th scope="col">Title</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Price</th>
                    </tr>

                    <?php foreach($myWarehouse->getInventoryFilter('book') as $item) { ?>
                        <tr>
                            <td><?php echo $item->getProps()['author'] ?></td>
                            <td><?php echo $item->getProps()['title'] ?></td>
                            <td><?php echo ucfirst($item->getProps()['genre']) ?></td>
                            <td><?php echo number_format($item->getProps()['normalPrice'], 2) ?> $</td>
                        </tr>
                    <?php } ?>
                </table>
            </section>

            <Section  class="col-8 offset-2">
                <h2>Tables</h2>

                <table class="table">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Weight (kg)</th>
                        <th scope="col">Material</th>
                        <th scope="col">Price</th>
                    </tr>

                    <?php foreach($myWarehouse->getInventoryFilter('table') as $item) { ?>
                        <tr>
                            <td><?php echo $item->getProps()['name'] ?></td>
                            <td><?php echo $item->getProps()['weight'] ?></td>
                            <td><?php echo ucfirst($item->getProps()['material']) ?></td>
                            <td><?php echo number_format($item->getProps()['normalPrice'], 2) ?> $</td>
                        </tr>
                    <?php } ?>
                </table>
            </Section>
        </div>
    </main>
</body>
</html>