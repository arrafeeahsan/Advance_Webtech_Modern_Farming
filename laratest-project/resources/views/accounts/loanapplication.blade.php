<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Apply Loan</title>
</head>
<body>
    <div>
        <h1>Fill up the form for applying loan</h1>
        <form method="post">
            <table>
                <tr>
                    <td><label>Loan name: </label></td>
                    <td><input type="text" name="loanname"></td>
                </tr>
                <tr>
                    <td><label>Loan number: </label></td>
                    <td><input type="text" name="loannumber"></td>
                </tr>
                
                <tr>
                    <td><label>Loan balance: </label></td>
                    <td><input type="number" name="loanbalance"></td>
                </tr>
                  <tr>
                    <td><label>Loan category: </label></td>
                    <td><input type="text" name="loancategory"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Create"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>