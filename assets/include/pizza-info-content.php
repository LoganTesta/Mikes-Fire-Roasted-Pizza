<?php
declare(strict_types = 1);
ob_start();

?>

<div class="pizza-types-wrapper">
    <table class="pizza-table">
        <thead>
        <th>Pizza</td>
        <th>Personal</th>
        <th>Small</th>
        <th>Medium</th>
        <th>Large</th>
        </thead>
        <tbody>
            <tr>
                <td>Cheese</td>
                <td>$5.00</td>
                <td>$10.00</td>
                <td>$11.00</td>
                <td>$12.00</td>
            </tr>
            <tr>
                <td>Veggie</td>
                <td>$5.50</td>
                <td>$12.00</td>
                <td>$13.00</td>
                <td>$14.00</td>
            </tr>
            <tr>
                <td>Pepperoni</td>
                <td>$5.75</td>
                <td>$13.00</td>
                <td>$14.00</td>
                <td>$15.00</td>
            </tr>
            <tr>
                <td>Supreme</td>
                <td>$6.00</td>
                <td>$14.00</td>
                <td>$15.00</td>
                <td>$16.00</td>
            </tr>
            <tr>
                <td>Hawaiian</td>
                <td>$6.00</td>
                <td>$14.00</td>
                <td>$15.00</td>
                <td>$16.00</td>
            </tr>
        </tbody>
    </table>
</div>

<?php ob_end_flush(); ?>