<!DOCTYPE html>
<html lang="en">
<head>
    <title>Survey Central</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body onload="return show('Page1', 'Page2');">
    <header>
        <h1>Survey Central</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="survey.php" class="active">Survey</a></li>
                <li><a href="data.php">Data</a></li>
            </ul>
        </nav>
    </header>

    <form action="action.php?action=saveFormData" method="POST">
        <section class="form" id="Page1">
            <u><h1>Personal Info</h1></u>

            <div class="form-control">
                <label for="name" class="Qlabel">Name</label>
                <input type="text" id="name" name="name" class="single-input" placeholder="Enter your full name" required>
            </div>

            <div class="form-control">
                <label for="birthdate" class="Qlabel">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" class="single-input" required>
            </div>

            <button class="cta-button" onclick="return show('Page2','Page1');">Next Page</button>
        </section>

        <section class="form" id="Page2">
            <u><h1>Survey Questions</h1></u>
            <br>

            <div class="form-control">
                <label for="q1" class="Qlabel">What is your favorite genre of music?</label>
                <input type="text" id="q1" name="q1" class="single-input" placeholder="Rock, Pop, Country, etc..." required>
            </div>

            <div class="form-control">
                <label for="q2" class="Qlabel">What is your favorite ethnic food?</label>
                <input type="text" id="q2" name="q2" class="single-input" placeholder="Mexican, Italian, Indian, etc..." required>
            </div>

            <div class="form-control">
                <label for="q3" class="Qlabel">Favorite college football team?</label>
                <input type="text" id="q3" name="q3" class="single-input" placeholder="Auburn Tigers, Georgia Bulldogs, etc..." required>
            </div>

            <div class="form-control">
                <label for="q4" class="Qlabel">What is your favorite color?</label>
                <input type="text" id="q4" name="q4" class="single-input" placeholder="Blue, Black, Brown, etc..." required>
            </div>

            <div class="form-control">
                <label for="q5" class="Qlabel">Write the first word that comes to mind</label>
                <input type="text" id="q5" name="q5" class="single-input" placeholder="Not the best word, the first." required>
            </div>

            <input type="submit" class="cta-button" value="Submit">
        </section>
    </form>

    <footer>
        <p>&copy; 2024 Survey Central</p>
    </footer>
</body>
</html>
