<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
    <h1 class="display-3 fw-normal display-color text-primary text-center">Guess the Football Player</h1>
    <p class="display-5 text-body-secondary">Score: <span id="score">8</span></p>
    <div class="d-flex justify-content-center align-items-center full-height">
        <div id="card" class="card-24 card-24-gold">
            <div id="Face" class="card-24-face hidden">
                <div class="card-24-face-inner">
                    {{--            <img src="{{ url('https://cdn.futwiz.com/assets/img/fc24/faces/' . $player['id'] . '.png') }}" alt="Haaland FC 24 Custom Card Creator Face">--}}
                    <img src="{{ url($player['avatarUrl']) }}" alt="Haaland FC 24 Custom Card Creator Face">
                </div>
            </div>
            <div id="overall_rating" class="card-24-rating hidden">{{ $player['overallRating'] }}</div>
            <div id="position" class="card-24-position hidden">{{ $player['position']['shortLabel'] }}</div>
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
                        {{ $player['stats']['pac']['value'] }}
                    </div>
                    <div id="sho" class="att2-num card-24-attnum2 hidden">
                        {{ $player['stats']['sho']['value'] }}
                    </div>
                    <div id="pas" class="att3-num card-24-attnum3 hidden">
                        {{ $player['stats']['pas']['value'] }}
                    </div>
                    <div id="dri" class="att4-num card-24-attnum4 hidden">
                        {{ $player['stats']['dri']['value'] }}
                    </div>
                    <div id="def" class="att5-num card-24-attnum5 hidden">
                        {{ $player['stats']['def']['value'] }}
                    </div>
                    <div id="phy" class="att6-num card-24-attnum6 hidden">
                        {{ $player['stats']['phy']['value'] }}
                    </div>
                </div>
            </div>
            <div class="card-24-details">
                <div class="card-24-nation">
                    {{--            <img src="{{ url($player['nationality']['imageUrl']) }}">--}}
                    <img id="nation" class="hidden"
                         src="{{ url('https://cdn.futwiz.com/assets/img/fc24/flags/' . $player['nationality']['id']. '.png') }}">
                </div>
                <div class="card-24-league">
                    <img id="league" class="hidden"
                         src="">
                </div>
                <div class="card-24-club">
                    <img id="club" class="hidden" src="{{ url($player['team']['imageUrl']) }}">
                </div>
            </div>
        </div>
    </div>

    <div class="autocomplete">
        <button class="btn btn-primary mb-2 w-100" onclick="submitGuess()">Guess</button>
        <input class="form-control mb-2" type="text" id="player-name" placeholder="Guess the player's name..."
               autocomplete="off" style="width: 300px">
    </div>
    <p class="display-5" id="message"></p>
</div>

<script>
    console.log("Player Name (For Debugging): {{ trim(($player['firstName'] ?? '') . ' ' . ($player['lastName'] ?? '')) }}");
    let hiddenFields = ['club', 'nation', 'league', 'overall_rating', 'position', 'pac', 'pas', 'def', 'sho', 'dri', 'phy'];

    let score = 8; // Initialize the score

    revealRandomField();
    revealRandomField();
    leagueNameToId()

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

    function leagueNameToId(){
        let image = document.getElementById('league');
        const NameToId = {
            'ROSHN Saudi League': 350,
            'Premier League': 13,
            'Bundesliga': 19,
            'Ligue 1 Uber Eats': 16,
            'MLS': 39,
            'LALIGA EA SPORTS': 53,
            'Serie A TIM': 31,
            'Liga Portugal': 308,
            'Trendyol Süper Lig': 68,
            'Eredivisie': 10,
        };

        image.src = `https://cdn.futwiz.com/assets/img/fc24/leagues/${NameToId['{{ $player['leagueName'] }}']}.png`;
        console.log(NameToId['{{ $player['leagueName'] }}'])
    }

    // Function to submit the guess
    function submitGuess() {
        let name = document.getElementById('player-name').value;
        if (name === "{{ trim(($player['firstName'] ?? '') . ' ' . ($player['lastName'] ?? '')) }}") {
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
    var countries = ["Kylian Mbappé", "Erling Haaland", "Kevin De Bruyne", "Lionel Messi", "Karim Benzema", "Thibaut Courtois",
        "Harry Kane", "Robert Lewandowski", "Mohamed Salah", "Rúben Santos Gato Alves Dias", "Vinícius José de Oliveira Júnior",
        "Rodrigo Hernández Cascante", "Neymar da Silva Santos Jr.", "Marc-André ter Stegen", "Virgil van Dijk", "Alisson Ramses Becker",
        "Carlos Henrique Venancio Casimiro", "Bruno Miguel Borges Fernandes", "Antoine Griezmann", "Victor Osimhen",
        "Bernardo Mota Carvalho e Silva", "Federico Valverde", "Ederson Santana de Moraes", "Joshua Kimmich", "Jan Oblak",
        "Luka Modrić", "Frenkie de Jong", "Lautaro Martínez", "Martin Ødegaard", "Mike Maignan", "Marcos Aoás Corrêa",
        "Gregor Kobel", "Heung Min Son", "Gianluigi Donnarumma", "Manuel Neuer", "Ousmane Dembélé", "Bukayo Saka",
        "Jude Bellingham", "Rafael da Conceição Leão", "Pedro González López", "Matthijs de Ligt", "Sandro Tonali",
        "Riyad Mahrez", "Jamal Musiala", "Nicolò Barella", "Ronald Araujo", "Paulo Dybala", "İlkay Gündoğan", "Sergej Milinković-Savić",
        "Khvicha Kvaratskhelia", "Andrew Robertson", "Daniel Parejo Muñoz", "Sadio Mané", "Toni Kroos", "Éder Gabriel Militão",
        "Christopher Nkunku", "N'Golo Kanté", "João Pedro Cavaco Cancelo", "C. Ronaldo dos Santos Aveiro", "Trent Alexander-Arnold",
        "Wojciech Szczęsny", "Jack Grealish", "Marcos Acuña", "David Alaba", "Iago Aspas Juncal", "Alessandro Bastoni", "Domenico Berardi",
        "Yassine Bounou", "Hakan Çalhanoğlu", "Kingsley Coman", "Giovanni Di Lorenzo", "Phil Foden", "Leon Goretzka", "Theo Hernández",
        "Ciro Immobile", "Jules Koundé", "Aymeric Laporte", "Emiliano Martínez", "Keylor Navas", "André Onana", "Thomas Partey",
        "Marcus Rashford", "Declan Rice", "Antonio Rüdiger", "Rodrygo Silva de Goes", "John Stones", "Diogo José Teixeira da Silva",
        "Kevin Trapp", "Kieran Trippier", "Raphaël Varane", "Florian Wirtz", "Thiago Alcântara", "Ismaël Bennacer", "Julian Brandt",
        "Yannick Carrasco", "Koen Casteels", "Federico Chiesa", "Thiago Emiliano da Silva", "Rúben Diogo da Silva Neves",
        "Rodrigo Javier De Paul", "Memphis Depay", "Moussa Diaby", "Raphael Dias Belloli", "Luis Díaz", "Gabriel dos S. Magalhães",
        "Gabriel Fernando de Jesus", "Matthias Ginter", "Serge Gnabry", "Alejandro Grimaldo García", "Bruno Guimarães Moura",
        "Péter Gulácsi", "Achraf Hakimi", "Fábio Henrique Tavares", "Lucas Hernández", "Pierre-Emile Højbjerg", "Reece James",
        "Min Jae Kim", "Randal Kolo Muani", "Kalidou Koulibaly", "Marcos Llorente Moreno", "Stanislav Lobotka", "Romelu Lukaku",
        "James Maddison", "Gabriel Teodoro Martinelli Silva", "Lisandro Martínez", "Mikel Merino Zazón", "Thomas Müller", "Nick Pope",
        "Adrien Rabiot", "Aaron Ramsdale", "Alejandro Remiro Gargallo", "Jorge Resurrección", "Luis Alberto Romero Alconchel", "Leroy Sané",
        "Gleison Bremer Silva Nascimento", "Milan Škriniar", "Chris Smalling", "Yann Sommer", "Niklas Süle", "Aurélien Tchouaméni",
        "Fikayo Tomori", "Kyle Walker", "Francesco Acerbi", "Jordi Alba Ramos", "Marco Asensio Willemsen", "Wissam Ben Yedder",
        "Sven Botman", "Marcelo Brozović", "Sergio Busquets Burgos", "Emre Can", "Andreas Christensen", "Sergi Darder Moll",
        "Alphonso Davies", "Ángel Di María", "Edin Džeko", "Christian Eriksen", "Nabil Fekir", "Enzo Fernández",
        "José Ignacio Fernández Iglesias", "Rafael A. Ferreira Silva", "Luiz Frello Filho Jorge", "Pau Francisco Torres", "Jeremie Frimpong",
        "Cody Gakpo", "José María Giménez", "Sébastien Haller", "Jonas Hofmann", "Mats Hummels", "Borja Iglesias Quintás", "Filip Kostić",
        "Alexandre Lacazette", "Konrad Laimer", "Hugo Lloris", "Gianluca Mancini", "Alex Meret", "Álvaro Borja Morata Martín",
        "Gerard Moreno Balagueró", "Daniel Olmo Carvajal", "Willi Orban", "Mikel Oyarzabal Ugarte", "Pablo Martín Páez Gavira",
        "João Maria Palhinha Gonçalves", "Benjamin Pavard", "Lorenzo Pellegrini", "Marco Reus", "Guido Rodríguez", "Alessio Romagnoli",
        "William Saliba", "Patrik Schick", "Nico Schlotterbeck", "Luke Shaw", "Unai Simón Mendibil", "Raheem Sterling", "Dušan Vlahović",
        "André-Franck Zambo Anguissa", "Piotr Zieliński", "Manuel Akanji", "Robert Andrich", "Joelinton Apolinário de Lira",
        "Roberto Firmino Barbosa de Oliveira", "Rodrigo Bentancur", "Eduardo Camavinga", "Daniel Carvajal Ramos", "Ángel Correa",
        "Ricardo Jorge da Luz Horta", "Otávio Edmilson da Silva Monteiro", "Stefan de Vrij", "Boulaye Dia", "Federico Dimarco",
        "Youssef En-Nesyri", "Mark Flekken", "Seko Fofana", "Javier Galán Gil", "David García Zubiria", "José Luís Gayà Peña", "Olivier Giroud",
        "Mario Götze", "Vincenzo Grifo", "Raphaël Guerreiro", "Joško Gvardiol", "Kai Havertz", "Mario Hermoso Canseco", "Franck Yannick Kessié",
        "Presnel Kimpembe", "Orkun Kökçü", "Mateo Kovačić", "Robin Le Normand", "Jeremías Conan Ledesma", "Thomas Lemar", "Dominik Livaković",
        "Manuel Locatelli", "Anthony Lopes", "Alexis Mac Allister", "Donyell Malen", "Iñigo Martínez Berridi", "José Luis Mato Sanmartín",
        "Noussair Mazraoui", "Diogo Meireles Costa", "Ferland Mendy", "Édouard Mendy", "Nahuel Molina", "João Mário N. Costa Eduardo",
        "Darwin Núñez", "Loïs Openda", "Nicolás Otamendi", "Isaac Palazón Camacho", "Pedro António Pereira Gonçalves", "Jordan Pickford",
        "Ivan Provedel", "Fernando Reges Mouta", "Cristian Romero", "Jadon Sancho", "Stefan Savić", "Fabian Schär", "Dominik Szoboszlai",
        "Dušan Tadić", "Mehdi Taremi", "Nuno Alexandre Tavares Mendes", "Youri Tielemans", "Lucas Torreira", "Ferran Torres García",
        "Viktor Tsygankov", "Enes Ünal", "Dayot Upamecano", "Guglielmo Vicario", "Timo Werner", "Callum Wilson", "Granit Xhaka",
        "Mattia Zaccagni", "Nathan Aké", "Ali Al Musrati", "Raúl Albiol Tortajada", "Toby Alderweireld", "Miguel Almirón", "Edson Álvarez",
        "Yeray Álvarez López", "Maximilian Arnold", "Kepa Arrizabalaga", "Alejandro Balde Martínez", "Steven Berghuis", "Benjamin Bourigeaud",
        "Davide Calabria", "Etienne Capoue", "Ben Chilwell", "Samuel Chukwueze", "Jonathan Clauss", "Sebastián Coates",
        "Lucas Tolentino Coelho de Lima", "Bryan Cristante", "Danilo Luiz da Silva", "Arnaut Danjuma", "Rui Tiago Dantas da Silva",
        "Jonathan David", "Frederico de Paula Santos", "Rui Pedro dos Santos Patrício", "Denzel Dumfries", "Lewis Dunk", "João Félix Sequeira",
        "Norberto Gomes Betuncal", "Nicolás González"];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("player-name"), countries);
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>
