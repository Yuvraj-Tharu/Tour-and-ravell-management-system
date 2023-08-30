<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form>

        <label for="package-name">Package Name:</label>
        <input type="text" id="package-name" name="packagename"><br><br>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination"><br><br>

        <label for="pricing">Pricing:</label>
        <input type="number" id="pricing" name="pricing"><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5"><br><br>

        <label for="discount">Discount:</label>
        <input type="number" id="discount" name="discount"><br><br>

        <label for="image-upload">Upload Image:</label>
        <input type="file" id="image-upload" name="picture_link"><br><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>
