<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <footer>
        <div id="footer-content">
            <img src="../img\volleybuddy-favicon-black.png" alt="" class="logo">
            <p id="footer"> <?php echo date("Y"); ?> VolleyBuddy. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

<style>
    #footer-content{
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 113px;
        padding-right: 20px;
        padding-left: 20px;
        width:auto;
    }
    footer{ 
        display: block;
        position: relative;
        background-color: rgba(0, 0, 0, 0.09);
        clear: both;
        text-align: end;
        padding-right: 5px;
        margin-top: auto;
    }
</style>