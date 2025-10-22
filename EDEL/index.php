<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best K-Drama Recommendations</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            min-height: 100vh;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #ff6b6b, #ffa500);
            color: white;
            padding: 40px 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
        }
        .center-content {
            text-align: center;
            flex: 1;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        header p {
            margin: 10px 0 0;
            font-size: 1.2em;
            opacity: 0.9;
        }
        .header-buttons {
            display: flex;
            align-items: center;
            gap: 20px; /* Adjust gap as needed for spacing between buttons */
            margin-right: 300px;
        }
        .logout-form {
            margin: 0;
        }
        .logout-btn {
            background: linear-gradient(135deg, #ff6b6b, #ff4757);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #ff4b4b, #ff2f2f);
        }
        .logout-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .signup-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            /* Removed margin-right as it's no longer needed with flexbox alignment */
        }
        .signup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
        }
        .signup-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .search {
            margin-bottom: 30px;
            text-align: center;
        }
        #searchInput {
            padding: 12px 20px;
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }
        #searchInput:focus {
            outline: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        #dramaList {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .drama {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            position: relative;
        }
        .drama:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .drama img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .drama:hover img {
            transform: scale(1.05);
        }
        .drama-content {
            padding: 15px;
        }
        .drama h3 {
            margin: 0 0 10px;
            font-size: 1.4em;
            color: #333;
        }
        .drama p {
            margin: 0 0 10px;
            color: #666;
            line-height: 1.5;
        }
        .rating {
            color: #ff6600;
            font-weight: bold;
            font-size: 1.1em;
        }
        .read-more {
            background: #667eea;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s ease;
            margin-top: 10px;
        }
        .read-more:hover {
            background: #5a67d8;
        }
        .hidden {
            display: none;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 15px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: black;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <div class="center-content">
            <h1>Top K-Drama Recommendations</h1>
            <p>Discover the best Korean dramas based on ratings, story, and popularity.</p>
        </div>
        <div class="header-buttons">
            <button class="signup-btn" onclick="window.location.href='signup.php'">Sign Up</button>
            <form method="POST" action="logout_user.php" class="logout-form">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        <div class="search">
            <input type="text" id="searchInput" placeholder="Search dramas...">
        </div>
        <div id="dramaList">
            <div class="drama">
                <img src="CRASHLAND.jpg" alt="Crash Landing on You">
                <div class="drama-content">
                    <h3>Crash Landing on You</h3>
                    <p>A South Korean heiress accidentally parachutes into North Korea and falls for a soldier. A romantic comedy with political intrigue.</p>
                    <p class="rating">Rating: 9.1/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Crash Landing on You', 'A South Korean heiress accidentally parachutes into North Korea and falls for a soldier. A romantic comedy with political intrigue. Starring Son Ye-jin and Hyun Bin, this drama blends romance, action, and cross-border drama.', 'https://image.tmdb.org/t/p/w500/6t6r1VGQTTQecftUGFZigWsPcIh.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="ITAEWON.jpg" alt="Itaewon Class">
                <div class="drama-content">
                    <h3>Itaewon Class</h3>
                    <p>A young man seeks revenge against a chaebol family after his father's death, building his own business empire.</p>
                    <p class="rating">Rating: 8.9/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Itaewon Class', 'A young man seeks revenge against a chaebol family after his father\'s death, building his own business empire. Starring Park Seo-joon, this series explores themes of class struggle and entrepreneurship.', 'https://image.tmdb.org/t/p/w500/2ZrWHljeNnOcfN83tXdEi2KFTyR.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="1988.jpg" alt="Reply 1988">
                <div class="drama-content">
                    <h3>Reply 1988</h3>
                    <p>A nostalgic look at 1980s Seoul through the lives of five families and their children.</p>
                    <p class="rating">Rating: 9.0/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Reply 1988', 'A nostalgic look at 1980s Seoul through the lives of five families and their children. This heartwarming drama captures the essence of friendship and family in a bygone era.', 'https://image.tmdb.org/t/p/w500/f2JCfcJzdDWj9z8rQG7iTKa2zO.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="HOSPITALPLAY.jpg" alt="Hospital Playlist">
                <div class="drama-content">
                    <h3>Hospital Playlist</h3>
                    <p>Five doctors navigate friendship, love, and medical challenges over two decades.</p>
                    <p class="rating">Rating: 8.8/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Hospital Playlist', 'Five doctors navigate friendship, love, and medical challenges over two decades. Starring Jo Jung-suk, this series is a feel-good drama with music and heartfelt moments.', 'https://image.tmdb.org/t/p/w500/9xjZS7v7b4DgqhXzH8KZhI7eXm.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="KINGDOM.jpg" alt="Kingdom">
                <div class="drama-content">
                    <h3>Kingdom</h3>
                    <p>A historical thriller about a prince uncovering a zombie outbreak in Joseon Dynasty Korea.</p>
                    <p class="rating">Rating: 8.3/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Kingdom', 'A historical thriller about a prince uncovering a zombie outbreak in Joseon Dynasty Korea. This Netflix series blends horror, politics, and action.', 'https://image.tmdb.org/t/p/w500/9Pf6qNZBqVA0eB8kOqwJHBnJ3Bz.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="VICENZO.jpg" alt="Vincenzo">
                <div class="drama-content">
                    <h3>Vincenzo</h3>
                    <p>A mafia lawyer returns to Korea to seek revenge, teaming up with a lawyer in a corporate battle.</p>
                    <p class="rating">Rating: 8.4/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Vincenzo', 'A mafia lawyer returns to Korea to seek revenge, teaming up with a lawyer in a corporate battle. Starring Song Joong-ki, it\'s a mix of comedy, action, and legal drama.', 'https://image.tmdb.org/t/p/w500/3Ma6FyMigI9rEJT8qM7yM1Fg9tO.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="MR.SUN.jpg" alt="Mr. Sunshine">
                <div class="drama-content">
                    <h3>Mr. Sunshine</h3>
                    <p>A story of love and revolution set during the Japanese occupation of Korea.</p>
                    <p class="rating">Rating: 8.7/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Mr. Sunshine', 'A story of love and revolution set during the Japanese occupation of Korea. Starring Lee Byung-hun, this epic drama explores history and romance.', 'https://image.tmdb.org/t/p/w500/8tWuHQKvH0F7b4x9p2t4q7q8q9q.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="SIGNAL.webp" alt="Signal">
                <div class="drama-content">
                    <h3>Signal</h3>
                    <p>A detective communicates with the past to solve cold cases.</p>
                    <p class="rating">Rating: 8.6/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Signal', 'A detective communicates with the past to solve cold cases. This time-travel mystery thriller is gripping and suspenseful.', 'https://image.tmdb.org/t/p/w500/4Q0JNQcO3cEz2cQ8Q8Q8Q8Q8Q8Q.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="DESECNT.jpg" alt="Descendants of the Sun">
                <div class="drama-content">
                    <h3>Descendants of the Sun</h3>
                    <p>A military officer and a doctor fall in love amid war and disaster.</p>
                    <p class="rating">Rating: 8.3/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Descendants of the Sun', 'A military officer and a doctor fall in love amid war and disaster. Starring Song Joong-ki and Song Hye-kyo, it\'s a romantic action drama.', 'https://image.tmdb.org/t/p/w500/5tHtYDfqCEfCj6C8Q8Q8Q8Q8Q8Q.jpg')">Read More</button>
                </div>
            </div>
            <div class="drama">
                <img src="WEIGHT.jpg" alt="Weightlifting Fairy Kim Bok-joo">
                <div class="drama-content">
                    <h3>Weightlifting Fairy Kim Bok-joo</h3>
                    <p>A weightlifter navigates college life, friendship, and romance.</p>
                    <p class="rating">Rating: 8.1/10 (IMDb)</p>
                    <button class="read-more" onclick="openModal('Weightlifting Fairy Kim Bok-joo', 'A weightlifter navigates college life, friendship, and romance. This light-hearted drama is perfect for feel-good vibes.', 'https://image.tmdb.org/t/p/w500/6t6r1VGQTTQecftUGFZigWsPcIh.jpg')">Read More</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle"></h2>
            <img id="modalImage" src="" alt="" style="width:100%; max-width:300px; margin:20px 0;">
            <p id="modalDesc"></p>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 K-Drama Recommendations. All rights reserved.</p>
    </footer>
    <script>
        const searchInput = document.getElementById('searchInput');
        const dramas = document.querySelectorAll('.drama');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();
            dramas.forEach(drama => {
                const title = drama.querySelector('h3').textContent.toLowerCase();
                const desc = drama.querySelector('p').textContent.toLowerCase();
                if (title.includes(query) || desc.includes(query)) {
                    drama.classList.remove('hidden');
                } else {
                    drama.classList.add('hidden');
                }
            });
        });

        function openModal(title, desc, imgSrc) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDesc').textContent = desc;
            document.getElementById('modalImage').src = imgSrc;
            document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>
