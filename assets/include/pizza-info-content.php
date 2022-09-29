<?php
declare(strict_types = 1);
ob_start();

?>

<div class="pizza-types-wrapper">
    <table class="pizza-table">
        <thead>
        <th>Pizza</td>
        <th>Personal 7"</th>
        <th>Small 10"</th>
        <th>Medium 12"</th>
        <th>Large 16"</th>
        </thead>
        <tbody>
            <tr>
                <td>Cheese</td>
                <td>$6.00</td>
                <td>$10.00</td>
                <td>$14.00</td>
                <td>$16.00</td>
            </tr>
            <tr>
                <td>Veggie</td>
                <td>$6.50</td>
                <td>$11.00</td>
                <td>$15.00</td>
                <td>$18.00</td>
            </tr>
            <tr>
                <td>Pepperoni</td>
                <td>$7.00</td>
                <td>$12.00</td>
                <td>$16.00</td>
                <td>$19.00</td>
            </tr>
            <tr>
                <td>Supreme</td>
                <td>$7.00</td>
                <td>$12.00</td>
                <td>$16.00</td>
                <td>$19.00</td>
            </tr>
            <tr>
                <td>Hawaiian</td>
                <td>$7.00</td>
                <td>$12.00</td>
                <td>$16.00</td>
                <td>$19.00</td>
            </tr>
        </tbody>
    </table>
</div>

<?php ob_end_flush(); ?>