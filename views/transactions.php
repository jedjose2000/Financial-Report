<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactionsArray as $key => $value): ?>
                <tr>
                    <td>
                        <?= formatDate($value['date']); ?>
                    </td>
                    <td>
                        <?= $value['check']; ?>
                    </td>
                    <td>
                        <?= $value['transaction']; ?>
                    </td>
                    <td style="<?php  echo (str_replace('$', "", $value['amount'] ) < 0) ? 'color: red;' : 'color: green;'; ?>">
                        <?= $value['amount']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?php echo '$'. number_format($computedTransactions['totalIncome'],2,'.',',')  ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><?php echo '-$'. number_format($computedTransactions['totalExpenses'],2,'.',',') ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><?php echo '$'. number_format($computedTransactions['netIncome'],2,'.',',') ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>