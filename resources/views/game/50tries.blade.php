<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guess the Player</title>
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container text-center">
    <h1 class="display-3 fw-normal display-color text-primary text-center">50 Tries Game Mode</h1>
    <p class="display-5 text-body-secondary">Tries Left: {{ session('tries') }}</p>
    <p class="display-5 text-body-secondary">Score: {{ session('score') }}</p>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center full-height">
        <div id="card" class="card-24 card-24-icon ">
            <div id="Face" class="card-24-face hidden">
                <div class="card-24-face-inner">
                    {{--            <img src="{{ url('https://cdn.futwiz.com/assets/img/fc24/faces/' . $player['id'] . '.png') }}" alt="Haaland FC 24 Custom Card Creator Face">--}}
                    <img src="{{ url($player['avatarUrl']) }}" alt="{{ $player['commonName'] }} FC 24 Custom Card Creator Face">
                </div>
            </div>
            <div id="overall_rating" class="card-24-rating hidden">{{ $player['overallRating'] }}</div>
            <div id="position" class="card-24-position hidden">{{ $player['position'] }}</div>
            {{--    <div class="card-24-chemstyle"><i class="chemicon-basic"></i></div>--}}
            {{--    <div class="card-24-first-owner"><div>1</div></div>--}}
            <div id="name" class="card-24-name hidden">{{  $player['commonName'] }}</div>
            <div class="card-24-atts ">
                <div class="att-row-label">
                    <div class="att1-label card-24-attlabel1">
                        PAC
                    </div>
                    <div class="att2-label card-24-attlabel2">
                        SHO
                    </div>
                    <div class="att3-label card-24-attlabel3">
                        PAS
                    </div>
                    <div class="att4-label card-24-attlabel4">
                        DRI
                    </div>
                    <div class="att5-label card-24-attlabel5">
                        DEF
                    </div>
                    <div class="att6-label card-24-attlabel6">
                        PHY
                    </div>
                </div>
                <div class="att-row-num">
                    <div id="pac" class="att1-num card-24-attnum1 hidden">
                        {{ $player['PAC'] }}
                    </div>
                    <div id="sho" class="att2-num card-24-attnum2 hidden">
                        {{ $player['SHO'] }}
                    </div>
                    <div id="pas" class="att3-num card-24-attnum3 hidden">
                        {{ $player['PAS'] }}
                    </div>
                    <div id="dri" class="att4-num card-24-attnum4 hidden">
                        {{ $player['DRI'] }}
                    </div>
                    <div id="def" class="att5-num card-24-attnum5 hidden">
                        {{ $player['DEF'] }}
                    </div>
                    <div id="phy" class="att6-num card-24-attnum6 hidden">
                        {{ $player['PHY'] }}
                    </div>
                </div>
            </div>
            <div class="card-24-details">
                <div class="card-24-nation">
                    {{--            <img src="{{ url($player['nationality']['imageUrl']) }}">--}}
                    <img id="nation" class="hidden" src="{{ $player['nationalityImage'] }}" alt="nation-image">
                </div>
                <div class="card-24-league">
                    <img id="league" src="https://cdn.futwiz.com/assets/img/fc24/leagues/2118.png" alt="league-image">
                </div>
                <div class="card-24-club">
                    <img id="club" src="https://cdn.futwiz.com/assets/img/fc24/badges/112658.png" alt="club-image">
                </div>
            </div>
        </div>
    </div>

    <div class="autocomplete">
        <form method="POST" action="{{ route('guessPlayer') }}">
            @csrf
            <input class="form-control mb-2" type="text" id="player-name" placeholder="Guess the player's name..."
                   autocomplete="off" style="width: 300px">
            <button type="submit" class="btn btn-primary mb-2 w-100">Submit</button>
        </form>
{{--        <button class="btn btn-primary mb-2 w-100" onclick="submitGuess()">Guess</button>--}}
{{--        <input class="form-control mb-2" type="text" id="player-name" placeholder="Guess the player's name..."--}}
{{--               autocomplete="off" style="width: 300px">--}}
    </div>
    <p class="display-5" id="message"></p>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(isset($triggerRevealRandomFieldFunction) && $triggerRevealRandomFieldFunction)
        // Call your JavaScript function
        revealRandomField();
        @endif
        @if(isset($triggerRevealAllFieldFunction) && $triggerRevealAllFieldFunction)
        // Call your JavaScript function
        revealRandomField();
        @endif
    });

    console.log("Player Name (For Debugging): {{ $player['fullName'] }}");
    let hiddenFields = ['nation', 'overall_rating', 'position', 'pac', 'pas', 'def', 'sho', 'dri', 'phy'];

    let score = 6; // Initialize the score

    revealRandomField();
    revealRandomField();
    // leagueNameToId()

    // Function to reveal one random field
    function revealRandomField() {
        if (hiddenFields.length > 0) {
            let fieldToReveal = hiddenFields.splice(Math.floor(Math.random() * hiddenFields.length), 1)[0];
            let fieldElement = document.getElementById(fieldToReveal);
            if (fieldElement) {
                fieldElement.classList.remove('hidden');
            }
        }
    }

    function revealAllField() {
        document.getElementById('Face').classList.remove('hidden');
        document.getElementById('name').classList.remove('hidden');
        hiddenFields.forEach(field => {
            let fieldElement = document.getElementById(field);
            if (fieldElement) {
                fieldElement.classList.remove('hidden');
            }
        });
    }

    // Function to submit the guess
    function submitGuess() {
        let name = document.getElementById('player-name').value;
        if (name === "{{ $player['fullName'] }}") {
            // Correct guess - reveal all fields
            revealAllField()
            document.getElementById('message').innerText = 'Correct! Player details are revealed.';
        } else {
            // Wrong guess - reveal one random field and decrease the score
            revealRandomField();
            score -= 1;
            document.getElementById('score').innerText = score;
            document.getElementById('message').innerText = 'Wrong guess';

            // Disable input and button if score is 0
            if (score <= 0) {
                document.getElementById('player-name').disabled = true;
                document.querySelector('button').disabled = true;
                document.getElementById('message').innerText += ' No more attempts left.';
                revealAllField()
            }
        }
    }


    function autocomplete(input, list) {
        var currentFocus;

        // Function to normalize strings (e.g., Ü -> U)
        function normalizeString(str) {
            // Normalize string by removing diacritical marks
            let normalizedStr = str.normalize('NFD').replace(/[\u0300-\u036f]/g, "");

            // Replace special characters with their plain equivalents
            normalizedStr = normalizedStr.replace(/Ø/g, 'O')
                .replace(/ø/g, 'o')
                .replace(/Ü/g, 'U')
                .replace(/ü/g, 'u');
            // Add more replacements as needed

            return normalizedStr;
        }

        // Add an event listener to compare the input value with all items in the list
        input.addEventListener('input', function () {
            // Close the existing list if it is open
            closeList();

            // If the input is empty, exit the function
            if (!this.value) return;

            currentFocus = -1;

            // Create a suggestions <div> and add it to the element containing the input field
            let suggestions = document.createElement('div');
            suggestions.setAttribute('id', 'suggestions');
            suggestions.setAttribute("class", "autocomplete-items");
            this.parentNode.appendChild(suggestions);

            // Normalize input value for comparison
            let normalizedInput = normalizeString(this.value.toUpperCase());

            // Iterate through all entries in the list and find matches
            for (let i = 0; i < list.length; i++) {
                // Normalize list item for comparison
                let normalizedListItem = normalizeString(list[i].toUpperCase());

                if (normalizedListItem.includes(normalizedInput)) {
                    // If a match is found, create a suggestion <div> and add it to the suggestions <div>
                    let suggestion = document.createElement('div');
                    suggestion.innerHTML = list[i];

                    suggestion.addEventListener('click', function () {
                        input.value = this.innerHTML;
                        closeList();
                    });
                    suggestion.style.cursor = 'pointer';

                    suggestions.appendChild(suggestion);
                }
            }
        });

        // Execute a function when a key is pressed on the keyboard
        input.addEventListener("keydown", function (e) {
            var x = document.getElementById("suggestions");
            if (x) x = x.getElementsByTagName("div");

            if (e.keyCode == 40) { // arrow DOWN
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) { // arrow UP
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) { // ENTER
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            // A function to classify an item as "active"
            if (!x) return false;
            // Start by removing the "active" class on all items
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            // Add class "autocomplete-active"
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            // A function to remove the "active" class from all autocomplete items
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeList() {
            // Close all autocomplete lists in the document
            var suggestions = document.getElementById('suggestions');
            if (suggestions) suggestions.parentNode.removeChild(suggestions);
            currentFocus = -1;
        }

        // Execute a function when someone clicks in the document
        document.addEventListener("click", function (e) {
            closeList(e.target);
        });
    }

    /*An array containing all the country names in the world:*/
    var countries = ["Pelé",
        "Zinedine Zidane",
        "Ronaldo",
        "Ronaldinho",
        "Johan Cruyff",
        "Lev Yashin",
        "Ferenc Puskás",
        "Mané Garrincha",
        "Paolo Maldini",
        "Müller",
        "Charlton",
        "Franco Baresi",
        "Thierry Henry",
        "Carlos Alberto Torres",
        "Marcos Cafú",
        "Marco van Basten",
        "Eusébio",
        "Antunes Coimbra",
        "Roberto Baggio",
        "Iker Casillas",
        "Raúl González Blanco",
        "George Best",
        "Andrea Pirlo",
        "Xavier Hernández",
        "Dennis Bergkamp",
        "Ruud Gullit",
        "Rivaldo",
        "Roberto Carlos",
        "Alessandro Del Piero",
        "Lothar Matthäus",
        "Bobby Moore",
        "Kenny Dalglish",
        "Javier Zanetti",
        "Alessandro Nesta",
        "Hugo Sánchez",
        "Alan Shearer",
        "Kaká",
        "Samuel Eto'o",
        "Didier Drogba",
        "Ruud van Nistelrooy",
        "Éric Cantona",
        "Sócrates",
        "Philipp Lahm",
        "Gary Lineker",
        "Hristo Stoichkov",
        "Fabio Cannavaro",
        "Jairzinho",
        "Carles Puyol Saforcada",
        "Emilio Butragueño",
        "Peter Schmeichel",
        "Luís Figo",
        "Franck Ribéry",
        "Riquelme",
        "Michael Laudrup",
        "Fernando Hierro Ruiz",
        "Andriy Shevchenko",
        "Steven Gerrard",
        "Ronald Koeman",
        "Paul Scholes",
        "Wayne Rooney",
        "Edwin van der Sar",
        "Petr Cech",
        "Bastian Schweinsteiger",
        "Michael Owen",
        "Rio Ferdinand",
        "David Beckham",
        "Pavel Nedvěd",
        "Laurent Blanc",
        "Patrick Vieira",
        "Robin van Persie",
        "Marcel Desailly",
        "Miroslav Klose",
        "Gheorghe Hagi",
        "Ian Wright",
        "Clarence Seedorf",
        "Michael Ballack",
        "Fernando Torres",
        "Davor Šuker",
        "Patrick Kluivert",
        "Claude Makélélé",
        "John Barnes",
        "Frank Lampard",
        "David Trezeguet",
        "Ian Rush",
        "Gianfranco Zola",
        "Robert Pirès",
        "Frank Rijkaard",
        "Nemanja Vidić",
        "Xabi Alonso",
        "Emmanuel Petit",
        "Juan Sebastián Verón",
        "Ashley Cole",
        "Michael Essien",
        "Henrik Larsson",
        "Hernán Crespo",
        "Sol Campbell",
        "Roy Keane",
        "Gennaro Gattuso",
        "Gianluca Zambrotta",
        "Luis Hernández",];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("player-name"), countries);
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>

