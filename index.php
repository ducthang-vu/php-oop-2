<?php
    include_once './script.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse | Home</title>
</head>
<body>
    <header>
        <h1>Warehouse code: <?php echo $myWarehouse->getId() ?></h1>
        <p><strong>Address:</strong><?php echo $myWarehouse->getAddress() ?> </p>
    </header>

    <main>
        <section>
            <h2>Books</h2>

            <table>
                <tr>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Price</th>
                </tr>

                <?php foreach($myWarehouse->getInventoryFilter('book') as $item) { ?>
                    <tr>
                        <td><?php echo $item->getProps()['author'] ?></td>
                        <td><?php echo $item->getProps()['title'] ?></td>
                        <td><?php echo $item->getProps()['genre'] ?></td>
                        <td><?php echo $item->getProps()['normalPrice'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </section>

        <Section>
            <h2>Tables</h2>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Weight</th>
                    <th>Material</th>
                    <th>Price</th>
                </tr>

                <?php foreach($myWarehouse->getInventoryFilter('table') as $item) { ?>
                    <tr>
                        <td><?php echo $item->getProps()['name'] ?></td>
                        <td><?php echo $item->getProps()['weight'] ?></td>
                        <td><?php echo $item->getProps()['material'] ?></td>
                        <td><?php echo $item->getProps()['normalPrice'] ?></td>
                    </tr>
                <?php } ?>
            </table>

        </Section>
    </main>
</body>
</html>