<div class="container text-center">
    <h1 class="display-3 fw-normal display-color text-primary text-center">Guess the FUT Player</h1>
    <p class="display-5 text-body-secondary">Score: <span id="score">8</span></p>
    <div class="d-flex justify-content-center align-items-center full-height">
        <div id="card" class="card-25 card-25-gold">
            <div id="Face" class="card-25-face hidden">
                <div class="card-25-face-inner">
                    {{--            <img src="{{ url('https://cdn.futwiz.com/assets/img/fc24/faces/' . $player['id'] . '.png') }}" alt="Haaland FC 24 Custom Card Creator Face">--}}
                    <img src="{{ url($player['avatarUrl']) }}" alt="{{  $player['commonName'] }} FC 25 Custom Card Creator Face">
                </div>
            </div>
            <div id="overall_rating" class="card-25-rating hidden" x-text="$wire.player.overallRating"></div>
            <div id="position" class="card-25-position hidden">{{ $player['position']['shortLabel'] }}</div>
            {{--    <div class="card-24-chemstyle"><i class="chemicon-basic"></i></div>--}}
            {{--    <div class="card-24-first-owner"><div>1</div></div>--}}
            <div id="name" class="card-25-name hidden">{{  $player['commonName'] }}</div>
            <div class="card-25-atts ">
                <div class="att-row-label">
                    <div class="att1-label card-25-attlabel1">
                        PAC
                    </div>
                    <div class="att2-label card-25-attlabel2">
                        SHO
                    </div>
                    <div class="att3-label card-25-attlabel3">
                        PAS
                    </div>
                    <div class="att4-label card-25-attlabel4">
                        DRI
                    </div>
                    <div class="att5-label card-25-attlabel5">
                        DEF
                    </div>
                    <div class="att6-label card-25-attlabel6">
                        PHY
                    </div>
                </div>
                <div class="att-row-num">
                    <div id="pac" class="att1-num card-25-attnum1 hidden">
                        {{ $player['stats']['pac']['value'] }}
                    </div>
                    <div id="sho" class="att2-num card-25-attnum2 hidden">
                        {{ $player['stats']['sho']['value'] }}
                    </div>
                    <div id="pas" class="att3-num card-25-attnum3 hidden">
                        {{ $player['stats']['pas']['value'] }}
                    </div>
                    <div id="dri" class="att4-num card-25-attnum4 hidden">
                        {{ $player['stats']['dri']['value'] }}
                    </div>
                    <div id="def" class="att5-num card-25-attnum5 hidden">
                        {{ $player['stats']['def']['value'] }}
                    </div>
                    <div id="phy" class="att6-num card-25-attnum6 hidden">
                        {{ $player['stats']['phy']['value'] }}
                    </div>
                </div>
            </div>
            <div class="card-25-details">
                <div class="card-25-nation">
                    {{--            <img src="{{ url($player['nationality']['imageUrl']) }}">--}}
                    <img id="nation" class="hidden"
                         src="{{ url('https://cdn.futwiz.com/assets/img/fc25/flags/' . $player['nationality']['id']. '.png') }}">
                </div>
                <div class="card-25-league">
                    <img id="league" class="hidden"
                         src="">
                </div>
                <div class="card-25-club">
                    <img id="club" class="hidden" src="{{ url($player['team']['imageUrl']) }}">
                </div>
            </div>
        </div>
    </div>

    <div class="autocomplete">
        <button class="btn btn-primary mb-2 w-100" id="guess" onclick="submitGuess()">Guess</button>
        <button class="btn btn-primary mb-2 w-100" id="refresh" wire:click="fetchAPlayer" onclick="resetState()">Refresh Player</button>
        <input class="form-control mb-2" type="text" id="player-name" placeholder="Guess the player's name..."
               autocomplete="off" style="width: 300px">
    </div>
    <p class="display-5" id="message"></p>
    <span id="p-name" class="hidden">{{ trim(($player['firstName'] ?? '') . ' ' . ($player['lastName'] ?? '')) }}</span>
    <span id="leagueName" class="hidden">{{ $player['leagueName'] }}</span>
</div>


<script>
    let playerName = document.getElementById('p-name').textContent;
    let leagueName = document.getElementById('leagueName').textContent;
    console.log("Player Name (For Debugging): " + playerName);
    console.log("League Name (For Debugging): " + leagueName);
    let hiddenFields = ['club', 'nation', 'league', 'overall_rating', 'position', 'pac', 'pas', 'def', 'sho', 'dri', 'phy'];
    document.getElementById('refresh').disabled = true;
    let score = 8; // Initialize the score

    revealRandomField();
    revealRandomField();
    leagueNameToId()

    function resetState() {
        // Reset the score
        score = 8;
        document.getElementById('score').innerText = score;

        // Clear the message
        document.getElementById('message').innerText = '';

        // Hide all fields
        hiddenFields = ['club', 'nation', 'league', 'overall_rating', 'position', 'pac', 'pas', 'def', 'sho', 'dri', 'phy'];
        hiddenFields.forEach(field => {
            let fieldElement = document.getElementById(field);
            if (fieldElement) {
                fieldElement.classList.add('hidden');
            }
        });

        // Hide the player face and name
        document.getElementById('Face').classList.add('hidden');
        document.getElementById('name').classList.add('hidden');


        // Enable input and button
        // document.getElementById('player-name').disabled = false;
        // document.querySelector('button').disabled = false;

        setTimeout(() => {
            playerName = document.getElementById('p-name').textContent;
            leagueName = document.getElementById('leagueName').textContent;
            revealRandomField();
            revealRandomField();
            leagueNameToId();
            document.getElementById('refresh').disabled = true;
            document.getElementById('player-name').disabled = false;
            document.getElementById('guess').disabled = false;
        }, 1000);
    }

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
            "Ligue 1 McDonald's": 16,
            'MLS': 39,
            'LALIGA EA SPORTS': 53,
            'Serie A Enilive': 31,
            'Serie BKT': 32,
            'Liga Portugal': 308,
            'Trendyol Süper Lig': 68,
            'Eredivisie': 10,
            'Libertadores': 1003,
        };
        image.src = `https://cdn.futwiz.com/assets/img/fc25/leagues/${NameToId[leagueName]}.png`;
        console.log(NameToId[leagueName])
    }

    // Function to submit the guess
    function submitGuess() {
        let name = document.getElementById('player-name').value;
        console.log("Player Name (For Debugging 2): " + playerName);
        if (name === playerName) {
            // Correct guess - reveal all fields
            revealAllField()
            document.getElementById('player-name').disabled = true;
            document.getElementById('guess').disabled = true;
            document.getElementById('refresh').disabled = false;
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
                document.getElementById('guess').disabled = true;
                document.getElementById('refresh').disabled = false;
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
    var countries = ["Kylian Mbappé", "Rodrigo Hernández Cascante", "Erling Haaland", "Jude Bellingham",
        "Vinícius José de Oliveira Júnior", "Kevin De Bruyne", "Harry Kane", "Martin Ødegaard", "Gianluigi Donnarumma",
        "Alisson Ramses Becker", "Thibaut Courtois", "Lautaro Martínez", "Virgil van Dijk", "Marc-André ter Stegen",
        "Mohamed Salah", "Phil Foden", "Lionel Messi", "Antoine Griezmann", "Rúben Santos Gato Alves Dias",
        "Robert Lewandowski", "Federico Valverde", "Ederson Santana de Moraes", "Bernardo Mota Carvalho e Silva",
        "Jan Oblak", "Antonio Rüdiger", "Florian Wirtz", "Gregor Kobel", "William Saliba", "Victor Osimhen",
        "Jamal Musiala", "Bukayo Saka", "Paulo Dybala", "Theo Hernández", "Neymar da Silva Santos Jr.", "Declan Rice",
        "Frenkie de Jong", "Mike Maignan", "Bruno Miguel Borges Fernandes", "Heung Min Son", "Marcos Aoás Corrêa",
        "Alessandro Bastoni", "İlkay Gündoğan", "Emiliano Martínez", "Nicolò Barella", "Yann Sommer",
        "C. Ronaldo dos Santos Aveiro", "Gabriel dos S. Magalhães", "Granit Xhaka", "Rodrygo Silva de Goes",
        "João Pedro Cavaco Cancelo", "Rafael da Conceição Leão", "Alejandro Grimaldo García", "Luka Modrić",
        "Alexis Mac Allister", "Daniel Carvajal Ramos", "Ousmane Dembélé", "Trent Alexander-Arnold", "Pedro González López",
        "Jonathan Tah", "Karim Benzema", "Gleison Bremer Silva Nascimento", "Joshua Kimmich", "Unai Simón Mendibil",
        "Manuel Neuer", "Hakan Çalhanoğlu", "Khvicha Kvaratskhelia", "David Alaba", "Ronald Araujo", "Julian Brandt",
        "Éder Gabriel Militão", "Bruno Guimarães Moura", "Alexander Isak", "N'Golo Kanté", "Jules Koundé",
        "Vítor Machado Ferreira", "James Maddison", "Riyad Mahrez", "Giorgi Mamardashvili", "Mikel Merino Zazón",
        "Sergej Milinković-Savić", "Loïs Openda", "João Maria Palhinha Gonçalves", "Cole Palmer", "Andrew Robertson",
        "Leroy Sané", "Nico Schlotterbeck", "John Stones", "Aurélien Tchouaméni", "Diogo José Teixeira da Silva",
        "Sandro Tonali", "Ollie Watkins", "Nicholas Williams Arthuer", "Francesco Acerbi", "Manuel Akanji", "Nathan Aké",
        "Julián Álvarez", "Iago Aspas Juncal", "Yassine Bounou", "Federico Chiesa", "Kingsley Coman",
        "Rúben Diogo da Silva Neves", "Matthijs de Ligt", "Rodrigo De Paul", "Raphael Dias Belloli", "Luis Díaz",
        "Federico Dimarco", "Artem Dovbyk", "Jeremie Frimpong", "Aleix García Serrano", "Jack Grealish", "Serhou Guirassy",
        "Viktor Gyökeres", "Achraf Hakimi", "Lukáš Hrádecký", "Kalidou Koulibaly", "Sadio Mané", "Lisandro Martínez",
        "Diogo Meireles Costa", "Ferland Mendy", "Christopher Nkunku", "Daniel Olmo Carvajal", "Exequiel Palacios",
        "Benjamin Pavard", "Alejandro Remiro Gargallo", "Cristian Romero", "Marcel Sabitzer",
        "Carlos Henrique Venancio Casimiro", "Guglielmo Vicario", "Dušan Vlahović", "Kyle Walker", "Benjamin White",
        "Marcos Acuña", "Robert Andrich", "Ismaël Bennacer", "Domenico Berardi", "Eduardo Camavinga", "Yannick Carrasco",
        "Andreas Christensen", "Stefan de Vrij", "Ángel Di María", "Moussa Diaby", "Youssef En-Nesyri",
        "Rafael A. Ferreira Silva", "Cody Gakpo", "José María Giménez", "Olivier Giroud", "Leon Goretzka", "Joško Gvardiol",
        "Kai Havertz", "Lucas Hernández", "Mauro Icardi", "Min Jae Kim", "Ibrahima Konaté", "Teun Koopmeiners",
        "Mateo Kovačić", "Konrad Laimer", "Aymeric Laporte", "Robin Le Normand", "Marcos Llorente Moreno",
        "Manuel Locatelli", "Donyell Malen", "Gabriel Teodoro Martinelli Silva", "Henrikh Mkhitaryan",
        "Álvaro Borja Morata Martín", "Gerard Moreno Balagueró", "André Onana", "Willi Orban", "Pablo Martín Páez Gavira",
        "Daniel Parejo Muñoz", "Lorenzo Pellegrini", "Pedro António Pereira Gonçalves", "Jordan Pickford", "Nick Pope",
        "Pedro Antonio Porro Sauceda", "Ivan Provedel", "Christian Pulisic", "David Raya Martin", "Jorge Resurrección",
        "Guido Rodríguez", "Alessio Romagnoli", "Xavi Simons", "Douglas Luiz Soares de Paulo", "Dušan Tadić",
        "Edmond Tapsoba", "Nuno Alexandre Tavares Mendes", "Marcus Thuram", "Fikayo Tomori", "Lucas Torreira",
        "Kieran Trippier", "Leandro Trossard", "Viktor Tsygankov", "Mattia Zaccagni", "Duván Zapata",
        "Francisco Román Alarcón Suárez", "Joelinton Apolinário de Lira", "Eduardo Gabriel Aquino Cossa",
        "Pierre-Emerick Aubameyang", "Leon Bailey", "Oliver Baumann", "Victor Boniface", "Sven Botman", "Jarrod Bowen",
        "Marcelo Brozović", "Moisés Caicedo", "Emre Can", "Marco Carnesecchi", "Koen Casteels",
        "Lucas Tolentino Coelho de Lima", "Ángel Correa", "Marc Cucurella Saseta", "Danilo Luiz da Silva",
        "Otávio Edmilson da Silva Monteiro", "José Diogo Dalot Teixeira", "Sergi Darder Moll", "Alphonso Davies",
        "Giovanni Di Lorenzo", "Brahim Díaz", "Denzel Dumfries", "Edin Džeko", "Enzo Fernández",
        "José Ignacio Fernández Iglesias", "Gabriel Fernando de Jesus", "Luiz Frello Filho Jorge", "Pau Francisco Torres",
        "Niclas Füllkrug", "José Luís Gayà Peña", "Paulo Gazzaniga", "Matthias Ginter", "Serge Gnabry", "Anthony Gordon",
        "Raphaël Guerreiro", "Péter Gulácsi", "Fábio Henrique Tavares", "Yangel Herrera", "Jonas Hofmann", "Ciro Immobile",
        "Reece James", "Boubacar Kamara", "Franck Yannick Kessié", "Randal Kolo Muani", "Filip Kostić", "Mohammed Kudus",
        "Dejan Kulusevski", "Alexandre Lacazette", "Jeremías Conan Ledesma", "Bernd Leno", "Stanislav Lobotka",
        "Ademola Lookman", "Romelu Lukaku", "Gianluca Mancini", "John McGinn", "Aleksandar Mitrović", "Nahuel Molina",
        "Sávio Moreira de Oliveira", "Thomas Müller", "Darwin Núñez", "Michael Olise", "Mikel Oyarzabal Ugarte",
        "Thomas Partey", "Tijjani Reijnders", "Fabián Ruiz Peña", "Brice Samba", "Oihan Sancet Tirapu", "Jadon Sancho",
        "Fabian Schär", "Patrik Schick", "Luke Shaw", "Malcom Filipe Silva de Oliveira", "Chris Smalling",
        "Alexander Sørloth", "Anderson Souza Conceição", "Luis Suárez", "Niklas Süle", "Kevin Trapp", "Destiny Udogie",
        "Dayot Upamecano", "Micky van de Ven", "Raphaël Varane", "Iñaki Williams Arthuer", "Luciano Acosta", "Edson Álvarez",
        "Yeray Álvarez López", "Waldemar Anton", "Alphonse Areola", "Marco Asensio Willemsen", "Alejandro Balde Martínez",
        "Rodrigo Bentancur", "Alejandro Berenguer Remiro", "Sergio Busquets Burgos", "Bryan Cristante",
        "Ricardo Jorge da Luz Horta", "Rui Tiago Dantas da Silva", "Matteo Darmian", "Jonathan David",
        "Richarlison de Andrade", "Luuk de Jong", "Frederico de Paula Santos", "Eberechi Eze", "Youssouf Fofana", "Davide Frattesi"];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("player-name"), countries);
</script>

@livewireScripts
