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
                    <label for="name" class="Qlabel">
                        Name 
                    </label>
                    <input type="text" id="name" name="name" class="single-input" placeholder="Enter your full name"/>
                </div>
    
                <div class="form-control">
                    <label for="email" class="Qlabel">
                        Email
                    </label>
                    <input type="email" id="email" name="email" class="single-input" placeholder="Enter your email address"/>
                </div>

                <div class="form-control">
                    <label for="age" class="Qlabel">
                        Age
                    </label>
                    <input type="number" id="age" name="age" class="single-input" placeholder="Enter your age"/>
                </div>

                <button class="cta-button" onclick="return show('Page2','Page1');">Next Page</button>
            </section>

            <section class="form" id="Page2">
                <u><h1>Survey Questions</h1></u>
                <br>

                <div class="form-control">
                    <label for="q1" class="Qlabel">
                        What is your favorite hobby?
                    </label>
                    <input type="text" id="q1" name="q1" class="single-input" placeholder="Enter your favorite hobby"/>
                </div>

                <div class="form-control">
                    <label for="q2" class="Qlabel">
                        What is your favorite type of food?
                    </label>
                    <input type="text" id="q2" name="q2" class="single-input" placeholder="Ex: Pizza, Sushi, Salad, etc"/>
                </div>

                <div class="form-control">
                    <label for="q3" class="Qlabel">
                        What is your preferred type of entertainment?
                    </label>
                    <input type="text" id="q3" name="q3" class="single-input" placeholder="Ex: Movies, Video Games, Reading, Sports, etc"/>
                </div>

                <div class="form-control">
                    <label for="q4" class="Qlabel">
                        What is your favorite travel destination?
                    </label>
                    <input type="text" id="q4" name="q4" class="single-input" placeholder="Ex: Beach, Mountains, City, Countryside"/>
                </div>

                <div class="form-control">
                    <label for="q5" class="Qlabel">
                        Do you prefer working alone or in a team?
                    </label>
                    <input type="text" id="q5" name="q5" class="single-input" placeholder="Enter your preference"/>
                </div>

                <input type="submit" class="cta-button" value="Submit">
            </section>
        </form>
    
        <footer>
            <p>&copy; 2024 Survey Central</p>
        </footer>
    </body>
</html>
